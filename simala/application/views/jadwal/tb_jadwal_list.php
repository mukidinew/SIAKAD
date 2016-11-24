<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <h3><?php echo $title_page; ?></h3>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
          <?php echo anchor(site_url('jadwal/create'), 'Create', 'class="btn btn-primary"'); ?>
          <!-- <?php echo anchor(site_url('jadwal/excel'), 'Excel', 'class="btn btn-primary"'); ?> -->
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h3>Raw Data Jadwal</h3><hr>
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Hari</th>
                  <th>Jam</th>
                  <th>Nama MK</th>
                  <th>Kelas</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($jadwal_data as $jadwal)
          {
              ?>
              <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $jadwal->nm_hari ?></td>
                  <td><?php echo $jadwal->nm_jam ?></td>
                  <td><?php echo $jadwal->nm_mk ?></td>
                  <td><?php echo $jadwal->nm_kelas ?></td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <h3>Jadwal Kuliah Per Kurikulum</h3><hr>
      <table class="table table-bordered table-striped" id="kurTable">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Kurikulum</th>
                  <th>Periode</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
          </thead>
           <tbody>
          <?php
          $start = 0;
          foreach ($kurikulum_data as $kurikulum)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kurikulum->nm_kurikulum ?></td>
                <td><?php echo $kurikulum->ta ?></td>
                <td><?php echo $kurikulum->status ?></td>
                <td style="text-align:center">
                  <a href='<?php echo site_url('jadwal/get_jadwal/'.$kurikulum->id_kurikulum) ?>'><i class='fa fa-gears'></i></a> |
                  <a href='<?php echo site_url('jadwal/excel/'.$kurikulum->id_kurikulum) ?>'><i class='fa fa-gears'> Excel</i></a>
                </td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
