<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Tb_nilai_transfer List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('nilai_transfer/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('nilai_transfer/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('nilai_transfer/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id Mhs</th>
		    <th>Kd Mk Asal</th>
		    <th>Nm Mk</th>
		    <th>Jml Sks Asal</th>
		    <th>Nilai Huruf</th>
		    <th>Id Mk</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
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
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('nilai_transfer/read/'.$nilai_transfer->id_nilai_trans),'Read'); 
			echo ' | '; 
			echo anchor(site_url('nilai_transfer/update/'.$nilai_transfer->id_nilai_trans),'Update'); 
			echo ' | '; 
			echo anchor(site_url('nilai_transfer/delete/'.$nilai_transfer->id_nilai_trans),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    </body>
</html>