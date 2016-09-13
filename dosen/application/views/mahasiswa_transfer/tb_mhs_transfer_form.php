<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
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
          <label for="varchar">Id Mhs <?php echo form_error('id_mhs') ?></label>
          <input type="text" class="form-control" name="id_mhs" id="id_mhs" placeholder="Id Mhs" value="<?php echo $id_mhs; ?>" />
        </div>
        <div class="form-group">
          <label for="int">Sks Diakui <?php echo form_error('sks_diakui') ?></label>
          <input type="text" class="form-control" name="sks_diakui" id="sks_diakui" placeholder="Sks Diakui" value="<?php echo $sks_diakui; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Pt Asal <?php echo form_error('pt_asal') ?></label>
          <input type="text" class="form-control" name="pt_asal" id="pt_asal" placeholder="Pt Asal" value="<?php echo $pt_asal; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Prodi Asal <?php echo form_error('prodi_asal') ?></label>
          <input type="text" class="form-control" name="prodi_asal" id="prodi_asal" placeholder="Prodi Asal" value="<?php echo $prodi_asal; ?>" />
        </div>
        <input type="hidden" name="id_trans" value="<?php echo $id_trans; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('mahasiswa_transfer') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
