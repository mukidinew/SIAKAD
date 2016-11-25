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
            <?php if ($picu=='create'): ?>
              <select class="form-control" name="id_proposal_maju" id="id_proposal_maju_2"></select>
            <?php else: ?>
              <input type="text" class="form-control" name="id_proposal_maju" id="id_proposal_maju" placeholder="Id Proposal Maju" value="<?php echo $id_proposal_maju; ?>" />
            <?php endif; ?>

        </div>
        <div class="form-group">
            <label for="enum">Bebas Pustaka <?php echo form_error('bebas_pustaka') ?></label>
            <?php if ($picu=='create'): ?>
              <select class="form-control" name="bebas_pustaka" id="bebas_pustaka">
                <option value="N">N</option>
                <option value="Y">Y</option>
              </select>
            <?php else: ?>
              <input type="text" class="form-control" name="bebas_pustaka" id="bebas_pustaka" placeholder="Bebas Pustaka" value="<?php echo $bebas_pustaka; ?>" />
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="enum">Bebas Smt <?php echo form_error('bebas_smt') ?></label>
            <?php if ($picu=='create'): ?>
              <select class="form-control" name="bebas_smt" id="bebas_smt">
                <option value="N">N</option>
                <option value="Y">Y</option>
              </select>
            <?php else: ?>
              <input type="text" class="form-control" name="bebas_smt" id="bebas_smt" placeholder="Bebas Smt" value="<?php echo $bebas_smt; ?>" />
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="enum">Bebas Proposal <?php echo form_error('bebas_proposal') ?></label>
            <?php if ($picu=='create'): ?>
              <select class="form-control" name="bebas_proposal" id="bebas_proposal">
                <option value="N">N</option>
                <option value="Y">Y</option>
              </select>
            <?php else: ?>
              <input type="text" class="form-control" name="bebas_proposal" id="bebas_proposal" placeholder="Bebas Proposal" value="<?php echo $bebas_proposal; ?>" />
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="enum">Kliring <?php echo form_error('kliring_nilai') ?></label>
            <?php if ($picu=='create'): ?>
              <select class="form-control" name="kliring_nilai" id="kliring_nilai">
                <option value="N">N</option>
                <option value="Y">Y</option>
              </select>
            <?php else: ?>
              <input type="text" class="form-control" name="kliring_nilai" id="kliring_nilai" placeholder="kliring_nilai" value="<?php echo $kliring_nilai; ?>" />
            <?php endif; ?>
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
