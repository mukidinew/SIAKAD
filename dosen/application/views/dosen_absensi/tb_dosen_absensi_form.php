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
        <h2 style="margin-top:0px">Tb_dosen_absensi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Kelas Dosen <?php echo form_error('id_kelas_dosen') ?></label>
            <input type="text" class="form-control" name="id_kelas_dosen" id="id_kelas_dosen" placeholder="Id Kelas Dosen" value="<?php echo $id_kelas_dosen; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Masuk <?php echo form_error('tgl_masuk') ?></label>
            <input type="text" class="form-control" name="tgl_masuk" id="tgl_masuk" placeholder="Tgl Masuk" value="<?php echo $tgl_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Jam Masuk <?php echo form_error('jam_masuk') ?></label>
            <input type="text" class="form-control" name="jam_masuk" id="jam_masuk" placeholder="Jam Masuk" value="<?php echo $jam_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Kehadiran <?php echo form_error('status_kehadiran') ?></label>
            <input type="text" class="form-control" name="status_kehadiran" id="status_kehadiran" placeholder="Status Kehadiran" value="<?php echo $status_kehadiran; ?>" />
        </div>
	    <div class="form-group">
            <label for="pembahasan">Pembahasan <?php echo form_error('pembahasan') ?></label>
            <textarea class="form-control" rows="3" name="pembahasan" id="pembahasan" placeholder="Pembahasan"><?php echo $pembahasan; ?></textarea>
        </div>
	    <input type="hidden" name="id_absensi" value="<?php echo $id_absensi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dosen_absensi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>