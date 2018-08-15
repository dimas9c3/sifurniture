<?php $this->load->view('frontend/partial/View_header'); ?>
    <!-- Hero Section-->
	<?php
		$row                = $list->row_array();
		$nm_sub1            = $row['sub_1_kategori_interior_nama'];
		$id_sub1            = $row['sub_1_kategori_interior_id'];
		$foto_sub1          = $row['sub_1_kategori_interior_foto'];
		$nm_sub2            = $row['sub_2_kategori_interior_nama'];
		$id_sub2            = $row['sub_2_kategori_interior_id'];
		$foto_sub2          = $row['sub_2_kategori_interior_foto'];
		$id_kat             = $row['kategori_interior_id'];
		$nm_kat             = $row['kategori_interior_nama'];
	?>
	<div class="product-page bc-right">
		<section class="page-heading">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<h2 class="text-primary mb-0">List Produk</h2>
					</div>
					<div class="col-md-6">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
				            <li class="breadcrumb-item"><a href="<?php echo base_url().'interior/kategori/'.$id_sub1; ?>"><?php echo $nm_sub1; ?> </a></li>
				            <li class="breadcrumb-item"><a href="<?php echo base_url().'interior/jenis_interior/'.$id_sub1.'/'.$id_sub2; ?>"><?php echo $nm_sub2; ?> </a></li>
				            <li aria-current="page" class="breadcrumb-item active"><?php echo $nm_kat; ?></li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="product-filter">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-2">
						<p class="mb-0 filter-title">Sorting Produk :</p>
					</div>
					<div class="col-md-8">
						<form method="post" enctype="multipart/form-data" class="form-filter">
							<select id="propertyFilter" name="filter_barang" class="selectpicker" required>
								<option value="#" disabled selected>Pilih Jenis Filter</option>
								<option value="1">Harga Tinggi Ke Rendah</option>
								<option value="2">Harga Rendah Ke Tinggi</option>
							</select>
						</form>
					</div>
				</div>
			</div>
		</section>

		<section class="product-list pt-5">
			<div class="container">
				<div class="row">
					<?php
	                $no         = 0;
	                foreach($list->result_array() as $i)
	                {
						$no++;
                        $id_inter           = $i['interior_id'];
                        $nm_inter           = $i['interior_nama'];
                        $hrg_jual           = $i['interior_harga_jual'];
                        $diskon             = $i['interior_diskon']." %";
                        $hrg_akhir          = "Rp. ".number_format($i['interior_harga_jual']-($i['interior_harga_jual']*($i['interior_diskon']/100)));
                        $foto_utama         = $i['foto_interior_nama'];
	                ?>
					<div class="col-md-3 col-6">
						<a href="<?php echo base_url().'interior/detail/'.$id_inter; ?>">
							<div class="main-product-thumb">
								<div class="product-thumbnail">
									<figure>
										<img class="img-responsive" src="<?php echo base_url().'assets/images/interior/'.$foto_utama; ?>" alt="">
										<figcaption class="text-center">
											<h6 class="product-thumbnails-title"> <?php echo $nm_inter; ?></h6>
											<h5 class="product-thumbnails-price"><?php echo $hrg_akhir; ?>
												<span><del>&nbsp; <?php echo "Rp. ".number_format($hrg_jual); ?></del></span>
											</h5>
										</figcaption>
									</figure>
								</div>
						</a>
								<div class="footer-product-thumbnails text-center">
									<button type="button" onclick="window.location.href='https://wa.me/<?php echo $wa; ?>'" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-cart-plus"></i></button>
									<button type="button" onclick="window.location.href='<?php echo base_url();?>custom/buat_custom'" class="btn btn-sm btn-gradient btn-sm" name="button">Custom</button>
								</div>
							</div>
					</div>
					<?php } ?>
				<div class="row align-items-center">
					<div class="col-md-6">
						Showing <span class="text-primary"><?php echo $no; ?> </span> of  <span class="text-primary"><?php echo $total_row; ?></span>
					</div>
					<div class="col-md-6">
						<?php echo $page; ?>
					</div>
				</div>
			</div>
		</section>

		<?php $this->load->view('frontend/partial/view_footer'); ?>
    	<script type="text/javascript">
		$('#propertyFilter').on('change',function()
		{
		  	window.location.href    = '<?php echo base_url();?>interior/filter/'+$(this).val()+'/<?php echo $id_kat;?>'
		})

		</script>
  	</body>
</html>
