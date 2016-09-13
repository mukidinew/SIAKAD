<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <b>Buat Waktu Pengisian KHS Berdasarkan Kurikulum</b><hr>
      <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
              <label for="datetime">Waktu Buka <?php echo form_error('waktu_buka') ?></label>
              <input type="text" class="form-control" name="waktu_buka" id="waktu_buka" placeholder="Waktu Buka" value="<?php echo $waktu_buka; ?>" />
          </div>
        <div class="form-group">
              <label for="datetime">Waktu Tutup <?php echo form_error('waktu_tutup') ?></label>
              <input type="text" class="form-control" name="waktu_tutup" id="waktu_tutup" placeholder="Waktu Tutup" value="<?php echo $waktu_tutup; ?>" />
          </div>
        <div class="form-group">
              <label for="int">Id Kurikulum <?php echo form_error('id_kurikulum') ?></label>
              <input type="text" class="form-control" name="id_kurikulum" id="id_kurikulum" placeholder="Id Kurikulum" value="<?php echo $id_kurikulum; ?>" />
          </div>
        <input type="hidden" name="id_cd_khs" value="<?php echo $id_cd_khs; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('countdown_khs') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
    <div class="col-md-4">
      <b>Panduan Pengisian</b><hr>
    </div>
  </div>
</div>
