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
                    <li><a class="{{ Request::is('') ? 'active' : '' }}" href="{{ url('https://tickettask.fastnetstaffing.in/login') }}">Login</a>
                    </li>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ url('arabic-contact') }}">
                            Arabic</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Language
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('contact') }}">English<img
                                        src="assets/image/usa.jpeg" class="img-fluid flag-icon" alt="" /> </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('arabic-contact') }}">
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
        <!-- ======= Contact Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Contact</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Contact</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

        <!-- ======= Contact Section ======= -->
        <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500"
            id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="bx bx-map" style="color: #1E4356; border:2px dotted #1E4356;"></i>
                                    <h3>Our Address</h3>
                                    <p>
                                        Kingdom of Saudi Arabia-Riyadh,<br />Al-Maiaz Area- P.O.Box 13573 Code.No.11414
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bx bx-envelope" style="color: #1E4356;border:2px dotted #1E4356;"></i>
                                    <h3>Email Us</h3>
                                    <p>info@its-gate.com</p>
                                    <p>info@its-gate.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bx bx-phone-call" style="color: #1E4356; border:2px dotted #1E4356;"></i>
                                    <h3>Call Us</h3>
                                    <p>+669 0504644445</p>
                                   <p>+669 920006409</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div id="notification-container" style="top: 20px; right: 20px; z-index: 1000;">
                            @if (session('success'))
                                <div class="alert alert-success" id="success-message">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger" id="error-message">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>

                        <form action="{{ url('submit_contact') }}" method="post" role="form"
                            class="php-email-form0909">
                            @csrf()

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        autocomplete="off" placeholder="Your Name" required />
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required />
                                </div>
                            </div>

                            <!-- 2nd row -->
                            <div class="row" style="margin-top: 10px">
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Your Phone Number" required />
                                </div>

                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Your Password" required />
                                </div>

                            </div>

                            <!-- end 2nd row -->
                            {{-- 3rd row --}}
                            <div class="row">

                                <div class="col-md-6 form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required />
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-3">
                                    <select class="form-select" aria-label="Default select example" name="package">
                                        <option value="" disabled selected>Select Package</option>
                                        <option value="1">Free</option>
                                        <option value="2">Business</option>
                                        <option value="3">Developer</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>

                            <div class="text-center my-5">
                                <button type="submit"
                                    style="color: #fff;background-color:#1E4356;border:none;padding:10px;border-radius:7px;">Send
                                    Message</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

        <!-- ======= Map Section ======= -->
        <section class="map mt-2">
            <div class="container-fluid p-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sbg!4v1579767901424!5m2!1sen!2sbg"
                    frameborder="0" style="border: 0" allowfullscreen=""></iframe>
            </div>
        </section>
        <!-- End Map Section -->
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
                          <br>  <strong>Phone:</strong> +669 0504644445<br />
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

    <script>
        // Wait for the document to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Check if success message exists
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                // If it exists, hide it after 5 seconds
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3000); // Adjust the time (in milliseconds) as needed
            }

            // Check if error message exists
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                // If it exists, hide it after 5 seconds
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 3000); // Adjust the time (in milliseconds) as needed
            }
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
