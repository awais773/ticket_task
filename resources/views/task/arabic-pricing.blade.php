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

     <title>Task Ticket Software</title>
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
     <!-- Loader -->
     <div class="loader-wrapper">
         <div class="loader"></div>
     </div>
     <!-- ======= Header ======= -->
     <header id="header" class="fixed-top d-flex align-items-center header-transparent"
         style="direction: rtl; text-align: right;">
         <div class="container d-flex justify-content-between align-items-center">
             <div class="logo">
                 <h1 class="text-light">
                     {{-- <a href="index.html"><span>Task Ticket</span></a> --}}
                     <img src="assets/image/company1.jpg" class="img-fluid" alt="" />
                     <a href="{{ url('index.html') }}"><span>تذكرة المهام</span></a>
                 </h1>
             </div>

             <nav id="navbar" class="navbar">
                 <ul>
                     <li><a class="{{ Request::is('index') ? 'active' : '' }}" href="{{ url('index') }}">بيت</a></li>
                     <li><a class="{{ Request::is('about') ? 'active' : '' }}" href="{{ url('about') }}">عن</a></li>
                     <li><a class="{{ Request::is('service') ? 'active' : '' }}" href="{{ url('service') }}">خدمات</a>
                     </li>
                     <li><a class="{{ Request::is('pricing') ? 'active' : '' }}" href="{{ url('pricing') }}">التسعير
                             يخطط</a></li>
                     <li><a class="{{ Request::is('contact') ? 'active' : '' }}" href="{{ url('contact') }}">اتصل
                             بنا</a></li>
                     <li><a class="{{ Request::is('') ? 'active' : '' }}" href="{{ url('contact') }}">تسجيل الدخول</a>
                     </li>
                     <li><a class="dropdown-item" href="{{ url('pricing') }}">English </a></li>
                     {{-- <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        لغة
                    </a>
                         <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{ url('pricing') }}">English <img
                                        src="assets/image/usa.jpeg" class="img-fluid flag-icon" alt="" /></a></li>
                            <li><a class="dropdown-item" href="{{ url('arabic-pricing') }}">Arabic <img src="assets/image/suadi.jpeg" class="img-fluid flag-icon"
                                        alt="" /></a></li>
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



         <!-- ======= Pricing Section ======= -->
         @if ($settings['plan_status'])
             <section class="subscription bg-primary pricing section-bg" id="plan" data-aos="fade-up"
                 style="background-color: #68A4C4!important;">
                 <div class="container">

                     <div class="row mb-2 justify-content-center">
                         <div class="col-xxl-6">
                             <div class="title text-center mb-4">
                                 <span class="d-block mb-2 fw-bold text-uppercase">التسعير</span>
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

                             <h3>حر</h3>
                             <h4>ریال 0<span>per month</span></h4>
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

                             <h3>عمل</h3>
                             <h4>ریال700<span>per month</span></h4>
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

                             <h3>مطور</h3>
                             <h4>ریال1200<span>per month</span></h4>
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
       <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500"
        style="direction: rtl; text-align: right;">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-lg-2">
                        <h4>نشرتنا الإخبارية</h4>
                        <p>
                            "النشرة الإخبارية لدينا" هي مصدر منظم للمعلومات مصمم للحفاظ على جمهورنا

                            <br>مطلعة ومتفاعلة.
                        </p>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <form action="" method="post">
                            <input type="email" name="email" /><input type="submit" value="يشترك" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>روابط مفيدة</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">بيت</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">معلومات عنا</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">خدمات</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">شروط الخدمة</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">سياسة الخصوصية</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>خدماتنا</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">تصميم الويب</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">تطوير الشبكة</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">ادارة المنتج</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">تسويق</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">التصميم الجرافيكي</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>اتصل بنا</h4>
                        <p>
                          المملكة العربية السعودية-الرياض,المعياز<br> المنطقة- ص.ب 13573 كود رقم 11414
                           <br> <strong>هاتف:</strong> 5444464050 669+<br />
                            <strong>بريد إلكتروني:</strong>  info@its-gate.com<br />
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>حول تذكرة المهمة</h3>
                        <p>
                            إذا كان "تذكرة المهمة" مصطلحًا يستخدم في سياق معين، مثل إدارة المشروع،
                            تطوير البرمجيات، أو أي مجال آخر، سيكون من المفيد الحصول على مزيد من التفاصيل لتقديمها
                            فقرة أكثر دقة وذات صلة.
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
                &copy; حقوق النشر <strong><span>تذكرة المهمة</span></strong>. كل الحقوق محفوظة
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
                صمم بواسطة <a href="https://its-gates.com/" target="_blank">أبوابها</a>
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
