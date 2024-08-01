<form method="post" action="<?php echo e(route('projects.user.permission.store',[$currentWorkspace->slug,$project->id,$user->id])); ?>">
    <?php echo csrf_field(); ?>
    <?php echo $__env->make('projects.project_permission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal-footer">
       <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
         <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn  btn-primary">
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/projects/user_permission.blade.php ENDPATH**/ ?>