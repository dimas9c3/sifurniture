<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url();?>vendors/template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Administrator</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?php echo base_url();?>admin/dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Master Barang</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>admin/barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
                        <li><a href="<?php echo base_url();?>admin/barang/sub_kategori"><i class="fa fa-circle-o"></i> Data Sub Kategori Barang</a></li>
                        <li><a href="<?php echo base_url();?>admin/barang/kategori"><i class="fa fa-circle-o"></i> Data Kategori Barang</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Master Interior</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>admin/interior"><i class="fa fa-circle-o"></i> Data Interior</a></li>
                        <li><a href="<?php echo base_url();?>admin/interior/kategori_interior"><i class="fa fa-circle-o"></i> Data Kategori Interior</a></li>
                        <li><a href="<?php echo base_url();?>admin/interior/sub_1_kategori_interior"><i class="fa fa-circle-o"></i> Data Sub 1 Kategori Interior</a></li>
                        <li><a href="<?php echo base_url();?>admin/interior/sub_2_kategori_interior"><i class="fa fa-circle-o"></i> Data Sub 2 Kategori Interior</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Master Custom Design</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>admin/custom"><i class="fa fa-circle-o"></i> Data Custom Design</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Transaksi Penjualan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>admin/penjualan"><i class="fa fa-circle-o"></i> Penjualan Barang Aktif</a></li>
                        <li><a href="<?php echo base_url();?>admin/penjualan/penjualan_custom"><i class="fa fa-circle-o"></i> Penjualan Custom</a></li>
                        <li><a href="<?php echo base_url();?>admin/penjualan/penjualan_custom_design"><i class="fa fa-circle-o"></i> Penjualan Custom Design Aktif</a></li>
                        <li><a href="<?php echo base_url();?>admin/penjualan/riwayat_penjualan"><i class="fa fa-circle-o"></i> Riwayat Penjualan Barang</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Data Ongkir</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>admin/ongkir"><i class="fa fa-circle-o"></i> Data Ongkir</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Data Member</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>admin/user"><i class="fa fa-circle-o"></i> Data Member</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Ulasan Pengunjung</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>admin/ulasan"><i class="fa fa-circle-o"></i> Data Semua Ulasan</a></li>
                        <li><a href="<?php echo base_url();?>admin/ulasan/ulasan_ditampilkan"><i class="fa fa-circle-o"></i> Data Ulasan Ditampilkan</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Data Artikel</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>admin/artikel"><i class="fa fa-circle-o"></i> Data Semua Artikel</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Laporan Barang</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>admin/dilihat"><i class="fa fa-circle-o"></i> Data Barang dilihat</a></li>
                    </ul>
                </li>

				<li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Pengaturan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
						<li>
		                     <a href="<?php echo base_url();?>admin/pengaturan">
		                        <i class="fa fa-gear"></i> <span>Pengaturan Umum</span>
		                     </a>
		                </li>
						 <li>
 		                    <a href="<?php echo base_url();?>admin/pengaturan/pengaturan_lanjutan">
 		                         <i class="fa fa-gear"></i> <span>Pengaturan Lanjutan</span>
 		                    </a>
 		                 </li>
						 <li>
 						   <a href="<?php echo base_url();?>admin/pengaturan/pengaturan_gambar">
 								<i class="fa fa-gear"></i> <span>Pengaturan Gambar</span>
 						   </a>
 						</li>
                    </ul>
                </li>
        </ul>
        <!-- / .sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
