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
          <label for="varchar">NIM <?php echo form_error('id_mhs') ?></label>
          <input type="text" class="form-control" name="id_mhs" id="id_mhs" placeholder="Id Mhs" value="<?php echo $id_mhs; ?>" />
        </div>
        <div class="form-group">
          <label for="judul">Judul <?php echo form_error('judul') ?></label>
          <textarea class="form-control" rows="3" name="judul" id="judul" placeholder="Judul"><?php echo $judul; ?></textarea>
        </div>
        <div class="form-group">
          <label for="int">Id Pembimbing 1 <?php echo form_error('id_pembimbing_1') ?></label>
          <?php if ($picu=="create"): ?>
            <select class="form-control" name="id_pembimbing_1" id="id_pembimbing_1">
              <option value="">------ Select One ------</option>
              <?php foreach ($dos_pem1 as $key): ?>
              <option value="<?php echo $key->id_pembimbing ?>"><?php echo $key->nm_dosen ?></option>
              <?php endforeach; ?>
            </select>
          <?php else: ?>
            <input type="text" class="form-control" name="id_pembimbing_1" id="id_pembimbing_1" placeholder="Id Pembimbing 1" value="<?php echo $id_pembimbing_1; ?>" />
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="int">Pembimbing 2 <?php echo form_error('id_pembimbing_2') ?></label>
          <?php if ($picu=='create'): ?>
            <select class="form-control" name="id_pembimbing_2" id="id_pembimbing_2">
              <option value="">------ Select One ------</option>
              <?php foreach ($dos_pem2 as $key): ?>
              <option value="<?php echo $key->id_pembimbing ?>"><?php echo $key->nm_dosen ?></option>
              <?php endforeach; ?>
            </select>
          <?php else: ?>
            <input type="text" class="form-control" name="id_pembimbing_2" id="id_pembimbing_2" placeholder="Id Pembimbing 2" value="<?php echo $id_pembimbing_2; ?>" />
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="datetime">Tgl Daftar <?php echo form_error('tgl_daftar') ?></label>
          <input type="text" class="form-control datepicker" name="tgl_daftar" id="tgl_daftar" placeholder="Tgl Daftar" value="<?php echo $tgl_daftar; ?>" />
        </div>
        <div class="form-group">
          <label for="datetime">Tgl Kadaluarsa <?php echo form_error('tgl_kadaluarsa') ?></label>
          <input type="text" class="form-control datepicker" name="tgl_kadaluarsa" id="tgl_kadaluarsa" placeholder="Tgl Kadaluarsa" value="<?php echo $tgl_kadaluarsa; ?>" />
        </div>
        <input type="hidden" name="id_mhs_proposal" value="<?php echo $id_mhs_proposal; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('proposal') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
