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
        <h2 style="margin-top:0px">Tb_pinjam <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Buku <?php echo form_error('id_buku') ?></label>
            <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder="Id Buku" value="<?php echo $id_buku; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Pjm <?php echo form_error('tgl_pjm') ?></label>
            <input type="text" class="form-control" name="tgl_pjm" id="tgl_pjm" placeholder="Tgl Pjm" value="<?php echo $tgl_pjm; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Lama Pjm <?php echo form_error('lama_pjm') ?></label>
            <input type="text" class="form-control" name="lama_pjm" id="lama_pjm" placeholder="Lama Pjm" value="<?php echo $lama_pjm; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Kembali <?php echo form_error('tgl_kembali') ?></label>
            <input type="text" class="form-control" name="tgl_kembali" id="tgl_kembali" placeholder="Tgl Kembali" value="<?php echo $tgl_kembali; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Mhs <?php echo form_error('id_mhs') ?></label>
            <input type="text" class="form-control" name="id_mhs" id="id_mhs" placeholder="Id Mhs" value="<?php echo $id_mhs; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Pjm <?php echo form_error('status_pjm') ?></label>
            <input type="text" class="form-control" name="status_pjm" id="status_pjm" placeholder="Status Pjm" value="<?php echo $status_pjm; ?>" />
        </div>
	    <input type="hidden" name="id_pinjam" value="<?php echo $id_pinjam; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pinjam') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>