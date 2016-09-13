<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
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
      <table class="table table-bordered table-striped" id="krstable">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Kode Pembayaran</th>
                <th>Nama Kurikulum</th>
                <th>Periode</th>
                <th>Konfirmasi BAAK</th>
                <th>Konfirmasi Keuangan</th>
                <th><center>Action</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
          $start=0;
          foreach ($data_mhs_krs as $key) {
            ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo  $key->nim ?></td>
                <td><?php echo  $key->nama ?></td>
                <td><?php echo  $key->kode_pembayaran ?></td>
                <td><?php echo  $key->nm_kurikulum ?></td>
                <td><?php echo  $key->ta ?></td>
                <td><?php echo  $key->status_ambil ?></td>
                <td><?php echo  $key->status_cek ?></td>
                <td style="text-align:center" width="200px">
                  <a href="<?php echo site_url('data_krs/konfirmasi/'.$key->nim.'/'.$key->kode_pembayaran) ?>"><i class='fa fa-pencil-square-o'></i></a> |
                  <a href="<?php echo site_url('data_krs/proses_krs/'.$key->nim.'/'.$key->ta) ?>"><i class='fa fa-gears'> </i></a>
                </td>
              </tr>
            <?php
          }
        ?>
        </tbody>
      </table>
      <!-- <h3>Pembelian Mata Kuliah Berdasarkan Kartu Rencana Studi</h3>
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Mata Kuliah</th>
                  <th>Nama Kelas</th>
                  <th>Periode</th>
                  <th>Kode Prodi</th>
                  <th>Nama Prodi</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($data_krs_data as $data_krs)
          {
              ?>
              <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $data_krs->nim ?></td>
              <td><?php echo $data_krs->nm_mhs ?></td>
              <td><?php echo $data_krs->id_matkul ?></td>
              <td><?php echo $data_krs->nm_mk ?></td>
              <td><?php echo $data_krs->nm_kelas ?></td>
              <td><?php echo $data_krs->ta ?></td>
              <td><?php echo $data_krs->nm_prodi ?></td>
              <td><?php echo $data_krs->id_prodi ?></td>
              <td style="text-align:center" width="200px">
                <a href='<?php echo site_url('data_krs/read/'.$data_krs->id_data_krs) ?>'><i class='fa fa-eye'></i></a> |
                <a href='<?php echo site_url('data_krs/update/'.$data_krs->id_data_krs) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                <a href='<?php echo site_url('data_krs/delete/'.$data_krs->id_data_krs) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a>
              </td>
             </tr>
              <?php
          }
          ?>
          </tbody>
      </table> -->
    </div>
    <div class="col-md-2">
      <?php echo anchor(site_url('data_krs/create'), 'Tambah KRS', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('data_krs/excel'), 'Import Excel', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('data_krs/word'), 'Import Word', 'class="btn btn-primary btn-block"'); ?>
    </div>
  </div>
</div>
