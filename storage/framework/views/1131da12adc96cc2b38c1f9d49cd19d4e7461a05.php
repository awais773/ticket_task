<?php
    $permissions = Auth::user()->getPermission($project->id);
    $client_keyword = Auth::user()->getGuard() == 'client' ? 'client.' : '';
?>

<?php
    $logo = \App\Models\Utility::get_file('users-avatar/');
    $logo_tasks = \App\Models\Utility::get_file('tasks/');
?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Bug Report')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('links'); ?>
    <?php if(\Auth::guard('client')->check()): ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php endif; ?>
    <?php if(\Auth::guard('client')->check()): ?>
        <li class="breadcrumb-item"><a
                href="<?php echo e(route('client.projects.index', $currentWorkspace->slug)); ?>"><?php echo e(__('Project')); ?></a></li>
    <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('projects.index', $currentWorkspace->slug)); ?>"><?php echo e(__('Project')); ?></a>
        </li>
    <?php endif; ?>
    <li class="breadcrumb-item"><a
            href="<?php echo e(route($client_keyword . 'projects.show', [$currentWorkspace->slug, $project->id])); ?>"><?php echo e(__('Project Details')); ?></a>
    </li>
    <li class="breadcrumb-item"><?php echo e(__('Bug Report')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <?php if((isset($permissions) && in_array('create bug report', $permissions)) ||
        ($currentWorkspace && $currentWorkspace->permission == 'Owner')): ?>
        <a href="#" class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="lg"
            data-title="<?php echo e(__('Create New Bug')); ?>"
            data-url="<?php echo e(route($client_keyword . 'projects.bug.report.create', [$currentWorkspace->slug, $project->id])); ?>"
            data-toggle="tooltip" title="<?php echo e(__('Add Bug')); ?>"><i class="ti ti-plus"></i></a>
    <?php endif; ?>

    <a href="<?php echo e(route($client_keyword . 'projects.show', [$currentWorkspace->slug, $project->id])); ?>"
        class="btn-submit btn btn-sm btn-primary mx-1" data-toggle="tooltip" title="<?php echo e(__('Back')); ?>">
        <i class="ti ti-arrow-back-up"></i>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <?php if($project && $currentWorkspace): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row kanban-wrapper horizontal-scroll-cards" data-toggle="dragula"
                        data-containers='<?php echo e(json_encode($statusClass)); ?>'>
                        <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col" id="backlog">
                                <div class="card card-list">
                                    <div class="card-header">
                                        <div class="float-end">
                                            <button class="btn-submit btn btn-md btn-primary btn-icon px-1  py-0">
                                                <span
                                                    class="badge badge-secondary rounded-pill count"><?php echo e($stage->bugs->count()); ?></span>
                                            </button>
                                        </div>
                                        <h4 class="mb-0">  <?php echo e($stage->name); ?></h4>

                                    </div>
                                    <div id="<?php echo e('task-list-' . str_replace(' ', '_', $stage->id)); ?>"
                                        data-status="<?php echo e($stage->id); ?>" class="card-body kanban-box">

                                        <?php $__currentLoopData = $stage->bugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card" id="<?php echo e($bug->id); ?>">
                                                <!--  <img class="img-fluid card-img-top" src=""
                                            alt=""> -->
                                                <div class="position-absolute top-0 start-0 pt-3 ps-3">
                                                    <?php if($bug->priority == 'Low'): ?>
                                                        <div class="badge bg-success p-2 px-3 rounded">
                                                            <?php echo e($bug->priority); ?></div>
                                                    <?php elseif($bug->priority == 'Medium'): ?>
                                                        <div class="badge bg-warning p-2 px-3 rounded">
                                                            <?php echo e($bug->priority); ?></div>
                                                    <?php elseif($bug->priority == 'High'): ?>
                                                        <div class="badge bg-danger p-2 px-3 rounded"> <?php echo e($bug->priority); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="card-header border-0 pb-0 position-relative">

                                                    <div style="padding: 30px 2px;"> <a href="#" data-size="lg"
                                                            data-url="<?php echo e(route($client_keyword . 'projects.bug.report.show', [$currentWorkspace->slug, $bug->project_id, $bug->id])); ?>"
                                                            data-ajax-popup="true" data-title="<?php echo e(__('Bug Detail')); ?>"
                                                            class="h6 task-title">
                                                            <h5><?php echo e($bug->title); ?></h5>
                                                        </a></div>

                                                    <div class="card-header-right">
                                                        <div class="btn-group card-option">
                                                            <?php if($currentWorkspace->permission == 'Owner' || isset($permissions)): ?>
                                                                <button type="button" class="btn dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="feather icon-more-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a href="#" class="dropdown-item"
                                                                        data-ajax-popup="true" data-size="lg"
                                                                        data-title="<?php echo e(__('View Bug')); ?>"
                                                                        data-url="<?php echo e(route($client_keyword . 'projects.bug.report.show', [$currentWorkspace->slug, $bug->project_id, $bug->id])); ?>"><i
                                                                            class="ti ti-eye"></i>
                                                                        <?php echo e(__('View')); ?></a>
                                                                    <?php if($currentWorkspace->permission == 'Owner'): ?>
                                                                        <a href="#" class="dropdown-item"
                                                                            data-ajax-popup="true" data-size="lg"
                                                                            data-title="<?php echo e(__('Edit Bug')); ?>"
                                                                            data-url="<?php echo e(route('projects.bug.report.edit', [$currentWorkspace->slug, $bug->project_id, $bug->id])); ?>"><i
                                                                                class="ti ti-edit"></i>
                                                                            <?php echo e(__('Edit')); ?></a>
                                                                        <a href="#" class="dropdown-item bs-pass-para"
                                                                            data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                            data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                                            data-confirm-yes="delete-form-<?php echo e($bug->id); ?>"><i
                                                                                class="ti ti-trash"></i>
                                                                            <?php echo e(__('Delete')); ?>

                                                                        </a>
                                                                        <form id="delete-form-<?php echo e($bug->id); ?>"
                                                                            action="<?php echo e(route('projects.bug.report.destroy', [$currentWorkspace->slug, $bug->project_id, $bug->id])); ?>"
                                                                            method="POST" style="display: none;">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('DELETE'); ?>
                                                                        </form>
                                                                    <?php elseif(isset($permissions)): ?>
                                                                        <?php if(in_array('edit bug report', $permissions)): ?>
                                                                            <a href="#" class="dropdown-item"
                                                                                data-ajax-popup="true" data-size="lg"
                                                                                data-title="<?php echo e(__('Edit Bug')); ?>"
                                                                                data-url="<?php echo e(route($client_keyword . 'projects.bug.report.edit', [$currentWorkspace->slug, $bug->project_id, $bug->id])); ?>"><i
                                                                                    class="ti ti-edit"></i>
                                                                                <?php echo e(__('Edit')); ?>

                                                                            </a>
                                                                        <?php endif; ?>
                                                                        <?php if(in_array('delete bug report', $permissions)): ?>
                                                                            <a href="#"
                                                                                class="dropdown-item bs-pass-para"
                                                                                data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                                                data-confirm-yes="delete-form-<?php echo e($bug->id); ?>"><i
                                                                                    class="ti ti-trash"></i>
                                                                                <?php echo e(__('Delete')); ?>

                                                                            </a>
                                                                            <form id="delete-form-<?php echo e($bug->id); ?>"
                                                                                action="<?php echo e(route($client_keyword . 'projects.bug.report.destroy', [$currentWorkspace->slug, $bug->project_id, $bug->id])); ?>"
                                                                                method="POST" style="display: none;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('DELETE'); ?>
                                                                            </form>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>

                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0">

                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <ul class="list-inline mb-0">

                                                            <li class="list-inline-item d-inline-flex align-items-center">
                                                                <i class="f-16 text-primary ti ti-message-2"></i>
                                                                <?php echo e($bug->comments->count()); ?> <?php echo e(__('Comments')); ?></li>

                                                        </ul>

                                                        <div class="user-group">

                                                            <?php if($currentWorkspace->permission == 'Owner' || isset($permissions)): ?>
                                                                <a href="#" class="img_group">
                                                                    <img alt="image" data-toggle="tooltip"
                                                                        data-original-title="<?php echo e($bug->user ? $bug->user->name : ''); ?>"
                                                                        <?php if($bug->user ? $bug->user->avatar : ''): ?> src="<?php echo e($logo . $bug->user->avatar); ?>" <?php else: ?> avatar="<?php echo e($bug->user ? $bug->user->name : ''); ?>" <?php endif; ?>>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <span class="empty-container" data-placeholder="Empty"></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>
                    <!-- [ sample-page ] end -->
                </div>
            </div>
        <?php else: ?>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="page-error">
                            <div class="page-inner">
                                <h1>404</h1>
                                <div class="page-description">
                                    <?php echo e(__('Page Not Found')); ?>

                                </div>
                                <div class="page-search">
                                    <p class="text-muted mt-3">
                                        <?php echo e(__("It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us. Here's a little tip that might help you get back on track.")); ?>

                                    </p>
                                    <div class="mt-3">
                                        <a class="btn-return-home badge-blue" href="<?php echo e(route('home')); ?>"><i
                                                class="fas fa-reply"></i> <?php echo e(__('Return Home')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php if($project && $currentWorkspace): ?>
    <?php $__env->startPush('scripts'); ?>
        <!-- third party js -->
        <script src="<?php echo e(asset('assets/custom/js/dragula.min.js')); ?>"></script>
        <script>
            ! function(a) {
                "use strict";
                var t = function() {
                    this.$body = a("body")
                };
                t.prototype.init = function() {
                    a('[data-toggle="dragula"]').each(function() {
                        var t = a(this).data("containers"),
                            n = [];
                        if (t)
                            for (var i = 0; i < t.length; i++) n.push(a("#" + t[i])[0]);
                        else n = [a(this)[0]];
                        var r = a(this).data("handleclass");
                        r ? dragula(n, {
                            moves: function(a, t, n) {
                                return n.classList.contains(r)
                            }
                        }) : dragula(n).on('drop', function(el, target, source, sibling) {
                            var sort = [];
                            $("#" + target.id + " > div").each(function(key) {
                                sort[key] = $(this).attr('id');
                            });
                            var id = el.id;
                            var old_status = $("#" + source.id).data('status');
                            var new_status = $("#" + target.id).data('status');
                            var project_id = '<?php echo e($project->id); ?>';

                            $("#" + source.id).parents('.card-list').find('.count').text($("#" + source.id +
                                " > div").length);
                            $("#" + target.id).parents('.card-list').find('.count').text($("#" + target.id +
                                " > div").length);
                            $.ajax({
                                url: '<?php echo e(route($client_keyword . 'projects.bug.report.update.order', [$currentWorkspace->slug, $project->id])); ?>',
                                type: 'POST',
                                data: {
                                    id: id,
                                    sort: sort,
                                    new_status: new_status,
                                    old_status: old_status,
                                    project_id: project_id,
                                },
                                success: function(data) {
                                    // console.log(data);
                                }
                            });
                        });
                    })
                }, a.Dragula = new t, a.Dragula.Constructor = t
            }(window.jQuery),
            function(a) {
                "use strict";
                <?php if((isset($permissions) && in_array('move bug report', $permissions)) ||
                    $currentWorkspace->permission == 'Owner'): ?>
                    a.Dragula.init()
                <?php endif; ?>
            }(window.jQuery);
        </script>
        <!-- third party js ends -->
        <script>
            $(document).on('click', '#form-comment button', function(e) {
                var comment = $.trim($("#form-comment textarea[name='comment']").val());
                if (comment != '') {
                    $.ajax({
                        url: $("#form-comment").data('action'),
                        data: {
                            comment: comment
                        },
                        type: 'POST',
                        success: function(data) {
                            data = JSON.parse(data);

                            if (data.user_type == 'Client') {
                                var avatar = "avatar='" + data.client.name + "'";
                                var html = "<li class='media border-bottom mb-3'>" +
                                    "                    <img class='mr-3 avatar-sm rounded-circle img-thumbnail hight_img' width='60' " +
                                    avatar + " alt='" + data.client.name + "'>" +
                                    "                    <div class='media-body mb-2'>" +
                                    "                    <div class='float-left'>" +
                                    "                        <h5 class='mt-0 mb-1 form-control-label'>" +
                                    data.client.name + "</h5>" +
                                    "                        " + data.comment +
                                    "                    </div>" +
                                    "                    </div>" +
                                    "                </li>";
                            } else {
                                var avatar = (data.user.avatar) ? "src='<?php echo e($logo); ?>/" + data.user
                                    .avatar + "'" : "avatar='" + data.user.name + "'";
                                var html = "<li class='media border-bottom mb-3'>" +
                                    "                    <img class='mr-3 avatar-sm rounded-circle img-thumbnail hight_img' width='60' " +
                                    avatar + " alt='" + data.user.name + "'>" +
                                    "                    <div class='media-body mb-2'>" +
                                    "                    <div class='float-left'>" +
                                    "                        <h5 class='mt-0 mb-1 form-control-label'>" +
                                    data.user.name + "</h5>" +
                                    "                        " + data.comment +
                                    "                           </div>" +
                                    "                           <div class='text-end'>" +
                                    "                               <a href='#' class='delete-icon delete-comment action-btn btn-danger  btn btn-sm d-inline-flex align-items-center' data-url='" +
                                    data.deleteUrl + "'>" +
                                    "                                   <i class='ti ti-trash'></i>" +
                                    "                               </a>" +
                                    "                           </div>" +
                                    "                    </div>" +
                                    "                </li>";
                            }
                            $("#comments").prepend(html);
                            LetterAvatar.transform();
                            $("#form-comment textarea[name='comment']").val('');
                            show_toastr('<?php echo e(__('Success')); ?>', '<?php echo e(__('Comment Added Successfully!')); ?>',
                                'success');
                        },
                        error: function(data) {
                            show_toastr('<?php echo e(__('Error')); ?>', '<?php echo e(__('Some Thing Is Wrong!')); ?>',
                                'error');
                        }
                    });
                } else {
                    show_toastr('<?php echo e(__('Error')); ?>', '<?php echo e(__('Please write comment!')); ?>', 'error');
                }
            });
            $(document).on("click", ".delete-comment", function() {
                if (confirm('<?php echo e(__('Are you sure ?')); ?>')) {
                    var btn = $(this);
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'DELETE',
                        dataType: 'JSON',
                        success: function(data) {
                            show_toastr('<?php echo e(__('Success')); ?>',
                                '<?php echo e(__('Comment Deleted Successfully!')); ?>', 'success');
                            btn.closest('.media').remove();
                        },
                        error: function(data) {
                            data = data.responseJSON;
                            if (data.message) {
                                show_toastr('<?php echo e(__('Error')); ?>', data.message, 'error');
                            } else {
                                show_toastr('<?php echo e(__('Error')); ?>', '<?php echo e(__('Some Thing Is Wrong!')); ?>',
                                    'error');
                            }
                        }
                    });
                }
            });

            $(document).on('submit', '#form-file', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $("#form-file").data('url'),
                    type: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        show_toastr('<?php echo e(__('Success')); ?>', '<?php echo e(__('File Upload Successfully!')); ?>' + '</br>' + '<span class="text-danger">' + data.result + '</span>', 'success',
                            'success');
                        //console.log(data);
                        var delLink = '';

                        if (data.deleteUrl.length > 0 && data.result == 1) {
                            delLink =
                                "<a href='#' class='delete-icon delete-comment-file action-btn btn-danger  btn btn-sm d-inline-flex align-items-center mx-1'  data-url='" +
                                data.deleteUrl + "'>" +
                                "                                        <i class='ti ti-trash'></i>" +
                                "                                    </a>";
                        }

                        var html = "<div class='card mb-1 shadow-none border'>" +
                            "                        <div class='card-body py-2'>" +
                            "                            <div class='row align-items-center'>" +
                            "                                <div class='col-auto'>" +
                            "                                    <div class='avatar-sm'>" +
                            "                                        <span class='avatar-title rounded text-uppercase'>" +
                            "<img class='preview_img_size' " + "src='<?php echo e($logo_tasks); ?>/" + data.file +
                            "'>" +
                            "                                        </span>" +
                            "                                    </div>" +
                            "                                </div>" +
                            "                                <div class='col pl-0'>" +
                            "                                    <a href='#' class='text-muted form-control-label'>" +
                            data.name + "</a>" +
                            "                                    <p class='mb-0'>" + data.file_size +
                            "</p>" +
                            "                                </div>" +
                            "                                <div class='col-auto'>" +
                            "                                    <a download href='<?php echo e($logo_tasks); ?>/" +
                            data.file +
                            "' class='action-btn btn-primary  btn btn-sm d-inline-flex align-items-center'>" +
                            "                                        <i class='ti ti-download'></i>" +
                            "                                    </a>" +

                            "                                   <a  href='<?php echo e($logo_tasks); ?>/" + data
                            .file +
                            "' class='edit-icon action-btn btn-secondary  btn btn-sm d-inline-flex align-items-center mx-1'>" +
                            "                                        <i class='ti ti-crosshair text-white'></i>" +
                            "                                    </a>" +

                            delLink +
                            "                                </div>" +
                            "                            </div>" +
                            "                        </div>" +
                            "                    </div>";
                        if(data.result == 1){
                            $("#comments-file").prepend(html);
                        }    
                    },
                    error: function(data) {
                        data = data.responseJSON;
                        if (data) {
                            // console.log(data.file);
                        // alert(data.file);

                            show_toastr('<?php echo e(__('Error')); ?>',
                                'File type must be match with Storage setting.', 'error');
                            $('#file-error').text(data.errors.file[0]).show();
                        } else {
                            show_toastr('<?php echo e(__('Error')); ?>',
                                'File type must be match with Storage setting.', 'error');
                        }
                    }
                });
            });
            
            $(document).on("click", ".delete-comment-file", function() {
                if (confirm('<?php echo e(__('Are you sure ?')); ?>')) {
                    var btn = $(this);
                    $.ajax({
                        url: $(this).attr('data-url'),
                        type: 'DELETE',
                        dataType: 'JSON',
                        success: function(data) {
                            show_toastr('<?php echo e(__('Success')); ?>', '<?php echo e(__('File Deleted Successfully!')); ?>',
                                'success');
                            btn.closest('.border').remove();
                        },
                        error: function(data) {
                            data = data.responseJSON;
                            if (data.message) {
                                show_toastr('<?php echo e(__('Error')); ?>', data.message, 'error');
                            } else {
                                show_toastr('<?php echo e(__('Error')); ?>', '<?php echo e(__('Some Thing Is Wrong!')); ?>',
                                    'error');
                            }
                        }
                    });
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<style type="text/css">
    .hight_img {
        max-width: 30px !important;
        max-height: 30px !important;
    }
</style>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/projects/bug_report.blade.php ENDPATH**/ ?>