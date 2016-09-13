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
          <label for="varchar">ID Jenis Keluar <?php echo form_error('id_jenis_keluar') ?></label>
          <input type="text" class="form-control" name="id_jenis_keluar" id="id_jenis_keluar" placeholder="Nm Jenis Keluar" value="<?php echo $id_jenis_keluar; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Nm Jenis Keluar <?php echo form_error('nm_jenis_keluar') ?></label>
          <input type="text" class="form-control" name="nm_jenis_keluar" id="nm_jenis_keluar" placeholder="Nm Jenis Keluar" value="<?php echo $nm_jenis_keluar; ?>" />
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('jenis_keluar') ?>" class="btn btn-default">Cancel</a>
       </form>
    </div>
  </div>
</div>
