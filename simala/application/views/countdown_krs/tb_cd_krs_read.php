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
        <h2 style="margin-top:0px">Tb_cd_krs Read</h2>
        <table class="table">
	    <tr><td>Waktu Buka</td><td><?php echo $waktu_buka; ?></td></tr>
	    <tr><td>Waktu Tutup</td><td><?php echo $waktu_tutup; ?></td></tr>
	    <tr><td>Id Kurikulum</td><td><?php echo $id_kurikulum; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('countdown_krs') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>