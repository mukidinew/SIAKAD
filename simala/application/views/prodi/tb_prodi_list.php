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
            <?php echo anchor(site_url('prodi/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Nm Prodi</th>
                  <th>Nm Ketua</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($prodi_data as $prodi)
          {
              ?>
              <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $prodi->nm_prodi ?></td>
                  <td><?php echo $prodi->nm_ketua ?></td>
                  <td style="text-align:center" width="200px">
                      <?php
                      echo anchor(site_url('prodi/read/'.$prodi->id_prodi),'Read');
                      echo ' | ';
                      echo anchor(site_url('prodi/update/'.$prodi->id_prodi),'Update');
                      echo ' | ';
                      echo anchor(site_url('prodi/delete/'.$prodi->id_prodi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
