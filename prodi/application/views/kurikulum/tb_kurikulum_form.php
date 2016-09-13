<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h3>Masukan Kurikulum</h3><hr>
      <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
          <label for="varchar">Nama Kurikulum <?php echo form_error('nm_kurikulum') ?></label>
          <input type="text" class="form-control" name="nm_kurikulum" id="nm_kurikulum" placeholder="Nm Kurikulum" value="<?php echo $nm_kurikulum; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Periode <?php echo form_error('ta') ?></label>
          <input type="text" class="form-control" name="ta" id="ta" placeholder="Ta" value="<?php echo $ta; ?>" />
        </div>
        <div class="form-group">
          <label for="int">Program Studi <?php echo form_error('kd_prodi') ?></label>
          <select type="text" class="form-control select2" name="kd_prodi" id="kd_prodi"></select>
        </div>
        <div class="form-group">
          <label for="enum">Status <?php echo form_error('status') ?></label>
          <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
        <input type="hidden" name="id_kurikulum" value="<?php echo $id_kurikulum; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('kurikulum') ?>" class="btn btn-default">Cancel</a>
       </form>
    </div>
    <div class="col-md-6">
      <h3>Panduan Pengisian</h3><hr>
    </div>
  </div>
</div>
