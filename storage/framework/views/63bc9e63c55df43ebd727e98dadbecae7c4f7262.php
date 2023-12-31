<?php if($project && $currentWorkspace && $task): ?>
    <form class="" method="post" action="<?php if(auth()->guard('web')->check()): ?><?php echo e(route('tasks.update',[$currentWorkspace->slug,$project->id,$task->id])); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.tasks.update',[$currentWorkspace->slug,$project->id,$task->id])); ?><?php endif; ?>">
        <?php echo csrf_field(); ?>
         <div class="modal-body">
        <div class="row">
            <?php if($currentWorkspace->is_chagpt_enable()): ?>
            <div class="text-end col-12">
                <a href="#" data-size="lg" data-ajax-popup-over="true" class="btn btn-sm btn-primary" data-url="<?php echo e(route('generate',['task'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate with AI')); ?>" data-title="<?php echo e(__('Generate Task Title & Description')); ?>">
                    <i class="fas fa-robot px-1"></i><?php echo e(__('Generate with AI')); ?></a>
            </div>
            <?php endif; ?>
            
            <div class="form-group col-md-8">
                <label class="col-form-label"><?php echo e(__('Project')); ?></label>
                <select class="form-control form-control-light select2" name="project_id" required>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id); ?>" <?php if($task->project_id == $p->id): ?> selected <?php endif; ?>><?php echo e($p->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label"><?php echo e(__('Milestone')); ?></label>
                <select class="form-control form-control-light select2" name="milestone_id" id="task-milestone">
                    <option value=""><?php echo e(__('Select Milestone')); ?></option>
                    <?php $__currentLoopData = $project->milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($milestone->id); ?>" <?php if($task->milestone_id == $milestone->id): ?> selected <?php endif; ?>><?php echo e($milestone->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group col-md-8">
                <label class="col-form-label"><?php echo e(__('Title')); ?></label>
                <input type="text" class="form-control form-control-light" id="task-title" placeholder="<?php echo e(__('Enter Title')); ?>" name="title" required value="<?php echo e($task->title); ?>">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label"><?php echo e(__('Priority')); ?></label>
                <select class="form-control form-control-light select2" name="priority" id="task-priority" required>
                    <option value="Low" <?php if($task->priority=='Low'): ?> selected <?php endif; ?>><?php echo e(__('Low')); ?></option>
                    <option value="Medium" <?php if($task->priority=='Medium'): ?> selected <?php endif; ?>><?php echo e(__('Medium')); ?></option>
                    <option value="High" <?php if($task->priority=='High'): ?> selected <?php endif; ?>><?php echo e(__('High')); ?></option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label class="col-form-label"><?php echo e(__('Assign To')); ?></label>
                <select class="multi-select" multiple="multiple" id="assign_to" name="assign_to[]">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(in_array($u->id,$task->assign_to)): ?> selected <?php endif; ?> value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?> - <?php echo e($u->email); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-12">
              
                    <label class="col-form-label"><?php echo e(__('Duration')); ?></label>
                      <div class='input-group form-group'>
                            <input type='text' class=" form-control pc-daterangepicker-3" id="duration" name="duration" value="<?php echo e(__('Select Date Range')); ?>" 
                                 placeholder="Select date range" />
                                <input type="hidden" name="start_date"  id="start_date1">
                                <input type="hidden" name="due_date" id="end_date1">
                                   <span class="input-group-text"><i
                                    class="feather icon-calendar"></i></span>
                        </div>              
                </div>

            <div class="form-group">
                <label class="col-form-label"><?php echo e(__('Description')); ?></label>
                <textarea  class="form-control form-control-light" id="task-description" rows="3" name="description" required><?php echo e($task->description); ?> </textarea>
            </div>
        </div>
    </div>
         <div class="modal-footer">
          <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
          <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn btn-primary">
        </div>
    </form>
      <link rel="stylesheet" href="<?php echo e(asset('assets/custom/libs/bootstrap-daterangepicker/daterangepicker.css')); ?>">
     <script src="<?php echo e(asset('assets/custom/libs/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

    <!-- data-picker -->
<!-- <script src="<?php echo e(asset('assets/js/plugins/flatpickr.min.js')); ?>"></script> -->
<!-- <script>
    document.querySelector(".pc-daterangepicker-3").flatpickr({
        mode: "range"
    });
</script> -->
    <script>

            if ($(".multi-select").length > 0) {
            $( $(".multi-select") ).each(function( index,element ) {
                var id = $(element).attr('id');
                   var multipleCancelButton = new Choices(
                        '#'+id, {
                            removeItemButton: true,
                        }
                    );
            });
       }
        $(function () {
            var start = moment('<?php echo e($task->start_date); ?>', 'YYYY-MM-DD HH:mm:ss');
            var end = moment('<?php echo e($task->due_date); ?>', 'YYYY-MM-DD HH:mm:ss');

            function cb(start, end) {
                $("form #duration").val(start.format('MMM D, YY hh:mm A') + ' - ' + end.format('MMM D, YY hh:mm A'));
                $('form input[name="start_date"]').val(start.format('YYYY-MM-DD HH:mm:ss'));
                $('form input[name="due_date"]').val(end.format('YYYY-MM-DD HH:mm:ss'));
            }

            $('form #duration').daterangepicker({
                /*autoApply: true,
                autoclose: true,*/
                timePicker: true,
                autoUpdateInput: false,
                startDate: start,
                endDate: end,
                /*startDate: start,
                endDate: end,
                autoApply: true,
                autoclose: true,
                autoUpdateInput: false,*/
                locale: {
                    format: 'MMMM D, YYYY hh:mm A',
                    applyLabel: "<?php echo e(__('Apply')); ?>",
                    cancelLabel: "<?php echo e(__('Cancel')); ?>",
                    fromLabel: "<?php echo e(__('From')); ?>",
                    toLabel: "<?php echo e(__('To')); ?>",
                    daysOfWeek: [
                        "<?php echo e(__('Sun')); ?>",
                        "<?php echo e(__('Mon')); ?>",
                        "<?php echo e(__('Tue')); ?>",
                        "<?php echo e(__('Wed')); ?>",
                        "<?php echo e(__('Thu')); ?>",
                        "<?php echo e(__('Fri')); ?>",
                        "<?php echo e(__('Sat')); ?>"
                    ],
                    monthNames: [
                        "<?php echo e(__('January')); ?>",
                        "<?php echo e(__('February')); ?>",
                        "<?php echo e(__('March')); ?>",
                        "<?php echo e(__('April')); ?>",
                        "<?php echo e(__('May')); ?>",
                        "<?php echo e(__('June')); ?>",
                        "<?php echo e(__('July')); ?>",
                        "<?php echo e(__('August')); ?>",
                        "<?php echo e(__('September')); ?>",
                        "<?php echo e(__('October')); ?>",
                        "<?php echo e(__('November')); ?>",
                        "<?php echo e(__('December')); ?>"
                    ],
                }
            }, cb);

            cb(start, end);
        });
    </script>
    <script>
        $(document).on('change', "select[name=project_id]", function () {
            $.get('<?php if(auth()->guard('web')->check()): ?><?php echo e(route('home')); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.home')); ?><?php endif; ?>' + '/userProjectJson/' + $(this).val(), function (data) {
                $('select[name=assign_to]').html('');
                data = JSON.parse(data);
                $(data).each(function (i, d) {
                    $('select[name=assign_to]').append('<option value="' + d.id + '">' + d.name + ' - ' + d.email + '</option>');
                });
            });
            $.get('<?php if(auth()->guard('web')->check()): ?><?php echo e(route('home')); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.home')); ?><?php endif; ?>' + '/projectMilestoneJson/' + $(this).val(), function (data) {
                $('select[name=milestone_id]').html('<option value=""><?php echo e(__('Select Milestone')); ?></option>');
                data = JSON.parse(data);
                $(data).each(function (i, d) {
                    $('select[name=milestone_id]').append('<option value="' + d.id + '">' + d.title + '</option>');
                });
            });
        })
    </script>

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
                            <p class="text-muted mt-3"><?php echo e(__("It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us. Here's a little tip that might help you get back on track.")); ?></p>
                            <div class="mt-3">
                                <a class="btn-return-home badge-blue" href="<?php echo e(route('home')); ?>"><i class="fas fa-reply"></i> <?php echo e(__('Return Home')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/projects/taskEdit.blade.php ENDPATH**/ ?>