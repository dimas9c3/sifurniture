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
            <li class="active">Edit Data Interior</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo base_url().'admin/interior/update_interior'?>" method="POST" enctype="multipart/form-data">
        <div class="box box-default">
            <div class="box-header with-border">
                <a class="btn btn-success btn-flat" href="<?php echo base_url();?>admin/interior"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Simpan</button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Nama Interior</label>
                        <input type="hidden" name="id_barang" id="id_barang" value="">
                        <input type="hidden" name="edit_kategori_old" id="edit_kategori_old" value="">
                        <input type="hidden" name="edit_subkategori_old" id="edit_subkategori_old" value="">
                        <input type="text" name="edit_nama" id="edit_nama" class="form-control" required/>
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
                        <textarea id="ckeditor" name="edit_deskripsi" required></textarea>
                    </div>
                </div>

                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Spesifikasi Interior</h3>
                    </div>
                    <div class="box-body">
                        <textarea id="ckeditor_spek" name="edit_spek" required></textarea>
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
                            <select class="form-control select2" name="edit_kategori" id="edit_kategori" style="width: 100%;" required>
                  
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="number" name="edit_jual" id="edit_jual" class="form-control" placeholder="Input Harga Jual Barang" required>
                        </div>
              
                        <div class="form-group">
                            <label>Tambah Foto Barang</label>
                            <div class="image-upload">
                                <input type="hidden" name="jml_foto" id="jml_foto" value="">
                                <input type="file" name="tambah_foto1" multiple class="form-control"><br>
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

    function tampil_data()
    {
    	var id 			= '<?php echo $this->uri->segment(4); ?>';
    	$.ajax
    	({
    		url 		: '<?php echo base_url();?>admin/barang/get_barang_by_id',
    		type 		: 'POST',
    		data 		: {id_barang:id},
    		dataType	: 'JSON',
    		success 	: function(data)
    		{
    			$('#id_barang').val(data.barang_id);
    			$('#edit_nama').val(data.barang_nama);
    			$('#ckeditor').val(data.barang_deskripsi);
    			$('#edit_jual').val(data.barang_harga_jual);
    			$('#edit_kategori').val(data.sub_kategori_id).trigger('change');
    			$('#edit_kategori_old').val(data.kategori_id);
    		}
    	})
    }

    function select_kategori()
    {
        $.ajax
        ({
            url             : '<?php echo base_url();?>admin/barang/get_select_subkategori_ajax',
            type            : 'GET',
            dataType        : 'JSON',
            success         : function(data)
            {
                var html        = '<option value="" selected disabled>Pilih</option>';
                for(var i=0;i<data.length;i++)
                {
                    html    +=  '<option value="'+data[i].sub_kategori_id+'">'+data[i].sub_kategori_nama+'</option>';
                }
                $('#edit_kategori').html(html);
                tampil_data();
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
})
</script>