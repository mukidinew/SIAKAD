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
        <h2>Tb_nilai_transfer List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Mhs</th>
		<th>Kd Mk Asal</th>
		<th>Nm Mk</th>
		<th>Jml Sks Asal</th>
		<th>Nilai Huruf</th>
		<th>Id Mk</th>
		
            </tr><?php
            foreach ($nilai_transfer_data as $nilai_transfer)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $nilai_transfer->id_mhs ?></td>
		      <td><?php echo $nilai_transfer->kd_mk_asal ?></td>
		      <td><?php echo $nilai_transfer->nm_mk ?></td>
		      <td><?php echo $nilai_transfer->jml_sks_asal ?></td>
		      <td><?php echo $nilai_transfer->nilai_huruf ?></td>
		      <td><?php echo $nilai_transfer->id_mk ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>