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
                <h2 style="margin-top:0px">Tb_proposal_maju List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('proposal_maju/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('proposal_maju/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id Proposal</th>
		    <th>Kode Bayar</th>
		    <th>Bebas Pustaka</th>
		    <th>Bebas Smt</th>
		    <th>Tgl Daftar</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($proposal_maju_data as $proposal_maju)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $proposal_maju->id_proposal ?></td>
		    <td><?php echo $proposal_maju->kode_bayar ?></td>
		    <td><?php echo $proposal_maju->bebas_pustaka ?></td>
		    <td><?php echo $proposal_maju->bebas_smt ?></td>
		    <td><?php echo $proposal_maju->tgl_daftar ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('proposal_maju/read/'.$proposal_maju->id_proposal_maju),'Read'); 
			echo ' | '; 
			echo anchor(site_url('proposal_maju/update/'.$proposal_maju->id_proposal_maju),'Update'); 
			echo ' | '; 
			echo anchor(site_url('proposal_maju/delete/'.$proposal_maju->id_proposal_maju),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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