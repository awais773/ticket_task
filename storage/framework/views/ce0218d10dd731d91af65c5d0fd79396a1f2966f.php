<form class="" method="post" action="<?php echo e(route('client.change.password',[$currentWorkspace->slug,$client->id])); ?>">
    <?php echo csrf_field(); ?>
     <div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <label for="password" class="col-form-label"><?php echo e(__('New Password')); ?></label>
            <input type="password" class="form-control" id="password" name="password"/>
        </div>
        <div class="col-md-12">
            <label for="password_confirmation" class="col-form-label"><?php echo e(__('Confirm Password')); ?></label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"/>
        </div>
    </div>
</div>
        <div class=" modal-footer">
             <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
             <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn  btn-primary">
            
        </div>
    
</form>
<?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/clients/reset_password.blade.php ENDPATH**/ ?>