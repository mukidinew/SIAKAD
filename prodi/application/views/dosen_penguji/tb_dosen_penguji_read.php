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
        <h2 style="margin-top:0px">Tb_dosen_penguji Read</h2>
        <table class="table">
	    <tr><td>Id Proposal Maju</td><td><?php echo $id_proposal_maju; ?></td></tr>
	    <tr><td>Id Dosen</td><td><?php echo $id_dosen; ?></td></tr>
	    <tr><td>Jabatan Penguji</td><td><?php echo $jabatan_penguji; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dosen_penguji') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>