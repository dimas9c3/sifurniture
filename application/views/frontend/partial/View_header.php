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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/new_concept.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url();?>vendors/frontend/img/favicon.ico">
    <!-- Modernizr-->
    <script src="<?php echo base_url();?>vendors/frontend/js/modernizr.custom.js"></script>
    <!-- Sweetalert -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>vendors/plugins/sweetalert/sweetalert.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
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
<div class="container"><a href="<?php echo base_url();?>home" class="navbar-brand"><img src="<?php echo base_url();?>vendors/frontend/img/logo-light.png" alt="..." width="90" class="img-fluid"></a>
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

            <li class="nav-item"><a href="<?php echo base_url();?>custom/buat_custom" class="nav-link">Custom Design</a></li>

            <li class="nav-item"><a href="#" class="nav-link search-btn">Cari</a></li>

            <li class="nav-item"><a href="<?php echo base_url();?>auth" class="nav-link"><i class="fa fa-key"></i> Login</a></li>

            <li class="nav-item"><a href="<?php echo base_url();?>keranjang" class="nav-link"><i class="fa fa-cart-plus"></i> Keranjang Belanja</a></li>

            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- End Header Section -->
