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
        <h2>Tb_mk_kurikulum List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Mk</th>
		<th>Id Kurikulum</th>
		
            </tr><?php
            foreach ($mata_kuliah_kurikulum_data as $mata_kuliah_kurikulum)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mata_kuliah_kurikulum->kode_mk ?></td>
		      <td><?php echo $mata_kuliah_kurikulum->id_kurikulum ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>