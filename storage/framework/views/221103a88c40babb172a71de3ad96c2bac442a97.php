<?php
    $client_keyword = Auth::user()->getGuard() == 'client' ? 'client.' : '';
?>
<?php $__env->startSection('page-title'); ?> <?php echo e(__('Contracts')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('links'); ?>
<?php if(\Auth::guard('client')->check()): ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php else: ?>
 <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
 <?php endif; ?>
<li class="breadcrumb-item"> <?php echo e(__('Contracts')); ?></li>
 <?php $__env->stopSection(); ?>


<?php $__env->startSection('action-button'); ?>
   <?php if(auth()->guard('web')->check()): ?>
        <?php if($currentWorkspace->creater->id == Auth::user()->id): ?>
             <a href="#" class="btn btn-sm  btn-primary" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Create Contract ')); ?>" data-toggle="tooltip" title="<?php echo e(__('Create Contract')); ?>" data-url="<?php echo e(route('contracts.create',$currentWorkspace->slug)); ?>">
                    <i class="ti ti-plus"></i>
             </a>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card comp-card">
                    <div class="card-body" style="min-height: 143px;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-b-20"><?php echo e(__('Total Contracts')); ?></h6>
                                <h3 class="text-primary"><?php echo e($cnt_contract['total']); ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-handshake bg-success text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card comp-card">
                    <div class="card-body" style="min-height: 143px;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-b-20"><?php echo e(__('This Month Total Contracts')); ?></h6>
                                <h3 class="text-info"><?php echo e($cnt_contract['this_month']); ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-handshake bg-info text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card comp-card">
                    <div class="card-body" style="min-height: 143px;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-b-20"><?php echo e(__('This Week Total Contracts')); ?></h6>
                                <h3 class="text-warning"><?php echo e($cnt_contract['this_week']); ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-handshake bg-warning text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card comp-card">
                    <div class="card-body" style="min-height: 143px;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-b-20"><?php echo e(__('Last 30 Days Total Contracts')); ?></h6>
                                <h3 class="text-danger"><?php echo e($cnt_contract['last_30days']); ?></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-handshake bg-danger text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card table-card">
                    <div class="card-header card-body table-border-style">
                        <div class="table-responsive">
                           <table class="table table-centered table-hover mb-0 animated" id="selection-datatable">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Contracts')); ?></th>
                                        <?php if(Auth::user()->getGuard() != 'client'): ?>
                                        <th><?php echo e(__('Client')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(__('Project')); ?></th>
                                        <th><?php echo e(__('Subject')); ?></th>
                                        <th><?php echo e(__('Value')); ?></th>
                                        <th><?php echo e(__('Type')); ?></th>
                                        <th><?php echo e(__('Start Date')); ?></th>
                                        <th><?php echo e(__('End Date')); ?></th>
                                        <th><?php echo e(__('Status')); ?></th>

                                        <th width="250px"><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="Id">
                                                <a href="<?php if(auth()->guard('web')->check()): ?><?php echo e(route('contracts.show',[$currentWorkspace->slug,$contract->id])); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.contracts.show',[$currentWorkspace->slug,$contract->id])); ?><?php endif; ?>" class="btn btn-outline-primary"><?php echo e(App\Models\Utility::contractNumberFormat($contract->id)); ?></a>
                                            </td>
                                             <?php if(Auth::user()->getGuard() != 'client'): ?>
                                            <td><?php echo e(!empty($contract->clients)?$contract->clients->name:''); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e(!empty( $contract->projects ) ?  $contract->projects->name  : ''); ?></td>
                                            <td><?php echo e($contract->subject); ?></td>
                                            <td><?php echo e($currentWorkspace->priceFormat($contract->value)); ?></td>
                                            <td><?php echo e($contract->contract_type->name); ?></td>
                                            <td><?php echo e(App\Models\Utility::dateFormat($contract->start_date)); ?></td>
                                            <td><?php echo e(App\Models\Utility::dateFormat($contract->end_date)); ?></td>
                                            <td>
                                                 <?php if($contract->status == 'pending'): ?>
                                                  <span class="badge bg-warning p-2 px-3 rounded"><?php echo e(__('Pending')); ?></span>
                                                 <?php elseif($contract->status == 'accept'): ?>
                                                  <span class="badge bg-success p-2 px-3 rounded"><?php echo e(__('Accept')); ?></span>
                                                  <?php else: ?>
                                                   <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__('Decline')); ?></span>
                                                 <?php endif; ?>
                                            </td>

                                            <td class="Action">
                                                <span>

                                                     <?php if($currentWorkspace->permission == 'Owner' || Auth::user()->getGuard() == 'client'): ?>
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="<?php if(auth()->guard('web')->check()): ?><?php echo e(route('contracts.show',[$currentWorkspace->slug,$contract->id])); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.contracts.show',[$currentWorkspace->slug,$contract->id])); ?><?php endif; ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Detail" aria-label="Detail"><span class="text-white"><i class="ti ti-eye"></i></span></a>



                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(auth()->guard('web')->check()): ?>
                                                    <?php if($contract->status == 'accept'): ?>
                                                    <div class="action-btn bg-primary ms-2">
                                                        <a href="#" data-size="lg" data-url="<?php echo e(route('contracts.copy',[$currentWorkspace->slug,$contract->id])); ?>"data-ajax-popup="true" data-title="<?php echo e(__('Duplicate')); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Duplicate')); ?>" ><i class="ti ti-copy text-white"></i></a>
                                                    </div>
                                                    <?php endif; ?>


                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="#" data-size="lg" data-url="<?php echo e(route('contracts.edit',[$currentWorkspace->slug,$contract->id])); ?>"
                                                            data-ajax-popup="true" data-title="<?php echo e(__('Edit contract')); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Edit')); ?>" ><i class="ti ti-pencil text-white"></i></a>
                                                    </div>

                                                        <div class="action-btn bg-danger ms-2">
                                                                <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?')); ?>" data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="delete-form-<?php echo e($contract->id); ?>" title="<?php echo e(__('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"><span class="text-white"><i class="ti ti-trash"></i></span></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['contracts.destroy', [$currentWorkspace->slug,$contract->id]], 'id' => 'delete-form-' . $contract->id]); ?>

                                                            <?php echo Form::close(); ?>

                                                        </div>

                                                        <?php endif; ?>

                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $(document).on('change', '.client_id', function() {
    //    alert('hey');
        getUsers($(this).val());
    });

    function getUsers(id) {

        $("#project-div").html('');
        $('#project-div').append('<select class="form-control" id="project" name="project" ></select>');
        // console.log('project');
        $.get("<?php echo e(url('get-projects')); ?>/" + id, function(data, status)
        {
            var list = '';
            $('#project').empty();
            if(data.length > 0){
                list += "<option value=''> <?php echo e(__('Select Projects')); ?> </option>";
            }else{
                list += "<option value=''> <?php echo e(__('No Projects')); ?> </option>";
            }
            $.each(data, function(i, item) {
                list += "<option value='"+item.id+"'>"+item.name+"</option>"
            });

            var select = '<select class="form-control" id="project" name="project" >'+list+'</select>';
            $('.project-div').html(select);
            select2();
        });
    }
</script>



<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/contracts/index.blade.php ENDPATH**/ ?>