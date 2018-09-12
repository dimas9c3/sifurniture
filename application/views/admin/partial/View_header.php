<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sifurniture</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/plugins/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/template/dist/css/AdminLTE.min.css">
    <!-- Custom Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/template/custom.css?version=2">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/template/dist/css/skins/_all-skins.min.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/plugins/datatables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/plugins/datatables/extensions/buttons/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/plugins/datatables/extensions/FixedHeader/css/fixedHeader.dataTables.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Sweetalert -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/plugins/sweetalert/sweetalert.css'?>">
    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'vendors/plugins/select2/dist/css/select2.min.css'?>">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition fixed skin-green-light sidebar-mini">
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>I</b>WD</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>I</b>Woody's</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url();?>vendors/template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">Administrator</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url();?>vendors/template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                Administrator
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">

                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url();?>auth/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                    <!-- / .dropdown-menu -->
                </li>
                <!-- / .dropdown user user-menu -->
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat Website Anda"><i class="fa fa-globe"></i></a>
                </li>
            </ul>
            <!-- /.nav navbar-nav -->
        </div>
        <!-- / .navbar-custom-menu -->
    </nav>
</header>