<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4">
            <h2 style=""><?php echo $title_page; ?></h2>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <?php echo anchor(site_url('mhs_wali/create'), 'Create', 'class="btn btn-primary"'); ?>
  </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Nama Dosen Wali</th>
                  <th>Jurusan</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($mhs_wali_data as $mhs_wali)
          {
              ?>
              <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $mhs_wali->id_mhs ?></td>
                  <td><?php echo $mhs_wali->nm_mhs ?></td>
                  <td><?php echo $mhs_wali->nm_dosen ?></td>
                  <td><?php echo $mhs_wali->nm_prodi ?></td>
                  <td style="text-align:center" width="200px">
                    <?php
                    echo anchor(site_url('mhs_wali/read/'.$mhs_wali->id_mhs_wali),'Read');
                    echo ' | ';
                    echo anchor(site_url('mhs_wali/update/'.$mhs_wali->id_mhs_wali),'Update');
                    echo ' | ';
                    echo anchor(site_url('mhs_wali/delete/'.$mhs_wali->id_mhs_wali),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
