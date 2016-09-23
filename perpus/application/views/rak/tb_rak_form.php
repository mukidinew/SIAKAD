<div class="col-md-12">
  <form action="<?php echo $action; ?>" method="post">
    <?php
    $mode = $this->uri->segment(2);
    if ($mode=='create') {
      ?>
      <div class="form-group">
        <label for="int">Nama Kategori <?php echo form_error('id_kategori') ?></label>
        <select class="form-control" name="id_kategori" id="id_kategori" >
          <option value="">--- Select One ---</option>
          <?php foreach ($kategori as $key): ?>
            <option value="<?php echo $key->nm_kategori ?>"><?php echo $key->nm_kategori ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <?php
    } else {
      ?>
      <div class="form-group">
        <label for="int">Nama Kategori <?php echo form_error('id_kategori') ?></label>
        <select class="form-control" name="id_kategori" id="id_kategori" >
          <?php foreach ($kategori as $key): ?>
            <?php if ($kategori_row->id_kategori == $key->id_kategori): ?>
                <option value="<?php echo $id_kategori; ?>"><?php echo $kategori_row->nm_kategori ?> </option>
            <?php else: ?>
                <option value="<?php echo $key->nm_kategori ?>"><?php echo $key->nm_kategori ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <?php
    }

    ?>
    <div class="form-group">
        <label for="varchar">Nm Rak <?php echo form_error('nm_rak') ?></label>
        <input type="text" class="form-control" name="nm_rak" id="nm_rak" placeholder="Nm Rak" value="<?php echo $nm_rak; ?>" />
    </div>
    <input type="hidden" name="id_rak" value="<?php echo $id_rak; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('rak') ?>" class="btn btn-default">Cancel</a>
  </form>
</div>
