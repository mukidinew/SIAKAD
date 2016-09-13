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
          <tr><td>Nm Kurikulum</td><td><?php echo $nm_kurikulum; ?></td></tr>
          <tr><td>Ta</td><td><?php echo $ta; ?></td></tr>
          <tr><td>Kd Prodi</td><td><?php echo $kd_prodi; ?></td></tr>
          <tr><td>Status</td><td><?php echo $status; ?></td></tr>
          <tr><td></td><td><a href="<?php echo site_url('kurikulum') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
