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
            <li>Transaksi Barang</li>
            <li class="active">Data Pembelian Barang</li>
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
                                            <th style="height: 60px;">Design Yang Diinginkan</th>
                                            <th>Detail Pesanan</th>
                                            <th>Alamat Pengiriman</th>
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
                                    <label>Kabupaten</label>
                                    <input type="hidden" name="edit_id" id="edit_id" value="">
                                    <select id="edit_kab" name="edit_kab" style="width: 100%;" class="form-control select2" required>
                                        <option value="" selected>Pilih Kabupaten</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat Lengkap Pengiriman</label>
                                    <textarea class="form-control" name="edit_alamat" id="edit_alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Catatan Pembuatan</label>
                                    <textarea class="form-control" name="edit_catatan" id="edit_catatan" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Foto Design Anda</label>
                                    <br>
                                    <div class="image-upload">
                                        <input type="file" name="tambah_foto" id="tambah_foto" class="form-control">
                                    </div>
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
    $('.select2').select2();
    select_kab();

        function select_kab()
        {
            $.ajax
            ({
                url             : '<?php echo base_url();?>custom/get_kab_select',
                type            : 'AJAX',
                dataType        : 'JSON',
                success         : function(data)
                {
                    var html        = '<option value="" selected disabled>Pilih Provinsi</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        html    +=  '<option value="'+data[i].ongkir_id+'">'+data[i].ongkir_nama+'</option>';
                    }
                    $('#edit_kab').html(html);
                }
            })
        }

        /*$('#edit_prov').on('change',function(data)
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

                    $('#edit_kab').html(html);

                    var id          = $('#edit_id').attr('data');
                    $.ajax
                    ({
                        url             :'<?php echo base_url();?>user/pembelian/get_pembelian_custom_design_by_id',
                        type            : 'POST',
                        dataType        : 'JSON',
                        data            : {id_penjualan:id},
                        success         : function(data)
                        {
                            $('#edit_id').val(id);
                            $('#edit_catatan').val(data[0].permintaan);
                            $('#edit_alamat').val(data[0].alamat);
                            $('#edit_prov').val(data[0].id_prov).trigger('change');
                            $('#edit_kab').val(data[0].ongkir_id).trigger('change');
                        }
                    })
                }
            })
        })*/

    $('#content_data').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url             :'<?php echo base_url();?>user/pembelian/get_pembelian_custom_design_by_id',
            type            : 'POST',
            dataType        : 'JSON',
            data            : {id_penjualan:id},
            success         : function(data)
            {
                $('#edit_id').val(id);
                $('#edit_catatan').val(data[0].permintaan);
                $('#edit_alamat').val(data[0].alamat);
                $('#edit_prov').val(data[0].id_prov).trigger('change');
                $('#edit_kab').val(data[0].ongkir_id).trigger('change');
            }
        })
    })

    /* ==== CRUD FUNCTION ==== */
    $('#edit_submit').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>user/pembelian/update_pembelian_custom_design',
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
                $('#tambah_foto').val('');
                 swal(
                        {
                            title       : "Yay!",
                            text        : "Pembelian anda berhasil diedit.",
                            type        : "success",
                            timer       : 1000,
                            showConfirmButton : false
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
                    url         : '<?php echo base_url();?>user/pembelian/batal_pembelian_custom_design',
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
                url         : '<?php echo base_url();?>user/pembelian/get_pembelian_custom_design_active_user',
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