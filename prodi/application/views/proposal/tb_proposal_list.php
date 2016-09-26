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
                <h2 style="margin-top:0px">Tb_proposal List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('proposal/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('proposal/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id Mhs</th>
		    <th>Judul</th>
		    <th>Id Pembimbing 1</th>
		    <th>Id Pembimbing 2</th>
		    <th>Tgl Daftar</th>
		    <th>Tgl Kadaluarsa</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($proposal_data as $proposal)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $proposal->id_mhs ?></td>
		    <td><?php echo $proposal->judul ?></td>
		    <td><?php echo $proposal->id_pembimbing_1 ?></td>
		    <td><?php echo $proposal->id_pembimbing_2 ?></td>
		    <td><?php echo $proposal->tgl_daftar ?></td>
		    <td><?php echo $proposal->tgl_kadaluarsa ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('proposal/read/'.$proposal->id_mhs_proposal),'Read'); 
			echo ' | '; 
			echo anchor(site_url('proposal/update/'.$proposal->id_mhs_proposal),'Update'); 
			echo ' | '; 
			echo anchor(site_url('proposal/delete/'.$proposal->id_mhs_proposal),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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