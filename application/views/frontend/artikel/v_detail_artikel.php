<?php $this->load->view('frontend/partial/View_header'); ?>
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