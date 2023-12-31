<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workspace;
use App\Models\Utility;
use App\Models\UserWorkspace;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Mail\SendLoginDetail;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */


      public function __construct()
    {
        $this->middleware('guest');
    }


    public function create()
    {
        // return view('auth.register');
    }

    public function register(Request $request)
    {
       $user = User::create($request->validated());

       event(new Registered($user));

       auth()->login($user);

       return redirect('/')->with('success', "Account successfully registered.");
    }

  public function showRegistrationForm($lang = '')
    {
        if ($lang == '') {
            $lang = env('DEFAULT_LANG') ?? 'en';
        }

        \App::setLocale($lang);

        if(env('SIGNUP_BUTTON') == 'on'){
            return view('auth.register', compact('lang'));
        }else{
            return abort('404', 'Page not found');
        }
        // return view('auth.register', compact('lang'));
    }

    // public function store(Request $request)
    // {
    //     if(env('RECAPTCHA_MODULE') == 'on')
    //     {
    //         $validation['g-recaptcha-response'] = 'required|captcha';
    //     }else{
    //         $validation = [];
    //     }
    //     $this->validate($request, $validation);
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'workspace' => 'required', 'string', 'max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => ['required','string', 'min:8', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //          'workspace'=>$request->workspace,
    //         'password' => Hash::make($request->password),
    //         'plan'=>1,
    //     ]);

    //     $objWorkspace = Workspace::create(['created_by'=>$user->id,'name'=>$request->workspace, 'currency_code' => 'USD', 'paypal_mode' => 'sandbox']);

    //     $setting = Utility::getAdminPaymentSetting();

    //      $userWorkspace               =   new UserWorkspace();
    //         $userWorkspace->user_id      =     $user->id;
    //         $userWorkspace->workspace_id =    $objWorkspace->id;
    //         $userWorkspace->permission  = 'Owner';

    //            if(empty($userWorkspace))
    //         {
    //             $errorArray[] = $userWorkspace;
    //         }
    //         else
    //         {
    //             $userWorkspace->save();
    //         }
            
    //     $user->currant_workspace = $objWorkspace->id;
    //     $user->save();
    //     Auth::login($user);

    //     if($setting['email_verification'] == 'on'){

            
    //         try{
                
    //             event(new Registered($user));
    //             // UserWorkspace::create(['user_id'=> $user->id,'workspace_id'=>$objWorkspace->id,'permission'=>'Owner']);
    //             if(empty($lang))
    //             {
    //                 $lang = env('DEFAULT_LANG');
    //             }
    //             \App::setLocale($lang);

                
    //         }catch(\Exception $e){
                
    //             $user->delete();
                
    //             // dd($user);
    //             return redirect('/register/lang?')->with('statuss', __('Email SMTP settings does not configure so please contact to your site admin.'));
    //         }
            
    //         return view('auth.verify-email', compact('lang'));
    //     }else{

    //         $user->email_verified_at = date('h:i:s');
    //         // UserWorkspace::create(['user_id'=> $user->id,'workspace_id'=>$objWorkspace->id,'permission'=>'Owner']);
    //         $user->save();
    //         return redirect(RouteServiceProvider::HOME);
    //     }

    // }

    public function store(Request $request)
    {
        $setting = Utility::getAdminPaymentSetting();

        if(env('RECAPTCHA_MODULE') == 'on')
        {
            $validation['g-recaptcha-response'] = 'required|captcha';
        }else{
            $validation = [];
        }

        $this->validate($request, $validation);

        $request->validate([
            'name' => 'required|string|max:255',
            'workspace' => 'required', 'string', 'max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required','string', 'min:8', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'workspace'=>$request->workspace,
            'password'  => Hash::make($request->password),
            'plan'      =>1,
            'lang'      => env('DEFAULT_ADMIN_LANG'),
        ]);
        
        $objWorkspace = Workspace::create(['lang' => env('DEFAULT_ADMIN_LANG'), 'created_by'=>$user->id,'name'=>$request->workspace, 'currency_code' => 'USD', 'paypal_mode' => 'sandbox']);

        $setting = Utility::getAdminPaymentSetting();

        $userWorkspace               =   new UserWorkspace();
        $userWorkspace->user_id      =     $user->id;
        $userWorkspace->workspace_id =    $objWorkspace->id;
        $userWorkspace->permission  = 'Owner';

        if(empty($userWorkspace))
        {
            $errorArray[] = $userWorkspace;
        }
        else
        {
            $userWorkspace->save();
        }

           
        $user->currant_workspace = $objWorkspace->id;
        
        $user->save();
        
        User::userDefaultDataRegister($user);

        if($setting['email_verification'] == 'on')
        {
            Auth::login($user);

            try{
                
                event(new Registered($user));
                // UserWorkspace::create(['user_id'=> $user->id,'workspace_id'=>$objWorkspace->id,'permission'=>'Owner']);
                if(empty($lang))
                {
                    $lang = env('DEFAULT_LANG');
                }
                \App::setLocale($lang);

                
            }catch(\Exception $e){
                
                $user->delete();
                
                // dd($user);
                return redirect('/register/lang?')->with('statuss', __('Email SMTP settings does not configure so please contact to your site admin.'));
            }
            
            return view('auth.verify-email', compact('lang'));

        }else{

            $user->email_verified_at = date('h:i:s');
            // UserWorkspace::create(['user_id'=> $user->id,'workspace_id'=>$objWorkspace->id,'permission'=>'Owner']);
            $user->save();
            $user->password = $request->password;
            try
            {
                Mail::to($user->email)->send(new SendLoginDetail($user));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            Auth::login($user);
            
            return redirect(RouteServiceProvider::HOME);
        }

    }
}



