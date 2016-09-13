<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
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
                  <th>Kode Mk</th>
                  <th>Nama Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Semester</th>
                  <th>nm_kurikulum</th>
                  <th>Periode</th>
                  <th>Kode Prodi</th>
                  <th>Program Studi</th>
                  </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($mata_kuliah_kurikulum_data as $mata_kuliah_kurikulum)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $mata_kuliah_kurikulum->kode_mk ?></td>
                <td><?php echo $mata_kuliah_kurikulum->nm_mk ?></td>
                <td><?php echo $mata_kuliah_kurikulum->sks ?></td>
                <td><?php echo $mata_kuliah_kurikulum->semester ?></td>
                <td><?php echo $mata_kuliah_kurikulum->nm_kurikulum ?></td>
                <td><?php echo $mata_kuliah_kurikulum->ta ?></td>
                <td><?php echo $mata_kuliah_kurikulum->kd_prodi ?></td>
                <td><?php echo $mata_kuliah_kurikulum->nm_prodi ?></td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
