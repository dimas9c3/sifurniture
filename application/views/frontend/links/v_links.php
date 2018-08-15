<?php $this->load->view('frontend/partial/View_header'); ?>
<?php
	$row 		 	= $links->row_array();
	$tit 			= $row['theme_option_links_title'];
	$isi 			= $row['theme_option_links'];
?>
<div class="product-page article">
	<section class="page-heading page-heading-light">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<h2 class="text-primary mb-0">Pusat Bantuan</h2>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="#"><?php echo $tit; ?></a></li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<!--<section class="featured-image pt-0">
		<!--
		* Pilih model full width atau boxed
		* Full width (tanpa container)
		-->

		<!--
		<div class="container">
			<div class="row">
				<div class="col"> -->
					<img class="img-responsive" src="">
				<!-- </div>
			</div>
		</div>
	</section>-->

	<section class="main-article">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header-article">
						<h2><?php echo $tit; ?></h2>
						<ul class="meta-post">
							<!--<li>Terposting pada 25 Agustus 2018</li>-->
							<li>Oleh Administrator</li>
							<!--<li>
								<a href="#" rel="category tag">Fashion</a>,
								<a href="#" rel="category tag">Informations</a>,
								<a href="#" rel="category tag">SmartPhone</a>
							</li>-->
						</ul>
					</div>
					<div class="content-article mt-4">
						<?php echo $isi; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="share-article">
				<div class="row align-items-center">
					<div class="col-md-6">
						Bagikan artikel ini :
					</div>
					<div class="col-md-6">
						<ul class="social-media mb-0">
							<li><a target="_blank" href="#" title="Facebook Share"><i class="fa fa-facebook"></i></a></li>
							<li><a target="_blank" href="#" title="Twitter Share"><i class="fa fa-twitter"></i></a></li>
							<li><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a target="_blank" href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('frontend/partial/view_footer'); ?>
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
