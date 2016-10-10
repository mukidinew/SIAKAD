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
            <label for="varchar">Id Dosen <?php echo form_error('id_dosen') ?></label>
            <?php if ($picu=="create"): ?>
              <select class="form-control" name="id_dosen" id="id_dosen" value="<?php echo $id_dosen; ?>">
              <?php foreach ($dos_pem as $key): ?>
                <option value="<?php echo $key->nidn ?>"><?php echo $key->nm_dosen ?></option>
              <?php endforeach; ?>
              </select>
            <?php else: ?>
              <input type="text" class="form-control" name="id_dosen" id="id_dosen" placeholder="Id Dosen" value="<?php echo $id_dosen; ?>" />
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
        <input type="hidden" name="id_pembimbing" value="<?php echo $id_pembimbing; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('dosen_pembimbing') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
