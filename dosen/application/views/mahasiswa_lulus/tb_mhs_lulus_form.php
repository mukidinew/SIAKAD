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
      <form action="<?php echo $action; ?>" method="post">
        <input type="hidden" name="id_mhs" value="<?php echo $id_mhs; ?>" />
        <div class="form-group">
          <label for="int">NIM <?php echo form_error('id_mhs') ?></label>
          <input type="text" class="form-control" name="id_mhs" value="<?php echo $id_mhs; ?>" placeholder="NIM" value="<?php echo $id_mhs; ?>" />
        </div>
        <div class="form-group">
          <label for="int">Jenis Keluar <?php echo form_error('id_jns_keluar') ?></label>
          <select type="text" class="form-control" name="id_jns_keluar" id="id_jns_keluar">
            <?php foreach ($jenis_keluar as $key => $value): ?>
                <option value="<?php echo $value->id_jenis_keluar ?>"><?php echo $value->nm_jenis_keluar ?></option>
            <?php endforeach; ?>
          </select>

        </div>
        <div class="form-group">
          <label for="date">Tgl Keluar <?php echo form_error('tgl_keluar') ?></label>
          <input type="text" class="form-control" name="tgl_keluar" id="tgl_keluar" placeholder="Tgl Keluar" value="<?php echo $tgl_keluar; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Jalur Skripsi <?php echo form_error('jalur_skripsi') ?></label>
          <select type="text" class="form-control" name="jalur_skripsi" id="jalur_skripsi">
            <option value="1">Ya</option>
            <option value="1">Tidak</option>
          </select>
        </div>
        <div class="form-group">
          <label for="judul_skripsi">Judul Skripsi <?php echo form_error('judul_skripsi') ?></label>
          <textarea class="form-control" rows="3" name="judul_skripsi" id="judul_skripsi" placeholder="Judul Skripsi"><?php echo $judul_skripsi; ?></textarea>
        </div>
        <div class="form-group">
          <label for="date">Bln Awal Bim <?php echo form_error('bln_awal_bim') ?></label>
          <input type="text" class="form-control" name="bln_awal_bim" id="bln_awal_bim" placeholder="Bln Awal Bim" value="<?php echo $bln_awal_bim; ?>" />
        </div>
        <div class="form-group">
          <label for="date">Bln Akhir Bim <?php echo form_error('bln_akhir_bim') ?></label>
          <input type="text" class="form-control" name="bln_akhir_bim" id="bln_akhir_bim" placeholder="Bln Akhir Bim" value="<?php echo $bln_akhir_bim; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Sk Yudisium <?php echo form_error('sk_yudisium') ?></label>
          <input type="text" class="form-control" name="sk_yudisium" id="sk_yudisium" placeholder="Sk Yudisium" value="<?php echo $sk_yudisium; ?>" />
        </div>
        <div class="form-group">
          <label for="date">Tgl Yudisium <?php echo form_error('tgl_yudisium') ?></label>
          <input type="text" class="form-control" name="tgl_yudisium" id="tgl_yudisium" placeholder="Tgl Yudisium" value="<?php echo $tgl_yudisium; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">IPK <?php echo form_error('IPK') ?></label>
          <input type="text" class="form-control" name="IPK" id="IPK" placeholder="IPK" value="<?php echo $IPK; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">No Ijazah <?php echo form_error('no_ijazah') ?></label>
          <input type="text" class="form-control" name="no_ijazah" id="no_ijazah" placeholder="No Ijazah" value="<?php echo $no_ijazah; ?>" />
        </div>
        <div class="form-group">
          <label for="ket">Ket <?php echo form_error('ket') ?></label>
          <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('mahasiswa_lulus') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
