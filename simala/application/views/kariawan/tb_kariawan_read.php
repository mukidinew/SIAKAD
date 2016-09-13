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
        <h2 style="margin-top:0px">Tb_kariawan Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Jen Kel</td><td><?php echo $jen_kel; ?></td></tr>
	    <tr><td>Tmp Lahir</td><td><?php echo $tmp_lahir; ?></td></tr>
	    <tr><td>Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>S1 Nm Sklh</td><td><?php echo $s1_nm_sklh; ?></td></tr>
	    <tr><td>S1 Jur</td><td><?php echo $s1_jur; ?></td></tr>
	    <tr><td>S1 Thn Lulus</td><td><?php echo $s1_thn_lulus; ?></td></tr>
	    <tr><td>S1 Kota</td><td><?php echo $s1_kota; ?></td></tr>
	    <tr><td>S2 Nm Sklh</td><td><?php echo $s2_nm_sklh; ?></td></tr>
	    <tr><td>S2 Jur</td><td><?php echo $s2_jur; ?></td></tr>
	    <tr><td>S2 Thn Lulus</td><td><?php echo $s2_thn_lulus; ?></td></tr>
	    <tr><td>S2 Kota</td><td><?php echo $s2_kota; ?></td></tr>
	    <tr><td>S3 Nm Sklh</td><td><?php echo $s3_nm_sklh; ?></td></tr>
	    <tr><td>S3 Jur</td><td><?php echo $s3_jur; ?></td></tr>
	    <tr><td>S3 Thn Lulus</td><td><?php echo $s3_thn_lulus; ?></td></tr>
	    <tr><td>S3 Kota</td><td><?php echo $s3_kota; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kariawan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>