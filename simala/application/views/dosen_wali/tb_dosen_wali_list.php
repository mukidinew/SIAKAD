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
            <?php echo anchor(site_url('dosen_wali/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Tanggal Diangkat</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($dosen_wali_data as $dosen_wali)
          {
              ?>
              <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $dosen_wali->id_dosen ?></td>
                  <td><?php echo $dosen_wali->nm_dosen ?></td>
                  <td><?php echo $dosen_wali->tanggal_diangkat ?></td>
                  <td style="text-align:center" width="200px">
                    <?php
                    echo anchor(site_url('dosen_wali/read/'.$dosen_wali->id_dosen_wali),'Read');
                    echo ' | ';
                    echo anchor(site_url('dosen_wali/update/'.$dosen_wali->id_dosen_wali),'Update');
                    echo ' | ';
                    echo anchor(site_url('dosen_wali/delete/'.$dosen_wali->id_dosen_wali),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
