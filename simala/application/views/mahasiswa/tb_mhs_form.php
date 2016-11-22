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
      <div class="col-md-8">
        <h3>Masukan Data Mahasiswa</h3><hr>
        <form action="<?php echo $action; ?>" method="post">
          <div class="form-group">
            <label for="enum">NIM <?php echo form_error('nim') ?></label>
            <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $nim; ?>" placeholder="NIM" value="<?php echo $nim; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Nama Mahasiswa <?php echo form_error('nm_mhs') ?></label>
            <input type="text" class="form-control" name="nm_mhs" id="nm_mhs" placeholder="Nm Mhs" value="<?php echo $nm_mhs; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tpt_lhr') ?></label>
            <input type="text" class="form-control" name="tpt_lhr" id="tpt_lhr" placeholder="Tpt Lhr" value="<?php echo $tpt_lhr; ?>" />
          </div>
          <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="text" class="form-control datepicker" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
          </div>
          <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenkel') ?></label>
            <input type="text" class="form-control" name="jenkel" id="jenkel" placeholder="L/P" value="<?php echo $jenkel; ?>" />
          </div>
          <div class="form-group">
            <label for="int">Agama <?php echo form_error('agama') ?></label>
            <select class="form-control" name="agama" id="agama" value="<?php echo $agama; ?>">
              <?php foreach ($agama as $key => $value): ?>
                  <option value="<?php echo $value->id_agama; ?>"><?php echo $value->agama; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Wilayah <?php echo form_error('wilayah') ?></label>
            <input type="text" class="form-control" name="wilayah" id="wilayah" placeholder="Wilayah" value="<?php echo $wilayah; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Nm Ibu <?php echo form_error('nm_ibu') ?></label>
            <input type="text" class="form-control" name="nm_ibu" id="nm_ibu" placeholder="Nm Ibu" value="<?php echo $nm_ibu; ?>" />
          </div>
          <div class="form-group">
            <label for="int">Prodi <?php echo form_error('kd_prodi') ?></label>
            <select type="text" class="form-control" name="kd_prodi" id="kd_prodi" placeholder="Kd Prodi" value="<?php echo $kd_prodi; ?>">
              <?php foreach ($prodi as $key => $value): ?>
                  <option value="<?php echo $value->id_prodi; ?>"><?php echo $value->nm_prodi; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="date">Tgl Masuk <?php echo form_error('tgl_masuk') ?></label>
            <input type="text" class="form-control datepicker" name="tgl_masuk" id="tgl_masuk" placeholder="Tgl Masuk" value="<?php echo $tgl_masuk; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Semester Masuk <?php echo form_error('smt_masuk') ?></label>
            <input type="text" class="form-control" name="smt_masuk" id="smt_masuk" placeholder="Smt Masuk" value="<?php echo $smt_masuk; ?>" />
          </div>
          <div class="form-group">
            <label for="int">Status Mahasiswa <?php echo form_error('status_mhs') ?></label>
            <select type="text" class="form-control" name="status_mhs" id="status_mhs" value="<?php echo $status_mhs; ?>">
              <?php foreach ($status_mahasiswa as $key => $value): ?>
                <option value="<?php echo $value->id_status; ?>"><?php echo $value->nm_status; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="enum">Status Awal <?php echo form_error('status_awal') ?></label>
            <input type="text" class="form-control" name="status_awal" id="status_awal" placeholder="Status Awal" value="<?php echo $status_awal; ?>" />
          </div>
          <div class="form-group">
            <label for="email">Email <?php echo form_error('email') ?></label>
            <textarea class="form-control" rows="3" name="email" id="email" placeholder="Email"><?php echo $email; ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
          <a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-default">Cancel</a>
        </form>
      </div>
      <div class="col-md-4">
        <h3>Panduan Pengisian</h3><hr>
      </div>
    </div>
  </div>
</div>
