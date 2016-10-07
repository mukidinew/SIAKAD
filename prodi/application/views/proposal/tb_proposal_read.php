<div class="container-fluid">
  <div class="page-header">
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
          <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
          <tr><td>Id Pembimbing 1</td><td><?php echo $id_pembimbing_1; ?></td></tr>
          <tr><td>Id Pembimbing 2</td><td><?php echo $id_pembimbing_2; ?></td></tr>
          <tr><td>Tgl Daftar</td><td><?php echo $tgl_daftar; ?></td></tr>
          <tr><td>Tgl Kadaluarsa</td><td><?php echo $tgl_kadaluarsa; ?></td></tr>
          <tr><td></td><td><a href="<?php echo site_url('proposal') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
