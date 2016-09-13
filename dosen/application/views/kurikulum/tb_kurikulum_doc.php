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
        <h2>Tb_kurikulum List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nm Kurikulum</th>
		<th>Ta</th>
		<th>Kd Prodi</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($kurikulum_data as $kurikulum)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kurikulum->nm_kurikulum ?></td>
		      <td><?php echo $kurikulum->ta ?></td>
		      <td><?php echo $kurikulum->kd_prodi ?></td>
		      <td><?php echo $kurikulum->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>