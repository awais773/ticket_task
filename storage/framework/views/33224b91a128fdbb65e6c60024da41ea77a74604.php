<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php
    $setting = App\Models\Utility::getAdminPaymentSetting();
    if ($setting['color']) {
        $color = $setting['color'];
    }
    
?>

<?php
    $logo = \App\Models\Utility::get_file('logo/');
    $meta_images = \App\Models\Utility::get_file('uploads/logo/');
    $file_type = config('files_types');
    
    $local_storage_validation = $setting['local_storage_validation'];
    $local_storage_validations = explode(',', $local_storage_validation);
    
    $s3_storage_validation = $setting['s3_storage_validation'];
    $s3_storage_validations = explode(',', $s3_storage_validation);
    
    $wasabi_storage_validation = $setting['wasabi_storage_validation'];
    $wasabi_storage_validations = explode(',', $wasabi_storage_validation);
    
?>

<?php $__env->startSection('links'); ?>
    <?php if(\Auth::guard('client')->check()): ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php endif; ?>
    <li class="breadcrumb-item"> <?php echo e(__('Settings')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#brand-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Brand Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#email-settings"
                                class="list-group-item list-group-item-action border-0 "><?php echo e(__('Email Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#payment-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Payment Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#pusher-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Pusher Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#recaptcha-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('ReCaptcha Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#storage-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Storage Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#seo"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('SEO Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#cache" 
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Cache settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#cookie-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Cookie Settings ')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#chat-gpt-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('ChatGPT Settings ')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-9">

                    <div id="brand-settings" class="">

                        <?php echo e(Form::open(['route' => 'settings.store', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="row">


                                <div class="col-12">
                                    <div class="card ">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Brand Settings')); ?></h5>

                                        </div>
                                        <div class="card-body">
                                            <div class="row mt-2">

                                                <div class="col-sm-4">
                                                    <div class="card ">
                                                        <div class="card-header">
                                                            <h5><?php echo e(__('Dark Logo')); ?></h5>

                                                        </div>
                                                        <div class="card-body">
                                                            <div class="logo-content">
                                                                <img id="dark_logo" style="filter: drop-shadow(2px 3px 7px #011c4b);" alt="yourimage"
                                                                    src="<?php echo e(asset($logo . 'logo-light.png')); ?>"
                                                                    class="small_logo">
                                                            </div>
                                                            <div class="choose-file mt-5 ">
                                                                <label for="logo_blue">
                                                                    <div class="bg-primary " style="cursor: pointer;transform: translateY(+110%);"> <i
                                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

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
                                                            <h5><?php echo e(__('Light Logo')); ?></h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="logo-content">

                                                                <img id="image" alt="yourimage" style="filter: drop-shadow(2px 3px 7px #011c4b);"
                                                                    src="<?php echo e(asset($logo . 'logo-dark.png')); ?>"
                                                                    class="small_logo">
                                                            </div>
                                                            <div class="choose-file mt-5 ">
                                                                <label for="logo_white">
                                                                    <div class=" bg-primary" style="cursor: pointer;transform: translateY(+110%);"> <i
                                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

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
                                                            <h5><?php echo e(__('Favicon')); ?></h5>

                                                        </div>
                                                        <div class="card-body" >
                                                            <div class="logo-content">
                                                                <img src="<?php echo e(asset($logo . 'favicon.png')); ?>"
                                                                    class="small_logo" id="favicon"
                                                                    style="width: 60px !important;" />

                                                            </div>
                                                            <div class="choose-file mt-5 ">
                                                                <label for="small-favicon">
                                                                    <div class=" bg-primary" style="cursor: pointer;transform: translateY(+110%);"> <i
                                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

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
                                                        <?php echo e(Form::label('app_name', __('App Name'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::text('app_name', env('APP_NAME'), ['class' => 'form-control', 'placeholder' => __('App Name')])); ?>

                                                        <?php $__errorArgs = ['app_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-app_name" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('footer_text', __('Footer Text'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::text('footer_text', env('FOOTER_TEXT'), ['class' => 'form-control', 'placeholder' => __('Footer Text')])); ?>

                                                        <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-footer_text" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <?php
                                                        $DEFAULT_LANG = env('DEFAULT_ADMIN_LANG') ? env('DEFAULT_ADMIN_LANG') : 'en';
                                                    ?>
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('default_language', __('Default Language'), ['class' => 'form-label'])); ?>

                                                        <div class="changeLanguage">
                                                            <select name="default_language" id="default_language"
                                                                class="form-control select2">
                                                                <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($lang); ?>"
                                                                        <?php if($DEFAULT_LANG == $lang): ?> selected <?php endif; ?>>
                                                                        <?php echo e(ucfirst( \App\Models\Utility::getlang_fullname($lang))); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 ">
                                                        <div class="col switch-width">
                                                            <div class="form-group ml-2 mr-3">
                                                                <label
                                                                    class="form-label mb-1"><?php echo e(__('Enable Landing Page')); ?></label>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" class=""
                                                                        name="display_landing" id="display_landing"
                                                                        <?php echo e(!empty(env('DISPLAY_LANDING')) && env('DISPLAY_LANDING') == 'on' ? 'checked="checked"' : ''); ?>>
                                                                    <label class="custom-control-label mb-1"
                                                                        for="status"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="col switch-width">
                                                            <div class="form-group ml-2 mr-3 ">
                                                                <label class="form-label mb-1"><?php echo e(__('Enable RTL')); ?></label>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" class="" name="site_rtl"
                                                                        id="site_rtl"
                                                                        <?php echo e(!empty(env('SITE_RTL')) && env('SITE_RTL') == 'on' ? 'checked="checked"' : ''); ?>>
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
                                                                    class="form-label mb-1"><?php echo e(__('Enable Sign-Up Page')); ?></label>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" class=""
                                                                        name="SIGNUP_BUTTON" id="SIGNUP_BUTTON"
                                                                        <?php echo e(!empty(env('SIGNUP_BUTTON')) && env('SIGNUP_BUTTON') == 'on' ? 'checked="checked"' : ''); ?>>
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
                                                                    class="form-label mb-1"><?php echo e(__('Enable Email Verification')); ?></label>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" data-toggle="switchbutton"
                                                                        data-onstyle="primary" class=""
                                                                        name="email_verification" id="email_verification"
                                                                        <?php echo e(isset($payment_detail['email_verification']) && $payment_detail['email_verification'] == 'on' ? 'checked' : ''); ?>>
                                                                    <label class="custom-control-label"
                                                                        for="email_verification"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <h4 class="small-title mb-4"><?php echo e(__('Theme Customizer')); ?></h4>
                                                <div class="col-12">
                                                    <div class="pct-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <h6 class="">
                                                                    <i data-feather="credit-card" class="me-2"></i><?php echo e(__('Primary
                                                                    color settings')); ?>

                                                                </h6>
                                                                <hr class="my-2" />
                                                                <div class="theme-color themes-color">
                                                                    <input type="hidden" name="color" id="color_value" value="<?php echo e($color); ?>">
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-1') ? 'active_color' : ''); ?>" data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-1" style="display: none;">
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-2') ? 'active_color' : ''); ?> " data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-2" style="display: none;">
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-3') ? 'active_color' : ''); ?>" data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-3" style="display: none;">
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-4') ? 'active_color' : ''); ?>" data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-4" style="display: none;">
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-5') ? 'active_color' : ''); ?>" data-value="theme-5" onclick="check_theme('theme-5')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-5" style="display: none;">
                                                                    <br>
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-6') ? 'active_color' : ''); ?>" data-value="theme-6" onclick="check_theme('theme-6')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-6" style="display: none;">
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-7') ? 'active_color' : ''); ?>" data-value="theme-7" onclick="check_theme('theme-7')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-7" style="display: none;">
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-8') ? 'active_color' : ''); ?>" data-value="theme-8" onclick="check_theme('theme-8')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-8" style="display: none;">
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-9') ? 'active_color' : ''); ?>" data-value="theme-9" onclick="check_theme('theme-9')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-9" style="display: none;">
                                                                    <a href="#!" class="<?php echo e(($color == 'theme-10') ? 'active_color' : ''); ?>" data-value="theme-10" onclick="check_theme('theme-10')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-10" style="display: none;">
                                                                </div>

                                                            </div>
                                                            <div class="col-sm-4">
                                                                <h6 class="">
                                                                    <i data-feather="layout" class="me-2"></i><?php echo e(__('Sidebar
                                                                    settings')); ?>

                                                                </h6>
                                                                <hr class="my-2" />
                                                                <div class="form-check form-switch">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="cust-theme-bg" name="cust_theme_bg"
                                                                        <?php if($setting['cust_theme_bg'] == 'on'): ?> checked <?php endif; ?> />

                                                                    <label class="form-check-label f-w-600 pl-1"
                                                                        for="cust-theme-bg"><?php echo e(__('Transparent layout')); ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <h6 class="">
                                                                    <i data-feather="sun" class=""></i><?php echo e(__('Layout settings')); ?>

                                                                </h6>
                                                                <hr class=" my-2" />
                                                                <div class="form-check form-switch mt-2">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="cust-darklayout"
                                                                        name="cust_darklayout"<?php if($setting['cust_darklayout'] == 'on'): ?> checked <?php endif; ?> />

                                                                    <label class="form-check-label f-w-600 pl-1"
                                                                        for="cust-darklayout"><?php echo e(__('Dark Layout')); ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                                                        class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php echo e(Form::close()); ?>


                        <div id="email-settings" class="tab-pane">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="">
                                            <?php echo e(__('Email Settings')); ?>

                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <?php echo e(Form::open(['route' => 'email.settings.store', 'method' => 'post'])); ?>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver'), 'id' => 'mail_driver'])); ?>

                                                <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_driver" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_host', __('Mail Host'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Host')])); ?>

                                                <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_driver" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_port', __('Mail Port'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

                                                <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_port" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_username', __('Mail Username'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

                                                <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_username" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_password', __('Mail Password'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_password', env('MAIL_PASSWORD'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')])); ?>

                                                <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_password" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                                <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_encryption" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_from_address', __('Mail From Address'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

                                                <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_from_address" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                                <?php echo e(Form::label('mail_from_name', __('Mail From Name'), ['class' => 'form-label'])); ?>

                                                <?php echo e(Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')])); ?>

                                                <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-mail_from_name" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                        </div>

                                        <div class="col-lg-12 ">
                                            <div class="row">

                                                <div class="text-start col-6">
                                                    <a href="#" data-size="md"
                                                        data-url="<?php echo e(route('test.email')); ?>"
                                                        data-title="<?php echo e(__('Send Test Mail')); ?>"
                                                        class="btn  btn-primary send_email">
                                                        <?php echo e(__('Send Test Mail')); ?>

                                                    </a>

                                                </div>
                                                <div class="text-end col-6">
                                                    <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                                                        class="btn-submit btn btn-primary">
                                                </div>

                                            </div>
                                        </div>
                                        <?php echo e(Form::close()); ?>

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
                                                <?php echo e(__('Payment Settings')); ?>

                                            </h5>
                                            <small
                                                class="d-block mt-2"><?php echo e(__('These details will be used to collect subscription plan payments.Each subscription plan will have a payment button based on the below configuration.')); ?></small>
                                        </div>
                                        <div class="card-body p-4">
                                            <form method="post" action="<?php echo e(route('payment.settings.store')); ?>"
                                                class="payment-form">
                                                <?php echo csrf_field(); ?>
                                                <div class="row mt-3">
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('currency', __('Currency *'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::text('currency', env('CURRENCY'), ['class' => 'form-control font-style', 'required', 'placeholder' => __('Enter Currency')])); ?>

                                                        <small>
                                                            <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?><br>
                                                            <a href="https://stripe.com/docs/currencies"
                                                                target="_blank"><?php echo e(__('You can find out how to do that here.')); ?></a></small>
                                                        <br>
                                                        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-currency" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('currency_symbol', __('Currency Symbol *'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::text('currency_symbol', env('CURRENCY_SYMBOL'), ['class' => 'form-control', 'required', 'placeholder' => __('Enter Currency Symbol')])); ?>

                                                        <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-currency_symbol" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="accordion accordion-flush setting-accordion"
                                                            id="payment-gateways">

                                                            <div class="accordion-item">
                                                                <!-- manual payment -->
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button class="accordion-button" id="" type="button" >
                                                                        <span class="d-flex align-items-center collapsed" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapseOne" >
                                                                            <?php echo e(__('Manually')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_manual_enabled" value="off">
                                                                                <input type="checkbox" class="form-check-input"
                                                                                    name="is_manual_enabled" id="is_manual_enabled" 
                                                                                    <?php echo e(isset($payment_detail['is_manual_enabled']) && $payment_detail['is_manual_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label class="custom-control-label form-label"
                                                                                    for="is_manual_enabled"></label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row">
                                                                            <p><?php echo e(__('Requesting manual payment for the planned amount for the subscription plan.')); ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item">
                                                                <!-- Bank Transfer -->
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button class="accordion-button " type="button" >
                                                                        <span class="d-flex align-items-center collapsed" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapseOne">
                                                                            <?php echo e(__('Bank Transfer')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_bank_enabled" value="off">
                                                                                <input type="checkbox" class="form-check-input"
                                                                                    name="is_bank_enabled" id="is_bank_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_bank_enabled']) && $payment_detail['is_bank_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label class="custom-control-label form-label"
                                                                                    for="is_bank_enabled"></label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('bank_details', __('Bank Details'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::textarea('bank_details',isset($payment_detail['bank_details']) ? $payment_detail['bank_details'] : '',['class' => 'form-control', 'rows'=>'6' , 'placeholder' => __('Bank Transfer Details')])); ?>

                                                                            <small class="text-muted">
                                                                                <?php echo e(__('Example:bank:bank name</br> Account Number:0000 0000</br>')); ?>

                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item">
                                                                <!-- Stripe -->

                                                                <h2 class="accordion-header" id="stripe">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseone"
                                                                        aria-expanded="false" aria-controls="collapseone">
                                                                            <?php echo e(__('Stripe')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_stripe_enabled"
                                                                                    id="is_stripe_enabled" 
                                                                                    <?php echo e(isset($payment_detail['is_stripe_enabled']) && $payment_detail['is_stripe_enabled'] == 'on' ? 'checked' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label "
                                                                                    for="is_stripe_enabled"><?php echo e(__('')); ?></label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseone" class="accordion-collapse collapse"
                                                                    aria-labelledby="stripe"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('stripe_key', __('Stripe Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('stripe_key', isset($payment_detail['stripe_key']) && !empty($payment_detail['stripe_key']) ? $payment_detail['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Stripe Key')])); ?>


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('stripe_secret', isset($payment_detail['stripe_secret']) && !empty($payment_detail['stripe_secret']) ? $payment_detail['stripe_secret'] : '', ['class' => 'form-control', 'placeholder' => __('Stripe Secret')])); ?>

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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsetwo"
                                                                        aria-expanded="false" aria-controls="collapsetwo">
                                                                            <?php echo e(__('Paypal')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_paypal_enabled"
                                                                                    id="is_paypal_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_paypal_enabled']) && $payment_detail['is_paypal_enabled'] == 'on' ? 'checked' : ''); ?>><label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paypal_enabled"><?php echo e(__('')); ?></label>
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
                                                                                    for="paypal_mode"><?php echo e(__('Paypal Mode')); ?></label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "
                                                                                                name="paypal_mode"
                                                                                                value="sandbox"
                                                                                                <?php echo e(!isset($payment_detail['paypal_mode']) || empty($payment_detail['paypal_mode']) || $payment_detail['paypal_mode'] == 'sandbox' ? 'checked' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Sandbox')); ?></span>
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
                                                                                                <?php echo e(isset($payment_detail['paypal_mode']) && $payment_detail['paypal_mode'] == 'live' ? 'checked' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Live')); ?></span>
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
                                                                                    <?php echo e(Form::label('paypal_client_id', __('Client ID'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('paypal_client_id', isset($payment_detail['paypal_client_id']) ? $payment_detail['paypal_client_id'] : '', ['class' => 'form-control', 'placeholder' => __('Client ID')])); ?>


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('paypal_secret_key', __('Secret Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('paypal_secret_key', isset($payment_detail['paypal_secret_key']) ? $payment_detail['paypal_secret_key'] : '', ['class' => 'form-control', 'placeholder' => __('Secret Key')])); ?>

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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsethree"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapsethree">
                                                                            <?php echo e(__('Paystack')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_paystack_enabled"
                                                                                    id="is_paystack_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_paystack_enabled']) && $payment_detail['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paystack_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paystack_public_key"
                                                                                        id="paystack_public_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['paystack_public_key']) ? $payment_detail['paystack_public_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paystack_secret_key"
                                                                                        id="paystack_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['paystack_secret_key']) ? $payment_detail['paystack_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Secret Key')); ?>" />
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
                                                                        type="button">
                                                                        <span class="d-flex align-items-center"  data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsefor"
                                                                        aria-expanded="false" aria-controls="collapsefor">
                                                                            <?php echo e(__('Flutterwave')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_flutterwave_enabled"
                                                                                    id="is_flutterwave_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_flutterwave_enabled']) && $payment_detail['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : ''); ?>><label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_flutterwave_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="flutterwave_public_key"
                                                                                        id="flutterwave_public_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['flutterwave_public_key']) ? $payment_detail['flutterwave_public_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="flutterwave_secret_key"
                                                                                        id="flutterwave_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['flutterwave_secret_key']) ? $payment_detail['flutterwave_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Secret Key')); ?>" />
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsefive"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapsefive">
                                                                            <?php echo e(__('Razorpay')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_razorpay_enabled"
                                                                                    id="is_razorpay_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_razorpay_enabled']) && $payment_detail['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>><label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_razorpay_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        for="razorpay_public_key"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="razorpay_public_key"
                                                                                        id="razorpay_public_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['razorpay_public_key']) ? $payment_detail['razorpay_public_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="razorpay_secret_key"
                                                                                        id="razorpay_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['razorpay_secret_key']) ? $payment_detail['razorpay_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Secret Key')); ?>" />
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsetsix"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapsetsix">
                                                                            <?php echo e(__('Mercado Pago')); ?>

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
                                                                                    <?php echo e(isset($payment_detail['is_mercado_enabled']) && $payment_detail['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_mercado_enabled"><?php echo e(__('')); ?></label>
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
                                                                                    for="paypal_mode"><?php echo e(__('Mercado Mode')); ?></label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="mercado_mode"
                                                                                                value="sandbox"
                                                                                                <?php echo e((isset($payment_detail['mercado_mode']) && $payment_detail['mercado_mode'] == '') || (isset($payment_detail['mercado_mode']) && $payment_detail['mercado_mode'] == 'sandbox') ? 'checked' : ''); ?>>


                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Sandbox')); ?></span>
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
                                                                                                <?php echo e(isset($payment_detail['mercado_mode']) && $payment_detail['mercado_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Live')); ?></span>
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
                                                                                    class="form-label"><?php echo e(__('Access Token')); ?></label>
                                                                                <input type="text"
                                                                                    name="mercado_access_token"
                                                                                    id="mercado_access_token"
                                                                                    class="form-control"
                                                                                    value="<?php echo e(isset($payment_detail['mercado_access_token']) ? $payment_detail['mercado_access_token'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Access Token')); ?>" />
                                                                                <?php if($errors->has('mercado_secret_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('mercado_access_token')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="" class="accordion-item ">
                                                                <!-- Paytm -->

                                                                <h2 class="accordion-header" id="Paytm">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapset7" aria-expanded="false"
                                                                        aria-controls="collapset7">
                                                                            <?php echo e(__('Paytm')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_paytm_enabled"
                                                                                    id="is_paytm_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_paytm_enabled']) && $payment_detail['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paytm_enabled"><?php echo e(__('')); ?></label>
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
                                                                                    for="paypal_mode"><?php echo e(__('Paytm Environment')); ?></label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="paytm_mode"
                                                                                                value="local"
                                                                                                <?php echo e((isset($payment_detail['paytm_mode']) && $payment_detail['paytm_mode'] == '') || (isset($payment_detail['paytm_mode']) && $payment_detail['paytm_mode'] == 'local') ? 'checked="checked"' : ''); ?>>


                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Local')); ?></span>
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
                                                                                                <?php echo e(isset($payment_detail['paytm_mode']) && $payment_detail['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Production')); ?></span>
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
                                                                                        for="paytm_public_key"><?php echo e(__('Merchant ID')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paytm_merchant_id"
                                                                                        id="paytm_merchant_id"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['paytm_merchant_id']) ? $payment_detail['paytm_merchant_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Merchant ID')); ?>" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paytm_secret_key"><?php echo e(__('Merchant Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paytm_merchant_key"
                                                                                        id="paytm_merchant_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['paytm_merchant_key']) ? $payment_detail['paytm_merchant_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Merchant Key')); ?>" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="paytm_industry_type"><?php echo e(__('Industry Type')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paytm_industry_type"
                                                                                        id="paytm_industry_type"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['paytm_industry_type']) ? $payment_detail['paytm_industry_type'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Industry Type')); ?>" />
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapset8" aria-expanded="false"
                                                                        aria-controls="collapset8">
                                                                            <?php echo e(__('Mollie')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"name="is_mollie_enabled"
                                                                                    id="is_mollie_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_mollie_enabled']) && $payment_detail['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_mollie_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        for="mollie_api_key"><?php echo e(__('Mollie Api Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="mollie_api_key"
                                                                                        id="mollie_api_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['mollie_api_key']) ? $payment_detail['mollie_api_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Mollie Api Key')); ?>" />
                                                                                </div>
                                                                            </div>
                                                                            <div class=" col-md-4 col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="mollie_profile_id"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                                                    <input type="text"
                                                                                        name="mollie_profile_id"
                                                                                        id="mollie_profile_id"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['mollie_profile_id']) ? $payment_detail['mollie_profile_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Mollie Profile Id')); ?>" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="mollie_partner_id"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                                                    <input type="text"
                                                                                        name="mollie_partner_id"
                                                                                        id="mollie_partner_id"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['mollie_partner_id']) ? $payment_detail['mollie_partner_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Mollie Partner Id')); ?>" />
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapset9" aria-expanded="false"
                                                                        aria-controls="collapset9">
                                                                            <?php echo e(__('Skrill')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"name="is_skrill_enabled"
                                                                                    id="is_skrill_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_skrill_enabled']) && $payment_detail['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_skrill_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        for=""><?php echo e(__('Skrill Email')); ?></label>
                                                                                    <input type="email"
                                                                                        name="skrill_email"
                                                                                        id="skrill_email"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['skrill_email']) ? $payment_detail['skrill_email'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Skrill Email')); ?>" />
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapset10"
                                                                        aria-expanded="false" aria-controls="collapset10">
                                                                            <?php echo e(__('CoinGate')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_coingate_enabled"
                                                                                    id="is_coingate_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_coingate_enabled']) && $payment_detail['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_mercado_enabled"><?php echo e(__('')); ?></label>
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
                                                                                    for="paypal_mode"><?php echo e(__('CoinGate Mode')); ?></label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "name="coingate_mode"
                                                                                                value="sandbox"
                                                                                                <?php echo e((isset($payment_detail['coingate_mode']) && $payment_detail['coingate_mode'] == '') || (isset($payment_detail['coingate_mode']) && $payment_detail['coingate_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>


                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Sandbox')); ?></span>
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
                                                                                                <?php echo e(isset($payment_detail['coingate_mode']) && $payment_detail['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Live')); ?></span>
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
                                                                                        for="coingate_auth_token"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                                                    <input type="text"
                                                                                        name="coingate_auth_token"
                                                                                        id="coingate_auth_token"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['coingate_auth_token']) ? $payment_detail['coingate_auth_token'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('CoinGate Auth Token')); ?>" />
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse11" aria-expanded="false"
                                                                        aria-controls="collapse11">
                                                                            <?php echo e(__('Paymentwall')); ?>

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
                                                                                    <?php echo e(isset($payment_detail['is_paymentwall_enabled']) && $payment_detail['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paymentwall_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        class="form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paymentwall_public_key"
                                                                                        id="paymentwall_public_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['paymentwall_public_key']) ? $payment_detail['paymentwall_public_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                    <?php if($errors->has('paymentwall_public_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paymentwall_public_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="paymentwall_private_key"
                                                                                        class="form-label"><?php echo e(__('Private Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paymentwall_private_key"
                                                                                        id="paymentwall_private_key"
                                                                                        class="form-control form-control-label"
                                                                                        value="<?php echo e(isset($payment_detail['paymentwall_private_key']) ? $payment_detail['paymentwall_private_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Private Key')); ?>" />
                                                                                    <?php if($errors->has('paymentwall_private_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paymentwall_private_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse12" aria-expanded="false"
                                                                        aria-controls="collapse12">
                                                                            <?php echo e(__('Toyyibpay')); ?>

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
                                                                                    <?php echo e(isset($payment_detail['is_toyyibpay_enabled']) && $payment_detail['is_toyyibpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_toyyibpay_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        class="form-label"><?php echo e(__('Secret_key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="toyyibpay_secret_key"
                                                                                        id="toyyibpay_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['toyyibpay_secret_key']) ? $payment_detail['toyyibpay_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                    <?php if($errors->has('toyyibpay_secret_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('toyyibpay_secret_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="toyyibpay_category_code"
                                                                                        class="form-label"><?php echo e(__('Category Code')); ?></label>
                                                                                    <input type="text"
                                                                                        name="toyyibpay_category_code"
                                                                                        id="toyyibpay_category_code"
                                                                                        class="form-control form-control-label"
                                                                                        value="<?php echo e(isset($payment_detail['toyyibpay_category_code']) ? $payment_detail['toyyibpay_category_code'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Category Code')); ?>" />
                                                                                    <?php if($errors->has('toyyibpay_category_code')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('toyyibpay_category_code')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse13" aria-expanded="false"
                                                                        aria-controls="collapse13">
                                                                            <?php echo e(__('Payfast')); ?>

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
                                                                                    <?php echo e(isset($payment_detail['is_payfast_enabled']) && $payment_detail['is_payfast_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_payfast_enabled"><?php echo e(__('')); ?></label>
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
                                                                                    for="payfast_mode"><?php echo e(__('Payfast Mode')); ?></label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "
                                                                                                name="payfast_mode"
                                                                                                value="sandbox"
                                                                                                <?php echo e(!isset($payment_detail['payfast_mode']) || empty($payment_detail['payfast_mode']) || $payment_detail['payfast_mode'] == 'sandbox' ? 'checked' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Sandbox')); ?></span>
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
                                                                                                <?php echo e(isset($payment_detail['payfast_mode']) && $payment_detail['payfast_mode'] == 'live' ? 'checked' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Live')); ?></span>
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
                                                                                        class="form-label"><?php echo e(__('Merchant Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="payfast_merchant_key"
                                                                                        id="payfast_merchant_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['payfast_merchant_key']) ? $payment_detail['payfast_merchant_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Merchant Key')); ?>" />
                                                                                    <?php if($errors->has('payfast_merchant_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('payfast_merchant_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="payfast_merchant_id"
                                                                                        class="form-label"><?php echo e(__('Merchant ID ')); ?></label>
                                                                                    <input type="text"
                                                                                        name="payfast_merchant_id"
                                                                                        id="payfast_merchant_id"
                                                                                        class="form-control form-control-label"
                                                                                        value="<?php echo e(isset($payment_detail['payfast_merchant_id']) ? $payment_detail['payfast_merchant_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Merchant ID')); ?>" />
                                                                                    <?php if($errors->has('payfast_merchant_id')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('payfast_merchant_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="payfast_signature"
                                                                                        class="form-label"><?php echo e(__('Payfast Signature')); ?></label>
                                                                                    <input type="text"
                                                                                        name="payfast_signature"
                                                                                        id="payfast_signature"
                                                                                        class="form-control form-control-label"
                                                                                        value="<?php echo e(isset($payment_detail['payfast_signature']) ? $payment_detail['payfast_signature'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Payfast Signature')); ?>" />
                                                                                    <?php if($errors->has('payfast_signature')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('payfast_signature')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapsetwo"
                                                                        aria-expanded="false" aria-controls="collapsetwo">
                                                                            <?php echo e(__('Iyzipay')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_iyzipay_enabled"
                                                                                    id="is_iyzipay_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_iyzipay_enabled']) && $payment_detail['is_iyzipay_enabled'] == 'on' ? 'checked' : ''); ?>><label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_iyzipay_enabled"><?php echo e(__('')); ?></label>
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
                                                                                    for="iyzipay_mode"><?php echo e(__('Iyzipay Mode')); ?></label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "
                                                                                                name="iyzipay_mode"
                                                                                                value="sandbox"
                                                                                                <?php echo e(!isset($payment_detail['iyzipay_mode']) || empty($payment_detail['iyzipay_mode']) || $payment_detail['iyzipay_mode'] == 'sandbox' ? 'checked' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Sandbox')); ?></span>
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
                                                                                                <?php echo e(isset($payment_detail['iyzipay_mode']) && $payment_detail['iyzipay_mode'] == 'live' ? 'checked' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Live')); ?></span>
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
                                                                                    <?php echo e(Form::label('iyzipay_api_key', __('Api Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('iyzipay_api_key', isset($payment_detail['iyzipay_api_key']) ? $payment_detail['iyzipay_api_key'] : '', ['class' => 'form-control', 'placeholder' => __('Api Key')])); ?>


                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('iyzipay_secret_key', __('Secret Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('iyzipay_secret_key', isset($payment_detail['iyzipay_secret_key']) ? $payment_detail['iyzipay_secret_key'] : '', ['class' => 'form-control', 'placeholder' => __('Secret Key')])); ?>

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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse123" aria-expanded="false"
                                                                        aria-controls="collapse123">
                                                                            <?php echo e(__('SSpay')); ?>

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
                                                                                    <?php echo e(isset($payment_detail['is_sspay_enabled']) && $payment_detail['is_sspay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_sspay_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        class="form-label"><?php echo e(__('Secret_key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="sspay_secret_key"
                                                                                        id="sspay_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['sspay_secret_key']) ? $payment_detail['sspay_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                    <?php if($errors->has('sspay_secret_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('sspay_secret_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="sspay_category_code"
                                                                                        class="form-label"><?php echo e(__('Category Code')); ?></label>
                                                                                    <input type="text"
                                                                                        name="sspay_category_code"
                                                                                        id="sspay_category_code"
                                                                                        class="form-control form-control-label"
                                                                                        value="<?php echo e(isset($payment_detail['sspay_category_code']) ? $payment_detail['sspay_category_code'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Category Code')); ?>" />
                                                                                    <?php if($errors->has('sspay_category_code')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('sspay_category_code')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse101" aria-expanded="false"
                                                                        aria-controls="collapse101">
                                                                            <?php echo e(__('Paytab')); ?>

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
                                                                                    <?php echo e(isset($payment_detail['is_paytab_enabled']) && $payment_detail['is_paytab_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paytab_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        class="form-label"><?php echo e(__('Paytabs Profile Id')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paytabs_profile_id"
                                                                                        id="paytabs_profile_id"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['paytabs_profile_id']) ? $payment_detail['paytabs_profile_id'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Paytabs Profile Id')); ?>" />
                                                                                    <?php if($errors->has('paytabs_profile_id')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytabs_profile_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="paytab_server_key"
                                                                                        class="form-label"><?php echo e(__('Paytab Server Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paytab_server_key"
                                                                                        id="paytab_server_key"
                                                                                        class="form-control form-control-label"
                                                                                        value="<?php echo e(isset($payment_detail['paytab_server_key']) ? $payment_detail['paytab_server_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Paytab Server Key')); ?>" />
                                                                                    <?php if($errors->has('paytab_server_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytab_server_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="paytabs_region"
                                                                                        class="form-label"><?php echo e(__('Paytab Region')); ?></label>
                                                                                    <input type="text"
                                                                                        name="paytabs_region"
                                                                                        id="paytabs_region"
                                                                                        class="form-control form-control-label"
                                                                                        value="<?php echo e(isset($payment_detail['paytabs_region']) ? $payment_detail['paytabs_region'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Paytab Region')); ?>" />
                                                                                    <?php if($errors->has('paytabs_region')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytabs_region')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse102" aria-expanded="false"
                                                                        aria-controls="collapse102">
                                                                            <?php echo e(__('Benefit')); ?>

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
                                                                                    <?php echo e(isset($payment_detail['is_benefit_enabled']) && $payment_detail['is_benefit_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_benefit_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        class="form-label"><?php echo e(__('Secret API Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="benefit_secret_key"
                                                                                        id="benefit_secret_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['benefit_secret_key']) ? $payment_detail['benefit_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Secret API Key')); ?>" />
                                                                                    <?php if($errors->has('benefit_secret_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('benefit_secret_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="benefit_publishable_key"
                                                                                        class="form-label"><?php echo e(__('Publishable API Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="benefit_publishable_key"
                                                                                        id="benefit_publishable_key"
                                                                                        class="form-control form-control-label"
                                                                                        value="<?php echo e(isset($payment_detail['benefit_publishable_key']) ? $payment_detail['benefit_publishable_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Publishable API Key')); ?>" />
                                                                                    <?php if($errors->has('benefit_publishable_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('benefit_publishable_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
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
                                                                        type="button" >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse103" aria-expanded="false"
                                                                        aria-controls="collapse103">
                                                                            <?php echo e(__('Cashfree')); ?>

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
                                                                                    <?php echo e(isset($payment_detail['is_cashfree_enabled']) && $payment_detail['is_cashfree_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_cashfree_enabled"><?php echo e(__('')); ?></label>
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
                                                                                        class="form-label"><?php echo e(__('Cashfree Api Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="cashfree_api_key"
                                                                                        id="cashfree_api_key"
                                                                                        class="form-control"
                                                                                        value="<?php echo e(isset($payment_detail['cashfree_api_key']) ? $payment_detail['cashfree_api_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Cashfree Api Key')); ?>" />
                                                                                    <?php if($errors->has('cashfree_api_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('cashfree_api_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="cashfree_secret_key"
                                                                                        class="form-label"><?php echo e(__('Cashfree Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                        name="cashfree_secret_key"
                                                                                        id="cashfree_secret_key"
                                                                                        class="form-control form-control-label"
                                                                                        value="<?php echo e(isset($payment_detail['cashfree_secret_key']) ? $payment_detail['cashfree_secret_key'] : ''); ?>"
                                                                                        placeholder="<?php echo e(__('Cashfree Secret Key')); ?>" />
                                                                                    <?php if($errors->has('cashfree_secret_key')): ?>
                                                                                        <span
                                                                                            class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('cashfree_secret_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Aamarpay -->
                                                            <div id="" class="accordion-item">
                                                                <h2 class="accordion-header" id="headingTwenty-One">
                                                                    <button class="accordion-button collapsed" type="button">
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#collapseTwenty-One"
                                                                        aria-expanded="true" aria-controls="collapseTwenty-One">
                                                                            <?php echo e(__('Aamarpay')); ?>

                                                                        </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_aamarpay_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_aamarpay_enabled"
                                                                                    id="is_aamarpay_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_aamarpay_enabled']) && $payment_detail['is_aamarpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_aamarpay_enabled"><?php echo e(__('')); ?></label>
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
                                                                                    for="aamarpay_mode"><?php echo e(__('Aamarpay Mode')); ?></label>
                                                                                <div class="col-lg-3">
                                                                                    <div
                                                                                        class="border p-3 accordion-header">
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                class="form-check-input input-primary "
                                                                                                name="aamarpay_mode"
                                                                                                value="sandbox"
                                                                                                <?php echo e(!isset($payment_detail['aamarpay_mode']) || empty($payment_detail['aamarpay_mode']) || $payment_detail['aamarpay_mode'] == 'sandbox' ? 'checked' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Sandbox')); ?></span>
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
                                                                                                <?php echo e(isset($payment_detail['aamarpay_mode']) && $payment_detail['aamarpay_mode'] == 'live' ? 'checked' : ''); ?>>
                                                                                            <label
                                                                                                class="form-check-label d-block"
                                                                                                for="">
                                                                                                <span>
                                                                                                    <span
                                                                                                        class="h5 d-block"><strong
                                                                                                            class="float-end"></strong><?php echo e(__('Live')); ?></span>
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
                                                                                    <?php echo e(Form::label('aamarpay_store_id', __('Store Id'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('aamarpay_store_id', isset($payment_detail['aamarpay_store_id']) ? $payment_detail['aamarpay_store_id'] : '', ['class' => 'form-control', 'placeholder' => __('Store Id')])); ?><br>
                                                                                    <?php if($errors->has('aamarpay_store_id')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('aamarpay_store_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('aamarpay_signature_key', __('Signature Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('aamarpay_signature_key', isset($payment_detail['aamarpay_signature_key']) ? $payment_detail['aamarpay_signature_key'] : '', ['class' => 'form-control', 'placeholder' => __('Signature Key')])); ?><br>
                                                                                    <?php if($errors->has('aamarpay_signature_key')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('aamarpay_signature_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('aamarpay_description', __('Description'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('aamarpay_description', isset($payment_detail['aamarpay_description']) ? $payment_detail['aamarpay_description'] : '', ['class' => 'form-control', 'placeholder' => __('Description')])); ?><br>
                                                                                    <?php if($errors->has('aamarpay_description')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('aamarpay_description')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- PayTr -->
                                                            <div id="" class="accordion-item">
                                                                <h2 class="accordion-header" id="headingTwentyfour">
                                                                    <button class="accordion-button collapsed" type="button"
                                                                        >
                                                                        <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwentyfive"
                                                                        aria-expanded="true" aria-controls="collapseTwentyfive">
                                                                            <?php echo e(__('PayTR')); ?>

                                                                        </span>
                                                                        
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2">Enable:</span>
                                                                            <div
                                                                                class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden"
                                                                                    name="is_paytr_enabled"
                                                                                    value="off">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    name="is_paytr_enabled"
                                                                                    id="is_paytr_enabled"
                                                                                    <?php echo e(isset($payment_detail['is_paytr_enabled']) && $payment_detail['is_paytr_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                                <label
                                                                                    class="custom-control-label form-control-label"
                                                                                    for="is_paytr_enabled"><?php echo e(__('')); ?></label>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseTwentyfive" class="accordion-collapse collapse"
                                                                    aria-labelledby="headingTwentyfour"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row pt-2">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('paytr_merchant_id', __('Merchant Id'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('paytr_merchant_id', isset($payment_detail['paytr_merchant_id']) ? $payment_detail['paytr_merchant_id'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Id')])); ?><br>
                                                                                    <?php if($errors->has('paytr_merchant_id')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytr_merchant_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('paytr_merchant_key', __('Merchant Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('paytr_merchant_key', isset($payment_detail['paytr_merchant_key']) ? $payment_detail['paytr_merchant_key'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Key')])); ?><br>
                                                                                    <?php if($errors->has('paytr_merchant_key')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytr_merchant_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('paytr_merchant_salt', __('Merchant Salt'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('paytr_merchant_salt', isset($payment_detail['paytr_merchant_salt']) ? $payment_detail['paytr_merchant_salt'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Salt')])); ?><br>
                                                                                    <?php if($errors->has('paytr_merchant_salt')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytr_merchant_salt')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
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
                                                        class="btn-submit btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="pusher-settings" class="card">
                            <div class="col-md-12">
                                <form method="POST" action="<?php echo e(route('pusher.settings.store')); ?>"
                                    accept-charset="UTF-8">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class=""><?php echo e(__('Pusher Settings')); ?></h5>
                                            </div>
                                            <div class=" col-6 text-end">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3 ">
                                                        <div class="custom-control custom-switch">
                                                            <label class="custom-control-label form-control-label px-2"
                                                                for="enable_chat "><?php echo e(__('Enable Chat')); ?></label>
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="enable_chat" id="enable_chat"
                                                                <?php echo e(!empty(env('CHAT_MODULE')) && env('CHAT_MODULE') == 'on' ? 'checked="checked"' : ''); ?>>

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
                                                    class="form-label"><?php echo e(__('Pusher App Id')); ?></label>
                                                <input class="form-control" placeholder="Enter Pusher App Id"
                                                    name="pusher_app_id" type="text"
                                                    value="<?php echo e(env('PUSHER_APP_ID')); ?>" id="pusher_app_id" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="pusher_app_key"
                                                    class="form-label"><?php echo e(__('Pusher App Key')); ?></label>
                                                <input class="form-control " placeholder="Enter Pusher App Key"
                                                    name="pusher_app_key" type="text"
                                                    value="<?php echo e(env('PUSHER_APP_KEY')); ?>" id="pusher_app_key" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="pusher_app_secret"
                                                    class="form-label"><?php echo e(__('Pusher App Secret')); ?></label>
                                                <input class="form-control " placeholder="Enter Pusher App Secret"
                                                    name="pusher_app_secret" type="text"
                                                    value="<?php echo e(env('PUSHER_APP_SECRET')); ?>" id="pusher_app_secret"
                                                    required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="pusher_app_cluster"
                                                    class="form-label"><?php echo e(__('Pusher App Cluster')); ?></label>
                                                <input class="form-control " placeholder="Enter Pusher App Cluster"
                                                    name="pusher_app_cluster" type="text"
                                                    value="<?php echo e(env('PUSHER_APP_CLUSTER')); ?>" id="pusher_app_cluster"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="text-end p-2">
                                            <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                                                class="btn-submit btn btn-primary">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <div id="recaptcha-settings" class="card">
                            <div class="col-md-12">
                                <form method="POST" action="<?php echo e(route('recaptcha.settings.store')); ?>"
                                    accept-charset="UTF-8">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class=""><?php echo e(__('ReCaptcha Settings')); ?></h5>
                                                <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                    target="_blank" class="text-blue ">
                                                    <small
                                                        class="d-block mt-2">(<?php echo e(__('How to Get Google reCaptcha Site and Secret key')); ?>)</small>
                                                </a>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3 ">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="recaptcha_module" id="recaptcha_module"
                                                                <?php echo e(!empty(env('RECAPTCHA_MODULE')) && env('RECAPTCHA_MODULE') == 'on' ? 'checked="checked"' : ''); ?>>
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
                                                    class="form-label"><?php echo e(__('Google Recaptcha Key')); ?></label>
                                                <input class="form-control"
                                                    placeholder="<?php echo e(__('Enter Google Recaptcha Key')); ?>"
                                                    name="google_recaptcha_key" type="text"
                                                    value="<?php echo e(env('NOCAPTCHA_SITEKEY')); ?>" id="google_recaptcha_key"
                                                    required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="google_recaptcha_secret"
                                                    class="form-label"><?php echo e(__('Google Recaptcha Secret')); ?></label>
                                                <input class="form-control "
                                                    placeholder="<?php echo e(__('Enter Google Recaptcha Secret')); ?>"
                                                    name="google_recaptcha_secret" type="text"
                                                    value="<?php echo e(env('NOCAPTCHA_SECRET')); ?>" id="google_recaptcha_secret"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                                                class="btn-submit btn btn-primary">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--storage Setting-->
                        <div id="storage-settings" class="card mb-3">
                            <?php echo e(Form::open(['route' => 'storage.setting.store', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <h5 class=""><?php echo e(__('Storage Settings')); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-sm-row flex-column">
                                    <div class="pe-2 pb-3">
                                        <input type="radio" class="btn-check" name="storage_setting"
                                            id="local-outlined" autocomplete="off"
                                            <?php echo e($setting['storage_setting'] == 'local' ? 'checked' : ''); ?> value="local"
                                            checked>
                                        <label class="btn btn-outline-primary col-12"
                                            for="local-outlined"><?php echo e(__('Local')); ?></label>
                                    </div>
                                    <div class="pe-2 pb-3">
                                        <input type="radio" class="btn-check" name="storage_setting"
                                            id="s3-outlined" autocomplete="off"
                                            <?php echo e($setting['storage_setting'] == 's3' ? 'checked' : ''); ?> value="s3">
                                        <label class="btn btn-outline-primary col-12" for="s3-outlined">
                                            <?php echo e(__('AWS S3')); ?></label>
                                    </div>

                                    <div class="pe-2 pb-3">
                                        <input type="radio" class="btn-check" name="storage_setting"
                                            id="wasabi-outlined" autocomplete="off"
                                            <?php echo e($setting['storage_setting'] == 'wasabi' ? 'checked' : ''); ?>

                                            value="wasabi">
                                        <label class="btn btn-outline-primary col-12"
                                            for="wasabi-outlined"><?php echo e(__('Wasabi')); ?></label>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="local-setting row ">

                                        <div class="form-group col-8 switch-width">
                                            <?php echo e(Form::label('local_storage_validation', __('Only Upload Files'), ['class' => ' form-label'])); ?>

                                            <select name="local_storage_validation[]" class="multi-select"
                                                data-toggle="select2" id="local_storage_validation"
                                                multiple="multiple">
                                                <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(in_array($f, $local_storage_validations)): ?> selected <?php endif; ?>>
                                                        <?php echo e($f); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="local_storage_max_upload_size"><?php echo e(__('Max upload size ( In KB)')); ?></label>
                                                <input type="number" name="local_storage_max_upload_size"
                                                    class="form-control"
                                                    value="<?php echo e(!isset($setting['local_storage_max_upload_size']) || is_null($setting['local_storage_max_upload_size']) ? '' : $setting['local_storage_max_upload_size']); ?>"
                                                    placeholder="<?php echo e(__('Max upload size')); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="s3-setting row <?php echo e($setting['storage_setting'] == 's3' ? ' ' : 'd-none'); ?>">

                                        <div class=" row ">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_key"><?php echo e(__('S3 Key')); ?></label>
                                                    <input type="text" name="s3_key" class="form-control"
                                                        value="<?php echo e(!isset($setting['s3_key']) || is_null($setting['s3_key']) ? '' : $setting['s3_key']); ?>"
                                                        placeholder="<?php echo e(__('S3 Key')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_secret"><?php echo e(__('S3 Secret')); ?></label>
                                                    <input type="text" name="s3_secret" class="form-control"
                                                        value="<?php echo e(!isset($setting['s3_secret']) || is_null($setting['s3_secret']) ? '' : $setting['s3_secret']); ?>"
                                                        placeholder="<?php echo e(__('S3 Secret')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_region"><?php echo e(__('S3 Region')); ?></label>
                                                    <input type="text" name="s3_region" class="form-control"
                                                        value="<?php echo e(!isset($setting['s3_region']) || is_null($setting['s3_region']) ? '' : $setting['s3_region']); ?>"
                                                        placeholder="<?php echo e(__('S3 Region')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_bucket"><?php echo e(__('S3 Bucket')); ?></label>
                                                    <input type="text" name="s3_bucket" class="form-control"
                                                        value="<?php echo e(!isset($setting['s3_bucket']) || is_null($setting['s3_bucket']) ? '' : $setting['s3_bucket']); ?>"
                                                        placeholder="<?php echo e(__('S3 Bucket')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_url"><?php echo e(__('S3 URL')); ?></label>
                                                    <input type="text" name="s3_url" class="form-control"
                                                        value="<?php echo e(!isset($setting['s3_url']) || is_null($setting['s3_url']) ? '' : $setting['s3_url']); ?>"
                                                        placeholder="<?php echo e(__('S3 URL')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_endpoint"><?php echo e(__('S3 Endpoint')); ?></label>
                                                    <input type="text" name="s3_endpoint" class="form-control"
                                                        value="<?php echo e(!isset($setting['s3_endpoint']) || is_null($setting['s3_endpoint']) ? '' : $setting['s3_endpoint']); ?>"
                                                        placeholder="<?php echo e(__('S3 Bucket')); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-8 switch-width">
                                                <?php echo e(Form::label('s3_storage_validation', __('Only Upload Files'), ['class' => ' form-label'])); ?>

                                                <select name="s3_storage_validation[]" class="multi-select"
                                                    data-toggle="select2" id="s3_storage_validation"
                                                    multiple="multiple">
                                                    <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(in_array($f, $s3_storage_validations)): ?> selected <?php endif; ?>>
                                                            <?php echo e($f); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_max_upload_size"><?php echo e(__('Max upload size ( In KB)')); ?></label>
                                                    <input type="number" name="s3_max_upload_size"
                                                        class="form-control"
                                                        value="<?php echo e(!isset($setting['s3_max_upload_size']) || is_null($setting['s3_max_upload_size']) ? '' : $setting['s3_max_upload_size']); ?>"
                                                        placeholder="<?php echo e(__('Max upload size')); ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div
                                        class="wasabi-setting row <?php echo e($setting['storage_setting'] == 'wasabi' ? ' ' : 'd-none'); ?>">
                                        <div class=" row ">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_key"><?php echo e(__('Wasabi Key')); ?></label>
                                                    <input type="text" name="wasabi_key" class="form-control"
                                                        value="<?php echo e(!isset($setting['wasabi_key']) || is_null($setting['wasabi_key']) ? '' : $setting['wasabi_key']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Key')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_secret"><?php echo e(__('Wasabi Secret')); ?></label>
                                                    <input type="text" name="wasabi_secret" class="form-control"
                                                        value="<?php echo e(!isset($setting['wasabi_secret']) || is_null($setting['wasabi_secret']) ? '' : $setting['wasabi_secret']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Secret')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="s3_region"><?php echo e(__('Wasabi Region')); ?></label>
                                                    <input type="text" name="wasabi_region" class="form-control"
                                                        value="<?php echo e(!isset($setting['wasabi_region']) || is_null($setting['wasabi_region']) ? '' : $setting['wasabi_region']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Region')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_bucket"><?php echo e(__('Wasabi Bucket')); ?></label>
                                                    <input type="text" name="wasabi_bucket" class="form-control"
                                                        value="<?php echo e(!isset($setting['wasabi_bucket']) || is_null($setting['wasabi_bucket']) ? '' : $setting['wasabi_bucket']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Bucket')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_url"><?php echo e(__('Wasabi URL')); ?></label>
                                                    <input type="text" name="wasabi_url" class="form-control"
                                                        value="<?php echo e(!isset($setting['wasabi_url']) || is_null($setting['wasabi_url']) ? '' : $setting['wasabi_url']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi URL')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_root"><?php echo e(__('Wasabi Root')); ?></label>
                                                    <input type="text" name="wasabi_root" class="form-control"
                                                        value="<?php echo e(!isset($setting['wasabi_root']) || is_null($setting['wasabi_root']) ? '' : $setting['wasabi_root']); ?>"
                                                        placeholder="<?php echo e(__('Wasabi Bucket')); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-8 switch-width">
                                                <?php echo e(Form::label('wasabi_storage_validation', __('Only Upload Files'), ['class' => 'form-label'])); ?>


                                                <select name="wasabi_storage_validation[]" class="multi-select"
                                                    data-toggle="select2" id="wasabi_storage_validation"
                                                    multiple='multiple'>
                                                    <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(in_array($f, $wasabi_storage_validations)): ?> selected <?php endif; ?>>
                                                            <?php echo e($f); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="wasabi_root"><?php echo e(__('Max upload size ( In KB)')); ?></label>
                                                    <input type="number" name="wasabi_max_upload_size"
                                                        class="form-control"
                                                        value="<?php echo e(!isset($setting['wasabi_max_upload_size']) || is_null($setting['wasabi_max_upload_size']) ? '' : $setting['wasabi_max_upload_size']); ?>"
                                                        placeholder="<?php echo e(__('Max upload size')); ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class=" text-end">
                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-primary'])); ?>

                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>

                        <!--seo-->
                        <div class="" id="seo">
                            <?php echo e(Form::open(['route' => ['settings.seo.store'], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <h5 class="col-6">
                                                    <?php echo e(__('SEO Settings')); ?>

                                                </h5>
                                                <div class="text-end col-6">
                                                    <a data-size="lg" data-ajax-popup-over="true" class="btn btn-sm text-white btn-primary" data-url="<?php echo e(route('generate',['seo'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate with AI')); ?>" data-title="<?php echo e(__('Generate Meta Keywords and Meta Description')); ?>">
                                                        <i class="fas fa-robot text-white px-1"></i><?php echo e(__('Generate with AI')); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-12 row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                            <?php echo e(Form::label('Telegram Access Token', __('Meta Keywords'), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::text('meta_keywords', isset($payment_detail['meta_keywords']) ? $payment_detail['meta_keywords'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Meta Keywords'), 'required' => 'required'])); ?>

                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                            <?php echo e(Form::label('Telegram ChatID', __('Meta Description'), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::textarea('meta_description', isset($payment_detail['meta_description']) ? $payment_detail['meta_description'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Meta Description'), 'required' => 'required'])); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <h6><?php echo e(__('Meta Image')); ?></h6>
                                                        <div class="logo-content">
                                                            <img src="<?php if($payment_detail['meta_image']): ?> <?php echo e(asset($meta_images . $payment_detail['meta_image'])); ?> <?php else: ?><?php echo e(asset($meta_images . 'meta_image.png')); ?> <?php endif; ?>"
                                                                class="col-9" id="meta" />
                                                        </div>
                                                        <div class="choose-file mt-5 ">
                                                            <label for="meta_image">
                                                                <div class=" bg-primary"> <i
                                                                        class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                </div>
                                                                <input type="file" name="meta_image"
                                                                    id="meta_image" class="custom-input-file choose_file_custom"
                                                                    onchange="document.getElementById('meta').src = window.URL.createObjectURL(this.files[0])" />
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class=" text-end">
                                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-primary'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>

                        <!--cache-->
                        <div class="" id="cache">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="">
                                                <?php echo e(__('Cache Settings')); ?>

                                            </h5>
                                            <small class="text-secondary font-weight-bold">This is a page meant for more advanced users, simply ignore
                                                it if you don't
                                                understand what cache is.</small>
                                        </div>
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12 py-3">
                                                        <?php echo e(Form::label('cache', __('Current cache size'), ['class' => 'col-form-label' ])); ?>

                                                        <div class="input-group ">
                                                            <input type="text" name="cache"
                                                            value="<?php echo e(App\Models\Utility::GetCacheSize()); ?>"
                                                            class="form-control" disabled>
                                                            <span
                                                            class="input-group-text bg-transparent"><?php echo e(__('MB')); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="  text-end">
                                                        <a href="<?php echo e(url('config-cache')); ?>"
                                                        class="btn  btn-primary"><?php echo e(__('Clear Cache')); ?></a>
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
                                       
                                        <?php echo e(Form::open(array('route'=>'cookie.setting','method'=>'post'))); ?>

                                            <div class="card-header flex-column flex-lg-row  d-flex align-items-lg-center gap-2 justify-content-between">
                                                <h5><?php echo e(__('Cookie Settings')); ?></h5>
                                                <div class="d-flex align-items-center">
                                                    <?php echo e(Form::label('enable_cookie', __('Enable cookie'), ['class' => 'col-form-label p-0 fw-bold me-3'])); ?>

                                                    <div class="custom-control custom-switch" id="cookie_dis">
                                                        <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" name="enable_cookie" class="form-check-input input-primary "
                                                            id="enable_cookie" <?php echo e($payment_detail['enable_cookie'] == 'on' ? ' checked ' : ''); ?>>
                                                        <label class="custom-control-label mb-1" for="enable_cookie"></label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="text-end col-12">
                                                        <a data-size="lg" data-ajax-popup-over="true" class="btn btn-sm text-white btn-primary" data-url="<?php echo e(route('generate',['cookie'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate with AI')); ?>" data-title="<?php echo e(__('Generate Cookie Title & Description')); ?>">
                                                            <i class="fas fa-robot text-white px-1"></i><?php echo e(__('Generate with AI')); ?></a>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch custom-switch-v1">
                                                            <input type="checkbox" name="cookie_logging" class="form-check-input input-primary"
                                                                id="todisable" <?php echo e($payment_detail['cookie_logging'] == 'on' ? ' checked ' : ''); ?>>
                                                            <label class="form-check-label" for="cookie_logging"><?php echo e(__('Enable logging')); ?></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('cookie_title', __('Cookie Title'), ['class' => 'col-form-label' ])); ?>

                                                            <?php echo e(Form::text('cookie_title', isset($payment_detail['cookie_title']) ? $payment_detail['cookie_title'] : '', ['class' => 'form-control ', 'id' => 'todisable' ])); ?>

                                                        </div>
                                                        <div class="form-group ">
                                                            <?php echo e(Form::label('cookie_description', __('Cookie Description'), ['class' => ' form-label'])); ?>

                                                            <?php echo Form::textarea('cookie_description', isset($payment_detail['cookie_description']) ? $payment_detail['cookie_description'] : '', ['class' => 'form-control ', 'rows' => '2' , 'id' => 'todisable']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-switch custom-switch-v1 ">
                                                            <input type="checkbox" name="necessary_cookies" class="form-check-input input-primary"
                                                            id="todisable" <?php echo e($payment_detail['necessary_cookies'] == 'on' ? ' checked ' : ''); ?> checked onclick="return false">
                                                            <label class="form-check-label" for="necessary_cookies"><?php echo e(__('Strictly necessary cookies')); ?></label>
                                                        </div>
                                                        <div class="form-group ">
                                                            <?php echo e(Form::label('strictly_cookie_title', __(' Strictly Cookie Title'), ['class' => 'col-form-label'])); ?>

                                                            <?php echo e(Form::text('strictly_cookie_title', isset($payment_detail['strictly_cookie_title']) ? $payment_detail['strictly_cookie_title'] : '', ['class' => 'form-control' , 'id' => 'todisable'])); ?>

                                                        </div>
                                                        <div class="form-group ">
                                                            <?php echo e(Form::label('strictly_cookie_description', __('Strictly Cookie Description'), ['class' => ' form-label'])); ?>

                                                            <?php echo Form::textarea('strictly_cookie_description', isset($payment_detail['strictly_cookie_description']) ? $payment_detail['strictly_cookie_description'] : '', ['class' => 'form-control ', 'rows' => '2' , 'id' => 'todisable' ]); ?>

                                                        </div>
                                                    </div>
                                                        <div class="col-12">
                                                            <h5><?php echo e(__('More Information')); ?></h5>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <?php echo e(Form::label('more_information_description', __('Contact Us Description'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::text('more_information_description', isset($payment_detail['more_information_description']) ? $payment_detail['more_information_description'] : '', ['class' => 'form-control' , 'id' => 'todisable'])); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <?php echo e(Form::label('contactus_url', __('Contact Us URL'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::text('contactus_url', isset($payment_detail['contactus_url']) ? $payment_detail['contactus_url'] : '', ['class' => 'form-control' , 'id' => 'todisable'])); ?>

                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="card-footer row" >
                                                <div class="text-start col">
                                                    <?php if(file_exists(storage_path() . '/uploads/sample/data.csv') && $setting['cookie_logging'] == 'on'): ?>
                                                            <label for="file" class="form-label"><?php echo e(__('Download cookie accepted data')); ?></label>
                                                            <a href="<?php echo e(asset(Storage::url('uploads/sample')) . '/data.csv'); ?>" class="btn  btn-primary">
                                                                <i class="ti ti-download"></i>
                                                            </a>
                                                    <?php endif; ?> 
                                                </div>
                                                <div class="text-end col-auto">
                                                    <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn btn-primary">
                                                </div>
                                            </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--chat-gtp-->
                        <div class="" id="chat-gpt-settings">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card" id="">
                                       
                                        <?php echo e(Form::model($payment_detail,array('route'=>'settings.chatgptkey','method'=>'post'))); ?>

                                            <div class="card-header flex-column flex-lg-row  d-flex align-items-lg-center gap-2 justify-content-between">
                                                <h5><?php echo e(__('Chat GPT Key Settings')); ?></h5>
                                                
                                                

                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <?php echo e(Form::label('chatgpt_key', __('ChatGPT key'), ['class' => 'col-form-label'])); ?>

                                                                <?php echo e(Form::text('chatgpt_key',isset($payment_detail['chatgpt_key']) ? $payment_detail['chatgpt_key'] : '',['class'=>'form-control','placeholder'=>__('Enter Chatgpt Key Here')])); ?>

                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="text-end ">
                                                    <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn btn-primary">
                                                </div>
                                            </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- [ sample-page ] end -->
                </div>
                <!-- [ Main Content ] end -->
            </div>
        <?php $__env->stopSection(); ?>




        <?php $__env->startPush('scripts'); ?>
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
            <?php if($payment_detail['enable_cookie'] != 'on'): ?>
                <script>
                    ele = document.querySelectorAll('[id="todisable"]');
                    for (i = 0; i < ele.length; i++){
                    ele[i].disabled = true;}
                </script>
            <?php endif; ?>
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
                            .setAttribute("src", "<?php echo e(asset('assets/images/logo.svg')); ?>");
                        document
                            .querySelector("#main-style-link")
                            .setAttribute("href", "<?php echo e(asset('assets/css/style-dark.css')); ?>");
                    } else {
                        document
                            .querySelector(".m-header > .b-brand > .logo-lg")
                            .setAttribute("src", "<?php echo e(asset('assets/images/logo-dark.svg')); ?>");
                        document
                            .querySelector("#main-style-link")
                            .setAttribute("href", "<?php echo e(asset('assets/css/style.css')); ?>");
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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
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
        <?php $__env->stopPush(); ?>
        <style>
            .active_color {
                /* background-color: #ffffff !important; */
                border: 2px solid #000 !important;
            }
        </style>

        <?php if($color == 'theme-3'): ?>
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
        <?php endif; ?>

        <?php if($color == 'theme-2'): ?>
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
        <?php endif; ?>

        <?php if($color == 'theme-4'): ?>
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
        <?php endif; ?>
        <?php if($color == 'theme-1'): ?>
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
        <?php endif; ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/setting.blade.php ENDPATH**/ ?>