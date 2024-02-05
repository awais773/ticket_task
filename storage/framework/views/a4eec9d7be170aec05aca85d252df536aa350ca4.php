<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plan-Request')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('links'); ?>
    <?php if(\Auth::guard('client')->check()): ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php endif; ?>
    <li class="breadcrumb-item"> <?php echo e(__('Plan Request')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="selection-datatable" class="table" width="100%">
                            <thead>
                                <tr>
                                    
                                      <th><?php echo e(__('NAME')); ?></th>
                                        <th><?php echo e(__('EMAIL')); ?></th>
                                          <th><?php echo e(__('PHONE')); ?></th>
                                            
                                              <th><?php echo e(__('SUBJECT')); ?></th>
                                                <th><?php echo e(__('MESSAGE')); ?></th>
                                                <th><?php echo e(__('PACKAGE')); ?></th>
                                                    <th><?php echo e(__('DATE')); ?></th>

                                    <th><?php echo e(__('ACTION')); ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if($plan_requests->count() > 0): ?>
                                    <?php $__currentLoopData = $plan_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $plan = \App\Models\Plan::find($prequest->plan_id);
                                        ?>
                                        <tr>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <td>
                                                <div class="font-weight-bold"><?php echo e($prequest->name); ?></div>
                                                  </td>
                                                  <td>
                                                 <div class="font-weight-bold"><?php echo e($prequest->email); ?></div>
                                                   </td>
                                                   <td>
                                                  <div class="font-weight-bold"><?php echo e($prequest->phone); ?></div>
                                                    </td>
                                                    
                                                     <td>
                                                    <div class="font-weight-bold"><?php echo e($prequest->subject); ?></div>
                                                       </td>
                                                       <td>
                                                     <div class="font-weight-bold"><?php echo e($prequest->message); ?></div>

                                            </td>
                                             <td>
                                                     <div class="font-weight-bold"><?php echo e($prequest->plan_id); ?></div>

                                            </td>
                                            <td><?php echo e(\App\Models\Utility::getDateFormated($prequest->created_at, true)); ?>

                                            </td>
                                            <td>
                                                <div>
                                                    
                                                    <a href="<?php echo e(route('response.request', [$prequest->id, 0])); ?>"
                                                        data-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"
                                                        class="action-btn btn-danger  btn btn-sm d-inline-flex align-items-center">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <th scope="col" colspan="7">
                                            <h6 class="text-center"><?php echo e(__('No Manually Plan Request Found.')); ?></h6>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/plan_request/index.blade.php ENDPATH**/ ?>