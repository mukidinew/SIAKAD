<page size="landscape">
  <div class="page_landscape">
    <p align='center'>
      <b>DAFTAR HADIR</b>
    </p>
    <br><br>
    <table class='laporan'>
      <thead>
          <tr>
              <th width='20px' rowspan='2'>No</th>
              <th width='80px' rowspan='2'>NIM</th>
              <th width='200px' rowspan='2'>NAMA MAHASISWA</th>
              <th colspan='16'>PERTEMUAN</th>
          </tr>
          <tr>

            <?php
            $a=1;
            for ($i=1; $i <= 16; $i++) {
              ?>
              <th width='40px'><center><?php echo $i ?></center></th>
              <?php
            }
            ?>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($data_absensi as $key): ?>
          <tr>
            <td ><center><?php echo $a++ ?></center></td>
            <td ><?php echo $key->nim ?></td>
            <td ><?php echo $key->nm_mhs ?></td>
            <?php
            $a=1;
            for ($i=1; $i <= 16; $i++) {
              ?>
              <th ><br></th>
              <?php
            }
            ?>
          </tr>
          <?php endforeach; ?>
        <tr>
            <td width='40px' colspan='3'><center><b>Paraf Dosen</b></center></td>
          <?php
          $a=1;
          for ($i=1; $i <= 16; $i++) {
            ?>
            <th width='40px'><br></th>
            <?php
          }
          ?>
        </tr>
      </tbody>
    </table>

    <br><br><br>
    <table class='ttd_laporan'>
      <tbody>
        <tr>
          <td colspan='4' width='70%'></td>
          <td>Palu, ....... .................. <?php echo date('Y') ?></td>
        </tr>
        <tr>
          <td colspan='4'></td>
          <td>DOSEN PENANGGUNG JAWAB</td>
        </tr>
        <tr>
          <td colspan='4'></td>
          <td><br></td>
        </tr>
        <tr>
          <td colspan='4'></td>
          <td><br></td>
        </tr>
        <tr>
          <td colspan='4'></td>
          <td><br></td>
        </tr>
        <tr>
          <td colspan='4'></td>
          <td><br></td>
        </tr>
        <tr>
          <td colspan='4'></td>
          <td><b><u><?php echo $data_dosen->nm_dosen ?>,..........,...........</u></b></td>
        </tr>
        <tr>
          <td colspan='4'></td>
          <td><b>NIK. ...................................</b></td>
        </tr>
      </tbody>
    </table>
  </div>
</page>

<page size="potrait">
  <div class="page_potrait">
    <p>
      <center><b style="font-size: 12pt;">DAFTAR HADIR MAHASISWA</b></center><br>
      <center><b style="font-size: 12pt;">PERCOBAAN</b></center>
    </p>
    <br>
    <p>
      <table class='laporan'>
        <thead>
          <tr>
            <th width="20px">No</th>
            <th width="150px">Tanggal</th>
            <th >Pokok Pembahasan</th>
            <th width="150px">Paraf</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($i=1; $i <= 16; $i++) {
            ?>
            <tr>
              <td><center><?php echo $i; ?></center></td>
              <td><br></td>
              <td><br></td>
              <td><br></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
      <br><br>
      <table class='ttd_laporan'>
        <tbody>
          <tr>
            <td colspan='4' width='70%'></td>
            <td>Palu, ....... .................. <?php echo date('Y') ?></td>
          </tr>
          <tr>
            <td colspan='4'></td>
            <td>DOSEN PENANGGUNG JAWAB</td>
          </tr>
          <tr>
            <td colspan='4'></td>
            <td><br></td>
          </tr>
          <tr>
            <td colspan='4'></td>
            <td><br></td>
          </tr>
          <tr>
            <td colspan='4'></td>
            <td><br></td>
          </tr>
          <tr>
            <td colspan='4'></td>
            <td><br></td>
          </tr>
          <tr>
            <td colspan='4'></td>
            <td><b><u><?php echo $data_dosen->nm_dosen ?>,..........,...........</u></b></td>
          </tr>
          <tr>
            <td colspan='4'></td>
            <td><b>NIK. ...................................</b></td>
          </tr>
        </tbody>
      </table>
    </p>
  </div>
</page>
