<div class="container-fluid">
  <div class="page-header" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
          
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="laporan">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Nama Dosen</th>
                <th>Nama Prodi</th>
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
              <td><?php echo $kelas_kuliah->nm_prodi ?></td>
            </tr>
          <?php
        }
        ?>
        </tbody>
      </table>
      <br><br><br>
      <table class="ttd_laporan">
        <tbody>
          <tr>
            <td colspan="4" width="60%"></td>
            <td>Palu, ....... .................. <?php echo date('Y') ?></td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <td>KETUA STMIK ADHI GUNA</td>
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
            <td><u>Mus Aidah, S.Pd,. MM</u></td>
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
