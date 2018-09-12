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
            <li><a href="<?php echo base_url();?>admin/interior">Data Interior</a></li>
            <li class="active">Tambah Data Interior</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo base_url().'admin/interior/set_interior'?>" method="POST" enctype="multipart/form-data">
        <div class="box box-default">
            <div class="box-header with-border">
                <a class="btn btn-success btn-flat" href="<?php echo base_url();?>admin/interior"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Simpan</button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Nama Interior</label>
                        <input type="text" name="tambah_nama" class="form-control" placeholder="Input Nama Interior" required/>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
        <!-- /.box box-default -->
        <div class="row">
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Deskripsi Interior</h3>
                    </div>
                    <div class="box-body">
                        <textarea id="ckeditor" name="tambah_deskripsi" required></textarea>
                    </div>
                </div>
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Spesifikasi Interior</h3>
                    </div>
                    <div class="box-body">
                        <textarea id="ckeditor_spek" name="tambah_spek" required></textarea>
                    </div>
                </div>
            </div>
            <!-- /.col (left) -->
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Pengaturan Lainnya</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control select2" name="tambah_kategori" id="tambah_kategori" style="width: 100%;" required>
                  
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="number" name="tambah_jual" id="tambah_jual" class="form-control" placeholder="Input Harga Jual Barang" required>
                        </div>

                        <div class="form-group">
                            <label>Diskon (1-100) Dalam Persen</label>
                            <input type="number" name="tambah_diskon" id="tambah_diskon" class="form-control" placeholder="Input Diskon Barang Dari 1 - 100">
                        </div>
              
                        <div class="form-group">
                            <label>Foto Barang (Ukuran 512px x 512px)</label>
                            <div class="image-upload">
                                <input type="hidden" name="jml_foto" id="jml_foto" value="">
                                <input type="file" name="tambah_foto1" multiple class="form-control" required><br>
                            </div>
                            <span><button type="button" class="btn btn-success btn-sm form-control" id="btn_tambah_foto">Tambah Foto</button></span>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /. col -->
        </div>
        <!-- /.row (right) -->
        </form>
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
    select_kategori();

    function select_kategori()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/interior/get_select_kategori_interior_ajax',
            type            : 'GET',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html        = '<option value="" selected disabled>Pilih</option>';
                for(var i=0;i<data.length;i++)
                {
                    html    +=  '<option value="'+data[i].kategori_interior_id+'">'+data[i].sub_1_kategori_interior_nama+' | '+data[i].sub_2_kategori_interior_nama+' | '+data[i].kategori_interior_nama+'</option>';
                }
                $('#tambah_kategori').html(html);
            }
        })
    }

    var jml_foto    = 1;

    $('#btn_tambah_foto').on('click',function()
    {
        
        $('.image-upload').append('<input type="file" name="tambah_foto'+(jml_foto+1)+'" multiple class="form-control"><br>');
        $('#jml_foto').val((jml_foto+1));
        jml_foto = jml_foto+1;
    })

    $('.select2').select2();

    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor_spek');
})
</script>