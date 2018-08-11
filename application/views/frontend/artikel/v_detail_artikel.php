<?php $this->load->view('frontend/partial/View_header'); ?>

<div class="product-page article">
	<section class="page-heading page-heading-light">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<h2 class="text-primary mb-0">Artikel</h2>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>home">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Artikel</a></li>
						<li class="breadcrumb-item active">Judul Artikel</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="featured-image pt-0">
		<!--
		* Pilih model full width atau boxed
		* Full width (tanpa container)
		-->

		<!--
		<div class="container">
			<div class="row">
				<div class="col"> -->
					<img class="img-responsive" src="<?php echo site_url('assets/images/Article.jpg'); ?>" alt="Title Article in Here">
				<!-- </div>
			</div>
		</div>
		-->
	</section>

	<section class="main-article">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header-article">
						<h2>Lorem Ipsum Dolor Sit Amet</h2>
						<ul class="meta-post">
							<li>Terposting pada 25 Agustus 2018</li>
							<li>Oleh Administrator</li>
							<li>
								<a href="#" rel="category tag">Fashion</a>,
								<a href="#" rel="category tag">Informations</a>,
								<a href="#" rel="category tag">SmartPhone</a>
							</li>
						</ul>
					</div>
					<div class="content-article mt-4">
						<p align="justify">
							orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
							ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
							reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
							mollit anim id est laborum.
						</p>
						<p align="justify">
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
							laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
							architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
							sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
							voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
							consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
							et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
							exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
							Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
							consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
						</p>
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






<!-- Hero Section-->
<section class="hero-page bg-white-custom-3">
    <div class="container">
        <h1 class="h2 text-primary">Artikel</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Artikel</li>
            </ol>
        </nav>
    </div>
</section>
<?php
    $row                    = $detail->row_array();
    $id_artikel             = $row['artikel_id'];
    $judul                  = $row['artikel_judul'];
    $isi                    = $row['artikel_isi'];
    $foto                   = $row['artikel_foto'];
?>
<!-- Artikel Section-->
<section class="about-brief bg-white-custom-3">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12 mb-5"><img src="<?php echo base_url().'assets/images/artikel/'.$foto; ?>" class="img-responsive artikel-thumb"></div>
            <div class="col-md-12">
                <h2 class="h3 text-thin has-line"><?php echo $judul; ?></h2>
                <p class="template-text"><?php echo $isi; ?></p>
            </div>

        </div>
    </div>
</section>

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
