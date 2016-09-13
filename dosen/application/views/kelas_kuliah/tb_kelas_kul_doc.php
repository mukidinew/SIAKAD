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
        <h2>Tb_kelas_kul List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nm Kelas</th>
		<th>Id Matkul</th>
		<th>Id Kurikulum</th>
		<th>Id Prodi</th>
		
            </tr><?php
            foreach ($kelas_kuliah_data as $kelas_kuliah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kelas_kuliah->nm_kelas ?></td>
		      <td><?php echo $kelas_kuliah->id_matkul ?></td>
		      <td><?php echo $kelas_kuliah->id_kurikulum ?></td>
		      <td><?php echo $kelas_kuliah->id_prodi ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>