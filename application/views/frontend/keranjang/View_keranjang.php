<?php $this->load->view('frontend/partial/View_header'); ?>
    <!-- Property Single Section-->
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>user/pembelian/set_pembelian">
    <section class="property-single bg-white-2">
        <div id="content">
            <div class="container">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                        <li aria-current="page" class="breadcrumb-item active">Keranjang</li>
                    </ol>
                </nav>
                <header>
                    <h2><span class="text-primary">Keranjang Belanja</span></h2>
                </header>
                <div class="row">
                    <div class="col-md-8" id="basket">
                        <div class="box">

                            <!--<p class="text-muted">You currently have 3 item(s) in your cart.</p>-->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Produk</th>
                                            <th>Quantity</th>
                                            <th>Harga Per Unit</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($cart as $i)
                                        {
                                            $id_brg         = $i['id'];
                                            $rowid          = $i['rowid'];
                                            $nm_brg         = $i['name'];
                                            $qty_brg        = $i['qty'];
                                            $hrg_barang     = $i['price'];
                                            $subtotal       = $i['subtotal'];


                                        ?>
                                        <tr>

                                            <!--<td>
                                                <a href="#">
                                                    <?php echo $nm_brg; ?>">
                                                </a>
                                            </td>-->
                                            <td><a href="#"><?php echo $nm_brg; ?></a>
                                            </td>
                                            <td>
                                                <input type="number" value="<?php echo $qty_brg; ?>" class="form-control">
                                            </td>
                                            <td><?php echo "Rp. ".number_format($hrg_barang); ?></td>
                                            <td><?php echo "Rp. ".number_format($subtotal); ?></td>
                                            <input type="hidden" name="subtotal_brg" id="subtotal_brg" value="<?php echo $this->cart->total(); ?>">
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Subtotal</th>
                                            <th colspan="2"><?php echo "Rp. ".number_format($this->cart->total()); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                     <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i> Lanjut Belanja </button>
                                </div>
                                <div class="pull-right">
                                    <!--<button class="btn btn-default"><i class="fa fa-refresh"></i> Update Keranjang</button>-->
                                    <button type="submit" class="btn btn-primary btn-sm">Checkout Barang <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-4">
                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3 class="text-primary">Pesanan Anda</h3>
                            </div>
                            <p class="text-muted">Silahkan Pilih Ongkir Anda</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Provinsi</td>
                                            <th>
                                            <select class="form-control select2" id="provinsi" name="provinsi" required>

                                            </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten</td>
                                            <th>
                                                <select class="form-control select2" id="kabupaten" name="kabupaten" required>
                                                    <option value="" selected>Pilih Kabupaten</option>

                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <th>
                                                <textarea class="form-control" name="alamat" placeholder="Input Alamat Selengkap Mungkin" required></textarea>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Ongkir</td>
                                            <th>
                                               <input type="number" name="ongkir" id="ongkir" class="form-control" required>
                                            </th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total Pembayaran</td>
                                            <th id="tot_bayar"></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive-->
                        </div>
                        <!-- /.box-->
                    </div>
                    <!-- /.col-md-3 -->
                </div>
                <!-- /.row-->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </section>
    <!-- /.property-single bg-white-2 -->
    </form>

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
                            <div class=" d-flex align-items-center justify-content-center"><a href="#" class="btn btn-gradient "><span class="price-label"><strong>Harga Rp.<?php echo number_format($hrg_brg); ?></strong></span></a></div>
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
    <script>
     $(document).ready(function()
    {
        select_prov();

        function select_prov()
        {
            $.ajax
            ({
                url             : '<?php echo base_url();?>custom/get_prov_select',
                type            : 'AJAX',
                dataType        : 'JSON',
                success         : function(data)
                {
                    var html        = '<option value="" selected disabled>Pilih Provinsi</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        html    +=  '<option value="'+data[i].id_prov+'">'+data[i].nama+'</option>';
                    }
                    $('#provinsi').html(html);
                }
            })
        }

        $('#provinsi').on('change',function(data)
        {
            $.ajax
            ({
                url                 : '<?php echo base_url();?>custom/get_kab_by_prov_select',
                type                : 'POST',
                data                : {id_prov:$(this).val()},
                dataType            : 'JSON',
                success             : function(data)
                {
                    var html        = '<option value="" selected>Pilih Kabupaten</option>';
                    for(var i = 0;i<data.length;i++)
                    {
                        html    +=  '<option value="'+data[i].ongkir_id+'">'+data[i].ongkir_nama+'</option>';

                    }
                    $('#kabupaten').html(html);
                }
            })
        })

        $('#kabupaten').on('change',function(data)
        {
            $.ajax
            ({
                url                 : '<?php echo base_url();?>custom/get_ongkir_by_kab_select',
                type                : 'POST',
                data                : {id_kab:$(this).val()},
                dataType            : 'JSON',
                success             : function(data)
                {
                    var subtotal        = parseInt($('#subtotal_brg').val());
                    var ongkir          = parseInt(data.ongkir_tarif);
                    var total           = (subtotal+ongkir);
                    $('#ongkir').val(data.ongkir_tarif);
                    $('#tot_bayar').html('');
                    $('#tot_bayar').append(total);
                }
            })
        })
    })
    </script>
  </body>
</html>
