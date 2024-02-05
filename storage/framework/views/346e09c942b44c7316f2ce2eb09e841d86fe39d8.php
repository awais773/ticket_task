 <?php
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
 ?>
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
     <div class="loader-wrapper">
         <div class="loader"></div>
     </div>
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
                     <li><a class="<?php echo e(Request::is('index') ? 'active' : ''); ?>" href="<?php echo e(url('index')); ?>">Home</a>
                     </li>
                     <li><a class="<?php echo e(Request::is('about') ? 'active' : ''); ?>" href="<?php echo e(url('about')); ?>">About</a>
                     </li>
                     <li><a class="<?php echo e(Request::is('service') ? 'active' : ''); ?>"
                             href="<?php echo e(url('service')); ?>">Services</a></li>
                     <!-- <li><a class="<?php echo e(Request::is('portfolio') ? 'active' : ''); ?>" href="<?php echo e(url('portfolio')); ?>">Portfolio</a></li> -->
                     <li><a class="<?php echo e(Request::is('pricing') ? 'active' : ''); ?>" href="<?php echo e(url('pricing')); ?>">Pricing
                             Plan</a></li>
                     <li><a class="<?php echo e(Request::is('contact') ? 'active' : ''); ?>" href="<?php echo e(url('contact')); ?>">Contact
                             Us</a></li>
                     <li><a class="<?php echo e(Request::is('') ? 'active' : ''); ?>" href="<?php echo e(url('https://tickettask.fastnetstaffing.in/login')); ?>">Login</a>
                     </li>
                     </li>

                     <li>
                         <a class="dropdown-item" href="<?php echo e(url('arabic-pricing')); ?>">
                             Arabic</a>
                     </li>
                     

                 </ul>
                 <i class="bi bi-list mobile-nav-toggle"></i>
             </nav>
             <!-- .navbar -->
         </div>
     </header>
     <!-- End Header -->

     <main id="main">



         <!-- ======= Pricing Section ======= -->
         <?php if($settings['plan_status']): ?>
             <section class="subscription bg-primary pricing section-bg" id="plan" data-aos="fade-up"
                 style="background-color: #68A4C4!important;">
                 <div class="container">

                     <div class="row mb-2 justify-content-center">
                         <div class="col-xxl-6">
                             <div class="title text-center mb-4">
                                 <span class="d-block mb-2 fw-bold text-uppercase">Pricing</span>
                                 
                             </div>
                         </div>
                     </div>

                     <div class="section-title">
                         <h2 class="mb-4"><?php echo $settings['plan_heading']; ?></h2>
                         <p>
                             <?php echo $settings['plan_description']; ?>

                         </p>
                     </div>

                     <div class="row no-gutters">

                         <div class="col-lg-4 box">

                             <h3>Free</h3>
                             <h4>$0<span>per month</span></h4>
                             <ul class="list-unstyled my-3">


                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['free'][0]['max_workspaces'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['free'][0]['max_workspaces']); ?>

                                             Workspaces</label>
                                         
                                     </div>
                                 </li>



                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['free'][0]['max_users'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['free'][0]['max_users']); ?>

                                             User Per Workspace</label>
                                         
                                     </div>
                                 </li>


                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['free'][0]['max_clients'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['free'][0]['max_clients']); ?>

                                             Clients Per Workspace</label>
                                         
                                     </div>
                                 </li>

                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['free'][0]['max_projects'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['free'][0]['max_projects']); ?>

                                             Projects Per Workspace</label>
                                         
                                     </div>
                                 </li>


                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['free'][0]['storage_limit'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['free'][0]['storage_limit']); ?>

                                             Storage Limit</label>
                                         
                                     </div>
                                 </li>

                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['free'][0]['enable_chatgpt'] == 'on' ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['free'][0]['enable_chatgpt'] == 'on' ? 'Enable' : 'Disable'); ?>

                                             Chatgpt</label>
                                         
                                     </div>
                                 </li>

                             </ul>
                             
                             <div class="d-grid">
                                 <a href="<?php echo e(route('register')); ?>" class="btn btn-primary rounded-pill">Start with
                                     Starter <i data-feather="log-in" class="ms-2"></i> </a>
                             </div>
                         </div>
                         
                         
                         <div class="col-lg-4 box">

                             <h3>Business</h3>
                             <h4>$700<span>per month</span></h4>
                             <ul class="list-unstyled my-3">


                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['business'][0]['max_workspaces'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['business'][0]['max_workspaces']); ?>

                                             Workspaces</label>
                                         
                                     </div>
                                 </li>



                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['business'][0]['max_users'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['business'][0]['max_users']); ?>

                                             User Per Workspace</label>
                                         
                                     </div>
                                 </li>


                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['business'][0]['max_clients'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['business'][0]['max_clients']); ?>

                                             Clients Per Workspace</label>
                                         
                                     </div>
                                 </li>

                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['business'][0]['max_projects'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['business'][0]['max_projects']); ?>

                                             Projects Per Workspace</label>
                                         
                                     </div>
                                 </li>


                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['business'][0]['storage_limit'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['business'][0]['storage_limit']); ?>

                                             Storage Limit</label>
                                         
                                     </div>
                                 </li>

                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['business'][0]['enable_chatgpt'] == 'on' ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['business'][0]['enable_chatgpt'] == 'on' ? 'Enable' : 'Disable'); ?>

                                             Chatgpt</label>
                                         
                                     </div>
                                 </li>

                             </ul>
                             
                             <div class="d-grid">
                                 <a href="<?php echo e(route('register')); ?>" class="btn btn-primary rounded-pill">Start with
                                     Starter <i data-feather="log-in" class="ms-2"></i> </a>
                             </div>
                         </div>

                         
                         <div class="col-lg-4 box">

                             <h3>Developer</h3>
                             <h4>$1200<span>per month</span></h4>
                             <ul class="list-unstyled my-3">


                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['developer'][0]['max_workspaces'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['developer'][0]['max_workspaces']); ?>

                                             Workspaces</label>
                                         
                                     </div>
                                 </li>



                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['developer'][0]['max_users'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['developer'][0]['max_users']); ?>

                                             User Per Workspace</label>
                                         
                                     </div>
                                 </li>


                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['developer'][0]['max_clients'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['developer'][0]['max_clients']); ?>

                                             Clients Per Workspace</label>
                                         
                                     </div>
                                 </li>

                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['developer'][0]['max_projects'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['developer'][0]['max_projects']); ?>

                                             Projects Per Workspace</label>
                                         
                                     </div>
                                 </li>


                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['developer'][0]['storage_limit'] != 0 ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['developer'][0]['storage_limit']); ?>

                                             Storage Limit</label>
                                         
                                     </div>
                                 </li>

                                 <li>
                                     <div class="form-check text-start">
                                         
                                         <input class="form-check-input input-primary" type="checkbox"
                                             id="customCheckc1"
                                             <?php echo e($settings['developer'][0]['enable_chatgpt'] == 'on' ? 'checked' : ''); ?>>
                                         <label class="form-check-label"
                                             for="customCheckc1"><?php echo e($settings['developer'][0]['enable_chatgpt'] == 'on' ? 'Enable' : 'Disable'); ?>

                                             Chatgpt</label>
                                         
                                     </div>
                                 </li>

                             </ul>
                             
                             <div class="d-grid">
                                 <a href="<?php echo e(route('register')); ?>" class="btn btn-primary rounded-pill">Start with
                                     Starter <i data-feather="log-in" class="ms-2"></i> </a>
                             </div>
                         </div>

                     </div>

                 </div>
             </section>
         <?php endif; ?>
         <!-- End Pricing Section -->

     </main><!-- End #main -->

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
<?php /**PATH C:\xampp\htdocs\ticket_task\resources\views/task/pricing.blade.php ENDPATH**/ ?>