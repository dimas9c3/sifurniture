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
                <p><?php 
                    $users          = $data['tbl_pengguna']= $this->ion_auth->user()->result();
                    foreach($users as $value)
                    {
                        $username       = $value->email;
                        $id_customer    = $value->id;
                    }

                    echo $username;
                 ?></p>
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
                    <a href="<?php echo base_url();?>user/dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>Data Transaksi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>user/pembelian"><i class="fa fa-circle-o"></i> Transaksi Barang</a></li>
                        <li><a href="<?php echo base_url();?>user/pembelian/pembelian_custom"><i class="fa fa-circle-o"></i> Transaksi Custom Design</a></li>
                        <li><a href="<?php echo base_url();?>user/pembelian/pembelian_custom_design"><i class="fa fa-circle-o"></i> Transaksi Custom User</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i>
                        <span>History Pembelian</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>user/pembelian/riwayat_pembelian"><i class="fa fa-circle-o"></i> Data Pembelian</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>user/favorit">
                        <i class="fa fa-link"></i> <span>Favorit</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>user/ulasan">
                        <i class="fa fa-link"></i> <span>Ulasan Anda</span>
                    </a>
                </li>
        </ul>
        <!-- / .sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>