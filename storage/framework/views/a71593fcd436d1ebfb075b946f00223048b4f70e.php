<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Task Ticket Software</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="icon" />
    <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon" />

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet" />

    <!-- Include compiled Bootstrap CSS -->

    <!-- Vendor CSS Files -->
    <link href="<?php echo e('frontend/vendor/animate.css/animate.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo e('frontend/vendor/aos/aos.css'); ?>" rel="stylesheet" />
    <link href="<?php echo e('frontend/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo e('frontend/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet" />
    <link href="<?php echo e('frontend/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo e('frontend/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo e('frontend/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet" />


    <!-- Template Main CSS File -->
    <link rel="stylesheet" type="text/css" href="<?php echo e('frontend/css/style.css'); ?>">

</head>

<body>
    <!-- Loader -->
    
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <h1 class="text-light">
                    
                    <img src="assets/image/company1.jpg" class="img-fluid" alt="" />
                    <a href="<?php echo e(url('index.html')); ?>"><span>Tasks Ticket</span></a>

                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="<?php echo e(Request::is('index') ? 'active' : ''); ?>" href="<?php echo e(url('index')); ?>">Home</a></li>
                    <li><a class="<?php echo e(Request::is('about') ? 'active' : ''); ?>" href="<?php echo e(url('about')); ?>">About</a>
                    </li>
                    <li><a class="<?php echo e(Request::is('service') ? 'active' : ''); ?>"
                            href="<?php echo e(url('service')); ?>">Services</a></li>
                    <!-- <li><a class="<?php echo e(Request::is('portfolio') ? 'active' : ''); ?>" href="<?php echo e(url('portfolio')); ?>">Portfolio</a></li> -->
                    <li><a class="<?php echo e(Request::is('pricing') ? 'active' : ''); ?>" href="<?php echo e(url('pricing')); ?>">Pricing
                            Plan</a></li>
                    <li><a class="<?php echo e(Request::is('contact') ? 'active' : ''); ?>" href="<?php echo e(url('contact')); ?>">Contact
                            Us</a></li>
                    <li><a class="<?php echo e(Request::is('') ? 'active' : ''); ?>"
                            href="<?php echo e(url('https://tickettask.fastnetstaffing.in/login')); ?>">Login</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="<?php echo e(url('arabic-index')); ?>">
                            Arabic</a>
                    </li>
                    


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- <section id="hero" class="d-flex justify-cntent-center align-items-center">
   </section> -->

    <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Tasks Ticket</span></h2>
                    <p class="animate__animated animate__fadeInUp" style=" text-align: justify;">Welcome to Tasks
                        Ticket, your ultimate destination for seamless task management and collaboration. Join us on a
                        journey of productivity and efficiency like never before.
                        Your gateway to efficient task management and seamless collaboration.
                        Explore our intuitive platform designed to streamline your workflow and boost productivity.
                    </p>
                    <div class="button-container animate__animated animate__fadeInUp" style="padding-top: 40px">
                        <a href="#feature" class="btn-get-started bordered-button">Live Demo <i
                                class="bi bi-arrow-right"></i></a>
                        <a href="#plan" class="btn-get-started bordered-button">Buy Now</a>
                    </div>
                    
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">
                        Separate Client Login</h2>
                    <p class="animate__animated animate__fadeInUp" style=" text-align: justify;"> Elevate user
                        experience with dedicated client access portals. Strengthen client relationships by offering
                        personalized interaction and secure information access. Empower clients to manage their accounts
                        seamlessly and efficiently.</p>
                    <div class="button-container animate__animated animate__fadeInUp" style="padding-top: 40px">
                        <a href="#feature" class="btn-get-started bordered-button">Live Demo <i
                                class="bi bi-arrow-right"></i></a>
                        <a href="#plan" class="btn-get-started bordered-button">Buy Now</a>
                    </div>

                    
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Unleash the Future with Tasks Ticket</h2>
                    <p class="animate__animated animate__fadeInUp" style=" text-align: justify;">
                        Revolutionize your workflow management with cutting-edge features and intuitive design.
                        Experience unparalleled efficiency and collaboration like never before. Embrace innovation and
                        elevate productivity to new heights.
                    <p>
                    <div class="button-container animate__animated animate__fadeInUp" style="padding-top: 40px">
                        <a href="#feature" class="btn-get-started bordered-button">Live Demo <i
                                class="bi bi-arrow-right"></i></a>
                        <a href="#plan" class="btn-get-started bordered-button">Buy Now</a>
                    </div>
                    
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="icon-box icon-box-pink">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">Efficient Dashboard</a></h4>
                            <p class="description" style=" text-align: justify;">
                                Get an overview of the total number of projects, tasks, bugs, and members. A visual
                                representation of the task overview and project status can help you estimate the
                                progress on each task. Lastly, you can check the top due task.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="icon-box icon-box-cyan">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Bugs Resolution</a></h4>
                            <p class="description" style=" text-align: justify;">
                                Create new bugs and assign users and priority to them. You can write a note in the text
                                box for the bug description. Also, the status of each bug could be changed through an
                                easy drop-down and Kanban drag system.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="icon-box icon-box-green">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">Multi-User Access</a></h4>
                            <p class="description" style=" text-align: justify;">
                                Invite users and give them access to various projects and workspaces. A user tab will
                                give brief information on the projects and tasks of each user. You could always add a
                                new user and remove an unnecessary user as and when required.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="icon-box icon-box-blue">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href="">Manage Invoices</a></h4>
                            <p class="description" style=" text-align: justify;">
                                Create invoices for projects by assigning issues and due dates. You get to specify
                                discounts and taxes at your convenience. Select the client you are generating an
                                invoice. You can edit the invoice by adding and removing items. Print the invoice with a
                                different theme and color.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Why Us Section ======= -->
        <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 video-box">
                        
                        <img src="assets/image/about1.jpeg" class="img-fluid" alt="..." />
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4"
                            data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-fingerprint"></i></div>
                            <h4 class="title"><a href="">Project Management Tool</a></h4>
                            <p class="description" style=" text-align: justify;">
                                Your all-in-one solution for streamlined project planning, execution, and monitoring.
                                Effortlessly manage tasks, deadlines, and team collaboration in one centralized
                                platform. Stay organized, boost productivity, and drive project success with powerful
                                project management features. Experience seamless coordination and efficiency from start
                                to finish.
                            </p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-gift"></i></div>
                            <h4 class="title">
                                <a href="">Tasks Ticket SaaS Project Management Tool</a>
                            </h4>
                            <p class="description" style=" text-align: justify;">
                                Empower your team with a dynamic, cloud-based solution for seamless project
                                coordination. Streamline tasks, enhance collaboration, and track progress effortlessly.
                                Revolutionize your project management experience with Tasks Ticket's innovative SaaS
                                platform.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Why Us Section -->

        <!-- ======= Features Section ======= -->
        <section class="features">
            <div class="container">
                <div class="section-title" id="feature">
                    <h2>Features</h2>
                    <p style=" text-align: justify;">
                        Explore the robust task assignment capabilities and intuitive user interface. Experience
                        seamless integration and customizable options for enhanced productivity.
                    </p>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="assets/image/Feature1.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-4">
                        <h3>Separate Employer Login</h3>
                        <p class="fst-italic" style=" text-align: justify;">
                            Grant employers exclusive access to manage their team's tasks efficiently. Enhance security
                            and control over project data with dedicated login credentials. Streamline communication and
                            optimize workflow oversight with separate employer accounts. Empower employers to track
                            progress, allocate tasks, and ensure project success with ease.

                        </p>
                        
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="assets/image/Feature2.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1">
                        <h3>
                            Separate Client Login
                        </h3>
                        <p class="fst-italic" style=" text-align: justify;">
                            Provide clients with secure access to their project details and updates. Enhance
                            transparency and communication while maintaining confidentiality. Streamline client
                            collaboration and foster stronger relationships with dedicated login portals.
                        </p>
                    </div>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="assets/image/Feature3.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-5">
                        <h3>Unleash the Future with <span>Task Ticket</span></h3>
                        <p style=" text-align: justify;">
                            Experience cutting-edge features designed to transform task management. Harness the power of
                            innovation to streamline workflows and boost productivity. Elevate collaboration with
                            intuitive tools that anticipate your every need. Embrace the future of task management and
                            unlock limitless possibilities with Task Ticket.
                        </p>
                        
                    </div>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="assets/image/Feature4.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1">
                        <h3>Project Management</h3>
                        <p style="text-align:justify">
                            Create new projects and assign teams to each project. Add multiple members to share the
                            projects with clients. You can edit permissions and controls to manage client access. Set a
                            budget and create milestones for projects. Attach cost and summary to milestones and change
                            the status through the drop-down menu. Get a tab on recent activities of a project and also
                            a graph about progress. Along with that, you can check your tasks’ details under project
                            details with the help of the Gantt Chart.
                        </p>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Features Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Pricing Section ======= -->
    <?php echo $__env->make('task.pricing-main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- End Pricing Section -->

    <!-- ======= Footer ======= -->
    
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- new code  -->


    <!-- Vendor JS Files -->
    <script src="frontend/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="frontend/vendor/aos/aos.js"></script>
    <script src="frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="frontend/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="frontend/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="frontend/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="frontend/js/main.js"></script>
    <script>
        window.addEventListener('load', function() {
            // hide the loader when the page has finished loading
            document.querySelector('.loader-wrapper').style.display = 'none';
        });
    </script>
</body>

</html>
<style>
    .flag-icon {
        width: 20px;
        height: auto;
        margin-right: 5px;

    }
</style>
<?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/task/index.blade.php ENDPATH**/ ?>