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
          <label for="int">Kode Mata Kuliah <?php echo form_error('kode_mk') ?></label>
          <input type="text" class="form-control" id="kode_mk" name="kode_mk" placeholder="Kode Mata Kuliah" value="<?php echo $kode_mk; ?>" />
        </div>
        <div class="form-group">
          <label for="nm_mk">Nm Mk <?php echo form_error('nm_mk') ?></label>
          <textarea class="form-control" rows="3" name="nm_mk" id="nm_mk" placeholder="Nm Mk"><?php echo $nm_mk; ?></textarea>
        </div>
        <div class="form-group">
          <label for="int">Sks <?php echo form_error('sks') ?></label>
          <input type="text" class="form-control" name="sks" id="sks" placeholder="Sks" value="<?php echo $sks; ?>" />
        </div>
        <div class="form-group">
          <label for="int">Semester <?php echo form_error('semester') ?></label>
          <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" value="<?php echo $semester; ?>" />
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('mata_kuliah') ?>" class="btn btn-default">Cancel</a>
       </form>
    </div>
  </div>
</div>
