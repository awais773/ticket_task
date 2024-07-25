<form class="" method="post" action="<?php echo e(route('projects.update',[$currentWorkspace->slug,$project->id])); ?>">
    <?php echo csrf_field(); ?>
     <div class="modal-body">
    <div class="row">
        <?php if($currentWorkspace->is_chagpt_enable()): ?>
        <div class="text-end col-12">
            <a href="#" data-size="lg" data-ajax-popup-over="true" class="btn btn-sm btn-primary" data-url="<?php echo e(route('generate',['project'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate with AI')); ?>" data-title="<?php echo e(__('Generate Project Name & Description')); ?>">
                <i class="fas fa-robot px-1"></i><?php echo e(__('Generate with AI')); ?></a>
        </div>
        <?php endif; ?>
        
        <div class="form-group col-md-12">
            <label for="projectname" class="form-label"><?php echo e(__('Name')); ?></label>
            <input class="form-control" type="text" id="projectname" name="name" required="" placeholder="<?php echo e(__('Project Name')); ?>" value="<?php echo e($project->name); ?>">
        </div>
        <div class="form-group col-md-12">
            <label for="description" class="form-label"><?php echo e(__('Description')); ?></label>
            <textarea rows="3" class="form-control" id="description" name="description" required="" placeholder="<?php echo e(__('Add Description')); ?>"><?php echo e($project->description); ?></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="status" class="form-label"><?php echo e(__('Status')); ?></label>
            <select id="status" name="status" class="form-control select2">
                <option value="Ongoing"><?php echo e(__('Ongoing')); ?></option>
                <option value="Finished" <?php if($project->status == 'Finished'): ?> selected <?php endif; ?>><?php echo e(__('Finished')); ?></option>
                <option value="OnHold" <?php if($project->status == 'OnHold'): ?> selected <?php endif; ?>><?php echo e(__('OnHold')); ?></option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="budget" class="form-label"><?php echo e(__('Budget')); ?></label>
            <div class="form-icon-user ">
                <span class="currency-icon bg-primary "><?php echo e((!empty($currentWorkspace->currency)) ? $currentWorkspace->currency : '$'); ?></span>
                <input class="form-control currency_input" type="number" min="0" id="budget" name="budget" value="<?php echo e($project->budget); ?>" placeholder="<?php echo e(__('Project Budget')); ?>">
            </div>
        </div>
             <div class="form-group col-md-6">
               <label class="form-label"><?php echo e(__('Start Date')); ?></label>
       
             
            <div class="input-group date ">
            <input class="form-control datepicker2" type="text" id="start_date" name="start_date" value="<?php echo e($project->start_date); ?>" autocomplete="off" required="required">
             <span class="input-group-text">
                 <i class="feather icon-calendar"></i>
            </span>
        </div>
      </div>
              <div class="form-group col-md-6">
               <label class="form-label"><?php echo e(__('End Date')); ?></label>   
            <div class="input-group date ">
           <input class="form-control datepicker3" type="text" id="end_date" name="end_date" value="<?php echo e($project->end_date); ?>" autocomplete="off" required="required">
             <span class="input-group-text">
                 <i class="feather icon-calendar"></i>
            </span>
        </div>
        </div>
   </div>
</div>
        <div class="modal-footer">
           <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
             <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn  btn-primary">
        </div>

</form>

<script>
     (function () {
        const d_week = new Datepicker(document.querySelector('.datepicker2'), {
            buttonClass: 'btn',
            todayBtn: true,
            clearBtn: true,
            format: 'yyyy-mm-dd',
        });
    })();
</script>

<script>
     (function () {
        const d_week = new Datepicker(document.querySelector('.datepicker3'), {
            buttonClass: 'btn',
            todayBtn: true,
            clearBtn: true,
            format: 'yyyy-mm-dd',
        });
    })();
</script><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/projects/edit.blade.php ENDPATH**/ ?>