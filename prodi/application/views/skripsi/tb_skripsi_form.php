<?php
  $picu = $this->uri->segment(2);
?>
<div class="container-fluid">
  <div class="page-header">
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
            <label for="enum">Valid Prodi <?php echo form_error('valid_prodi') ?></label>
            <select class="form-control" name="valid_prodi" id="valid_prodi">
              <option value="N">N</option>
              <option value="Y">Y</option>
            </select>
            <!-- <input type="text" class="form-control" name="valid_prodi" id="valid_prodi" placeholder="Valid Prodi" value="<?php echo $valid_prodi; ?>" /> -->
        </div>
        <div class="form-group">
            <label for="datetime">Tgl Maju <?php echo form_error('tgl_maju') ?></label>
            <input type="text" class="form-control datepicker" name="tgl_maju" id="tgl_maju" placeholder="Tgl Maju" value="" />
        </div>
        <input type="hidden" name="id_skripsi" value="<?php echo $id_skripsi; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('skripsi') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
