<?php echo e(Form::open(['route' => ['webhook.store', $slug ], 'method' => 'post' ,'class' => 'py-3 px-3' ])); ?>

<div class="form-group">
    <?php echo e(Form::label('module',__('Module'), ['class'=>'form-label'] )); ?>

    <?php echo e(Form::select('module', $module, null, ['class' => 'form-control select', 'id' => 'module'])); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('url',__('Url'), ['class'=>'form-label'] )); ?>

    <?php echo e(Form::text('url',null,array('class'=>'form-control','placeholder'=>__('Enter Webhook Url'),'required'=>'required'))); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('method',__('Method'), ['class'=>'form-label'])); ?>

    <?php echo e(Form::select('method', $method, null, ['class' => 'form-control select', 'id' => 'method'])); ?>

</div>
<div class="modal-footer border-0 p-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
</div>
<?php echo e(Form::close()); ?><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/users/create_webhook.blade.php ENDPATH**/ ?>