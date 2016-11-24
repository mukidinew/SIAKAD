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
        <h2 style="margin-top:0px">Tb_jadwal Read</h2>
        <table class="table">
	    <tr><td>Id Kelas Dosen</td><td><?php echo $id_kelas_dosen; ?></td></tr>
	    <tr><td>Id Ruang</td><td><?php echo $id_ruang; ?></td></tr>
	    <tr><td>Nm Jam</td><td><?php echo $nm_jam; ?></td></tr>
	    <tr><td>Nm Hari</td><td><?php echo $nm_hari; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jadwal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>