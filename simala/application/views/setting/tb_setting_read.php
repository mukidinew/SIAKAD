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
          <tr><td>Kode Feed</td><td><?php echo $kode_feed; ?></td></tr>
          <tr><td>Pass Feed</td><td><?php echo $pass_feed; ?></td></tr>
          <tr><td>Role</td><td><?php echo $role; ?></td></tr>
          <tr><td>Url Ws</td><td><?php echo $url_ws; ?></td></tr>
          <tr><td>Mode</td><td><?php echo $mode; ?></td></tr>
          <tr><td>Link</td><td><?php echo $link; ?></td></tr>
          <tr><td></td><td><a href="<?php echo site_url('setting') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
