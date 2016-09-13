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
        <h2 style="margin-top:0px">Tb_nilai_transfer Read</h2>
        <table class="table">
	    <tr><td>Id Mhs</td><td><?php echo $id_mhs; ?></td></tr>
	    <tr><td>Kd Mk Asal</td><td><?php echo $kd_mk_asal; ?></td></tr>
	    <tr><td>Nm Mk</td><td><?php echo $nm_mk; ?></td></tr>
	    <tr><td>Jml Sks Asal</td><td><?php echo $jml_sks_asal; ?></td></tr>
	    <tr><td>Nilai Huruf</td><td><?php echo $nilai_huruf; ?></td></tr>
	    <tr><td>Id Mk</td><td><?php echo $id_mk; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nilai_transfer') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>