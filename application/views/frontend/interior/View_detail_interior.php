<?php $this->load->view('frontend/partial/View_header'); ?>
<?php
    $row                    = $detail->row_array();
    $id_kategori            = $row['kategori_interior_id'];
    $nm_kategori            = $row['kategori_interior_nama'];
    $id_sub1                = $row['sub_1_kategori_interior_id'];
    $nm_sub1                = $row['sub_1_kategori_interior_nama'];
    $id_sub2                = $row['sub_2_kategori_interior_id'];
    $nm_sub2                = $row['sub_2_kategori_interior_nama'];
    $id_interior            = $row['interior_id'];
    $nm_interior            = $row['interior_nama'];
    $hrg_interior           = $row['interior_harga_jual'];
    $diskon                 = $row['interior_diskon']." %";
    $hrg_akhir              = $row['interior_harga_jual']-($row['interior_harga_jual']*($row['interior_diskon']/100));
    $deskripsi_interior     = $row['interior_deskripsi'];
    $foto_utama             = $row['foto_interior_nama'];
?>
<!-- Property Single Section-->
<section class="property-single bg-white-2">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'interior/kategori/'.$id_sub1; ?>"><?php echo $nm_sub1; ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'interior/jenis_interior/'.$id_sub1.'/'.$id_sub2; ?>"><?php echo $nm_sub2; ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'interior/list_produk/'.$id_kategori; ?>"><?php echo $nm_kategori; ?></a></li>
                <li aria-current="page" class="breadcrumb-item active"><?php echo $nm_interior; ?></li>
            </ol>
        </nav>
        <header>
            <h2><span class="text-primary">Detail Produk <?php echo $nm_interior; ?></h2>
        </header>
        <div class="row">
            <div class="col-lg-8">
                <!-- Image Slider -->
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <div style="background: url(<?php echo base_url().'assets/images/interior/'.$foto_utama; ?>); background-size: cover;" class="swiper-slide"></div>
                            <?php foreach($detail_foto->result_array() as $ii)
                            {
                                $foto_nama1          = $ii['foto_interior_nama'];
                            ?>
                            <div style="background: url(<?php echo base_url().'assets/images/interior/'.$foto_nama1; ?>); background-size: cover;" class="swiper-slide"></div>

                            <?php } ?>
                    </div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <div style="background: url(<?php echo base_url().'assets/images/interior/'.$foto_utama; ?>); background-size: cover;" class="swiper-slide"></div>
                            <?php foreach($detail_foto->result_array() as $iii)
                            {
                                $foto_nama2          = $iii['foto_interior_nama'];
                            ?>
                            <div style="background: url(<?php echo base_url().'assets/images/interior/'.$foto_nama2; ?>); background-size: cover;" class="swiper-slide"></div>
                            <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="property-single-author bg-white-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar"><img src="<?php echo base_url();?>vendors/frontend/img/avatar-2.jpg" alt="..." class="img-fluid"></div>
                            <div class="text"><strong>Viktor</strong><span>Customer Service</span>
                                <ul class="agent-social list-inline">
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                    </div>
                    <ul class="contact-info list-inline mb-0">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-skype"></i>Victor</a></li>
                        <li class="list-inline-item"><a href="#"><i class="icon-smart-phone-2"></i>(305) 555-4555</a></li>
                    </ul>
                    <div class="agent-contact">
                        <h3 class="h4 has-line">Spesifikasi Barang </h3>
                        <ul>
                            <li>Spek 1</li>
                        </ul>
                        <div class="form-group">
                            <button type="button" id="button_keranjang" data-id="<?php echo $id_interior; ?>" data-nama="<?php echo $nm_interior; ?>" data-harga="<?php echo $hrg_akhir; ?>" class="btn btn-gradient full-width">Masukkan Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. row -->
        <!-- Property Description-->
        <div class="property-single-description bg-white-3-custom mt-5 block">
            <h3 class="h4 has-line">Deskripsi Barang </h3>
            <p class="template-text"><?php echo $deskripsi_interior; ?></p>
        </div>

         <!-- Menuju Halaman Custom Design-->
        <div class="property-single-description bg-white-3-custom mt-5 block">
            <h3 class="h4 has-line">Custom Design  </h3>
            <p class="template-text">Ingin custom design ? klik link dibawah</p>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- Similar Properties Section-->
<section class="similar-properties bg-white-3-custom">
    <div class="container">
        <div class="container">
            <header>
                <h2><span class="text-primary">Furniture yang mungkin anda suka</span></h2>
                <p class="template-text">Silahkan cek furniture dari kami.</p>
            </header>
            <div class="row">
                <div class="col-lg-4">
                    <div class="property mb-5 mb-lg-0">
                        <div class="image"><img src="<?php echo base_url();?>vendors/frontend/img/property-1.jpg" alt="Condo with pool view" class="img-fluid">
                            <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient btn-sm">View Details</a></div>
                        </div>
                        <div class="info"><a href="<?php echo base_url();?>home/detail" class="no-anchor-style">
                            <h3 class="h4 text-thin text-uppercase mb-1">Sofa hijau minimalis</h3></a>
                            <div class=" d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient "><span class="price-label"><strong>Harga Rp.1.000.000</strong></span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="property mb-5 mb-lg-0">
                        <div class="image"><img src="<?php echo base_url();?>vendors/frontend/img/property-2.jpg" alt="Condo with pool view" class="img-fluid">
                            <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient btn-sm">View Details</a></div>
                        </div>
                        <div class="info"><a href="<?php echo base_url();?>home/detail" class="no-anchor-style">
                            <h3 class="h4 text-thin text-uppercase mb-1">Sofa kuning minimalis</h3></a>
                            <div class=" d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient "><span class="price-label"><strong>Harga Rp.1.000.000</strong></span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="property mb-5 mb-lg-0">
                        <div class="image"><img src="<?php echo base_url();?>vendors/frontend/img/property-3.jpg" alt="Condo with pool view" class="img-fluid">
                            <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient btn-sm">View Details</a></div>
                        </div>
                        <div class="info"><a href="<?php echo base_url();?>home/detail" class="no-anchor-style">
                            <h3 class="h4 text-thin text-uppercase mb-1">Sofa biru minimalis</h3></a>
                            <div class=" d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient "><span class="price-label"><strong>Harga Rp.1.000.000</strong></span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
</section>
<!-- END Simmillar Properties Section -->
<!-- Clients Section -->
<section class="clients bg-white-3-custom">
    <div class="container">
        <div class="swiper-container clients-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_1.png" alt="undefined"></div>
                </div>
                <div class="swiper-slide">
                    <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_2.png" alt="undefined"></div>
                </div>
                <div class="swiper-slide">
                    <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_3.png" alt="undefined"></div>
                </div>
                <div class="swiper-slide">
                    <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_4.png" alt="undefined"></div>
                </div>
                <div class="swiper-slide">
                    <div class="client"><img src="<?php echo base_url();?>vendors/frontend/img/bank_5.png" alt="undefined"></div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $this->load->view('frontend/partial/view_footer'); ?>
<script type="text/javascript">
    $('#button_keranjang').on('click',function()
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
</script>
</body>
</html>
