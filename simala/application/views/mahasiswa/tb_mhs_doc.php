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
        <h2>Tb_mhs List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nm Mhs</th>
		<th>Tpt Lhr</th>
		<th>Tgl Lahir</th>
		<th>Jenkel</th>
		<th>Agama</th>
		<th>Kelurahan</th>
		<th>Wilayah</th>
		<th>Nm Ibu</th>
		<th>Kd Prodi</th>
		<th>Tgl Masuk</th>
		<th>Smt Masuk</th>
		<th>Status Mhs</th>
		<th>Status Awal</th>
		<th>Email</th>
		
            </tr><?php
            foreach ($mahasiswa_data as $mahasiswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mahasiswa->nm_mhs ?></td>
		      <td><?php echo $mahasiswa->tpt_lhr ?></td>
		      <td><?php echo $mahasiswa->tgl_lahir ?></td>
		      <td><?php echo $mahasiswa->jenkel ?></td>
		      <td><?php echo $mahasiswa->agama ?></td>
		      <td><?php echo $mahasiswa->kelurahan ?></td>
		      <td><?php echo $mahasiswa->wilayah ?></td>
		      <td><?php echo $mahasiswa->nm_ibu ?></td>
		      <td><?php echo $mahasiswa->kd_prodi ?></td>
		      <td><?php echo $mahasiswa->tgl_masuk ?></td>
		      <td><?php echo $mahasiswa->smt_masuk ?></td>
		      <td><?php echo $mahasiswa->status_mhs ?></td>
		      <td><?php echo $mahasiswa->status_awal ?></td>
		      <td><?php echo $mahasiswa->email ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>