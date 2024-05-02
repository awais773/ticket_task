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

                            

                            <a href="#invoice-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Invoice Settings')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            <a href="#email-notification-settings"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Email Notification Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                            

                            <?php if(Auth::user()->type == 'user'): ?>
                                
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
                                            
                                            <h4 class="small-title mb-4"> <?php echo e(__('Theme Customizer')); ?> </h4>
                                            <div class="col-12">
                                                <div class="pct-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h6 class="">
                                                                <i data-feather="credit-card" class="me-2"></i><?php echo e(__('Primary color settings')); ?>

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
                                                                <i data-feather="layout" class="me-2"></i><?php echo e(__('Sidebar settings')); ?>

                                                            </h6>
                                                            <hr class="my-2" />
                                                            <div class="form-check form-switch">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="cust-theme-bg" name="cust_theme_bg"
                                                                    <?php if($cust_theme_bg == 'on'): ?> checked <?php endif; ?> />
                                                                <label class="form-check-label f-w-600 pl-1"
                                                                    for="cust-theme-bg"> <?php echo e(__('Transparent Layout')); ?> </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <h6 class="">
                                                                <i data-feather="sun" class=""></i><?php echo e(__('Layout settings')); ?>

                                                            </h6>
                                                            <hr class="my-2" />
                                                            <div class="form-check form-switch mt-2">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="cust-darklayout" name="cust_darklayout"
                                                                    <?php if($dark_mode == 'on'): ?> checked <?php endif; ?> />

                                                                <label class="form-check-label f-w-600 pl-1"
                                                                        for="cust-darklayout"> <?php echo e(__('Dark Layout')); ?> </label>
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

                    


                    

                    

                    

                    <!--Webhook_Setting-->
                    


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