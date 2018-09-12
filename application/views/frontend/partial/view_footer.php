    <!-- Scroll Top Button        -->
    <div id="scrollTopButton"><i class="fa fa-long-arrow-up"></i></div>

    <footer class="footer bg-black-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 brief">
                    <div class="logo"><img src="<?php echo base_url();?>vendors/frontend/img/logo-light.png" alt="..." width="170"></div>
                        <p>property murah namun dengan bahan dan kualitas terbaik itulah kami, segera order furniture pada gerai kami di kota anda. dapatkan diskon besar besaran setiap hari.</p>
                </div>
                 <div class="col-lg-3 links">
                    <h3 class="h4 text-thin text-uppercase">Metode Pembayaran</h3>
                    <ul class="list-unstyled">
                        <li><img src="<?php echo base_url();?>vendors/frontend/img/bank_5.png" alt="undefined"></li>
                        <li><img src="<?php echo base_url();?>vendors/frontend/img/bank_4.png" alt="undefined"></li>
                    </ul>
                </div>
                <div class="col-lg-3 links">
                    <h3 class="h4 text-thin text-uppercase">Company</h3>
                    <ul class="list-unstyled">
						<?php $query		= $this->Model_pengaturan->get_all_setting();
							foreach($query->result_array() as $i)
							{
								$id_links 			= $i['theme_option_id'];
								$tit 				= $i['theme_option_links_title'];
						?>
                        	<li><a href="<?php echo site_url('home/links/').$id_links; ?>"><?php echo $tit; ?></a></li>
						<?php } ?>
                    </ul>
                </div>
                <div class="col-lg-3 links">
                    <h3 class="h4 text-thin text-uppercase">Support</h3>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('home/faq'); ?>">Help & FAQ</a></li>
                        <li><a href="<?php echo site_url('home/privacy'); ?>">Policy Privacy</a></li>
                        <li><a href="<?php echo site_url('home/contact'); ?>">Contact Us</a></li>
                        <li><a href="<?php echo site_url('home/career'); ?>">Careers</a></li>
                        <li><a href="<?php echo site_url('home/partner'); ?>">Our Partners</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyrights bg-black-5">
            <div class="container text-center">
                <p>&copy; Copyrights 2018. <a href="#">I'Woodys.com | Furniture & Interior</a></p>
            </div>
        </div>
    </footer>

<!-- Javascript files-->
<script src="<?php echo base_url();?>vendors/frontend/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>vendors/frontend/vendor/popper.js/umd/popper.min.js"> </script>
<script src="<?php echo base_url();?>vendors/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>vendors/frontend/vendor/bootstrap-select/js/bootstrap-select.js"></script>
<script src="<?php echo base_url();?>vendors/frontend/vendor/swiper/js/swiper.js"></script>
<script src="<?php echo base_url();?>vendors/frontend/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="<?php echo base_url();?>vendors/frontend/js/front.js?version=51"></script>
<script src="<?php echo base_url();?>assets/custom.js"></script>
<!-- Sweetalert -->
<script src="<?php echo base_url();?>vendors/plugins/sweetalert/sweetalert.min.js"></script>
<!-- OWL CAROUSEL -->
<script type="text/javascript" src="<?php echo base_url('vendors/plugins/owl/dist/owl.carousel.min.js');?>"></script>
