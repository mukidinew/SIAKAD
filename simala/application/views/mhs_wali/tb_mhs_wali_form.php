<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
          <label for="int">Id Dosen Wali <?php echo form_error('id_dosen_wali') ?></label>
          <input type="text" class="form-control" name="id_dosen_wali" id="id_dosen_wali" placeholder="Id Dosen Wali" value="<?php echo $id_dosen_wali; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Id Mhs <?php echo form_error('id_mhs') ?></label>
          <input type="text" class="form-control" name="id_mhs" id="id_mhs" placeholder="Id Mhs" value="<?php echo $id_mhs; ?>" />
        </div>
        <input type="hidden" name="id_mhs_wali" value="<?php echo $id_mhs_wali; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('mhs_wali') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
    <div class="col-md-4">
      <b>Petunjuk Tambah Data Dosen Wali Mahasiswa</b><hr>
    </div>
  </div>
</div>
