<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-4">
          <h2 style="margin-top:0px"><?php echo $title_page; ?></h2>
      </div>
      <div class="col-md-4 text-center">
        <div id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
      </div>
      <div class="col-md-4 text-right">
          <!-- <?php echo anchor(site_url('setting/create'), 'Create', 'class="btn btn-primary"'); ?> -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Kode Feed</th>
                  <th>Pass Feed</th>
                  <th>Role</th>
                  <th>Mode</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($setting_data as $setting)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $setting->kode_feed ?></td>
                <td><?php echo $setting->pass_feed ?></td>
                <td><?php echo $setting->role ?></td>
                <td><?php echo $setting->mode ?></td>
                <td style="text-align:center" width="200px">
                  <?php
                  echo anchor(site_url('setting/read/'.$setting->id_sett),'Read');
                  echo ' | ';
                  echo anchor(site_url('setting/update/'.$setting->id_sett),'Update');
                  echo ' | ';
                  echo anchor(site_url('setting/delete/'.$setting->id_sett),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
