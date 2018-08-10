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
            <li><a href="<?php echo base_url();?>admin/artikel">Data Artikel</a></li>
            <li class="active">Tambah Data Artikel</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo base_url().'admin/artikel/set_artikel'?>" method="POST" enctype="multipart/form-data">
        <div class="box box-default">
            <div class="box-header with-border">
                <a class="btn btn-success btn-flat" href="<?php echo base_url();?>admin/artikel"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Simpan</button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Judul Artikel</label>
                        <input type="text" name="tambah_nama" class="form-control" placeholder="Input Judul Artikel" required/>
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
                        <h3 class="box-title">Isi Artikel</h3>
                    </div>
                    <div class="box-body">
                        <textarea id="ckeditor" name="tambah_isi" required></textarea>
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
                            <label>Foto Utama Artikel</label>
                            <div class="image-upload">
                                <input type="file" name="tambah_foto" multiple class="form-control" required><br>
                            </div>
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

    var jml_foto    = 1;

    $('#btn_tambah_foto').on('click',function()
    {
        
        $('.image-upload').append('<input type="file" name="tambah_foto'+(jml_foto+1)+'" multiple class="form-control"><br>');
        $('#jml_foto').val((jml_foto+1));
        jml_foto = jml_foto+1;
    })

    $('.select2').select2();

    CKEDITOR.replace('ckeditor');
})
</script>