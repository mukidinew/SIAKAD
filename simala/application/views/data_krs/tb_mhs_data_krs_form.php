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
      <h3>Masukan Data KRS</h3><hr>
      <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
          <label for="int">Id Krs <?php echo form_error('id_krs') ?></label>
          <select type="text" class="form-control" name="id_krs" id="id_krs"></select>
        </div>
        <div class="form-group">
          <label for="int">Id Kelas <?php echo form_error('id_kelas') ?></label>
          <select type="text" class="form-control" name="id_kelas" id="id_kelas"></select>
        </div>
        <input type="hidden" name="id_data_krs" value="<?php echo $id_data_krs; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('data_krs') ?>" class="btn btn-default">Cancel</a>
       </form>
    </div>
    <div class="col-md-4">
      <h3>Panduan Pengisian</h3><hr>
    </div>
  </div>
</div>
