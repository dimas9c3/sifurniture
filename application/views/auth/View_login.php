<?php $this->load->view('frontend/partial/View_header'); ?>
    <!-- Hero Section-->
    <section class="hero-page bg-white-3">
      <div class="container">
        <h1 class="h2 text-primary">User Area</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">User Login</li>
          </ol>
        </nav>
      </div>
    </section>
    <section class="customer-login bg-white-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="has-line">Login</h2>
            <h4 class="text-thin">Sudah Menjadi Member?</h4>
            <p>Silahkan Login dengan menggunakan akun anda dengan mengisi form dibawah. Jika belum Silahkan melakukan register pada form disebelah.</p>
            <hr>
            <div id="infoMessage"><?php echo $message;?></div>
            <form action="<?php echo base_url().'auth/login' ?>" method="post">
              <div class="form-group">
                 <input type="text" name="identity" id="identity" class="form-control" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
               <input type="password" name="password" id="password" class="form-control" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-gradient">Login</button>
              </div>
            </form>
          </div>
          <?php
            $c1      = rand(1,9);
            $c2      = rand(1,9);
            $c3      = rand(1,9);
            $c4      = rand(1,9);

            $captcha        = $c1.$c2.$c3.$c4;
        ?>
          <div class="col-lg-6 mt-5 mt-lg-0">
            <h2 class="has-line"> Register Akun</h2>
            <h4 class="text-thin">Belum menjadi member?</h4>
            <p>Silahkan membuat akun untuk mulai bertransaksi pada website kami. dapatkan keuntungan dan diskon setiap hari</p>
            <hr>
            <div id="infoMessage"><?php echo $message;?></div>
            <form action="<?php echo base_url();?>auth/create_user" method="POST" enctype="multipart/form-data" class="login-form">
              <div class="form-group">
                <input type="text"  maxlength="50" name="first_name" id="first_name" class="form-control" placeholder="Ketik Nama Awal anda" required>
              </div>
              <div class="form-group">
                <input type="text"  maxlength="50" name="last_name" id="last_name" class="form-control" placeholder="Ketik Nama Terakhir Anda" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Ketik Email Anda" class="form-control">
              </div>
              <div class="form-group">
                <input type="number"  maxlength="20" name="phone" id="phone" class="form-control" placeholder="Ketik Nomor Telepon Anda" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="address" id="address" rows="5" placeholder="Input Alamat Lengkap Anda"></textarea>
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Ketik Password Anda. Minimal 8 Karakter" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password_confirm" id="password_confirm" placeholder="Ketik Lagi Password Anda" class="form-control">
              </div>
              <div class="form-group">
                <input type="hidden" name="captcha_valid" id="captcha_valid" value="<?php echo $captcha; ?>" class="form-control">
                <input type="number" name="captcha" id="captcha" value="<?php echo $captcha; ?>" class="form-control" disabled>
              </div>
            <div class="form-group">
                <input type="number" name="captcha_confirm" id="captcha_confirm" placeholder="Ketik Kode Angka Captcha Diatas" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-gradient">Daftar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Clients Section            -->
<?php $this->load->view('frontend/partial/view_footer'); ?>
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='../../../www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
    <?php if($this->session->flashdata('msg')=='captcha_salah'):?>
        <script type="text/javascript">
            swal({
            title: "Inputan Salah",
            text: "Captcha Yang Anda Inputkan Salah",
            type: "error",
            confirmButtonText: "OK"
        });
        </script>
    <?php endif; ?>
    <?php if($this->session->flashdata('msg')=='daftar_sukses'):?>
        <script type="text/javascript">
            swal({
            title: "Yay!",
            text: "Pendaftaran anda berhasil, silahkan login ke sistem.",
            type: "success",
            confirmButtonText: "OK"
        });
        </script>
    <?php endif; ?>
     <?php if($this->session->flashdata('msg')=='inputan_salah'):?>
        <script type="text/javascript">
            swal({
            title: "Maaf",
            text: "Data yang anda inputkan tidak valid silahkan cek dibawah untuk melihat keterangan.",
            type: "error",
            confirmButtonText: "OK"
        });
        </script>
    <?php endif; ?>
  </body>
</html>
