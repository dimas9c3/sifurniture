<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prototype Beranda SIFURNITURE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/frontend/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/frontend/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic-->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/frontend/css/fontastic.css">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/frontend/vendor/bootstrap-select/css/bootstrap-select.css">
    <!-- Google fonts - Poppins-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700">
    <!-- swiper carousel-->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/frontend/vendor/swiper/css/swiper.css">
    <!-- Gallery-->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/frontend/css/gallery.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/frontend/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/frontend/css/custom.css?version=51">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url();?>vendors/frontend/img/favicon.ico">
    <!-- Modernizr-->
    <style type="text/css">
        .timeline {
    position: relative;
    padding:4px 0 0 0;
    margin-top:22px;
    list-style: none;
}

.timeline>li:nth-child(even) {
    position: relative;
    margin-bottom: 50px;
    height: 180px;
    right:-100px;
}

.timeline>li:nth-child(odd) {
    position: relative;
    margin-bottom: 50px;
    height: 180px;
    left:-100px;
}

.timeline>li:before,
.timeline>li:after {
    content: " ";
    display: table;
}

.timeline>li:after {
    clear: both;
    min-height: 170px;
}

.timeline > li .timeline-panel {
  position: relative;
  float: left;
  width: 41%;
  padding: 0 20px 20px 30px;
  text-align: right;
}

.timeline>li .timeline-panel:before {
    right: auto;
    left: -15px;
    border-right-width: 15px;
    border-left-width: 0;
}

.timeline>li .timeline-panel:after {
    right: auto;
    left: -14px;
    border-right-width: 14px;
    border-left-width: 0;
}

.timeline>li .timeline-image {
    z-index: 100;
    position: absolute;
    left: 50%;
    border: 7px solid #3b5998;
    border-radius: 100%;
    background-color: #3b5998;
    box-shadow: 0 0 5px #4582ec;
    width: 200px;
    height: 200px;
    margin-left: -100px;
}

.timeline>li .timeline-image h4 {
    margin-top: 12px;
    font-size: 10px;
    line-height: 14px;
}

.timeline>li.timeline-inverted>.timeline-panel {
    float: right;
    padding: 0 30px 20px 20px;
    text-align: left;
}

.timeline>li.timeline-inverted>.timeline-panel:before {
    right: auto;
    left: -15px;
    border-right-width: 15px;
    border-left-width: 0;
}

.timeline>li.timeline-inverted>.timeline-panel:after {
    right: auto;
    left: -14px;
    border-right-width: 14px;
    border-left-width: 0;
}

.timeline>li:last-child {
    margin-bottom: 0;
}

.timeline .timeline-heading h4 {
  margin-top:22px;
    margin-bottom: 4px;
    padding:0;
    color: #b3b3b3;
}

.timeline .timeline-heading h4.subheading {
  margin:0;
  padding:0;
    text-transform: none;
    font-size:18px;
    color:#333333;
}

.timeline .timeline-body>p,
.timeline .timeline-body>ul {
    margin-bottom: 0;
    color:#808080;
}
/*Style for even div.line*/
.timeline>li:nth-child(odd) .line:before {
    content: "";
    position: absolute;
    top: 60px;
    bottom: 0;
    left: 690px;
    width: 4px;
    height:340px;
    background-color: #3b5998;
    -ms-transform: rotate(-44deg); /* IE 9 */
    -webkit-transform: rotate(-44deg); /* Safari */
    transform: rotate(-44deg);
    box-shadow: 0 0 5px #4582ec;
}
/*Style for odd div.line*/
.timeline>li:nth-child(even) .line:before  {
    content: "";
    position: absolute;
    top: 60px;
    bottom: 0;
    left: 450px;
    width: 4px;
    height:340px;
    background-color: #3b5998;
    -ms-transform: rotate(44deg); /* IE 9 */
    -webkit-transform: rotate(44deg); /* Safari */
    transform: rotate(44deg);
    box-shadow: 0 0 5px #4582ec;
}
/* Medium Devices, .visible-md-* */
@media (min-width: 992px) and (max-width: 1199px) {
  .timeline > li:nth-child(even) {
    margin-bottom: 0px;
    min-height: 0px;
    right: 0px;
  }
  .timeline > li:nth-child(odd) {
    margin-bottom: 0px;
    min-height: 0px;
    left: 0px;
  }
  .timeline>li:nth-child(even) .timeline-image {
    left: 0;
    margin-left: 0px;
  }
  .timeline>li:nth-child(odd) .timeline-image {
    left: 690px;
    margin-left: 0px;
  }
  .timeline > li:nth-child(even) .timeline-panel {
    width: 76%;
    padding: 0 0 20px 0px;
    text-align: left;
  }
  .timeline > li:nth-child(odd) .timeline-panel {
    width: 70%;
    padding: 0 0 20px 0px;
    text-align: right;
  }
  .timeline > li .line {
    display: none;
  }
}
/* Small Devices, Tablets */
@media (min-width: 768px) and (max-width: 991px) {
  .timeline > li:nth-child(even) {
    margin-bottom: 0px;
    min-height: 0px;
    right: 0px;
  }
  .timeline > li:nth-child(odd) {
    margin-bottom: 0px;
    min-height: 0px;
    left: 0px;
  }
  .timeline>li:nth-child(even) .timeline-image {
    left: 0;
    margin-left: 0px;
  }
  .timeline>li:nth-child(odd) .timeline-image {
    left: 520px;
    margin-left: 0px;
  }
  .timeline > li:nth-child(even) .timeline-panel {
    width: 70%;
    padding: 0 0 20px 0px;
    text-align: left;
  }
  .timeline > li:nth-child(odd) .timeline-panel {
    width: 70%;
    padding: 0 0 20px 0px;
    text-align: right;
  }
  .timeline > li .line {
    display: none;
  }
}
/* Custom, iPhone Retina */
@media only screen and (max-width: 767px) {
  .timeline > li:nth-child(even) {
    margin-bottom: 0px;
    min-height: 0px;
    right: 0px;
  }
  .timeline > li:nth-child(odd) {
    margin-bottom: 0px;
    min-height: 0px;
    left: 0px;
  }
  .timeline>li .timeline-image {
    position: static;
    width: 150px;
    height: 150px;
    margin-bottom:0px;
  }
  .timeline>li:nth-child(even) .timeline-image {
    left: 0;
    margin-left: 0;
  }
  .timeline>li:nth-child(odd) .timeline-image {
    float:right;
    left: 0px;
    margin-left:0;
  }
  .timeline > li:nth-child(even) .timeline-panel {
    width: 100%;
    padding: 0 0 20px 14px;
  }
  .timeline > li:nth-child(odd) .timeline-panel {
    width: 100%;
    padding: 0 14px 20px 0px;
  }
  .timeline > li .line {
    display: none;
  }
}
    </style>
    <script src="<?php echo base_url();?>vendors/frontend/js/modernizr.custom.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
       <!-- navbar-->
    <header class="header">
    <!-- Top Bar    -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center menu-center">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="customer-login.html" class="p-2 topbar-atas"><i class="fa fa-envelope"></i> <strong> Email : email@email.com</strong></a></li>
                        <li class="list-inline-item"><a href="customer-login.html" class="p-2 topbar-atas"><i class="fa fa-phone"></i> <strong>  Telepon : +6298292929299</strong></a></li>
                        <li class="list-inline-item"><a href="customer-login.html" class="p-2 topbar-atas"><i class="fa fa-clock-o"></i> <strong> Senin - Jumat (08.00-17.00)</strong></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="search-area">                       
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">Close<i class="icon-close-round"></i></div>
                    <form class="search-form">
                        <div class="form-group">
                            <input type="search" placeholder="What are you searching for...">
                            <button type="submit" class="submit">Search</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

        <!-- Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="<?php echo base_url();?>home" class="navbar-brand"><img src="<?php echo base_url();?>vendors/frontend/img/logo-light.png" alt="..." width="180" class="img-fluid"></a>
          <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span></span><span></span><span></span></button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active"><a href="<?php echo base_url();?>home" class="nav-link">Home <span class="sr-only">(current)</span></a></li>

              <li class="list-inline-item dropdown menu-large"><a id="megamenu" href="#" data-toggle="dropdown" class="nav-link">Kategori  <i class="fa fa-angle-down"></i></a>
                <div aria-labelledby="megamenu" class="dropdown-menu megamenu">
                  <div class="container">                       
                    <div class="row">
                      <div class="col-lg-3"><strong class="text-uppercase">Sofa</strong>
                        <ul class="list-unstyled">
                          <li> <a href="index.html">Index</a></li>
                          <li><a href="about.html">Sofa 2 Seat</a></li>
                          <li><a href="agents.html">Sofa 3 Seat</a></li>
                          <li><a href="agent-single.html">Sofa 4 Seat</a></li>
                        </ul>
                      </div>
                      <div class="col-lg-3"><strong class="text-uppercase">Kasur</strong>
                        <ul class="list-unstyled">
                          <li><a href="property.html">Kasur 1 </a></li>
                          <li><a href="property%3dsingle.html">Kasur 1 </a></li>
                          <li><a href="property-grid-full.html">Kasur 1 </a></li>
                          <li><a href="property-list-full.html">Kasur 1 </a></li>
                        </ul>
                      </div>
                      <div class="col-lg-3"><strong class="text-uppercase">Meja Makan</strong>
                        <ul class="list-unstyled">
                          <li><a href="submit-property.html">Meja Makan 1</a></li>
                          <li><a href="error-404.html">Meja Makan 2</a></li>
                          <li><a href="gallery.html">Meja makan 3</a></li>
                          <li><a href="customer-login.html">Meja Makan 4</a></li>
                        </ul>
                      </div>
                      <div class="col-lg-3"><strong class="text-uppercase">Ruang Tamu</strong>
                        <ul class="list-unstyled">
                          <li><a href="#">Ruang Tamu 1</a></li>
                          <li><a href="#">Ruang Tamu 2</a></li>
                          <li><a href="#">Ruang Tamu 3</a></li>
                          <li><a href="#">Ruang Tamu 4</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

                <li class="nav-item dropdown"><a id="navbarDropdownMenuLink" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Produk<i class="fa fa-angle-down"></i></a>
                <ul aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                  <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                  <li><a href="#" class="dropdown-item nav-link">Another action</a></li>
                  <li class="dropdown-submenu"><a id="navbarDropdownMenuLink2" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Dropdown link <i class="fa fa-angle-down"></i></a>
                    <ul aria-labelledby="navbarDropdownMenuLink2" class="dropdown-menu">
                      <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                      <li class="dropdown-submenu"><a id="navbarDropdownMenuLink3" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                           
                          Another action <i class="fa fa-angle-down"></i></a>
                        <ul aria-labelledby="navbarDropdownMenuLink3" class="dropdown-menu">
                          <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                          <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                          <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                          <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                        </ul>
                      </li>
                      <li><a href="#" class="dropdown-item nav-link">Something else here  </a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="nav-item"><a href="#" class="nav-link search-btn">Cari</a></li>

                <li class="nav-item"><a href="property.html" class="nav-link">Login</a></li>

              <li class="nav-item"><a href="<?php echo base_url();?>home/step" class="nav-link">Panduan</a></li>

              <li class="nav-item"><a href="<?php echo base_url();?>home/about" class="nav-link">Tentang Kami</a></li>
              
            </ul>
          </div>
        </div>
      </nav>
            <!-- Top Bar    -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center menu-center">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="customer-login.html" class="p-2 topbar-atas"><i class="fa fa-heart"></i> <strong class="text-thin"> Garansi 360 Hari</strong></a></li>
                        <li class="list-inline-item"><a href="customer-login.html" class="p-2 topbar-atas"><i class="fa fa-dollar"></i> <strong class="text-thin">  Custom Design Anda</strong></a></li>
                        <li class="list-inline-item"><a href="customer-login.html" class="p-2 topbar-atas"><i class="fa fa-truck"></i> <strong class="text-thin"> Free Shipment Untuk Setiap Pembelian</strong></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="search-area">                       
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">Close<i class="icon-close-round"></i></div>
                    <form class="search-form">
                        <div class="form-group">
                            <input type="search" placeholder="What are you searching for...">
                            <button type="submit" class="submit">Search</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </header>
    <!-- End Header Section --> 
    <!-- Hero Section-->
    <section class="hero-page bg-white-custom-3">
      <div class="container">
        <h1 class="h2 text-primary">Panduan Belanja</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Panduan Belanja</li>
          </ol>
        </nav>
      </div>
    </section>
    <!-- Brief Section-->
    <section class="about-brief bg-white-custom-3">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-12">
            <h2 class="h3 text-thin has-line">Panduan Belanja</h2>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <p>
        Ini adalah panduan cara berbelanja pada product ready stock kami.
      </p>
      <ul class="timeline">
        <li>
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/1" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step One</h4>
              <h4 class="subheading">Pilih Produk</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                silahkan pilih barang yang dibeli.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/2" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step Two</h4>
              <h4 class="subheading">Login</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                silahkan login dengan akun anda.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li>
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/3" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step Three</h4>
              <h4 class="subheading">Dp 30%</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                silahkan lakukan dp 30%.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/4" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step Three</h4>
              <h4 class="subheading">lakukan transfer</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                silahkan lakukan transfer pada rekening kami.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li>
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/5" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Final Step</h4>
              <h4 class="subheading">Packing Pengiriman Barang</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
               barang anda akan dikirim.
              </p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Hero Section-->
    <section class="hero-page bg-white-custom-3">
      <div class="container">
        <h1 class="h2 text-primary">Panduan Belanja</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Panduan Belanja</li>
          </ol>
        </nav>
      </div>
    </section>
    <!-- Brief Section-->
    <section class="about-brief bg-white-custom-3">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-12">
            <h2 class="h3 text-thin has-line">Panduan Belanja Custom Product</h2>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <p>
        Ini adalah panduan cara berbelanja pada Custom product kami.
      </p>
      <ul class="timeline">
        <li>
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/1" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step One</h4>
              <h4 class="subheading">Pilih Produk</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                silahkan pilih barang yang dibeli.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/2" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step Two</h4>
              <h4 class="subheading">Login</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                silahkan login dengan akun anda.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li>
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/3" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step Three</h4>
              <h4 class="subheading">Dp 30%</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                silahkan lakukan dp 30%.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/4" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step Three</h4>
              <h4 class="subheading">lakukan transfer</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                silahkan lakukan transfer pada rekening kami.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li>
          <div class="timeline-image">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/5" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Final Step</h4>
              <h4 class="subheading">Packing Pengiriman Barang</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
               barang anda akan dikirim.
              </p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Clients Section -->
    <section class="clients bg-white-3">
        <header class="text-center">
                <h2><span class="text-primary">Pembayaran</span></h2>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <p class="template-text">Pembayaran pada transaksi kami bisa dilakukan melalui pembayaran bank dibawah.</p>
                    </div>
                </div>
            </header>
        <div class="container">
            <div class="swiper-container clients-slider">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_1.png" alt="undefined"></div>
                    </div>

                    <div class="swiper-slide">
                        <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_2.png" alt="undefined"></div>
                    </div>

                    <div class="swiper-slide">
                        <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_3.png" alt="undefined"></div>
                    </div>

                    <div class="swiper-slide">
                        <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_4.png" alt="undefined"></div>
                    </div>

                    <div class="swiper-slide">
                        <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_5.png" alt="undefined"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Clients Section            -->
    
    <!-- Scroll Top Button        -->
    <div id="scrollTopButton"><i class="fa fa-long-arrow-up"></i></div>
    <footer class="footer bg-black-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 brief">
                    <div class="logo"><img src="<?php echo base_url();?>vendors/frontend/img/logo-light.png" alt="..." width="170"></div>
                        <p>property murah namun dengan bahan dan kualitas terbaik itulah kami, segera order furniture pada gerai kami di kota anda. dapatkan diskon besar besaran setiap hari.</p>
                        <ul class="social list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                </div>
                <div class="col-lg-2 links">
                    <h3 class="h4 text-thin text-uppercase">Company</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Properties</a></li>
                        <li><a href="#">Landlords</a></li>
                        <li><a href="#">Renters</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
          <div class="col-lg-2 links">
            <h3 class="h4 text-thin text-uppercase">Support</h3>
            <ul class="list-unstyled">
              <li><a href="#">Help & FAQ</a></li>
              <li><a href="#">Policy Privacy</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Our Partners</a></li>
            </ul>
          </div>
          <div class="col-lg-4 newsletter">
            <h3 class="h4 text-thin text-uppercase">Newsletter</h3>
            <p>property murah namun dengan bahan dan kualitas terbaik itulah kami, segera order furniture pada gerai kami di kota anda. dapatkan diskon besar besaran setiap hari.</p>
            <form class="newsletter-form">
              <div class="form-group">
                <input type="email" name="email" placeholder="Enter your email address" class="form-control newsletter-form">
                <button type="submit" class="btn btn-gradient submit"><i class="icon-email-plane"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="copyrights bg-black-5">
        <div class="container text-center">
          <p>&copy; Copyrights 2018. Template by <a href="https://bootstrapious.com/">dimas9c3@gmail.com</a></p>
        </div>
      </div>
    </footer>

    <button type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm hidden-xs hidden-sm"><i class="fa fa-cog fa-2x"></i></button>
    <div id="style-switch" class="collapse">
      <h4 class="text-uppercase">Select theme colour</h4>
      <form class="mb-3">
        <select name="colour" id="colour" class="form-control">
          <option value="">select colour variant</option>
          <option value="red">red</option>
          <option value="pink">pink</option>
          <option value="green">green</option>
          <option value="violet">violet</option>
          <option value="sea">sea</option>
          <option value="default">blue</option>
        </select>
      </form>
      <p><img src="img/template-mac.png" alt="" class="img-fluid"></p>
      <p class="text-muted text-small">Stylesheet switching is done via JavaScript and can cause a blink while page loads. This will not happen in your production code.</p>
    </div>
    <!-- Javascript files-->
    <script src="<?php echo base_url();?>vendors/frontend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/swiper/js/swiper.js"></script>
    <script src="<?php echo base_url();?>vendors/frontend/js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='../../../www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>