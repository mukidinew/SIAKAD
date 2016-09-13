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
        <h2>Tb_mhs_lulus List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Jns Keluar</th>
		<th>Tgl Keluar</th>
		<th>Jalur Skripsi</th>
		<th>Judul Skripsi</th>
		<th>Bln Awal Bim</th>
		<th>Bln Akhir Bim</th>
		<th>Sk Yudisium</th>
		<th>Tgl Yudisium</th>
		<th>IPK</th>
		<th>No Ijazah</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($mahasiswa_lulus_data as $mahasiswa_lulus)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mahasiswa_lulus->id_jns_keluar ?></td>
		      <td><?php echo $mahasiswa_lulus->tgl_keluar ?></td>
		      <td><?php echo $mahasiswa_lulus->jalur_skripsi ?></td>
		      <td><?php echo $mahasiswa_lulus->judul_skripsi ?></td>
		      <td><?php echo $mahasiswa_lulus->bln_awal_bim ?></td>
		      <td><?php echo $mahasiswa_lulus->bln_akhir_bim ?></td>
		      <td><?php echo $mahasiswa_lulus->sk_yudisium ?></td>
		      <td><?php echo $mahasiswa_lulus->tgl_yudisium ?></td>
		      <td><?php echo $mahasiswa_lulus->IPK ?></td>
		      <td><?php echo $mahasiswa_lulus->no_ijazah ?></td>
		      <td><?php echo $mahasiswa_lulus->ket ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>