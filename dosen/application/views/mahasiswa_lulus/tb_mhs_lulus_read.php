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
          <tr><td>Id Jns Keluar</td><td><?php echo $id_jns_keluar; ?></td></tr>
          <tr><td>Tgl Keluar</td><td><?php echo $tgl_keluar; ?></td></tr>
          <tr><td>Jalur Skripsi</td><td><?php echo $jalur_skripsi; ?></td></tr>
          <tr><td>Judul Skripsi</td><td><?php echo $judul_skripsi; ?></td></tr>
          <tr><td>Bln Awal Bim</td><td><?php echo $bln_awal_bim; ?></td></tr>
          <tr><td>Bln Akhir Bim</td><td><?php echo $bln_akhir_bim; ?></td></tr>
          <tr><td>Sk Yudisium</td><td><?php echo $sk_yudisium; ?></td></tr>
          <tr><td>Tgl Yudisium</td><td><?php echo $tgl_yudisium; ?></td></tr>
          <tr><td>IPK</td><td><?php echo $IPK; ?></td></tr>
          <tr><td>No Ijazah</td><td><?php echo $no_ijazah; ?></td></tr>
          <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
          <tr><td></td><td><a href="<?php echo site_url('mahasiswa_lulus') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
