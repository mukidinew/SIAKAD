<class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-12">
            <h3><?php echo $title_page; ?></h3>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Nm Kelas</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>Tahun Ajaran</th>
                  <th>Nama Prodi</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($kelas_kuliah_data as $kelas_kuliah)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kelas_kuliah->nm_kelas ?></td>
                <td><?php echo $kelas_kuliah->kode_mk ?></td>
                <td><?php echo $kelas_kuliah->nm_mk ?></td>
                <td><?php echo $kelas_kuliah->ta ?></td>
                <td><?php echo $kelas_kuliah->nm_prodi ?></td>
                <td style="text-align:center">
                  <a href='<?php echo site_url('kelas_kuliah/read/'.$kelas_kuliah->id_kelas) ?>'><i class='fa fa-eye'></i></a>
                </td>
              </tr>
            <?php
          }
          ?>
          </tbody>
    </div>
  </div>
</div>
