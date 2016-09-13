<class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-12">
            <h3><?php echo $title_page; ?></h3>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Nama Kelas</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>Nama Dosen</th>
                  <th>Tahun Ajaran</th>
                  <th>Nama Prodi</th>
                  <th>Tatap Muka</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($kelas_dosen_data as $kelas_kuliah)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kelas_kuliah->nm_kelas ?></td>
                <td><?php echo $kelas_kuliah->kode_mk ?></td>
                <td><?php echo $kelas_kuliah->nm_mk ?></td>
                <td><?php echo $kelas_kuliah->nm_dosen ?></td>
                <td><?php echo $kelas_kuliah->ta ?></td>
                <td><?php echo $kelas_kuliah->nm_prodi ?></td>

            <?php
              if ($kelas_kuliah->t_muka > 0) {
                ?>
                <td><?php echo $kelas_kuliah->t_muka ?></td>
                <?php
              }
              else {
                ?>
                <td><?php echo $kelas_kuliah->t_muka ?> (Sementara)</td>
                <?php
              }
            ?>
                <td style="text-align:center" width="200px">
                    <a href='<?php echo site_url('kelas_dosen/read/'.$kelas_kuliah->id_kelas_dosen) ?>'><i class='fa fa-eye'></i></a> |
                    <a href='<?php echo site_url('kelas_dosen/update/'.$kelas_kuliah->id_kelas_dosen) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                    <a href='<?php echo site_url('kelas_dosen/delete/'.$kelas_kuliah->id_kelas_dosen) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a> |
                    <a href='<?php echo site_url('kelas_dosen/cetak_surat/'.$kelas_kuliah->nidn.'/'.$kelas_kuliah->id_kelas_dosen) ?>' onclick='javasciprt: return confirm("Cetak Surat ?")' target="_blank"><i class='fa fa-gears'></i> Surat</a>
                </td>
              </tr>
            <?php
          }
          ?>
          </tbody>
        </table>
        <div class="col-md-4">
          <b>Validasi BAAK</b><hr>
          <table class="table table-bordered table-striped" id="count_validasi">
              <thead>
                <tr>
                  <th>Total Belum Tervalidasi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($count_validasi as $key): ?>
                  <tr>
                    <td><?php echo $key->total ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
        </div>
    </div>
    <div class="col-md-2">
      <a href="<?php echo site_url('kelas_dosen/validasi_baak/'.$id_kurikulum); ?>" class="btn btn-success btn-block"><i class='fa fa-gears'></i> Validasi</a>
      <a href="<?php echo site_url('kelas_dosen/create'); ?>" class="btn btn-primary btn-block"><i class='fa fa-plus'></i> Tambah Kelas Dosen</a>
      <a href='<?php echo site_url('kelas_dosen/cetak_kelas/'.$id_kurikulum) ?>' onclick='javasciprt: return confirm("Cetak Pengumuman Penugasan Dosen ?")' target="_blank" class="btn btn-warning btn-block"><i class='fa fa-gears'></i> Buat Pengumuman</a>
      <a href="<?php echo site_url('kelas_dosen'); ?>" class="btn btn-danger btn-block"> <i class='fa fa-exit'></i> Kembali</a>
    </div>
  </div>
</div>
