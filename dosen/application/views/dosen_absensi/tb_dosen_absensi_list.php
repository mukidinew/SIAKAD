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
                <h2 style="margin-top:0px">Tb_dosen_absensi List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('dosen_absensi/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('dosen_absensi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id Kelas Dosen</th>
		    <th>Tgl Masuk</th>
		    <th>Jam Masuk</th>
		    <th>Status Kehadiran</th>
		    <th>Pembahasan</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($dosen_absensi_data as $dosen_absensi)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $dosen_absensi->id_kelas_dosen ?></td>
		    <td><?php echo $dosen_absensi->tgl_masuk ?></td>
		    <td><?php echo $dosen_absensi->jam_masuk ?></td>
		    <td><?php echo $dosen_absensi->status_kehadiran ?></td>
		    <td><?php echo $dosen_absensi->pembahasan ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('dosen_absensi/read/'.$dosen_absensi->id_absensi),'Read'); 
			echo ' | '; 
			echo anchor(site_url('dosen_absensi/update/'.$dosen_absensi->id_absensi),'Update'); 
			echo ' | '; 
			echo anchor(site_url('dosen_absensi/delete/'.$dosen_absensi->id_absensi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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