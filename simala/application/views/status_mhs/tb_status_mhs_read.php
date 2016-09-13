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
          <tr><td>Nm Status</td><td><?php echo $nm_status; ?></td></tr>
          <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
          <tr><td></td><td><a href="<?php echo site_url('status_mhs') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
