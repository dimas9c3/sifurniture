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
            <li class="active">Master Custom Design</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal_tambah" id="btn-modal-tambah"  id="modal-tambah"><span class="fa fa-plus"></span> Data Custom Design</a>
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal_style" id="btn-modal-tambah"  id="modal-tambah"><span class="fa fa-plus"></span> Data Style Design</a>
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal_jenis" id="btn-modal-tambah"  id="modal-tambah"><span class="fa fa-plus"></span> Data Jenis Produk</a>
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal_material" id="btn-modal-tambah"  id="modal-tambah"><span class="fa fa-plus"></span> Data Material Produk</a>
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal_coating" id="btn-modal-tambah"  id="modal-tambah"><span class="fa fa-plus"></span> Data Coating Finishing</a>
                            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal_jog" id="btn-modal-tambah"  id="modal-tambah"><span class="fa fa-plus"></span> Data Material Jog</a>
                        <!-- /.box-header -->
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="tabel_data" class="table table-striped table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Style</th>
                                            <th>Jenis Produk</th>
                                            <th>Material Kayu</th>
                                            <th>Coating Finishing</th>
                                            <th>Material Jog</th>
                                            <th>Harga</th>
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

        <!-- Modal Tambah Custom Design -->
        <div class="modal fade" id="modal_tambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>admin/custom/set_custom" method="POST" enctype="multipart/form-data">
                    <!-- form start -->
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Tambah Custom Design</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Style Produk</label>
                                    <select class="form-control select2" name="nama_style" id="nama_style" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Produk</label>
                                    <select class="form-control select2" name="nama_jenis" id="nama_jenis" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Material Produk</label>
                                    <select class="form-control select2" name="nama_material" id="nama_material" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Coating Finishing Produk</label>
                                    <select class="form-control select2" name="nama_coating" id="nama_coating" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Material Jog Produk</label>
                                    <select class="form-control select2" name="nama_jog" id="nama_jog" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Harga Jual Produk</label>
                                    <input type="number" name="harga_jual" id="harga_jual" class="form-control" placeholder="Input Harga Jual" required>
                                </div>

                                <div class="form-group">
                                    <label>Tambah Foto Produk</label>
                                    <div class="image-upload">
                                        <input type="file" name="tambah_foto" class="form-control" required>
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
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Edit Custom Design -->
        <div class="modal fade" id="modal_edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo base_url();?>admin/custom/update_custom" method="POST" enctype="multipart/form-data">
                    <!-- form start -->
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Tambah Custom Design</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Style Produk</label>
                                    <input type="hidden" name="edit_custom_id" id="edit_custom_id" value="">
                                    <input type="hidden" name="foto_edit" id="foto_edit" value="">
                                    <select class="form-control select2" name="nama_style_edit" id="nama_style_edit" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Produk</label>
                                    <select class="form-control select2" name="nama_jenis_edit" id="nama_jenis_edit" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Material Produk</label>
                                    <select class="form-control select2" name="nama_material_edit" id="nama_material_edit" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Coating Finishing Produk</label>
                                    <select class="form-control select2" name="nama_coating_edit" id="nama_coating_edit" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Material Jog Produk</label>
                                    <select class="form-control select2" name="nama_jog_edit" id="nama_jog_edit" style="width: 100%;" required>
                  
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Harga Jual Produk</label>
                                    <input type="number" name="harga_jual_edit" id="harga_jual_edit" class="form-control" placeholder="Input Harga Jual" required>
                                </div>

                                <div class="form-group">
                                    <label>Foto Produk</label>
                                    <div class="image-upload">
                                        <input type="file" name="tambah_foto" class="form-control">
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
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Style -->
        <div class="modal fade" id="modal_style">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- form start -->
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Data Style Design</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                <table id="tabel_data_style" class="table table-striped table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto Style</th>
                                            <th>Nama Style</th>
                                            <th style="min-width: 15%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_data_style">
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="button" data-toggle="modal" data-target="#modal_tambah_style" class="btn btn-success">Tambah Data</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Tambah Style -->
        <div class="modal fade" id="modal_tambah_style">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="tambah_submit_style">
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
                                    <label for="exampleInputEmail1">Nama Style</label>
                                    <input type="text" class="form-control" id="tambah_style" name="tambah_style" placeholder="Input Nama Style" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Deskripsi</label>
                                    <textarea name="style_deskripsi" id="style_deskripsi" class="form-control" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Foto</label>
                                    <input type="file" name="style_foto" id="style_foto" class="form-control" required>
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

         <!-- Modal Edit Style -->
        <div class="modal fade" id="modal_edit_style">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="edit_submit_style">
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
                                    <label for="exampleInputEmail1">Nama Style</label>
                                    <input type="hidden" name="edit_style_id" id="edit_style_id" value="">
                                    <input type="hidden" name="style_old_photo" id="style_old_photo" value="">
                                    <input type="text" class="form-control" id="edit_style" name="edit_style" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Deskripsi</label>
                                    <textarea name="style_deskripsi_edit" id="style_deskripsi_edit" class="form-control" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Foto</label>
                                    <input type="file" name="style_foto_edit" id="style_foto_edit" class="form-control">
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

        <!-- Modal Jenis -->
        <div class="modal fade" id="modal_jenis">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- form start -->
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Data Jenis Produk</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                <table id="tabel_data_jenis" class="table table-striped table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jenis Produk</th>
                                            <th style="min-width: 15%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_data_jenis">
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="button" data-toggle="modal" data-target="#modal_tambah_jenis" class="btn btn-success">Tambah Data</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Tambah Jenis -->
        <div class="modal fade" id="modal_tambah_jenis">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="tambah_submit_jenis">
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
                                    <label for="exampleInputEmail1">Nama Jenis</label>
                                    <input type="text" class="form-control" id="tambah_jenis" name="tambah_jenis" placeholder="Input Nama Jenis Produk" required>
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

         <!-- Modal Edit Jenis -->
        <div class="modal fade" id="modal_edit_jenis">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="edit_submit_jenis">
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
                                    <label for="exampleInputEmail1">Nama Style</label>
                                    <input type="hidden" name="edit_jenis_id" id="edit_jenis_id" value="">
                                    <input type="text" class="form-control" id="edit_jenis" name="edit_jenis" value="" required>
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

        <!-- Modal Material -->
        <div class="modal fade" id="modal_material">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- form start -->
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Data Material Produk</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                <table id="tabel_data_material" class="table table-striped table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Material Produk</th>
                                            <th style="min-width: 15%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_data_material">
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="button" data-toggle="modal" data-target="#modal_tambah_material" class="btn btn-success">Tambah Data</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Tambah Material -->
        <div class="modal fade" id="modal_tambah_material">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="tambah_submit_material">
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
                                    <label for="exampleInputEmail1">Nama Material</label>
                                    <input type="text" class="form-control" id="tambah_material" name="tambah_material" placeholder="Input Nama Material Produk" required>
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

         <!-- Modal Edit Material -->
        <div class="modal fade" id="modal_edit_material">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="edit_submit_material">
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
                                    <label for="exampleInputEmail1">Nama Material</label>
                                    <input type="hidden" name="edit_material_id" id="edit_material_id" value="">
                                    <input type="text" class="form-control" id="edit_material" name="edit_material" value="" required>
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

        <!-- Modal Coating Finishing -->
        <div class="modal fade" id="modal_coating">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- form start -->
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Data Coating Finishing</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                <table id="tabel_data_coating" class="table table-striped table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Coating Finishing</th>
                                            <th style="min-width: 15%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_data_coating">
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="button" data-toggle="modal" data-target="#modal_tambah_coating" class="btn btn-success">Tambah Data</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Tambah Coating Finishing -->
        <div class="modal fade" id="modal_tambah_coating">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="tambah_submit_coating">
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
                                    <label for="exampleInputEmail1">Nama Coating Finishing</label>
                                    <input type="text" class="form-control" id="tambah_coating" name="tambah_coating" placeholder="Input Nama Coating Finishing" required>
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

         <!-- Modal Edit Coating Finishing -->
        <div class="modal fade" id="modal_edit_coating">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="edit_submit_coating">
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
                                    <label for="exampleInputEmail1">Nama Coating Finishing</label>
                                    <input type="hidden" name="edit_coating_id" id="edit_coating_id" value="">
                                    <input type="text" class="form-control" id="edit_coating" name="edit_coating" value="" required>
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

        <!-- Modal Jog -->
        <div class="modal fade" id="modal_jog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- form start -->
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title">Data Material Jog</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                <table id="tabel_data_jog" class="table table-striped table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Material Jog</th>
                                            <th style="min-width: 15%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content_data_jog">
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="button" data-toggle="modal" data-target="#modal_tambah_jog" class="btn btn-success">Tambah Data</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Tambah Jog -->
        <div class="modal fade" id="modal_tambah_jog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="tambah_submit_jog">
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
                                    <label for="exampleInputEmail1">Nama Material Jog</label>
                                    <input type="text" class="form-control" id="tambah_jog" name="tambah_jog" placeholder="Input Nama Material Jog" required>
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

         <!-- Modal Edit Style -->
        <div class="modal fade" id="modal_edit_jog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form enctype="multipart/form-data" id="edit_submit_jog">
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
                                    <label for="exampleInputEmail1">Nama Material Jog</label>
                                    <input type="hidden" name="edit_jog_id" id="edit_jog_id" value="">
                                    <input type="text" class="form-control" id="edit_jog" name="edit_jog" value="" required>
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
    $('.select2').select2();

    select_style();
    select_jenis();
    select_material();
    select_coating();
    select_jog();

    function select_style()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/custom/get_select_style_ajax',
            type            : 'AJAX',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html        = '<option value="" selected disabled>Pilih Style</option>';
                for(var i=0;i<data.length;i++)
                {
                    html    +=  '<option value="'+data[i].style_id+'">'+data[i].style_nama+'</option>';
                }
                $('#nama_style').html(html);
                $('#nama_style_edit').html(html);
            }
        })
    }

    function select_jenis()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/custom/get_select_jenis_ajax',
            type            : 'AJAX',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html        = '<option value="" selected disabled>Pilih Jenis Produk</option>';
                for(var i=0;i<data.length;i++)
                {
                    html    +=  '<option value="'+data[i].jenis_id+'">'+data[i].jenis_nama+'</option>';
                }
                $('#nama_jenis').html(html);
                $('#nama_jenis_edit').html(html);
            }
        })
    }

    function select_material()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/custom/get_select_material_ajax',
            type            : 'AJAX',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html        = '<option value="" selected disabled>Pilih Material</option>';
                for(var i=0;i<data.length;i++)
                {
                    html    +=  '<option value="'+data[i].material_id+'">'+data[i].material_nama+'</option>';
                }
                $('#nama_material').html(html);
                $('#nama_material_edit').html(html);
            }
        })
    }

    function select_coating()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/custom/get_select_coating_ajax',
            type            : 'AJAX',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html        = '<option value="" selected disabled>Pilih Coating</option>';
                for(var i=0;i<data.length;i++)
                {
                    html    +=  '<option value="'+data[i].coating_id+'">'+data[i].coating_nama+'</option>';
                }
                $('#nama_coating').html(html);
                $('#nama_coating_edit').html(html);
            }
        })
    }

    function select_jog()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/custom/get_select_jog_ajax',
            type            : 'AJAX',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html        = '<option value="" selected disabled>Pilih Jog</option>';
                for(var i=0;i<data.length;i++)
                {
                    html    +=  '<option value="'+data[i].jog_id+'">'+data[i].jog_nama+'</option>';
                }
                $('#nama_jog').html(html);
                $('#nama_jog_edit').html(html);
            }
        })
    }

    $('#content_data').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/get_custom_by_id',
            type        : 'POST',
            dataType    : 'JSON',
            data        : {id_custom:id},
            success     : function(data)
            {
                $('#edit_custom_id').val(data.custom_id);
                $('#nama_style_edit').val(data.style_id).trigger('change');
                $('#nama_jenis_edit').val(data.jenis_id).trigger('change');
                $('#nama_material_edit').val(data.material_id).trigger('change');
                $('#nama_coating_edit').val(data.coating_id).trigger('change');
                $('#nama_jog_edit').val(data.jog_id).trigger('change');
                $('#harga_jual_edit').val(data.harga_jual);
                $('#foto_edit').val(data.foto);
                $('#modal_edit').modal('show');
            }
        })
    })

    $('#content_data_style').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/get_style_by_id',
            type        : 'POST',
            dataType    : 'JSON',
            data        : {id_style:id},
            success     : function(data)
            {
                $('#edit_style').val(data.nm_style);
                $('#edit_style_id').val(id);
                $('#style_deskripsi_edit').val(data.deskripsi);
                $('#style_old_photo').val(data.foto);
                $('#modal_edit_style').modal('show');
            }
        })
    })

    $('#content_data_jenis').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/get_jenis_by_id',
            type        : 'POST',
            dataType    : 'JSON',
            data        : {id_jenis:id},
            success     : function(data)
            {
                $('#edit_jenis').val(data.nm_jenis);
                $('#edit_jenis_id').val(id);
                $('#modal_edit_jenis').modal('show');
            }
        })
    })

    $('#content_data_material').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/get_material_by_id',
            type        : 'POST',
            dataType    : 'JSON',
            data        : {id_material:id},
            success     : function(data)
            {
                $('#edit_material').val(data.nm_material);
                $('#edit_material_id').val(id);
                $('#modal_edit_material').modal('show');
            }
        })
    })

    $('#content_data_coating').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/get_coating_by_id',
            type        : 'POST',
            dataType    : 'JSON',
            data        : {id_coating:id},
            success     : function(data)
            {
                $('#edit_coating').val(data.nm_coating);
                $('#edit_coating_id').val(id);
                $('#modal_edit_coating').modal('show');
            }
        })
    })

    $('#content_data_jog').on('click','.item-edit',function()
    {
        var id          = $(this).attr('data');
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/get_jog_by_id',
            type        : 'POST',
            dataType    : 'JSON',
            data        : {id_jog:id},
            success     : function(data)
            {
                $('#edit_jog').val(data.nm_jog);
                $('#edit_jog_id').val(id);
                $('#modal_edit_jog').modal('show');
            }
        })
    })

    /* ==== CRUD FUNCTION ==== */
    $('#tambah_submit_style').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/set_style',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_style.ajax.reload();
                $('#modal_tambah_style').modal('hide');
                $('#tambah_style').val('');
                $('#style_deskripsi').val('');
                $('#style_foto').val('');
                $('#tambah_style').val('');
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

    $('#tambah_submit_jenis').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/set_jenis',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_jenis.ajax.reload();
                $('#modal_tambah_jenis').modal('hide');
                $('#tambah_jenis').val('');
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

    $('#tambah_submit_material').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/set_material',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_material.ajax.reload();
                $('#modal_tambah_material').modal('hide');
                $('#tambah_material').val('');
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

    $('#tambah_submit_coating').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/set_coating',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_coating.ajax.reload();
                $('#modal_tambah_coating').modal('hide');
                $('#tambah_coating').val('');
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

     $('#tambah_submit_jog').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/set_jog',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_jog.ajax.reload();
                $('#modal_tambah_jog').modal('hide');
                $('#tambah_jog').val('');
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

    $('#edit_submit_style').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/update_style',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_style.ajax.reload();
                $('#modal_edit_style').modal('hide');
                $('#style_deskripsi_edit').val('');
                $('#style_foto_edit').val('');
                $('#style_old_photo').val('');
                $('#edit_style').val('');
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

     $('#edit_submit_jenis').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/update_jenis',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_jenis.ajax.reload();
                $('#modal_edit_jenis').modal('hide');
                $('#edit_jenis').val('');
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

    $('#edit_submit_material').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/update_material',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_material.ajax.reload();
                $('#modal_edit_material').modal('hide');
                $('#edit_material').val('');
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

    $('#edit_submit_coating').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/update_coating',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_coating.ajax.reload();
                $('#modal_edit_coating').modal('hide');
                $('#edit_coating').val('');
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

    $('#edit_submit_jog').submit(function(e)
    {
        e.preventDefault();
        $.ajax
        ({
            url         : '<?php echo base_url();?>admin/custom/update_jog',
            type        : 'POST',
            data        : new FormData(this),
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success     : function(data)
            {
                tabel_data_jog.ajax.reload();
                $('#modal_edit_jog').modal('hide');
                $('#edit_jog').val('');
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
        var id              = $(this).attr('data');
        var foto            = $(this).attr('foto');
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
                    url         : '<?php echo base_url();?>admin/custom/delete_custom',
                    type        : 'POST',
                    data        : {id_custom:id,foto:foto},
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

    $('#content_data_style').on('click','.item-hapus',function()
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
                    url         : '<?php echo base_url();?>admin/custom/delete_style',
                    type        : 'POST',
                    data        : {id_style:id},
                    success     : function(data)
                    {
                        tabel_data_style.ajax.reload();
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

    $('#content_data_jenis').on('click','.item-hapus',function()
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
                    url         : '<?php echo base_url();?>admin/custom/delete_jenis',
                    type        : 'POST',
                    data        : {id_jenis:id},
                    success     : function(data)
                    {
                        tabel_data_jenis.ajax.reload();
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

    $('#content_data_material').on('click','.item-hapus',function()
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
                    url         : '<?php echo base_url();?>admin/custom/delete_material',
                    type        : 'POST',
                    data        : {id_material:id},
                    success     : function(data)
                    {
                        tabel_data_material.ajax.reload();
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

    $('#content_data_coating').on('click','.item-hapus',function()
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
                    url         : '<?php echo base_url();?>admin/custom/delete_coating',
                    type        : 'POST',
                    data        : {id_coating:id},
                    success     : function(data)
                    {
                        tabel_data_coating.ajax.reload();
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

    $('#content_data_jog').on('click','.item-hapus',function()
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
                    url         : '<?php echo base_url();?>admin/custom/delete_jog',
                    type        : 'POST',
                    data        : {id_jog:id},
                    success     : function(data)
                    {
                        tabel_data_jog.ajax.reload();
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
                { "orderable": false, "targets":1}
            ],
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/custom/get_all_custom',
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

    var tabel_data_style =  $('#tabel_data_style').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']], 
            //"serverSide": true, 
            "columnDefs": 
            [
                { "orderable": false, "targets": 2}
            ],
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/custom/get_all_style',
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

    var tabel_data_jenis =  $('#tabel_data_jenis').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']], 
            //"serverSide": true, 
            "columnDefs": 
            [
                { "orderable": false, "targets": 2}
            ],
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/custom/get_all_jenis',
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

    var tabel_data_material =  $('#tabel_data_material').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']], 
            //"serverSide": true, 
            "columnDefs": 
            [
                { "orderable": false, "targets": 2}
            ],
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/custom/get_all_material',
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

    var tabel_data_coating =  $('#tabel_data_coating').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']], 
            //"serverSide": true, 
            "columnDefs": 
            [
                { "orderable": false, "targets": 2}
            ],
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/custom/get_all_coating',
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

    var tabel_data_jog =  $('#tabel_data_jog').DataTable
    ({
            //"processing": true,
            //"order":[[1,'asc']], 
            //"serverSide": true, 
            "columnDefs": 
            [
                { "orderable": false, "targets": 2}
            ],
            ajax            : 
            {
                url         : '<?php echo base_url();?>admin/custom/get_all_jog',
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

    var jml_foto    = 1;

    $('#btn_tambah_foto').on('click',function()
    {
        
        $('.image-upload').append('<input type="file" name="tambah_foto'+(jml_foto+1)+'" multiple class="form-control"><br>');
        $('#jml_foto').val((jml_foto+1));
        jml_foto = jml_foto+1;
    })

})
</script>