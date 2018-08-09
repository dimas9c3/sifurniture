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
            <li>Master Interior</li>
            <li class="active">Data Kategori Utama Interior</li>
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
                                            <th>ID Kategori Interior</th>
                                            <th>Sub 1 Kategori Interior</th>
                                            <th>Sub 2 Kategori Interior</th>
                                            <th>Nama Kategori Interior</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
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
                                    <label for="exampleInputEmail1">Sub 1 Kategori Interior</label>
                                    <select class="form-control select2" name="tambah_sub1" id="tambah_sub1" style="width: 100%;" required>
                                    <option value="">-Pilih-</option>
                  
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Sub 2 Kategori Interior</label>
                                    <select class="form-control select2" name="tambah_sub2" id="tambah_sub2" style="width: 100%;" required>
                                    <option value="">-Pilih-</option>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kategori Interior</label>
                                    <input type="text" name="tambah_nama" id="tambah_nama" class="form-control" placeholder="Input Nama Kategori" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Foto</label>
                                    <input type="file" name="tambah_foto" id="tambah_foto" class="form-control" required>
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
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Edit Data</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub 1 Kategori Interior</label>
                                    <select class="form-control select2" name="edit_sub1" id="edit_sub1" style="width: 100%;" required>
                                    <option value="">-Pilih-</option>
                  
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Sub 2 Kategori Interior</label>
                                    <select class="form-control select2" name="edit_sub2" id="edit_sub2" style="width: 100%;" required>
                                    <option value="">-Pilih-</option>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kategori</label>
                                    <input type="hidden" name="edit_id" id="edit_id" value="">
                                    <input type="text" name="edit_nama" id="edit_nama" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Foto (Ukuran 512px X 512px)</label>
                                    <input type="hidden" name="edit_foto_old" id="edit_foto_old" value="">
                                    <input type="file" name="edit_foto" id="edit_foto" class="form-control">
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
    select_sub1()
    select_sub2()

    function select_sub1()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/interior/get_select_sub_1_kategori_ajax',
            type            : 'AJAX',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html        = '<option value="" selected disabled>Pilih</option>';
                for(var i=0;i<data.length;i++)
                {
                    html    +=  '<option value="'+data[i].sub_1_kategori_interior_id+'">'+data[i].sub_1_kategori_interior_nama+'</option>';
                }
                $('#tambah_sub1').html(html);
                $('#edit_sub1').html(html);
            }
        })
    }

    function select_sub2()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/interior/get_select_sub_2_kategori_ajax',
            type            : 'AJAX',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html        = '<option value="" selected disabled>Pilih</option>';
                for(var i=0;i<data.length;i++)
                {
                    html    +=  '<option value="'+data[i].sub_2_kategori_interior_id+'">'+data[i].sub_2_kategori_interior_nama+'</option>';
                }
                $('#tambah_sub2').html(html);
                $('#edit_sub2').html(html);
            }
        })
    }

    $('#content_data').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/interior/get_kategori_interior_by_id',
            type        : 'POST',
            data        : {id_kategori:id},
            dataType    : 'JSON',
            success     : function(data)
            {
                $('#edit_id').val(data.kategori_interior_id);
                $('#edit_nama').val(data.kategori_interior_nama);
                $('#edit_sub1').val(data.sub_1_kategori_interior_id).trigger('change');
                $('#edit_sub2').val(data.sub_2_kategori_interior_id).trigger('change');
                $('#edit_foto_old').val(data.kategori_interior_foto);
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
            url         : '<?php echo base_url();?>admin/interior/set_kategori_interior',
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
                $('#tambah_sub1').val('').trigger('change');
                $('#tambah_sub2').val('').trigger('change');
                $('#tambah_foto').val('');
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
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/interior/update_kategori_interior',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data.ajax.reload();
                $('#modal_edit').modal('hide');
                $('#edit_id').val('');
                $('#edit_nama').val('');
                $('#edit_sub1').val('').trigger('change');
                $('#edit_sub2').val('').trigger('change');
                $('#edit_foto').val('');
                swal(
                {
                    title       : "Yay!",
                    text        : "Data Berhasil Diedit",
                    type        : "success",
                    timer       : 1000,
                    showConfirmButton : false
                });
            }
        })
    })

    $('#content_data').on('click','.item-hapus',function()
    {
        var id      = $(this).attr('data');
        var foto    = $(this).attr('foto');
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
                    url         : '<?php echo base_url();?>admin/interior/delete_kategori_interior',
                    type        : 'POST',
                    data        : {hapus_id:id,foto:foto},
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
            /*"columnDefs": 
            [
                { "orderable": false, "targets": 7}
            ],*/
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/interior/get_all_kategori_interior',
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
            /*dom             : 'Bfrtip',
            buttons: 
            [
                {
                    extend: 'excelHtml5',
                    orientation: 'portrait',
                    pageSize: 'A4',
                    text: 'EXCEL',
                    exportOptions:
                    {
                        columns: [0,1,2,3]
                    },
                    footer: true
                },

                {
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    pageSize: 'A4',
                    text: 'PDF',
                    exportOptions:
                    {
                        columns: [0,1,2,3]
                    },
                    footer: true
                },

                { 
                    extend: 'print',
                    customize: function ( win ) 
                    {
                        $(win.document.body)
                            .css( 'font-size', '8pt' )
                           // .prepend(
                             //   '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                            //);
     
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    },
                    text: 'PRINT',
                    exportOptions: 
                    {
                        columns: [0,1,2,3]
                    },
                    footer: true
                }
                                
            ]*/
    })

    $('.select2').select2();
})
</script>