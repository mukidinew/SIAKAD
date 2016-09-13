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
        <tr><td>Id Krs</td><td><?php echo $id_krs; ?></td></tr>
        <tr><td>Nilai Angka</td><td><?php echo $nilai_angka; ?></td></tr>
        <tr><td>Nilai Index</td><td><?php echo $nilai_index; ?></td></tr>
        <tr><td>Nilai Huruf</td><td><?php echo $nilai_huruf; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('nilai') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
    </div>
  </div>
</div>
