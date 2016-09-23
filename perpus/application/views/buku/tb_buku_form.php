<div class="row">
  <div class="col-md-10">
    <form action="<?php echo $action; ?>" method="post">
        <?php
        $mode = $this->uri->segment(2);
        if ($mode=='create') {
          ?>
          <div class="form-group">
            <label for="int">Nama Rak <?php echo form_error('id_rak') ?></label>
            <select class="form-control" name="id_rak" id="id_rak">
              <option value="">--- Select One ---</option>
              <?php foreach ($rak as $key): ?>
                <option value="<?php echo $key->id_rak ?>"><?php echo $key->nm_rak ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="int">Nama Penerbit <?php echo form_error('id_penerbit') ?></label>
            <select class="form-control" name="id_penerbit" id="id_penerbit" >
              <option value="">--- Select One ---</option>
              <?php foreach ($penerbit as $key): ?>
                <option value="<?php echo $key->id_penerbit ?>"><?php echo $key->nm_penerbit ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <?php
        }
        else if ($mode=='update') {
          ?>
          <div class="form-group">
            <label for="int">Nama Rak <?php echo form_error('id_rak') ?></label>
            <select class="form-control" name="id_rak" id="id_rak">
              <?php foreach ($rak as $key): ?>
                <?php if ($rak_row->id_rak == $key->id_rak): ?>
                  <option value="<?php echo $id_rak; ?>"><?php echo $rak_row->nm_rak ?> </option>
                <?php else: ?>
                  <option value="<?php echo $key->id_rak ?>"><?php echo $key->nm_rak ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="int">Nama Penerbit <?php echo form_error('id_penerbit') ?></label>
            <select class="form-control" name="id_penerbit" id="id_penerbit">
              <?php foreach ($penerbit as $key): ?>
                <?php if ($penerbit_row->id_penerbit == $key->id_penerbit): ?>
                  <option value="<?php echo $id_penerbit; ?>"><?php echo $penerbit_row->nm_penerbit ?></option>
                <?php else: ?>
                  <option value="<?php echo $key->id_penerbit ?>"><?php echo $key->nm_penerbit ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <?php
        }
       ?>
      <div class="form-group">
        <label for="varchar">Nama Buku <?php echo form_error('nm_buku') ?></label>
        <input type="text" class="form-control" name="nm_buku" id="nm_buku" placeholder="Nm Buku" value="<?php echo $nm_buku; ?>" />
      </div>
      <div class="form-group">
        <label for="date">Tahun Terbit <?php echo form_error('thn_terbit') ?></label>
        <input type="text" class="form-control" name="thn_terbit" id="thn_terbit" placeholder="Thn Terbit" value="<?php echo $thn_terbit; ?>" />
      </div>
      <div class="form-group">
        <label for="varchar">Nama Penulis <?php echo form_error('nm_penulis') ?></label>
        <input type="text" class="form-control" name="nm_penulis" id="nm_penulis" placeholder="Nm Penulis" value="<?php echo $nm_penulis; ?>" />
      </div>
      <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>" />
      <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
      <a href="<?php echo site_url('buku') ?>" class="btn btn-default">Cancel</a>
    </form>
  </div>
  <div class="col-md-2">
    <h3>Panduan</h3>
    <p>
      Tes
    </p>
  </div>
</div>
