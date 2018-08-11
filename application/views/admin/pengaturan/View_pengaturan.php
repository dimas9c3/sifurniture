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

<<<<<<< HEAD
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
=======
    <!-- Main content -->
    <section class="content container-fluid">
		<div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                             <a class="btn btn-success btn-flat" href="<?php echo base_url();?>admin/barang/tambah_barang"><span class="fa fa-plus"></span> Tambah Data</a>
                        <!-- /.box-header -->
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tabel_data" class="table table-striped table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="height: 60px;">No</th>
                                            <th>Foto Utama</th>
                                            <th>ID Barang</th>
                                            <th>Kategori | Subkategori</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Jual</th>
                                            <th>Diskon</th>
                                            <th>Harga Akhir</th>
                                            <th style="min-width: 15%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_data">

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-xs-12 -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
>>>>>>> design
</div>
<!-- /.content-wrapper -->
<?php
    $this->load->view('admin/partial/View_sidebar_right');
    $this->load->view('admin/partial/View_footer');
?>
<<<<<<< HEAD
<script>
$(document).ready(function()
{
    CKEDITOR.replace('editor1');
})
</script>
=======
>>>>>>> design
