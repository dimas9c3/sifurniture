<?php $this->load->view('frontend/partial/View_header'); ?>
<?php
    $row                    = $detail_barang->row_array();
    $nm_kategori            = $row['kategori_nama'];
    $id_sub_kategori        = $row['sub_kategori_id'];
    $nm_sub_kategori        = $row['sub_kategori_nama'];
    $id_barang              = $row['barang_id'];
    $nm_barang              = $row['barang_nama'];
    $hrg_barang             = $row['barang_harga_jual'];
    $diskon                 = $row['barang_diskon']." %";
    $hrg_akhir              = $row['barang_harga_jual']-($row['barang_harga_jual']*($row['barang_diskon']/100));
    $deskripsi_barang       = $row['barang_deskripsi'];
    $foto_utama             = $row['foto_barang_nama'];
    $dimensi                = $row['barang_dimensi'];
?>
<!-- Property Single Section-->
<section class="property-single bg-white-2">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $nm_kategori; ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'barang/kategori/'.$id_sub_kategori; ?>"><?php echo $nm_sub_kategori; ?></a></li>
                <li aria-current="page" class="breadcrumb-item active"><?php echo $nm_barang; ?></li>
            </ol>
        </nav>
        <header>
            <h2><span class="text-primary">Detail Produk <?php echo $nm_barang; ?></h2>
        </header>
        <div class="row">
            <div class="col-lg-8">
                <!-- Image Slider -->
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <div style="background: url(<?php echo base_url().'assets/images/barang/'.$foto_utama; ?>); background-size: cover!important;" class="swiper-slide img-responsive"></div>
                            <?php foreach($detail_foto->result_array() as $ii)
                            {
                                $foto_nama1          = $ii['foto_barang_nama'];
                            ?>
                            <div style="background: url(<?php echo base_url().'assets/images/barang/'.$foto_nama1; ?>); background-size: cover!important;" class="swiper-slide img-responsive"></div>

                            <?php } ?>
                    </div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <div style="background: url(<?php echo base_url().'assets/images/barang/'.$foto_utama; ?>); background-size: cover!important;" class="swiper-slide img-responsive"></div>
                            <?php foreach($detail_foto->result_array() as $iii)
                            {
                                $foto_nama2          = $iii['foto_barang_nama'];
                            ?>
                            <div style="background: url(<?php echo base_url().'assets/images/barang/'.$foto_nama2; ?>); background-size: cover!important;" class="swiper-slide img-responsive"></div>
                            <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="property-single-author bg-white-5">
                    <div class="d-flex align-items-center">

                    </div>

                    <div class="agent-contact">
                        <h3 class="h4 has-line">Spesifikasi Barang </h3>
                        <div class="form-group">
                            <label>Warna</label>
                        <select class="form-control select2">
                            <?php foreach($warna->result_array() as $wrn)
                            {
                                $warna          = $wrn['warna_nama'];
                            ?>
                            <option><?php echo $warna; ?></option>
                        <?php }?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label>Dimensi : <?php echo $dimensi; ?></label>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi :<br> <?php echo $deskripsi_barang; ?></label>
                        </div>
                        <div class="form-group">
                            <button type="button" id="button_keranjang" data-id="<?php echo $id_barang; ?>" data-nama="<?php echo $nm_barang; ?>" data-harga="<?php echo $hrg_akhir; ?>" class="btn btn-gradient full-width mb-1">Masukkan Keranjang</button>
							<button onclick="window.location.href='<?php echo base_url();?>custom/buat_custom'" class="btn btn-gradient align-items-center full-width">Custom</button>
                        </div>
                    </div>
                </div>
            </div>
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
                <?php
                    foreach($simmilar->result_array() as $i)
                    {
                        $id_brg         = $i['barang_id'];
                        $nm_brg         = $i['barang_nama'];
                        $hrg_brg        = $i['barang_harga_jual'];
                        $foto           = $i['foto_barang_nama'];
                ?>
                <div class="col-lg-4 col-6">
                    <div class="property mb-5 mb-lg-0">
                        <div class="image"><img src="<?php echo base_url().'assets/images/barang/'.$foto;?>" alt="Condo with pool view" class="img-fluid">
                            <div class="overlay d-flex align-items-center justify-content-center"><a href="<?php echo base_url().'barang/detail/'.$id_brg; ?>" class="btn btn-gradient btn-sm">View Details</a></div>
                        </div>
                        <div class="info"><a href="<?php echo base_url().'barang/detail/'.$id_brg; ?>" class="no-anchor-style">
                            <h3 class="h4 text-thin text-uppercase mb-1"><?php echo $nm_brg; ?></h3></a>
                            <div class=" d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient btn-sm "><span class="price-label"><strong>Harga Rp.<?php echo number_format($hrg_brg); ?></strong></span></a></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
</section>
<!-- END Simmillar Properties Section -->
<?php $this->load->view('frontend/partial/view_footer'); ?>
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
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

<script>
$(document).ready(function()
{
    $.ajax
    ({
        url             : '<?php echo base_url();?>barang/tambah_barang_dilihat',
        type            : 'POST',
        dataType        : 'JSON',
        data            : {id_barang:$('#button_keranjang').attr('data-id')},
        success         : function()
        {
            alert('sukses');
        }
    })
})
</script>
</body>
</html>
