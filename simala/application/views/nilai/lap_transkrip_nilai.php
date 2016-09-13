<div class="container-fluid">
  <div class="page-header" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
          <p>
            <center>
              <h2><b><u>TRANSKRIP NILAI SEMENTARA</u></b></h2>
              <b>Nomor : </b> .............../.............../.............../ <?php echo date("Y"); ?>
            </center>
          </p><br><br>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="id_laporan">
        <tbody>
          <tr>
            <td width="25%">Nama Mahasiswa </td>
            <td>:</td>
            <td width="50%"> <?php echo $nm_mhs ?></td>
            <td>Jurusan</td>
            <td>:</td>
            <td width="50%"> <?php echo $nm_prodi ?></td>
          </tr>
          <tr>
            <td>NIM </td>
            <td>:</td>
            <td> <?php echo $nim ?></td>
            <td>Prodi </td>
            <td>:</td>
            <td> <?php echo $nm_prodi ?></td>
          </tr>
          <tr>
            <td>TTL </td>
            <td>:</td>
            <td width="50%"> <?php echo $tpt_lhr ?> ,.....,...............,.......</td>
            <td>Jenjang </td>
            <td>:</td>
            <td width="50%"> Strata 1</td>
          </tr>
        </tbody>
      </table>
      <br>
      <table class="laporan" style="font-size:12px;">
          <thead >
              <tr>
                  <th width="10px">No</th>
                  <th width="60px">Kode MK</th>
                  <th>Mata Kuliah</th>
                  <th width="40px">Angka</th>
                  <th width="40px">Huruf</th>
                  <th width="40px">Kredit</th>
                  <th width="40px">N x K</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          $t_nk = 0;
          $t_sks =0;
          foreach ($nilai_data as $nilai)
          {
              $n_k = $nilai->nilai_index * $nilai->sks;
              ?>
              <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $nilai->kode_mk ?></td>
                  <td><?php echo $nilai->nm_mk ?></td>
                  <td><?php echo $nilai->nilai_index ?></td>
                  <td><?php echo $nilai->nilai_huruf ?></td>
                  <td><?php echo $nilai->sks ?></td>
                  <td><?php echo $n_k ?></td>
                </tr>
              <?php
              $t_nk = $t_nk+ $n_k;
              $t_sks = $t_sks+ $nilai->sks;
          }
          ?>
            <tr>
                <td colspan="5"> <center>JUMLAH</center> </td>
                <td><?php echo $t_sks ?></td>
                <td><?php echo $t_nk ?></td>
              </tr>
          </tbody>
      </table>
      <?php
        $ipk = $t_nk/$t_sks;
      ?>
      <p><b>Indeks Prestasi Kumulatif : <?php echo $ipk ?></b></p>

      <table class="ttd_laporan">
        <tbody>
          <tr>
            <td colspan="4" width="60%"></td>
            <td>Palu, 04 Juni 2016</td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td>a.n KETUA STMIK ADHI GUNA</td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td>KASUBAG PENDIDIKAN DAN PENGAJARAN</td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td><br></td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td><br></td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td><br></td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td><br></td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td><u>RENI NURDIN, S.Sos</u></td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td>NIK. 140 201 015</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
