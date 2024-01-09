<form class="" method="post" action="<?php echo e(route('plans.store')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
     <div class="modal-body">
    <div class="row">
        <div class="text-end col-12">
            <a href="#" data-size="lg" data-ajax-popup-over="true" class="btn btn-sm btn-primary" data-url="<?php echo e(route('generate',['plan'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate with AI')); ?>" data-title="<?php echo e(__('Generate Plan Name & Description')); ?>">
                <i class="fas fa-robot px-1"></i><?php echo e(__('Generate with AI')); ?></a>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="form-label"><?php echo e(__('Name')); ?> *</label>
                <input type="text" class="form-control" id="name" name="name" required/>
            </div>
        </div>
        <div class="form-group col-md-3 pt-3 ">
            <div class="form-check form-switch d-inline-block py-4 ">
                <input type="checkbox" class="form-check-input" name="enable_chatgpt" id="enable_chatgpt">
                <label class="custom-control-label form-check-label"
                for="enable_chatgpt"><?php echo e(__('Enable Chatgpt')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3 pt-3">
            <div class="form-check form-switch d-inline-block py-4">
                <input type="checkbox" class="form-check-input" name="status" id="status" checked="checked">
                <label class="custom-control-label form-control-label" for="status"><?php echo e(__('Status')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="monthly_price" class="form-control-label"><?php echo e(__('Monthly Price')); ?> *</label>
            <div class="form-icon-user">
                <span class="currency-icon bg-primary"><?php echo e((env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$')); ?></span>
                <input class="form-control currency_input" type="number" min="0" id="monthly_price" name="monthly_price" placeholder="<?php echo e(__('Monthly Price')); ?>">
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="annual_price " class="form-control-label"><?php echo e(__('Annual Price')); ?> *</label>
            <div class="form-icon-user">
                <span class="currency-icon bg-primary"><?php echo e((env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$')); ?></span>
                <input class="form-control currency_input" type="number" min="0" id="annual_price" name="annual_price" placeholder="<?php echo e(__('Annual Price')); ?>">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="duration" class="form-control-label"><?php echo e(__('Trial Days')); ?> *</label>
            <input type="number" class="form-control mb-0" id="trial_days" name="trial_days" required/>
            <span><small><?php echo e(__("Note: '-1' for unlimited")); ?></small></span>
        </div>
        <div class="form-group col-md-6">
            <label for="storage_limit" class="form-control-label"><?php echo e(__('Storage Limit')); ?> *</label>
            <input type="number" class="form-control mb-0" id="storage_limit" name="storage_limit" required/>
            <span><small><?php echo e(__("Note: '-1' for unlimited")); ?></small></span>
        </div>
        <div class="form-group col-md-6">
            <label for="max_workspaces" class="form-label"><?php echo e(__('Maximum Workspaces')); ?> *</label>
            <input type="number" class="form-control mb-0" id="max_workspaces" name="max_workspaces" required/>
            <span><small><?php echo e(__("Note: '-1' for unlimited")); ?></small></span>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                <label for="max_users" class="form-label"><?php echo e(__('Maximum Users Per Workspace')); ?> *</label>
                <input type="number" class="form-control mb-0" id="max_users" name="max_users" required/>
                <span><small><?php echo e(__("Note: '-1' for unlimited")); ?></small></span>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="max_clients" class="form-label"><?php echo e(__('Maximum Clients Per Workspace')); ?> *</label>
            <input type="number" class="form-control mb-0" id="max_clients" name="max_clients" required/>
            <span><small><?php echo e(__("Note: '-1' for unlimited")); ?></small></span>
        </div>
        <div class="form-group col-md-6">
            <label for="max_projects" class="form-label"><?php echo e(__('Maximum Projects Per Workspace')); ?> *</label>
            <input type="number" class="form-control mb-0" id="max_projects" name="max_projects" required/>
            <span><small><?php echo e(__("Note: '-1' for unlimited")); ?></small></span>
        </div>
        <div class="form-group col-md-12 mb-0">
            <div class="form-group">
                <label for="description" class="form-label"><?php echo e(__('Description')); ?></label>
                <textarea  rows="3"class="form-control" id="description" name="description"><?php echo e($plan->description); ?></textarea>
            </div>
        </div>
    </div>
</div>
    <div class=" modal-footer">
        
        <div class="text-end col-auto">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">
        </div>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/plans/create.blade.php ENDPATH**/ ?>