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
          <form class="" action="" method="post">
          </form>
          <?php echo form_error('nilai_angka') ?>
          <!-- <?php echo form_error('nilai_index') ?>
          <?php echo form_error('nilai_huruf') ?> -->
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                  <th width="40px">No</th>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>Nama Kelas</th>
                  <th>Periode</th>
                  <th>Kode Prodi</th>
                  <th>Nama Prodi</th>
                  <th>Nilai : Angka|Huruf|Index</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $start = 0;
            foreach ($data_krs as $key)
            {
                ?>
                <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $key->nim ?></td>
                  <td><?php echo $key->nm_mhs ?></td>
                  <td><?php echo $key->id_matkul ?></td>
                  <td><?php echo $key->nm_mk ?></td>
                  <td><?php echo $key->nm_kelas ?></td>
                  <td><?php echo $key->ta ?></td>
                  <td><?php echo $key->id_prodi ?></td>
                  <td><?php echo $key->nm_prodi ?></td>
                  <td style="text-align:center" width="200px">
                    <?php
                      if ($key->status_nilai=="N") {
                        ?>
                        <form action="<?php echo site_url('kelas_dosen/add_nilai') ?>" method="post">
                          <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="" name="nilai_angka" id="" value="">
                            <input id="btn-input" type="text" class="form-control input-sm hide" placeholder="" name="id_data_krs" id="" value="<?php echo $key->id_data_krs ?>">
                            <input id="btn-input" type="text" class="form-control input-sm hide" placeholder="" name="id_kelas" id="" value="<?php echo $key->id_kelas ?>">
                            <span class="input-group-btn">
                              <span class="input-group-btn">
                                <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-cloud-upload" aria-hidden="true"></i></button>
                              </span>
                            </span>
                          </div>
                        </form>
                        <?php
                      } else {
                        ?>
                          <a href="<?php echo site_url('kelas_dosen/cetak_bap_edit/'.$key->id_kelas.'/'.$key->nim) ?>" target="_blank"><i class='fa fa-pencil-square-o'></i></a>
                        <?php
                      }

                    ?>
                  </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <a href='<?php echo site_url('kelas_dosen/cetak_dpna/'.$data_kelas) ?>' class="btn btn-success btn-block" target="_blank"><i class='fa fa-newspaper-o'></i> Cetak DPNA</a>
    </div>
    <div class="col-md-4">
      <a href='<?php echo site_url('#') ?>' class="btn btn-warning btn-block"><i class='fa fa-newspaper-o'></i> Import Excel</a>
    </div>
    <div class="col-md-4">
      <a href='<?php echo site_url('#') ?>' class="btn btn-danger btn-block"><i class='fa fa-newspaper-o'></i> Import Word</a>
    </div>
  </div>
</div>
