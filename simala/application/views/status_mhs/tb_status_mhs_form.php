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
          <label for="char">Nm Status <?php echo form_error('nm_status') ?></label>
          <input type="text" class="form-control" name="nm_status" id="nm_status" placeholder="Nm Status" value="<?php echo $nm_status; ?>" />
        </div>
        <div class="form-group">
          <label for="ket">Ket <?php echo form_error('ket') ?></label>
          <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea>
        </div>
        <input type="hidden" name="id_status" value="<?php echo $id_status; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('status_mhs') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
