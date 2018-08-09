<?php $this->load->view('frontend/partial/View_header'); ?>
    <!-- Hero Section-->
    <?php 
        $row                = $sub1->row_array();
        $nm_sub1            = $row['sub_1_kategori_interior_nama'];
        $id_sub1            = $row['sub_1_kategori_interior_id'];
        $foto_sub1          = $row['sub_1_kategori_interior_foto'];

    ?>
    <section class="property-grid-sidebar bg-white-3">
      <div class="container">
        <h2><span class="text-primary">List Produk Interior <?php echo $nm_sub1; ?></span></h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>home">Home</a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo $nm_sub1; ?> </a></li>
          </ol>
        </nav>
        <!-- Filters-->
        <div class="row"> 
          <!-- Property Listings-->
          <div class="property-listing col-lg-12">
            <div class="row">
                <?php 
                foreach($list->result_array() as $i)
                {
                    $nm_kategori            = $i['sub_2_kategori_interior_nama'];
                    $id_kategori            = $i['sub_2_kategori_interior_id'];
                    $foto_kategori          = $i['sub_2_kategori_interior_foto'];
                ?>
                <div class="col-lg-3">
                    <div class="property-listing-item">
                        <div class="image"><a href="<?php echo base_url().'interior/jenis_interior/'.$id_sub1.'/'.$id_kategori; ?>" class="no-anchor-style"><img src="<?php echo base_url().'assets/images/sub_2_kategori_interior/'.$foto_kategori; ?>" alt=" The Chalet Estate" class="img-fluid"></a>
                        </div>
                        <div class="info">
                            <a href="<?php echo base_url().'interior/jenis_interior/'.$id_sub1.'/'.$id_kategori; ?>" class="no-anchor-style">
                            <h2 class="h4 text-primary"> <?php echo $nm_kategori; ?></h2></a>
                        </div>
                    </div>
                </div>
          <?php } ?> 
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

<!-- Mirrored from demo.bootstrapious.com/real-estate/1-0/property.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Mar 2018 01:08:56 GMT -->
</html>