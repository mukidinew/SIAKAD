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
        <h2>Tb_kelas_dosen List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Data Krs</th>
		<th>Id Dosen</th>
		<th>R T Muka</th>
		<th>T Muka</th>
		
            </tr><?php
            foreach ($kelas_dosen_data as $kelas_dosen)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kelas_dosen->id_data_krs ?></td>
		      <td><?php echo $kelas_dosen->id_dosen ?></td>
		      <td><?php echo $kelas_dosen->r_t_muka ?></td>
		      <td><?php echo $kelas_dosen->t_muka ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>