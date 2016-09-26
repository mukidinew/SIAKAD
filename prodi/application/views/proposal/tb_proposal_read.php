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
        <h2 style="margin-top:0px">Tb_proposal Read</h2>
        <table class="table">
	    <tr><td>Id Mhs</td><td><?php echo $id_mhs; ?></td></tr>
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Id Pembimbing 1</td><td><?php echo $id_pembimbing_1; ?></td></tr>
	    <tr><td>Id Pembimbing 2</td><td><?php echo $id_pembimbing_2; ?></td></tr>
	    <tr><td>Tgl Daftar</td><td><?php echo $tgl_daftar; ?></td></tr>
	    <tr><td>Tgl Kadaluarsa</td><td><?php echo $tgl_kadaluarsa; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('proposal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>