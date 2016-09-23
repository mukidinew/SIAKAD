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
        <h2 style="margin-top:0px">Tb_pinjam Read</h2>
        <table class="table">
	    <tr><td>Id Buku</td><td><?php echo $id_buku; ?></td></tr>
	    <tr><td>Tgl Pjm</td><td><?php echo $tgl_pjm; ?></td></tr>
	    <tr><td>Lama Pjm</td><td><?php echo $lama_pjm; ?></td></tr>
	    <tr><td>Tgl Kembali</td><td><?php echo $tgl_kembali; ?></td></tr>
	    <tr><td>Id Mhs</td><td><?php echo $id_mhs; ?></td></tr>
	    <tr><td>Status Pjm</td><td><?php echo $status_pjm; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pinjam') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>