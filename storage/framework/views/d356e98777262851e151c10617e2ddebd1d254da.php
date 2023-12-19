<?php
    $logo = \App\Models\Utility::get_file('logo/');
    if (Auth::user()->type == 'admin') {
        $setting = App\Models\Utility::getAdminPaymentSettings();
        if ($setting['color']) {
            $color = $setting['color'];
        } else {
            $color = 'theme-3';
        }
        $dark_mode = $setting['cust_darklayout'];
        $cust_theme_bg = $setting['cust_theme_bg'];
        $SITE_RTL = env('SITE_RTL');
    } else {
        $setting = App\Models\Utility::getcompanySettings($currentWorkspace->id);
        $color = $setting->theme_color;
        $dark_mode = $setting->cust_darklayout;
        $SITE_RTL = $setting->site_rtl;
        $cust_theme_bg = $setting->cust_theme_bg;
    }

    if ($color == '' || $color == null) {
        $settings = App\Models\Utility::getAdminPaymentSettings();
        $color = $settings['color'];
    }

    if ($dark_mode == '' || $dark_mode == null) {
        $dark_mode = $settings['cust_darklayout'];
    }

    if ($cust_theme_bg == '' || $dark_mode == null) {
        $cust_theme_bg = $settings['cust_theme_bg'];
    }

    if ($SITE_RTL == '' || $SITE_RTL == null) {
        $SITE_RTL = env('SITE_RTL');
    }
?>

<?php $__env->startSection('page-title', __('Settings')); ?>
<?php $__env->startSection('links'); ?>
    <?php if(\Auth::guard('client')->check()): ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php endif; ?>
    <li class="breadcrumb-item"> <?php echo e(__('Settings')); ?></li>
<?php $__env->stopSection(); ?>
<style type="text/css">
    .row>* {
        flex-shrink: 0;
        /* width: 100%; */
        width: none !important;
        max-width: 100% !important;
        padding-right: calc(var(--bs-gutter-x) * .5);
        padding-left: calc(var(--bs-gutter-x) * .5);
        margin-top: var(--bs-gutter-y);
        /* width: auto; */
    }
</style>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#workspace-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Workspace Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#task-stage-settings"
                                class="list-group-item list-group-item-action border-0 "><?php echo e(__('Task Stage Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#bug-stage-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Bug Stage Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#tax-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Tax Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#company-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Company Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#payment-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Payment Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#invoice-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Invoice Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#email-notification-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Email Notification Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#time-tracker-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Time Tracker Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#zoom-meeting-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Zoom Meeting Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <?php if(Auth::user()->type == 'user'): ?>
                                <a href="#slack-settings"
                                    class="list-group-item list-group-item-action border-0"><?php echo e(__('Slack Settings')); ?><div
                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#telegram-settings"
                                    class="list-group-item list-group-item-action border-0"><?php echo e(__('Telegram Settings')); ?>

                                    <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#google-calender"
                                   class="list-group-item list-group-item-action border-0"><?php echo e(__('Google Calender Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                                <a href="#webhook-settings"
                                   class="list-group-item list-group-item-action border-0"><?php echo e(__('Webhook Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                <a href="#email-settings"
                                class="list-group-item list-group-item-action border-0 "><?php echo e(__('Email Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">

                    <div id="workspace-settings" class="">
                        <?php echo e(Form::open(['route' => ['workspace.settings.store', $currentWorkspace->slug], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="card ">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Workspace Settings')); ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5><?php echo e(__('Dark Logo')); ?></h5>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="logo-content">
                                                                <img src="<?php if($currentWorkspace->logo): ?> <?php echo e(asset($logo . $currentWorkspace->logo .'?timestamp='.strtotime(isset($currentWorkspace) ? $currentWorkspace->updated_at : ''))); ?> <?php else: ?><?php echo e(asset($logo . 'logo-light.png')); ?> <?php endif; ?>"
                                                                style="filter: drop-shadow(2px 3px 7px #011c4b);" class="small_logo" id="dark_logo" />
                                                            </div>

                                                            <div class="choose-file mt-5 ">
                                                                <label for="logo">

                                                                    <div class=" bg-primary" style="cursor: pointer;transform: translateY(+110%);"> <i
                                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                    </div>
                                                                    <input type="file" class="form-control choose_file_custom"
                                                                        name="logo" id="logo"
                                                                        data-filename="edit-logo">
                                                                </label>
                                                                <p class="edit-logo"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4">
                                                    <div class="card ">
                                                        <div class="card-header">
                                                            <h5><?php echo e(__('Light Logo')); ?></h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="logo-content">
                                                                <img src="<?php if($currentWorkspace->logo_white): ?> <?php echo e(asset($logo . $currentWorkspace->logo_white .'?timestamp='.strtotime(isset($currentWorkspace) ? $currentWorkspace->updated_at : ''))); ?> <?php else: ?><?php echo e(asset($logo . 'logo-dark.png')); ?> <?php endif; ?>"
                                                                style="filter: drop-shadow(2px 3px 7px #011c4b);"  id="image" class="small_logo" />
                                                            </div>
                                                            <div class="choose-file mt-5 ">
                                                                <label for="logo_white">

                                                                    <div class=" bg-primary" style="cursor: pointer;transform: translateY(+110%);"> <i
                                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                    </div>
                                                                    <input type="file" class="form-control choose_file_custom"
                                                                        name="logo_white" id="logo_white"
                                                                        data-filename="edit-logo_white">
                                                                </label>
                                                                <p class="edit-logo_white"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 ">
                                                    <div class="card ">
                                                        <div class="card-header">
                                                            <h5><?php echo e(__('Favicon')); ?></h5>
                                                        </div>
                                                        <div class="card-body" >
                                                            <div class="logo-content">


                                                                <img src="<?php if($currentWorkspace->favicon): ?> <?php echo e(asset($logo . $currentWorkspace->favicon.'?timestamp='.strtotime(isset($currentWorkspace) ? $currentWorkspace->updated_at : ''))); ?> <?php else: ?><?php echo e(asset($logo . 'favicon.png')); ?> <?php endif; ?>"
                                                                    id="favicon" class="favicon"
                                                                      style="width:60px !important" />
                                                            </div>
                                                            <div class="choose-file mt-5 ">
                                                                <label for="small-favicon">

                                                                    <div class=" bg-primary" style="cursor: pointer;transform: translateY(+100%);"> <i
                                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                    </div>
                                                                    <input type="file" class="form-control choose_file_custom"
                                                                        name="favicon" id="small-favicon"
                                                                        data-filename="edit-favicon">
                                                                </label>
                                                                <p class="edit-favicon"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

                                                    <?php echo e(Form::text('name', $currentWorkspace->name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Name')])); ?>

                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-name" role="alert">
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
                                                    $DEFAULT_LANG = $currentWorkspace->lang ? $currentWorkspace->lang : 'en';
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
                                            
                                            <h4 class="small-title mb-4">Theme Customizer</h4>
                                            <div class="col-12">
                                                <div class="pct-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6 class="">
                                                                <i data-feather="credit-card" class="me-2"></i>Primary
                                                                color settings
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
                                                        <div class="col-sm-3">
                                                            <h6 class="">
                                                                <i data-feather="layout" class="me-2"></i>Sidebar
                                                                settings
                                                            </h6>
                                                            <hr class="my-2" />
                                                            <div class="form-check form-switch">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="cust-theme-bg" name="cust_theme_bg"
                                                                    <?php if($cust_theme_bg == 'on'): ?> checked <?php endif; ?> />
                                                                <label class="form-check-label f-w-600 pl-1"
                                                                    for="cust-theme-bg">Transparent layout</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <h6 class="">
                                                                <i data-feather="sun" class=""></i>Layout settings
                                                            </h6>
                                                            <hr class="my-2" />
                                                            <div class="form-check form-switch mt-2">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="cust-darklayout" name="cust_darklayout"
                                                                    <?php if($dark_mode == 'on'): ?> checked <?php endif; ?> />

                                                                <label class="form-check-label f-w-600 pl-1"
                                                                    for="cust-darklayout">Dark Layout</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="col switch-width">
                                                                <div class="form-group ml-2 mr-3 ">
                                                                    <label
                                                                        class="form-label mb-1"><?php echo e(__('Enable RTL')); ?></label>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" data-toggle="switchbutton"
                                                                            data-onstyle="primary" class=""
                                                                            name="site_rtl" id="site_rtl"
                                                                            <?php echo e(!empty($SITE_RTL) && $SITE_RTL == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        <label class="custom-control-label"
                                                                            for="site_rtl"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end mt-2">
                                                <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                                                    class="btn btn-primary">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    <div id="task-stage-settings" class="">
                        <div class="">
                            <div class="col-md-12">
                                <div class="card task-stages" data-value="<?php echo e(json_encode($stages)); ?>" style="overflow-x: auto">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-11">
                                                <h5 class="pb-2">
                                                    <?php echo e(__('Task Stage Settings')); ?>


                                                </h5>
                                                <small
                                                    class="pt-2"><?php echo e(__('System will consider the last stage as a completed/done project or task status.')); ?></small>
                                            </div>
                                            <div class="col-auto  text-end">

                                                <button data-repeater-create type="button"
                                                    class="btn-submit btn btn-sm btn-primary btn-icon "
                                                    data-toggle="tooltip" title="<?php echo e(__('Add')); ?>">
                                                    <i class="ti ti-plus"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form method="post"
                                            action="<?php echo e(route('stages.store', $currentWorkspace->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <table class="table table-hover" data-repeater-list="stages">
                                                <thead>
                                                    <th>
                                                        <div data-toggle="tooltip" data-placement="left"
                                                            data-title="<?php echo e(__('Drag Stage to Change Order')); ?>"
                                                            data-original-title="" title="">
                                                            <i class="fas fa-crosshairs"></i>
                                                        </div>
                                                    </th>
                                                    <th><?php echo e(__('Color')); ?></th>
                                                    <th><?php echo e(__('Name')); ?></th>
                                                    <th class="text-right"><?php echo e(__('Delete')); ?></th>
                                                </thead>
                                                <tbody>
                                                    <tr data-repeater-item>
                                                        <td><i class="fas fa-crosshairs sort-handler"></i></td>
                                                        <td>
                                                            <input type="color" name="color">
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="id" id="id" />
                                                            <input type="text" name="name"
                                                                class="form-control mb-0" required />
                                                        </td>
                                                        <td class="text-right ">
                                                            <a data-repeater-delete
                                                                class=" action-btn btn-danger  btn btn-sm d-inline-flex align-items-center"
                                                                data-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"><i
                                                                    class="ti ti-trash text-white"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-end pt-2">
                                                <button class="btn-submit btn btn-primary"
                                                    type="submit"><?php echo e(__('Save Changes')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="bug-stage-settings" class="tab-pane">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card bug-stages" data-value="<?php echo e(json_encode($bugStages)); ?>" style="overflow-x: auto">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-11">
                                                <h5 class="pb-2">
                                                    <?php echo e(__('Bug Stage Settings')); ?>

                                                </h5>
                                                <small
                                                    class=""><?php echo e(__('System will consider the last stage as a completed/done project or bug status.')); ?></small>
                                            </div>
                                            <div class=" col-auto text-end">
                                                <button data-repeater-create type="button"
                                                    class="btn-submit btn btn-sm btn-primary " data-toggle="tooltip"
                                                    title="<?php echo e(__('Add')); ?>">
                                                    <i class="ti ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post"
                                            action="<?php echo e(route('bug.stages.store', $currentWorkspace->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <table class="table table-hover" data-repeater-list="stages">
                                                <thead>
                                                    <th>
                                                        <div data-toggle="tooltip" data-placement="left"
                                                            data-title="<?php echo e(__('Drag Stage to Change Order')); ?>"
                                                            data-original-title="" title="">
                                                            <i class="fas fa-crosshairs"></i>
                                                        </div>
                                                    </th>
                                                    <th><?php echo e(__('Color')); ?></th>
                                                    <th><?php echo e(__('Name')); ?></th>
                                                    <th class="text-right"><?php echo e(__('Delete')); ?></th>
                                                </thead>
                                                <tbody>
                                                    <tr data-repeater-item>
                                                        <td><i class="fas fa-crosshairs sort-handler"></i></td>
                                                        <td>
                                                            <input type="color" name="color">
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="id" id="id" />
                                                            <input type="text" name="name"
                                                                class="form-control mb-0" required />
                                                        </td>
                                                        <td class="text-right">
                                                            <a data-repeater-delete
                                                                class="action-btn btn-danger  btn btn-sm d-inline-flex align-items-center"
                                                                data-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"><i
                                                                    class="ti ti-trash text-white"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-end pt-2">
                                                <button class="btn-submit btn btn-primary"
                                                    type="submit"><?php echo e(__('Save Changes')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tax-settings" class="">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-11">
                                                <h5 class="">
                                                    <?php echo e(__('Tax Settings')); ?>

                                                </h5>
                                            </div>
                                            <div class="text-end  col-auto">
                                                <button class="btn-submit btn btn-sm btn-primary" type="button"
                                                    data-ajax-popup="true" data-title="<?php echo e(__('Add Tax')); ?>"
                                                    data-url="<?php echo e(route('tax.create', $currentWorkspace->slug)); ?>"
                                                    data-toggle="tooltip" title="<?php echo e(__('Add Tax')); ?>">
                                                    <i class="ti ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <table id="" class="table table-bordered px-2">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('Name')); ?></th>
                                                        <th><?php echo e(__('Rate')); ?></th>
                                                        <th width="200px" class="text-right"><?php echo e(__('Action')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($tax->name); ?></td>
                                                            <td><?php echo e($tax->rate); ?>%</td>
                                                            <td class="text-right">
                                                                <a href="#"
                                                                    class="action-btn btn-info  btn btn-sm d-inline-flex align-items-center"
                                                                    data-ajax-popup="true"
                                                                    data-title="<?php echo e(__('Edit Tax')); ?>"
                                                                    data-url="<?php echo e(route('tax.edit', [$currentWorkspace->slug, $tax->id])); ?>"
                                                                    data-toggle="tooltip" title="<?php echo e(__('Edit Tax')); ?>">
                                                                    <i class="ti ti-pencil text-white"></i>
                                                                </a>
                                                                <a href="#"
                                                                    class="action-btn btn-danger  btn btn-sm d-inline-flex align-items-center bs-pass-para"
                                                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                    data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                                    data-confirm-yes="delete-form-<?php echo e($tax->id); ?>"data-toggle="tooltip"
                                                                    title="<?php echo e(__('Delete')); ?>">
                                                                    <i class="ti ti-trash text-white"></i>
                                                                </a>
                                                                <form id="delete-form-<?php echo e($tax->id); ?>"
                                                                    action="<?php echo e(route('tax.destroy', [$currentWorkspace->slug, $tax->id])); ?>"
                                                                    method="POST" style="display: none;">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="company-settings" class="tab-pane">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="">
                                            <?php echo e(__('Company Settings')); ?>

                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <form method="post"
                                            action="<?php echo e(route('workspace.settings.store', $currentWorkspace->slug)); ?>"
                                            class="payment-form">
                                            <?php echo csrf_field(); ?>
                                            <div class="row mt-3">
                                                <div class="form-group col-md-6">
                                                    <label for="company" class="form-label"><?php echo e(__('Name')); ?></label>
                                                    <input type="text" name="company" id="company"
                                                        class="form-control" value="<?php echo e($currentWorkspace->company); ?>"
                                                        required="required" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="address" class="form-label"><?php echo e(__('Address')); ?></label>
                                                    <input type="text" name="address" id="address"
                                                        class="form-control" value="<?php echo e($currentWorkspace->address); ?>"
                                                        required="required" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="city" class="form-label"><?php echo e(__('City')); ?></label>
                                                    <input class="form-control" name="city" type="text"
                                                        value="<?php echo e($currentWorkspace->city); ?>" id="city">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="state" class="form-label"><?php echo e(__('State')); ?></label>
                                                    <input class="form-control" name="state" type="text"
                                                        value="<?php echo e($currentWorkspace->state); ?>" id="state">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="zipcode"
                                                        class="form-label"><?php echo e(__('Zip/Post Code')); ?></label>
                                                    <input class="form-control" name="zipcode" type="text"
                                                        value="<?php echo e($currentWorkspace->zipcode); ?>" id="zipcode">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="country" class="form-label"><?php echo e(__('Country')); ?></label>
                                                    <input class="form-control" name="country" type="text"
                                                        value="<?php echo e($currentWorkspace->country); ?>" id="country">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="telephone"
                                                        class="form-label"><?php echo e(__('Telephone')); ?></label>
                                                    <input class="form-control" name="telephone" type="text"
                                                        value="<?php echo e($currentWorkspace->telephone); ?>" id="telephone">
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn-submit btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                            </div>
                                        </form>
                                    </div>
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
                                            class="d-block mt-2"><?php echo e(__('These details will be used to collect invoice payments. Each invoice will have a payment button based on the below configuration.')); ?></small>
                                    </div>
                                    <div class="card-body p-4">
                                        <form method="post"
                                            action="<?php echo e(route('workspace.settings.store', $currentWorkspace->slug)); ?>"
                                            class="payment-form">
                                            <?php echo csrf_field(); ?>
                                            <div class="row mt-3">
                                                <div class="form-group col-md-6">
                                                    <label for="currency_code"
                                                        class="form-label"><?php echo e(__('Currency Code')); ?></label>
                                                    <input type="text" name="currency_code" id="currency_code"
                                                        class="form-control"
                                                        value="<?php echo e($currentWorkspace->currency_code); ?>"
                                                        required="required" />
                                                    <small>
                                                        <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?>

                                                        <a href="https://stripe.com/docs/currencies"
                                                            target="_new"><?php echo e(__('You can find out how to do that here.')); ?></a>.</small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="currency"
                                                        class="form-label"><?php echo e(__('Currency')); ?></label>
                                                    <input type="text" name="currency" id="currency"
                                                        class="form-control" value="<?php echo e($currentWorkspace->currency); ?>"
                                                        required="required" />
                                                </div>

                                            </div>
                                           

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="accordion accordion-flush setting-accordion" id="payment-gateways">
                                                        
                                                        <!-- Bank Transfer -->
                                                        

                                                        <!-- Bank Transfer -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button collapsed" type="button" >
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse"
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

                                                        <!-- Stripe -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="stripe">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseone" aria-expanded="false"
                                                                    aria-controls="collapseone">
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
                                                                            <?php echo e(isset($currentWorkspace->is_stripe_enabled) && $currentWorkspace->is_stripe_enabled == '1' ? 'checked' : ''); ?>>
                                                                            <label
                                                                                class="custom-control-label form-control-label"
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

                                                                                <?php echo e(Form::text('stripe_key', isset($currentWorkspace->stripe_key) && !empty($currentWorkspace->stripe_key) ? $currentWorkspace->stripe_key : '', ['class' => 'form-control', 'placeholder' => __('Stripe Key')])); ?>


                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('stripe_secret', isset($currentWorkspace->stripe_secret) && !empty($currentWorkspace->stripe_secret) ? $currentWorkspace->stripe_secret : '', ['class' => 'form-control', 'placeholder' => __('Stripe Secret')])); ?>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- paypal -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="paypal">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsetwo" aria-expanded="false"
                                                                    aria-controls="collapsetwo">
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
                                                                            <?php echo e(isset($currentWorkspace->is_paypal_enabled) && $currentWorkspace->is_paypal_enabled == '1' ? 'checked' : ''); ?>><label
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
                                                                        <div class="row pt-2">
                                                                            <label class="pb-2"
                                                                                for="paypal_mode"><?php echo e(__('Paypal Mode')); ?></label>
                                                                            <div class="col-lg-3">
                                                                                <div class="border accordion-header p-3">
                                                                                    <div class="form-check">
                                                                                        <input type="radio"
                                                                                            name="paypal_mode"
                                                                                            class="form-check-input input-primary "
                                                                                            value="sandbox"
                                                                                            <?php echo e(!isset($currentWorkspace->paypal_mode) || empty($currentWorkspace->paypal_mode) || $currentWorkspace->paypal_mode == 'sandbox' ? 'checked' : ''); ?>

                                                                                            id="">
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
                                                                                <div class="border accordion-header p-3">
                                                                                    <div class="form-check">
                                                                                        <input type="radio"
                                                                                            name="paypal_mode"
                                                                                            class="form-check-input input-primary "
                                                                                            value="live"
                                                                                            <?php echo e(isset($currentWorkspace->paypal_mode) && $currentWorkspace->paypal_mode == 'live' ? 'checked' : ''); ?>>
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

                                                                                <?php echo e(Form::text('paypal_client_id', isset($currentWorkspace->paypal_client_id) ? $currentWorkspace->paypal_client_id : '', ['class' => 'form-control', 'placeholder' => __('Client ID')])); ?>


                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('paypal_secret_key', __('Secret Key'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('paypal_secret_key', isset($currentWorkspace->paypal_secret_key) ? $currentWorkspace->paypal_secret_key : '', ['class' => 'form-control', 'placeholder' => __('Secret Key')])); ?>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- paystack -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="paystack">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsethree" aria-expanded="false"
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
                                                            <div id="collapsethree" class="accordion-collapse collapse"
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
                                                                                    for="paystack_public_key"><?php echo e(__('Public Key')); ?></label>
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

                                                        <!-- Flutterwave -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="Flutterwave">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsefor" aria-expanded="false"
                                                                    aria-controls="collapsefor">
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
                                                                                    for="flutterwave_public_key"><?php echo e(__('Public Key')); ?></label>
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

                                                        <!-- Razorpay -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="Razorpay">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsefive" aria-expanded="false"
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

                                                        <!-- Mercado Pago -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="mercado">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsetsix" aria-expanded="false"
                                                                    aria-controls="collapsetsix">
                                                                        <?php echo e(__('Mercado Pago')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2">Enable:</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
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
                                                                                <div class="border accordion-header p-3">
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
                                                                                <div class="border accordion-header p-3">
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

                                                        <!-- Paytm -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="Paytm">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#collapset7"
                                                                    aria-expanded="false" aria-controls="collapset7">
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
                                                                                <div class="border accordion-header p-3">
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
                                                                                <div class="border accordion-header p-3">
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

                                                        <!-- Mollie -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="Mollie">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#collapset8"
                                                                    aria-expanded="false" aria-controls="collapset8">
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

                                                        <!-- Skrill -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="Skrill">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#collapset9"
                                                                    aria-expanded="false" aria-controls="collapset9">
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
                                                                                    for="mollie_api_key"><?php echo e(__('Skrill Email')); ?></label>
                                                                                <input type="email" name="skrill_email"
                                                                                    id="skrill_email" class="form-control"
                                                                                    value="<?php echo e(isset($payment_detail['skrill_email']) ? $payment_detail['skrill_email'] : ''); ?>"
                                                                                    placeholder="<?php echo e(__('Skrill Email')); ?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- paypal -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="CoinGate">
                                                                <button class="accordion-button collapsed" type="button">
                                                                    <span class="d-flex align-items-center" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapset10" aria-expanded="false"
                                                                    aria-controls="collapset10">
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
                                                                                <div class="border accordion-header p-3">
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
                                                                                <div class="border accordion-header p-3">
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

                                                        <!-- Paymentwall -->
                                                        <div id="" class="accordion-item">

                                                            <h2 class="accordion-header" id="Paymentwall">
                                                                <button class="accordion-button collapsed" type="button" >
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

                                                        <!-- toyyibpay -->
                                                        <div id="" class="accordion-item ">

                                                            <h2 class="accordion-header" id="toyyibpay">
                                                                <button class="accordion-button collapsed" type="button" >
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

                                                        <!-- payfast -->
                                                        <div id="" class="accordion-item ">

                                                            <h2 class="accordion-header" id="toyyibpay">
                                                                <button class="accordion-button collapsed" type="button" >
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
                                                                                <div class="border p-3 accordion-header">
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
                                                                                <div class="border p-3 accordion-header">
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

                                                        <!-- IyziPay -->
                                                        <div id="" class="accordion-item ">

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

                                                        <!-- sspay -->
                                                        <div id="" class="accordion-item ">

                                                            <h2 class="accordion-header" id="sspay">
                                                                <button class="accordion-button collapsed" type="button" >
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

                                                        <!-- paytab -->
                                                        <div id="" class="accordion-item ">
                                                            <h2 class="accordion-header" id="paytab">
                                                                <button class="accordion-button collapsed" type="button" >
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
                                                                                    class="form-label"><?php echo e(__('Paytab Profile Id')); ?></label>
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

                                                        <!-- benefit -->
                                                        <div id="" class="accordion-item ">
                                                            <h2 class="accordion-header" id="benefit">
                                                                <button class="accordion-button collapsed" type="button" >
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

                                                        <!-- cashfree -->
                                                        <div id="" class="accordion-item ">
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

                    <div id="invoice-settings" class="tab-pane">
                        <div class="">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="text-start col-6">
                                                    <h5 class=""><?php echo e(__('Invoice Footer Settings')); ?></h5>
                                                    <small class="d-block mt-2"><?php echo e(__('The following will be displayed in the invoice footer.')); ?></small>
                                                </div>
                                                <?php if($currentWorkspace->is_chagpt_enable()): ?>
                                                
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="card-body p-4">
                                            <form method="post"
                                                action="<?php echo e(route('workspace.settings.store', $currentWorkspace->slug)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="invoice_footer_title"
                                                            class="form-label"><?php echo e(__('Invoice Footer Title')); ?></label>
                                                        <input class="form-control" name="invoice_footer_title"
                                                            type="text"
                                                            value="<?php echo e($currentWorkspace->invoice_footer_title); ?>"
                                                            id="invoice_footer_title">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="invoice_footer_notes"
                                                            class="form-label"><?php echo e(__('Invoice Footer Notes')); ?></label>
                                                        <textarea rows="3" class="form-control" name="invoice_footer_notes"><?php echo e($currentWorkspace->invoice_footer_notes); ?></textarea>
                                                    </div>
                                                    <div class=" text-end">
                                                        <button type="submit" class="btn-submit btn btn-primary">
                                                            <?php echo e(__('Save Changes')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="">
                                                <?php echo e(__('Invoice Settings')); ?>

                                            </h5>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="">
                                                        <form
                                                            action="<?php echo e(route('workspace.settings.store', $currentWorkspace->slug)); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="form-group">
                                                                <label for="address"
                                                                    class="form-label"><?php echo e(__('Invoice Template')); ?></label>
                                                                <select class="form-control select2"
                                                                    name="invoice_template">
                                                                    <option value="template1"
                                                                        <?php if($currentWorkspace->invoice_template == 'template1'): ?> selected <?php endif; ?>>
                                                                        New York</option>
                                                                    <option value="template2"
                                                                        <?php if($currentWorkspace->invoice_template == 'template2'): ?> selected <?php endif; ?>>
                                                                        Toronto</option>
                                                                    <option value="template3"
                                                                        <?php if($currentWorkspace->invoice_template == 'template3'): ?> selected <?php endif; ?>>
                                                                        Rio</option>
                                                                    <option value="template4"
                                                                        <?php if($currentWorkspace->invoice_template == 'template4'): ?> selected <?php endif; ?>>
                                                                        London</option>
                                                                    <option value="template5"
                                                                        <?php if($currentWorkspace->invoice_template == 'template5'): ?> selected <?php endif; ?>>
                                                                        Istanbul</option>
                                                                    <option value="template6"
                                                                        <?php if($currentWorkspace->invoice_template == 'template6'): ?> selected <?php endif; ?>>
                                                                        Mumbai</option>
                                                                    <option value="template7"
                                                                        <?php if($currentWorkspace->invoice_template == 'template7'): ?> selected <?php endif; ?>>
                                                                        Hong Kong</option>
                                                                    <option value="template8"
                                                                        <?php if($currentWorkspace->invoice_template == 'template8'): ?> selected <?php endif; ?>>
                                                                        Tokyo</option>
                                                                    <option value="template9"
                                                                        <?php if($currentWorkspace->invoice_template == 'template9'): ?> selected <?php endif; ?>>
                                                                        Sydney</option>
                                                                    <option value="template10"
                                                                        <?php if($currentWorkspace->invoice_template == 'template10'): ?> selected <?php endif; ?>>
                                                                        Paris</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="form-control-label"><?php echo e(__('Color')); ?></label>
                                                                <div class="row gutters-xs">
                                                                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="col-auto">
                                                                            <label class="colorinput">
                                                                                <input name="invoice_color"
                                                                                    type="radio"
                                                                                    value="<?php echo e($color); ?>"
                                                                                    class="colorinput-input"
                                                                                    <?php if($currentWorkspace->invoice_color == $color): ?> checked <?php endif; ?>>
                                                                                <span class="colorinput-color mb-1"
                                                                                    style="background: #<?php echo e($color); ?>"></span>
                                                                            </label>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                            <div class="text-end">
                                                                <button class="btn-submit btn btn-primary"
                                                                    type="submit">
                                                                    <?php echo e(__('Save Changes')); ?>

                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <iframe frameborder="0" width="100%" height="1080px"
                                                        src="<?php echo e(route('invoice.preview', [$currentWorkspace->slug, $currentWorkspace->invoice_template ? $currentWorkspace->invoice_template : 'template1', $currentWorkspace->invoice_color ? $currentWorkspace->invoice_color : 'fff'])); ?>"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="" id="email-notification-settings">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Email Notification Settings')); ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12">

                                                <form method="post"
                                                action="<?php echo e(route('status.email.language', $currentWorkspace->slug)); ?>"
                                                class="payment-form row m-1" >
                                                <?php echo csrf_field(); ?>
                                                <?php $__currentLoopData = $EmailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $EmailTemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div
                                                            class="col-md-6  d-flex align-items-center justify-content-between list_colume_notifi">
                                                            <div class="mb-3 mb-sm-0">
                                                                <h6><?php echo e($EmailTemplate->name); ?>

                                                                </h6>
                                                            </div>
                                                            <div class="text-end">
                                                                <div class="form-check form-switch d-inline-block">
                                                                    <input type="checkbox"
                                                                                class=" form-check-input"
                                                                                name="<?php echo e($EmailTemplate->name); ?>"
                                                                                id="email_tempalte_<?php echo e($EmailTemplate->template ? $EmailTemplate->template->id : ''); ?>"
                                                                                <?php if($EmailTemplate->template ? $EmailTemplate->template->is_active == 1 : ''): ?> checked="checked" <?php endif; ?>
                                                                                type="checkbox"
                                                                                value=<?php echo e(isset($EmailTemplate->template) ? $EmailTemplate->template->id : ''); ?>>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
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
                        </div>
                    </div>

                    <div id="time-tracker-settings" class="">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="">
                                            <?php echo e(__('Time Tracker Settings')); ?>

                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <form method="post"
                                            action="<?php echo e(route('workspace.settings.store', $currentWorkspace->slug)); ?>"
                                            class="payment-form">
                                            <?php echo csrf_field(); ?>
                                            <div class="row mt-3">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo e(__('Application URL')); ?></label><br>
                                                        <small><?php echo e(__('Application URL to log into the app.')); ?></small>
                                                        <?php echo e(Form::text('currency', URL::to('/'), ['class' => 'form-control mt-2', 'placeholder' => __('Enter Currency'), 'disabled' => 'true'])); ?>

                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('interval_time', __('Tracking Interval'), ['class' => 'form-label'])); ?><br>
                                                        <small><?php echo e(__('Image Screenshot Take Interval time ( 1 = 1 min)')); ?></small>
                                                        <?php echo e(Form::number('interval_time', $currentWorkspace->interval_time, ['class' => 'form-control mt-2', 'placeholder' => __('Enter Tracking Interval'), 'required' => 'required'])); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn-submit btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="zoom-meeting-settings" class="">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="">
                                            <?php echo e(__('Zoom Meeting Settings')); ?>

                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <form method="post"
                                            action="<?php echo e(route('zoom.mettings.settings.store', $currentWorkspace->slug)); ?>"
                                            class="payment-form">
                                            <?php echo csrf_field(); ?>
                                            <div class="row mt-3">
                                                <div class="form-group col-md-6">
                                                    <label for="company"
                                                        class="form-label"><?php echo e(__('Zoom Account Id')); ?></label>
                                                    <input type="text" name="zoom_account_id" id="zoom_account_id"
                                                        class="form-control" placeholder="Enter Zoom Account Id"
                                                        value="<?php echo e(isset($payment_detail['zoom_account_id']) ? $payment_detail['zoom_account_id'] : ''); ?>"
                                                        required="required" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="address"
                                                        class="form-label"><?php echo e(__('Zoom Client ID')); ?></label>
                                                    <input type="text" name="zoom_client_id" id="zoom_client_id"
                                                        class="form-control" placeholder="Enter Zoom Client ID"
                                                        value="<?php echo e(isset($payment_detail['zoom_client_id']) ? $payment_detail['zoom_client_id'] : ''); ?>"
                                                        required="required" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="address"
                                                        class="form-label"><?php echo e(__('Zoom Client Secret Key')); ?></label>
                                                    <input type="text" name="zoom_client_secret" id="zoom_client_secret"
                                                        class="form-control" placeholder="Zoom Client Secret Key"
                                                        value="<?php echo e(isset($payment_detail['zoom_client_secret']) ? $payment_detail['zoom_client_secret'] : ''); ?>"
                                                        required="required" />
                                                </div>

                                            </div>
                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn-submit btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(Auth::user()->type == 'user'): ?>
                        <div class="" id="slack-settings">
                            <?php echo e(Form::open(['route' => ['workspace.settings.Slack', $currentWorkspace->slug], 'method' => 'post', 'class' => 'd-contents'])); ?>

                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="">
                                                <?php echo e(__('Slack Settings')); ?>

                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row company-setting">
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <?php echo e(Form::label('Slack Webhook URL', __('Slack Webhook URL'), ['class' => 'form-label'])); ?>

                                                    <?php echo e(Form::text('slack_webhook', isset($payment_detail['slack_webhook']) ? $payment_detail['slack_webhook'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Slack Webhook URL'), 'required' => 'required'])); ?>


                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                                                    <?php echo e(Form::label('Module Settings', __('Module Settings'), ['class' => 'form-label'])); ?>

                                                </div>


                                                <div class="col-md-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('New Project', __('New Project'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('project_notificaation', '1', isset($payment_detail['project_notificaation']) && $payment_detail['project_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'project_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('New Task', __('New Task'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('task_notificaation', '1', isset($payment_detail['task_notificaation']) && $payment_detail['task_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'task_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6><?php echo e(Form::label('Task Stage Updated', __('Task Stage Updated'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('taskmove_notificaation', '1', isset($payment_detail['taskmove_notificaation']) && $payment_detail['taskmove_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'taskmove_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('New Milestone', __('New Milestone'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('milestone_notificaation', '1', isset($payment_detail['milestone_notificaation']) && $payment_detail['milestone_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'milestone_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('Milestone Status Updated', __('Milestone Status Updated'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('milestonest_notificaation', '1', isset($payment_detail['milestonest_notificaation']) && $payment_detail['milestonest_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'milestonest_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('New Task Comment', __('New Task Comment'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('taskcom_notificaation', '1', isset($payment_detail['taskcom_notificaation']) && $payment_detail['taskcom_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'taskcom_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6><?php echo e(Form::label('New Invoice', __('New Invoice'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('invoice_notificaation', '1', isset($payment_detail['invoice_notificaation']) && $payment_detail['invoice_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'invoice_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('Invoice Status Updated', __('Invoice Status Updated'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('invoicest_notificaation', '1', isset($payment_detail['invoicest_notificaation']) && $payment_detail['invoicest_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'invoicest_notificaation'])); ?>

                                                            </div>
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
                    <?php endif; ?>

                    <?php if(Auth::user()->type == 'user'): ?>
                        <div class="" id="telegram-settings">
                            <?php echo e(Form::open(['route' => ['workspace.settings.telegram', $currentWorkspace->slug], 'method' => 'post', 'class' => 'd-contents'])); ?>

                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="">
                                                <?php echo e(__('Telegram Settings')); ?>

                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row company-setting">
                                                <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                    <?php echo e(Form::label('Telegram Access Token', __('Telegram Access Token'), ['class' => 'form-label'])); ?>

                                                    <?php echo e(Form::text('telegram_token', isset($payment_detail['telegram_token']) ? $payment_detail['telegram_token'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Telegram Access Token'), 'required' => 'required'])); ?>


                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                    <?php echo e(Form::label('Telegram ChatID', __('Telegram ChatID'), ['class' => 'form-label'])); ?>

                                                    <?php echo e(Form::text('telegram_chatid', isset($payment_detail['telegram_chatid']) ? $payment_detail['telegram_chatid'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Telegram ChatID'), 'required' => 'required'])); ?>

                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3">
                                                    <?php echo e(Form::label('Module Settings', __('Module Settings'), ['class' => 'form-control-label'])); ?>

                                                </div>


                                                <div class="col-md-4 ">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('New Project', __('New Project'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('telegram_project_notificaation', '1', isset($payment_detail['telegram_project_notificaation']) && $payment_detail['telegram_project_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'telegram_project_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('New Task', __('New Task'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('telegram_task_notificaation', '1', isset($payment_detail['telegram_task_notificaation']) && $payment_detail['telegram_task_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'telegram_task_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('Task Stage Updated', __('Task Stage Updated'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('telegram_taskmove_notificaation', '1', isset($payment_detail['telegram_taskmove_notificaation']) && $payment_detail['telegram_taskmove_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'telegram_taskmove_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6><?php echo e(Form::label('New Milestone', __('New Milestone'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('telegram_milestone_notificaation', '1', isset($payment_detail['telegram_milestone_notificaation']) && $payment_detail['telegram_milestone_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'telegram_milestone_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6><?php echo e(Form::label('Milestone Status Updated', __('Milestone Status Updated'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('telegram_milestonest_notificaation', '1', isset($payment_detail['telegram_milestonest_notificaation']) && $payment_detail['telegram_milestonest_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'telegram_milestonest_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6><?php echo e(Form::label('New Task Comment', __('New Task Comment'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('telegram_taskcom_notificaation', '1', isset($payment_detail['telegram_taskcom_notificaation']) && $payment_detail['telegram_taskcom_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'telegram_taskcom_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('New Invoice', __('New Invoice'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('telegram_invoice_notificaation', '1', isset($payment_detail['telegram_invoice_notificaation']) && $payment_detail['telegram_invoice_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'telegram_invoice_notificaation'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between list_colume_notifi">
                                                        <div class="mb-3 mb-sm-0">
                                                            <h6> <?php echo e(Form::label('Invoice Status Updated', __('Invoice Status Updated'), ['class' => 'form-label'])); ?>

                                                            </h6>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="form-check form-switch d-inline-block">
                                                                <?php echo e(Form::checkbox('telegram_invoicest_notificaation', '1', isset($payment_detail['telegram_invoicest_notificaation']) && $payment_detail['telegram_invoicest_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'telegram_invoicest_notificaation'])); ?>

                                                            </div>
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
                    <?php endif; ?>

                    <?php if(Auth::user()->type == 'user'): ?>
                    <div class="" id="google-calender">
                        <?php echo e(Form::open(['route' => ['google.calender.settings', $currentWorkspace->slug], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row justify-content-between">
                                            <div class="col-10 ">
                                                <h5 class=""><?php echo e(__('Google Calendar')); ?></h5>
                                            </div>
                                            <div class="text-end  col-auto">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3 ">
                                                        <div class="custom-control custom-switch">
                                                            
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class="" name="is_googlecalendar_enabled"
                                                                id="is_googlecalendar_enabled"
                                                                <?php echo e(isset($currentWorkspace->is_googlecalendar_enabled) && $currentWorkspace->is_googlecalendar_enabled == 'on' ? 'checked' : ''); ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <?php echo e(Form::label('Google calendar id',__('Google Calendar Id'),['class'=>'col-form-label'])); ?>

                                                <?php echo e(Form::text('google_calender_id',!empty($currentWorkspace['google_calender_id']) ? $currentWorkspace['google_calender_id'] : '' ,array('class'=>'form-control ' ,'placeholder'=>"Google Calendar Id"))); ?>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <?php echo e(Form::label('Google calendar json file',__('Google Calendar json File'),['class'=>'col-form-label'])); ?>

                                                <input type="file" class="form-control" name="google_calender_json_file" id="google_calender_json_file" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn-submit btn btn-primary" type="submit">
                                            <?php echo e(__('Save Changes')); ?>

                                        </button>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!--Webhook_Setting-->
                    <div id="webhook-settings" class="card">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="row justify-content-between">
                                        <div class="col-10">
                                            <h5 class=""><?php echo e(__('Webhook Settings')); ?></h5>
                                            <small class="text-secondary font-weight-bold">
                                                <?php echo e(__('Edit your Webhook Settings')); ?>

                                            </small>
                                        </div>
                                        <div class="text-end  col-auto">
                                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="<?php echo e(__('Create Webhook')); ?>" data-url="<?php echo e(route('webhook.create' , $currentWorkspace->slug)); ?>" data-size="md"
                                                    data-ajax-popup="true" data-title="<?php echo e(__('Create New Webhook')); ?>">
                                                    <i class="ti ti-plus text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    
                                                    <th scope="sort"><?php echo e(__('Module')); ?></th>
                                                    <th scope="sort"><?php echo e(__('Url')); ?></th>
                                                    <th scope="sort"><?php echo e(__('Method')); ?></th>
                                                    <th scope="sort" class="text-end"><?php echo e(__('Action')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $webhook = App\Models\Webhook::where('created_by','=', $currentWorkspace->id)->get();
                                                ?>
                                                    
                                                    <?php $__currentLoopData = $webhook; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($data->module); ?></td>
                                                            <td><?php echo e($data->url); ?></td>
                                                            <td><?php echo e($data->method); ?></td>
                                                            <td class="text-end">
                                                                <a href="#"
                                                                    class="action-btn btn-info  btn btn-sm d-inline-flex align-items-center"
                                                                    data-size="lg"
                                                                    data-ajax-popup="true"
                                                                    data-title="<?php echo e(__('Edit Webhook')); ?>"
                                                                    data-url="<?php echo e(route('webhook.edit', [$currentWorkspace->slug, $data->id])); ?>"
                                                                    data-toggle="tooltip" title="<?php echo e(__('Edit Webhook')); ?>">
                                                                    <i class="ti ti-pencil text-white"></i>
                                                                </a>
                                                                <a href="#"
                                                                    class="action-btn btn-danger  btn btn-sm d-inline-flex align-items-center bs-pass-para"
                                                                    data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                    data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                                    data-confirm-yes="delete-form-<?php echo e($data->id); ?>" data-toggle="tooltip"
                                                                    title="<?php echo e(__('Delete')); ?>">
                                                                    <i class="ti ti-trash text-white"></i>
                                                                </a>
                                                                <form id="delete-form-<?php echo e($data->id); ?>"
                                                                    action="<?php echo e(route('webhook.destroy', [$currentWorkspace->slug, $data->id])); ?>"
                                                                    method="POST" style="display: none;">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="email-settings" class="tab-pane">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="">
                                        <?php echo e(__('Email Settings')); ?>

                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <?php echo e(Form::open(['route' => ['company.email.settings.store',$currentWorkspace->slug], 'method' => 'post'])); ?>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mail_driver', $payment_detail['mail_driver'], ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver'), 'id' => 'mail_driver'])); ?>

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

                                            <?php echo e(Form::text('mail_host', $payment_detail['mail_host'], ['class' => 'form-control ', 'placeholder' => __('Enter Mail Host')])); ?>

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

                                            <?php echo e(Form::text('mail_port', $payment_detail['mail_port'], ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

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

                                            <?php echo e(Form::text('mail_username', $payment_detail['mail_username'], ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

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

                                            <?php echo e(Form::text('mail_password', $payment_detail['mail_password'], ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')])); ?>

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

                                            <?php echo e(Form::text('mail_encryption', $payment_detail['mail_encryption'], ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

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

                                            <?php echo e(Form::text('mail_from_address', $payment_detail['mail_from_address'], ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

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

                                            <?php echo e(Form::text('mail_from_name', $payment_detail['mail_from_name'], ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')])); ?>

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

                                            <div class="text-start text-light col-6">
                                                <a  data-size="md"
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

                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/custom/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/custom/js/repeater.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/custom/js/colorPick.js')); ?>"></script>
    <script>
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

    <script src="<?php echo e(asset('assets/js/pages/wow.min.js')); ?>"></script>
    <script>
        // Start [ Menu hide/show on scroll ]
        let ost = 0;
        document.addEventListener("scroll", function() {
            let cOst = document.documentElement.scrollTop;
            if (cOst == 0) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
            } else if (cOst > ost) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
                document.querySelector(".navbar").classList.remove("default");
            } else {
                document.querySelector(".navbar").classList.add("default");
                document
                    .querySelector(".navbar")
                    .classList.remove("top-nav-collapse");
            }
            ost = cOst;
        });
        // End [ Menu hide/show on scroll ]
        var wow = new WOW({
            animateClass: "animate__animated", // animation css class (default is animated)
        });
        wow.init();
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: "#navbar-example",
        });
    </script>

    <script>
        $(document).on("change", "select[name='invoice_template'], input[name='invoice_color']", function() {
            var template = $("select[name='invoice_template']").val();
            var color = $("input[name='invoice_color']:checked").val();
            $('iframe').attr('src', '<?php echo e(url($currentWorkspace->slug . '/invoices/preview')); ?>/' + template + '/' +
                color);
        });

        $(document).ready(function() {

            var $dragAndDrop = $("body .task-stages tbody").sortable({
                handle: '.sort-handler'
            });

            var $repeater = $('.task-stages').repeater({
                initEmpty: true,
                defaultValues: {},
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('<?php echo e(__('Are you sure ?')); ?>')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function(setIndexes) {
                    $dragAndDrop.on('drop', setIndexes);
                },
                isFirstItemUndeletable: true
            });


            var value = $(".task-stages").attr('data-value');
            if (typeof value != 'undefined' && value.length != 0) {
                value = JSON.parse(value);
                $repeater.setList(value);
            }

            var $dragAndDropBug = $("body .bug-stages tbody").sortable({
                handle: '.sort-handler'
            });

            var $repeaterBug = $('.bug-stages').repeater({
                initEmpty: true,
                defaultValues: {},
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('<?php echo e(__('Are you sure ?')); ?>')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function(setIndexes) {
                    $dragAndDropBug.on('drop', setIndexes);
                },
                isFirstItemUndeletable: true
            });


            var valuebug = $(".bug-stages").attr('data-value');
            if (typeof valuebug != 'undefined' && valuebug.length != 0) {
                valuebug = JSON.parse(valuebug);
                $repeaterBug.setList(valuebug);
            }
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
        $('#logo').change(function() {

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



        $('#small-favicon').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#favicon').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>


    <script>
        $(document).on('click', 'input[name="theme_color"]', function() {
            var eleParent = $(this).attr('data-theme');
            $('#themefile').val(eleParent);
            var imgpath = $(this).attr('data-imgpath');
            $('.' + eleParent + '_img').attr('src', imgpath);
        });

        $(document).ready(function() {
            setTimeout(function(e) {
                var checked = $("input[type=radio][name='theme_color']:checked");
                $('#themefile').val(checked.attr('data-theme'));
                $('.' + checked.attr('data-theme') + '_img').attr('src', checked.attr('data-imgpath'));
            }, 300);
        });

        function check_theme(color_val) {
            $('#theme-color').removeClass().addClass(color_val);
            $('input[value="' + color_val + '"]').prop('checked', true);
            $('input[value="' + color_val + '"]').attr('checked', true);
            $('a[data-value]').removeClass('active_color');
            $('a[data-value="' + color_val + '"]').addClass('active_color');

            // $('.theme-color').prop('checked', false);
            // $('.theme_color').classList.add('active_color');
            // $('input[value="' + color_val + '"]').prop('checked', true);
            // $('#color_value').val(color_val);
        }
    </script>

    <script>
        $(document).ready(function() {
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
    <style>
            .active_color {
                /* background-color: #ffffff !important; */
                border: 2px solid #000 !important;
            }
        </style>


    <script>
        $(document).on("click", ".email-template-checkbox", function() {
            var chbox = $(this);
            $.ajax({
                url: chbox.attr('data-url'),
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    status: chbox.val()
                },
                type: 'POST',
                success: function(response) {
                    if (response.is_success) {
                        show_toastr('<?php echo e(__('Success')); ?>', response.success, 'success');
                        if (chbox.val() == 1) {
                            $('#' + chbox.attr('id')).val(0);
                        } else {
                            $('#' + chbox.attr('id')).val(1);
                        }
                    } else {
                        show_toastr('<?php echo e(__('Error')); ?>', response.error, 'error');
                    }
                },
                error: function(response) {
                    response = response.responseJSON;
                    if (response.is_success) {
                        show_toastr('<?php echo e(__('Error')); ?>', response.error, 'error');
                    } else {
                        show_toastr('<?php echo e(__('Error')); ?>', response, 'error');
                    }
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/users/setting.blade.php ENDPATH**/ ?>