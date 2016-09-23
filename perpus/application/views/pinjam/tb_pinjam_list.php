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
                <h2 style="margin-top:0px">Tb_pinjam List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('pinjam/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pinjam/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id Buku</th>
		    <th>Tgl Pjm</th>
		    <th>Lama Pjm</th>
		    <th>Tgl Kembali</th>
		    <th>Id Mhs</th>
		    <th>Status Pjm</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pinjam_data as $pinjam)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $pinjam->id_buku ?></td>
		    <td><?php echo $pinjam->tgl_pjm ?></td>
		    <td><?php echo $pinjam->lama_pjm ?></td>
		    <td><?php echo $pinjam->tgl_kembali ?></td>
		    <td><?php echo $pinjam->id_mhs ?></td>
		    <td><?php echo $pinjam->status_pjm ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('pinjam/read/'.$pinjam->id_pinjam),'Read'); 
			echo ' | '; 
			echo anchor(site_url('pinjam/update/'.$pinjam->id_pinjam),'Update'); 
			echo ' | '; 
			echo anchor(site_url('pinjam/delete/'.$pinjam->id_pinjam),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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