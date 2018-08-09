
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Townville - Real Estate template</title>
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
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/frontend/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url();?>vendors/frontend/img/favicon.ico">
    <!-- Modernizr-->
    <script src="<?php echo base_url();?>vendors/frontend/js/modernizr.custom.js"></script>
    <!-- Sweetalert -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/plugins/sweetalert/sweetalert.css'?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- navbar-->
<?php $kategori_navbar   = $this->Model_barang->get_kategori_navbar(); ?>
<!-- Header-->
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
<!-- /.top-bar -->

<!-- Navbar-->
<nav class="navbar navbar-expand-lg">
<div class="container"><a href="<?php echo base_url();?>home" class="navbar-brand"><img src="<?php echo base_url();?>vendors/frontend/img/logo-light.png" alt="..." width="180" class="img-fluid"></a>
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span></span><span></span><span></span></button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto">

            <li class="nav-item active"><a href="<?php echo base_url();?>home" class="nav-link">Home <span class="sr-only">(current)</span></a></li>

            <li class="list-inline-item dropdown menu-large"><a id="megamenu" href="#" data-toggle="dropdown" class="nav-link">Produk Barang <i class="fa fa-angle-down"></i></a>
                <div aria-labelledby="megamenu" class="dropdown-menu megamenu">
                    <div class="container">                       
                        <div class="row">
                            <?php foreach($kategori_navbar->result_array() as $i)
                            { 
                                $id_kategori        = $i['kategori_id'];
                                $nm_kategori        = $i['kategori_nama'];
                            ?>
                            <div class="col-lg-3"><strong class="text-uppercase"><?php echo $nm_kategori; ?></strong>
                                <ul class="list-unstyled">
                                    <?php
                                        $query      = $this->Model_barang->get_subkategori_navbar($id_kategori);
                                        if($query->num_rows() > 0)
                                        {
                                            foreach($query->result_array() as $ii)
                                            {
                                                $id_sub_kategori        = $ii['sub_kategori_id'];
                                                $nm_sub_kategori        = $ii['sub_kategori_nama']; ?>
                                                
                                                <li><a href="<?php echo base_url().'barang/kategori/'.$id_sub_kategori; ?>"><?php echo $nm_sub_kategori; ?></a></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </li>

                <!--<li class="nav-item dropdown"><a id="navbarDropdownMenuLink" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Produk Interior <i class="fa fa-angle-down"></i></a>
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
              </li> -->

            <li class="nav-item"><a href="#" class="nav-link search-btn">Custom Design</a></li>

            <li class="nav-item"><a href="#" class="nav-link search-btn">Cari</a></li>

            <li class="nav-item"><a href="<?php echo base_url();?>auth" class="nav-link"><i class="fa fa-key"></i> Login</a></li>

            <li class="nav-item"><a href="<?php echo base_url();?>keranjang" class="nav-link"><i class="fa fa-cart-plus"></i> Keranjang Belanja</a></li>
              
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
    <section class="hero-page bg-white-3">
      <div class="container">
        <h1 class="h2 text-primary">User Area</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">User Login</li>
          </ol>
        </nav>
      </div>
    </section>
    <section class="customer-login bg-white-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="has-line">Login</h2>
            <h4 class="text-thin">Already our user?</h4>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            <hr>
            <div id="infoMessage"><?php echo $message;?></div>
            <form action="<?php echo base_url().'auth/login' ?>" method="post">
              <div class="form-group">
                 <input type="text" name="identity" id="identity" class="form-control" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
               <input type="password" name="password" id="password" class="form-control" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-gradient">Login</button>
              </div>
            </form>
          </div>
          <?php 
            $c1      = rand(1,9);
            $c2      = rand(1,9);
            $c3      = rand(1,9);
            $c4      = rand(1,9);

            $captcha        = $c1.$c2.$c3.$c4;
        ?>
          <div class="col-lg-6 mt-5 mt-lg-0">
            <h2 class="has-line">New Account</h2>
            <h4 class="text-thin">Not our registered user yet?</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. LOLUt enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <hr>
            <div id="infoMessage"><?php echo $message;?></div>
            <form action="<?php echo base_url();?>auth/create_user" method="POST" enctype="multipart/form-data" class="login-form">
              <div class="form-group">
                <input type="text"  maxlength="50" name="first_name" id="first_name" class="form-control" placeholder="Ketik Nama Awal anda" required>
              </div>
              <div class="form-group">
                <input type="text"  maxlength="50" name="last_name" id="last_name" class="form-control" placeholder="Ketik Nama Terakhir Anda" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Ketik Email Anda" class="form-control">
              </div>
              <div class="form-group">
                <input type="number"  maxlength="20" name="phone" id="phone" class="form-control" placeholder="Ketik Nomor Telepon Anda" required>
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Ketik Password Anda. Minimal 8 Karakter" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password_confirm" id="password_confirm" placeholder="Ketik Lagi Password Anda" class="form-control">
              </div>
              <div class="form-group">
                <input type="hidden" name="captcha_valid" id="captcha_valid" value="<?php echo $captcha; ?>" class="form-control">
                <input type="number" name="captcha" id="captcha" value="<?php echo $captcha; ?>" class="form-control" disabled>
              </div>
            <div class="form-group">
                <input type="number" name="captcha_confirm" id="captcha_confirm" placeholder="Ketik Kode Angka Captcha Diatas" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-gradient">Daftar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Clients Section            -->
    <!-- Clients Section -->
    <section class="clients bg-white-3">
      <div class="container">
        <div class="swiper-container clients-slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-1.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-2.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-3.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-4.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-5.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-1.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-1.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-2.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-3.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-4.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-5.svg" alt="undefined"></div>
            </div>
            <div class="swiper-slide">
              <div class="client"><img src="img/logo-1.svg" alt="undefined"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer bg-white-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 brief">
            <div class="logo"><img src="img/logo-light.svg" alt="..." width="170"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
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
            <p>p Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
            <form class="newsletter-form">
              <div class="form-group">
                <input type="email" name="email" placeholder="Enter your email address" class="form-control">
                <button type="submit" class="btn btn-gradient submit"><i class="icon-email-plane"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="copyrights bg-white-3">
        <div class="container text-center">
          <p>&copy; Copyrights 2017. Template by <a href="https://bootstrapious.com/">Bootstrapious</a></p>
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
      <p><img src="<?php echo base_url();?>vendors/frontend/img/template-mac.png" alt="" class="img-fluid"></p>
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
    <!-- Sweetalert -->
<script src="<?php echo base_url().'vendors/plugins/sweetalert/sweetalert.min.js'?>"></script>
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
    <?php if($this->session->flashdata('msg')=='captcha_salah'):?>
        <script type="text/javascript">
            swal({
            title: "Inputan Salah",
            text: "Captcha Yang Anda Inputkan Salah",
            type: "error",
            confirmButtonText: "OK"
        });
        </script>
    <?php endif; ?>
    <?php if($this->session->flashdata('msg')=='daftar_sukses'):?>
        <script type="text/javascript">
            swal({
            title: "Yay!",
            text: "Pendaftaran anda berhasil, silahkan login ke sistem.",
            type: "success",
            confirmButtonText: "OK"
        });
        </script>
    <?php endif; ?>
     <?php if($this->session->flashdata('msg')=='inputan_salah'):?>
        <script type="text/javascript">
            swal({
            title: "Maaf",
            text: "Data yang anda inputkan tidak valid silahkan cek dibawah untuk melihat keterangan.",
            type: "error",
            confirmButtonText: "OK"
        });
        </script>
    <?php endif; ?>
  </body>
</html>