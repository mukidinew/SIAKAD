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
        <h2 style="margin-top:0px">Tb_cd_krs <?php echo $button ?></h2>
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
	    <input type="hidden" name="id_cd_krs" value="<?php echo $id_cd_krs; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('countdown_krs') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>