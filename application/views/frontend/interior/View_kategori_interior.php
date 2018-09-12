<?php $this->load->view('frontend/partial/View_header'); ?>
    <!-- Hero Section-->
    <?php
        $row                = $sub1->row_array();
        $nm_sub1            = $row['sub_1_kategori_interior_nama'];
        $id_sub1            = $row['sub_1_kategori_interior_id'];
        $foto_sub1          = $row['sub_1_kategori_interior_foto'];

    ?>
    <section class="property-grid-sidebar bg-white-3">
      <div class="container">
        <h2><span class="text-primary">List Produk Interior <?php echo $nm_sub1; ?></span></h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>home">Home</a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo $nm_sub1; ?> </a></li>
          </ol>
        </nav>
        <!-- Filters-->
        <div class="row">
          <!-- Property Listings-->
          <div class="property-listing col-lg-12">
            <div class="row">
                <?php
                foreach($list->result_array() as $i)
                {
                    $nm_kategori            = $i['sub_2_kategori_interior_nama'];
                    $id_kategori            = $i['sub_2_kategori_interior_id'];
                    $foto_kategori          = $i['sub_2_kategori_interior_foto'];
                ?>
                <div class="col-lg-3">
                    <div class="property-listing-item">
                        <div class="image"><a href="<?php echo base_url().'interior/jenis_interior/'.$id_sub1.'/'.$id_kategori; ?>" class="no-anchor-style"><img src="<?php echo base_url().'assets/images/sub_2_kategori_interior/'.$foto_kategori; ?>" alt=" The Chalet Estate" class="img-fluid"></a>
                        </div>
                        <div class="info">
                            <a href="<?php echo base_url().'interior/jenis_interior/'.$id_sub1.'/'.$id_kategori; ?>" class="no-anchor-style">
                            <h2 class="h4 text-primary"> <?php echo $nm_kategori; ?></h2></a>
                        </div>
                    </div>
                </div>
          <?php } ?>
                </div>
              </div>
            </div>
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
  </body>
</html>
