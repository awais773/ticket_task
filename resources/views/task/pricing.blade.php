    @php
        use App\Models\Utility;
        $settings = \Modules\LandingPage\Entities\LandingPageSetting::settings();
        $logo = Utility::get_file('uploads/landing_page_image');
        $sup_logo = Utility::get_file('logo/');
        $adminSettings = Utility::getAdminPaymentSetting();

        $getseo = App\Models\Utility::getAdminPaymentSetting();
        $metatitle = isset($getseo['meta_title']) ? $getseo['meta_title'] : '';
        $metsdesc = isset($getseo['meta_desc']) ? $getseo['meta_desc'] : '';
        $meta_image = \App\Models\Utility::get_file('uploads/meta/');
        $meta_logo = isset($getseo['meta_image']) ? $getseo['meta_image'] : '';
        $get_cookie = Utility::getAdminPaymentSetting();

        $SITE_RTL = env('SITE_RTL');
        $setting = \App\Models\Utility::colorset();
        $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';
    @endphp
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Team - Task Ticket Bootstrap Template</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

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
                        <li><a class="{{ Request::is('index') ? 'active' : '' }}" href="{{ url('index') }}">Home</a>
                        </li>
                        <li><a class="{{ Request::is('about') ? 'active' : '' }}" href="{{ url('about') }}">About</a>
                        </li>
                        <li><a class="{{ Request::is('service') ? 'active' : '' }}"
                                href="{{ url('service') }}">Services</a></li>
                        <!-- <li><a class="{{ Request::is('portfolio') ? 'active' : '' }}" href="{{ url('portfolio') }}">Portfolio</a></li> -->
                        <li><a class="{{ Request::is('pricing') ? 'active' : '' }}"
                                href="{{ url('pricing') }}">Pricing
                                Plan</a></li>
                        <li><a class="{{ Request::is('contact') ? 'active' : '' }}"
                                href="{{ url('contact') }}">Contact
                                Us</a></li>
                        <li><a href="https://tickettask.fastnetstaffing.in/login">Login</a></li>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <!-- .navbar -->
            </div>
        </header>
        <!-- End Header -->

        <main id="main">



            <!-- ======= Pricing Section ======= -->
            @if ($settings['plan_status'])
                <section class="subscription bg-primary pricing section-bg" id="plan" data-aos="fade-up">
                    <div class="container">

                        <div class="row mb-2 justify-content-center">
                            <div class="col-xxl-6">
                                <div class="title text-center mb-4">
                                    <span class="d-block mb-2 fw-bold text-uppercase">Pricing</span>
                                    {{-- <h2 class="mb-4">{!! $settings['plan_heading'] !!}</h2> --}}
                                </div>
                            </div>
                        </div>

                        <div class="section-title">
                            <h2 class="mb-4">{!! $settings['plan_heading'] !!}</h2>
                            <p>
                                {!! $settings['plan_description'] !!}
                            </p>
                        </div>

                        <div class="row no-gutters">

                            <div class="col-lg-4 box">

                                <h3>Free</h3>
                                <h4>$0<span>per month</span></h4>
                                <ul class="list-unstyled my-3">


                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_workspaces'])) --}}
                                            <input class="form-check-input input-primary" type="checkbox"
                                                id="customCheckc1"
                                                {{ $settings['free'][0]['max_workspaces'] != 0 ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="customCheckc1">{{ $settings['free'][0]['max_workspaces'] }}
                                                Workspaces</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>



                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_users'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['free'][0]['max_users'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['free'][0]['max_users'] }}
                                                    User Per Workspace</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>


                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_clients'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['free'][0]['max_clients'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['free'][0]['max_clients'] }}
                                                    Clients Per Workspace</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_projects'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['free'][0]['max_projects'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['free'][0]['max_projects'] }}
                                                    Projects Per Workspace</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>


                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['storage_limit'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['free'][0]['storage_limit'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['free'][0]['storage_limit'] }}
                                                    Storage Limit</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['enable_chatgpt'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['free'][0]['enable_chatgpt'] == 'on' ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['free'][0]['enable_chatgpt'] == 'on' ? 'Enable' : 'Disable' }}
                                                    Chatgpt</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>

                                </ul>
                                {{-- <a href="#" class="get-started-btn">Get Started</a> --}}
                                <div class="d-grid">
                                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill">Start with
                                        Starter <i data-feather="log-in" class="ms-2"></i> </a>
                                </div>
                            </div>
                                 {{-- Business code here --}}
                            {{-- <div class="col-lg-4 box featured">
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
                            </div> --}}
                            <div class="col-lg-4 box">

                                <h3>Business</h3>
                                <h4>$0<span>per month</span></h4>
                                <ul class="list-unstyled my-3">


                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_workspaces'])) --}}
                                            <input class="form-check-input input-primary" type="checkbox"
                                                id="customCheckc1"
                                                {{ $settings['business'][0]['max_workspaces'] != 0 ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="customCheckc1">{{ $settings['business'][0]['max_workspaces'] }}
                                                Workspaces</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>



                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_users'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['business'][0]['max_users'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['business'][0]['max_users'] }}
                                                    User Per Workspace</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>


                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_clients'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['business'][0]['max_clients'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['business'][0]['max_clients'] }}
                                                    Clients Per Workspace</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_projects'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['business'][0]['max_projects'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['business'][0]['max_projects'] }}
                                                    Projects Per Workspace</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>


                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['storage_limit'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['business'][0]['storage_limit'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['business'][0]['storage_limit'] }}
                                                    Storage Limit</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['enable_chatgpt'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['business'][0]['enable_chatgpt'] == 'on' ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['business'][0]['enable_chatgpt'] == 'on' ? 'Enable' : 'Disable' }}
                                                    Chatgpt</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>

                                </ul>
                                {{-- <a href="#" class="get-started-btn">Get Started</a> --}}
                                <div class="d-grid">
                                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill">Start with
                                        Starter <i data-feather="log-in" class="ms-2"></i> </a>
                                </div>
                            </div>

                            {{-- <div class="col-lg-4 box">
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
                            </div> --}}
                              <div class="col-lg-4 box">

                                <h3>Developer</h3>
                                <h4>$0<span>per month</span></h4>
                                <ul class="list-unstyled my-3">


                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_workspaces'])) --}}
                                            <input class="form-check-input input-primary" type="checkbox"
                                                id="customCheckc1"
                                                {{ $settings['developer'][0]['max_workspaces'] != 0 ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="customCheckc1">{{ $settings['developer'][0]['max_workspaces'] }}
                                                Workspaces</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>



                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_users'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['developer'][0]['max_users'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['developer'][0]['max_users'] }}
                                                    User Per Workspace</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>


                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_clients'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['developer'][0]['max_clients'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['developer'][0]['max_clients'] }}
                                                    Clients Per Workspace</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['max_projects'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['developer'][0]['max_projects'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['developer'][0]['max_projects'] }}
                                                    Projects Per Workspace</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>


                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['storage_limit'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['developer'][0]['storage_limit'] != 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['developer'][0]['storage_limit'] }}
                                                    Storage Limit</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check text-start">
                                            {{-- @if (isset($settings['enable_chatgpt'])) --}}
                                                <input class="form-check-input input-primary" type="checkbox"
                                                    id="customCheckc1"
                                                    {{ $settings['developer'][0]['enable_chatgpt'] == 'on' ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="customCheckc1">{{ $settings['developer'][0]['enable_chatgpt'] == 'on' ? 'Enable' : 'Disable' }}
                                                    Chatgpt</label>
                                            {{-- @endif --}}
                                        </div>
                                    </li>

                                </ul>
                                {{-- <a href="#" class="get-started-btn">Get Started</a> --}}
                                <div class="d-grid">
                                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill">Start with
                                        Starter <i data-feather="log-in" class="ms-2"></i> </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </section>
            @endif
            <!-- End Pricing Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="footer-newsletter">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Our Newsletter</h4>
                            <p>
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
                                M-19,Mega Tower Gulberg 3,<br>Lahore Pakistan<br /><br />
                                <strong>Phone:</strong> +92 3074914979<br />
                                <strong>Email:</strong>info@technolyte.com<br />
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-info">
                            <h3>About Task Ticket</h3>
                            <p>
                                If "Task Ticket" is a term used in a particular context, such as project management,
                                software development, or another field, it would be helpful to have more details to
                                provide a more accurate and relevant paragraph.
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

    </body>

    </html>
