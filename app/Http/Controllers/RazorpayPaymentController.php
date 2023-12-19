<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Order;
use App\Models\Plan;
use App\Models\UserCoupon;
use App\Models\Utility;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use App\Models\Project;



class RazorpayPaymentController extends Controller
{
    public $secret_key;
    public $public_key;
    public $is_enabled;
    public $currancy;
    public $user;

    public function setPaymentDetail()
    {
        // $user = Auth::user();
        // if($user->getGuard() == 'client')
        // {
        //     $payment_setting = Utility::getPaymentSetting($user->currentWorkspace->id);
        //     $this->currancy  = (isset($user->currentWorkspace->currency_code)) ? $user->currentWorkspace->currency_code : 'USD';
        // }
        // else
        // {
        // }
            $payment_setting = Utility::getAdminPaymentSetting();
            $this->currancy  = !empty(env('CURRENCY')) ? env('CURRENCY') : 'USD';

        $this->secret_key = isset($payment_setting['razorpay_secret_key']) ? $payment_setting['razorpay_secret_key'] : '';
        $this->public_key = isset($payment_setting['razorpay_public_key']) ? $payment_setting['razorpay_public_key'] : '';
        $this->is_enabled = isset($payment_setting['is_razorpay_enabled']) ? $payment_setting['is_razorpay_enabled'] : 'off';
    }

    public function setPaymentDetail_client($invoice_id){

        $invoice = Invoice::find($invoice_id);
        if(Auth::user() != null){
            $this->user         = Auth::user();
        }else{
            $this->user         = Client::where('id',$invoice->client_id)->first();
        }   

        $payment_setting = Utility::getPaymentSetting($this->user->currentWorkspace->id);
        $this->currancy  = (isset($this->user->currentWorkspace->currency_code)) ? $this->user->currentWorkspace->currency_code : 'USD';

        $this->secret_key = isset($payment_setting['razorpay_secret_key']) ? $payment_setting['razorpay_secret_key'] : '';
        $this->public_key = isset($payment_setting['razorpay_public_key']) ? $payment_setting['razorpay_public_key'] : '';
        $this->is_enabled = isset($payment_setting['is_razorpay_enabled']) ? $payment_setting['is_razorpay_enabled'] : 'off';
    }

    public function planPayWithRazorpay(Request $request)
    {
        $this->setPaymentDetail();
        $planID    = \Illuminate\Support\Facades\Crypt::decrypt($request->plan_id);
        $plan      = Plan::find($planID);
        $authuser  = Auth::user();
        $coupon_id = '';
        if($plan)
        {
            /* Check for code usage */
            $plan->discounted_price = false;
            $price                  = $plan->{$request->razorpay_payment_frequency . '_price'};

            if(isset($request->coupon) && !empty($request->coupon))
            {
                $request->coupon = trim($request->coupon);
                $coupons         = Coupon::where('code', strtoupper($request->coupon))->where('is_active', '1')->first();
                if(!empty($coupons))
                {
                    $usedCoupun             = $coupons->used_coupon();
                    $discount_value         = ($price / 100) * $coupons->discount;
                    $plan->discounted_price = $price - $discount_value;

                    if($usedCoupun >= $coupons->limit)
                    {
                        return redirect()->back()->with('error', __('This coupon code has expired.'));
                    }
                    $price     = $price - $discount_value;
                    $coupon_id = $coupons->id;
                }
                else
                {
                    return redirect()->back()->with('error', __('This coupon code is invalid or has expired.'));
                }
            }

            if($price <= 0)
            {
                $authuser->plan = $plan->id;
                $authuser->save();

                $assignPlan = $authuser->assignPlan($plan->id, $request->razorpay_payment_frequency);

                if($assignPlan['is_success'] == true && !empty($plan))
                {
                    if(!empty($authuser->payment_subscription_id) && $authuser->payment_subscription_id != '')
                    {
                        try
                        {
                            $authuser->cancel_subscription($authuser->id);
                        }
                        catch(\Exception $exception)
                        {
                            \Log::debug($exception->getMessage());
                        }
                    }

                    $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
                    Order::create(
                        [
                            'order_id' => $orderID,
                            'name' => null,
                            'email' => null,
                            'card_number' => null,
                            'card_exp_month' => null,
                            'card_exp_year' => null,
                            'plan_name' => $plan->name,
                            'plan_id' => $plan->id,
                            'price' => $price == null ? 0 : $price,
                            'payment_frequency' => $request->razorpay_payment_frequency,
                            'price_currency' => $this->currancy,
                            'txn_id' => '',
                            'payment_type' => __('Zero Price'),
                            'payment_status' => 'succeeded',
                            'receipt' => null,
                            'user_id' => $authuser->id,
                        ]
                    );
                    $res['msg']  = __("Plan successfully upgraded.");
                    $res['flag'] = 2;

                    return $res;
                }
                else
                {
                    return response()->json(
                        [
                            'message' => __('Plan fail to upgrade.'),
                        ], 401
                    );
                }
            }

            $res_data['email']             = Auth::user()->email;
            $res_data['total_price']       = $price;
            $res_data['currency']          = $this->currancy;
            $res_data['flag']              = 1;
            $res_data['payment_frequency'] = $request->razorpay_payment_frequency;
            $res_data['coupon']            = $coupon_id;

            return $res_data;
        }
        else
        {
            return response()->json(
                [
                    'message' => __('Plan is deleted.'),
                ], 401
            );
        }
    }

    public function getPaymentStatus(Request $request, $pay_id, $plan)
    {
        $this->setPaymentDetail();

        $planID = \Illuminate\Support\Facades\Crypt::decrypt($plan);
        $plan   = Plan::find($planID);
        $user   = Auth::user();
        if($plan)
        {
            try
            {
                $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
                $ch      = curl_init('https://api.razorpay.com/v1/payments/' . $pay_id . '');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($ch, CURLOPT_USERPWD, $this->public_key . ':' . $this->secret_key); // Input your Razorpay Key Id and Secret Id here
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = json_decode(curl_exec($ch));
                // check that payment is authorized by razorpay or not

                if($response->status == 'authorized')
                {
                    if(!empty($user->payment_subscription_id) && $user->payment_subscription_id != '')
                    {
                        try
                        {
                            $user->cancel_subscription($user->id);
                        }
                        catch(\Exception $exception)
                        {
                            \Log::debug($exception->getMessage());
                        }
                    }

                    if($request->has('coupon_id') && $request->coupon_id != '')
                    {
                        $coupons = Coupon::find($request->coupon_id);
                        if(!empty($coupons))
                        {
                            $userCoupon         = new UserCoupon();
                            $userCoupon->user   = $user->id;
                            $userCoupon->coupon = $coupons->id;
                            $userCoupon->order  = $orderID;
                            $userCoupon->save();


                            $usedCoupun = $coupons->used_coupon();
                            if($coupons->limit <= $usedCoupun)
                            {
                                $coupons->is_active = 0;
                                $coupons->save();
                            }
                        }
                    }

                    $user->is_plan_purchased = 1;
                    if($user->is_trial_done == 1)
                    {
                        $user->is_trial_done = 2;
                        $user->save();
                    }

                    $order                 = new Order();
                    $order->order_id       = $orderID;
                    $order->name           = $user->name;
                    $order->card_number    = '';
                    $order->card_exp_month = '';
                    $order->card_exp_year  = '';
                    $order->plan_name      = $plan->name;
                    $order->plan_id        = $plan->id;
                    $order->price          = isset($response->amount) ? $response->amount / 100 : 0;
                    $order->price_currency = $this->currancy;
                    $order->payment_frequency = $request->payment_frequency;
                    $order->txn_id         = isset($response->id) ? $response->id : $pay_id;
                    $order->payment_type   = 'Razorpay';
                    $order->payment_status = 'succeeded';
                    $order->receipt        = '';
                    $order->user_id        = $user->id;
                    $order->save();

                    $assignPlan = $user->assignPlan($plan->id, $request->payment_frequency);

                    if($assignPlan['is_success'])
                    {
                        return redirect()->route('plans.index')->with('success', __('Plan activated Successfully!'));
                    }
                    else
                    {
                        return redirect()->route(
                            'payment', [
                                         $request->payment_frequency,
                                         \Illuminate\Support\Facades\Crypt::encrypt($plan->id),
                                     ]
                        )->with('error', __($assignPlan['error']));
                    }
                }
                else
                {
                    return redirect()->route(
                        'payment', [
                                     $request->payment_frequency,
                                     \Illuminate\Support\Facades\Crypt::encrypt($plan->id),
                                 ]
                    )->with('error', __('Transaction has been failed.'));
                }
            }
            catch(\Exception $e)
            {
                return redirect()->route(
                    'payment', [
                                 $request->payment_frequency,
                                 \Illuminate\Support\Facades\Crypt::encrypt($plan->id),
                             ]
                )->with('error', __('Plan not found!'));
            }
        }
    }

    public function invoicePayWithRazorpay(Request $request)
    {
        // $this->setPaymentDetail();
        $this->setPaymentDetail_client($request->invoice_id);


        $validatorArray = [
            'amount' => 'required',
        ];
        $validator      = Validator::make(
            $request->all(), $validatorArray
        );

        if($validator->fails())
        {
            return response()->json(
                [
                    'message' => $validator->errors()->first(),
                ], 401
            );
        }

        $invoice = Invoice::find($request->invoice_id);
        if($invoice->getDueAmount() < $request->amount)
        {
            return response()->json(
                [
                    'message' => __('Invalid amount.'),
                ], 401
            );
        }

        $res_data['email']       = $this->user->email;
        $res_data['total_price'] = $request->amount;
        $res_data['currency']    = $this->currancy;
        $res_data['flag']        = 1;
        $res_data['invoice_id']  = $invoice->id;
        $request->session()->put('invoice_data', $res_data);
        $this->pay_amount = $request->amount;

        return $res_data;
    }

    public function getInvoicePaymentStatus($slug, $pay_id, $invoice_id, Request $request)
    {
        $this->setPaymentDetail();

        if(!empty($invoice_id) && !empty($pay_id))
        {
            $user             = $this->user;
            $currentWorkspace = Utility::getWorkspaceBySlug($slug);

            $invoice_id   = decrypt($invoice_id);
            $invoice      = Invoice::find($invoice_id);
            $invoice_data = $request->session()->get('invoice_data');

            if($invoice && !empty($invoice_data))
            {
                try
                {
                    $ch = curl_init('https://api.razorpay.com/v1/payments/' . $pay_id . '');
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                    curl_setopt($ch, CURLOPT_USERPWD, $this->public_key . ':' . $this->secret_key); // Input your Razorpay Key Id and Secret Id here
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = json_decode(curl_exec($ch));

                    if($response->status == 'authorized')
                    {
                        $order_id                        = strtoupper(str_replace('.', '', uniqid('', true)));
                        $invoice_payment                 = new InvoicePayment();
                        $invoice_payment->order_id       = $order_id;
                        $invoice_payment->invoice_id     = $invoice->id;
                        $invoice_payment->currency       = $currentWorkspace->currency_code;
                        $invoice_payment->amount         = isset($invoice_data['total_price']) ? $invoice_data['total_price'] : 0;
                        $invoice_payment->payment_type   = 'Razorpay';
                        $invoice_payment->receipt        = '';
                        $invoice_payment->client_id      = $user->id;
                        $invoice_payment->txn_id         = $pay_id;
                        $invoice_payment->payment_status = 'succeeded';
                        $invoice_payment->save();

                        if(($invoice->getDueAmount() - $invoice_payment->amount) == 0)
                        {
                            $invoice->status = 'paid';
                            $invoice->save();
                        }else{
                            
                            $invoice->status = 'partialy paid';
                            $invoice->save();
                        }

                        $user1 = $currentWorkspace->id;
                        $settings  = Utility::getPaymentSetting($user1);
                        $total_amount =  $invoice->getDueAmounts($invoice->id);
                        $client           = Client::find($invoice->client_id);
                        $project_name = Project::where('id', $invoice->project_id)->first();


                        $uArr = [
                            // 'user_name' => $user->name,
                            'project_name' => $project_name->name,
                            'company_name' => User::find($project_name->created_by)->name,
                            'invoice_id' => Utility::invoiceNumberFormat($invoice->id),
                            'client_name' => $client->name,
                            'total_amount' => "$total_amount",
                            'paid_amount' => $request->amount,
                        ];
    
                        if (isset($settings['invoicest_notificaation']) && $settings['invoicest_notificaation'] == 1) {
    
                            Utility::send_slack_msg('Invoice Status Updated', $user1 , $uArr);
                        }
    
                        if (isset($settings['telegram_invoicest_notificaation']) && $settings['telegram_invoicest_notificaation'] == 1) {
                            Utility::send_telegram_msg('Invoice Status Updated' ,$uArr, $user1);
                        }

                        //webhook
                        $module ='Invoice Status Updated';
                        $webhook=  Utility::webhookSetting($module , $user1);

                        // $webhook=  Utility::webhookSetting($module);
                        if($webhook)
                        {
                            $parameter = json_encode($invoice);
                            // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
                            $status = Utility::WebhookCall($webhook['url'],$parameter,$webhook['method']);
                            // if($status == true)
                            // {
                            //     return redirect()->back()->with('success', __('Payment added Successfully!'));
                            // }
                            // else
                            // {
                            //     return redirect()->back()->with('error', __('Webhook call failed.'));
                            // }
                        }

                        $request->session()->forget('invoice_data');

                        return redirect()->back()->with('success', __('Payment added Successfully'));

                        if(\Auth::check())
                        {
                            return redirect()->route(
                                'client.invoices.show', [
                                                          $slug,
                                                          $invoice_id,
                                                      ]
                            )->with('success', __('Invoice paid Successfully!'));
                        }
                        else
                        {
                            return redirect()->route('pay.invoice',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($invoice->id)])->with('success', __('Payment added Successfully'));
                        }
                    }
                    else
                    {
                        if(\Auth::check())
                        {
                            return redirect()->route(
                                'client.invoices.show', [
                                                          $slug,
                                                          $invoice_id,
                                                      ]
                            )->with('error', __('Transaction has been failed.'));
                        }
                        else
                        {
                            return redirect()->route('pay.invoice',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($invoice->id)])->with('error', __('Transaction has been failed.'));
                        }
                        
                    }
                }
                catch(\Exception $e)
                {
                    if(\Auth::check())
                    {
                        return redirect()->route(
                            'client.invoices.show', [
                                                      $slug,
                                                      $invoice_id,
                                                  ]
                        )->with('error', __('Something went wrong.'));
                    }
                    else
                    {
                        return redirect()->route('pay.invoice',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($invoice->id)])->with('error', __('Something went wrong.'));
                    }
                    
                }
            }
            else
            {
                if(\Auth::check())
                {
                    return redirect()->route(
                        'client.invoices.show', [
                                                  $slug,
                                                  $invoice_id,
                                              ]
                    )->with('error', __('Invoice not found.'));
                }
                else
                {
                    return redirect()->route('pay.invoice',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($invoice->id)])->with('error', __('Invoice not found.'));
                }
                
            }
        }
        else
        {
            if(\Auth::check())
                {
                    return redirect()->route('client.invoices.index', $slug)->with('error', __('Invoice not found.'));
                 }
                else
                {
                    return redirect()->route('pay.invoice',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($invoice_id)])->with('error', __('Invoice not found.'));
                }
        }
    }
}
