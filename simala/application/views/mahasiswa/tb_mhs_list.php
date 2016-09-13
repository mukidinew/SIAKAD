<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4">
              <h3><?php echo $title_page; ?></h3>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>NIM</th>
          		    <th>Nama Mahasiswa</th>
          		    <th>Tempat Lahir</th>
          		    <th>Tanggal Lahir</th>
          		    <th>Jenis Kelamin</th>
          		    <th>Action</th>
                </tr>
          </thead>
          <tbody>
            <?php
            $start = 0;
            foreach ($mahasiswa_data as $mahasiswa)
            {
                ?>
                <tr>
          		    <td><?php echo ++$start ?></td>
                  <td><?php echo $mahasiswa->nim ?></td>
          		    <td><?php echo $mahasiswa->nm_mhs ?></td>
          		    <td><?php echo $mahasiswa->tpt_lhr ?></td>
          		    <td><?php echo $mahasiswa->tgl_lahir ?></td>
          		    <td><?php echo $mahasiswa->jenkel ?></td>
          		    <td style="text-align:center" width="200px">
        			      <a href='<?php echo site_url('mahasiswa/read/'.$mahasiswa->nim) ?>'><i class='fa fa-eye'></i></a> |
        			      <a href='<?php echo site_url('mahasiswa/update/'.$mahasiswa->nim) ?>'><i class='fa fa-pencil-square-o'></i></a> |
        			      <a href='<?php echo site_url('mahasiswa/delete/'.$mahasiswa->nim) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a>
          		    </td>
        	      </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
    <div class="col-md-2">
      <a href='<?php echo site_url('mahasiswa/create') ?>' class="btn btn-success btn-block"><i class='fa fa-pencil-square-o'> Tambah Data</i></a>
      <a href='<?php echo site_url('mahasiswa/excel') ?>' class="btn btn-primary btn-block"><i class='fa fa-newspaper-o'></i> Import Excel</a>
      <a href='<?php echo site_url('mahasiswa/word') ?>' class="btn btn-danger btn-block" ><i class='fa fa-newspaper-o'></i> Import Word</a>
    </div>
  </div>
</div>
