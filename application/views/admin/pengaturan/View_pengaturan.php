<?php
    $this->load->view('admin/partial/View_header');
    $this->load->view('admin/partial/View_sidebar_left');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pengaturan</li>
        </ol>
    </section>

	<!-- Main content -->
   	<section class="content">
	 	<div class="row">
	   		<div class="col-md-6">
			 	<div class="box box-info">
			   		<div class="box-body pad">
				 	<form>
						<div class="form-group">
						  <label for="">Whatsapp</label>
						  <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="">
						  <p class="help-block">Nomor Untuk Chat Semua Transaksi</p>
						</div>
						<div class="form-group">
						  <label for="">Telepon</label>
						  <input type="text" name="telepon" class="form-control" id="telepon" value="">
						  <p class="help-block">Nomor Untuk Menghubungi Admin</p>
						</div>
						<div class="form-group">
						  <label for="">Alamat</label>
						  <textarea class="form-control" name="alamat" rows="8"></textarea>
						  <p class="help-block">Alamat Kantor Anda Untuk Ditampilkan Pada Website</p>
						</div>
						<div class="form-group">
						  <label for="">Jam Operasional</label>
						 	<input type="text" class="form-control" name="operasional" id="operasional" value="">
						  <p class="help-block">Jam Operasional Kantor Anda</p>
						</div>
				 	</form>
			   		</div>
			 	</div>
			 	<!-- /.box -->
	   		</div>
	   		<!-- /.col-->
	 	</div>
	 	<!-- ./row -->
   	</section>
   	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
    $this->load->view('admin/partial/View_sidebar_right');
    $this->load->view('admin/partial/View_footer');
?>

<script>
$(document).ready(function()
{
    CKEDITOR.replace('editor1');
})
</script>
