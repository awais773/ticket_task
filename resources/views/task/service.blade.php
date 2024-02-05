<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Task Ticket Software</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
        rel="stylesheet" />

    <!-- Include compiled Bootstrap CSS -->

    <!-- Vendor CSS Files -->
    <link href="{{ 'frontend/vendor/animate.css/animate.min.css' }}" rel="stylesheet" />
    <link href="{{ 'frontend/vendor/aos/aos.css' }}" rel="stylesheet" />
    <link href="{{ 'frontend/vendor/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet" />
    <link href="{{ 'frontend/vendor/bootstrap-icons/bootstrap-icons.css' }}" rel="stylesheet" />
    <link href="{{ 'frontend/vendor/boxicons/css/boxicons.min.css' }}" rel="stylesheet" />
    <link href="{{ 'frontend/vendor/glightbox/css/glightbox.min.css' }}" rel="stylesheet" />
    <link href="{{ 'frontend/vendor/swiper/swiper-bundle.min.css' }}" rel="stylesheet" />


    <!-- Template Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ 'frontend/css/style.css' }}">

</head>

<body>
    <!-- Loader -->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <h1 class="text-light">
                    {{-- <a href="index.html"><span>Task Ticket</span></a> --}}
                    <img src="assets/image/company1.jpg" class="img-fluid" alt="" />
                    <a href="{{ url('index.html') }}"><span>Tasks Ticket</span></a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="{{ Request::is('index') ? 'active' : '' }}" href="{{ url('index') }}">Home</a></li>
                    <li><a class="{{ Request::is('about') ? 'active' : '' }}" href="{{ url('about') }}">About</a>
                    </li>
                    <li><a class="{{ Request::is('service') ? 'active' : '' }}"
                            href="{{ url('service') }}">Services</a></li>
                    <!-- <li><a class="{{ Request::is('portfolio') ? 'active' : '' }}" href="{{ url('portfolio') }}">Portfolio</a></li> -->
                    <li><a class="{{ Request::is('pricing') ? 'active' : '' }}" href="{{ url('pricing') }}">Pricing
                            Plan</a></li>
                    <li><a class="{{ Request::is('contact') ? 'active' : '' }}" href="{{ url('contact') }}">Contact
                            Us</a></li>
                    <li><a class="{{ Request::is('') ? 'active' : '' }}"
                            href="{{ url('https://tickettask.fastnetstaffing.in/login') }}">Login</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ url('arabic-service') }}">
                            Arabic</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Language
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('service') }}">English<img
                                        src="assets/image/usa.jpeg" class="img-fluid flag-icon" alt="" /> </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('arabic-service') }}">
                                    Arabic<img src="assets/image/suadi.jpeg" class="img-fluid flag-icon"
                                        alt="" /></a>
                            </li>
                        </ul>


                    </li> --}}

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= Our Services Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Our Services</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Our Services</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Our Services Section -->

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

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
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

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
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
                        {{-- <img src="assets/image/why-us.jpg" class="img-fluid" alt="" /> --}}
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

        <!-- ======= Service Details Section ======= -->
        <section class="service-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/image/team1.jpeg" alt="..." />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">Our Mission</a></h5>
                                <p class="card-text" style=" text-align: justify;">
                                    "At the core of our mission in task ticket management is a
                                    commitment to enhancing operational efficiency and fostering
                                    seamless collaboration.
                                </p>
                                <div class="read-more">
                                    <a href="#"><i class="bi bi-arrow-right"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="card">
                            <div class="card-img">
                                {{-- <img src="assets/image/team2.jpeg" alt="..." /> --}}
                                <img src="assets/image/contact.jpeg" alt="..." />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">Our Plan</a></h5>
                                <p class="card-text" style=" text-align: justify;">
                                    "At the heart of our task ticket strategy lies a
                                    comprehensive plan designed to revolutionize how teams
                                    manage their workflows.
                                </p>
                                <div class="read-more">
                                    <a href="#"><i class="bi bi-arrow-right"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/image/working.jpg  " alt="..." />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">Our Vision</a></h5>
                                <p class="card-text" style=" text-align: justify;">
                                    "At the forefront of our vision for task ticket management
                                    is the aspiration to redefine how organizations navigate
                                    their workflows.
                                </p>
                                <div class="read-more">
                                    <a href="#"><i class="bi bi-arrow-right"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/image/about1.jpeg" alt="..." />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">Our Care</a></h5>
                                <p class="card-text" style=" text-align: justify;">
                                    "At the core of our commitment to task ticket management is
                                    a dedication to customer care that goes beyond the ordinary.
                                </p>
                                <div class="read-more">
                                    <a href="#"><i class="bi bi-arrow-right"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Service Details Section -->

        <!-- ======= Pricing Section ======= -->
        <!-- <section class="pricing section-bg" data-aos="fade-up">
      <div class="container">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-4 box">
            <h3>Free</h3>
            <h4>$0<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
              <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
            </ul>
            <a href="#" class="get-started-btn">Get Started</a>
          </div>

          <div class="col-lg-4 box featured">
            <h3>Business</h3>
            <h4>$29<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
              <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
            </ul>
            <a href="#" class="get-started-btn">Get Started</a>
          </div>

          <div class="col-lg-4 box">
            <h3>Developer</h3>
            <h4>$49<span>per month</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
              <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
              <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
              <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
              <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
            </ul>
            <a href="#" class="get-started-btn">Get Started</a>
          </div>

        </div>

      </div>
    </section> -->
        <!-- End Pricing Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Our Newsletter</h4>
                        <p style=" text-align: justify;">
                            "Our Newsletter" is a curated source of information designed to keep our audience
                            <br>informed and engaged.
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <input type="email" name="email" /><input type="submit" value="Subscribe" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Home</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">About us</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Services</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Terms of service</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Privacy policy</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Web Design</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Web Development</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Product Management</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Marketing</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Graphic Design</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Contact Us</h4>
                        <p>
                            Kingdom of Saudi Arabia-Riyadh,<br />Al-Maiaz Area- P.O.Box 13573<br> Code.No.11414
                            <br> <strong>Phone:</strong> +669 0504644445<br />
                            <strong>Email:</strong> info@its-gate.com<br />
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>About Tasks Ticket</h3>
                        <p style=" text-align: justify;">
                            If "Task Ticket" is a term used in a particular context, such as project management,
                            software development, or another field, it would be helpful to have more details to provide
                            a more accurate and relevant paragraph.
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Task Ticket</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
                Designed by <a href="https://its-gates.com/" target="_blank">its-gates</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
