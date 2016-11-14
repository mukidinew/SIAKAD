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
          <tr><td>Id Dosen</td><td><?php echo $id_dosen; ?></td></tr>
          <tr><td>Tanggal Diangkat</td><td><?php echo $tanggal_diangkat; ?></td></tr>
          <tr><td></td><td><a href="<?php echo site_url('dosen_wali') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
