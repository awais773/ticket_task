<style>
    @media (max-width: 768px) {
        .circular-progressbar {
            padding-left: 30% !important;
        }

        /* #chart {
            margin-left: 20% !important;
        } */
    }
</style>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Project Detail')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('links'); ?>
    <?php if(\Auth::guard('client')->check()): ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php endif; ?>
    <?php if(\Auth::guard('client')->check()): ?>
        <li class="breadcrumb-item"><a
                href="<?php echo e(route('client.project_report.index', $currentWorkspace->slug)); ?>"><?php echo e(__('Project Report')); ?></a>
        </li>
    <?php else: ?>
        <li class="breadcrumb-item"><a
                href="<?php echo e(route('project_report.index', $currentWorkspace->slug)); ?>"><?php echo e(__('Project Report')); ?></a></li>
    <?php endif; ?>
    <li class="breadcrumb-item"><?php echo e($project->name); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('action-button'); ?>
    <a href="#" onclick="saveAsPDF()" class="btn btn-sm btn-primary py-2" data-toggle="popover"
        title="<?php echo e(__('Project Report Download')); ?>">
        <i class="ti ti-file-download "></i>
    </a>
<?php $__env->stopSection(); ?>

<?php
    $client_keyword = Auth::user()->getGuard() == 'client' ? 'client.' : '';
?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row" id="printableArea">
                        <div class="col-xl-6">
                            <div class="card " style="overflow-x: auto">
                                <div class="card-header">
                                    <h5><?php echo e(__('Overview')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-sm-7">

                                            <table class="table" id="pc-dt-simple">
                                                <tbody>
                                                    <tr class="table_border">
                                                        <th class="table_border"><?php echo e(__('Project Name')); ?>:</th>
                                                        <td class="table_border"><?php echo e($project->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="table_border"><?php echo e(__('Project Status')); ?>:</th>
                                                        <td class="table_border">
                                                            <?php if($project->status == 'Finished'): ?>
                                                                <div class="badge  bg-success p-2 px-3 rounded">
                                                                    <?php echo e(__('Finished')); ?>

                                                                </div>
                                                            <?php elseif($project->status == 'Ongoing'): ?>
                                                                <div class="badge  bg-secondary p-2 px-3 rounded">
                                                                    <?php echo e(__('Ongoing')); ?></div>
                                                            <?php else: ?>
                                                                <div class="badge bg-warning p-2 px-3 rounded">
                                                                    <?php echo e(__('OnHold')); ?></div>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <th class="table_border"><?php echo e(__('Start Date')); ?>:</th>
                                                        <td class="table_border">
                                                            <?php echo e(App\Models\Utility::dateFormat($project->start_date)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="table_border"><?php echo e(__('Due Date')); ?>:</th>
                                                        <td class="table_border">
                                                            <?php echo e(App\Models\Utility::dateFormat($project->end_date)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="table_border"><?php echo e(__('Total Members')); ?>:</th>
                                                        <td class="table_border">
                                                            <?php echo e((int) $project->users->count() + (int) $project->clients->count()); ?>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-5">
                                            <!--  <div id="projects-chart"></div> -->

                                            <?php
                                                $task_percentage = $project->project_progress()['percentage'];
                                                $data = trim($task_percentage, '%');
                                                $status = $data > 0 && $data <= 25 ? 'red' : ($data > 25 && $data <= 50 ? 'orange' : ($data > 50 && $data <= 75 ? 'blue' : ($data > 75 && $data <= 100 ? 'green' : '')));
                                            ?>

                                            <div class="circular-progressbar p-sm-0 ">
                                                <div class="flex-wrapper">
                                                    <div class="single-chart">
                                                        <svg viewBox="0 0 36 36"
                                                            class="circular-chart orange <?php echo e($status); ?>">
                                                            <path class="circle-bg"
                                                                d="M18 2.0845
                                                                                    a 15.9155 15.9155 0 0 1 0 31.831
                                                                                    a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                            <path class="circle"
                                                                stroke-dasharray="<?php echo e($data); ?>, 100"
                                                                d="M18 2.0845
                                                                                    a 15.9155 15.9155 0 0 1 0 31.831
                                                                                    a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                            <text x="18" y="20.35"
                                                                class="percentage"><?php echo e($data); ?>%</text>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            $mile_percentage = $project->project_milestone_progress()['percentage'];
                            $mile_percentage = trim($mile_percentage, '%');
                        ?>

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header" style="padding: 25px 35px !important;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="row">
                                            <h5 class="mb-0"><?php echo e(__('Milestone Progress')); ?></h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                    </div>

                                    <div id="milestone-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-end">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Refferals"><i class=""></i></a>
                                    </div>
                                    <h5><?php echo e(__('Task Priority')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <!--  <div id="projects-chart"></div> -->
                                            <div id='chart_priority'></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-5">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-end">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Refferals"><i class=""></i></a>
                                    </div>
                                    <h5><?php echo e(__('Task Status')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div id="chart" class="d-flex justify-content-center"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-end">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Refferals"><i class=""></i></a>
                                    </div>
                                    <h5><?php echo e(__('Hours Estimation')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div id="chart-hours"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-5">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Users')); ?></h5>
                                </div>
                                <div class="card-body table-border-style ">
                                    <div class="table-responsive">
                                        <table class=" table">
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('Name')); ?></th>
                                                    <th><?php echo e(__('Assigned Tasks')); ?></th>
                                                    <th><?php echo e(__('Done Tasks')); ?></th>
                                                    <th><?php echo e(__('Logged Hours')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $hours_format_number = 0;
                                                        $total_hours = 0;
                                                        $hourdiff_late = 0;
                                                        $esti_late_hour = 0;
                                                        $esti_late_hour_chart = 0;
                                                        
                                                        $total_user_task = App\Models\Task::where('project_id', $project->id)
                                                            ->whereRaw('FIND_IN_SET(?,  assign_to) > 0', [$user->id])
                                                            ->get()
                                                            ->count();
                                                        
                                                        $all_task = App\Models\Task::where('project_id', $project->id)
                                                            ->whereRaw('FIND_IN_SET(?,  assign_to) > 0', [$user->id])
                                                            ->get();
                                                        
                                                        $total_complete_task = App\Models\Task::join('stages', 'stages.id', '=', 'tasks.status')
                                                            ->where('project_id', '=', $project->id)
                                                            ->where('assign_to', '=', $user->id)
                                                            ->where('stages.complete', '=', '1')
                                                            ->get()
                                                            ->count();
                                                        
                                                        $logged_hours = 0;
                                                        $timesheets = App\Models\Timesheet::where('project_id', $project->id)
                                                            ->where('created_by', $user->id)
                                                            ->get();
                                                    ?>


                                                    <?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $date_time = $timesheet->time;
                                                            $hours = date('H', strtotime($date_time));
                                                            $minutes = date('i', strtotime($date_time));
                                                            $total_hours = $hours + $minutes / 60;
                                                            $logged_hours += $total_hours;
                                                            $hours_format_number = number_format($logged_hours, 2, '.', '');
                                                        ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <tr>
                                                        <td><?php echo e($user->name); ?></td>
                                                        <td><?php echo e($total_user_task); ?></td>
                                                        <td><?php echo e($total_complete_task); ?></td>
                                                        <td><?php echo e($hours_format_number); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Milestones')); ?></h5>
                                </div>
                                <div class="card-body table-border-style ">
                                    <div class="table-responsive">
                                        <table class=" table ">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo e(__('Name')); ?></th>
                                                    <th> <?php echo e(__('Progress')); ?></th>
                                                    <th> <?php echo e(__('Cost')); ?></th>
                                                    <th> <?php echo e(__('Status')); ?></th>
                                                    <th> <?php echo e(__('Start Date')); ?></th>
                                                    <th> <?php echo e(__('End Date')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $project->milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($milestone->title); ?></td>
                                                        <td>
                                                            <div class="progress_wrapper">
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        style="width: <?php echo e($milestone->progress); ?>%;"
                                                                        aria-valuenow="55" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                                <div class="progress_labels">
                                                                    <div class="total_progress">

                                                                        <strong> <?php echo e($milestone->progress); ?>%</strong>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><?php echo e($milestone->cost); ?></td>
                                                        <td>
                                                            <?php if($milestone->status == 'complete'): ?>
                                                                <label
                                                                    class="badge bg-success p-2 px-3 rounded"><?php echo e(__('Complete')); ?></label>
                                                            <?php else: ?>
                                                                <label
                                                                    class="badge bg-warning p-2 px-3 rounded"><?php echo e(__('Incomplete')); ?></label>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($milestone->start_date); ?></td>
                                                        <td><?php echo e($milestone->end_date); ?></td>


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

                <div class="col-sm-12 mt-3 mb-1 row d-sm-flex align-items-center justify-content-end" id="show_filter">
                    <?php if($currentWorkspace->permission == 'Owner' || Auth::user()->getGuard() == 'client'): ?>
                        <div class="col-sm-6 col-md-3 pb-3">
                            <select class="select2 form-select" name="all_users" id="all_users">
                                <option value="" class="px-4"><?php echo e(__('All Users')); ?></option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-6 col-md-2 pb-3">
                        <select class="select2 form-select" name="milestone_id" id="milestone_id">
                            <option value="" class="px-4"><?php echo e(__('All Milestones')); ?></option>
                            <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($milestone->id); ?>"><?php echo e($milestone->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-3 pb-3">
                        <select class="select2 form-select" name="status" id="status">
                            <option value="" class="px-4"><?php echo e(__('All Status')); ?></option>
                            <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($stage->id); ?>"><?php echo e(__($stage->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-2 pb-3">
                        <select class="select2 form-select" name="priority" id="priority">
                            <option value="" class="px-4"><?php echo e(__('All Priority')); ?></option>
                            <option value="Low"><?php echo e(__('Low')); ?></option>
                            <option value="Medium"><?php echo e(__('Medium')); ?></option>
                            <option value="High"><?php echo e(__('High')); ?></option>
                        </select>
                    </div>

                    <button class=" btn btn-primary col-1 btn-filter apply"><?php echo e(__('Apply')); ?></button>

                    <button class=" btn btn-primary col-1 mx-2 btn-filter apply"> <a
                            href="<?php echo e(route($client_keyword.'project_report.export', $project->id)); ?>" class="text-white">

                            <?php echo e(__('Export')); ?>

                        </a></button>

                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mt-2">

                                    <div class="table-responsive">
                                        <table
                                            class="table table-centered table-hover mb-0 animated selection-datatable px-4 mt-2"
                                            id="tasks-selection-datatable">
                                            <thead>
                                                <th><?php echo e(__('Task Name')); ?></th>
                                                <th><?php echo e(__('Milestone')); ?></th>
                                                <th><?php echo e(__('Start Date')); ?></th>
                                                <th><?php echo e(__('Due Date')); ?></th>
                                                <?php if($currentWorkspace->permission == 'Owner' || Auth::user()->getGuard() == 'client'): ?>
                                                    <th><?php echo e(__('Assigned to')); ?></th>
                                                <?php endif; ?>
                                                <th> <?php echo e(__('Total Logged Hours')); ?></th>
                                                <th><?php echo e(__('Priority')); ?></th>
                                                <th><?php echo e(__('Status')); ?></th>

                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/custom/css/datatables.min.css')); ?>">
<?php $__env->stopPush(); ?>
<style type="text/css">
    .apexcharts-menu-icon {
        display: none;
    }

    table.dataTable.no-footer {
        border-bottom: none !important;
    }

    .table_border {
        border: none !important
    }
</style>


<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/custom/js/html2pdf.bundle.min.js')); ?>"></script>
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




    <script>
        var filename = $('#chart-hours').val();

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,

                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 4,
                    dpi: 72,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A2'
                }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>





    <script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/custom/js/jquery.dataTables.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {

            var table = $("#tasks-selection-datatable").DataTable({
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

            function getData() {
                table.clear().draw();
                $("#tasks-selection-datatable tbody tr").html(
                    '<td colspan="11" class="text-center"> <?php echo e(__('Loading ...')); ?></td>');

                var data = {

                    assign_to: $("#all_users").val(),
                    priority: $("#priority").val(),
                    due_date_order: $("#due_date_order").val(),
                    milestone_id: $("#milestone_id").val(),
                    start_date: $("#start_date").val(),
                    due_date: $("#due_date").val(),
                    status: $("#status").val(),
                };
                $.ajax({
                    url: '<?php echo e(route($client_keyword . 'tasks.report.ajaxdata', [$currentWorkspace->slug, $project->id])); ?>',
                    type: 'POST',
                    data: data,
                    success: function(data) {
                        table.rows.add(data.data).draw(true);
                        loadConfirm();
                    },
                    error: function(data) {
                        show_toastr('Info', data.error, 'error')
                    }
                })
            }

            getData();

        });
    </script>

    <script>
        (function() {
            var options = {
                series: [<?php echo json_encode($mile_percentage); ?>],
                chart: {
                    height: 475,
                    type: 'radialBar',
                    offsetY: -20,
                    sparkline: {
                        enabled: true
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 260
                        },

                    }
                }],
                plotOptions: {
                    radialBar: {
                        startAngle: -90,
                        endAngle: 90,
                        track: {
                            background: "#e7e7e7",
                            strokeWidth: '97%',
                            margin: 5, // margin is in pixels
                        },
                        dataLabels: {
                            name: {
                                show: true
                            },
                            value: {
                                offsetY: -50,
                                fontSize: '20px'
                            }
                        }
                    }
                },
                grid: {
                    padding: {
                        top: -10
                    }
                },
                colors: [style.backgroundColor],
                labels: ['Progress'],
            };
            var chart = new ApexCharts(document.querySelector("#milestone-chart"), options);
            chart.render();
        })();


        var options = {
            series: <?php echo json_encode($arrProcessPer_status_task); ?>,
            chart: {
                width: 380,
                type: 'pie',
            },
            colors: <?php echo json_encode($chartData['color']); ?>,
            labels: <?php echo json_encode($arrProcess_Label_status_tasks); ?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'

                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();



        var options = {
            series: [{
                data: <?php echo json_encode($arrProcessPer_priority); ?>

            }],
            chart: {
                height: 210,
                type: 'bar',
            },
            colors: ['#6fd943', '#ff3a6e', '#3ec9d6'],
            plotOptions: {
                bar: {

                    columnWidth: '50%',
                    distributed: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true
            },
            xaxis: {
                categories: <?php echo json_encode($arrProcess_Label_priority); ?>,
                labels: {
                    style: {
                        colors: <?php echo json_encode($chartData['color']); ?>,

                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart_priority"), options);
        chart.render();



        ///=====================Hour Chart =============================================================///


        var options = {
            series: [{
                data: [<?php echo json_encode($esti_logged_hour_chart); ?>, <?php echo json_encode($logged_hour_chart); ?>],

            }],
            chart: {
                height: 210,
                type: 'bar',
            },
            colors: ['#963aff', '#ffa21d'],
            plotOptions: {
                bar: {
                    horizontal: true,
                    columnWidth: '30%',
                    distributed: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true
            },
            xaxis: {
                categories: ["Estimated Hours", "Logged Hours "],

            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-hours"), options);
        chart.render();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/project_report/show.blade.php ENDPATH**/ ?>