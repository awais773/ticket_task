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
    <?php echo e(__('Evaluation Report')); ?>

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
<div id="printableArea">
<div class="row">
    <h2 class="mb-0" style="text-align: center" ><?php echo e(__('Evaluation of  Employee')); ?></h2>
</div>
<br>
<br>
<div class="row">
    <p class="mb-0"><strong>Name: </strong>  <?php echo e($objUser->name); ?></p>
    <p class="mb-0"><strong>Email: </strong>  <?php echo e($objUser->email); ?></p>
</div>
<br>
<br>
<div class="row">
    <h5 class="mb-0"><?php echo e(__('Monthly Evaluation Report of  Employee')); ?></h5>
</div>
<canvas id="myChart" width="1000" height="300" ></canvas>
<br>

<div class="row">
    <div class="col-sm-8">
        <h5 class="mb-0"><?php echo e(__('Yearly Evaluation Report of  Employee')); ?></h5>
        <br>
        <div id="piechart_3d" style="width: 600px; height: 300px;"></div>
    </div>
    <div class="col-sm-4">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h5 class="mb-0"><?php echo e(__('Name Of Employee ......................')); ?></h5>
        <br>
        <br>
        <br>
        <br>
        <h5 class="mb-0"><?php echo e(__('Name Of Manager ........................')); ?></h5>

    </div>
    
</div>
<br>
<div class="row">
    <div class="col-sm-6">
        <br>
        <h5 class="mb-0"><?php echo e(__('Employee Signature ......................')); ?></h5>
        <br>
        <h5 class="mb-0"><?php echo e(__('Manager Signature ........................')); ?></h5>
    </div>
    <div class="col-sm-6">
        <br>
        <h5 class="mb-0"><?php echo e(__('Date Evulation ......................')); ?></h5>
        <br>
        <h5 class="mb-0"><?php echo e(__('Date Evulation ........................')); ?></h5>

    </div>
    
</div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>


    <script>
        // DATA FROM PHP TO JAVASCRIPT
        const projectEachTotalMonth = <?php echo json_encode($objUser->project_each_total_month ?? []); ?>;

        const months = <?php echo json_encode(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']); ?>;
        // const values = <?php echo json_encode([13, 33, 66, 45, 80, 25]); ?>;
        
        const values = months.map(month => projectEachTotalMonth[month] ?? 0);

    
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months, // Set the x-axis labels to all twelve months
                datasets: [{
                    label: '# of Reports',
                    data: values, // Set the y-axis values
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {       
          var data = google.visualization.arrayToDataTable([
                ['Task', 'Percentage'],
                ['Work', <?php echo $objUser->project_each_total_year; ?>],
                ['Sleep',<?php echo $objUser->project_each_year; ?>], 
                // Add more rows as needed
            ]);
    
            var options = {
                title: 'Yearly Evaluation Activities',
                is3D: true,
                slices: {
            0: { color: 'blue' }, // Color for 'Work'
            1: { color: 'gray' }, // Color for 'Sleep'
            // Add more slices as needed
        },
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/users_report/show.blade.php ENDPATH**/ ?>