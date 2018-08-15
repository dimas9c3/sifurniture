<?php $this->load->view('frontend/partial/View_header'); ?>
    <!-- Hero Section-->
    <?php
        $row                    = $barang->row_array();
        $nm_kategori            = $row['kategori_nama'];
        $id_sub_kategori        = $row['sub_kategori_id'];
        $nm_sub_kategori        = $row['sub_kategori_nama'];
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
							<li class="breadcrumb-item"><a href="<?php echo base_url();?>home">Home</a></li>
							<li class="breadcrumb-item"><a href="#"><?php echo $nm_kategori; ?></a></li>
							<li aria-current="page" class="breadcrumb-item active"><?php echo $nm_sub_kategori; ?></li>
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
	                foreach($barang->result_array() as $i)
	                {
	                    $no++;
	                    $id_barang          = $i['barang_id'];
	                    $nm_barang          = $i['barang_nama'];
	                    $hrg_jual           = $i['barang_harga_jual'];
	                    $diskon             = $i['barang_diskon']." %";
						$hrg_akhir_2        =  $i['barang_harga_jual']-($i['barang_harga_jual']*($i['barang_diskon']/100));
	                    $hrg_akhir          = "Rp. ".number_format($i['barang_harga_jual']-($i['barang_harga_jual']*($i['barang_diskon']/100)));
	                    $foto_utama         = $i['foto_barang_nama'];
	                ?>
					<div class="col-md-3 col-6">
						<a href="<?php echo base_url().'barang/detail/'.$id_barang;?>">
							<div class="main-product-thumb">
								<div class="product-thumbnail">
									<figure>
										<img class="img-responsive" src="<?php echo base_url().'assets/images/barang/'.$foto_utama; ?>" alt="">
										<figcaption class="text-center">
											<h6 class="product-thumbnails-title"> <?php echo $nm_barang; ?></h6>
											<h5 class="product-thumbnails-price"><?php echo $hrg_akhir; ?>
												<span><del>&nbsp; <?php echo "Rp. ".number_format($hrg_jual); ?></del></span>
											</h5>
										</figcaption>
									</figure>
								</div>
						</a>
								<div class="footer-product-thumbnails text-center">
									<button type="button" id="button_keranjang<?php echo $id_barang; ?>" data-id="<?php echo $id_barang; ?>" data-nama="<?php echo $nm_barang; ?>" data-harga="<?php echo $hrg_akhir_2; ?>" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-cart-plus"></i></button>
									<button type="button" id="button_favorit<?php echo $id_barang; ?>" data-id="<?php echo $id_barang; ?>" class="btn btn-sm btn-gradient btn-sm" name="button"><i class="fa fa-heart"></i></button>
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
		    	window.location.href    = '<?php echo base_url();?>barang/filter/'+$(this).val()+'/<?php echo $id_sub_kategori;?>'
		    })
    	<?php foreach($barang->result_array() as $i)
        {
            $id_brg             = $i['barang_id'];
    	?>
    	$('#button_keranjang<?php echo $id_brg; ?>').on('click',function()
	    {
	        $.ajax
	        ({
	            url             : '<?php echo base_url();?>keranjang/tambah_keranjang',
	            type            : 'POST',
	            data            : {id_brg:$(this).attr('data-id'),nm_brg:$(this).attr('data-nama'),hrg_brg:$(this).attr('data-harga')},
	            dataType        : 'JSON',
	            success         : function(data)
	            {
	                swal({
	                    title: "Barang Berhasil Dimasukkan Ke Keranjang",
	                    type: "success",
	                    showCancelButton: true,
	                    confirmButtonColor: "#DD6B55",
	                    confirmButtonText: "Ke Keranjang",
	                    cancelButtonText: "Lanjut Belanja",
	                    closeOnConfirm: false,
	                    closeOnCancel: true
	                }, function (isConfirm) {
	                    if (isConfirm) {
	                        window.location.href='<?php echo base_url();?>keranjang';
	                    }
	                });
	            }
	        })
	    })

	    $('#button_favorit<?php echo $id_brg; ?>').on('click',function()
	    {
	        $.ajax
	        ({
	            url             : '<?php echo base_url();?>user/barang/tambah_favorit',
	            type            : 'POST',
	            data            : {id_brg:$(this).attr('data-id')},
	            dataType        : 'JSON',
	            success         : function(data)
	            {
	                alert('Produk Berhasil Ditambahkan Ke Favorit Anda');
	            }
	        })
	    })
		<?php } ?>
		</script>
  	</body>
</html>
