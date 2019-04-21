<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LKSA BRAYAT PINUJI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/logo.jpg" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
    <!--==========================
  Header
  ============================-->
    @foreach ($abouts as $rec)
    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
                <a href="#intro" class="scrollto"><img src="img/profile_lksa/{{$rec->Logo_LKSA}}" alt="" class="img-fluid"></a>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#intro">Home</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#services">Program</a></li>
                    <li><a href="#portfolio">Galeri</a></li>
                    <li><a href="#contact">Kontak Kami</a></li>
                    <li>
                        <div class="flex-center position-ref full-height">
                            @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                <a href="{{ url('/home') }}">Dashboard</a>
                                @else
                                <a href="{{ route('login') }}">Login</a>
                                @endauth
                            </div>
                            @endif
                    </li>

                </ul>
            </nav><!-- .main-nav -->

        </div>
    </header><!-- #header -->

    <!--==========================
    Intro Section
  ============================-->

    <section id="intro" class="clearfix">
        <div class="container">

            <div class="intro-img">
                <img src="img/profile_lksa/{{$rec->Photo_about}}" alt="" class="img-fluid">
            </div>

            <div class="intro-info">
                <h2>{{$rec->Nama_LKSA}}</h2>
                <div>
                    <a href="#about" class="btn-get-started scrollto">Read More</a>
                    <a href="#services" class="btn-services scrollto">Program Kami</a>
                </div>
            </div>

        </div>
    </section><!-- #intro -->

    <main id="main">


        <!--==========================
      Tentang Kami Section
    ============================-->

        <section id="about">
            <div class="container">
                <header class="section-header">
                    <h3>Tentang Kami</h3>
                </header>
                <div class="row about-extra">
                    <div class="col-lg-6 content order-lg-1 order-2">
                        <h4>{{$rec->Title_about}}</h4>
                        <p>
                            {{$rec->Quote}}
                        </p>
                    </div>
                    <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
                        <img src="img/profile_lksa/{{$rec->Photo_about}}" class="img-fluid" alt="">
                    </div>
                </div>

                @foreach($profile_kegiatan as $kegiatan)
                <div class="row about-extra">
                    <div class="col-lg-6 wow fadeInUp">
                        <img src="img/profile_lksa/{{$kegiatan->Photo_kegiatan}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
                        <h4>{{$kegiatan->Title_kegiatan}}.</h4>
                        <p>
                            {{$kegiatan->Profile_kegiatan}}
                        </p>
                    </div>
                </div>
                @endforeach

                @foreach ($profile as $profile)
                <div class="row about-extra">
                    <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
                        <img src="img/profile_lksa/{{$profile->Photo_profiles}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
                        <h4>{{$profile->Title_profile}}</h4>
                        <p>
                            {{$profile->Profile}}
                        </p>

                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- #about -->
        @endforeach
        <!--==========================
      Services Section
    ============================-->
        <section id="services" class="section-bg">
            <div class="container">

                <header class="section-header">
                    <h3>Program</h3>
                </header>
                <div class="row">

                    <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
                            <h4 class="title"><a href="">Peningkatan Kepribadian Anak</a></h4>
                            <p class="description">Berharap menjadi anak remaja yang berkualitas</p>
                            <p class="description">Menjadi remaja yang penuh tangung jawab & memiliki pribadi yang utuh dan tangguh</p>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #e9bf06;"></i></div>
                            <h4 class="title"><a href="">Pendidikan</a></h4>
                            <p class="description">Sekolah dari TK, SD,SLTP, SLTA,PT</p>
                            <p class="description">Untuk meningkatkan kecerdasan dalam ilmu pengetahuan & social.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
                            <h4 class="title"><a href="">Peningkatan Pengetahuan Anak</a></h4>
                            <p class="description">Memberikan Bekal untuk masa depan anak serta keterampilan diluar akademik seperti musik dan berbahasa</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
                            <h4 class="title"><a href="">Mental & Spiritual</a></h4>
                            <p class="description">Agar anak semakin memiliki iman yang dalam dan kuat serta menyadarkan anak bahwa hidup ini merupakan anugerah Tuhan</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-world-outline" style="color: #d6ff22;"></i></div>
                            <h4 class="title"><a href="">Pembina yang Profesional</a></h4>
                            <p class="description">Melakukan kunjungan ke panti lain agar anak dapat menimba hal yang baru dan baik serta menjalin kerjasama dan persaudaraan</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-clock-outline" style="color: #4680ff;"></i></div>
                            <h4 class="title"><a href="">Peningkatan Kualitas Kerja</a></h4>
                            <p class="description"> Pertemuan rutin untuk meningkatkan kualitas kerja sehinggga dalam bekerja lebih semangat gembira dan tulus</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #services -->

        <!--==========================
      Portfolio Section
    ============================-->
        <section id="portfolio" class="clearfix">
            <div class="container">

                <header class="section-header">
                    <h3 class="section-title">Galeri Kami</h3>
                </header>

                <div class="row">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/app1.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="#">App 1</a></h4>
                                <p>App</p>
                                <div>
                                    <a href="img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/web3.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="#">Web 3</a></h4>
                                <p>Web</p>
                                <div>
                                    <a href="img/portfolio/web3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-wow-delay="0.2s">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/app2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="#">App 2</a></h4>
                                <p>App</p>
                                <div>
                                    <a href="img/portfolio/app2.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/card2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="#">Card 2</a></h4>
                                <p>Card</p>
                                <div>
                                    <a href="img/portfolio/card2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/web2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="#">Web 2</a></h4>
                                <p>Web</p>
                                <div>
                                    <a href="img/portfolio/web2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-wow-delay="0.2s">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/app3.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="#">App 3</a></h4>
                                <p>App</p>
                                <div>
                                    <a href="img/portfolio/app3.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/card1.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="#">Card 1</a></h4>
                                <p>Card</p>
                                <div>
                                    <a href="img/portfolio/card1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 1" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card" data-wow-delay="0.1s">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/card3.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="#">Card 3</a></h4>
                                <p>Card</p>
                                <div>
                                    <a href="img/portfolio/card3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 3" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.2s">
                        <div class="portfolio-wrap">
                            <img src="img/portfolio/web1.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="#">Web 1</a></h4>
                                <p>Web</p>
                                <div>
                                    <a href="img/portfolio/web1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 1" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- #portfolio -->


        <!--==========================
      Contact Section
    ============================-->
        <section id="contact">
            <div class="container-fluid">

                <div class="section-header">
                    <h3>Kontak Kami</h3>
                </div>

                <div class="row wow fadeInUp">

                    <div class="col-lg-6">
                        <div class="map mb-4 mb-lg-0">
                            <iframe src="https://maps.google.com/maps?q=brayat%20pinuji&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
                        </div>
                    </div>
                    @foreach ($contact as $kontak)
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-5 info">
                                <i class="ion-ios-location-outline"></i>
                                <p>{{$kontak->Alamat}}</p>
                            </div>
                            <div class="col-md-4 info">
                                <i class="ion-ios-email-outline"></i>
                                <p>{{$kontak->email}}</p>
                            </div>
                            <div class="col-md-3 info">
                                <i class="ion-ios-telephone-outline"></i>
                                <p>{{$kontak->Telp}}</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="form">
                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>
                            <form action="" method="post" role="form" class="contactForm">
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                </div>
                                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- #contact -->

    </main>

    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 footer-info">
                        <h2>LKSA BRAYAT PINUJI</h2>
                        <p>Panti Asuhan Brayat Pinuji adalah salah satu cabang karya sosial para suster OSF Semarang untuk anak-anak terlantar yang membutuhkan perawatan, gizi pendidikan dan tempat tinggal. Panti ini mulai dirintis pada tahun 1930 oleh Rm.J.B Prentahaler, Sj, yang berkembangsaan Austria sebagai seorang misionaris pertama di Boro dan sekitarnya. Bersama para Suter OSF dari Belanda.</p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        @foreach ($contact as $kontak)
                        <h4>Kontak Kami</h4>
                        <p>
                            {{$kontak->Alamat}} <br>
                            <strong>Phone:</strong> {{$kontak->Telp}}<br>
                            <strong>Email:</strong> {{$kontak->email}}<br>
                            <strong>Rekening</strong> {{$kontak->No_Rekening}}<br>
                        </p>
                        @endforeach

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Newsletter Kami</h4>
                        <p>Berita tentang kegiatan LKSA BRAYAT PINUJI BORO dapat didapatkan melalui Newsletter kami dengan cara mengisi email anda lalu klik tombol subscribe</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>LKSA BRAYAT PINUJI</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
        -->
            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <!-- <div id="preloader"></div> -->

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/mobile-nav/mobile-nav.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>

</body>

</html>