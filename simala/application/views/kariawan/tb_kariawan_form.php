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
        <div class="form-group">
          <label for="varchar">Nama <?php echo form_error('nama') ?></label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Jen Kel <?php echo form_error('jen_kel') ?></label>
          <input type="text" class="form-control" name="jen_kel" id="jen_kel" placeholder="Jen Kel" value="<?php echo $jen_kel; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Tmp Lahir <?php echo form_error('tmp_lahir') ?></label>
            <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" placeholder="Tmp Lahir" value="<?php echo $tmp_lahir; ?>" />
        </div>
        <div class="form-group">
            <label for="date">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
        </div>
        <div class="form-group">
          <label for="int">Agama <?php echo form_error('agama') ?></label>
          <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
          <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
        <div class="form-group">
          <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
          <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
        <div class="form-group">
          <label for="no_hp">No Hp <?php echo form_error('no_hp') ?></label>
          <textarea class="form-control" rows="3" name="no_hp" id="no_hp" placeholder="No Hp"><?php echo $no_hp; ?></textarea>
        </div>
        <div class="form-group">
          <label for="email">Email <?php echo form_error('email') ?></label>
          <textarea class="form-control" rows="3" name="email" id="email" placeholder="Email"><?php echo $email; ?></textarea>
        </div>
        <div class="form-group">
          <label for="varchar">S1 Nm Sklh <?php echo form_error('s1_nm_sklh') ?></label>
          <input type="text" class="form-control" name="s1_nm_sklh" id="s1_nm_sklh" placeholder="S1 Nm Sklh" value="<?php echo $s1_nm_sklh; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">S1 Jur <?php echo form_error('s1_jur') ?></label>
          <input type="text" class="form-control" name="s1_jur" id="s1_jur" placeholder="S1 Jur" value="<?php echo $s1_jur; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">S1 Thn Lulus <?php echo form_error('s1_thn_lulus') ?></label>
          <input type="text" class="form-control" name="s1_thn_lulus" id="s1_thn_lulus" placeholder="S1 Thn Lulus" value="<?php echo $s1_thn_lulus; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">S1 Kota <?php echo form_error('s1_kota') ?></label>
          <input type="text" class="form-control" name="s1_kota" id="s1_kota" placeholder="S1 Kota" value="<?php echo $s1_kota; ?>" />
        </div>
        <div class="form-group">
          <label for="s2_nm_sklh">S2 Nm Sklh <?php echo form_error('s2_nm_sklh') ?></label>
          <textarea class="form-control" rows="3" name="s2_nm_sklh" id="s2_nm_sklh" placeholder="S2 Nm Sklh"><?php echo $s2_nm_sklh; ?></textarea>
        </div>
        <div class="form-group">
          <label for="varchar">S2 Jur <?php echo form_error('s2_jur') ?></label>
          <input type="text" class="form-control" name="s2_jur" id="s2_jur" placeholder="S2 Jur" value="<?php echo $s2_jur; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">S2 Thn Lulus <?php echo form_error('s2_thn_lulus') ?></label>
          <input type="text" class="form-control" name="s2_thn_lulus" id="s2_thn_lulus" placeholder="S2 Thn Lulus" value="<?php echo $s2_thn_lulus; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">S2 Kota <?php echo form_error('s2_kota') ?></label>
          <input type="text" class="form-control" name="s2_kota" id="s2_kota" placeholder="S2 Kota" value="<?php echo $s2_kota; ?>" />
        </div>
        <div class="form-group">
          <label for="s3_nm_sklh">S3 Nm Sklh <?php echo form_error('s3_nm_sklh') ?></label>
          <textarea class="form-control" rows="3" name="s3_nm_sklh" id="s3_nm_sklh" placeholder="S3 Nm Sklh"><?php echo $s3_nm_sklh; ?></textarea>
        </div>
        <div class="form-group">
          <label for="varchar">S3 Jur <?php echo form_error('s3_jur') ?></label>
          <input type="text" class="form-control" name="s3_jur" id="s3_jur" placeholder="S3 Jur" value="<?php echo $s3_jur; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">S3 Thn Lulus <?php echo form_error('s3_thn_lulus') ?></label>
          <input type="text" class="form-control" name="s3_thn_lulus" id="s3_thn_lulus" placeholder="S3 Thn Lulus" value="<?php echo $s3_thn_lulus; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">S3 Kota <?php echo form_error('s3_kota') ?></label>
          <input type="text" class="form-control" name="s3_kota" id="s3_kota" placeholder="S3 Kota" value="<?php echo $s3_kota; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">S3 Kota <?php echo form_error('nik') ?></label>
          <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $nik; ?>" />
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('kariawan') ?>" class="btn btn-default">Cancel</a>
       </form>
    </div>
  </div>
</div>
