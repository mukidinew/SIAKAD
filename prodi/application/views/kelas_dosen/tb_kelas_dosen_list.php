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
    <div class="col-md-12">
      <div class="col-md-4">
        <div class="col-md-12">
          <b>Kelas Dosen Per Kurikulum</b><hr>
          <table class="table table-bordered table-striped" id="kurTable">
              <thead>
                  <tr>
                      <th width="80px">No</th>
                      <th>Nama Kurikulum</th>
                      <th>Periode</th>
                      <!-- <th>Kode Prodi</th> -->
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
               <tbody>
              <?php
              $start = 0;
              foreach ($kurikulum_data as $kurikulum)
              {
                  ?>
                  <tr>
                    <td><?php echo ++$start ?></td>
                    <td><?php echo $kurikulum->nm_kurikulum ?></td>
                    <td><?php echo $kurikulum->ta ?></td>
                    <!-- <td><?php echo $kurikulum->kd_prodi ?></td> -->
                    <td><?php echo $kurikulum->status ?></td>
                    <td style="text-align:center">
                      <a href='<?php echo site_url('kelas_dosen/get_kelas/'.$kurikulum->id_kurikulum) ?>'><i class='fa fa-gears'></i></a>
                    </td>
                  </tr>
                  <?php
              }
              ?>
              </tbody>
          </table>
        </div>
        <div class="col-md-12">
          <div class="col-md-4"><a href="<?php echo site_url('kelas_dosen/create'); ?>" class="btn btn-success btn-block">Tambah Kelas Dosen</a></div>
          <div class="col-md-4"><a href="<?php echo site_url('kelas_dosen/excel'); ?>" class="btn btn-primary btn-block">Export Excel</a></div>
          <div class="col-md-4"><a href="<?php echo site_url('kelas_dosen/word'); ?>" class="btn btn-primary btn-block">Export Word</a></div>
        </div>
      </div>
      <div class="col-md-8">
        <b>Validasi Kelas</b><hr>
        <table class="table table-bordered table-striped" id="count_validasi">
            <thead>
              <tr>
                <th>Periode Kurikulum</th>
                <th>Jumlah</th>
                <th>Kode Prodi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($count_validasi as $key => $value): ?>
                <tr>
                  <td><?php echo $value['ta'] ?></td>
                  <td><?php echo $value['total'] ?></td>
                  <td><?php echo $value['id_prodi'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
        <b>Data Kelas Dosen</b><hr>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                  <th width="80px">No</th>
                  <th>NIDN</th>
                  <th>Nama Dosen</th>
                  <th>Kode Mata Kuliah</th>
                  <!-- <th>Nama Mata Kuliah</th>
                  <th>Nama Kelas</th>
                  <th>Rencana Tatap Muka</th> -->
                  <!-- <th>Tatap Muka</th> -->
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
                  <!-- <td><?php echo $kelas_dosen->nm_mk ?></td> -->
                  <!-- <td><?php echo $kelas_dosen->nm_kelas ?></td>
                  <td><?php echo $kelas_dosen->r_t_muka ?></td>
                  <td><?php echo $kelas_dosen->t_muka ?></td> -->
                  <td><?php echo $kelas_dosen->ta ?></td>
                  <!-- <td><?php echo $kelas_dosen->id_prodi ?></td> -->
                  <td><?php echo $kelas_dosen->nm_prodi ?></td>
                  <td style="text-align:center" width="200px">
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
    </div>
  </div>
</div>
