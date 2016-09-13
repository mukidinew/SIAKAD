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
    <div class="col-md-8">
      <b>Daftar Beli Mata Kuliah Periode Berjalan</b><hr>
      <?php
        if ($status_tutup==false && $status_buka==true) {
          ?>
          <table class="table table-bordered table-striped" id="mytable">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode MK</th>
                      <th>Mata Kuliah</th>
                      <th>Kelas</th>
                      <th>SKS</th>
                  </tr>
              </thead>

              <tbody>
              <?php
              $start = 0;
              $total_sks=0;
              foreach ($data_krs_data as $data_krs)
              {
                  $total_sks += $data_krs->sks;
                  ?>
                  <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $data_krs->id_matkul ?></td>
                  <td><?php echo $data_krs->nm_mk ?></td>
                  <td><?php echo $data_krs->nm_kelas ?></td>
                  <td><?php echo $data_krs->sks ?></td>
                 </tr>
                  <?php
              }
              ?>
              </tbody>
              <tfoot>
                  <tr>
                    <th colspan="4"><center>TOTAL SATUAN KREDIT YANG DIAMBIL</center></th>
                    <th><?php echo $total_sks ?></th>
                  </tr>
              </tfoot>
          </table>
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
            <h2 class="innerB  fa fa-exclamation-triangle fa-3x "> Pembelian KRS Secara Online Tidak Tersedia.</h2>
            <br>
            <br>
            <div class="strong text-danger">
                <h4><p>Masa <b>Belanja Matakuliah Online</b> pada periode <b> <?php echo $this->session->userdata('ta') ?></b></p>
                <p>bisa di lakukan pada tanggal <b> <?php echo $tgl_buka ?> s/d <?php echo $tgl_tutup ?></b></p>
                <p>dan</p>
                <p>Masa <b>Ubah Belanja Matakuliah Online</b> pada periode <b><?php echo $this->session->userdata('ta') ?></b>
                </p><p>bisa di lakukan pada tanggal <b> <?php echo $tgl_buka ?> s/d <?php echo $tgl_tutup ?></b></p>
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
                <h4><p>Masa <b>Belanja Matakuliah Online</b> pada periode <b> <?php echo $this->session->userdata('ta') ?></b></p>
                <p>bisa di lakukan pada tanggal <b> <?php echo $tgl_buka ?> s/d <?php echo $tgl_tutup ?></b></p>
                <p>dan</p>
                <p>Masa <b>Ubah Belanja Matakuliah Online</b> pada periode <b> <?php echo $this->session->userdata('ta') ?> </b>
                </p><p>bisa di lakukan pada tanggal <b> <?php echo $tgl_buka ?> s/d <?php echo $tgl_tutup ?></b></p>
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
    <div class="col-md-4">
      <b>Beli Mata Kuliah</b><hr>
      <?php if ($total_sks>=0 && $total_sks<=24 && $status_tutup==false && $status_buka==true): ?>
        <div class="col-md-12">
          <form action="<?php echo site_url('krs/krs_add') ?>" method="post">
            <div class="form-group">
              <label for="varchar">Kurikulum :</label>
            </div>
            <div class="input-group">
            <select type="text" class="form-control" name="id_kurikulum" id="id_kurikulum"></select>
              <span class="input-group-btn">
                  <a class="btn btn-warning btn-sm" id="btnCariMatkul">
                      Set Kurikulum
                  </a>
              </span>
            </div>
            <div class="form-group">
              <label for="varchar"></label>
            </div>
            <div class="form-group">
              <label for="int">Kelas</label>
              <select type="text" class="form-control select2" name="id_kelas" id="id_matkul" readOnly></select>
            </div>
            <input type="text" class="form-control hide" name="id_krs" id="id_krs" value="<?php echo $id_krs ?>" />
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
      <?php else: ?>
        <div class="col-md-12">
          <div class="well text-center">
            <div class="center text-large innerAll">
              <i class="fa fa-5x fa-chain-broken text-danger "></i>
            </div>
            <h1 class="strong innerTB "></h1>
            <h1 class="strong innerTB  ">Perhatian!</h1>
            <h2 class="fa fa-exclamation-triangle fa-3x innerB"> Menu Tidak Tersedia.</h2>
            <br>
            <br>
            <div class="strong text-danger">
                <h4><p>Belanja <b> Matakuliah Online</b> pada periode <b> <?php echo $this->session->userdata('ta') ?></b></p>
                <p>Telah <b>Mencukupi Batas Maksimal Yang Telah Di Tawarkan Atau Telah Melewati Batas Pengisian</b></p>
                </h4>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
