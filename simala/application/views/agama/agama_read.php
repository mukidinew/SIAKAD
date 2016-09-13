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
        <h2 style="margin-top:0px">Agama Read</h2>
        <table class="table">
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('agama') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>