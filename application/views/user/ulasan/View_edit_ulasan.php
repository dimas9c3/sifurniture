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
        <form action="<?php echo base_url().'user/ulasan/update_ulasan'?>" method="POST" enctype="multipart/form-data">
        <div class="box box-default">
            <div class="box-header with-border">
                <a class="btn btn-success btn-flat" href="<?php echo base_url();?>user/pembelian/riwayat_pembelian"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                
            </div>
            <div class="box-body">
               
            </div>
        </div>
        <!-- /.box box-default -->
        <div class="row">
            <?php 
                $row            = $ulasan->row_array();
                $id_ulasan      = $row['ulasan_id'];
                $isi            = $row['ulasan_isi'];
                $rate           = $row['ulasan_rating'];
            ?>
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Tuliskan Ulasan Anda</h3>
                    </div>
                    <div class="box-body">
                        <input type="hidden" name="tambah_id_ulasan" value="<?php echo $id_ulasan; ?>">
                        <textarea id="ckeditor" class="form-control" rows="10" name="tambah_isi" required><?php echo $isi; ?></textarea>
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
                                <option value="<?php echo $rate; ?>" selected><?php echo $rate; ?></option>
                                <?php for($i=1;$i<=5;$i++)
                                {
                                    if($i!=$rate)
                                    {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                } ?>
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