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
          <tr><td>Kode Pembayaran</td><td><?php echo $kode_pembayaran; ?></td></tr>
          <tr><td>Id Kurikulum</td><td><?php echo $id_kurikulum; ?></td></tr>
          <tr><td>Status Ambil</td><td><?php echo $status_ambil; ?></td></tr>
          <tr><td>Status Cek</td><td><?php echo $status_cek; ?></td></tr>
          <tr><td></td><td><a href="<?php echo site_url('mhs_krs') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
