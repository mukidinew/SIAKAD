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
        <tr><td>Id Mhs</td><td><?php echo $id_mhs; ?></td></tr>
        <tr><td>Sks Diakui</td><td><?php echo $sks_diakui; ?></td></tr>
        <tr><td>Pt Asal</td><td><?php echo $pt_asal; ?></td></tr>
        <tr><td>Prodi Asal</td><td><?php echo $prodi_asal; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('mahasiswa_transfer') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
