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
            <label for="int">Id Proposal Maju <?php echo form_error('id_proposal_maju') ?></label>
            <input type="text" class="form-control" name="id_proposal_maju" id="id_proposal_maju" placeholder="Id Proposal Maju" value="<?php echo $id_proposal_maju; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Bebas Pustaka <?php echo form_error('bebas_pustaka') ?></label>
            <input type="text" class="form-control" name="bebas_pustaka" id="bebas_pustaka" placeholder="Bebas Pustaka" value="<?php echo $bebas_pustaka; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Bebas Smt <?php echo form_error('bebas_smt') ?></label>
            <input type="text" class="form-control" name="bebas_smt" id="bebas_smt" placeholder="Bebas Smt" value="<?php echo $bebas_smt; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Bebas Proposal <?php echo form_error('bebas_proposal') ?></label>
            <input type="text" class="form-control" name="bebas_proposal" id="bebas_proposal" placeholder="Bebas Proposal" value="<?php echo $bebas_proposal; ?>" />
        </div>
        <div class="form-group">
            <label for="datetime">Tgl Daftar <?php echo form_error('tgl_daftar') ?></label>
            <input type="text" class="form-control datepicker" name="tgl_daftar" id="tgl_daftar" placeholder="Tgl Daftar" value="<?php echo $tgl_daftar; ?>" />
        </div>
        <input type="hidden" name="id_skripsi" value="<?php echo $id_skripsi; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('skripsi') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
