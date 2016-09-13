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
        <h2 style="margin-top:0px">Tb_dosen_absensi Read</h2>
        <table class="table">
	    <tr><td>Id Kelas Dosen</td><td><?php echo $id_kelas_dosen; ?></td></tr>
	    <tr><td>Tgl Masuk</td><td><?php echo $tgl_masuk; ?></td></tr>
	    <tr><td>Jam Masuk</td><td><?php echo $jam_masuk; ?></td></tr>
	    <tr><td>Status Kehadiran</td><td><?php echo $status_kehadiran; ?></td></tr>
	    <tr><td>Pembahasan</td><td><?php echo $pembahasan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dosen_absensi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>