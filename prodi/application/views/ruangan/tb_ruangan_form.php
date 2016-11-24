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
        <h2 style="margin-top:0px">Tb_ruangan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nm Ruangan <?php echo form_error('nm_ruangan') ?></label>
            <input type="text" class="form-control" name="nm_ruangan" id="nm_ruangan" placeholder="Nm Ruangan" value="<?php echo $nm_ruangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Ket <?php echo form_error('ket') ?></label>
            <input type="text" class="form-control" name="ket" id="ket" placeholder="Ket" value="<?php echo $ket; ?>" />
        </div>
	    <input type="hidden" name="id_ruangan" value="<?php echo $id_ruangan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ruangan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>