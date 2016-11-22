<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <b>Tambah Data Dosen Wali</b><hr>
      <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
              <label for="varchar">NIDN <?php echo form_error('id_dosen') ?></label>
              <input type="text" class="form-control" name="id_dosen" id="id_dosen" placeholder="Id Dosen" value="<?php echo $id_dosen; ?>" />
          </div>
        <div class="form-group">
              <label for="date">Tanggal Diangkat <?php echo form_error('tanggal_diangkat') ?></label>
              <input type="text" class="form-control datepicker" name="tanggal_diangkat" id="tanggal_diangkat" placeholder="Tanggal Diangkat" value="<?php echo $tanggal_diangkat; ?>" />
          </div>
        <input type="hidden" name="id_dosen_wali" value="<?php echo $id_dosen_wali; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('dosen_wali') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
    <div class="col-md-2">
      <b>Petunjuk Tambah Data Dosen Wali</b><hr>
    </div>
  </div>
</div>
