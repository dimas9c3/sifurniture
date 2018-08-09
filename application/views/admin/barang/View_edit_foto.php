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
            <li>Master Barang</li>
            <li>Data Master Barang</li>
            <li class="active">Data Foto Barang</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-success btn-flat" href="<?php echo base_url();?>admin/barang"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                            <a class="btn btn-success btn-flat float-right" href="<?php echo base_url();?>admin/barang/edit_barang/<?php echo $this->uri->segment(4);?>"><span class="fa fa-plus"></span> Tambah Foto</a>
                        <!-- /.box-header -->
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tabel_data" class="table table-striped table-bordered table-hover" style="width: 50%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Foto Utama</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_data">
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                            <div class="table-responsive">
                                <table id="tabel_data2" class="table table-striped table-bordered table-hover" style="width: 50%;">
                                    <thead>
                                        <tr>
                                            <th>Foto Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_data2">
                                    
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
                                    <label for="exampleInputEmail1">Nama Kategori</label>
                                    <input type="text" name="tambah_nama" id="tambah_nama" class="form-control" placeholder="Input Nama Kategori">
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
                                    <label for="exampleInputEmail1">Nama Kategori</label>
                                    <input type="hidden" name="edit_id" id="edit_id" value="">
                                    <input type="text" name="edit_nama" id="edit_nama" class="form-control" value="">
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
    /* ==== CRUD FUNCTION ==== */
    $('#tambah_submit').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/barang/set_kategori',
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

    $('#content_data2').on('click','.item-hapus',function()
    {
        var id      = $(this).attr('data');
        var nama    = $(this).attr('foto');
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
                    url         : '<?php echo base_url();?>admin/barang/delete_foto_barang_by_id',
                    type        : 'POST',
                    data        : {hapus_id:id,hapus_nama:nama},
                    success     : function(data)
                    {
                        tabel_data2.ajax.reload();
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

     $('#content_data2').on('click','.item-utama',function()
    {
        var id      = $(this).attr('data');
        var barang  = $(this).attr('barang');
        swal({
            title: "Apakah anda yakin akan menjadikan foto ini sebagai foto utama?",
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
                    url         : '<?php echo base_url();?>admin/barang/set_foto_utama',
                    type        : 'POST',
                    data        : {foto_barang_id:id,barang_id:barang},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
                        tabel_data2.ajax.reload();
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
                    
            }
        });
    })

    var id_barang           = '<?php echo $this->uri->segment(4); ?>';
    /* ==== DATATABLE ==== */
    var tabel_data =  $('#tabel_data').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']], 
            //"serverSide": true, 
            "columnDefs": 
            [
                { "orderable": false, "targets": 0}
            ],
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/barang/get_foto_utama_barang_by_id',
                type        : 'POST',
                data        : {id_barang:id_barang},
                dataSrc     : 'data',
            },
            fixedHeader     : true,
            paging          : false,
            pageLength      : 25,
            lengthChange    : false,
            searching       : false,
            search          : 
            {
                smart       : false,
                regex       : true,
                caseInsen       : true,
            },
            aaSorting       : [],
            ordering        : true,
            info            : false,
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

    var tabel_data2 =  $('#tabel_data2').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']], 
            //"serverSide": true, 
            "columnDefs": 
            [
                { "orderable": false, "targets": 0}
            ],
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/barang/get_foto_barang_by_id',
                type        : 'POST',
                data        : {id_barang:id_barang},
                dataSrc     : 'data',
            },
            fixedHeader     : true,
            paging          : false,
            pageLength      : 25,
            lengthChange    : false,
            searching       : false,
            search          : 
            {
                smart       : false,
                regex       : true,
                caseInsen       : true,
            },
            aaSorting       : [],
            ordering        : true,
            info            : false,
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
})
</script>