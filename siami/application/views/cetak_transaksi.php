<style>
th,td,p,div,b ... {margin:0;padding:0}
html{margin:50px 50px}

table.laporan {
  border-collapse: collapse;
  width: 100%;
}
table.laporan td,
table.laporan th {
  border: 1px solid black;
  padding: 5px;
}
</style>

<table width="100%">
  <tbody>
    <tr>
      <td width="150px">Nama Mahasiswa </td>
      <td width="5px">:</td>
      <td> <?php echo $nama ?></td>
      <td width="100px">Tanggal </td>
      <td width="5px">:</td>
      <td> <?php echo date('D-M-Y') ?></td>
    </tr>
    <tr>
      <td>NIM </td>
      <td>:</td>
      <td> <?php echo $nim ?></td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td>:</td>
      <td> <?php echo $jurusan ?></td>
    </tr>
  </tbody>
</table>
<br>
<table border="1px" width="100%" class="laporan">
  <thead>
    <tr>
      <th>Username</th>
      <th>Password</th>
      <th width="100px">Konfirmasi</th>
      <th width="100px">Status</th>
      <th width="170px">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><center><?php echo $nim ?></center></td>
      <td><center><?php echo $nim ?></center></td>
      <td><center><?php echo $konfirmasi ?></center></td>
      <td><center><?php echo $status ?></center></td>
      <td><center><?php echo $periode ?></center></td>
    </tr>
  </tbody>
</table>
<p>
  *<small><i>Validasikan Akun Anda Di BAAK untuk mengakses SIHAS</i></small>
</p>
<br>
<table class="" width="100%">
  <tbody>
    <tr>
      <td colspan="4" width="60%"></td>
      <?php
        $t=time();
        $date_kok = date("Y-m-d",$t);
      ?>
      <td>Palu, <?php echo $date_kok ?></td>
    </tr>
    <tr>
      <td colspan="4"></td>
      <td>Bendahara</td>
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
      <td><u>Herlinawati Ridwan, S.Kom</u></td>
    </tr>
    <tr>
      <td colspan="4"></td>
      <td>NIK. 140 201 000</td>
    </tr>
  </tbody>
</table>
