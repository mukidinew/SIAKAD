<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <h3><?php echo $title_page; ?></h3>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <?php echo anchor(site_url('mahasiswa_lulus/create'), 'Create', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('mahasiswa_lulus/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('mahasiswa_lulus/word'), 'Word', 'class="btn btn-primary"'); ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Jenis Keluar</th>
                <th>Tanggal Keluar</th>
                <th>Judul Skripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $start = 0;
        foreach ($mahasiswa_lulus_data as $mahasiswa_lulus)
        {
            ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $mahasiswa_lulus->nim ?></td>
                <td><?php echo $mahasiswa_lulus->nm_jenis_keluar ?></td>
                <td><?php echo $mahasiswa_lulus->tgl_keluar ?></td>
                <td><?php echo $mahasiswa_lulus->judul_skripsi ?></td>
                <td style="text-align:center" width="100px">
                  <a href='<?php echo site_url('mahasiswa_lulus/read/'.$mahasiswa_lulus->nim) ?>'><i class='fa fa-eye'></i></a> |
                  <a href='<?php echo site_url('mahasiswa_lulus/update/'.$mahasiswa_lulus->nim) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                  <a href='<?php echo site_url('mahasiswa_lulus/delete/'.$mahasiswa_lulus->nim) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
