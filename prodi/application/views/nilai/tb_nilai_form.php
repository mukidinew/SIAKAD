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
          <label for="int">Id Krs <?php echo form_error('id_krs') ?></label>
          <select type="text" class="form-control" name="id_krs" id="id_krs"> </select>
        </div>
        <div class="form-group">
          <label for="int">Nilai Angka <?php echo form_error('nilai_angka') ?></label>
          <input type="text" class="form-control select2" name="nilai_angka" id="nilai_angka" placeholder="Nilai Angka" value="<?php echo $nilai_angka; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Nilai Index <?php echo form_error('nilai_index') ?></label>
          <select type="text" class="form-control" name="nilai_index" id="nilai_index">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
          </select>
        </div>
        <div class="form-group">
          <label for="varchar">Nilai Huruf <?php echo form_error('nilai_huruf') ?></label>
          <input type="text" class="form-control" name="nilai_huruf" id="nilai_huruf" placeholder="Nilai Huruf" value="<?php echo $nilai_huruf; ?>" />
        </div>
        <input type="hidden" name="id_nilai" value="<?php echo $id_nilai; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('nilai') ?>" class="btn btn-default">Cancel</a>
       </form>
    </div>
  </div>
</div>
