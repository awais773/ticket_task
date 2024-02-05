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

                    <li><a class="dropdown-item" href="{{ url('about') }}">English</a></li>
                    {{-- <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        لغة
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('about') }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ url('arabic-about') }}">Arabicss</a></li>
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
        {{-- <div class="loader"></div> --}}

        <!-- ======= About Us Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    {{-- <h2>معلومات عنا</h2> --}}
                    <h2></h2>
                    <ol>
                        <li><a href="index.html">بيت</a></li>
                        <li>معلومات عنا</li>
                    </ol>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= About Section ======= -->
        <section class="about" data-aos="fade-up">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="assets/image/team1.jpeg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" style="direction: rtl; text-align: right;">
                        <!-- <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3> -->
                        <h3>حول تذكرة المهام</h3>
                        <p class="fst-italic" style=" text-align: justify;">
                            مرحبًا بك في موقع تذاكر المهام. من خلال الوصول إلى هذا الموقع، فإنك توافق على الالتزام و
                            تكون ملزمة بشروط وأحكام الاستخدام التالية.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i>إذا كنت لا توافق على أي جزء من هذه الشروط، من فضلك
                                لا تستخدم موقعنا. </li>
                            <li><i class="bi bi-check2-circle"></i>محتوى صفحات هذا الموقع هو لك
                                معلومات عامة والاستخدام فقط.</li>
                            <li><i class="bi bi-check2-circle"></i> أنه يخضع للتغيير دون إشعار.</li>
                        </ul>
                        <p style=" text-align: justify;">
                            هذا الموقع يستخدم الكوكيز لمراقبة تفضيلات التصفح. إذا سمحت بوجود ملفات تعريف الارتباط
                            المستخدمة، قد يتم تخزين المعلومات الشخصية من قبلنا لاستخدامها من قبل أطراف ثالثة. لا نحن ولا
                            أي
                            تقدم الأطراف الثالثة أي ضمان أو ضمان فيما يتعلق بالدقة والتوقيت والأداء،
                            اكتمال أو ملاءمة المعلومات والمواد الموجودة أو المقدمة في هذا الشأن
                            موقع الويب لأي غرض معين.
                        </p>
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Facts Section ======= -->
        <section class="facts section-bg" data-aos="fade-up">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>العملاء</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>المشاريع</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>ساعات من الدعم</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>مجدون في العمل</p>
                    </div>

                </div>

            </div>
        </section><!-- End Facts Section -->

        <!-- ======= Our Skills Section ======= -->

        <section class="skills" data-aos="fade-up">
            <div class="container">

                <div class="section-title" style="text-align: right;">
                    <h2>مهاراتنا</h2>
                    <p style=" text-align: justify;">
                        "في مجال إدارة تذاكر المهام، امتلاك تنظيم واتصالات قويين
                        المهارات أمر بالغ الأهمية. - بارع في تصنيف المهام وتحديد أولوياتها بكفاءة، والأفراد
                        إظهار قدرة شديدة على التنقل عبر عدد لا يحصى من المسؤوليات بسلاسة.

                    </p>
                </div>

                <div class="skills-content" style="direction: rtl;">

                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100">
                            <span class="skill">لغة البرمجة <i class="val">مائة%</i></span>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                            aria-valuemax="100">
                            <span class="skill">CSS <i class="val">تسعون%</i></span>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                            aria-valuemax="100">
                            <span class="skill">جافا سكريبت <i class="val">خمسة وسبعون %</i></span>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                            aria-valuemax="100">
                            <span class="skill">محل تصوير <i class="val">خمسة وخمسون %</i></span>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- End Our Skills Section -->

        <section class="testimonials" data-aos="fade-up">
            <div class="container">

                <div class="section-title">
                    <h2>الشهادات - التوصيات</h2>
                    <p style=" text-align: center;">
                        "لقد أحدثت أنظمة إصدار التذاكر للمهام تحولًا كبيرًا في سير العمل لدينا، مما يوفر نظامًا مركزيًا
                        و
                        منصة فعالة لإدارة المهام بسلاسة.
                    </p>
                </div>

                <div class="testimonials-carousel swiper">
                    <div class="swiper-wrapper">
                        <div class="testimonial-item swiper-slide">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                alt="">
                            <h3>شاول جودمان
                            </h3>
                            <h4>المدير التنفيذي &amp; مؤسس</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                "لقد جربت العديد من المنتجات، ولكن لا شيء يضاهي [تذكرة المهمة]. لقد أذهلتني فعاليتها،
                                ولا أستطيع أن أتخيل حياتي بدونها الآن."
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>

                        <div class="testimonial-item swiper-slide">
                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                alt="">
                            <h3>سارة ويلسون</h3>
                            <h4>مصمم</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                "كنت متشككًا في البداية، ولكن [تذكرة المهمة] حققت بالفعل نتائج تفوق توقعاتي. إن اهتمامهم
                                بالتفاصيل ورضا العملاء لا مثيل له."

                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>

                        <div class="testimonial-item swiper-slide">
                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                alt="">
                            <h3>جينا كارليس</h3>
                            <h4>صاحب متجر</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                "لقد كنت أستخدم [تذكرة المهمة] منذ سنوات، وأنا معجب باستمرار باحترافيتهم والتزامهم
                                بالتميز."<i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>

                        <div class="testimonial-item swiper-slide">
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                alt="">
                            <h3>مات براندون</h3>
                            <h4>مستقل</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                "لا أستطيع أن أشكر الفريق الذي يقف وراء [تذكرة المهمة] بما يكفي لإنشاء مثل هذا الحل
                                الرائع. لقد جعل حياتي أسهل بكثير!"
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>

                        <div class="testimonial-item swiper-slide">
                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                alt="">
                            <h3>جون لارسون</h3>
                            <h4>مُقَاوِل</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                "منذ اللحظة التي بدأت فيها استخدام [تذكرة المهمة]، لاحظت اختلافًا كبيرًا. إن تفانيهم في
                                تحقيق رضا العملاء أمر يستحق الثناء حقًا."
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
        <!-- End Ttstimonials Section -->

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
