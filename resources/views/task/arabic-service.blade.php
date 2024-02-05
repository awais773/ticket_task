<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title> Task Ticket Software</title>
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
                    <li><a class="dropdown-item" href="{{ url('service') }}">English </a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            لغة
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{ url('service') }}">English <img
                                        src="assets/image/usa.jpeg" class="img-fluid flag-icon" alt="" /></a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('arabic-service') }}">Arabic <img
                                        src="assets/image/suadi.jpeg" class="img-fluid flag-icon" alt="" /></a>
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
                    {{-- <h2>خدماتنا</h2> --}}
                    <h2></h2>
                    <ol>
                        <li><a href="index.html">بيت</a></li>
                        <li>خدماتنا</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Our Services Section -->

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

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
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

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box icon-box-green">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">وصول متعدد المستخدمين</a></h4>
                            <p class="description" style=" text-align: justify;">
                                قم بدعوة المستخدمين ومنحهم إمكانية الوصول إلى المشاريع ومساحات العمل المختلفة. سوف تقوم
                                علامة تبويب المستخدم
                                تقديم معلومات موجزة عن مشاريع ومهام كل مستخدم. يمكنك دائمًا إضافة أ
                                مستخدم جديد وإزالة مستخدم غير ضروري عند الاقتضاء.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
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
                                <h5 class="card-title"><a href="#">مهمتنا</a></h5>
                                <p class="card-text" style=" text-align: justify;">
                                    "في جوهر مهمتنا في إدارة تذكرة المهام، يوجد أ
                                    الالتزام بتعزيز الكفاءة التشغيلية وتعزيزها
                                    تعاون سلس.
                                </p>
                                <div class="read-more">
                                    <a href="#"><i class="bi bi-arrow-right"></i> اقرأ أكثر</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/image/contact.jpeg" alt="..." />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">خطتنا</a></h5>
                                <p class="card-text" style=" text-align: justify;">
                                    "في قلب استراتيجية تذكرة المهام لدينا تكمن أ
                                    خطة شاملة مصممة لإحداث ثورة في كيفية عمل الفرق
                                    إدارة سير العمل الخاص بهم.
                                </p>
                                <div class="read-more">
                                    <a href="#"><i class="bi bi-arrow-right"></i>اقرأ أكثر</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/image/working.jpg" alt="..." />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">رؤيتنا</a></h5>
                                <p class="card-text" style=" text-align: justify;">
                                    "في طليعة رؤيتنا لإدارة تذاكر المهام
                                    هو الطموح لإعادة تعريف كيفية تنقل المنظمات
                                    سير عملهم.
                                </p>
                                <div class="read-more">
                                    <a href="#"><i class="bi bi-arrow-right"></i> اقرأ أكثر</a>
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
                                <h5 class="card-title"><a href="#">رعايتنا</a></h5>
                                <p class="card-text" style=" text-align: justify;">
                                    "إن جوهر التزامنا بإدارة تذاكر المهام هو
                                    التفاني في خدمة العملاء الذي يتجاوز المعتاد.
                                </p>
                                <div class="read-more">
                                    <a href="#"><i class="bi bi-arrow-right"></i> اقرأ أكثر</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Service Details Section -->

        <!-- End Pricing Section -->
    </main>
    <!-- End #main -->

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
                            <strong>بريد إلكتروني:</strong> info@its-gate.com<br />
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
