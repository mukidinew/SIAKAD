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
      <table class="table">
        <?php foreach ($data_krs as $key): ?>
          <tr><td>ID Data KRS</td><td><?php echo $key->id_data_krs; ?></td></tr>
          <tr><td>NIM</td><td><?php echo $key->nim; ?></td></tr>
          <tr><td>Nama Kelas</td><td><?php echo $key->nm_kelas; ?></td></tr>
          <tr><td>Kode Mata Kuliah</td><td><?php echo $key->id_matkul; ?></td></tr>
          <tr><td>Nama Mata Kuliah</td><td><?php echo $key->nm_mk; ?></td></tr>
          <tr><td>Periode</td><td><?php echo $key->ta; ?></td></tr>
          <tr><td>Kode Prodi</td><td><?php echo $key->id_prodi; ?></td></tr>
          <tr><td>Nama Prodi</td><td><?php echo $key->nm_prodi; ?></td></tr>
        <?php endforeach; ?>
          <tr><td></td><td><a href="<?php echo site_url('data_krs') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
