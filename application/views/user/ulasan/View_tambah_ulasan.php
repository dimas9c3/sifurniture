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
            <li>Master Barang</li>
            <li><a href="<?php echo base_url();?>admin/barang">Data Barang</a></li>
            <li class="active">Tambah Data Barang</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo base_url().'user/ulasan/set_ulasan'?>" method="POST" enctype="multipart/form-data">
        <div class="box box-default">
            <div class="box-header with-border">
                <a class="btn btn-success btn-flat" href="<?php echo base_url();?>user/pembelian/riwayat_pembelian"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                
            </div>
            <div class="box-body">
               
            </div>
        </div>
        <!-- /.box box-default -->
        <div class="row">
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Tuliskan Ulasan Anda</h3>
                    </div>
                    <div class="box-body">
                        <textarea class="form-control" rows="10" id="ckeditor" name="tambah_isi" required></textarea>
                    </div>
                </div>
            </div>
            <!-- /.col (left) -->
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Rating Kami</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Rate (Nilai 1 - 5 )</label>
                            <input type="hidden" name="tambah_id" value="<?php echo $this->uri->segment('4'); ?>">
                            <select class="form-control select2" name="tambah_rating" id="tambah_rating" style="width: 100%;" required>
                                <option value="" selected>Pilih Rating</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
              
                        <div class="form-group">
                            <span><button type="submit" class="btn btn-primary btn-flat form-control"><span class="fa fa-pencil"></span> Simpan</button></span>
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
    $this->load->view('user/partial/View_sidebar_right');
    $this->load->view('user/partial/View_footer');
?>
<script>
$(document).ready(function()
{
    $('.select2').select2();

    //CKEDITOR.replace('ckeditor');

})
</script>