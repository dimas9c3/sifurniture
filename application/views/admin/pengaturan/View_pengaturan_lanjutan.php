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
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pengaturan</li>
        </ol>
    </section>

	<!-- Main content -->
   	<section class="content">
	 	<div class="row">
	   		<div class="col-md-12">
			 	<div class="box box-info">
			   		<div class="box-body pad">
				 	<form action="<?php echo site_url('admin/pengaturan/update_pengaturan_lanjutan'); ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
						  <label for="">Pengaturan Tampilan Halaman Help & FAQ</label>
						 	<textarea class="form-control" rows="15" name="faq" id="faq"><?php echo $faq; ?></textarea>
						  <p class="help-block">Help & Faq</p>
						</div>

						<div class="form-group">
						  <label for="">Pengaturan Tampilan Contacts</label>
						 	<textarea class="form-control" rows="15" name="contact" id="contact"><?php echo $contact; ?></textarea>
						  <p class="help-block">Contacts</p>
						</div>

						<div class="form-group">
						  <label for="">Pengaturan Tampilan Privacy & Police</label>
						 	<textarea class="form-control" rows="15" name="privacy" id="privacy"><?php echo $privacy; ?></textarea>
						  <p class="help-block">Privacy & Police</p>
						</div>

						<div class="form-group">
						  <label for="">Pengaturan Careers</label>
						 	<textarea class="form-control" rows="15" name="career" id="career"><?php echo $career; ?></textarea>
						  <p class="help-block">Careers</p>
						</div>

						<div class="form-group">
						  <label for="">Pengaturan Partners</label>
						 	<textarea class="form-control" rows="15" name="partner" id="partner"><?php echo $partner; ?></textarea>
						  <p class="help-block">Careers</p>
						</div>

						<?php foreach($links->result_array() as $i)
						{
							$id 				= $i['theme_option_id'];
							$links_tit 			= $i['theme_option_links_title'];
							$links 				= $i['theme_option_links'];
						?>
						<div class="form-group">
						  <label for="">Title Links</label>
						  <?php if ($id!='1'): ?>
							  <label><button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo site_url('admin/pengaturan/delete_links/').$id; ?>'" name="button">Delete</button>
							  </label>
						  <?php endif; ?>

						  	<input type="hidden" name="id_links_<?php echo $id; ?>" value="<?php echo $id; ?>">
						 	<input type="text" class="form-control" name="links_tit_<?php echo $id; ?>" value="<?php echo $links_tit; ?>">
						  <p class="help-block"><?php echo $links_tit; ?></p>
						<div class="form-group">
						  <label for="">Isi</label>
						 	<textarea class="form-control" rows="15" name="links_isi_<?php echo $id; ?>" id="links_isi_<?php echo $id; ?>"><?php echo $links; ?></textarea>
						  <p class="help-block">Isi</p>
						</div>
						<?php } ?>
			   		</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="button">Simpan</button>
						<button type="button" onclick="window.location.href='<?php echo site_url('admin/pengaturan/tambah_links'); ?>'" class="btn btn-success pull-right" name="button">Tambah Links</button>
					</div>
					</form>
			 	</div>
			 	<!-- /.box -->
	   		</div>
	   		<!-- /.col-->
	 	</div>
	 	<!-- ./row -->
   	</section>
   	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
    $this->load->view('admin/partial/View_sidebar_right');
    $this->load->view('admin/partial/View_footer');
?>

<script>
$(document).ready(function()
{
    CKEDITOR.replace('faq');
	CKEDITOR.replace('contact');
	CKEDITOR.replace('privacy');
	CKEDITOR.replace('career');
	CKEDITOR.replace('partner');

	<?php foreach($links2->result_array() as $i)
	{
		$id 				= $i['theme_option_id'];
		$links_tit 			= $i['theme_option_links_title'];
		$links 				= $i['theme_option_links'];
	?>

	CKEDITOR.replace('links_isi_<?php echo $id; ?>');

	<?php } ?>
})
</script>
