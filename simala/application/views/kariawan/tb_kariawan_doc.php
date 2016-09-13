<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tb_kariawan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Jen Kel</th>
		<th>Tmp Lahir</th>
		<th>Tgl Lahir</th>
		<th>Agama</th>
		<th>Jabatan</th>
		<th>Alamat</th>
		<th>No Hp</th>
		<th>Email</th>
		<th>S1 Nm Sklh</th>
		<th>S1 Jur</th>
		<th>S1 Thn Lulus</th>
		<th>S1 Kota</th>
		<th>S2 Nm Sklh</th>
		<th>S2 Jur</th>
		<th>S2 Thn Lulus</th>
		<th>S2 Kota</th>
		<th>S3 Nm Sklh</th>
		<th>S3 Jur</th>
		<th>S3 Thn Lulus</th>
		<th>S3 Kota</th>
		
            </tr><?php
            foreach ($kariawan_data as $kariawan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kariawan->nama ?></td>
		      <td><?php echo $kariawan->jen_kel ?></td>
		      <td><?php echo $kariawan->tmp_lahir ?></td>
		      <td><?php echo $kariawan->tgl_lahir ?></td>
		      <td><?php echo $kariawan->agama ?></td>
		      <td><?php echo $kariawan->jabatan ?></td>
		      <td><?php echo $kariawan->alamat ?></td>
		      <td><?php echo $kariawan->no_hp ?></td>
		      <td><?php echo $kariawan->email ?></td>
		      <td><?php echo $kariawan->s1_nm_sklh ?></td>
		      <td><?php echo $kariawan->s1_jur ?></td>
		      <td><?php echo $kariawan->s1_thn_lulus ?></td>
		      <td><?php echo $kariawan->s1_kota ?></td>
		      <td><?php echo $kariawan->s2_nm_sklh ?></td>
		      <td><?php echo $kariawan->s2_jur ?></td>
		      <td><?php echo $kariawan->s2_thn_lulus ?></td>
		      <td><?php echo $kariawan->s2_kota ?></td>
		      <td><?php echo $kariawan->s3_nm_sklh ?></td>
		      <td><?php echo $kariawan->s3_jur ?></td>
		      <td><?php echo $kariawan->s3_thn_lulus ?></td>
		      <td><?php echo $kariawan->s3_kota ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>