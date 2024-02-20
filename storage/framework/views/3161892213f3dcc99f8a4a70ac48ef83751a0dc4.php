<div class="table-responsive">
    <table class="table ">
        <tbody>
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <div class="font-style font-weight-bold"><?php echo e($plan->name); ?></div>
                </td>
                <td>
                    <div class="font-weight-bold"><?php echo e($plan->max_workspaces); ?></div>
                    <div><?php echo e(__('Workspaces')); ?></div>
                </td>
                <td>
                    <div class="font-weight-bold"><?php echo e($plan->max_users); ?></div>
                    <div><?php echo e(__('Users')); ?></div>
                </td>
                <td>
                    <div class="font-weight-bold"><?php echo e($plan->max_projects); ?></div>
                    <div><?php echo e(__('Projects')); ?></div>
                </td>
                <td>
                    <?php if($user->plan == $plan->id): ?>
                        <button type="button" class="btn btn-xs btn-soft-success btn-icon">
                            <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                            <span class="btn-inner--text"><?php echo e(__('Active')); ?></span>
                        </button>
                    <?php else: ?>
                        <div>
                            <a href="<?php echo e(route('manually.activate.plan',[$user->id,$plan->id, 'monthly'])); ?>" class="btn btn-primary btn-xs" title="<?php echo e(__('Click to Upgrade Plan')); ?>"><i class="ti ti-shopping-cart"></i> <?php echo e(__('One Month')); ?></a>
                            <a href="<?php echo e(route('manually.activate.plan',[$user->id,$plan->id, 'annual'])); ?>" class="btn btn-primary btn-xs" title="<?php echo e(__('Click to Upgrade Plan')); ?>"><i class="ti ti-shopping-cart"></i> <?php echo e(__('One Year')); ?></a>
                        </div>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/users/change_plan.blade.php ENDPATH**/ ?>