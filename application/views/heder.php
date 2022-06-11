
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan SMAN 2 Cileungsi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>temp/logo.jpeg">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>temp/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>temp/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>temp/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>temp/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>temp/dist/dis/css/iziToast.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>temp/dist/css/skins/_all-skins.min.css">
<!-- tabel -->
<link rel="stylesheet" href="<?php echo base_url(); ?>temp/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- select2 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>temp/bower_components/select2/dist/css/select2.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!-- javascript -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>temp/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>temp/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>temp/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>temp/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>temp/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>temp/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>temp/olahangka.js"></script>
<script src="<?php echo base_url(); ?>temp/dist/dis/js/iziToast.min.js"></script>
<!-- tabel -->
<script src="<?php echo base_url(); ?>temp/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>temp/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- select2 -->
 <script src="<?php echo base_url(); ?>temp/bower_components/select2/dist/js/select2.full.min.js"></script>

  <header class="main-header">
<!-- Logo -->
 <?php $this->load->view('function'); ?>
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">SMAN 2 CILEUNGSI</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Main navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 
             $admin = $this->db->get_where('admin',array('nama_ad'=>$this->session->userdata('nama')))->row_array();
              $foto = $admin['foto'];
              if ($foto == "") {?>
                <img src="<?php echo base_url(); ?>temp/logo.jpeg" class="user-image" alt="User Image">
              <?php }else{ ?>
                <img src="<?php echo base_url(); ?>temp/<?php echo $foto; ?>" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php 
              if ($foto == "") {?>
               <img style="box-shadow: 0 0px 1px 2px white;" src="<?php echo base_url(); ?>temp/logo.jpeg" class="img-circle" alt="User Image">
              <?php }else{ ?>
                <img style="box-shadow: 0 0px 2px 2px white;" src="<?php echo base_url(); ?>temp/<?php echo $foto ?>" class="img-circle" alt="User Image">
              <?php } ?>
                <p>
                  <?php echo $this->session->userdata('nama'); ?>
                  <small>Admin Perpustakaan</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat"  data-target="#gantiF" data-toggle="modal"><i class="glyphicon glyphicon-picture"></i> Ganti Foto</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('clogin/logout'); ?>" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-off"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar" class="btn-disabled"><i class=""></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<div class="modal" id="gantiF">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Ganti Foto Profil</h3>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('cpengaturan/gantif') ?>">
          <div class="form-group">
            <label>Masukkan Foto</label>
            <input type="file" name="foto" class="form-control" autofocus="" required="" accept="image/*+zip">
            <p>File Harus <i><B>PNG,JPG</B></i></p>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-flat pull-left"><i class="fa fa-check"></i> Simpan</button>
        </form>
        <button class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
      </div>
    </div>
  </div>
</div>
  <!-- =============================================== -->
