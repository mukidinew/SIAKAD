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
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class=""><b>Pengumuman KRS</b></div>
                </div>
            </div>
          </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="well text-center">
                <div class="center text-large innerAll"><h2><i class="fa fa-chain-broken text-danger "></i> Perhatian</h2></div>
                <h3 class="strong innerTB  "></h3>
                <h3><?php echo "Jadwal Pengambilan KRS <b>".$pengumuman->waktu_buka."</b> Dan Penutupan KRS <b>".$pengumuman->waktu_tutup."</b>"; ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
              <div class="col-xs-3">
                  <i class="fa fa-shopping-cart"></i>
              </div>
              <div class="col-xs-9 text-right">
                  <div class=""><b>PERBAIKAN</b></div>
              </div>
          </div>
        </div>
        <div class="panel-body">

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
              <div class="col-xs-3">
                  <i class="fa fa-shopping-cart"></i>
              </div>
              <div class="col-xs-9 text-right">
                  <div class=""><b>Mahasiswa Per Angkatan</b></div>
              </div>
          </div>
        </div>
        <div class="panel-body">
          <b>Mahasiswa Aktif</b><hr>
          <table class="table table-bordered table-striped" id="tb_aktif">
            <thead>
                <tr>
                    <th>2011</th>
                    <th>2012</th>
                    <th>2013</th>
                    <th>2014</th>
            		    <th>2015</th>
                </tr>
            </thead>
    	       <tbody>
               <tr>
                <?php
                $start = 0;
                foreach ($mhs_aktif as $key => $value)
                {
                  ?>
                    <td> <?php echo $value ?></td>
                  <?php
                }
                ?>
                </tr>
            </tbody>
          </table>
          <b>Mahasiswa Lulus</b><hr>
          <table class="table table-bordered table-striped" class="tb_aktif">
            <thead>
                <tr>
                    <th>2007</th>
                    <th>2008</th>
                    <th>2009</th>
                    <th>2010</th>
            		    <th>2011</th>
                </tr>
            </thead>
    	       <tbody>
               <tr>
                <?php
                $start = 0;
                foreach ($mhs_lulus as $key => $value)
                {
                  ?>
                    <td> <?php echo $value ?></td>
                  <?php
                }
                ?>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class=""><b>Jadwal Mata Kuliah Anda Hari Ini</b></div>
                </div>
            </div>
          </div>
          <div class="panel-body">
            <table class="table table-bordered table-striped table_a">
              <thead>
                <tr>
                  <th>Jam</th>
                  <th>Mata Kuliah</th>
                  <th>Ruangan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data_jadwal as $key): ?>
                  <tr>
                    <td><?php echo $key->nm_jam ?></td>
                    <td><?php echo $key->nm_mk ?></td>
                    <td><?php echo $key->nm_ruangan ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="chat-panel panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>
            <b>Team Pengembang</b>
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
                    <li>
                        <a href="#">
                            <i class="fa fa-check-circle fa-fw"></i> Available
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="chat">
                <div class="right">
                    <span class="chat-img pull-right">
                        <img src="<?php echo base_url('assets/img/ui-divya.jpg') ?>" alt="User Avatar" class="img-circle">
                    </span>
                    <div class="chat-body clearfix">
                      <b>Sukardi, S.Kom, M.Kom</b><hr>
                    </div>
                </div>
                <div class="right">
                    <span class="chat-img pull-right">
                        <img src="<?php echo base_url('assets/img/ui-divya.jpg') ?>" alt="User Avatar" class="img-circle">
                    </span>
                    <div class="chat-body clearfix">
                      <b>Sofyan Saputra</b><hr>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            <div class="input-group">
                <input id="btn-input" type="text" class="form-control input-sm" placeholder="">
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-sm" id="btn-chat">
                        Send
                    </button>
                </span>
            </div>
        </div>
        <!-- /.panel-footer -->
      </div>
    </div>
  </div>
</div>
