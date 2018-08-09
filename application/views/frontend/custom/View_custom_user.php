<?php $this->load->view('frontend/partial/View_header'); ?>

    <!-- Hero Section-->
    <section class="hero-page bg-white-custom-3">
      <div class="container">
        <h1 class="h2 text-primary">Custom Design</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Custom Design</li>
          </ol>
        </nav>
      </div>
    </section>

    <!-- Submit Section-->
    <section class="submit-property bg-white-custom-3">
        <form action="<?php echo base_url();?>user/pembelian/pembelian_custom_user" method="POST" enctype="multipart/form-data">
        <div class="col-md-6">
        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tambah Data</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select id="step_prov" name="step_prov" class="form-control select2" required>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <select id="step_kab" name="step_kab" class="form-control select2" required>
                                        <option value="" selected>Pilih Kabupaten</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat Lengkap Pengiriman</label>
                                    <textarea class="form-control" name="tambah_alamat" id="tambah_alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Catatan Pembuatan</label>
                                    <textarea class="form-control" name="tambah_catatan" id="tambah_catatan" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Foto Design Anda</label>
                                    <br>
                                    <div class="image-upload">
                                        <input type="file" name="tambah_foto" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <button class="btn btn-success btn-lg" type="submit">Checkout</button>
        </div>
        </form>
    </section>
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
                <input type="email" name="email" placeholder="Enter your email address" class="form-control">
                <button type="submit" class="btn btn-gradient submit"><i class="icon-email-plane"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="copyrights bg-black-5">
        <div class="container text-center">
          <p>&copy; Copyrights 2017. Template by <a href="https://bootstrapious.com">dimas9c3@gmail.com</a></p>
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
      <p><img src="img/template-mac.png" alt="" class="img-fluid"></p>
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
    <script src="<?php echo base_url();?>vendors/frontend/js/swiper-thumbs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="<?php echo base_url();?>vendors/frontend/js/property-single-map.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

    <script>
        $('#step_style').on('change',function(data)
        {
            $.ajax
            ({
                url                 : '<?php echo base_url();?>custom/get_jenis_by_style_select',
                type                : 'POST',
                data                : {id_style:$(this).val()},
                dataType            : 'JSON',
                success             : function(data)
                {
                    var html        = '<option value="" selected>Pilih Jenis Produk</option>';
                    for(var i = 0;i<data.length;i++)
                    {
                        html    +=  '<option value="'+data[i].jenis_id+'">'+data[i].jenis_nama+'</option>';
                    }

                    $('#step_jenis').html(html);
                }
            })
        })

        $('#step_jenis').on('change',function(data)
        {
            $.ajax
            ({
                url                 : '<?php echo base_url();?>custom/get_material_by_jenis_select',
                type                : 'POST',
                data                : {id_jenis:$(this).val()},
                dataType            : 'JSON',
                success             : function(data)
                {
                    var html        = '<option value="" selected>Pilih Material Produk</option>';
                    for(var i = 0;i<data.length;i++)
                    {
                        html    +=  '<option value="'+data[i].material_id+'">'+data[i].material_nama+'</option>';
                    }

                    $('#step_material').html(html);
                }
            })
        })

        $('#step_material').on('change',function(data)
        {
            $.ajax
            ({
                url                 : '<?php echo base_url();?>custom/get_coating_by_material_select',
                type                : 'POST',
                data                : {id_material:$(this).val()},
                dataType            : 'JSON',
                success             : function(data)
                {
                    var html        = '<option value="" selected>Pilih Coating Produk</option>';
                    for(var i = 0;i<data.length;i++)
                    {
                        html    +=  '<option value="'+data[i].coating_id+'">'+data[i].coating_nama+'</option>';
                    }

                    $('#step_coating').html(html);
                }
            })
        })

        $('#step_coating').on('change',function(data)
        {
            $.ajax
            ({
                url                 : '<?php echo base_url();?>custom/get_jog_by_coating_select',
                type                : 'POST',
                data                : {id_coating:$(this).val()},
                dataType            : 'JSON',
                success             : function(data)
                {
                    var html        = '<option value="" selected>Pilih Jog Produk</option>';
                    for(var i = 0;i<data.length;i++)
                    {
                        html    +=  '<option value="'+data[i].jog_id+'">'+data[i].jog_nama+'</option>';
                    }

                    $('#step_jog').html(html);
                }
            })
        })

        $('#step_jog').on('change',function(data)
        {
            $.ajax
            ({
                url                 : '<?php echo base_url();?>custom/get_custom_by_kriteria',
                type                : 'POST',
                data                : {id_jog:$(this).val(),id_coating:$('#step_coating').val(),id_material:$('#step_material').val(),id_jenis:$('#step_jenis').val(),id_style:$('#step_style').val()},
                dataType            : 'JSON',
                success             : function(data)
                {
                    var html        = '<div style="background: url(<?php echo base_url().'assets/images/custom/';?>'+data[0].custom_foto+'); background-size: cover;" class="swiper-slide"></div>';

                   $('#id_custom').val(data[0].custom_id);

                    $('#preview-custom').html(html);
                }
            })
        })
            
        
    </script>
    <script>
    $(document).ready(function()
    {
        select_prov();

        function select_prov()
        {
            $.ajax
            ({
                url             : '<?php echo base_url();?>custom/get_prov_select',
                type            : 'AJAX',
                dataType        : 'JSON',
                success         : function(data)
                {
                    var html        = '<option value="" selected disabled>Pilih Provinsi</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        html    +=  '<option value="'+data[i].id_prov+'">'+data[i].nama+'</option>';
                    }
                    $('#step_prov').html(html);
                }
            })
        }

        $('#step_prov').on('change',function(data)
        {
            $.ajax
            ({
                url                 : '<?php echo base_url();?>custom/get_kab_by_prov_select',
                type                : 'POST',
                data                : {id_prov:$(this).val()},
                dataType            : 'JSON',
                success             : function(data)
                {
                    var html        = '<option value="" selected>Pilih Kabupaten</option>';
                    for(var i = 0;i<data.length;i++)
                    {
                        html    +=  '<option value="'+data[i].ongkir_id+'">'+data[i].ongkir_nama+'</option>';
                    }

                    $('#step_kab').html(html);
                }
            })
        })
    })
    </script>
  </body>
</html>