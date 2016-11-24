<section class="content-header">
  <h1>
	Laporan Transaksi
	<small>SIAMI</small>
  </h1>
  <ol class="breadcrumb">
	<li><i class="fa fa-credit-card"></i> <a href="<?php echo base_url('transaksi.html'); ?>">Transaksi</a></li>
	<li class="active"> Laporan</li>
  </ol>
</section>
<section class="content">
  <div class="col-md-4">
    <b>Laporan Umum</b><hr>
    <form class="form" role="form" action="<?php echo site_url('transaksi/laporan_buat') ?>" method="post">
      <div class="form-group">
        <label for="">Angkatan</label>
        <select id="angkatan" name="angkatan" class="form-control" required="required">
          <option value="">--Pilih Angkatan--</option>
          <option value="2010">2010</option>
          <option value="2011">2011</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
        </select>
      </div>

      <div class="form-group">
        <label for="">Jenis Pembayaran</label>
        <select id="jb" name="jb" class="form-control" required="required">
          <option value="">--Pilih Jenis Bayar--</option>
          <?php foreach ($jenis_bayar as $key): ?>
            <option value="<?php echo $key->nama_jns_bayar ?>"><?php echo $key->nama_jns_bayar ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="">Jurusan</label>
        <select id="jurusan" name="jurusan" class="form-control" required="required">
          <option value="">--Pilih Jurusan--</option>
          <option value="55201">Teknik Informatika</option>
          <option value="57201">Sistem Informasi</option>
          <option value="1">Semua Jurusan</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" formtarget="_blank" name="submit" class="btn btn-success pull-right"> Buat Laporan</button>
      </div>
    </form>
  </div>
  <div class="col-md-4">
    <b>Laporan Pembayaran Semester</b><hr>
    <form class="form" role="form" action="<?php echo site_url('') ?>" method="post">
      <div class="form-group">
        <label for="">Jurusan</label>
        <select id="jurusan" name="jurusan" class="form-control" required="required">
          <option value="">--Pilih Jurusan--</option>
          <option value="55201">Teknik Informatika</option>
          <option value="57201">Sistem Informasi</option>
          <option value="1">Semua Jurusan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Tahun Ajaran</label>
        <select id="thn" name="thn" class="form-control" required="required">
          <option value="">--Pilih Tahun--</option>
          <?php
            for ($i=2015; $i <= 2020; $i++) {
              for ($a=1; $a <=2 ; $a++) {
              ?>
                <option value="<?php echo $i."/".$a ?>"><?php echo $i."/".$a ?></option>
              <?php
              }
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" formtarget="_blank" name="submit" class="btn btn-success pull-right"> Buat Laporan</button>
      </div>
    </form>
  </div>
  <div class="col-md-4">
    <b>Laporan Pembayaran Pembangunan</b><hr>
  </div>
</section>
