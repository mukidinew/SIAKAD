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
        <h2 style="margin-top:0px">Tb_proposal_maju Read</h2>
        <table class="table">
	    <tr><td>Id Proposal</td><td><?php echo $id_proposal; ?></td></tr>
	    <tr><td>Kode Bayar</td><td><?php echo $kode_bayar; ?></td></tr>
	    <tr><td>Bebas Pustaka</td><td><?php echo $bebas_pustaka; ?></td></tr>
	    <tr><td>Bebas Smt</td><td><?php echo $bebas_smt; ?></td></tr>
	    <tr><td>Tgl Daftar</td><td><?php echo $tgl_daftar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('proposal_maju') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>