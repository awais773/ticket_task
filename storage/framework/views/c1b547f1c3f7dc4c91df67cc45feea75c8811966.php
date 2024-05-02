<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Evaluation Report')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('links'); ?>
    <?php if(\Auth::guard('client')->check()): ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php endif; ?>
    <li class="breadcrumb-item"> <?php echo e(__('Evaluation  Report')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-button'); ?>
    <?php if(auth()->guard('web')->check()): ?>
  <a href="#" class="btn btn-sm btn-primary filter" data-toggle="tooltip" title="<?php echo e(__('Filter')); ?>">
            <i class="ti ti-filter"></i>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php

    $client_keyword = Auth::user()->getGuard() == 'client' ? 'client.' : '';
?>

<?php $__env->startSection('content'); ?>

    <!--  <div class="col-lg-12 projectreportdata p-0">
     </div> -->

    <div class="row  display-none" id="show_filter">
        <!--       <div class=" form-group col-3">
                <select class=" form-select" name="project" id="project">
                    <option value=""><?php echo e(__('All Projects')); ?></option>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div> -->
        <?php if($currentWorkspace->permission == 'Owner' || Auth::user()->getGuard() == 'client'): ?>
            <div class="col-md-2 col-sm-6 pb-3">
                <select class="select2 form-select" name="all_users" id="all_users">
                    <option value="" class="px-4"><?php echo e(__('All Users')); ?></option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        <?php endif; ?>

        
        <button class=" btn btn-primary col-1 btn-filter apply"><?php echo e(__('Apply')); ?></button>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style mt-3 mx-2">
                    <div class="table-responsive">
                        <table class="table selection-datatable px-4 mt-2" id="selection-datatable1">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Employee Name')); ?></th>
                                    <th><?php echo e(__('Total Complete Project/month')); ?></th>
                                    <th><?php echo e(__('Total Complete Project/year')); ?></th>
                                    <th><?php echo e(__('Employee Promised/month')); ?></th>
                                    <th><?php echo e(__('Employee Promised/year')); ?></th>
                                    <th><?php echo e(__('Give Promotion')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->project_each_total_month); ?></td>
                                    <td><?php echo e($user->project_each_total_year); ?></td>
                                    <td><?php echo e($user->project_each_month); ?></td>
                                    <td><?php echo e($user->project_each_year); ?></td>
                                    <!-- Add more columns as needed for user data -->
                                    <td>  <a href="<?php echo e(route('graphShow.graphShow',[$currentWorkspace->slug,$user->id])); ?>" class="action-btn btn-warning  btn btn-sm d-inline-flex align-items-center" data-toggle="tooltip" title="<?php echo e(__('Graph')); ?>">
                                        <i class="ti ti-eye"></i>
                                       </a>
                                       <a href="#" class="dropdown-item" data-ajax-popup="true"
                                           data-size="md" data-title="<?php echo e(__('Add Promotion')); ?>"
                                           data-url="<?php echo e(route('users.addPromotionEdit', [$currentWorkspace->slug, $user->id])); ?>"><i
                                               class="ti ti-edit"></i> <span><?php echo e(__('Add Promotion')); ?></span></a>
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
    
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/custom/css/datatables.min.css')); ?>">
    <style>
        table.dataTable.no-footer {
            border-bottom: none !important;
        }

        .display-none {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        (function() {
            const d_week = new Datepicker(document.querySelector('.datepicker4'), {
                buttonClass: 'btn',
                todayBtn: true,
                clearBtn: true,
                format: 'yyyy-mm-dd',
            });
        })();
    </script>

    <script>
        (function() {
            const d_week = new Datepicker(document.querySelector('.datepicker5'), {
                buttonClass: 'btn',
                todayBtn: true,
                clearBtn: true,
                format: 'yyyy-mm-dd',
            });
        })();
    </script>
    <script src="<?php echo e(asset('assets/custom/js/jquery.dataTables.min.js')); ?>"></script>
    <script>
        const dataTable = new simpleDatatables.DataTable("#selection-datatable1");
    </script>


    <script type="text/javascript">
        $(".filter").click(function() {
            $("#show_filter").toggleClass('display-none');
        });
    </script>
    <script>
        $(document).ready(function() {

            var table = $("#selection-datatable1").DataTable({
                order: [],
                select: {
                    style: "multi"
                },
                "language": dataTableLang,
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
            $(document).on("click", ".btn-filter", function() {

                getData();
            });

            // function getData() {
            //     table.clear().draw();
            //     $("#selection-datatable1 tbody tr").html(
            //         '<td colspan="11" class="text-center"> <?php echo e(__('Loading ...')); ?></td>');

            //     var data = {
            //         status: $("#status").val(),
            //         start_date: $("#start_date").val(),
            //         end_date: $("#end_date").val(),
            //         all_users: $("#all_users").val(),
            //     };
            //     $.ajax({
            //         url: '<?php echo e(route($client_keyword . 'projects.ajax_data_report', [$currentWorkspace->slug])); ?>',
            //         type: 'POST',
            //         data: data,
            //         success: function(data) {
            //             table.rows.add(data.data).draw(true);
            //             loadConfirm();
            //         },
            //         error: function(data) {
            //             show_toastr('Info', data.error, 'error')
            //         }
            //     })
            // }

            getData();

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/users_report/index.blade.php ENDPATH**/ ?>