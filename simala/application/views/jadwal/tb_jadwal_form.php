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
          <label for="int">Id Kurikulum <?php echo form_error('id_kurikulum') ?></label>
          <div class="input-group">
          <select type="text" class="form-control" name="id_kurikulum" id="id_kurikulum"></select>
            <span class="input-group-btn">
                <a class="btn btn-warning btn-sm" id="btnCariJadwal">
                    Set Kurikulum
                </a>
            </span>
          </div>
        </div>
        <div class="form-group">
            <label for="int">Id Kelas Dosen <?php echo form_error('id_kelas_dosen') ?></label>
            <select class="form-control" name="id_kelas_dosen" id="id_kelas_dosen" readOnly></select>
            <!-- <input type="text" class="form-control" name="id_kelas_dosen" id="id_kelas_dosen" placeholder="Id Kelas Dosen" value="<?php echo $id_kelas_dosen; ?>" /> -->
        </div>
        <div class="form-group">
            <label for="int">Id Ruang <?php echo form_error('id_ruang') ?></label>
            <select class="form-control" name="id_ruang" id="id_ruang" readOnly></select>
            <!-- <input type="text" class="form-control" name="id_ruang" id="id_ruang" placeholder="Id Ruang" value="<?php echo $id_ruang; ?>" /> -->
        </div>
        <div class="form-group">
            <label for="varchar">Nm Jam <?php echo form_error('nm_jam') ?></label>
            <input type="text" class="form-control" name="nm_jam" id="nm_jam" placeholder="Nm Jam" value="<?php echo $nm_jam; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Nm Hari <?php echo form_error('nm_hari') ?></label>
            <select class="form-control" name="nm_hari" id="nm_hari">
              <option value="Belum Diisi">------Pilih------</option>
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
            </select>
            <!-- <input type="text" class="form-control" name="nm_hari" id="nm_hari" placeholder="Nm Hari" value="<?php echo $nm_hari; ?>" /> -->
        </div>
        <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('jadwal') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
