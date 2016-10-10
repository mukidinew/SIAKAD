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
          <?php echo anchor(site_url('dosen_pembimbing/create'), 'Create', 'class="btn btn-primary"'); ?>
          <?php echo anchor(site_url('dosen_pembimbing/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
            <tr>
                <th width="80px">No</th>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Status Dosen Pembimbing</th>
                <th>Action</th>
            </tr>
          </thead>
      <tbody>
          <?php
          $start = 0;
          foreach ($dosen_pembimbing_data as $dosen_pembimbing)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $dosen_pembimbing->id_dosen ?></td>
                <td><?php echo $dosen_pembimbing->nm_dosen ?></td>
                <td><?php echo $dosen_pembimbing->status ?></td>
                <td style="text-align:center" width="200px">
                <?php
                echo anchor(site_url('dosen_pembimbing/read/'.$dosen_pembimbing->id_pembimbing),'Read');
                echo ' | ';
                echo anchor(site_url('dosen_pembimbing/update/'.$dosen_pembimbing->id_pembimbing),'Update');
                echo ' | ';
                echo anchor(site_url('dosen_pembimbing/delete/'.$dosen_pembimbing->id_pembimbing),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
