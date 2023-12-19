@extends('layouts.admin')
@section('page-title')
    {{ __('Settings') }}
@endsection
@php
    $setting = App\Models\Utility::getAdminPaymentSetting();
    if ($setting['color']) {
        $color = $setting['color'];
    }
    
@endphp

@php
    $logo = \App\Models\Utility::get_file('logo/');
    $meta_images = \App\Models\Utility::get_file('uploads/logo/');
    $file_type = config('files_types');
    
    $local_storage_validation = $setting['local_storage_validation'];
    $local_storage_validations = explode(',', $local_storage_validation);
    
    $s3_storage_validation = $setting['s3_storage_validation'];
    $s3_storage_validations = explode(',', $s3_storage_validation);
    
    $wasabi_storage_validation = $setting['wasabi_storage_validation'];
    $wasabi_storage_validations = explode(',', $wasabi_storage_validation);
    
@endphp

@section('links')
    @if (\Auth::guard('client')->check())
        <li class="breadcrumb-item"><a href="{{ route('client.home') }}">{{ __('Home') }}</a></li>
    @else
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    @endif
    <li class="breadcrumb-item"> {{ __('Settings') }}</li>
@endsection

@section('content')
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#brand-settings"
                                class="list-group-item list-group-item-action border-0">{{ __('Brand Settings') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#email-settings"
                                class="list-group-item list-group-item-action border-0 ">{{ __('Email Settings') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#payment-settings"
                                class="list-group-item list-group-item-action border-0">{{ __('Payment Settings') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#pusher-settings"
                                class="list-group-item list-group-item-action border-0">{{ __('Pusher Settings') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#recaptcha-settings"
                                class="list-group-item list-group-item-action border-0">{{ __('ReCaptcha Settings') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#storage-settings"
                                class="list-group-item list-group-item-action border-0">{{ __('Storage Settings') }} <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#seo"
                                class="list-group-item list-group-item-action border-0">{{ __('SEO Settings') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#cache" 
                                class="list-group-item list-group-item-action border-0">{{ __('Cache settings') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#cookie-settings" class="list-group-item list-group-item-action border-0">{{ __('Cookie Settings ') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#chat-gpt-settings" class="list-group-item list-group-item-action border-0">{{ __('ChatGPT Settings ') }}
                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-9">

                    <div id="brand-settings" class="">

                        {{ Form::open(['route' => 'settings.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                            <div class="row">


                                <div class="col-12">
                                    <div class="card ">
                                        <div class="card-header">
                                            <h5>{{ __('Brand Settings') }}</h5>

                                        </div>
                                        <div class="card-body">
                                            <div class="row mt-2">

                                                <div class="col-sm-4">
                                                    <div class="card ">
                                                        <div class="card-header">
                                                            <h5>{{ __('Dark Logo') }}</h5>

                                                        </div>
                                                        <div class="card-body">
                                                            <div class="logo-content">
                                                                <img id="dark_logo" style="filter: drop-shadow(2px 3px 7px #011c4b);" alt="yourimage"
                                                                    src="{{ asset($logo . 'logo-light.png') }}"
                                                                    class="small_logo">
                                                            </div>
                                                            <div class="choose-file mt-5 ">
                                                                <label for="logo_blue">
                                                                    <div class="bg-primary " style="cursor: pointer;transform: translateY(+110%);"> <i
                                                                            class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                                        </div>
                                                                            <input type="file" class=" form-control choose_file_custom" name="logo_blue" id="logo_blue " data-filename="edit-logo_blue">
                                                                </label>
                                                                <p class="edit-logo_blue"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="card ">
                                                        <div class="card-header">
                                                            <h5>{{ __('Light Logo') }}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="logo-content">

                                                                <img id="image" alt="yourimage" style="filter: drop-shadow(2px 3px 7px #011c4b);"
                                                                    src="{{ asset($logo . 'logo-dark.png') }}"
                                                                    class="small_logo">
                                                            </div>
                                                            <div class="choose-file mt-5 ">
                                                                <label for="logo_white">
                                                                    <div class=" bg-primary" style="cursor: pointer;transform: translateY(+110%);"> <i
                                                                            class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                                    </div>
                                                                    <input type="file" class="form-control choose_file_custom" name="logo_white"
                                                                        id="logo_white " data-filename="edit-logo_white">
                                                                </label>
                                                                <p class="edit-logo_white"></p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="card ">
                                                        <div class="card-header">
                                                            <h5>{{ __('Favicon') }}</h5>

                                                        </div>
                                                        <div class="card-body" >
                                                            <div class="logo-content">
                                                                <img src="{{ asset($logo . 'favicon.png') }}"
                                                                    class="small_logo" id="favicon"
                                                                    style="width: 60px !important;" />

                                                            </div>
                                                            <div class="choose-file mt-5 ">
                                                                <label for="small-favicon">
                                                                    <div class=" bg-primary" style="cursor: pointer;transform: translateY(+110%);"> <i
                                                                            class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                                    </div>
                                                                    <input type="file" class="form-control choose_file_custom" name="favicon"
                                                                        id="small-favicon" data-filename="edit-favicon">
                                                                </label>
                                                                <p class="edit-favicon"></p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {{ Form::label('app_name', __('App Name'), ['class' => 'form-label']) }}
                                                        {{ Form::text('app_name', env('APP_NAME'), ['class' => 'form-control', 'placeholder' => __('App Name')]) }}
                                                        @error('app_name')
                                                            <span class="invalid-app_name" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {{ Form::label('footer_text', __('Footer Text'), ['class' => 'form-label']) }}
                                                        {{ Form::text('footer_text', env('FOOTER_TEXT'), ['class' => 'form-control', 'placeholder' => __('Footer Text')]) }}
                                                        @error('footer_text')
                                                            <span class="invalid-footer_text" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    @php
                                                        $DEFAULT_LANG = env('DEFAULT_LANG') ? env('DEFAULT_LANG') : 'en';
                                                    @endphp
                                                    <div class="form-group">
                                                        {{ Form::label('default_language', __('Default Language'), ['class' => 'form-label']) }}
                                                        <div class="changeLanguage">
                                                            <select name="default_language" id="default_language"
                                                                class="form-control select2">
                                                                @foreach ($workspace->languages() as $lang)
                                                                    <option value="{{ $lang }}"
                                                                        @if ($DEFAULT_LANG == $lang) selected @endif>
                                                                        {{ ucfirst( \App\Models\Utility::getlang_fullname($lang)) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 ">
                                                        <div class="col switch-width">
                                                            <div class="form-group ml-2 mr-3">
                                                                <label
                                                                    class="form-label mb-1">{{ __('Enable Landing Page') }}</label>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" class=""
                                                                        name="display_landing" id="display_landing"
                                                                        {{ !empty(env('DISPLAY_LANDING')) && env('DISPLAY_LANDING') == 'on' ? 'checked="checked"' : '' }}>
                                                                    <label class="custom-control-label mb-1"
                                                                        for="status"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="col switch-width">
                                                            <div class="form-group ml-2 mr-3 ">
                                                                <label class="form-label mb-1">{{ __('Enable RTL') }}</label>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" class="" name="site_rtl"
                                                                        id="site_rtl"
                                                                        {{ !empty(env('SITE_RTL')) && env('SITE_RTL') == 'on' ? 'checked="checked"' : '' }}>
                                                                    <label class="custom-control-label"
                                                                        for="site_rtl"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-3">
                                                        <div class="col switch-width">
                                                            <div class="form-group ml-2 mr-3 ">
                                                                <label
                                                                    class="form-label mb-1">{{ __('Enable Sign-Up Page') }}</label>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" class=""
                                                                        name="SIGNUP_BUTTON" id="SIGNUP_BUTTON"
                                                                        {{ !empty(env('SIGNUP_BUTTON')) && env('SIGNUP_BUTTON') == 'on' ? 'checked="checked"' : '' }}>
                                                                    <label class="custom-control-label"
                                                                        for="SIGNUP_BUTTON"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="col switch-width">
                                                            <div class="form-group ml-2 mr-3 ">
                                                                <label
                                                                    class="form-label mb-1">{{ __('Enable Email Verification') }}</label>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" class=""
                                                                        name="email_verification" id="email_verification"
                                                                        {{ isset($payment_detail['email_verification']) && $payment_detail['email_verification'] == 'on' ? 'checked' : '' }}>
                                                                    <label class="custom-control-label"
                                                                        for="email_verification"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <h4 class="small-title mb-4">{{ __('Theme Customizer') }}</h4>
                                                <div class="col-12">
                                                    <div class="pct-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="">
                                                                    <i data-feather="credit-card" class="me-2"></i>{{ __('Primary
                                                                    color settings') }}
                                                                </h6>
                                                                <hr class="my-2" />
                                                                <div class="theme-color themes-color">
                                                                    <input type="hidden" name="color" id="color_value" value="{{ $color }}">
                                                                    <a href="#!" class="{{($color == 'theme-1') ? 'active_color' : ''}}" data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-1" style="display: none;">
                                                                    <a href="#!" class="{{($color == 'theme-2') ? 'active_color' : ''}} " data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-2" style="display: none;">
                                                                    <a href="#!" class="{{($color == 'theme-3') ? 'active_color' : ''}}" data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-3" style="display: none;">
                                                                    <a href="#!" class="{{($color == 'theme-4') ? 'active_color' : ''}}" data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-4" style="display: none;">
                                                                    <a href="#!" class="{{($color == 'theme-5') ? 'active_color' : ''}}" data-value="theme-5" onclick="check_theme('theme-5')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-5" style="display: none;">
                                                                    <br>
                                                                    <a href="#!" class="{{($color == 'theme-6') ? 'active_color' : ''}}" data-value="theme-6" onclick="check_theme('theme-6')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-6" style="display: none;">
                                                                    <a href="#!" class="{{($color == 'theme-7') ? 'active_color' : ''}}" data-value="theme-7" onclick="check_theme('theme-7')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-7" style="display: none;">
                                                                    <a href="#!" class="{{($color == 'theme-8') ? 'active_color' : ''}}" data-value="theme-8" onclick="check_theme('theme-8')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-8" style="display: none;">
                                                                    <a href="#!" class="{{($color == 'theme-9') ? 'active_color' : ''}}" data-value="theme-9" onclick="check_theme('theme-9')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-9" style="display: none;">
                                                                    <a href="#!" class="{{($color == 'theme-10') ? 'active_color' : ''}}" data-value="theme-10" onclick="check_theme('theme-10')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-10" style="display: none;">
                                                                </div>

                                                            </div>
                                                            <div class="col-sm-4">
                                                                <h6 class="">
                                                                    <i data-feather="layout" class="me-2"></i>{{ __('Sidebar
                                                                    settings') }}
                                                                </h6>
                                                                <hr class="my-2" />
                                                                <div class="form-check form-switch">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="cust-theme-bg" name="cust_theme_bg"
                                                                        @if ($setting['cust_theme_bg'] == 'on') checked @endif />

                                                                    <label class="form-check-label f-w-600 pl-1"
                                                                        for="cust-theme-bg">{{ __('Transparent layout') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <h6 class="">
                                                                    <i data-feather="sun" class=""></i>{{ __('Layout settings') }}
                                                                </h6>
                                                                <hr class=" my-2" />
                                                                <div class="form-check form-switch mt-2">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="cust-darklayout"
                                                                        name="cust_darklayout"@if ($setting['cust_darklayout'] == 'on') checked @endif />

                                                                    <label class="form-check-label f-w-600 pl-1"
                                                                        for="cust-darklayout">{{ __('Dark Layout') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <input type="submit" value="{{ __('Save Changes') }}"
                                                        class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        {{ Form::close() }}

                        <div id="email-settings" class="tab-pane">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="">
                                            {{ __('Email Settings') }}
                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                        {{ Form::open(['route' => 'email.settings.store', 'method' => 'post']) }}
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                {{ Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-label']) }}
                                                {{ Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver'), 'id' => 'mail_driver']) }}
                                                @error('mail_driver')
                                                    <span class="invalid-mail_driver" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                {{ Form::label('mail_host', __('Mail Host'), ['class' => 'form-label']) }}
                                                {{ Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Host')]) }}
                                                @error('mail_host')
                                                    <span class="invalid-mail_driver" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                {{ Form::label('mail_port', __('Mail Port'), ['class' => 'form-label']) }}
                                                {{ Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')]) }}
                                                @error('mail_port')
                                                    <span class="invalid-mail_port" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                {{ Form::label('mail_username', __('Mail Username'), ['class' => 'form-label']) }}
                                                {{ Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')]) }}
                                                @error('mail_username')
                                                    <span class="invalid-mail_username" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                {{ Form::label('mail_password', __('Mail Password'), ['class' => 'form-label']) }}
                                                {{ Form::text('mail_password', env('MAIL_PASSWORD'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')]) }}
                                                @error('mail_password')
                                                    <span class="invalid-mail_password" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                {{ Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'form-label']) }}
                                                {{ Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')]) }}
                                                @error('mail_encryption')
                                                    <span class="invalid-mail_encryption" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                {{ Form::label('mail_from_address', __('Mail From Address'), ['class' => 'form-label']) }}
                                                {{ Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')]) }}
                                                @error('mail_from_address')
                                                    <span class="invalid-mail_from_address" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                {{ Form::label('mail_from_name', __('Mail From Name'), ['class' => 'form-label']) }}
                                                {{ Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')]) }}
                                                @error('mail_from_name')
                                                    <span class="invalid-mail_from_name" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-lg-12 ">
                                            <div class="row">

                                                <div class="text-start col-6">
                                                    <a href="#" data-size="md"
                                                        data-url="{{ route('test.email') }}"
                                                        data-title="{{ __('Send Test Mail') }}"
                                                        class="btn  btn-primary send_email">
                                                        {{ __('Send Test Mail') }}
                                                    </a>

                                                </div>
                                                <div class="text-end col-6">
                                                    <input type="submit" value="{{ __('Save Changes') }}"
                                                        class="btn-submit btn btn-primary">
                                                </div>

                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="payment-settings" class="faq">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="">
                                                {{ __('Payment Settings') }}
                                            </h5>
                                            <small
                                                class="d-block mt-2">{{ __('These details will be used to collect subscription plan payments.Each subscription plan will have a payment button based on the below configuration.') }}</small>
                                        </div>
                                        <div class="card-body p-4">
                                            <form method="post" action="{{ route('payment.settings.store') }}"
                                                class="payment-form">
                                                @csrf
                                                <div class="row mt-3">
                                                    <div class="form-group col-md-6">
                                                        {{ Form::label('currency', __('Currency *'), ['class' => 'form-label']) }}
                                                        {{ Form::text('currency', env('CURRENCY'), ['class' => 'form-control font-style', 'required', 'placeholder' => __('Enter Currency')]) }}
                                                        <small>
                                                            {{ __('Note: Add currency code as per three-letter ISO code.') }}<br>
                                                            <a href="https://stripe.com/docs/currencies"
                                                                target="_blank">{{ __('You can find out how to do that here.') }}</a></small>
                                                        <br>
                                                        @error('currency')
                                                            <span class="invalid-currency" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        {{ Form::label('currency_symbol', __('Currency Symbol *'), ['class' => 'form-label']) }}
                                                        {{ Form::text('currency_symbol', env('CURRENCY_SYMBOL'), ['class' => 'form-control', 'required', 'placeholder' => __('Enter Currency Symbol')]) }}
                                                        @error('currency_symbol')
                                                            <span class="invalid-currency_symbol" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="accordion accordion-flush setting-accordion"
                                                            id="payment-gateways">

                                                            <div class="accordion-item">
                                                                <!-- manual payment -->
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button class="accordion-button py-0 px-4" id="" type="button" >
                                                                        <span class="d-flex align-items-center py-4 pl-3 collapsed" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapseOne" >
                                                                            {{ __('Manually') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">{{__('Enable:')}}</span>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_manual_enabled" value="off">
                                                                                <input type="checkbox" class="form-check-input"
                                                                                    name="is_manual_enabled" id="is_manual_enabled" 
                                                                                    {{ isset($payment_detail['is_manual_enabled']) && $payment_detail['is_manual_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label class="custom-control-label form-label"
                                                                                    for="is_manual_enabled"></label>
                                                                            </div>
                                                                        </div>
                                                                    </button>

                                                                </h2>
                                                                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row">
                                                                            <p>{{ __('Requesting manual payment for the planned amount for the subscription plan.')}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item">
                                                                <!-- Bank Transfer -->
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapseOne">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Bank Transfer') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">{{__('Enable:')}}</span>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_bank_enabled" value="off">
                                                                                <input type="checkbox" class="form-check-input"
                                                                                    name="is_bank_enabled" id="is_bank_enabled"
                                                                                    {{ isset($payment_detail['is_bank_enabled']) && $payment_detail['is_bank_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label class="custom-control-label form-label"
                                                                                    for="is_bank_enabled"></label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="form-group">
                                                                            {{ Form::label('bank_details', __('Bank Details'), ['class' => 'form-label']) }}
                                                                            {{ Form::textarea('bank_details',isset($payment_detail['bank_details']) ? $payment_detail['bank_details'] : '',['class' => 'form-control', 'rows'=>'6' , 'placeholder' => __('Bank Transfer Details')]) }}
                                                                            <small class="text-muted">
                                                                                {{__('Example:bank:bank name</br> Account Number:0000 0000</br>')}}
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item">
                                                                <!-- Stripe -->

                                                                <h2 class="accordion-header" id="stripe">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseone"
                                                                        aria-expanded="false" aria-controls="collapseone">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Stripe') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_stripe_enabled"
                                                                                    id="is_stripe_enabled" 
                                                                                    {{ isset($payment_detail['is_stripe_enabled']) && $payment_detail['is_stripe_enabled'] == 'on' ? 'checked' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label "
                                                                                    for="is_stripe_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div
                                                                                class="form-check form-switch d-inline-block">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_stripe_enabled"
                                                                                    id="is_stripe_enabled"
                                                                                    {{ isset($payment_detail['is_stripe_enabled']) && $payment_detail['is_stripe_enabled'] == 'on' ? 'checked' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_stripe_enabled">{{ __('Enable Stripe') }}</label>
                                                                        </div> --}}
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseone" class="accordion-collapse collapse"
                                                                    aria-labelledby="stripe"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('stripe_key', __('Stripe Key'), ['class' => 'form-label']) }}
                                                                                    {{ Form::text('stripe_key', isset($payment_detail['stripe_key']) && !empty($payment_detail['stripe_key']) ? $payment_detail['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Stripe Key')]) }}

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'form-label']) }}
                                                                                    {{ Form::text('stripe_secret', isset($payment_detail['stripe_secret']) && !empty($payment_detail['stripe_secret']) ? $payment_detail['stripe_secret'] : '', ['class' => 'form-control', 'placeholder' => __('Stripe Secret')]) }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- paypal -->

                                                                <h2 class="accordion-header" id="paypal">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsetwo"
                                                                        aria-expanded="false" aria-controls="collapsetwo">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Paypal') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_paypal_enabled"
                                                                                    id="is_paypal_enabled"
                                                                                    {{ isset($payment_detail['is_paypal_enabled']) && $payment_detail['is_paypal_enabled'] == 'on' ? 'checked' : '' }}><label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paypal_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapsetwo" class="accordion-collapse collapse"
                                                                    aria-labelledby="paypal"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                                            <div class="row pt-2 form-group">
                                                                                <label class="pb-2"
                                                                                    for="paypal_mode">{{ __('Paypal Mode') }}</label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "
                                                                                                name="paypal_mode"
                                                                                                value="sandbox"
                                                                                                {{ !isset($payment_detail['paypal_mode']) || empty($payment_detail['paypal_mode']) || $payment_detail['paypal_mode'] == 'sandbox' ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Sandbox') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="paypal_mode"
                                                                                                value="live"
                                                                                                {{ isset($payment_detail['paypal_mode']) && $payment_detail['paypal_mode'] == 'live' ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Live') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('paypal_client_id', __('Client ID'), ['class' => 'form-label']) }}
                                                                                    {{ Form::text('paypal_client_id', isset($payment_detail['paypal_client_id']) ? $payment_detail['paypal_client_id'] : '', ['class' => 'form-control', 'placeholder' => __('Client ID')]) }}

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('paypal_secret_key', __('Secret Key'), ['class' => 'form-label']) }}
                                                                                    {{ Form::text('paypal_secret_key', isset($payment_detail['paypal_secret_key']) ? $payment_detail['paypal_secret_key'] : '', ['class' => 'form-control', 'placeholder' => __('Secret Key')]) }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- paystack -->

                                                                <h2 class="accordion-header" id="paystack">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsethree"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapsethree">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Paystack') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_paystack_enabled"
                                                                                    id="is_paystack_enabled"
                                                                                    {{ isset($payment_detail['is_paystack_enabled']) && $payment_detail['is_paystack_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paystack_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapsethree"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="paystack"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">

                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paypal_client_id">{{ __('Public Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="paystack_public_key"
                                                                                        id="paystack_public_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['paystack_public_key']) ? $payment_detail['paystack_public_key'] : '' }}"
                                                                                        placeholder="{{ __('Public Key') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paystack_secret_key">{{ __('Secret Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="paystack_secret_key"
                                                                                        id="paystack_secret_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['paystack_secret_key']) ? $payment_detail['paystack_secret_key'] : '' }}"
                                                                                        placeholder="{{ __('Secret Key') }}" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- Flutterwave -->

                                                                <h2 class="accordion-header" id="Flutterwave">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsefor"
                                                                        aria-expanded="false" aria-controls="collapsefor">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Flutterwave') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_flutterwave_enabled"
                                                                                    id="is_flutterwave_enabled"
                                                                                    {{ isset($payment_detail['is_flutterwave_enabled']) && $payment_detail['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : '' }}><label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_flutterwave_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapsefor" class="accordion-collapse collapse"
                                                                    aria-labelledby="Flutterwave"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">

                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paypal_client_id">{{ __('Public Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="flutterwave_public_key"
                                                                                        id="flutterwave_public_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['flutterwave_public_key']) ? $payment_detail['flutterwave_public_key'] : '' }}"
                                                                                        placeholder="{{ __('Public Key') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paystack_secret_key">{{ __('Secret Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="flutterwave_secret_key"
                                                                                        id="flutterwave_secret_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['flutterwave_secret_key']) ? $payment_detail['flutterwave_secret_key'] : '' }}"
                                                                                        placeholder="{{ __('Secret Key') }}" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- Razorpay -->

                                                                <h2 class="accordion-header" id="Razorpay">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsefive"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapsefive">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Razorpay') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_razorpay_enabled"
                                                                                    id="is_razorpay_enabled"
                                                                                    {{ isset($payment_detail['is_razorpay_enabled']) && $payment_detail['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : '' }}><label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_razorpay_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapsefive" class="accordion-collapse collapse"
                                                                    aria-labelledby="Razorpay"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">

                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="razorpay_public_key">{{ __('Public Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="razorpay_public_key"
                                                                                        id="razorpay_public_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['razorpay_public_key']) ? $payment_detail['razorpay_public_key'] : '' }}"
                                                                                        placeholder="{{ __('Public Key') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paystack_secret_key">{{ __('Secret Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="razorpay_secret_key"
                                                                                        id="razorpay_secret_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['razorpay_secret_key']) ? $payment_detail['razorpay_secret_key'] : '' }}"
                                                                                        placeholder="{{ __('Secret Key') }}" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- Mercado Pago -->

                                                                <h2 class="accordion-header" id="mercado">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsetsix"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapsetsix">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Mercado Pago') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_mercado_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_mercado_enabled"
                                                                                    id="is_mercado_enabled"
                                                                                    {{ isset($payment_detail['is_mercado_enabled']) && $payment_detail['is_mercado_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_mercado_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapsetsix" class="accordion-collapse collapse"
                                                                    aria-labelledby="mercado"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                                            <div class="row pt-2">
                                                                                <label class="pb-2"
                                                                                    for="paypal_mode">{{ __('Mercado Mode') }}</label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="mercado_mode"
                                                                                                value="sandbox"
                                                                                                {{ (isset($payment_detail['mercado_mode']) && $payment_detail['mercado_mode'] == '') || (isset($payment_detail['mercado_mode']) && $payment_detail['mercado_mode'] == 'sandbox') ? 'checked' : '' }}>


                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Sandbox') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="mercado_mode"
                                                                                                value="live"
                                                                                                {{ isset($payment_detail['mercado_mode']) && $payment_detail['mercado_mode'] == 'live' ? 'checked="checked"' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Live') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-12">
                                                                                <label for="mercado_access_token"
                                                                                    class="form-label">{{ __('Access Token') }}</label>
                                                                                <input type="text"
                                                                                    name="mercado_access_token"
                                                                                    id="mercado_access_token"
                                                                                    class="form-control"
                                                                                    value="{{ isset($payment_detail['mercado_access_token']) ? $payment_detail['mercado_access_token'] : '' }}"
                                                                                    placeholder="{{ __('Access Token') }}" />
                                                                                @if ($errors->has('mercado_secret_key'))
                                                                                    <span class="invalid-feedback d-block">
                                                                                        {{ $errors->first('mercado_access_token') }}
                                                                                    </span>
                                                                                @endif
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- Paytm -->

                                                                <h2 class="accordion-header" id="Paytm">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapset7" aria-expanded="false"
                                                                        aria-controls="collapset7">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Paytm') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_paytm_enabled"
                                                                                    id="is_paytm_enabled"
                                                                                    {{ isset($payment_detail['is_paytm_enabled']) && $payment_detail['is_paytm_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paytm_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapset7" class="accordion-collapse collapse"
                                                                    aria-labelledby="Paytm"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                                            <div class="row pt-2">
                                                                                <label class="pb-2"
                                                                                    for="paypal_mode">{{ __('Paytm Environment') }}</label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="paytm_mode"
                                                                                                value="local"
                                                                                                {{ (isset($payment_detail['paytm_mode']) && $payment_detail['paytm_mode'] == '') || (isset($payment_detail['paytm_mode']) && $payment_detail['paytm_mode'] == 'local') ? 'checked="checked"' : '' }}>


                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Local') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary"name="paytm_mode"
                                                                                                value="production"
                                                                                                {{ isset($payment_detail['paytm_mode']) && $payment_detail['paytm_mode'] == 'production' ? 'checked="checked"' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Production') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paytm_public_key">{{ __('Merchant ID') }}</label>
                                                                                    <input type="text"
                                                                                        name="paytm_merchant_id"
                                                                                        id="paytm_merchant_id"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['paytm_merchant_id']) ? $payment_detail['paytm_merchant_id'] : '' }}"
                                                                                        placeholder="{{ __('Merchant ID') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paytm_secret_key">{{ __('Merchant Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="paytm_merchant_key"
                                                                                        id="paytm_merchant_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['paytm_merchant_key']) ? $payment_detail['paytm_merchant_key'] : '' }}"
                                                                                        placeholder="{{ __('Merchant Key') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paytm_industry_type">{{ __('Industry Type') }}</label>
                                                                                    <input type="text"
                                                                                        name="paytm_industry_type"
                                                                                        id="paytm_industry_type"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['paytm_industry_type']) ? $payment_detail['paytm_industry_type'] : '' }}"
                                                                                        placeholder="{{ __('Industry Type') }}" />
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- Mollie -->

                                                                <h2 class="accordion-header" id="Mollie">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapset8" aria-expanded="false"
                                                                        aria-controls="collapset8">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Mollie') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"name="is_mollie_enabled"
                                                                                    id="is_mollie_enabled"
                                                                                    {{ isset($payment_detail['is_mollie_enabled']) && $payment_detail['is_mollie_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_mollie_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapset8" class="accordion-collapse collapse"
                                                                    aria-labelledby="Mollie"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-4 col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="mollie_api_key">{{ __('Mollie Api Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="mollie_api_key"
                                                                                        id="mollie_api_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['mollie_api_key']) ? $payment_detail['mollie_api_key'] : '' }}"
                                                                                        placeholder="{{ __('Mollie Api Key') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div class=" col-md-4 col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="mollie_profile_id">{{ __('Mollie Profile Id') }}</label>
                                                                                    <input type="text"
                                                                                        name="mollie_profile_id"
                                                                                        id="mollie_profile_id"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['mollie_profile_id']) ? $payment_detail['mollie_profile_id'] : '' }}"
                                                                                        placeholder="{{ __('Mollie Profile Id') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="mollie_partner_id">{{ __('Mollie Partner Id') }}</label>
                                                                                    <input type="text"
                                                                                        name="mollie_partner_id"
                                                                                        id="mollie_partner_id"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['mollie_partner_id']) ? $payment_detail['mollie_partner_id'] : '' }}"
                                                                                        placeholder="{{ __('Mollie Partner Id') }}" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- Skrill -->

                                                                <h2 class="accordion-header" id="Skrill">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapset9" aria-expanded="false"
                                                                        aria-controls="collapset9">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Skrill') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"name="is_skrill_enabled"
                                                                                    id="is_skrill_enabled"
                                                                                    {{ isset($payment_detail['is_skrill_enabled']) && $payment_detail['is_skrill_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_skrill_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapset9" class="accordion-collapse collapse"
                                                                    aria-labelledby="Skrill"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div
                                                                                class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="">{{ __('Skrill Email') }}</label>
                                                                                    <input type="email"
                                                                                        name="skrill_email"
                                                                                        id="skrill_email"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['skrill_email']) ? $payment_detail['skrill_email'] : '' }}"
                                                                                        placeholder="{{ __('Skrill Email') }}" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- CoinGate -->

                                                                <h2 class="accordion-header" id="CoinGate">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapset10"
                                                                        aria-expanded="false" aria-controls="collapset10">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('CoinGate') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_coingate_enabled"
                                                                                    id="is_coingate_enabled"
                                                                                    {{ isset($payment_detail['is_coingate_enabled']) && $payment_detail['is_coingate_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_mercado_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapset10" class="accordion-collapse collapse"
                                                                    aria-labelledby="CoinGate"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                                            <div class="row pt-2">
                                                                                <label class="pb-2"
                                                                                    for="paypal_mode">{{ __('CoinGate Mode') }}</label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="coingate_mode"
                                                                                                value="sandbox"
                                                                                                {{ (isset($payment_detail['coingate_mode']) && $payment_detail['coingate_mode'] == '') || (isset($payment_detail['coingate_mode']) && $payment_detail['coingate_mode'] == 'sandbox') ? 'checked="checked"' : '' }}>


                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Sandbox') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary name="coingate_mode"
                                                                                                value="live"
                                                                                                {{ isset($payment_detail['coingate_mode']) && $payment_detail['coingate_mode'] == 'live' ? 'checked="checked"' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Live') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div
                                                                                class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="coingate_auth_token">{{ __('CoinGate Auth Token') }}</label>
                                                                                    <input type="text"
                                                                                        name="coingate_auth_token"
                                                                                        id="coingate_auth_token"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['coingate_auth_token']) ? $payment_detail['coingate_auth_token'] : '' }}"
                                                                                        placeholder="{{ __('CoinGate Auth Token') }}" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- Paymentwall -->

                                                                <h2 class="accordion-header" id="Paymentwall">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse11" aria-expanded="false"
                                                                        aria-controls="collapse11">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Paymentwall') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_paymentwall_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_paymentwall_enabled"
                                                                                    id="is_paymentwall_enabled"
                                                                                    {{ isset($payment_detail['is_paymentwall_enabled']) && $payment_detail['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paymentwall_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse11" class="accordion-collapse collapse"
                                                                    aria-labelledby="Paymentwall"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="paymentwall_public_key"
                                                                                        class="form-label">{{ __('Public Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="paymentwall_public_key"
                                                                                        id="paymentwall_public_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['paymentwall_public_key']) ? $payment_detail['paymentwall_public_key'] : '' }}"
                                                                                        placeholder="{{ __('Public Key') }}" />
                                                                                    @if ($errors->has('paymentwall_public_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('paymentwall_public_key') }}
                                                                                        </span>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="paymentwall_private_key"
                                                                                        class="form-label">{{ __('Private Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="paymentwall_private_key"
                                                                                        id="paymentwall_private_key"
                                                                                        class="form-control form-control-label"
                                                                                        value="{{ isset($payment_detail['paymentwall_private_key']) ? $payment_detail['paymentwall_private_key'] : '' }}"
                                                                                        placeholder="{{ __('Private Key') }}" />
                                                                                    @if ($errors->has('paymentwall_private_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('paymentwall_private_key') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- toyyibpay -->

                                                                <h2 class="accordion-header" id="toyyibpay">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse12" aria-expanded="false"
                                                                        aria-controls="collapse12">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Toyyibpay') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_toyyibpay_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_toyyibpay_enabled"
                                                                                    id="is_toyyibpay_enabled"
                                                                                    {{ isset($payment_detail['is_toyyibpay_enabled']) && $payment_detail['is_toyyibpay_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_toyyibpay_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse12" class="accordion-collapse collapse"
                                                                    aria-labelledby="Paymentwall"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="toyyibpay_secret_key"
                                                                                        class="form-label">{{ __('Secret_key') }}</label>
                                                                                    <input type="text"
                                                                                        name="toyyibpay_secret_key"
                                                                                        id="toyyibpay_secret_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['toyyibpay_secret_key']) ? $payment_detail['toyyibpay_secret_key'] : '' }}"
                                                                                        placeholder="{{ __('Public Key') }}" />
                                                                                    @if ($errors->has('toyyibpay_secret_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('toyyibpay_secret_key') }}
                                                                                        </span>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="toyyibpay_category_code"
                                                                                        class="form-label">{{ __('Category Code') }}</label>
                                                                                    <input type="text"
                                                                                        name="toyyibpay_category_code"
                                                                                        id="toyyibpay_category_code"
                                                                                        class="form-control form-control-label"
                                                                                        value="{{ isset($payment_detail['toyyibpay_category_code']) ? $payment_detail['toyyibpay_category_code'] : '' }}"
                                                                                        placeholder="{{ __('Category Code') }}" />
                                                                                    @if ($errors->has('toyyibpay_category_code'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('toyyibpay_category_code') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- payfast -->

                                                                <h2 class="accordion-header" id="payfast">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse13" aria-expanded="false"
                                                                        aria-controls="collapse13">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Payfast') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_payfast_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_payfast_enabled"
                                                                                    id="is_payfast_enabled"
                                                                                    {{ isset($payment_detail['is_payfast_enabled']) && $payment_detail['is_payfast_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_payfast_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse13" class="accordion-collapse collapse"
                                                                    aria-labelledby="Paymentwall"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                                            <div class="row pt-2">
                                                                                <label class="pb-2"
                                                                                    for="payfast_mode">{{ __('Payfast Mode') }}</label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "
                                                                                                name="payfast_mode"
                                                                                                value="sandbox"
                                                                                                {{ !isset($payment_detail['payfast_mode']) || empty($payment_detail['payfast_mode']) || $payment_detail['payfast_mode'] == 'sandbox' ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Sandbox') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="payfast_mode"
                                                                                                value="live"
                                                                                                {{ isset($payment_detail['payfast_mode']) && $payment_detail['payfast_mode'] == 'live' ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Live') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="payfast_merchant_key"
                                                                                        class="form-label">{{ __('Merchant Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="payfast_merchant_key"
                                                                                        id="payfast_merchant_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['payfast_merchant_key']) ? $payment_detail['payfast_merchant_key'] : '' }}"
                                                                                        placeholder="{{ __('Merchant Key') }}" />
                                                                                    @if ($errors->has('payfast_merchant_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('payfast_merchant_key') }}
                                                                                        </span>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="payfast_merchant_id"
                                                                                        class="form-label">{{ __('Merchant ID ') }}</label>
                                                                                    <input type="text"
                                                                                        name="payfast_merchant_id"
                                                                                        id="payfast_merchant_id"
                                                                                        class="form-control form-control-label"
                                                                                        value="{{ isset($payment_detail['payfast_merchant_id']) ? $payment_detail['payfast_merchant_id'] : '' }}"
                                                                                        placeholder="{{ __('Merchant ID') }}" />
                                                                                    @if ($errors->has('payfast_merchant_id'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('payfast_merchant_id') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="payfast_signature"
                                                                                        class="form-label">{{ __('Payfast Signature') }}</label>
                                                                                    <input type="text"
                                                                                        name="payfast_signature"
                                                                                        id="payfast_signature"
                                                                                        class="form-control form-control-label"
                                                                                        value="{{ isset($payment_detail['payfast_signature']) ? $payment_detail['payfast_signature'] : '' }}"
                                                                                        placeholder="{{ __('Payfast Signature') }}" />
                                                                                    @if ($errors->has('payfast_signature'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('payfast_signature') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- IyziPay -->

                                                                <h2 class="accordion-header" id="iyzipay">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsetwo"
                                                                        aria-expanded="false" aria-controls="collapsetwo">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Iyzipay') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_iyzipay_enabled"
                                                                                    id="is_iyzipay_enabled"
                                                                                    {{ isset($payment_detail['is_iyzipay_enabled']) && $payment_detail['is_iyzipay_enabled'] == 'on' ? 'checked' : '' }}><label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_iyzipay_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapsetwo" class="accordion-collapse collapse"
                                                                    aria-labelledby="paypal"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div
                                                                            class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                                            <div class="row pt-2 form-group">
                                                                                <label class="pb-2"
                                                                                    for="iyzipay_mode">{{ __('Iyzipay Mode') }}</label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "
                                                                                                name="iyzipay_mode"
                                                                                                value="sandbox"
                                                                                                {{ !isset($payment_detail['iyzipay_mode']) || empty($payment_detail['iyzipay_mode']) || $payment_detail['iyzipay_mode'] == 'sandbox' ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Sandbox') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="iyzipay_mode"
                                                                                                value="live"
                                                                                                {{ isset($payment_detail['iyzipay_mode']) && $payment_detail['iyzipay_mode'] == 'live' ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Live') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('iyzipay_api_key', __('Api Key'), ['class' => 'form-label']) }}
                                                                                    {{ Form::text('iyzipay_api_key', isset($payment_detail['iyzipay_api_key']) ? $payment_detail['iyzipay_api_key'] : '', ['class' => 'form-control', 'placeholder' => __('Api Key')]) }}

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('iyzipay_secret_key', __('Secret Key'), ['class' => 'form-label']) }}
                                                                                    {{ Form::text('iyzipay_secret_key', isset($payment_detail['iyzipay_secret_key']) ? $payment_detail['iyzipay_secret_key'] : '', ['class' => 'form-control', 'placeholder' => __('Secret Key')]) }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- sspay -->

                                                                <h2 class="accordion-header" id="sspay">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse123" aria-expanded="false"
                                                                        aria-controls="collapse123">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('SSpay') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_sspay_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_sspay_enabled"
                                                                                    id="is_sspay_enabled"
                                                                                    {{ isset($payment_detail['is_sspay_enabled']) && $payment_detail['is_sspay_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_sspay_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse123" class="accordion-collapse collapse"
                                                                    aria-labelledby="Paymentwall"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="sspay_secret_key"
                                                                                        class="form-label">{{ __('Secret_key') }}</label>
                                                                                    <input type="text"
                                                                                        name="sspay_secret_key"
                                                                                        id="sspay_secret_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['sspay_secret_key']) ? $payment_detail['sspay_secret_key'] : '' }}"
                                                                                        placeholder="{{ __('Secret Key') }}" />
                                                                                    @if ($errors->has('sspay_secret_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('sspay_secret_key') }}
                                                                                        </span>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="sspay_category_code"
                                                                                        class="form-label">{{ __('Category Code') }}</label>
                                                                                    <input type="text"
                                                                                        name="sspay_category_code"
                                                                                        id="sspay_category_code"
                                                                                        class="form-control form-control-label"
                                                                                        value="{{ isset($payment_detail['sspay_category_code']) ? $payment_detail['sspay_category_code'] : '' }}"
                                                                                        placeholder="{{ __('Category Code') }}" />
                                                                                    @if ($errors->has('sspay_category_code'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('sspay_category_code') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- paytab -->
                                                                <h2 class="accordion-header" id="paytab">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse101" aria-expanded="false"
                                                                        aria-controls="collapse101">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Paytab') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_paytab_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_paytab_enabled"
                                                                                    id="is_paytab_enabled"
                                                                                    {{ isset($payment_detail['is_paytab_enabled']) && $payment_detail['is_paytab_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paytab_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse101" class="accordion-collapse collapse"
                                                                    aria-labelledby="Paymentwall"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="paytabs_profile_id"
                                                                                        class="form-label">{{ __('Paytabs Profile Id') }}</label>
                                                                                    <input type="text"
                                                                                        name="paytabs_profile_id"
                                                                                        id="paytabs_profile_id"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['paytabs_profile_id']) ? $payment_detail['paytabs_profile_id'] : '' }}"
                                                                                        placeholder="{{ __('Paytabs Profile Id') }}" />
                                                                                    @if ($errors->has('paytabs_profile_id'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('paytabs_profile_id') }}
                                                                                        </span>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="paytab_server_key"
                                                                                        class="form-label">{{ __('Paytab Server Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="paytab_server_key"
                                                                                        id="paytab_server_key"
                                                                                        class="form-control form-control-label"
                                                                                        value="{{ isset($payment_detail['paytab_server_key']) ? $payment_detail['paytab_server_key'] : '' }}"
                                                                                        placeholder="{{ __('Paytab Server Key') }}" />
                                                                                    @if ($errors->has('paytab_server_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('paytab_server_key') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="paytabs_region"
                                                                                        class="form-label">{{ __('Paytab Region') }}</label>
                                                                                    <input type="text"
                                                                                        name="paytabs_region"
                                                                                        id="paytabs_region"
                                                                                        class="form-control form-control-label"
                                                                                        value="{{ isset($payment_detail['paytabs_region']) ? $payment_detail['paytabs_region'] : '' }}"
                                                                                        placeholder="{{ __('Paytab Region') }}" />
                                                                                    @if ($errors->has('paytabs_region'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('paytabs_region') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- benefit -->
                                                                <h2 class="accordion-header" id="benefit">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse102" aria-expanded="false"
                                                                        aria-controls="collapse102">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Benefit') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_benefit_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_benefit_enabled"
                                                                                    id="is_benefit_enabled"
                                                                                    {{ isset($payment_detail['is_benefit_enabled']) && $payment_detail['is_benefit_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_benefit_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse102" class="accordion-collapse collapse"
                                                                    aria-labelledby="Paymentwall"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="benefit_secret_key"
                                                                                        class="form-label">{{ __('Secret API Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="benefit_secret_key"
                                                                                        id="benefit_secret_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['benefit_secret_key']) ? $payment_detail['benefit_secret_key'] : '' }}"
                                                                                        placeholder="{{ __('Secret API Key') }}" />
                                                                                    @if ($errors->has('benefit_secret_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('benefit_secret_key') }}
                                                                                        </span>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="benefit_publishable_key"
                                                                                        class="form-label">{{ __('Publishable API Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="benefit_publishable_key"
                                                                                        id="benefit_publishable_key"
                                                                                        class="form-control form-control-label"
                                                                                        value="{{ isset($payment_detail['benefit_publishable_key']) ? $payment_detail['benefit_publishable_key'] : '' }}"
                                                                                        placeholder="{{ __('Publishable API Key') }}" />
                                                                                    @if ($errors->has('benefit_publishable_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('benefit_publishable_key') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- cashfree -->
                                                                <h2 class="accordion-header" id="cashfree">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse103" aria-expanded="false"
                                                                        aria-controls="collapse103">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Cashfree') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_cashfree_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_cashfree_enabled"
                                                                                    id="is_cashfree_enabled"
                                                                                    {{ isset($payment_detail['is_cashfree_enabled']) && $payment_detail['is_cashfree_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_cashfree_enabled">{{ __('') }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse103" class="accordion-collapse collapse"
                                                                    aria-labelledby="Paymentwall"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="cashfree_api_key"
                                                                                        class="form-label">{{ __('Cashfree Api Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="cashfree_api_key"
                                                                                        id="cashfree_api_key"
                                                                                        class="form-control"
                                                                                        value="{{ isset($payment_detail['cashfree_api_key']) ? $payment_detail['cashfree_api_key'] : '' }}"
                                                                                        placeholder="{{ __('Cashfree Api Key') }}" />
                                                                                    @if ($errors->has('cashfree_api_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('cashfree_api_key') }}
                                                                                        </span>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="cashfree_secret_key"
                                                                                        class="form-label">{{ __('Cashfree Secret Key') }}</label>
                                                                                    <input type="text"
                                                                                        name="cashfree_secret_key"
                                                                                        id="cashfree_secret_key"
                                                                                        class="form-control form-control-label"
                                                                                        value="{{ isset($payment_detail['cashfree_secret_key']) ? $payment_detail['cashfree_secret_key'] : '' }}"
                                                                                        placeholder="{{ __('Cashfree Secret Key') }}" />
                                                                                    @if ($errors->has('cashfree_secret_key'))
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            {{ $errors->first('cashfree_secret_key') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingTwenty-One">
                                                                    <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwenty-One"
                                                                        aria-expanded="true" aria-controls="collapseTwenty-One">
                                                                        <span class="d-flex align-items-center">
                                                                            {{ __('Aamarpay') }}
                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <label class="form-check-label m-1"
                                                                                for="is_aamarpay_enabled">{{ __('Enable') }}</label>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_aamarpay_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input input-primary"
                                                                                    name="is_aamarpay_enabled" id="is_aamarpay_enabled"
                                                                                    {{ isset($payment_detail['is_aamarpay_enabled']) && $payment_detail['is_aamarpay_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseTwenty-One" class="accordion-collapse collapse"
                                                                    aria-labelledby="headingTwenty-One" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
                                                                            <div class="row pt-2 form-group">
                                                                                <label class="pb-2"
                                                                                    for="aamarpay_mode">{{ __('Aamarpay Mode') }}</label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "
                                                                                                name="aamarpay_mode"
                                                                                                value="sandbox"
                                                                                                {{ !isset($payment_detail['aamarpay_mode']) || empty($payment_detail['aamarpay_mode']) || $payment_detail['aamarpay_mode'] == 'sandbox' ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Sandbox') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="aamarpay_mode"
                                                                                                value="live"
                                                                                                {{ isset($payment_detail['aamarpay_mode']) && $payment_detail['aamarpay_mode'] == 'live' ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong>{{ __('Live') }}</span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('aamarpay_store_id', __('Store Id'), ['class' => 'form-label']) }}
                                                                                    {{ Form::text('aamarpay_store_id', isset($payment_detail['aamarpay_store_id']) ? $payment_detail['aamarpay_store_id'] : '', ['class' => 'form-control', 'placeholder' => __('Store Id')]) }}<br>
                                                                                    @if ($errors->has('aamarpay_store_id'))
                                                                                        <span class="invalid-feedback d-block">
                                                                                            {{ $errors->first('aamarpay_store_id') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('aamarpay_signature_key', __('Signature Key'), ['class' => 'form-label']) }}
                                                                                    {{ Form::text('aamarpay_signature_key', isset($payment_detail['aamarpay_signature_key']) ? $payment_detail['aamarpay_signature_key'] : '', ['class' => 'form-control', 'placeholder' => __('Signature Key')]) }}<br>
                                                                                    @if ($errors->has('aamarpay_signature_key'))
                                                                                        <span class="invalid-feedback d-block">
                                                                                            {{ $errors->first('aamarpay_signature_key') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    {{ Form::label('aamarpay_description', __('Description'), ['class' => 'form-label']) }}
                                                                                    {{ Form::text('aamarpay_description', isset($payment_detail['aamarpay_description']) ? $payment_detail['aamarpay_description'] : '', ['class' => 'form-control', 'placeholder' => __('Description')]) }}<br>
                                                                                    @if ($errors->has('aamarpay_description'))
                                                                                        <span class="invalid-feedback d-block">
                                                                                            {{ $errors->first('aamarpay_description') }}
                                                                                        </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="text-end py-3">
                                                        <button type="submit"
                                                        class="btn-submit btn btn-primary">{{ __('Save Changes') }}</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="pusher-settings" class="card">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('pusher.settings.store') }}"
                                    accept-charset="UTF-8">
                                    @csrf
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="">{{ __('Pusher Settings') }}</h5>
                                            </div>
                                            <div class=" col-6 text-end">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3 ">
                                                        <div class="custom-control custom-switch">
                                                            <label class="custom-control-label form-control-label px-2"
                                                                for="enable_chat ">{{ __('Enable Chat') }}</label>
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="enable_chat" id="enable_chat"
                                                                {{ !empty(env('CHAT_MODULE')) && env('CHAT_MODULE') == 'on' ? 'checked="checked"' : '' }}>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body p-3">

                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="pusher_app_id"
                                                    class="form-label">{{ __('Pusher App Id') }}</label>
                                                <input class="form-control" placeholder="Enter Pusher App Id"
                                                    name="pusher_app_id" type="text"
                                                    value="{{ env('PUSHER_APP_ID') }}" id="pusher_app_id" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="pusher_app_key"
                                                    class="form-label">{{ __('Pusher App Key') }}</label>
                                                <input class="form-control " placeholder="Enter Pusher App Key"
                                                    name="pusher_app_key" type="text"
                                                    value="{{ env('PUSHER_APP_KEY') }}" id="pusher_app_key" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="pusher_app_secret"
                                                    class="form-label">{{ __('Pusher App Secret') }}</label>
                                                <input class="form-control " placeholder="Enter Pusher App Secret"
                                                    name="pusher_app_secret" type="text"
                                                    value="{{ env('PUSHER_APP_SECRET') }}" id="pusher_app_secret"
                                                    required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="pusher_app_cluster"
                                                    class="form-label">{{ __('Pusher App Cluster') }}</label>
                                                <input class="form-control " placeholder="Enter Pusher App Cluster"
                                                    name="pusher_app_cluster" type="text"
                                                    value="{{ env('PUSHER_APP_CLUSTER') }}" id="pusher_app_cluster"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="text-end p-2">
                                            <input type="submit" value="{{ __('Save Changes') }}"
                                                class="btn-submit btn btn-primary">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="recaptcha-settings" class="card">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('recaptcha.settings.store') }}"
                                    accept-charset="UTF-8">
                                    @csrf
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="">{{ __('ReCaptcha Settings') }}</h5>
                                                <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                    target="_blank" class="text-blue ">
                                                    <small
                                                        class="d-block mt-2">({{ __('How to Get Google reCaptcha Site and Secret key') }})</small>
                                                </a>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3 ">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="recaptcha_module" id="recaptcha_module"
                                                                {{ !empty(env('RECAPTCHA_MODULE')) && env('RECAPTCHA_MODULE') == 'on' ? 'checked="checked"' : '' }}>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="google_recaptcha_key"
                                                    class="form-label">{{ __('Google Recaptcha Key') }}</label>
                                                <input class="form-control"
                                                    placeholder="{{ __('Enter Google Recaptcha Key') }}"
                                                    name="google_recaptcha_key" type="text"
                                                    value="{{ env('NOCAPTCHA_SITEKEY') }}" id="google_recaptcha_key"
                                                    required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="google_recaptcha_secret"
                                                    class="form-label">{{ __('Google Recaptcha Secret') }}</label>
                                                <input class="form-control "
                                                    placeholder="{{ __('Enter Google Recaptcha Secret') }}"
                                                    name="google_recaptcha_secret" type="text"
                                                    value="{{ env('NOCAPTCHA_SECRET') }}" id="google_recaptcha_secret"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <input type="submit" value="{{ __('Save Changes') }}"
                                                class="btn-submit btn btn-primary">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--storage Setting-->
                        <div id="storage-settings" class="card mb-3">
                            {{ Form::open(['route' => 'storage.setting.store', 'enctype' => 'multipart/form-data']) }}
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <h5 class="">{{ __('Storage Settings') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-sm-row flex-column">
                                    <div class="pe-2 pb-3">
                                        <input type="radio" class="btn-check" name="storage_setting"
                                            id="local-outlined" autocomplete="off"
                                            {{ $setting['storage_setting'] == 'local' ? 'checked' : '' }} value="local"
                                            checked>
                                        <label class="btn btn-outline-primary col-12"
                                            for="local-outlined">{{ __('Local') }}</label>
                                    </div>
                                    <div class="pe-2 pb-3">
                                        <input type="radio" class="btn-check" name="storage_setting"
                                            id="s3-outlined" autocomplete="off"
                                            {{ $setting['storage_setting'] == 's3' ? 'checked' : '' }} value="s3">
                                        <label class="btn btn-outline-primary col-12" for="s3-outlined">
                                            {{ __('AWS S3') }}</label>
                                    </div>

                                    <div class="pe-2 pb-3">
                                        <input type="radio" class="btn-check" name="storage_setting"
                                            id="wasabi-outlined" autocomplete="off"
                                            {{ $setting['storage_setting'] == 'wasabi' ? 'checked' : '' }}
                                            value="wasabi">
                                        <label class="btn btn-outline-primary col-12"
                                            for="wasabi-outlined">{{ __('Wasabi') }}</label>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="local-setting row ">

                                        <div class="form-group col-8 switch-width">
                                            {{ Form::label('local_storage_validation', __('Only Upload Files'), ['class' => ' form-label']) }}
                                            <select name="local_storage_validation[]" class="multi-select"
                                                data-toggle="select2" id="local_storage_validation"
                                                multiple="multiple">
                                                @foreach ($file_type as $f)
                                                    <option @if (in_array($f, $local_storage_validations)) selected @endif>
                                                        {{ $f }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="local_storage_max_upload_size">{{ __('Max upload size ( In KB)') }}</label>
                                                <input type="number" name="local_storage_max_upload_size"
                                                    class="form-control"
                                                    value="{{ !isset($setting['local_storage_max_upload_size']) || is_null($setting['local_storage_max_upload_size']) ? '' : $setting['local_storage_max_upload_size'] }}"
                                                    placeholder="{{ __('Max upload size') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="s3-setting row {{ $setting['storage_setting'] == 's3' ? ' ' : 'd-none' }}">

                                        <div class=" row ">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_key">{{ __('S3 Key') }}</label>
                                                    <input type="text" name="s3_key" class="form-control"
                                                        value="{{ !isset($setting['s3_key']) || is_null($setting['s3_key']) ? '' : $setting['s3_key'] }}"
                                                        placeholder="{{ __('S3 Key') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_secret">{{ __('S3 Secret') }}</label>
                                                    <input type="text" name="s3_secret" class="form-control"
                                                        value="{{ !isset($setting['s3_secret']) || is_null($setting['s3_secret']) ? '' : $setting['s3_secret'] }}"
                                                        placeholder="{{ __('S3 Secret') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_region">{{ __('S3 Region') }}</label>
                                                    <input type="text" name="s3_region" class="form-control"
                                                        value="{{ !isset($setting['s3_region']) || is_null($setting['s3_region']) ? '' : $setting['s3_region'] }}"
                                                        placeholder="{{ __('S3 Region') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_bucket">{{ __('S3 Bucket') }}</label>
                                                    <input type="text" name="s3_bucket" class="form-control"
                                                        value="{{ !isset($setting['s3_bucket']) || is_null($setting['s3_bucket']) ? '' : $setting['s3_bucket'] }}"
                                                        placeholder="{{ __('S3 Bucket') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_url">{{ __('S3 URL') }}</label>
                                                    <input type="text" name="s3_url" class="form-control"
                                                        value="{{ !isset($setting['s3_url']) || is_null($setting['s3_url']) ? '' : $setting['s3_url'] }}"
                                                        placeholder="{{ __('S3 URL') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_endpoint">{{ __('S3 Endpoint') }}</label>
                                                    <input type="text" name="s3_endpoint" class="form-control"
                                                        value="{{ !isset($setting['s3_endpoint']) || is_null($setting['s3_endpoint']) ? '' : $setting['s3_endpoint'] }}"
                                                        placeholder="{{ __('S3 Bucket') }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-8 switch-width">
                                                {{ Form::label('s3_storage_validation', __('Only Upload Files'), ['class' => ' form-label']) }}
                                                <select name="s3_storage_validation[]" class="multi-select"
                                                    data-toggle="select2" id="s3_storage_validation"
                                                    multiple="multiple">
                                                    @foreach ($file_type as $f)
                                                        <option @if (in_array($f, $s3_storage_validations)) selected @endif>
                                                            {{ $f }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_max_upload_size">{{ __('Max upload size ( In KB)') }}</label>
                                                    <input type="number" name="s3_max_upload_size"
                                                        class="form-control"
                                                        value="{{ !isset($setting['s3_max_upload_size']) || is_null($setting['s3_max_upload_size']) ? '' : $setting['s3_max_upload_size'] }}"
                                                        placeholder="{{ __('Max upload size') }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div
                                        class="wasabi-setting row {{ $setting['storage_setting'] == 'wasabi' ? ' ' : 'd-none' }}">
                                        <div class=" row ">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_key">{{ __('Wasabi Key') }}</label>
                                                    <input type="text" name="wasabi_key" class="form-control"
                                                        value="{{ !isset($setting['wasabi_key']) || is_null($setting['wasabi_key']) ? '' : $setting['wasabi_key'] }}"
                                                        placeholder="{{ __('Wasabi Key') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_secret">{{ __('Wasabi Secret') }}</label>
                                                    <input type="text" name="wasabi_secret" class="form-control"
                                                        value="{{ !isset($setting['wasabi_secret']) || is_null($setting['wasabi_secret']) ? '' : $setting['wasabi_secret'] }}"
                                                        placeholder="{{ __('Wasabi Secret') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_region">{{ __('Wasabi Region') }}</label>
                                                    <input type="text" name="wasabi_region" class="form-control"
                                                        value="{{ !isset($setting['wasabi_region']) || is_null($setting['wasabi_region']) ? '' : $setting['wasabi_region'] }}"
                                                        placeholder="{{ __('Wasabi Region') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_bucket">{{ __('Wasabi Bucket') }}</label>
                                                    <input type="text" name="wasabi_bucket" class="form-control"
                                                        value="{{ !isset($setting['wasabi_bucket']) || is_null($setting['wasabi_bucket']) ? '' : $setting['wasabi_bucket'] }}"
                                                        placeholder="{{ __('Wasabi Bucket') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_url">{{ __('Wasabi URL') }}</label>
                                                    <input type="text" name="wasabi_url" class="form-control"
                                                        value="{{ !isset($setting['wasabi_url']) || is_null($setting['wasabi_url']) ? '' : $setting['wasabi_url'] }}"
                                                        placeholder="{{ __('Wasabi URL') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_root">{{ __('Wasabi Root') }}</label>
                                                    <input type="text" name="wasabi_root" class="form-control"
                                                        value="{{ !isset($setting['wasabi_root']) || is_null($setting['wasabi_root']) ? '' : $setting['wasabi_root'] }}"
                                                        placeholder="{{ __('Wasabi Bucket') }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-8 switch-width">
                                                {{ Form::label('wasabi_storage_validation', __('Only Upload Files'), ['class' => 'form-label']) }}

                                                <select name="wasabi_storage_validation[]" class="multi-select"
                                                    data-toggle="select2" id="wasabi_storage_validation"
                                                    multiple='multiple'>
                                                    @foreach ($file_type as $f)
                                                        <option @if (in_array($f, $wasabi_storage_validations)) selected @endif>
                                                            {{ $f }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_root">{{ __('Max upload size ( In KB)') }}</label>
                                                    <input type="number" name="wasabi_max_upload_size"
                                                        class="form-control"
                                                        value="{{ !isset($setting['wasabi_max_upload_size']) || is_null($setting['wasabi_max_upload_size']) ? '' : $setting['wasabi_max_upload_size'] }}"
                                                        placeholder="{{ __('Max upload size') }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class=" text-end">
                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>

                        <!--seo-->
                        <div class="" id="seo">
                            {{ Form::open(['route' => ['settings.seo.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <h5 class="col-6">
                                                    {{ __('SEO Settings') }}
                                                </h5>
                                                <div class="text-end col-6">
                                                    <a data-size="lg" data-ajax-popup-over="true" class="btn btn-sm text-white btn-primary" data-url="{{ route('generate',['seo']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Generate with AI') }}" data-title="{{ __('Generate Meta Keywords and Meta Description') }}">
                                                        <i class="fas fa-robot text-white px-1"></i>{{ __('Generate with AI') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-12 row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                            {{ Form::label('Telegram Access Token', __('Meta Keywords'), ['class' => 'form-label']) }}
                                                            {{ Form::text('meta_keywords', isset($payment_detail['meta_keywords']) ? $payment_detail['meta_keywords'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Meta Keywords'), 'required' => 'required']) }}
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                            {{ Form::label('Telegram ChatID', __('Meta Description'), ['class' => 'form-label']) }}
                                                            {{ Form::textarea('meta_description', isset($payment_detail['meta_description']) ? $payment_detail['meta_description'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Meta Description'), 'required' => 'required']) }}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <h6>{{ __('Meta Image') }}</h6>
                                                        <div class="logo-content">
                                                            <img src="@if ($payment_detail['meta_image']) {{ asset($meta_images . $payment_detail['meta_image']) }} @else{{ asset($meta_images . 'meta_image.png') }} @endif"
                                                                class="col-9" id="meta" />
                                                        </div>
                                                        <div class="choose-file mt-5 ">
                                                            <label for="meta_image">
                                                                <div class=" bg-primary"> <i
                                                                        class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                                </div>
                                                                <input type="file" name="meta_image"
                                                                    id="meta_image" class="custom-input-file choose_file_custom"
                                                                    onchange="document.getElementById('meta').src = window.URL.createObjectURL(this.files[0])" />
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class=" text-end">
                                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>

                        <!--cache-->
                        <div class="" id="cache">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="">
                                                {{ __('Cache Settings') }}
                                            </h5>
                                            <small class="text-secondary font-weight-bold">This is a page meant for more advanced users, simply ignore
                                                it if you don't
                                                understand what cache is.</small>
                                        </div>
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12 py-3">
                                                        {{ Form::label('cache', __('Current cache size'), ['class' => 'col-form-label' ]) }}
                                                        <div class="input-group ">
                                                            <input type="text" name="cache"
                                                            value="{{ App\Models\Utility::GetCacheSize() }}"
                                                            class="form-control" disabled>
                                                            <span
                                                            class="input-group-text bg-transparent">{{ __('MB') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="  text-end">
                                                        <a href="{{ url('config-cache') }}"
                                                        class="btn  btn-primary">{{ __('Clear Cache') }}</a>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--cookie-settings-->
                        <div class="" id="cookie-settings">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card" id="">
                                       
                                        {{Form::open($payment_detail,array('route'=>'cookie.setting','method'=>'post'))}}
                                            <div class="card-header flex-column flex-lg-row  d-flex align-items-lg-center gap-2 justify-content-between">
                                                <h5>{{ __('Cookie Settings') }}</h5>
                                                <div class="d-flex align-items-center">
                                                    {{ Form::label('enable_cookie', __('Enable cookie'), ['class' => 'col-form-label p-0 fw-bold me-3']) }}
                                                    <div class="custom-control custom-switch" id="cookie_dis">
                                                        <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" name="enable_cookie" class="form-check-input input-primary "
                                                            id="enable_cookie" {{ $payment_detail['enable_cookie'] == 'on' ? ' checked ' : '' }}>
                                                        <label class="custom-control-label mb-1" for="enable_cookie"></label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="text-end col-12">
                                                        <a data-size="lg" data-ajax-popup-over="true" class="btn btn-sm text-white btn-primary" data-url="{{ route('generate',['cookie']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Generate with AI') }}" data-title="{{ __('Generate Cookie Title & Description') }}">
                                                            <i class="fas fa-robot text-white px-1"></i>{{ __('Generate with AI') }}</a>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch custom-switch-v1">
                                                            <input type="checkbox" name="cookie_logging" class="form-check-input input-primary"
                                                                id="todisable" {{ $payment_detail['cookie_logging'] == 'on' ? ' checked ' : '' }}>
                                                            <label class="form-check-label" for="cookie_logging">{{__('Enable logging')}}</label>
                                                        </div>
                                                        <div class="form-group">
                                                            {{ Form::label('cookie_title', __('Cookie Title'), ['class' => 'col-form-label' ]) }}
                                                            {{ Form::text('cookie_title', isset($payment_detail['cookie_title']) ? $payment_detail['cookie_title'] : '', ['class' => 'form-control ', 'id' => 'todisable' ]) }}
                                                        </div>
                                                        <div class="form-group ">
                                                            {{ Form::label('cookie_description', __('Cookie Description'), ['class' => ' form-label']) }}
                                                            {!! Form::textarea('cookie_description', isset($payment_detail['cookie_description']) ? $payment_detail['cookie_description'] : '', ['class' => 'form-control ', 'rows' => '2' , 'id' => 'todisable']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch custom-switch-v1 ">
                                                            <input type="checkbox" name="necessary_cookies" class="form-check-input input-primary"
                                                            id="todisable" {{ $payment_detail['necessary_cookies'] == 'on' ? ' checked ' : '' }} checked onclick="return false">
                                                            <label class="form-check-label" for="necessary_cookies">{{__('Strictly necessary cookies')}}</label>
                                                        </div>
                                                        <div class="form-group ">
                                                            {{ Form::label('strictly_cookie_title', __(' Strictly Cookie Title'), ['class' => 'col-form-label']) }}
                                                            {{ Form::text('strictly_cookie_title', isset($payment_detail['strictly_cookie_title']) ? $payment_detail['strictly_cookie_title'] : '', ['class' => 'form-control' , 'id' => 'todisable']) }}
                                                        </div>
                                                        <div class="form-group ">
                                                            {{ Form::label('strictly_cookie_description', __('Strictly Cookie Description'), ['class' => ' form-label']) }}
                                                            {!! Form::textarea('strictly_cookie_description', isset($payment_detail['strictly_cookie_description']) ? $payment_detail['strictly_cookie_description'] : '', ['class' => 'form-control ', 'rows' => '2' , 'id' => 'todisable' ]) !!}
                                                        </div>
                                                    </div>
                                                        <div class="col-12">
                                                            <h5>{{__('More Information')}}</h5>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                {{ Form::label('more_information_description', __('Contact Us Description'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('more_information_description', isset($payment_detail['more_information_description']) ? $payment_detail['more_information_description'] : '', ['class' => 'form-control' , 'id' => 'todisable']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                {{ Form::label('contactus_url', __('Contact Us URL'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('contactus_url', isset($payment_detail['contactus_url']) ? $payment_detail['contactus_url'] : '', ['class' => 'form-control' , 'id' => 'todisable']) }}
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="card-footer row" >
                                                <div class="text-start col">
                                                    @if (file_exists(storage_path() . '/uploads/sample/data.csv') && $setting['cookie_logging'] == 'on')
                                                            <label for="file" class="form-label">{{__('Download cookie accepted data')}}</label>
                                                            <a href="{{ asset(Storage::url('uploads/sample')) . '/data.csv' }}" class="btn  btn-primary">
                                                                <i class="ti ti-download"></i>
                                                            </a>
                                                    @endif 
                                                </div>
                                                <div class="text-end col-auto">
                                                    <input type="submit" value="{{ __('Save Changes') }}" class="btn btn-primary">
                                                </div>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--chat-gtp-->
                        <div class="" id="chat-gpt-settings">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card" id="">
                                       
                                        {{Form::model($payment_detail,array('route'=>'settings.chatgptkey','method'=>'post'))}}
                                            <div class="card-header flex-column flex-lg-row  d-flex align-items-lg-center gap-2 justify-content-between">
                                                <h5>{{ __('Chat GPT Key Settings') }}</h5>
                                                {{-- <small>{{ __('Edit your key details') }}</small> --}}
                                                {{-- <div class="d-flex align-items-center">
                                                    {{ Form::label('enable_cookie', __('Enable ChatGPT'), ['class' => 'col-form-label p-0 fw-bold me-3']) }}
                                                    <div class="custom-control custom-switch" id="cookie_dis">
                                                        <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" name="enable_cookie" class="form-check-input input-primary "
                                                            id="enable_cookie" {{ $payment_detail['enable_cookie'] == 'on' ? ' checked ' : '' }}>
                                                        <label class="custom-control-label mb-1" for="enable_cookie"></label>
                                                    </div>
                                                </div> --}}

                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                {{ Form::label('chatgpt_key', __('ChatGPT key'), ['class' => 'col-form-label']) }}
                                                                {{ Form::text('chatgpt_key',isset($payment_detail['chatgpt_key']) ? $payment_detail['chatgpt_key'] : '',['class'=>'form-control','placeholder'=>__('Enter Chatgpt Key Here')]) }}
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="text-end ">
                                                    <input type="submit" value="{{ __('Save Changes') }}" class="btn btn-primary">
                                                </div>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- [ sample-page ] end -->
                </div>
                <!-- [ Main Content ] end -->
            </div>
        @endsection




        @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>


            $("input").click(function(){

                event.stopPropagation() // or 
                event.preventDefault
                console.log(event);
                $(this).parent().SomehowStopCollapse;

            });
                
            // $(document).on('click', $("input"), function(e){
            //     event1 = document.getElementById("collapse6");
            //     event = $("div.accordion-collapse").attr("data-bs-toggle", "collapse");

            //     $('#accordion').bind('accordionchange', 
            //         function() {
            //             alert('Active tab index: ' + $(this).accordion('option', 'active'))
            //         });
            // });


            $("#cookie_dis").click(function(){

                if ($('#enable_cookie').prop('checked')) {
                    ele = document.querySelectorAll('[id="todisable"]');
                        for (i = 0; i < ele.length; i++){
                        ele[i].disabled = false;}
                } else {
                    ele = document.querySelectorAll('[id="todisable"]');
                        for (i = 0; i < ele.length; i++){
                        ele[i].disabled = true;}
                }
            });
        </script>
            @if ($payment_detail['enable_cookie'] != 'on')
                <script>
                    ele = document.querySelectorAll('[id="todisable"]');
                    for (i = 0; i < ele.length; i++){
                    ele[i].disabled = true;}
                </script>
            @endif
            <script>
                $(document).ready(function() {

                    if ($('.gdpr_fulltime').is(':checked')) {

                        $('.fulltime').show();
                    } else {
                        $('.fulltime').hide();
                    }
                    $('#gdpr_cookie').on('change', function() {

                        if ($('.gdpr_fulltime').is(':checked')) {

                            $('.fulltime').show();
                        } else {

                            $('.fulltime').hide();
                        }
                    });

                    cust_theme_bg();
                    cust_darklayout();

                    $(document).on('click', '.list-group-item', function() {
                        $('.list-group-item').removeClass('active');
                        $('.list-group-item').removeClass('text-primary');
                        setTimeout(() => {
                            $(this).addClass('active').removeClass('text-primary');
                        }, 10);
                    });

                    var type = window.location.hash.substr(1);
                    $('.list-group-item').removeClass('active');
                    $('.list-group-item').removeClass('text-primary');
                    if (type != '') {
                        $('a[href="#' + type + '"]').addClass('active').removeClass('text-primary');
                    } else {
                        $('.list-group-item:eq(0)').addClass('active').removeClass('text-primary');
                    }
                });
            </script>


            <script>
                function cust_theme_bg() {
                    var custthemebg = document.querySelector("#cust-theme-bg");

                    if (custthemebg.checked) {
                        document.querySelector(".dash-sidebar").classList.add("transprent-bg");
                        document
                            .querySelector(".dash-header:not(.dash-mob-header)")
                            .classList.add("transprent-bg");
                    } else {
                        document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
                        document
                            .querySelector(".dash-header:not(.dash-mob-header)")
                            .classList.remove("transprent-bg");
                    }

                }

                function cust_darklayout() {
                    var custdarklayout = document.querySelector("#cust-darklayout");

                    if (custdarklayout.checked) {
                        document
                            .querySelector(".m-header > .b-brand > .logo-lg")
                            .setAttribute("src", "{{ asset('assets/images/logo.svg') }}");
                        document
                            .querySelector("#main-style-link")
                            .setAttribute("href", "{{ asset('assets/css/style-dark.css') }}");
                    } else {
                        document
                            .querySelector(".m-header > .b-brand > .logo-lg")
                            .setAttribute("src", "{{ asset('assets/images/logo-dark.svg') }}");
                        document
                            .querySelector("#main-style-link")
                            .setAttribute("href", "{{ asset('assets/css/style.css') }}");
                    }

                }
            </script>

            <script>
                function check_theme(color_val) {
                    $('.theme-color').prop('checked', false);
                    $('input[value="' + color_val + '"]').prop('checked', true);
                }
                var scrollSpy = new bootstrap.ScrollSpy(document.body, {
                    target: '#useradd-sidenav',
                    offset: 300
                })
            </script>

            <script>
                $(document).on("click", '.send_email', function(e) {
                    e.preventDefault();
                    var title = $(this).attr('data-title');
                    var size = 'md';
                    var url = $(this).attr('data-url');
                    if (typeof url != 'undefined') {
                        $("#commonModal .modal-title").html(title);
                        $("#commonModal .modal-dialog").addClass('modal-' + size);
                        $("#commonModal").modal('show');

                        $.post(url, {
                            mail_driver: $("#mail_driver").val(),
                            mail_host: $("#mail_host").val(),
                            mail_port: $("#mail_port").val(),
                            mail_username: $("#mail_username").val(),
                            mail_password: $("#mail_password").val(),
                            mail_encryption: $("#mail_encryption").val(),
                            mail_from_address: $("#mail_from_address").val(),
                            mail_from_name: $("#mail_from_name").val()
                        }, function(data) {
                            $('#commonModal .body').html(data);
                        });


                    }
                });

                $(document).on('submit', '#test_email', function(e) {
                    e.preventDefault();
                    $("#email_sending").show();
                    var post = $(this).serialize();
                    var url = $(this).attr('action');
                    $.ajax({
                        type: "post",
                        url: url,
                        data: post,
                        cache: false,
                        beforeSend: function() {
                            $('#test_email .btn-create').attr('disabled', 'disabled');
                        },
                        success: function(data) {
                            if (data.is_success) {
                                show_toastr('Success', data.message, 'success');
                            } else {
                                show_toastr('Error', data.message, 'error');
                            }
                            $("#email_sending").hide();
                        },
                        complete: function() {
                            $('#test_email .btn-create').removeAttr('disabled');
                        },
                    });
                })
            </script>


            <script type="text/javascript">
                $('#small-favicon').change(function() {

                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#favicon').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);

                });

                $('#logo_blue').change(function() {

                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#dark_logo').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);

                });

                $('#logo_white').change(function() {

                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);

                });



                if ($(".multi-select").length > 0) {
                    $($(".multi-select")).each(function(index, element) {
                        var id = $(element).attr('id');
                        var multipleCancelButton = new Choices(
                            '#' + id, {
                                removeItemButton: true,

                            }
                        );
                    });
                }

                $(document).on('change', '[name=storage_setting]', function() {
                    if ($(this).val() == 's3') {
                        $('.s3-setting').removeClass('d-none');
                        $('.wasabi-setting').addClass('d-none');
                        $('.local-setting').addClass('d-none');
                    } else if ($(this).val() == 'wasabi') {
                        $('.s3-setting').addClass('d-none');
                        $('.wasabi-setting').removeClass('d-none');
                        $('.local-setting').addClass('d-none');
                    } else {
                        $('.s3-setting').addClass('d-none');
                        $('.wasabi-setting').addClass('d-none');
                        $('.local-setting').removeClass('d-none');
                    }
                });
            </script>
        @endpush
        <style>
            .active_color {
                /* background-color: #ffffff !important; */
                border: 2px solid #000 !important;
            }
        </style>

        @if ($color == 'theme-3')
            <style>
                .btn-check:checked+.btn-outline-primary,
                .btn-check:active+.btn-outline-primary,
                .btn-outline-primary:active,
                .btn-outline-primary.active,
                .btn-outline-primary.dropdown-toggle.show {
                    color: #ffffff;
                    background-color: #6fd943 !important;
                    border-color: #6fd943 !important;
                }


                .btn-outline-primary:hover {
                    color: #ffffff;
                    background-color: #6fd943 !important;
                    border-color: #6fd943 !important;
                }


                .btn[class*="btn-outline-"]:hover {

                    border-color: #6fd943 !important;
                }
            </style>
        @endif

        @if ($color == 'theme-2')
            <style>
                .btn-check:checked+.btn-outline-primary,
                .btn-check:active+.btn-outline-primary,
                .btn-outline-primary:active,
                .btn-outline-primary.active,
                .btn-outline-primary.dropdown-toggle.show {
                    color: #ffffff;
                    background-color: #1f3996 !important;
                    border-color: #1f3996 !important;
                }


                body.theme-2 .btn-outline-primary:hover {
                    color: #ffffff;
                    background-color: #1f3996 !important;
                    border-color: #1f3996 !important;
                }
            </style>
        @endif

        @if ($color == 'theme-4')
            <style>
                .btn-check:checked+.btn-outline-primary,
                .btn-check:active+.btn-outline-primary,
                .btn-outline-primary:active,
                .btn-outline-primary.active,
                .btn-outline-primary.dropdown-toggle.show {
                    color: #ffffff;
                    background-color: #51459d !important;
                    border-color: #51459d !important;
                }


                body.theme-4 .btn-outline-primary:hover {
                    color: #ffffff;
                    background-color: #51459d !important;
                    border-color: #51459d !important;
                }
            </style>
        @endif
        @if ($color == 'theme-1')
            <style>
                .btn-check:checked+.btn-outline-primary,
                .btn-check:active+.btn-outline-primary,
                .btn-outline-primary:active,
                .btn-outline-primary.active,
                .btn-outline-primary.dropdown-toggle.show {
                    color: #ffffff;
                    background-color: #6fd943 !important;
                    border-color: #6fd943 !important;
                }


                body.theme-1 .btn-outline-primary:hover {
                    color: #ffffff;
                    background-color: #6fd943 !important;
                    border-color: #6fd943 !important;
                }
            </style>
        @endif
