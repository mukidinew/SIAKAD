<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMPERPUS | Dashboard</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/ionicons/css/ionicons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/skin-blue.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert/dist/sweetalert.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
    <!--
    <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
    -->
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/sweetalert/dist/sweetalert.min.js'); ?>"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini font-awesome">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?php echo base_url('home.html'); ?>" class="logo">
          <span class="logo-mini"><i class='fa fa-street-view'></i></span>
          <span class="logo-lg"><i class='fa fa-street-view'></i> SIM<b>PERPUS</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('assets/image/img.jpg'); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">Admin Perpustakaan</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo base_url('assets/image/img.jpg'); ?>" class="img-circle" alt="User Image">
                    <p>
                      Admin Perpustakaan
                      <small>Admin SIMPERPUS</small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo 'admin@index.html'; ?>" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/image/img.jpg'); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin Perpustakaan</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Sedang Aktif</a>
            </div>
          </div>
          <!-- <form action="<?php echo base_url('.html'); ?>" method="post" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="cari" class="form-control" placeholder="Cari Data Mahasiswa...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <ul class="sidebar-menu">
            <li class="header">Menu Perpustakaan</li>
            <li <?php echo (isset($active) && !empty($active) && ($active=="buku"))?'class="active"':''; ?>>
              <a href="<?php echo base_url('buku.html'); ?>"><i class="fa fa-book"></i> <span> Data Buku</span></a>
            </li>
            <li <?php echo (isset($active) && !empty($active) && ($active=="pinjam"))?'class="active"':''; ?>>
              <a href="<?php echo base_url('pinjam.html'); ?>"><i class="fa fa-book"></i> <span> Data Pinjam</span></a>
            </li>
            <li class="treeview<?php echo (isset($active) && !empty($active) && (($active=="kategori") || ($active=="rak")))?' active':''; ?>">
              <a href="#"><i class="fa fa-credit-card"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li <?php echo (isset($active) && !empty($active) && ($active=="kategori"))?'class="active"':''; ?>>
                  <a href="<?php echo base_url('kategori.html'); ?>"><i class='fa fa-circle-o'></i> Data Kategori</a>
                </li>
                <li <?php echo (isset($active) && !empty($active) && ($active=="rak"))?'class="active"':''; ?>>
                  <a href="<?php echo base_url('rak.html'); ?>"><i class='fa fa-circle-o'></i> Data Rak Buku</a>
                </li>
                <li <?php echo (isset($active) && !empty($active) && ($active=="penerbit"))?'class="active"':''; ?>>
                  <a href="<?php echo base_url('penerbit.html'); ?>"><i class='fa fa-circle-o'></i> Data Penerbit Buku</a>
                </li>
              </ul>
            </li>
            <li class="treeview<?php echo (isset($active) && !empty($active) && (($active=="pinjam") || ($active=="kembali")))?' active':''; ?>">
              <a href="#"><i class="fa fa-credit-card"></i> <span>Data Mahasiswa</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li <?php echo (isset($active) && !empty($active) && ($active=="kategori"))?'class="active"':''; ?>>
                  <a href="<?php echo base_url('kategori.html'); ?>"><i class='fa fa-circle-o'></i> Data Mahasiswa</a>
                </li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
				<section class="content-header">
				  <h1>Sistem Informasi Manajemen Perpustakaan <small>SIMPERPUS</small>
				  </h1>
				  <ol class="breadcrumb">
					  <li class="active"><i class="fa fa-home"></i><a href=" <?php echo site_url($this->uri->segment(1)) ?>"><?php echo $breadcrumb ?></a></li>
				  </ol>
				</section>
				<section class="content">
          <div class="row">
            <div class="col-xs-12 col-lg-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $title ?></h3>
                </div>
                <div class="box-body">
                  <?php echo $view; ?>
                </div>
              </div>
            </div>
          </div>
				</section>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          "<i>When there is a will there is a way.</i>"
        </div>
        <strong>Copyright &copy; 2016</strong> <a href="http://flare.web.id" target="_blank">Iank</a>.
      </footer>
      <div class="control-sidebar-bg"></div>
    </div>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <?php
        //echo $assign_js;
        if ($assign_js != '') {
            $this->load->view($assign_js);
        }
    ?>
  </body>
</html>
