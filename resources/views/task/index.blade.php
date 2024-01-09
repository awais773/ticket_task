<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Task Ticket Index</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

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
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <h1 class="text-light">
                    <a href="index.html"><span>Task Ticket</span></a>
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
                    <li><a href="https://tickettask.fastnetstaffing.in/login">Login</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- <section id="hero" class="d-flex justify-cntent-center align-items-center">
y    </section> -->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="margin-top: 80px;">
        <div class="carousel-inner">
            <div class="carousel-item active section-slider">
                <div class="row">
                    <!-- Left side content (6 columns) -->
                    <div class="col-md-6 col-12">
                        <div
                            class="col-md-3 carousel-caption d-block d-md-block text-warning section-detail opacity-content">
                            <h2 class="animate__animated animate__fadeInDown" style="color: #086ad8">
                                Welcome to <span>Task Ticket</span>
                            </h2>

                            <p class="animate__animated animate__fadeInUp"
                                style="text-align: justify; padding-top: 10px">
                                Welcome to Task Ticket, where innovation meets elegance. Our
                                commitment is to provide you with cutting-edge solutions and
                                products that redefine your experience. At Task Ticket, we
                                understand the importance of blending style with
                                functionality, creating a seamless harmony between form and
                                purpose. As you embark on this journey with us, expect nothing
                                short of excellence in every detail.
                            </p>

                            <div class="button-container animate__animated animate__fadeInUp" style="padding-top: 40px">
                                <a href="https://tickettask.fastnetstaffing.in/login"
                                    class="btn-get-started bordered-button">Live Demo <i
                                        class="bi bi-arrow-right"></i></a>
                                <a href="#pricing_plan" class="btn-get-started bordered-button">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Right side image (6 columns) -->
                    <div class="col-md-6 col-12">
                        <img src="assets/image/Feature11.PNG" class="img-fluid" alt="Responsive image"
                            style="width: 100%; height: 600px" />
                    </div>
                </div>
            </div>

            <!-- slider 2  -->
            <div class="carousel-item section-slider">
                <div class="row">
                    <!-- Left side content (6 columns) -->
                    <div class="col-md-6 col-12">
                        <div
                            class="col-md-3 carousel-caption d-block d-md-block text-warning section-detail opacity-content">
                            <h2 class="animate__animated animate__fadeInDown" style="color: #086ad8">
                                "Elevate Your Lifestyle with Task Ticket Excellence"
                            </h2>
                            <p class="animate__animated animate__fadeInUp"
                                style="text-align: justify; padding-top: 10px">
                                Discover a world where sophistication meets innovation and
                                immerse yourself in the epitome of modern living with Task
                                Ticket. Our commitment to excellence is woven into every
                                product, offering you a lifestyle that transcends the
                                ordinary.
                            </p>

                            <div class="button-container animate__animated animate__fadeInUp" style="padding-top: 40px">
                                <a href="https://tickettask.fastnetstaffing.in/login"
                                    class="btn-get-started bordered-button">Live Demo <i
                                        class="bi bi-arrow-right"></i></a>
                                <a href="#pricing_plan" class="btn-get-started bordered-button">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Right side image (6 columns) -->
                    <div class="col-md-6 col-12">
                        <img src="./assets/image/Feature9.PNG" class="img-fluid" alt="Responsive image"
                            style="width: 100%; height: 600px" />
                    </div>
                </div>
            </div>
            <!-- slider 3  -->

            <div class="carousel-item section-slider">
                <div class="row">
                    <!-- Left side content (6 columns) -->
                    <div class="col-md-6 col-12">
                        <div
                            class="col-md-3 carousel-caption d-block d-md-block text-warning section-detail opacity-content">
                            <h2 class="animate__animated animate__fadeInDown" style="color: #086ad8">
                                "Innovative Solutions, Timeless Elegance, The Task Ticket
                                Experience"
                            </h2>
                            <p class="animate__animated animate__fadeInUp"
                                style="text-align: justify; padding-top: 10px">
                                At Task Ticket, we invite you to immerse yourself in a world
                                where innovative solutions and timeless elegance converge to
                                redefine your lifestyle. Our commitment to excellence is
                                embodied in every product, offering you a unique and
                                unparalleled experience.
                            </p>
                            <!-- <div class="button-container animate__animated animate__fadeInUp">
          <a href="" class="btn-get-started">Live Demo</a>
          <a href="#pricing_plan" class="btn-get-started">Buy Now</a>
        </div> -->
                            <div class="button-container animate__animated animate__fadeInUp"
                                style="padding-top: 40px">
                                <a href="https://tickettask.fastnetstaffing.in/login"
                                    class="btn-get-started bordered-button">Live Demo <i
                                        class="bi bi-arrow-right"></i></a>
                                <a href="#pricing_plan" class="btn-get-started bordered-button">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Right side image (6 columns) -->
                    <div class="col-md-6">
                        <img src="./assets/image/Feature10.PNG" class="img-fluid" alt="Responsive image"
                            style="width: 100%; height: 600px" />
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span> -->
            <svg viewBox="0 0 24 24" fill="green" height="1.5em" width="1.5em">
                <path
                    d="M18.464 2.114a.998.998 0 00-1.033.063l-13 9a1.003 1.003 0 000 1.645l13 9A1 1 0 0019 21V3a1 1 0 00-.536-.886zM17 19.091L6.757 12 17 4.909v14.182z" />
            </svg>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <svg viewBox="0 0 24 24" fill="green" height="1.5em" width="1.5em">
                <path
                    d="M5.536 21.886a1.004 1.004 0 001.033-.064l13-9a1 1 0 000-1.644l-13-9A.998.998 0 005 3v18a1 1 0 00.536.886zM7 4.909L17.243 12 7 19.091V4.909z" />
            </svg>
        </button>
    </div>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="icon-box icon-box-pink">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">Feature</a></h4>
                            <p class="description">
                                Material Feature means any feature of a Plan that could
                                reasonably be expected to be of material importance to the
                                sponsoring employer or the participants and beneficiaries of
                                the Plan.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="icon-box icon-box-cyan">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Support</a></h4>
                            <p class="description">
                                Material Design is an adaptable system of guidelines,
                                components, and tools that support the best practices of user
                                interface design. Backed by open-source .
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="icon-box icon-box-green">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">Integration</a></h4>
                            <p class="description">
                                By adding integrations to your website, you remove the extra
                                steps or manpower required to complete a certain action. This
                                works for both the user and your team.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="icon-box icon-box-blue">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href="">Knowledge Base</a></h4>
                            <p class="description">
                                Establish a knowledge base or help center that goes beyond
                                FAQs. Provide in-depth articles, tutorials, and guides that
                                cover a range of topics related to your products or services.
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
                        <img src="assets/image/why-us.jpg" class="img-fluid" alt="" />
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4"
                            data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-fingerprint"></i></div>
                            <h4 class="title"><a href="">Project Management Tool</a></h4>
                            <p class="description">
                                Project management tools are specially designed to assist an
                                individual or team in managing their projects and tasks
                                effectively. The term “PM tools”’ usually refers to project
                                management software you can either purchase or use for free
                                online.
                            </p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-gift"></i></div>
                            <h4 class="title">
                                <a href="">Task Ticket SaaS Project Management Tool</a>
                            </h4>
                            <p class="description">
                                Confluence™ Is Your Remote-Friendly Team Workspace Where
                                Knowledge And Collaboration Meet. Collaborate On Projects And
                                Plans Across Teams, All In One Place With Confluence™. Try
                                Now. Streamline your Work.
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
                <div class="section-title">
                    <h2>Features</h2>
                    <p>
                        Material Feature means any feature of a Plan that could reasonably
                        be expected to be of material importance to the sponsoring
                        employer or the participants and beneficiaries of the Plan.
                    </p>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="assets/image/Feature1.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-4">
                        <h3>Separate Employer Login</h3>
                        <p class="fst-italic">
                            Intellectual property created during the course of an employee's
                            employment does not equate to the employer's automatic and
                            exclusive ownership of any and all intellectual property.
                        </p>
                        <ul>
                            <li>
                                <i class="bi bi-check"></i> Create a database to store
                                employer information.
                            </li>
                            <li>
                                <i class="bi bi-check"></i> Implement a secure user
                                authentication system for employer logins.
                            </li>
                        </ul>
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
                        <p class="fst-italic">
                            Set up a database to store client information securely. Include
                            fields such as client name, contact details, account credentials
                            (username and password), and any other relevant information.
                        </p>
                        <!-- <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum
              </p> -->
                        <ul>
                            <li><i class="bi bi-check"></i> User Registration</li>
                            <li><i class="bi bi-check"></i> Role-Based Access Control</li>
                            <li>
                                <i class="bi bi-check"></i> Terms of Service and Privacy
                                Policy
                            </li>
                            <li><i class="bi bi-check"></i> Security Measures</li>
                        </ul>
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="assets/image/Feature3.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-5">
                        <h3>Unleash the Future with <span>Task Ticket</span></h3>
                        <p>
                            <span>Innovation</span> Task Ticket is at the forefront of
                            cutting-edge technology, constantly introducing innovative
                            solutions that redefine the boundaries of what's possible.
                        </p>
                        <ul>
                            <li>
                                <i class="bi bi-check"></i>
                                <span style="color: rgb(12, 119, 133)">:Anticipation of Needs</span>
                                Our offerings go beyond the present, anticipating and
                                addressing future needs, making each product a forward-looking
                                solution tailored to evolving lifestyles.
                            </li>
                            <li>
                                <i class="bi bi-check"></i><span style="color: rgb(12, 119, 133)">
                                    Sustainability:</span>
                                We are committed to sustainable practices, ensuring that our
                                advancements contribute to a future that is environmentally
                                conscious and responsible.
                            </li>
                            <li>
                                <!-- <i class="bi bi-check"></i> Facilis ut et voluptatem aperiam.
                  Autem soluta ad fugiat. -->
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="assets/image/Feature4.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1">
                        <h3>Shaping Tomorrow's Lifestyle</h3>
                        <p class="fst-italic">
                            <span style="color: rgb(12, 119, 133)">
                                "Shaping Tomorrow's Lifestyle"</span>
                            embodies Task Ticket's commitment to curate a lifestyle that
                            transcends the ordinary.
                        </p>
                        <p>
                            At Task Ticket, we are dedicated to introducing innovations that
                            go beyond the present, anticipating the needs of tomorrow. Our
                            products and solutions are crafted with a forward-thinking
                            approach, combining cutting-edge technology with timeless
                            elegance.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Features Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Pricing Section ======= -->
@include('task.pricing')

    <!-- End Pricing Section -

  <!-- ======= Footer ======= -->
    <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Our Newsletter</h4>
                        <p>
                            "Our Newsletter" is a curated source of information designed to
                            keep our audience <br />informed and engaged.
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
                            M-19,Mega Tower Gulberg 3,<br />Lahore Pakistan<br /><br />
                            <strong>Phone:</strong> +92 3074914979<br />
                            <strong>Email:</strong> info@technolyte.com<br />
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>About Task Ticket</h3>
                        <p>
                            If "Task Ticket" is a term used in a particular context, such as
                            project management, software development, or another field, it
                            would be helpful to have more details to provide a more accurate
                            and relevant paragraph.
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
                Designed by <a href="https://technolyte.com/">TechnoLyte</a>
            </div>
        </div>
    </footer>
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
</body>

</html>
