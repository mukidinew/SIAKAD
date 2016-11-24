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
          <label for="varchar">Nm Ruangan <?php echo form_error('nm_ruangan') ?></label>
          <input type="text" class="form-control" name="nm_ruangan" id="nm_ruangan" placeholder="Nm Ruangan" value="<?php echo $nm_ruangan; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Ket <?php echo form_error('ket') ?></label>
          <input type="text" class="form-control" name="ket" id="ket" placeholder="Ket" value="<?php echo $ket; ?>" />
        </div>
        <input type="hidden" name="id_ruangan" value="<?php echo $id_ruangan; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('ruangan') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
