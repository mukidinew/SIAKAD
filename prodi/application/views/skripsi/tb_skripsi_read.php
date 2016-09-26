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
        <h2 style="margin-top:0px">Tb_skripsi Read</h2>
        <table class="table">
	    <tr><td>Id Proposal Maju</td><td><?php echo $id_proposal_maju; ?></td></tr>
	    <tr><td>Bebas Pustaka</td><td><?php echo $bebas_pustaka; ?></td></tr>
	    <tr><td>Bebas Smt</td><td><?php echo $bebas_smt; ?></td></tr>
	    <tr><td>Bebas Proposal</td><td><?php echo $bebas_proposal; ?></td></tr>
	    <tr><td>Tgl Daftar</td><td><?php echo $tgl_daftar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('skripsi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>