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
        <h2 style="margin-top:0px">Tb_nilai_transfer <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Mhs <?php echo form_error('id_mhs') ?></label>
            <input type="text" class="form-control" name="id_mhs" id="id_mhs" placeholder="Id Mhs" value="<?php echo $id_mhs; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kd Mk Asal <?php echo form_error('kd_mk_asal') ?></label>
            <input type="text" class="form-control" name="kd_mk_asal" id="kd_mk_asal" placeholder="Kd Mk Asal" value="<?php echo $kd_mk_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Mk <?php echo form_error('nm_mk') ?></label>
            <input type="text" class="form-control" name="nm_mk" id="nm_mk" placeholder="Nm Mk" value="<?php echo $nm_mk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jml Sks Asal <?php echo form_error('jml_sks_asal') ?></label>
            <input type="text" class="form-control" name="jml_sks_asal" id="jml_sks_asal" placeholder="Jml Sks Asal" value="<?php echo $jml_sks_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Nilai Huruf <?php echo form_error('nilai_huruf') ?></label>
            <input type="text" class="form-control" name="nilai_huruf" id="nilai_huruf" placeholder="Nilai Huruf" value="<?php echo $nilai_huruf; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Mk <?php echo form_error('id_mk') ?></label>
            <input type="text" class="form-control" name="id_mk" id="id_mk" placeholder="Id Mk" value="<?php echo $id_mk; ?>" />
        </div>
	    <input type="hidden" name="id_nilai_trans" value="<?php echo $id_nilai_trans; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nilai_transfer') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>