class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h3>Tambah Data Kelas Kuliah</h3><hr>
      <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
          <label for="varchar">Nama Kelas <?php echo form_error('nm_kelas') ?></label>
          <input type="text" class="form-control" name="nm_kelas" id="nm_kelas" placeholder="Nm Kelas" value="<?php echo $nm_kelas; ?>" />
        </div>
        <div class="col-md-10">
          <div class="form-group">
            <label for="int">Nama Kurikulum <?php echo form_error('id_kurikulum') ?></label>
            <select type="text" class="form-control select2" name="id_kurikulum" id="id_kurikulum"></select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for=""></label>
            <button type="button" id="btnCariMatkul" class="btn btn-warning btn-block">Set Mata Kuliah</button>
          </div>
        </div>
        <div class="form-group">
          <label for="varchar">Mata Kuliah <?php echo form_error('id_matkul') ?></label>
          <select type="text" class="form-control select2" name="id_matkul" id="id_matkul" placeholder="Masukan Kata Kunci" readOnly></select>
        </div>

        <div class="form-group">
          <label for="int">Program Studi <?php echo form_error('id_prodi') ?></label>
          <select type="text" class="form-control select2" name="id_prodi" id="id_prodi" readOnly></select>
        </div>
        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('kelas_kuliah') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
    <div class="col-md-6">
      <h3>Panduan Pengisian</h3><hr>
    </div>
  </div>
</div>
