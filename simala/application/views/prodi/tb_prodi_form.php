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
          <label for="nm_ketua">Kode Prodi <?php echo form_error('id_prodi') ?></label>
          <input type="text" class="form-control" id="id_prodi" name="id_prodi" placeholder="Kode Prodi" value="<?php echo $id_prodi; ?>" />
        </div>
        <div class="form-group">
          <label for="nm_prodi">Nm Prodi <?php echo form_error('nm_prodi') ?></label>
          <textarea class="form-control" rows="3" name="nm_prodi" id="nm_prodi" placeholder="Nm Prodi"><?php echo $nm_prodi; ?></textarea>
        </div>
        <div class="form-group">
          <label for="nm_ketua">Nm Ketua <?php echo form_error('nm_ketua') ?></label>
          <textarea class="form-control" rows="3" name="nm_ketua" id="nm_ketua" placeholder="Nm Ketua"><?php echo $nm_ketua; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('prodi') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
