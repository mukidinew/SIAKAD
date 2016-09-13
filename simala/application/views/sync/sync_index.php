<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
              <div class="col-xs-3">
                  <i class="fa fa-shopping-cart"></i>
              </div>
              <div class="col-xs-9 text-right">
                  <div class=""><b>Indeks Pilihan</b></div>
              </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="col-md-4">
            <div class="chat-panel panel panel-primary">
              <div class="panel-heading">
                  <i class="fa fa-comments fa-fw"></i>
                  <b>Mahasiswa</b>
                  <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-chevron-down"></i>
                      </button>
                      <ul class="dropdown-menu slidedown">
                          <li>
                              <a href="#">
                                  <i class="fa fa-refresh fa-fw"></i> Refresh
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="col-md-6">
                  <div class="panel panel-success">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa  fa-user-plus fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><b><?php echo $count_mhs ?></b></div>
                                  <div>Mahasiswa</div>
                              </div>
                          </div>
                      </div>
                      <a href="<?php echo site_url('Sync/mahasiswa'); ?>">
                          <div class="panel-footer">
                              <span class="pull-left">Sinkronisasi</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="panel panel-danger">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-mortar-board fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><b><?php echo $count_mhs_lulus; ?></b></div>
                                  <div>Mahasiswa Lulus</div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
                </div>
              </div>
              <!-- /.panel-body -->
              <div class="panel-footer">
                <div class="progress progress-striped active">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <div class="input-group">
                  <!-- <input id="btn-input" type="text" class="form-control input-sm" placeholder="" disabled>
                  <span class="input-group-btn">
                      <button class="btn btn-warning btn-sm" id="btn-chat">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Sync
                      </button>
                  </span> -->
                </div>
              </div>
              <!-- /.panel-footer -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="chat-panel panel panel-primary">
              <div class="panel-heading">
                  <i class="fa fa-comments fa-fw"></i>
                  <b>Akademik</b>
                  <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-chevron-down"></i>
                      </button>
                      <ul class="dropdown-menu slidedown">
                          <li>
                              <a href="#">
                                  <i class="fa fa-refresh fa-fw"></i> Refresh
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="col-md-6">
                  <div class="panel panel-success">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa  fa-list-ul fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><b><?php echo $count_mata_kuliah ?></b></div>
                                  <div>Mata Kuliah</div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="panel panel-danger">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-sort-amount-asc fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><b><?php echo $count_mk_kur ?></b></div>
                                  <div>MK Kurikulum</div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
                </div>
              </div>
              <!-- /.panel-body -->
              <div class="panel-footer">
                <div class="progress progress-striped active">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <div class="input-group">
                  <input id="btn-input" type="text" class="form-control input-sm" placeholder="" disabled>
                  <span class="input-group-btn">
                      <button class="btn btn-warning btn-sm" id="btn-chat">
                          <i class="fa fa-cloud-upload" aria-hidden="true"></i> Sync
                      </button>
                  </span>
                </div>
              </div>
              <!-- /.panel-footer -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="chat-panel panel panel-primary">
              <div class="panel-heading">
                  <i class="fa fa-comments fa-fw"></i>
                  <b>Kurikulum Dan Kelas</b>
                  <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-chevron-down"></i>
                      </button>
                      <ul class="dropdown-menu slidedown">
                          <li>
                              <a href="#">
                                  <i class="fa fa-refresh fa-fw"></i> Refresh
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="col-md-6">
                  <div class="panel panel-success">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa  fa-list-ul fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><b><?php echo $count_kurikulum ?></b></div>
                                  <div>Kurikulum</div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="panel panel-danger">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-building fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><b><?php echo $count_kelas_kuliah ?></b></div>
                                  <div>Kelas</div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
                </div>
              </div>
              <!-- /.panel-body -->
              <div class="panel-footer">
                <div class="progress progress-striped active">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <div class="input-group">
                  <input id="btn-input" type="text" class="form-control input-sm" placeholder="" disabled>
                  <span class="input-group-btn">
                      <button class="btn btn-warning btn-sm" id="btn-chat">
                          Sync
                      </button>
                  </span>
                </div>
              </div>
              <!-- /.panel-footer -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
              <div class="col-xs-3">
                  <i class="fa fa-shopping-cart"></i>
              </div>
              <div class="col-xs-9 text-right">
                  <div class=""><b>Indeks Pilihan</b></div>
              </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="col-md-4">
            <div class="chat-panel panel panel-primary">
              <div class="panel-heading">
                  <i class="fa fa-comments fa-fw"></i>
                  <b>Kartu Rencana Studi Dan Penugasan Dosen</b>
                  <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-chevron-down"></i>
                      </button>
                      <ul class="dropdown-menu slidedown">
                          <li>
                              <a href="#">
                                  <i class="fa fa-refresh fa-fw"></i> Refresh
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="col-md-6">
                  <div class="panel panel-success">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa  fa-list-ul fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><b><?php echo $count_data_krs ?></b></div>
                                  <div>KRS</div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="panel panel-danger">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-building fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><b><?php echo $count_kelas_dosen ?></b></div>
                                  <div>Penugasan Dosen</div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
                </div>
              </div>
              <!-- /.panel-body -->
              <div class="panel-footer">
                <div class="progress progress-striped active">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <div class="input-group">
                  <input id="btn-input" type="text" class="form-control input-sm" placeholder="" disabled>
                  <span class="input-group-btn">
                      <button class="btn btn-warning btn-sm" id="btn-chat">
                          Sync
                      </button>
                  </span>
                </div>
              </div>
              <!-- /.panel-footer -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="chat-panel panel panel-primary">
              <div class="panel-heading">
                  <i class="fa fa-comments fa-fw"></i>
                  <b>Nilai Mahasiswa</b>
                  <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-chevron-down"></i>
                      </button>
                      <ul class="dropdown-menu slidedown">
                          <li>
                              <a href="#">
                                  <i class="fa fa-refresh fa-fw"></i> Refresh
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="col-md-12">
                  <div class="panel panel-warning">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa  fa-list-ul fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><b><?php echo $count_nilai ?></b></div>
                                  <div>Nilai Mahasiswa</div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
                </div>
              </div>
              <!-- /.panel-body -->
              <div class="panel-footer">
                <div class="progress progress-striped active">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <div class="input-group">
                  <input id="btn-input" type="text" class="form-control input-sm" placeholder="" disabled>
                  <span class="input-group-btn">
                      <button class="btn btn-warning btn-sm" id="btn-chat">
                          Sync
                      </button>
                  </span>
                </div>
              </div>
              <!-- /.panel-footer -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="chat-panel panel panel-primary">
              <div class="panel-heading">
                  <i class="fa fa-comments fa-fw"></i>
                  <b>Presentase Pelaporan</b>
                  <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-chevron-down"></i>
                      </button>
                      <ul class="dropdown-menu slidedown">
                          <li>
                              <a href="#">
                                  <i class="fa fa-refresh fa-fw"></i> Refresh
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="col-md-12">

                </div>
              </div>
              <!-- /.panel-body -->
              <div class="panel-footer">
                <div class="input-group">
                  <input id="btn-input" type="text" class="form-control input-sm" placeholder="" disabled>
                  <span class="input-group-btn">
                      <button class="btn btn-warning btn-sm" id="btn-chat">
                          Sync
                      </button>
                  </span>
                </div>
              </div>
              <!-- /.panel-footer -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-2">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
              <div class="col-xs-3">
                  <i class="fa fa-shopping-cart"></i>
              </div>
              <div class="col-xs-9 text-right">
                  <div class=""><b>Presentase Pelaporan Setiap Periode</b></div>
              </div>
          </div>
        </div>
        <div class="panel-body">

        </div>
      </div>
    </div> -->
    </div>
  </div>
</div>
