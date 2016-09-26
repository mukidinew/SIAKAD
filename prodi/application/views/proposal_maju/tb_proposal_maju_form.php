<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_proposal_maju <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Proposal <?php echo form_error('id_proposal') ?></label>
            <input type="text" class="form-control" name="id_proposal" id="id_proposal" placeholder="Id Proposal" value="<?php echo $id_proposal; ?>" />
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
            <input type="text" class="form-control" name="tgl_daftar" id="tgl_daftar" placeholder="Tgl Daftar" value="<?php echo $tgl_daftar; ?>" />
        </div>
	    <input type="hidden" name="id_proposal_maju" value="<?php echo $id_proposal_maju; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('proposal_maju') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>