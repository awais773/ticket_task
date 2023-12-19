<form class="" method="post" action="<?php echo e(route('clients.update',[$currentWorkspace->slug,$client->id])); ?>">
    <?php echo csrf_field(); ?>
    <div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <label for="name" class="col-form-label"><?php echo e(__('Name')); ?></label>
            <input class="form-control" type="text" id="name" name="name" required="" placeholder="<?php echo e(__('Enter Name')); ?>" value="<?php echo e($client->name); ?>">
        </div>
        <div class="form-group ">
            <label for="email" class="col-form-label"><?php echo e(__('Email')); ?></label>
            <input class="form-control" type="email" id="email" name="email" required="" placeholder="<?php echo e(__('Enter Email')); ?>"  value="<?php echo e($client->email); ?>">
        </div>
        <div class="col-md-12">
            <label for="password" class="col-form-label"><?php echo e(__('Password')); ?></label>
            <input class="form-control" type="password" id="password" name="password" required="" placeholder="<?php echo e(__('Enter Password')); ?>">
        </div>
        </div>
        </div>
       <div class=" modal-footer">
             <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
             <input type="submit" value="<?php echo e(__('Save Changes')); ?>" class="btn  btn-primary">
            
        </div>
    
</form>
<?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/clients/edit.blade.php ENDPATH**/ ?>