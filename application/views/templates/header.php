<!doctype html>
<html lang="en">

<head>
   <title>BUN INVENTORY</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
   <meta id="base_url" content="<?= base_url() ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

   <!-- jQuery UI required by datepicker editable -->
   <link href="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />

   <!-- JQVMap css -->
   <link href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css" rel="stylesheet" type="text/css" />
   <link href="<?= base_url() ?>assets/plugins/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
   <!-- Bootstrap Tour css -->
    <link href="<?= base_url() ?>assets/plugins/bootstrap-tour/bootstrap-tour-standalone.min.css" rel="stylesheet" type="text/css" />
   <!-- App css -->
   <link href="<?= base_url() ?>assets/css/bootstrap-custom.min.css" rel="stylesheet" type="text/css" />
   <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

   <!-- Favicon -->
   <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png">
   <script src="https://kit.fontawesome.com/bb21b3c852.js" crossorigin="anonymous"></script>
</head>

<body>
   <!-- WRAPPER -->
   <div id="wrapper">

      <!-- NAVBAR -->
      <nav class="navbar navbar-expand fixed-top">
         <div class="navbar-brand d-none d-lg-block">
            <a href="index.html"><img src="<?= base_url() ?>assets/images/logo-white.png" alt="Klorofil Pro Logo" class="img-fluid logo"></a>
         </div>
         <div class="container-fluid p-0">
            <button id="tour-fullwidth" type="button" class="btn btn-default btn-toggle-fullwidth"><i class="ti-menu"></i></button>

            <div id="navbar-menu">
               <ul class="nav navbar-nav align-items-center">

                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="https://i.imgur.com/M701HZb.jpg" class="user-picture"" alt=" Avatar"> <span>Samuel</span></a>
                     <ul class="dropdown-menu dropdown-menu-right logged-user-menu">
                        <li><a href="#"><i class="ti-user"></i> <span>My Profile</span></a></li>
                        <li><a href="appviews-inbox.html"><i class="ti-email"></i> <span>Message</span></a></li>
                        <li><a href="#"><i class="ti-settings"></i> <span>Settings</span></a></li>
                        <li><a href="page-lockscreen.html"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- END NAVBAR -->

      <!-- LEFT SIDEBAR -->
      <div id="sidebar-nav" class="sidebar">
         <nav>
            <ul class="nav" id="sidebar-nav-menu">
               <li class="menu-group">Main</li>
               <li><a href="<?= base_url() ?>" class="<?= active_sidebar("") ?>"><i class="fa fa-home"></i> <span class="title">Home</span></a></li>
               <li class="panel">
                  <a href="#produk" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?= active_sidebar("produkcontroller") ?>"><i class="ti-package"></i></i> <span class="title">Produk </span> <i class="icon-submenu ti-angle-left"></i></a>
                  <div id="produk" class="collapse">
                     <ul class="submenu">
                        <li><a href="<?= base_url("produkcontroller/index/view") ?>" class="">Daftar Produk</a></li>
                        <li><a href="<?= base_url("produkcontroller/index/add") ?>" class="">Tambah Produk</a></li>
                     </ul>
                  </div>
               </li>
               <li>
                  <a href="<?= base_url("gudangcontroller") ?>" class="<?= active_sidebar("gudangcontroller") ?>">
                     <i class="ti-folder"></i> <span class="title">Gudang Satuan</span>
                  </a>
               </li>
               <li class="panel">
                  <a href="#distributor" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?= active_sidebar("distributorcontroller") ?>"><i class="ti-truck"></i></i> <span class="title">Distributor</span> <i class="icon-submenu ti-angle-left"></i></a>
                  <div id="distributor" class="collapse">
                     <ul class="submenu">
                        <li><a href="<?= base_url("distributorcontroller") ?>" class="">Daftar Distributor</a></li>
                        <li><a href="<?= base_url("distributorcontroller/action/add") ?>" class="">Tambah Distributor</a></li>
                     </ul>
                  </div>
               </li>
            </ul>
         </nav>
      </div>
      <!-- END LEFT SIDEBAR -->