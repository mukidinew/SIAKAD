<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
      <div class="col-md-12">
        <div class="col-md-4">
          <h3><?php echo $title_page; ?></h3>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <?php echo anchor(site_url('data_krs/create'), 'Create', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('data_krs/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('data_krs'), 'Cancel', 'class="btn btn-primary"'); ?>
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
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Mata Kuliah</th>
                  <th>Nama Kelas</th>
                  <th>Periode</th>
                  <th>Kode Prodi</th>
                  <th>Nama Prodi</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($data_krs_data as $data_krs)
          {
              ?>
              <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $data_krs->nim ?></td>
              <td><?php echo $data_krs->nm_mhs ?></td>
              <td><?php echo $data_krs->id_matkul ?></td>
              <td><?php echo $data_krs->nm_mk ?></td>
              <td><?php echo $data_krs->nm_kelas ?></td>
              <td><?php echo $data_krs->ta ?></td>
              <td><?php echo $data_krs->nm_prodi ?></td>
              <td><?php echo $data_krs->id_prodi ?></td>
              <td style="text-align:center" width="200px">
                <a href='<?php echo site_url('data_krs/read/'.$data_krs->id_data_krs) ?>'><i class='fa fa-eye'></i></a> |
                <a href='<?php echo site_url('data_krs/update/'.$data_krs->id_data_krs) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                <a href='<?php echo site_url('data_krs/delete/'.$data_krs->id_data_krs) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a>
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
