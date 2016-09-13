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
        <h2 style="margin-top:0px">Tb_kelas_dosen Read</h2>
        <table class="table">
    	    <tr><td>Id Dosen</td><td><?php echo $id_dosen; ?></td></tr>
    	    <tr><td>R T Muka</td><td><?php echo $r_t_muka; ?></td></tr>
    	    <tr><td>T Muka</td><td><?php echo $t_muka; ?></td></tr>
    	    <tr><td></td><td><a href="<?php echo site_url('kelas_dosen') ?>" class="btn btn-default">Cancel</a></td></tr>
      	</table>
        </body>
</html>
