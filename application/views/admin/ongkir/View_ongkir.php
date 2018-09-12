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
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Ulasan Anda</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
               
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal_tambah" id="btn-modal-tambah"  id="modal-tambah"><span class="fa fa-plus"></span> Tambah Data</a>
                             
                        <!-- /.box-header -->
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tabel_data" class="table table-striped table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="height: 60px;">No</th>
                                            <th>Provinsi</th>
                                            <th>Nama Kabupaten</th>
                                            <th>Ongkos Kirim</th>
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
         <div class="text-center">
                    <div class="progress center-block" id="loader-icon" style="width:200px; display: none;"> <!-- set to certain width -->
                        <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%;">
                            <span>
                                Loading...
                            </span>
                        </div>
                    </div>
                </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="modal_tambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="tambah_submit">
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Tambah Data</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Provinsi</label>
                                    <select id="tambah_prov" name="tambah_prov" class="form-control select2" style="width: 100%;" required>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kabupaten</label>
                                    <input type="text" id="tambah_nama" name="tambah_nama" placeholder="Input Nama Kabupaten" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tarif Ongkir</label>
                                    <input type="number" id="tambah_tarif" name="tambah_tarif" placeholder="Input Ongkos Kirim" required class="form-control">
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Edit -->
        <div class="modal fade" id="modal_edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="edit_submit">
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Edit Data</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Provinsi</label>
                                    <select id="edit_prov" name="edit_prov" class="form-control select2" style="width: 100%;" required>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kabupaten</label>
                                    <input type="hidden" id="edit_id" name="edit_id" value="">
                                    <input type="text" id="edit_nama" name="edit_nama" value="" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tarif Ongkir</label>
                                    <input type="number" id="edit_tarif" name="edit_tarif" value="" required class="form-control">
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

         <!-- Modal Tambah -->
        <div class="modal fade" id="modal_loading">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <div class="modal-body">
                        <div class="box box-success">
                            <p>Loading</p>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" id="edit_button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </section>
    <!-- /.content container-fluid -->
</div>
<!-- /.content-wrapper -->
<?php
    $this->load->view('admin/partial/View_sidebar_right');
    $this->load->view('admin/partial/View_footer');
?>
<script>
$(document).ready(function()
{
    $('.select2').select2();

    select_provinsi()

    function select_provinsi()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/ongkir/get_select_provinsi',
            type            : 'GET',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html       = '<option value="" selected>Pilih Provinsi</option>'

                for(var i=0;i<data.length;i++)
                {
                    html        += '<option value="'+data[i].id_prov+'">'+data[i].nama+'</option>';
                }

                $('#tambah_prov').html(html);
                $('#edit_prov').html(html);
            }
        })
    }

    $('#content_data').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/ongkir/get_ongkir_by_id',
            type        : 'POST',
            dataType    : 'JSON',
            data        : {id_ongkir:id},
            success     : function(data)
            {
                $('#edit_nama').val(data.ongkir_nama);
                $('#edit_tarif').val(data.ongkir_tarif);
                $('#edit_id').val(data.ongkir_id);
                $('#edit_prov').val(data.id_prov).trigger('change');
                $('#modal_edit').modal('show');
            }
        })
    })

    /* ==== CRUD FUNCTION ==== */

    $('#tambah_submit').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/ongkir/set_ongkir',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data.ajax.reload();
                $('#modal_tambah').modal('hide');
                $('#tambah_nama').val('');
                $('#tambah_tarif').val('');
                swal(
                {
                    title       : "Yay!",
                    text        : "Data Berhasil Disimpan",
                    type        : "success",
                    timer       : 1000,
                    showConfirmButton : false
                });
            }
        })
    })

    $('#edit_submit').submit(function(e)
    {
        e.preventDefault();
        $('#loader-icon').show();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/ongkir/update_ongkir',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
               // $('#loader-icon').hide();
                tabel_data.ajax.reload();
                //$('#modal_edit').modal('hide');
                $('#edit_nama').val('');
                $('#edit_tarif').val('');
                /*swal(
                {
                    title       : "Yay!",
                    text        : "Data Berhasil Diedit",
                    type        : "success",
                    timer       : 1000,
                    showConfirmButton : false
                });*/
            }
        })
    })

    $('#content_data').on('click','.item-hapus',function()
    {
        var id              = $(this).attr('data');
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
                    url         : '<?php echo base_url();?>admin/ongkir/delete_ongkir',
                    type        : 'POST',
                    data        : {hapus_id:id},
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

    /* ==== DATATABLE ==== */
    var tabel_data =  $('#tabel_data').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']], 
            //"serverSide": true, 
            "columnDefs": 
            [
                { "orderable": false, "targets": 3}
            ],
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/ongkir/get_all_ongkir',
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
            info            : true,
    })
})
</script>