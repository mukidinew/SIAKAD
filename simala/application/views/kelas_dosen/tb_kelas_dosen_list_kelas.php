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

        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Nama Kelas</th> -->
                <!-- <th>Rencana Tatap Muka</th>
                <th>Tatap Muka</th> -->
                <th>Periode</th>
                <!-- <th>Kode Prodi</th> -->
                <th>Nama Prodi</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($kelas_dosen_data as $kelas_dosen)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kelas_dosen->nidn ?></td>
                <td><?php echo $kelas_dosen->nm_dosen ?></td>
                <td><?php echo $kelas_dosen->kode_mk ?></td>
                <td><?php echo $kelas_dosen->nm_mk ?></td>
                <td><?php echo $kelas_dosen->nm_kelas ?></td>
                <!-- <td><?php echo $kelas_dosen->r_t_muka ?></td>
                <td><?php echo $kelas_dosen->t_muka ?></td> -->
                <td><?php echo $kelas_dosen->ta ?></td>
                <!-- <td><?php echo $kelas_dosen->id_prodi ?></td> -->
                <td><?php echo $kelas_dosen->nm_prodi ?></td>
                <td style="text-align:center" width="100px">
                  <a href='<?php echo site_url('kelas_dosen/read/'.$kelas_dosen->id_kelas_dosen) ?>'><i class='fa fa-eye'></i></a> |
                  <a href='<?php echo site_url('kelas_dosen/update/'.$kelas_dosen->id_kelas_dosen) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                  <a href='<?php echo site_url('kelas_dosen/delete/'.$kelas_dosen->id_kelas_dosen) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a>
                </td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
    <div class="col-md-2">
      <?php echo anchor(site_url('kelas_dosen/create'), 'Tambah Data', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('kelas_dosen/excel'), 'Import Excel', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('kelas_dosen/word'), 'Import Word', 'class="btn btn-primary btn-block"'); ?>
    </div>
  </div>
</div>
