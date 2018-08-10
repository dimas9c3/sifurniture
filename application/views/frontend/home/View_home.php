<?php $this->load->view('frontend/partial/View_header'); ?>
    <!-- Hero Section-->
    <section class="hero-section bg-white-3">
        <div class="swiper-container hero-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div style="background: url(<?php echo base_url();?>vendors/frontend/img/hero-bg-2.jpg);" class="hero-content has-overlay-dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1>Temukan furniture impian anda</h1>
                                    <p class="template-text">property murah namun dengan bahan dan kualitas terbaik itulah kami, segera order furniture pada gerai kami di kota anda. dapatkan diskon besar besaran setiap hari.</p><a href="#" class="btn btn-gradient">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div style="background: url(<?php echo base_url();?>vendors/frontend/img/hero-bg-2.jpg);" class="hero-content has-overlay-dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1>Temukan furniture impian anda</h1>
                                    <p class="template-text">property murah namun dengan bahan dan kualitas terbaik itulah kami, segera order furniture pada gerai kami di kota anda. dapatkan diskon besar besaran setiap hari.</p><a href="#" class="btn btn-gradient">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div style="background: url(<?php echo base_url();?>vendors/frontend/img/hero-bg-2.jpg);" class="hero-content has-overlay-dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1>Temukan furniture impian anda</h1>
                                    <p class="template-text">property murah namun dengan bahan dan kualitas terbaik itulah kami, segera order furniture pada gerai kami di kota anda. dapatkan diskon besar besaran setiap hari.</p><a href="#" class="btn btn-gradient">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Add Pagination-->
            <div class="swiper-pagination"></div>

        </div>
    </section>

     <section class="ready-product pt-0 bg-white-3">
        <div class="container">
            <header class="text-center">
                <h2><span class="text-primary">Populer bulan ini</span></h2>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <p class="template-text">Ini adalah desain furniture terpopuler pada bulan ini. furniture ini murah nyaman dan tentunya bergaransi.</p>
                    </div>
                </div>
            </header>

            <!-- Produk Populer -->

            <div class="swiper-container apartments-slider">
                <div class="swiper-wrapper pt-2 pb-5">

                    <?php foreach($populer->result_array() as $i)
                    {
                        $foto           = $i['foto_barang_nama'];
                        $nama           = $i['barang_nama'];
                        $jual           = $i['barang_harga_jual'];
                    ?>
                    <div class="swiper-slide">
                        <div class="property">
                            <div class="image"><img src="<?php echo base_url().'assets/images/barang/'.$foto; ?>" alt="Condo with pool view" class="img-fluid">

                                <div class="overlay d-flex align-items-center justify-content-center"><a href="<?php echo base_url().'barang/detail/'.$i['barang_id']; ?>" class="btn btn-gradient btn-sm">View Details</a></div>

                            </div>
                            <div class="box-thumbnails">
								<div class="thumb-product-caption">
									<div class="thumb-product-title">
										<a href="<?php echo base_url().'barang/detail/'.$i['barang_id']; ?>">
											<p class="mb-0"><?php echo $nama; ?></p>
										</a>
									</div>
									<div class="thumb-product-price">
										<h6 class="mb-0"><?php echo 'Rp. '.number_format($jual); ?></h6>
									</div>
								</div>
                            </div>
							<div class="box-thumbnails-footer text-center">
								<a href="#" class="btn btn-gradient btn-sm mb-1"><i class="fa fa-cart-plus"></i></a>
                                <a href="#" class="btn btn-gradient btn-sm"><i class="fa fa-heart"></i></a>
							</div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            <!-- Add Pagination-->
            <div class="swiper-pagination">       </div>
            </div>

        </div>
    </section>

    <!-- Listings Section -->
    <section class="listings-home pt-0 bg-white-3">
      <div class="container">
        <header class="text-center">
          <h2> <span class="text-primary">Promo & Trending Bulan Ini</span></h2>
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <p class="template-text">Ini adalah bagian promo dan event pada website anda.</p>
            </div>
          </div>
        </header>
        <div class="row">
          <div class="col-lg-12">
            <div class="listing-home mb-0"><img src="<?php echo base_url();?>vendors/frontend/img/ramadhan.gif" alt="..."><a href="#" class="text no-anchor-style">
                <h3>Ramadhan Sale</h3>
                <p>Silahkan berbelanja ada banyak cashback menanti anda bulan ini.</p></a>
              <div class="ribbon text-center"><strong class="d-block">1</strong><small>Listings</small></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Custom Section-->
    <section class="about pt-0 bg-white-3 portfolio-section">
        <header class="text-center">
            <span><a href="<?php echo base_url();?>home/custom" class="btn btn-gradient"><strong>Produk Interior</strong></a></span>
            <div class="row mt-2">
                <div class="col-lg-8 mx-auto">
                    <p class="template-text">Inilah produk interior kami. </p>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row d-flex align-items-stretch">
                <?php
                    foreach($interior->result_array() as $i)
                    {
                        $id_interior        = $i['sub_1_kategori_interior_id'];
                        $nm_interior        = $i['sub_1_kategori_interior_nama'];
                        $foto               = $i['sub_1_kategori_interior_foto'];
                ?>
                <div class="col-lg-4 col-xs-4 pr-lg-0">
                    <div class="box-thumbnails portfolio">
                        <div class="image mb-3">
							<a href="<?php echo base_url().'interior/kategori/'.$id_interior;?>">
								<img src="<?php echo base_url().'assets/images/sub_1_kategori_interior/'.$foto;?>" class="img-fluid">
							</a>
                        </div>
                        <div class="info"><a href="<?php echo base_url().'interior/kategori/'.$id_interior;?>" class="no-anchor-style">
                            <h3 class="h4 text-thin text-center text-uppercase mb-1"><?php echo $nm_interior; ?></h3></a>
                            <div class=" d-flex align-items-center justify-content-center">
								<a href="<?php echo base_url().'interior/kategori/'.$id_interior;?>" class="btn btn-gradient">
									<strong>Harga Mulai Rp.1.000.000</strong>
								</a>
							</div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>

            </div>

        </div>
    </section>

     <!-- Custom scandinavi -->
    <section class="about pt-0 bg-white-3">
		<div class="container">
			<header class="text-center">
				<h2>
					<a href="<?php echo base_url();?>home/custom" class="btn btn-gradient "><strong>Custom Design</strong></a>
				</h2>
				<div class="row">
	                <div class="col-lg-8 mx-auto">
	                    <p class="template-text">
							Tidak cocok dengan produk yang sudah ada ? Mari desain sendiri desain yang anda inginkan
							sendiri, furniture yang dibuat dengan custom design sesuka anda. Silahkan klik link
							dibawah untuk memulai custom design anda.
						</p>
	                </div>
	            </div>
	        </header>
		</div>
        <div class="container">
            <div class="row d-flex align-items-stretch">
                <?php
                    foreach($style->result_array() as $i)
                    {
                        $id_style           = $i['style_id'];
                        $des_style          = $i['style_deskripsi'];
                        $foto_style         = $i['style_foto'];
                        $nm_style           = $i['style_nama'];

                ?>
                <div class="col-md-4 mb-3">
                    <div class="property">
                        <div class="image"><a href="<?php echo base_url().'custom/buat_custom/'.$id_style;?>"><img src="<?php echo base_url().'assets/images/style/'.$foto_style;?>" alt="Condo with pool view" class="img-fluid"></a>
                        </div>
                        <div class="info text-center"><a href="<?php echo base_url().'custom/buat_custom/'.$id_style;?>" class="no-anchor-style">
                            <div class="d-flex align-items-center justify-content-center">
                                 <h3 class="d-flex align-items-center justify-content-center"><strong class="text-primary"><?php echo $nm_style; ?></strong></h3>
                            </div>
                            <ul class="tags list-inline">
                                <li class="list-inline-item"><a href="<?php echo base_url().'custom/buat_custom/'.$id_style;?>"><?php echo $des_style; ?> </a></li>
                            </ul>
                           <div class=" d-flex align-items-center justify-content-center"><a href="<?php echo base_url().'custom/buat_custom/'.$id_style;?>" class="btn btn-gradient"><strong>Custom Sekarang</strong></a></div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>

            </div>
        </div>
    </section>

    <!-- Testimonials Section-->
    <section class="testimonials bg-white-3 pt-0">
      <div class="container">
        <header class="text-center">
          <h2><span class="text-primary">Testimoni Konsumen</span></h2>
        </header>
        <div class="swiper-container testimonials-slider">
          <div class="swiper-wrapper pt-2 pb-5">
            <div class="swiper-slide">
                <?php
                    foreach($ulasan->result_array() as $i)
                    {
                        $id_ulasan          = $i['ulasan_id'];
                        $text_length        = strlen($i['ulasan_isi']);
                        $isi                = substr($i['ulasan_isi'],1,200);
                        if ($text_length>200)
                        {
                            $add_text       = '.....';
                        }else
                        {
                            $add_text       = '';
                        }
                        $rate               = $i['ulasan_rating'];
                        $nm_cus             = $i['first_name'].' '.$i['last_name'];
                ?>
                <div class="testimonial">
                    <p class="template-text feedback"><?php echo $isi.$add_text; ?></p>
                    <div class="client">
                        <h4 class="name text-thin text-uppercase mb-0 mt-4"><?php echo $nm_cus; ?></h4><span class="title">Happy Buyer</span>
                    </div>
                </div>
                <?php } ?>
            </div>

          <!-- Add Pagination-->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <section class="ready-product pt-0 bg-white-3">
        <div class="container">
            <header class="text-center">
                <h2><span class="text-primary">Artikel Terbaru</span></h2>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <p class="template-text">Ini adalah artikel website anda yang terbaru.</p>
                    </div>
                </div>
            </header>
            <!-- Barang Ready Stock Atas Section-->
            <div class="swiper-container artikel-slider">
                <div class="swiper-wrapper pt-2 pb-5">

                    <?php foreach($artikel->result_array() as $art)
                    {
                        $id_artikel         = $art['artikel_id'];
                        $judul              = $art['artikel_judul'];
                        $gb_artikel         = $art['artikel_foto'];
                    ?>
                    <div class="swiper-slide">
                        <a href="<?php echo base_url().'artikel/detail/'.$id_artikel;?>" class="no-anchor-style">
                        <div class="artikel">
                            <div class="image"><img src="<?php echo base_url().'assets/images/artikel/'.$gb_artikel; ?>" class="img-responsive ">
                            </div>
                            <div class="info">
                                <div class="d-flex align-items-center justify-content-center align-content-center p-1">

                                        <p class="h5 text-thin text-uppercase text-center"><?php echo $judul; ?></p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <?php } ?>

                </div>
            <!-- Add Pagination-->
            <div class="swiper-pagination">       </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
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

    <!-- Modal diskon -->
	<!-- Modal diskon -->
    <div class="modal fade" id="modal_diskon" tabindex="-1" role="dialog" aria-labelledby="ModalProduk">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content modal_diskon" >
                <div class="modal-header">
                    <h3 class="modal-title">Penawaran menarik !</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="text-thin">
                                silahkan belanja ditoko kami!
                            </h5>
                            <h5 class="text-thin">Jangan sampai telat&hellip; !!</h5>
                        </div>
                        <div class="col-md-6">
                            <img class="img-responsive" src="<?php echo base_url();?>vendors/frontend/img/property-single-1.jpg">
                        </div>
                    </div>
                </div>
                <div class="modal-footer-cst">
                    <button type="button" id="modal_diskon_set_cookie" class="btn btn-gradient btn-sm mr-2" data-dismiss="modal">Jangan tampilkan hari ini.</button>
                    <a class="btn btn-gradient btn-sm" data-dismiss="modal" href="#">OK</a>
                </div>
            </div>
        </div>
    </div>

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

    <?php $this->load->view('frontend/partial/view_footer'); ?>

		<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='https://www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X');ga('send','pageview');

			if($.cookie('modal_diskon')==null)
			{
				setTimeout(function() {
				$('#modal_diskon').modal();
				},3000);
			}

			$('#modal_diskon_set_cookie').on('click',function()
			{
				$.cookie('modal_diskon', 'yes', { expires: 1, path: '/' });
			})
		</script>

    </body>
</html>
