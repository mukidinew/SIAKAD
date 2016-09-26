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
        <h2 style="margin-top:0px">Tb_proposal <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Mhs <?php echo form_error('id_mhs') ?></label>
            <input type="text" class="form-control" name="id_mhs" id="id_mhs" placeholder="Id Mhs" value="<?php echo $id_mhs; ?>" />
        </div>
	    <div class="form-group">
            <label for="judul">Judul <?php echo form_error('judul') ?></label>
            <textarea class="form-control" rows="3" name="judul" id="judul" placeholder="Judul"><?php echo $judul; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Id Pembimbing 1 <?php echo form_error('id_pembimbing_1') ?></label>
            <input type="text" class="form-control" name="id_pembimbing_1" id="id_pembimbing_1" placeholder="Id Pembimbing 1" value="<?php echo $id_pembimbing_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Pembimbing 2 <?php echo form_error('id_pembimbing_2') ?></label>
            <input type="text" class="form-control" name="id_pembimbing_2" id="id_pembimbing_2" placeholder="Id Pembimbing 2" value="<?php echo $id_pembimbing_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Daftar <?php echo form_error('tgl_daftar') ?></label>
            <input type="text" class="form-control" name="tgl_daftar" id="tgl_daftar" placeholder="Tgl Daftar" value="<?php echo $tgl_daftar; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Kadaluarsa <?php echo form_error('tgl_kadaluarsa') ?></label>
            <input type="text" class="form-control" name="tgl_kadaluarsa" id="tgl_kadaluarsa" placeholder="Tgl Kadaluarsa" value="<?php echo $tgl_kadaluarsa; ?>" />
        </div>
	    <input type="hidden" name="id_mhs_proposal" value="<?php echo $id_mhs_proposal; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('proposal') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>