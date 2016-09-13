<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4">
            <h2 style="margin-top:0px"><h3><?php echo $title_page; ?></h3></h2>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <?php echo anchor(site_url('countdown_khs/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Waktu Buka</th>
                  <th>Waktu Tutup</th>
                  <th>Periode</th>
                  <th>Program Studi</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($countdown_khs_data as $countdown_khs)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $countdown_khs->waktu_buka ?></td>
                <td><?php echo $countdown_khs->waktu_tutup ?></td>
                <td><?php echo $countdown_khs->ta ?></td>
                <td><?php echo $countdown_khs->kd_prodi ?></td>
                <td style="text-align:center" width="200px">
                  <?php
                  echo anchor(site_url('countdown_khs/read/'.$countdown_khs->id_cd_khs),'Read');
                  echo ' | ';
                  echo anchor(site_url('countdown_khs/update/'.$countdown_khs->id_cd_khs),'Update');
                  echo ' | ';
                  echo anchor(site_url('countdown_khs/delete/'.$countdown_khs->id_cd_khs),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                  ?>
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
