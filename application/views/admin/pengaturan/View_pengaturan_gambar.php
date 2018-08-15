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
	   		<div class="col-md-8">
			 	<div class="box box-info">
			   		<div class="box-body pad">
						<h4>Banner Depan</h4>
						<div class="table-responsive">
							<table id="tabel_data" class="table table-striped table-bordered table-hover" style="width: 100%;">
								<thead>
									<tr>
										<th>Gambar Banner</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="content_data">

								</tbody>
							</table>
						</div>
						<!-- /.table-responsive -->

			   		</div>
					<div class="box-footer">
						<button type="button" data-toggle="modal" data-target="#modal_tambah" class="btn btn-primary" name="button">Tambah Banner</button>
					</div>
			 	</div>
			 	<!-- /.box -->
	   		</div>
	   		<!-- /.col-->
	 	</div>
	 	<!-- ./row -->

		<div class="row">
	   		<div class="col-md-8">
			 	<div class="box box-info">
			   		<div class="box-body pad">
						<h4>Promo & Event</h4>
						<div class="table-responsive">
							<table id="tabel_data_iklan" class="table table-striped table-bordered table-hover" style="width: 100%;">
								<thead>
									<tr>
										<th>Gambar Iklan</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="content_data_iklan">

								</tbody>
							</table>
						</div>
						<!-- /.table-responsive -->

			   		</div>
					<div class="box-footer">
						<button type="button" data-toggle="modal" data-target="#modal_tambah_iklan" class="btn btn-primary" name="button">Tambah Iklan</button>
					</div>
			 	</div>
			 	<!-- /.box -->
	   		</div>
	   		<!-- /.col-->
	 	</div>
	 	<!-- ./row -->

		<div class="modal fade" id="modal_tambah_iklan" tabindex="-1" role="dialog" aria-labelledby="ModalProduk">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content modal_diskon" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
				<form action="<?php echo site_url('admin/pengaturan/simpan_iklan'); ?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
						  <label for="">Gambar</label>
						  <input type="file" class="form-control" id="tambah_foto" name="tambah_foto">
						  <p class="help-block">Pilih Gambar Yang Akan Dijadikan Banner</p>
						</div>
						<div class="form-group">
						  <label for="">Text</label>
						  <textarea name="iklan" rows="8" class="form-control"></textarea>
						  <p class="help-block">Text Iklan</p>
						</div>
	                </div>
	                <div class="modal-footer">
						<a class="btn btn-primary pull-left" data-dismiss="modal" href="#">Tutup</a>
	                    <button type="submit" class="btn btn-primary pull-right" name="button">Simpan</button>
	                </div>
				</form>

            </div>
        </div>
    </div>



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

	$('#content_data').on('click','.btn-hapus',function()
    {
        var id              = $(this).attr('id');
        var foto            = $(this).attr('foto');
        swal({
            title: "Apakah anda yakin akan menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
            $.ajax
                ({
                    url         : '<?php echo base_url();?>admin/pengaturan/delete_banner',
                    type        : 'POST',
                    data        : {id:id,foto:foto},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
                        swal(
                        {
                            title       : "Yay!",
                            text        : "Data Berhasil Dihapus",
                            type        : "success",
                            timer       : 1000,
                            showConfirmButton : false
                        });
                    }
                })

            }
        });
    })

	$('#content_data').on('click','.btn-tampil',function()
    {
        var id              = $(this).attr('id');
        swal({
            title: "Apakah anda yakin akan menampilkan data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
            $.ajax
                ({
                    url         : '<?php echo base_url();?>admin/pengaturan/tampil_banner',
                    type        : 'POST',
                    data        : {id:id},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
                        swal(
                        {
                            title       : "Yay!",
                            text        : "Data Berhasil Ditampilkan",
                            type        : "success",
                            timer       : 1000,
                            showConfirmButton : false
                        });
                    }
                })

            }
        });
    })

	$('#content_data').on('click','.btn-sembunyi',function()
    {
        var id              = $(this).attr('id');
        swal({
            title: "Apakah anda yakin akan menyembunyikan dari halaman depan data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
            $.ajax
                ({
                    url         : '<?php echo base_url();?>admin/pengaturan/sembunyi_banner',
                    type        : 'POST',
                    data        : {id:id},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
                        swal(
                        {
                            title       : "Yay!",
                            text        : "Data Berhasil Disembunyikan",
                            type        : "success",
                            timer       : 1000,
                            showConfirmButton : false
                        });
                    }
                })

            }
        });
    })

	$('#content_data').on('click','.btn-hapus',function()
    {
        var id              = $(this).attr('id');
        var foto            = $(this).attr('foto');
        swal({
            title: "Apakah anda yakin akan menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
            $.ajax
                ({
                    url         : '<?php echo base_url();?>admin/pengaturan/delete_banner',
                    type        : 'POST',
                    data        : {id:id,foto:foto},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
                        swal(
                        {
                            title       : "Yay!",
                            text        : "Data Berhasil Dihapus",
                            type        : "success",
                            timer       : 1000,
                            showConfirmButton : false
                        });
                    }
                })

            }
        });
    })

	$('#content_data').on('click','.btn-tampil',function()
    {
        var id              = $(this).attr('id');
        swal({
            title: "Apakah anda yakin akan menampilkan data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
            $.ajax
                ({
                    url         : '<?php echo base_url();?>admin/pengaturan/tampil_banner',
                    type        : 'POST',
                    data        : {id:id},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
                        swal(
                        {
                            title       : "Yay!",
                            text        : "Data Berhasil Ditampilkan",
                            type        : "success",
                            timer       : 1000,
                            showConfirmButton : false
                        });
                    }
                })

            }
        });
    })

	$('#content_data').on('click','.btn-sembunyi',function()
    {
        var id              = $(this).attr('id');
        swal({
            title: "Apakah anda yakin akan menyembunyikan dari halaman depan data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
            $.ajax
                ({
                    url         : '<?php echo base_url();?>admin/pengaturan/sembunyi_banner',
                    type        : 'POST',
                    data        : {id:id},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
                        swal(
                        {
                            title       : "Yay!",
                            text        : "Data Berhasil Disembunyikan",
                            type        : "success",
                            timer       : 1000,
                            showConfirmButton : false
                        });
                    }
                })

            }
        });
    })

	/* ==== DATATABLE ==== */
    var tabel_data =  $('#tabel_data').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']],
            //"serverSide": true,
            /*"columnDefs":
            [
                { "orderable": false, "targets": 4}
            ],*/
            ajax            :
            {
                url         : '<?php echo base_url();?>admin/pengaturan/get_all_banner',
                type        : 'POST',
                dataSrc     : 'data',
            },
            fixedHeader     : true,
            paging          : true,
            pageLength      : 25,
            lengthChange    : true,
            searching       : true,
            search          :
            {
                smart       : false,
                regex       : true,
                caseInsen       : true,
            },
            aaSorting       : [],
            ordering        : true,
            info            : true

    })

	/* ==== DATATABLE ==== */
    var tabel_data =  $('#tabel_data_iklan').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']],
            //"serverSide": true,
            /*"columnDefs":
            [
                { "orderable": false, "targets": 4}
            ],*/
            ajax            :
            {
                url         : '<?php echo base_url();?>admin/pengaturan/get_all_iklan',
                type        : 'POST',
                dataSrc     : 'data',
            },
            fixedHeader     : true,
            paging          : true,
            pageLength      : 25,
            lengthChange    : true,
            searching       : true,
            search          :
            {
                smart       : false,
                regex       : true,
                caseInsen       : true,
            },
            aaSorting       : [],
            ordering        : true,
            info            : true

    })
})
</script>
