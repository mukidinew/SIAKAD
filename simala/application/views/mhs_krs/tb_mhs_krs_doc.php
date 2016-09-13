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
        <h2>Tb_mhs_krs List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Mhs</th>
		<th>Kode Pembayaran</th>
		<th>Id Kurikulum</th>
		<th>Status Ambil</th>
		<th>Status Cek</th>
		
            </tr><?php
            foreach ($mhs_krs_data as $mhs_krs)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mhs_krs->id_mhs ?></td>
		      <td><?php echo $mhs_krs->kode_pembayaran ?></td>
		      <td><?php echo $mhs_krs->id_kurikulum ?></td>
		      <td><?php echo $mhs_krs->status_ambil ?></td>
		      <td><?php echo $mhs_krs->status_cek ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>