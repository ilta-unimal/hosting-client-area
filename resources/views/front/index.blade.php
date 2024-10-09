

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>ILTA Services - Layanan Cloud Terjangkau, Performa Maksimal </title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('front/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <!--[if lt IE 9]>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('front/images/loading.gif') }}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="text-left">
                              <img src="{{ asset('front/images/logo.png') }}" alt="{{ asset('front/images/logo.png') }}" class="w-75">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler mt-4" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto d-flex align-items-center">
                              <li class="nav-item active">
                                 <a class="nav-link" href="#">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#about"> About  </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#service"> Service</a>
                              </li>
                              @if (Auth::check())
                              <li class="nav-item bg-transparent">
                                 <div class="dropdown">
                                    <button class="nav-link dropdown-toggle bg-transparent" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <img src="https://ui-avatars.com/api/?background=F8F5FF&color=7239EA&bold=true&name={{ Auth::user()->name }}" class="rounded-circle w-25 mr-2" style="width: 35px !important" alt="image" />
                                       {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{ route('dashboard') }}">Client Area</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                    </div>
                                  </div>
                              </li>
                              @else
                                 <li class="nav-item">
                                    <a class="nav-link btn btn-light text-dark py-2" href="{{ route('login') }}">Sign-in</a>
                                 </li>
                              @endif
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
               <div class="col-md-6 my-5">
                  <div class="text-bg py-5">
                     <h1>Web Hosting<br> Internet of Things</h1>
                     <span>Mulai dari Rp. 25.000</span> <br>
                     <a href="{{ route('register') }}" class="mt-5">Mulai Sekarang</a>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="text-img">
                     <figure><img src="{{ asset('front/images/img.png') }}" /></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- Hosting -->
      <div id="about" class="hosting">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage pb-0">
                     <h2>About Us</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="web_hosting">
                     <p>
                        <span class="fw-bold">ILTA Service</span> 
                        merupakan bagian dari Kewirausahaan Informatics Laboratory Technical Assistant Universitas Malikussaleh <br>
                        Kami menyediakan berbagai layanan, termasuk penyediaan hosting yang cepat dan aman, layanan cloud untuk penyimpanan data yang fleksibel, serta perbaikan laptop dan komputer oleh tim teknisi profesional kami. <br>
                        Selain itu, kami juga menawarkan pembuatan situs web dan perangkat lunak yang disesuaikan dengan kebutuhan bisnis Anda. Dengan komitmen terhadap kualitas dan kepuasan pelanggan.   

                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end Hosting -->
      <!-- Services  -->
      <div id="service" class="Services">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="titlepage">
                         <h2>Layanan Terbaik</h2>
                         <p>Kami menyediakan berbagai layanan menarik untuk memenuhi kebutuhan digital Anda.</p>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="Services-box">
                         <i><img src="{{ asset('front/images/service1.png') }}" alt="#" /></i>
                         <h3>Shared Hosting</h3>
                         <p>Hosting yang terjangkau dan handal, ideal untuk website pribadi atau usaha kecil dengan traffic sedang.</p>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="Services-box">
                         <i><img src="{{ asset('front/images/service2.png') }}" alt="#" /></i>
                         <h3>Iot Hosting</h3>
                         <p>Solusi hosting dengan server khusus tanpa limit yang memberikan performa terbaik untuk perangkat Iot Anda</p>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="Services-box">
                         <i><img src="{{ asset('front/images/service3.png') }}" alt="#" /></i>
                         <h3>MQTT</h3>
                         <p>Layanan MQTT untuk Mendukung Konektivitas Perangkat IoT Anda. dengan Stabilitas dan Kecepatan Optimal!</p>
                        </div>
                 </div>
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="Services-box">
                         <i><img src="{{ asset('front/images/service4.png') }}" alt="#" /></i>
                         <h3>VPS Hosting</h3>
                         <p>Virtual Private Server untuk kontrol lebih besar dan performa tinggi, cocok untuk aplikasi dengan kebutuhan khusus.</p>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="Services-box">
                         <i><img src="{{ asset('front/images/service5.png') }}" alt="#" /></i>
                         <h3>Cloud Hosting</h3>
                         <p>Hosting fleksibel dengan spesifikasi yang dapat diatur, cocok untuk skala besar dan performa tinggi</p>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="Services-box">
                         <i><img src="{{ asset('front/images/service6.png') }}" alt="#" /></i>
                         <h3>Cloud Storage</h3>
                         <p>Menawarkan layanan penyimpanan file berbasis next cloud dengan penyimpanan unlimited</p>
                     </div>
                 </div>
             </div>
         </div>
      </div>
      <!-- end Servicess -->
      <!-- why -->
      <div id="why" class="why pb-5">
         <div class="container pb-5">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Mengapa harus memilih kami?</h2>
                     <p>Kami menyediakan kemudahan bagi pengguna <br>dengan berbagai fitur dan keuntungan yang kami berikan <br></p>
                  </div>
               </div>
            </div>
            <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div id="box_ho" class="why-box">
                        <i><img src="{{ asset('front/images/why1.png') }}" alt="#" /></i>
                        <h3>Uptime 99.9%</h3>
                        <p>Jaminan waktu operasional yang hampir sempurna, memastikan bisnis Anda tetap berjalan tanpa gangguan dan selalu terhubung.</p>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="why-box">
                        <i><img src="{{ asset('front/images/why2.png') }}" alt="#" /></i>
                        <h3>Mudah Digunakan</h3>
                        <p>Antarmuka yang intuitif dan sederhana memungkinkan siapa saja untuk mulai menggunakan layanan kami tanpa kesulitan.</p>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="why-box">
                        <i><img src="{{ asset('front/images/why3.png') }}" alt="#" /></i>
                        <h3>Dukungan 24/7</h3>
                        <p>Tim dukungan kami selalu siap membantu Anda kapan saja, memastikan setiap pertanyaan dan masalah teratasi dengan cepat.</p>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      <footer>
         <div class="footer bg-white">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="titlepage ">
                        <p class="text-dark">2024 &copy ILTA-Services
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    
      </footer>

      <a href="https://wa.me/6281378065848" class="float" target="_blank">
         <i class="fa fa-whatsapp my-float"></i>
      </a>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{ asset('front/js/jquery.min.js') }}"></script>
      <script src="{{ asset('front/js/popper.min.js') }}"></script>
      <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('front/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('front/js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('front/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('front/js/custom.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>
