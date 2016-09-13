<class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
          <tr><td>Nm Kelas</td><td><?php echo $nm_kelas; ?></td></tr>
          <tr><td>Id Matkul</td><td><?php echo $id_matkul; ?></td></tr>
          <tr><td>Id Kurikulum</td><td><?php echo $id_kurikulum; ?></td></tr>
          <tr><td>Id Prodi</td><td><?php echo $id_prodi; ?></td></tr>
          <tr><td></td><td><a href="<?php echo site_url('kelas_kuliah') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
