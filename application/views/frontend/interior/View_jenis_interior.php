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

    ?>
    <section class="property-grid-sidebar bg-white-3">
      <div class="container">
        <h2><span class="text-primary">List Produk Interior <?php echo $nm_sub1.' Jenis '.$nm_sub2  ; ?></span></h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>home">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url().'interior/kategori/'.$id_sub1; ?>"><?php echo $nm_sub1; ?> </a></li>
            <li aria-current="page" class="breadcrumb-item active"><?php echo $nm_sub2; ?></li>
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
                    $nm_kategori            = $i['kategori_interior_nama'];
                    $id_kategori            = $i['kategori_interior_id'];
                    $foto_kategori          = $i['kategori_interior_foto'];
                ?>
                <div class="col-lg-3">
                    <div class="property-listing-item">
                        <div class="image"><a href="<?php echo base_url().'interior/list_produk/'.$id_kategori; ?>" class="no-anchor-style"><img src="<?php echo base_url().'assets/images/kategori_interior/'.$foto_kategori; ?>" alt=" The Chalet Estate" class="img-fluid"></a>
                        </div>
                        <div class="info">
                            <a href="<?php echo base_url().'interior/list_produk/'.$id_kategori; ?>" class="no-anchor-style">
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
<?php $this->load->view('frontend/partial/view_footer'); ?>
  </body>

<!-- Mirrored from demo.bootstrapious.com/real-estate/1-0/property.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Mar 2018 01:08:56 GMT -->
</html>
