<?php
  $picu = $this->uri->segment(2);
  echo $picu;
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
                <label for="int">Id Proposal <?php echo form_error('id_proposal') ?></label>
                <?php if ($picu=='create'): ?>
                  <select class="form-control select2" name="id_proposal" id="id_proposal"></select>
                <?php else: ?>
                  <input type="text" class="form-control" name="id_proposal" id="" placeholder="Id Proposal" value="<?php echo $id_proposal; ?>" />
                <?php endif; ?>
            </div>
          <div class="form-group">
                <label for="varchar">Kode Bayar <?php echo form_error('kode_bayar') ?></label>
                <input type="text" class="form-control" name="kode_bayar" id="kode_bayar" placeholder="Kode Bayar" value="<?php echo $kode_bayar; ?>" />
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
                <label for="datetime">Tgl Daftar <?php echo form_error('tgl_daftar') ?></label>
                <input type="text" class="form-control datepicker" name="tgl_daftar" id="tgl_daftar" placeholder="Tgl Daftar" value="<?php echo $tgl_daftar; ?>" />
            </div>
          <input type="hidden" name="id_proposal_maju" value="<?php echo $id_proposal_maju; ?>" />
          <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
          <a href="<?php echo site_url('proposal_maju') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
