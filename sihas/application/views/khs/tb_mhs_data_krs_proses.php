<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
      <div class="col-md-12">
        <div class="col-md-6">
          <h3>
            <?php
            echo $title_page;
            ?>
          </h3>
        </div>
        <div class="col-md-6 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
        if ($status_tutup==false && $status_buka==true) {
          ?>
          <div class="col-md-10">
            <b>Transkrip Nilai Periode Berjalan</b><hr>
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Mata Kuliah</th>
                        <th>Nilai Angka</th>
                        <th>Nilai Huruf</th>
                        <th>Nilai Index</th>
                        <th>Kredit</th>
                        <th>N x K</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $start = 0;
                $t_nk = 0;
                $t_sks =0;
                foreach ($data_krs_data as $data_krs)
                {
                    $n_k = $data_krs->nilai_index * $data_krs->sks;
                    ?>
                    <tr>
                      <td><?php echo ++$start ?></td>
                      <td><?php echo $data_krs->kode_mk ?></td>
                      <td><?php echo $data_krs->nm_mk ?></td>
                      <td><?php echo $data_krs->nilai_angka ?></td>
                      <td><?php echo $data_krs->nilai_huruf ?></td>
                      <td><?php echo $data_krs->nilai_index ?></td>
                      <td><?php echo $data_krs->sks ?></td>
                      <td><?php echo $n_k ?></td>
                    </tr>
                    <?php
                    $t_nk = $t_nk+ $n_k;
                    $t_sks = $t_sks+ $data_krs->sks;
                }
                $ipk = $t_nk/$t_sks;
                ?>
                </tbody>
                <tfoot>
                    <tr>
                      <th colspan="6"><center>Jumlah</center></th>
                      <th><?php echo $t_sks ?></th>
                      <th><?php echo $t_nk ?></th>
                    </tr>
                    <tr>
                      <th colspan="7"><center>Indeks Prestasi Sementara</center></th>
                      <th><?php echo $ipk ?></th>
                    </tr>
                </tfoot>
            </table>
          </div>
          <div class="col-md-2">
            <div class="col-md-12">
              <b>Cetak KHS Periode Ini</b><hr>
              <a href="<?php echo site_url('khs/transkrip_nilai') ?>" class="btn btn-primary btn-block" target="_blank">Cetak</a>
            </div>
          </div>
          <?php
        }
        else if ($status_tutup==false && $status_buka_1==true) {
          ?>
          <div class="well text-center">
            <div class="center text-large innerAll">
              <i class="fa fa-5x fa-chain-broken text-danger"></i>
            </div>
            <h1 class="strong innerTB "></h1>
            <h1 class="strong innerTB  ">Perhatian!</h1>
            <h2 class="innerB  fa fa-exclamation-triangle fa-3x "> Cetak KHS Secara Online Tidak Tersedia.</h2>
            <br>
            <br>
            <div class="strong text-danger">
              <h4><p>Masa <b>Pencetakan KHS</b> pada periode <b> <?php echo $this->session->userdata('ta') ?></b></p>
                <p>bisa di lakukan pada tanggal <b> <?php echo $tgl_buka ?> s/d <?php echo $tgl_tutup ?></b></p>
              </h4>
            </div>
          </div>
          <?php
        }
        else if ($status_tutup==false && $status_buka==false) {
          ?>
          <div class="well text-center">
            <div class="center text-large innerAll">
              <i class="fa fa-5x fa-chain-broken text-danger "></i>
            </div>
            <h1 class="strong innerTB "></h1>
            <h1 class="strong innerTB  ">Perhatian!</h1>
            <h2 class="fa fa-exclamation-triangle fa-3x innerB"> Halaman Tidak Tersedia.</h2>
            <br>
            <br>
            <div class="strong text-danger">
                <h4><p>Pencetakan KHS</b> pada periode <b> <?php echo $this->session->userdata('ta') ?></b></p>
                <p>bisa di lakukan pada tanggal <b> <?php echo $tgl_buka ?> s/d <?php echo $tgl_tutup ?></b></p>
                </h4>
            </div>
          </div>
          <?php
        }
        else {
          ?>

          <?php
        }
      ?>
    </div>

  </div>
</div>
