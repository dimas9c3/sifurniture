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
            <li><a href="<?php echo base_url();?>user"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Transaksi Custom Design</li>
            <li class="active">Data Pembelian Custom Design</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                             Transaksi anda akan segera diproses setelah anda melakukan DP 30% atau minimal DP. Silahkan Transfer Ke rekening :
                        <!-- /.box-header -->
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tabel_data" class="table table-striped table-bordered table-hover" style="width: 135%;">
                                    <thead>
                                        <tr>
                                            <th style="height: 60px;">Produk</th>
                                            <th>Detail Pesanan</th>
                                            <th>Harga</th>
                                            <th>Ongkir</th>
                                            <th>Total Pembayaran</th>
                                            <th>Minimal DP</th>
                                            <th>Jumlah Yang Sudah Dibayarkan</th>
                                            <th>Kekurangan</th>
                                            <th>Alamat Pengiriman</th>
                                            <th>Catatan</th>
                                            <th>Status Pelunasan</th>
                                            <th>Bukti Transfer</th>
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
                                    <label for="exampleInputEmail1">Jumlah Dibayarkan</label>
                                    <input type="number" name="tambah_dibayarkan" id="tambah_dibayarkan" placeholder="Input Jumlah Yang Anda Transfer" class="form-control" required>
                                </div>
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

        <!-- Modal Tambah -->
        <div class="modal fade" id="modal_edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="alamat_submit">
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Edit Transaksi</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Alamat Pengiriman</label>
                                    <input type="hidden" name="alamat_id" id="alamat_id">
                                    <textarea id="alamat" name="alamat" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea id="catatan" name="catatan" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Yang Harus Dibayarkan</label>
                                    <input type="number" name="edit_total" id="edit_total" value="" class="form-control" disabled>
                                    <input type="hidden" id="edit_total_2" name="edit_total_2" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah Dibayarkan</label>
                                    <input type="number" name="edit_dibayarkan" id="edit_dibayarkan" value="" class="form-control" disabled>
                                    <input type="hidden" name="edit_dibayarkan_2" id="edit_dibayarkan_2" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kekurangan Pembayaran</label>
                                    <input type="number" name="edit_kurang" id="edit_kurang" value="" class="form-control" disabled>
                                    <input type="hidden" id="edit_kurang_2" name="edit_kurang_2" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tambah Jumlah Yang Di Transfer</label>
                                    <input type="number" name="edit_transfer" id="edit_transfer" placeholder="Input Jumlah Yang Sudah Anda Transfer Lagi" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Perbarui Bukti Transfer</label>
                                    <input type="file" name="tambah_foto" id="edit_foto" class="form-control">
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

    $('#content_data').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url             : '<?php echo base_url();?>user/pembelian/get_pembelian_custom_by_id_penjualan',
            type            : 'POST',
            dataType        : 'JSON',
            data            : {id_penjualan:id},
            success         : function(data)
            {
                var ongkir          = parseInt(data[0].ongkir_tarif);
                var hrg             = parseInt(data[0].harga_jual);
                var total           = (ongkir+hrg);
                var dibayarkan      = parseInt(data[0].dibayarkan);
                var kekurangan      = total-dibayarkan;
                $('#alamat_id').val(data[0].penjualan_custom_id);
                $('#alamat').val(data[0].alamat);
                $('#edit_total').val(total);
                $('#edit_total_2').val(total);
                $('#edit_dibayarkan').val(dibayarkan);
                $('#edit_dibayarkan_2').val(dibayarkan);
                $('#catatan').val(data[0].catatan);
                $('#edit_kurang').val(kekurangan);
                $('#edit_kurang_2').val(kekurangan);
            }
        })
    })

    $('#content_data').on('click','.item-alamat',function()
    {
        var id          = $(this).attr('data');
        $('#alamat_id').val(id);
    })

    /* ==== CRUD FUNCTION ==== */
    $('#tambah_submit').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>user/pembelian/upload_transfer_custom',
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
                $('#tambah_foto').val('');
                swal({
                    title: "Selamat bukti transfer anda berhasil diupload, silahkan chat admin untuk segera memvalidasi data pembelian anda.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Chat Admin",
                    cancelButtonText: "OK",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location.href        = '<?php echo base_url();?>user';        
                    }
                });
            }
        })
    })

    $('#alamat_submit').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>user/pembelian/update_transaksi_custom',
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
                swal({
                    title: "Data transaksi berhasil diedit.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Chat Admin",
                    cancelButtonText: "OK",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location.href        = '<?php echo base_url();?>user/pembelian/pembelian_custom';        
                    }
                });
            }
        })
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
                    url         : '<?php echo base_url();?>user/pembelian/batal_pembelian_custom',
                    type        : 'POST',
                    data        : {id_penjualan:id},
                    success     : function(data)
                    {
                        tabel_data.ajax.reload();
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
                url         : '<?php echo base_url();?>user/pembelian/get_pembelian_custom_active_user',
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
    })

    <?php if($this->session->flashdata('msg')=='sukses_simpan'):?>
            swal({
            title: "Yay!",
            text: "Data Pembelian custom anda telah tersimpan, silahkan lengkapi data pembelian berikut lalu transfer ke rekening.",
            type: "success",
            confirmButtonText: "OK"
        });
    <?php endif; ?>

})
</script>