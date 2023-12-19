<form class="" method="post" action="<?php echo e(route('users.addPromotion',[$currentWorkspace->slug,$user->id])); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('post'); ?>
    <div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <label for="name" class="col-form-label"><?php echo e(__('Employee Salary')); ?></label>
            <input type="text" class="form-control" id="employee_salary" name="employee_salary" required/>
        </div>
        </div>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <input type="submit" value="<?php echo e(__('Save Changes' )); ?>" class="btn  btn-primary">
        </div>
    
</form>


<?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/users_report/addPermotion.blade.php ENDPATH**/ ?>