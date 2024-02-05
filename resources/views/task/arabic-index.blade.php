<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Task Ticket Software</title>
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
    <!-- Loader -->
    {{-- <div class="loader-wrapper">
        <div class="loader"></div>
    </div> --}}
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
                    <li><a class="dropdown-item" href="{{ url('index') }}">English</a></li>
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            لغة
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{ url('index') }}">English <img
                                        src="assets/image/usa.jpeg" class="img-fluid flag-icon" alt="" /></a></li>
                            <li><a class="dropdown-item" href="{{ url('arabic-index') }}">Arabic <img src="assets/image/suadi.jpeg" class="img-fluid flag-icon"
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

    <!-- ======= Hero Section ======= -->
    <!-- <section id="hero" class="d-flex justify-cntent-center align-items-center">
   </section> -->

    <section id="hero" class="d-flex justify-content-center align-items-center"
        style="direction: rtl; text-align: right;">
        <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">مرحبا بك في <span>تذكرة المهمة</span></h2>
                    <p class="animate__animated animate__fadeInUp" style=" text-align: justify;">تذكرة، وجهتك النهائية
                        لإدارة المهام والتعاون بسلاسة. انضم إلينا في أ
                        رحلة الإنتاجية والكفاءة كما لم يحدث من قبل.
                        بوابتك لإدارة المهام بكفاءة والتعاون السلس.
                        استكشف منصتنا البديهية المصممة لتبسيط سير عملك وتعزيز الإنتاجية.
                    </p>
                    <div class="button-container animate__animated animate__fadeInUp" style="padding-top: 40px">
                        <a href="#feature" class="btn-get-started bordered-button">عرض حي<i
                                class="bi bi-arrow-right"></i></a>
                        <a href="#plan" class="btn-get-started bordered-button">اشتري الآن</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">
                        تسجيل دخول عميل منفصل</h2>
                    <p class="animate__animated animate__fadeInUp" style=" text-align: justify;">رفع مستوى المستخدم
                        تجربة مع بوابات وصول العملاء المخصصة. تعزيز العلاقات مع العملاء من خلال العرض
                        التفاعل الشخصي والوصول الآمن إلى المعلومات. تمكين العملاء من إدارة حساباتهم
                        بسلاسة وكفاءة.

                    </p>
                    <div class="button-container animate__animated animate__fadeInUp" style="padding-top: 40px">
                        <a href="#feature" class="btn-get-started bordered-button">عرض حي <i
                                class="bi bi-arrow-right"></i></a>
                        <a href="#plan" class="btn-get-started bordered-button">اشتري الآن</a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">أطلق العنان للمستقبل مع تذكرة المهام</h2>
                    <p class="animate__animated animate__fadeInUp" style=" text-align: justify;">
                        قم بإحداث ثورة في إدارة سير العمل لديك من خلال الميزات المتطورة والتصميم البديهي.
                        استمتع بكفاءة وتعاون لا مثيل لهما كما لم يحدث من قبل. احتضان الابتكار و
                        رفع الإنتاجية إلى آفاق جديدة.
                    </p>
                    <div class="button-container animate__animated animate__fadeInUp" style="padding-top: 40px">
                        <a href="#feature" class="btn-get-started bordered-button">عرض حي<i
                                class="bi bi-arrow-right"></i></a>
                        <a href="#plan" class="btn-get-started bordered-button">اشتري الآن</a>
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
        <section class="services" style="direction: rtl; text-align: right;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="icon-box icon-box-pink">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">لوحة تحكم فعالة</a></h4>
                            <p class="description" style=" text-align: justify;">
                                احصل على نظرة عامة على العدد الإجمالي للمشاريع والمهام والأخطاء والأعضاء. بصرية
                                يمكن أن يساعدك تمثيل نظرة عامة على المهمة وحالة المشروع في تقدير
                                التقدم في كل مهمة. وأخيرا، يمكنك التحقق من المهمة المستحقة العليا.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="icon-box icon-box-cyan">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">حل الأخطاء</a></h4>
                            <p class="description" style=" text-align: justify;">
                                إنشاء أخطاء جديدة وتعيين المستخدمين والأولوية لهم. يمكنك كتابة ملاحظة في النص
                                مربع لوصف الخلل. كما يمكن تغيير حالة كل خطأ من خلال
                                نظام منسدل سهل ونظام سحب كانبان.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="icon-box icon-box-green">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">وصول متعدد المستخدمين</a></h4>
                            <p class="description" style=" text-align: justify;">
                                قم بدعوة المستخدمين ومنحهم إمكانية الوصول إلى المشاريع ومساحات العمل المختلفة. سوف تقوم علامة تبويب المستخدم
                                تقديم معلومات موجزة عن مشاريع ومهام كل مستخدم. يمكنك دائمًا إضافة أ
                                مستخدم جديد وإزالة مستخدم غير ضروري عند الاقتضاء.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="icon-box icon-box-blue">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href=""> إدارة الفواتير</a></h4>
                            <p class="description" style=" text-align: justify;">
                                إنشاء فواتير للمشاريع عن طريق تعيين الإصدارات وتواريخ الاستحقاق. عليك أن تحدد
                                الخصومات والضرائب على راحتك. حدد العميل الذي تقوم بإنشائه
                                فاتورة. يمكنك تعديل الفاتورة عن طريق إضافة وإزالة العناصر. طباعة الفاتورة مع أ
                                موضوع ولون مختلف..
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
                        <img src="assets/image/about1.jpeg" class="img-fluid" alt="" />
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4"
                            data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center p-5" style="text-align: right;">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-fingerprint"></i></div>
                            <h4 class="title"><a href="">أداة إدارة المشاريع</a></h4>
                            <p class="description" style=" text-align: justify;">
                                الحل الشامل الخاص بك لتبسيط تخطيط المشروع وتنفيذه ومراقبته.
                                قم بإدارة المهام والمواعيد النهائية والتعاون الجماعي بسهولة في مركز واحد
                                منصة. ابق منظمًا، وعزز الإنتاجية، وحقق نجاح المشروع باستخدام أدوات قوية
                                ميزات إدارة المشروع. استمتع بالتنسيق والكفاءة السلسة منذ البداية
                                لانهاء.
                            </p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-gift"></i></div>
                            <h4 class="title">
                                <a href="">أداة إدارة مشروع تذكرة SaaS</a>
                            </h4>
                            <p class="description" style=" text-align: justify;">
                                قم بتمكين فريقك من خلال حل ديناميكي قائم على السحابة لمشروع سلس
                                تنسيق. يمكنك تبسيط المهام وتعزيز التعاون وتتبع التقدم دون عناء.
                                قم بإحداث ثورة في تجربة إدارة مشروعك باستخدام SaaS المبتكر من Tasks Ticket
                                منصة.
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
                <div class="section-title" id="feature" style="direction: rtl; text-align: right;">
                    <h2 style="text-align: center">سمات</h2>
                    <p style=" text-align: center;">
                        استكشف إمكانيات تعيين المهام القوية وواجهة المستخدم البديهية. خبرة
                        تكامل سلس وخيارات قابلة للتخصيص لتعزيز الإنتاجية.
                    </p>
                </div>

                <div class="row" data-aos="fade-up" style="direction: rtl; text-align: right;">
                    <div class="col-md-5">
                        <img src="assets/image/Feature1.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-4">
                        <h3>تسجيل دخول منفصل لصاحب العمل</h3>
                        <p class="fst-italic" style=" text-align: justify;">
                            منح أصحاب العمل حق الوصول الحصري لإدارة مهام فريقهم بكفاءة. تعزيز الأمن
                            والتحكم في بيانات المشروع باستخدام بيانات اعتماد تسجيل الدخول المخصصة. تبسيط الاتصالات و
                            تحسين مراقبة سير العمل من خلال حسابات أصحاب العمل المنفصلة. تمكين أصحاب العمل من التتبع
                            التقدم وتخصيص المهام وضمان نجاح المشروع بكل سهولة.
                        </p>
                        {{-- <ul>
                            <li>
                                <i class="bi bi-check"></i> إنشاء قاعدة بيانات لتخزينها
                                معلومات صاحب العمل.
                            </li>
                            <li>
                                <i class="bi bi-check"></i> تنفيذ مستخدم آمن
                                نظام المصادقة لتسجيلات دخول صاحب العمل.
                            </li>
                        </ul> --}}
                    </div>
                </div>


                <div class="row" data-aos="fade-up" style="direction: rtl; text-align: right;">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="assets/image/Feature2.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1">
                        <h3 style="text-align: right;">
                            تسجيل دخول عميل منفصل
                        </h3>
                        <p class="fst-italic" style="text-align: right;" style=" text-align: justify;">
                        تزويد العملاء بإمكانية الوصول الآمن إلى تفاصيل مشروعهم وتحديثاته. يحسن
                            الشفافية والتواصل مع الحفاظ على السرية. تبسيط العميل
                            التعاون وتعزيز العلاقات الأقوى من خلال بوابات تسجيل الدخول المخصصة.
                        </p>


                    </div>
                </div>

                <div class="row" data-aos="fade-up" style="direction: rtl; text-align: right;">
                    <div class="col-md-5">
                        <img src="assets/image/Feature3.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-5" style="text-align: right;">
                        <h3 style="text-align: right;">
                            أطلق العنان للمستقبل مع <span>تذكرة المهمة</span>
                        </h3>
                        <p style="text-align: right;" style=" text-align: justify;">
                            استمتع بتجربة الميزات المتطورة المصممة لتحويل إدارة المهام. تسخير قوة
                            الابتكار لتبسيط سير العمل وتعزيز الإنتاجية. رفع مستوى التعاون مع
                            أدوات بديهية تتوقع كل احتياجاتك. احتضان مستقبل إدارة المهام و
                            افتح إمكانيات لا حدود لها باستخدام تذكرة المهام.
                        </p>
                        {{-- <ul style="text-align: right;">
                            <li>
                                <i class="bi bi-check"></i>
                                <span style="color: rgb(12, 119, 133)">:توقع الاحتياجات</span>
                                عروضنا تتجاوز الحاضر، وتتوقع و تلبية الاحتياجات المستقبلية، مما يجعل كل منتج تطلعي حل
                                مصمم خصيصًا لأنماط الحياة المتطورة.
                            </li>
                            <li>
                                <i class="bi bi-check"></i><span style="color: rgb(12, 119, 133)">الاستدامة:</span>
                                نحن ملتزمون بالممارسات المستدامة، مما يضمن أن أعمالنا تساهم التطورات في مستقبل بيئي
                                واعية ومسؤولة.
                            </li>
                        </ul> --}}
                    </div>
                </div>

                <div class="row" data-aos="fade-up" style="direction: rtl; text-align: right;">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="assets/image/Feature4.PNG" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1" style="text-align: right;">
                        <h3 style="text-align: right;">
                            ادارة مشروع
                        </h3>
                        <p class="fst-italic" style="text-align: right;">
                            إنشاء مشاريع جديدة وتعيين فرق لكل مشروع. أضف عدة أعضاء لمشاركة
                            المشاريع مع العملاء. يمكنك تحرير الأذونات وعناصر التحكم لإدارة وصول العميل. تعيين أ
                            الميزانية وإنشاء معالم للمشاريع. إرفاق التكلفة والملخص بالمعالم والتغيير
                            الحالة من خلال القائمة المنسدلة. احصل على علامة تبويب للأنشطة الأخيرة للمشروع وأيضًا
                            رسم بياني عن التقدم. إلى جانب ذلك، يمكنك التحقق من تفاصيل المهام الخاصة بك ضمن المشروع
                            التفاصيل بمساعدة مخطط جانت.
                        </p>

                    </div>
                </div>

            </div>
        </section>
        <!-- End Features Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Pricing Section ======= -->
    @include('task.pricing-main')

    <!-- End Pricing Section -->

    <!-- ======= Footer ======= -->
    {{-- <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
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
    </footer> --}}
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
