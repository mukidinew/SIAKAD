<p>
  <center>
    <h2><b><u>DPNA</u></b></h2>
  </center>
</p><br>
<table class="id_laporan">
  <tbody>
    <tr>
      <td>Kelas</td>
      <td>:</td>
      <td><?php echo $kelas ?></td>
    </tr>
    <tr>
      <td>Mata Kuliah </td>
      <td>:</td>
      <td><?php echo $mata_kuliah ?></td>
    </tr>
    <tr>
      <td>Dosen Pengampu </td>
      <td>:</td>
      <td><?php echo $nm_dosen ?></td>
    </tr>
    <tr>
      <td>Jurusan </td>
      <td>:</td>
      <td><?php echo $jur ?></td>
    </tr>
  </tbody>
</table>
<br><br>
<table class="laporan" id="mytable">
    <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Nilai Angka</th>
          <th>Nilai Huruf</th>
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
          <td><?php echo $key->nilai_angka ?></td>
          <td><?php echo $key->nilai_huruf ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<br><br>
<table class="ttd_laporan">
  <tbody>
    <tr>
      <?php $t=time(); ?>
      <td colspan="4" width="60%"></td>
      <td>Palu, <?php echo date("d-m-Y",$t); ?></td>
    </tr>
    <tr>
      <td colspan="4"></td>
      <td>Dosen Pengampu Mata Kuliah</td>
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
      <td><u><b><?php echo $nm_dosen ?>,...........,..........</u></b></td>
    </tr>
    <tr>
      <td colspan="4"></td>
      <td><b>NIK. </b></td>
    </tr>
  </tbody>
</table>
