<?php   
    $this->load->view('user/partial/View_header');
    $this->load->view('user/partial/View_sidebar_left');
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
            <li>Transaksi Penjualan</li>
            <li class="active">Data Riwayat Pembelian</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tabel_data" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="height: 60px;">NO</th>
                                            <th>ID Transaksi</th>
                                            <th>Produk</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Subtotal</th>
                                            <th>Ongkir</th>
                                            <th>Total Pembayaran</th>
                                            <th>Alamat Pengiriman</th>
                                            <th>Status Pelunasan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_data">
                                    
                                    </tbody>
                                    <tfoot id="tabel_footer">
                                       
                                    </tfoot>
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
                                <h3 class="box-title">Upload Bukti Transfer</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Upload Foto Bukti Transfer</label>
                                    <input type="hidden" name="tambah_id" id="tambah_id">
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
                                    <label for="exampleInputEmail1">Nama Kategori</label>
                                    <input type="hidden" name="edit_id" id="edit_id" value="">
                                    <input type="text" name="edit_nama" id="edit_nama" class="form-control" value="" required>
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
    $this->load->view('user/partial/View_sidebar_right');
    $this->load->view('user/partial/View_footer');
?>
<script>
$(document).ready(function()
{
    

    $('#content_data').on('click','.item-tambah',function()
    {
        var id          = $(this).attr('data');
        $('#tambah_id').val(id);
    })

    /* ==== CRUD FUNCTION ==== */
    $('#content_data').on('click','.item-tambah',function()
    {
        var id      = $(this).attr('data');
        swal({
            title: "Apakah anda yakin akan penjualan ini sudah valid ?",
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
                    url         : '<?php echo base_url();?>admin/penjualan/validasi_penjualan',
                    type        : 'POST',
                    data        : {id_penjualan:id},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
                        total_pembelian()
                        swal(
                        {
                            title       : "Yay!",
                            text        : "Penjualan berhasil divalidasi. email dan notifikasi telah dikirimkan kepada pembeli jika pembelian sudah valid.",
                            type        : "success",
                            timer       : 1000,
                            showConfirmButton : false
                        });
                    }
                })
                    
            }
        });
    })

    $('#content_data').on('click','.item-batal',function()
    {
        var id      = $(this).attr('data');
        swal({
            title: "Apakah anda yakin akan membatalkan pembelian ?",
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
                    url         : '<?php echo base_url();?>user/pembelian/batal_pembelian',
                    type        : 'POST',
                    data        : {id_penjualan:id},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
                        total_pembelian()
                        swal(
                        {
                            title       : "Yay!",
                            text        : "Pembelian anda berhasil dibatalkan.",
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
                url         : '<?php echo base_url();?>user/pembelian/get_riwayat_pembelian_by_id_customer',
                type        : 'POST',
                dataSrc     : 'data',
            },
            fixedHeader     : true,
            paging          : true,
            pageLength      : 25,
            lengthChange    : true,
            searching       : false,
            search          : 
            {
                smart       : false,
                regex       : true,
                caseInsen       : true,
            },
            aaSorting       : [],
            ordering        : false,
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

    <?php if($this->session->flashdata('msg')=='sukses_simpan'):?>
            swal({
            title: "Yay!",
            text: "Data Pembelian anda telah tersimpan, silahkan upload bukti pembayaran jika sudah melakukan transfer.",
            type: "success",
            confirmButtonText: "OK"
        });
    <?php endif; ?>

})
</script>