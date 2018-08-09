<?php $this->load->view('frontend/partial/View_header'); ?>
    <!-- Hero Section-->
    <?php 
        $row        = $barang->row_array();
        $nm_kategori            = $row['kategori_nama'];
        $id_sub_kategori        = $row['sub_kategori_id'];
        $nm_sub_kategori        = $row['sub_kategori_nama'];
    ?>
    <section class="property-grid-sidebar bg-white-3">
      <div class="container">
        <h2><span class="text-primary">List Produk</span></h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>home">Home</a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo $nm_kategori; ?></a></li>
            <li aria-current="page" class="breadcrumb-item active"><?php echo $nm_sub_kategori; ?></li>
          </ol>
        </nav>
        <!-- Filters-->
        <form action="<?php echo base_url();?>barang/filter/<?php echo $id_sub_kategori; ?>" method="post" enctype="multipart/form-data">
        <div class="filter filter-section d-flex justify-content-between align-items-center flex-wrap bg-white-5">
          <div class="sort d-flex align-items-left"><strong>Sorting Produk</strong>
            <select id="propertyFilter" name="filter_barang" class="selectpicker" required>
              <option value="#" disabled selected>Pilih Jenis Filter</option>
              <option value="1">Harga Tinggi Ke Rendah</option>
              <option value="2">Harga Rendah Ke Tinggi</option>
            </select>
          </div>
        </div>
        </form>
        <div class="row"> 
          <!-- Property Listings-->
          <div class="property-listing col-lg-12">
            <div class="row">
                <?php 
                $no         = 0;
                foreach($barang->result_array() as $i)
                {
                    $no++;
                    $id_barang          = $i['barang_id'];
                    $nm_barang          = $i['barang_nama'];
                    $hrg_jual           = $i['barang_harga_jual'];
                    $diskon             = $i['barang_diskon']." %";
                    $hrg_akhir          = "Rp. ".number_format($i['barang_harga_jual']-($i['barang_harga_jual']*($i['barang_diskon']/100)));
                    $foto_utama         = $i['foto_barang_nama'];
                    ?>
              <div class="col-lg-3">
                <div class="property-listing-item">
                  <div class="image"><a href="<?php echo base_url().'barang/detail/'.$id_barang; ?>" class="no-anchor-style"><img src="<?php echo base_url().'assets/images/barang/'.$foto_utama; ?>" alt=" The Chalet Estate" class="img-fluid"></a>
                     <div class="price"><?php echo $diskon."</br>"; ?> </div>
                     <div class="price"><?php echo "<strike>Rp. ".number_format($hrg_jual)."</strike> ".$hrg_akhir; ?> </div>
                  </div>
                  <div class="col-md-12">
                  <div class="info">
                    <a href="<?php echo base_url().'barang/detail/'.$id_barang; ?>" class="no-anchor-style">
                      <h2 class="h4 text-primary"> <?php echo $nm_barang; ?></h2></a>
                        <button id="button_keranjang<?php echo $id_barang; ?>" data-id="<?php echo $id_barang; ?>" data-nama="<?php echo $nm_barang; ?>" data-harga="<?php echo $hrg_akhir; ?>" class="btn-primary"><i class="fa fa-cart-plus"></i></button>
                        <button id="button_favorit<?php echo $id_barang; ?>" data-id="<?php echo $id_barang; ?>" class="btn-primary"><i class="fa fa-heart"></i></button>
                        <button class="btn-primary"><a class="btn-primary" href="<?php echo base_url();?>custom/buat_custom">Custom</a></button>
                  </div>
              </div>
                </div>
              </div>
          <?php } ?>
              
                 
                </div>
              </div>
            </div>
            <div class="property-listing-footer">
              <div class="d-flex justify-content-between align-items-center">
                <div class="left mt-5">
                  <p class="mb-0">Showing  <span class="text-primary"><?php echo $no; ?> </span> of  <span class="text-primary"><?php echo $total_row; ?></span></p>
                </div>
                <div class="right mt-5">
                  <nav aria-label="Page navigation example">
                    <?php echo $page; ?>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
   <button type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm hidden-xs hidden-sm"><!--<i class="fa fa-cog fa-2x"></i>--><span> Diskon <br>Up to 50%</span></button>
    <div id="style-switch" class="collapse">
      <h4 class="text-uppercase">Dapatkan diskon menarik setiap hari!!</h4>
      <!--<form class="mb-3">
        <select name="colour" id="colour" class="form-control">
          <option value="">select colour variant</option>
          <option value="red">red</option>
          <option value="pink">pink</option>
          <option value="green">green</option>
          <option value="violet">violet</option>
          <option value="sea">sea</option>
          <option value="default">blue</option>
        </select>
      </form>-->
      <p><img src="<?php echo base_url();?>vendors/frontend/img/template-mac.png" alt="" class="img-fluid"></p>
      <p class="text-muted text-small">Dapatkan keuntungan menarik membeli di toko kami setiap hari untuk semua produk!!</p>
    </div>
   <!-- Javascript files-->
    <script src="<?php echo base_url();?>vendors/frontend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url();?>vendors/frontend/vendor/swiper/js/swiper.js"></script>
    <script src="<?php echo base_url();?>vendors/frontend/js/front.js?version=51"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!-- Sweetalert -->
<script src="<?php echo base_url().'vendors/plugins/sweetalert/sweetalert.min.js'?>"></script>
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='../../../www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
    <script type="text/javascript">
      $('#propertyFilter').on('change',function()
      {
        window.location.href    = '<?php echo base_url();?>barang/filter/'+$(this).val()+'/<?php echo $id_sub_kategori;?>'
      })
    </script>
    <script type="text/javascript">
    <?php foreach($barang->result_array() as $i)
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
</script>
  </body>

<!-- Mirrored from demo.bootstrapious.com/real-estate/1-0/property.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Mar 2018 01:08:56 GMT -->
</html>