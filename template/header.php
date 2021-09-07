<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kios Kuningan</title>
    <!-- Icons-->
    <link href="<?=BASE_URL;?>vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/font-awesome-5/css/fontawesome-all.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?=BASE_URL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>assets/css/custom_style.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Page level plugin JavaScript-->
    <link href="<?=BASE_URL;?>vendors/datatables/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/datatables/css/responsive.bootstrap4.min.css" rel="stylesheet">

    <link href="<?=BASE_URL;?>vendors/gijgo/css/gijgo.min.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>vendors/jasny/css/jasny-bootstrap.min.css" rel="stylesheet">
    <!-- Multiple File Input -->
    <link href="<?php echo BASE_URL;?>node_modules/fine-uploader/fine-uploader/fine-uploader-new.css" rel="stylesheet">
		<script src="<?php echo BASE_URL;?>node_modules/fine-uploader/fine-uploader/fine-uploader.core.js"></script>	
		<script src="<?php echo BASE_URL;?>node_modules/fine-uploader/fine-uploader/fine-uploader.js"></script>	
		<?php require_once dirname(__FILE__) . "/../node_modules/fine-uploader/fine-uploader/templates/gallery.html"; ?>
    
    <script src="<?=BASE_URL;?>config/config.js"></script>
    <script src="<?=BASE_URL;?>vendors/jquery/js/jquery.min.js"></script>
    <script src="<?=BASE_URL;?>node_modules/tinymce/tinymce.min.js"></script>
    
  </head>

  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">        
  <script>
        tinymce.init({
			menubar : false,
            plugins: "",
            selector: '#textFasilitas',
            toolbar1: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist | removeformat',
			plugins: 'lists advlist',
			advlist_bullet_styles: 'square',
			advlist_number_styles: 'lower-alpha,lower-roman,upper-alpha,upper-roman'
        });
    </script>
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="<?=BASE_URL;?>assets/img/icon_large.png" width="170" height="50">
      </a>
      <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
        <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-sign-out-alt"></i>
        </a>
      </button>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="?laman=kios">
              <i class="nav-icon fas fa-building"></i> Kios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?laman=tambah_kios">
              <i class="nav-icon fas fa-plus"></i> Tambah Kios</a>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">