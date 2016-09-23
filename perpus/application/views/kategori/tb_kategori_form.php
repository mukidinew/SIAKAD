<div class="col-md-12">
  <form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">Nm Kategori <?php echo form_error('nm_kategori') ?></label>
        <input type="text" class="form-control" name="nm_kategori" id="nm_kategori" placeholder="Nm Kategori" value="<?php echo $nm_kategori; ?>" />
    </div>
    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('kategori') ?>" class="btn btn-default">Cancel</a>
  </form>
</div>
