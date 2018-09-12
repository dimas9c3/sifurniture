<?php $this->load->view('frontend/partial/View_header'); ?>
<!-- Banner Depan-->
<section class="featured-image pt-0">
    <div class="owl-carousel owl-theme" id="banner">

        <?php // foreach ($banner->result_array() as $i)
        //{
            //$banner         = $i['banner_item'];
        ?>
                <img src="<?php echo base_url('assets/images/banner/Header2.jpg'); ?>" class="banner-slider">

                 <img src="<?php echo base_url('assets/images/banner/Header3.jpg'); ?>" class="banner-slider">

                  <img src="<?php echo base_url('assets/images/banner/Headforder.jpg'); ?>" class="banner-slider">
                        
        <?php // } ?>

    </div>   
</section>
<!-- End Banner Depan -->

<!-- Produk Populer -->
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

        <div class="row">
            <div class="col-md-3 col-6">
                <a href="">
                    <div class="main-product-thumb">
                        <div class="product-thumbnail">
                            <figure>
                                <img class="img-responsive" src="<?php echo base_url().'assets/images/barang/de490900511584984d098140bf5c9554.jpg' ?>" alt="">
                                <figcaption class="text-center">
                                    <h6 class="product-thumbnails-title">Meja Makan Glossy</h6>
                                    <h5 class="product-thumbnails-price">Rp. 1.000.000
                                        <span><del>&nbsp; 1.500.000</del></span>
                                    </h5>
                                </figcaption>
                            </figure>
                        </div>
                </a>
                <div class="footer-product-thumbnails text-center">
                    <button type="button" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-cart-plus"></i></button>
                    <button type="button" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-heart"></i></button>
                    <button type="button" onclick="window.location.href='<?php echo base_url();?>custom/buat_custom'" class="btn btn-sm btn-gradient btn-sm" name="button">Custom</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
                <a href="">
                    <div class="main-product-thumb">
                        <div class="product-thumbnail">
                            <figure>
                                <img class="img-responsive" src="<?php echo base_url().'assets/images/barang/de490900511584984d098140bf5c9554.jpg' ?>" alt="">
                                <figcaption class="text-center">
                                    <h6 class="product-thumbnails-title">Meja Makan</h6>
                                    <h5 class="product-thumbnails-price">Rp. 1.000.000
                                        <span><del>&nbsp; 1.500.000</del></span>
                                    </h5>
                                </figcaption>
                            </figure>
                        </div>
                </a>
                <div class="footer-product-thumbnails text-center">
                    <button type="button" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-cart-plus"></i></button>
                    <button type="button" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-heart"></i></button>
                    <button type="button" onclick="window.location.href='<?php echo base_url();?>custom/buat_custom'" class="btn btn-sm btn-gradient btn-sm" name="button">Custom</button>
                </div>
            </div>
        </div>          
</section>
<!-- End Of Populer Produk -->

<!-- Produk Populer -->
<section class="ready-product pt-0 bg-white-3">
    <div class="container">
        <header class="text-center">
            <h2><span class="text-primary">Produk Ready Stock</span></h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <p class="template-text">Ini adalah desain furniture ready stock.</p>
                </div>
            </div>
        </header>

        <div class="row">
            <div class="col-md-3 col-6">
                <a href="">
                    <div class="main-product-thumb">
                        <div class="product-thumbnail">
                            <figure>
                                <img class="img-responsive" src="<?php echo base_url().'assets/images/barang/de490900511584984d098140bf5c9554.jpg' ?>" alt="">
                                <figcaption class="text-center">
                                    <h6 class="product-thumbnails-title">Meja Makan Glossy</h6>
                                    <h5 class="product-thumbnails-price">Rp. 1.000.000
                                        <span><del>&nbsp; 1.500.000</del></span>
                                    </h5>
                                </figcaption>
                            </figure>
                        </div>
                </a>
                <div class="footer-product-thumbnails text-center">
                    <button type="button" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-cart-plus"></i></button>
                    <button type="button" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-heart"></i></button>
                    <button type="button" onclick="window.location.href='<?php echo base_url();?>custom/buat_custom'" class="btn btn-sm btn-gradient btn-sm" name="button">Custom</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
                <a href="">
                    <div class="main-product-thumb">
                        <div class="product-thumbnail">
                            <figure>
                                <img class="img-responsive" src="<?php echo base_url().'assets/images/barang/de490900511584984d098140bf5c9554.jpg' ?>" alt="">
                                <figcaption class="text-center">
                                    <h6 class="product-thumbnails-title">Meja Makan</h6>
                                    <h5 class="product-thumbnails-price">Rp. 1.000.000
                                        <span><del>&nbsp; 1.500.000</del></span>
                                    </h5>
                                </figcaption>
                            </figure>
                        </div>
                </a>
                <div class="footer-product-thumbnails text-center">
                    <button type="button" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-cart-plus"></i></button>
                    <button type="button" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-heart"></i></button>
                    <button type="button" onclick="window.location.href='<?php echo base_url();?>custom/buat_custom'" class="btn btn-sm btn-gradient btn-sm" name="button">Custom</button>
                </div>
            </div>
        </div>          
</section>
<!-- End Of Populer Produk -->

<!-- Listings Section
<section class="listings-home pt-0 bg-white-3">
  <div class="container">
    <header class="text-center">
      <h2> <span class="text-primary">Promo & Event</span></h2>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <p class="template-text">Ini adalah bagian promo dan event pada website anda.</p>
        </div>
      </div>
    </header>
    <div class="row">
		<?php foreach($iklan->result_array() as $i)
		{
			$iklan 				= $i['iklan_item'];
			$text 				= $i['iklan_text'];
		?>
      	<div class="col-md-12">
        	<div class="listing-home mb-0"><img class="img-responsive img-iklan" src="<?php echo base_url('assets/images/iklan/').$iklan;?>" alt="..."><a href="#" class="text no-anchor-style">
            <p class="text-primary"><?php echo $text; ?></p>
        	</div>
      	</div>
		<?php } ?>
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
            <div class="col-lg-3 col-xs-4 pr-lg-0">
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

<!-- Clients Section
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
</section>-->

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

<?php $this->load->view('frontend/partial/view_footer'); ?>

<script>
$(document).ready(function()
{
    if($.cookie('modal_diskon')==null)
    {
        setTimeout(function() 
        {
            $('#modal_diskon').modal();
        },3000);
    }

    $('#modal_diskon_set_cookie').on('click',function()
    {
        $.cookie('modal_diskon', 'yes', { expires: 1, path: '/' });
    })

    $("#banner").owlCarousel(
        {
            autoplay:true,
            autoplayTimeout:5000,
            loop:true,
            items:1
        });

    $("#pop-product").owlCarousel(
        {
            autoplay:true,
            autoplayTimeout:5000,
            loop:true,
            autoWidth:true,
            items:1
        });

	<?php foreach($populer->result_array() as $i)
    {
        $id_brg             = $i['barang_id'];
	?>

	$('#button_keranjang<?php echo $id_brg; ?>').on('click',function()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>keranjang/tambah_keranjang',
            type            : 'POST',
            data            : {id_brg:$(this).attr('data-id'),nm_brg:$(this).attr('data-nama'),hrg_brg:$(this).attr('data-harga')},
            dataType        : 'JSON',
            success         : function(data)
            {
                swal({
                    title: "Barang Berhasil Dimasukkan Ke Keranjang",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ke Keranjang",
                    cancelButtonText: "Lanjut Belanja",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location.href='<?php echo base_url();?>keranjang';
                    }
                });
            }
        })
    })

    $('#button_favorit<?php echo $id_brg; ?>').on('click',function()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>user/barang/tambah_favorit',
            type            : 'POST',
            data            : {id_brg:$(this).attr('data-id')},
            dataType        : 'JSON',
            success         : function(data)
            {
                alert('Produk Berhasil Ditambahkan Ke Favorit Anda');
            }
        })
    })

	<?php } ?>
})
</script>
</body>
</html>
