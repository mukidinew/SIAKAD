<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <form action="<?php echo $action; ?>" method="post">
        <div class="col-md-12">
          <b>Tambahkan Kelas Dosen</b><hr>
            <div class="form-group">
              <label for="int">Kelas Kuliah <?php echo form_error('id_kelas_kuliah') ?></label>
              <select type="text" class="form-control" name="id_kelas_kuliah" id="id_kelas_kuliah"></select>
            </div>
            <div class="form-group">
              <label for="int">NIDN <?php echo form_error('id_dosen') ?></label>
              <select type="text" class="form-control" name="id_dosen" id="id_dosen"></select>
            </div>
            <div class="form-group">
              <label for="int">Rencana Tatap Muka <?php echo form_error('r_t_muka') ?></label>
              <input type="text" class="form-control" name="r_t_muka" id="r_t_muka" placeholder="Rencana Tatap Muka" value="<?php echo $r_t_muka; ?>" />
            </div>
            <div class="form-group">
              <label for="int">Tatap Muka Real <?php echo form_error('t_muka') ?></label>
              <input type="text" class="form-control" name="t_muka" id="t_muka" placeholder="Tatap Muka Real" value="0" readOnly/>
            </div>
            <input type="hidden" name="id_kelas_dosen" value="<?php echo $id_kelas_dosen; ?>" />
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-success btn-block"><i class='fa fa-plus'></i> Tambah</button>
          <a href="<?php echo site_url('kelas_dosen') ?>" class="btn btn-danger btn-block">Cancel</a>
        </div>
      </form>
    </div>
    <div class="col-md-4">
      <b>Panduan Pengisian</b><hr>
    </div>
  </div>
</div>
