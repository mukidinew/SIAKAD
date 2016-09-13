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
          <label for="varchar">Kode Mk <?php echo form_error('kode_mk') ?></label>
          <select type="text" class="form-control" name="kode_mk" id="kode_mk"></select>
        </div>
        <div class="form-group">
          <label for="int">Id Kurikulum <?php echo form_error('id_kurikulum') ?></label>
          <select type="text" class="form-control" name="id_kurikulum" id="id_kurikulum"></select>
        </div>
        <input type="hidden" name="id_kur_mk" value="<?php echo $id_kur_mk; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('mata_kuliah_kurikulum') ?>" class="btn btn-default">Cancel</a>
	    </form>
    </div>
  </div>
</div>
