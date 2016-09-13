<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4">
            <h3><?php echo $title_page; ?></h3>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <?php echo anchor(site_url('status_mhs/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Nm Status</th>
                  <th>Ket</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($status_mhs_data as $status_mhs)
          {
              ?>
              <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $status_mhs->nm_status ?></td>
                  <td><?php echo $status_mhs->ket ?></td>
                  <td style="text-align:center" width="200px">
                  <?php
                  echo anchor(site_url('status_mhs/read/'.$status_mhs->id_status),'Read');
                  echo ' | ';
                  echo anchor(site_url('status_mhs/update/'.$status_mhs->id_status),'Update');
                  echo ' | ';
                  echo anchor(site_url('status_mhs/delete/'.$status_mhs->id_status),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
