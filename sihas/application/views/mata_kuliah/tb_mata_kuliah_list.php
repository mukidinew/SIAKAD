<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <h3><?php echo $title_page; ?> (Mata_kuliah salah hapus karena url terspasi)</h3>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>Sks</th>
                  <th>Semester</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($mata_kuliah_data as $mata_kuliah)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $mata_kuliah->kode_mk ?></td>
                <td><?php echo $mata_kuliah->nm_mk ?></td>
                <td><?php echo $mata_kuliah->sks ?></td>
                <td><?php echo $mata_kuliah->semester ?></td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
