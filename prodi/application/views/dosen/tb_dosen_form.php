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
            <label for="int">NIDN <?php echo form_error('nidn') ?></label>
            <input type="text" class="form-control" id="nidn" name="nidn" placeholder="nidn" value="<?php echo $nidn; ?>" />
        </div>
        <div class="form-group">
            <label for="nm_dosen">Nm Dosen <?php echo form_error('nm_dosen') ?></label>
            <input type="text" class="form-control" id="nm_dosen" name="nm_dosen" placeholder="Nama Dosen" value="<?php echo $nm_dosen; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Program Studi <?php echo form_error('program_studi') ?></label>
            <select type="text" class="form-control" name="program_studi" id="program_studi"></select>
        </div>
      <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
      <a href="<?php echo site_url('dosen') ?>" class="btn btn-default">Cancel</a>
     </form>
    </div>
  </div>
</div>
