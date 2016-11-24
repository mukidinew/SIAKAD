<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset ($site_title)?$site_title.' | '.$this->config->item('site_title'):$this->config->item('site_title'); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="<?php echo $this->config->item('meta_desc');?>" name="description" />
    <meta content="<?php echo $this->config->item('meta_key');?>" name="keywords" />
    <meta content="<?php echo $this->config->item('meta_author');?>" name="author" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-switch.min.css?v=3.3.2" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ladda-themeless.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/dropdowns-enhancement.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2-bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet">
    <link rel="shortcut icon" href="wsclient.ico" title="Favicon" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
        $temp_pecah =$this->session->userdata('mode');
    ?>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-default navbar-fixed-top <?php echo $temp_pecah=='on'?"":"navbar-inverse" ?>">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>"><i class="fa fa-code"></i> SIMALA</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-university"></i> Mahasiswa <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('mahasiswa.html') ?>"><i class="	fa fa-group"></i> Mahasiswa</a></li>
                    <li><a href="<?php echo base_url('mahasiswa_lulus.html') ?>"><i class="fa fa-graduation-cap"></i> Mahasiswa Lulus</a></li>
                    <li><a href="<?php echo base_url('mahasiswa_transfer.html') ?>"><i class="fa fa-location-arrow"></i> Mahasiswa Transfer</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-desktop"></i> Kariawan <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('dosen.html') ?>"><i class="fa fa-graduation-cap"></i> Dosen</a></li>
                    <li><a href="<?php echo base_url('kariawan.html') ?>"><i class="fa fa-code-fork"></i> Pegawai</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-file"></i> Akademik <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('mata_kuliah.html') ?>"><i class="fa fa-file-archive-o"></i> Mata Kuliah</a></li>
                    <li><a href="<?php echo base_url('mata_kuliah_kurikulum.html') ?>"><i class="fa fa-file-archive-o"></i> Mata Kuliah Kurikulum</a></li>
                    <!-- <li><a href="<?php echo base_url('.html') ?>"><i class="fa fa-calendar"></i> Kalender</a></li> -->
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="	fa fa-bar-chart"></i> Aktifitas Kuliah <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('kurikulum.html') ?>"><i class="fa fa-sticky-note"></i> Kurikulum</a></li>
                    <li><a href="<?php echo base_url('kelas_kuliah.html') ?>"><i class="fa fa-university"></i> Kelas Kuliah</a></li>
                    <li><a href="<?php echo base_url('data_krs.html') ?>"><i class="fa fa-newspaper-o"></i> KRS Mahasiswa</a></li>
                    <li><a href="<?php echo base_url('kelas_dosen.html') ?>"><i class="fa fa-briefcase"></i> Kelas Dosen</a></li>
                    <li><a href="<?php echo base_url('jadwal.html') ?>"><i class="fa fa-briefcase"></i> Jadwal Perkuliahan</a></li>
                    <li><a href="<?php echo base_url('nilai.html') ?>"><i class="fa fa-tasks"></i> Nilai</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> User <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('login_mhs.html') ?>"><i class="fa fa-user-plus"></i> Mahasiswa </a></li>
                    <li><a href="<?php echo base_url('login_peg.html') ?>"><i class="fa fa-user-plus"></i> Admin </a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-database"></i> Master Data <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('mhs_krs.html') ?>"><i class="fa fa-map"></i> Validasi Krs</a></li>
                    <li><a href="<?php echo base_url('prodi.html') ?>"><i class="fa fa-mortar-board"></i> Prodi</a></li>
                    <li><a href="<?php echo base_url('agama.html') ?>"><i class="fa fa-child"></i> Agama</a></li>
                    <li><a href="<?php echo base_url('jenis_keluar.html') ?>"><i class="fa fa-bar-chart-o"></i> Jenis Keluar</a></li>
                    <li><a href="<?php echo base_url('status_mhs.html') ?>"><i class="fa fa-database"></i> Status Mahasiswa</a></li>
                    <li><a href="<?php echo base_url('ruangan.html') ?>"><i class="fa fa-database"></i> Ruangan</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="	fa fa-bar-chart"></i> Perwalian<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('dosen_wali') ?>"><i class="fa fa-sticky-note"></i> Data Dosen Wali</a></li>
                    <li><a href="<?php echo base_url('mhs_wali') ?>"><i class="fa fa-sticky-note"></i> Data Dosen Wali Mahasiswa</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="	fa fa-bar-chart"></i> Proposal<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('proposal_maju') ?>"><i class="fa fa-sticky-note"></i> Daftar Proposal</a></li>
                  </ul>
                </li>
            </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cloud-download"></i> Sync Data <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('sync.html') ?>"><i class="fa fa-cloud-upload"></i> Syncs Item</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">  <?php echo strtoupper($this->session->userdata('nama')); ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('setting.html') ?>"><i class="fa fa-gears"></i> Setting</a></li>
                <li><a href="<?php echo base_url('countdown_khs.html') ?>"><i class="fa fa-gears"></i> Setting KHS</a></li>
                <li><a href="<?php echo base_url('countdown_krs.html') ?>"><i class="fa fa-gears"></i> Setting KRS</a></li>
                <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-gears"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid ws-container">
        <?php echo $view; ?>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>var top_url = '<?php echo base_url();?>'; </script>
    <script src="<?php echo base_url();?>assets/js/jquery.js?v=2.1.3"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js?v=3.3.4"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-switch.min.js?v=3.3.2"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js?v=3.5.4"></script>
    <script src="<?php echo base_url(); ?>assets/js/spin.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ladda.min.js?v=0.9.4"></script>
    <script src="<?php echo base_url(); ?>assets/js/dropdowns-enhancement.js?v=3.1.1"></script>
    <script src="<?php echo base_url();?>assets/js/back-to-top.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>assets/js/chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/app.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <?php
        //echo $assign_js;
        if ($assign_js != '') {
            $this->load->view($assign_js);
        }
    ?>
  </body>
</html>
