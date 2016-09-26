<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="margin:20px 20px;">
    <p>
      <center>
        <h2><b><u>BERITA ACARA PERUBAHAN NILAI</u></b></h2>
        <b>No. </b>
      </center>
    </p><br>
    <p align='justify'>
      Disampaikan Kepada Bagian Akademik STMIK Adhi Guna Bahwa Mahasiswa yang tercantum namanya berikut ini dinyatakan berhak mengubah nilai berdasarkan hasil komplain nilai yang dilakukan.
    </p>
    <br><br><br>
    <table class="id_laporan">
      <tbody>
        <tr>
          <td>Nama Mahasiwa </td>
          <td>:</td>
          <td><?php echo $nm_mhs ?></td>
        </tr>
        <tr>
          <td>NIM </td>
          <td>:</td>
          <td><?php echo $nim ?></td>
        </tr>
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
          <td>Jurusan </td>
          <td>:</td>
          <td><?php echo $jur ?></td>
        </tr>
      </tbody>
    </table>
    <br><br>
    <p align='justify'>
      Adapun Keputusan yang dihasilkan setelah hasil komplain nilai tersebut bahwa Mahasiswa tersebut berhak mendapatkan nilai ........... dengan index ........ dari sebelumnya nilai <u><?php echo $nilai_awal ?></u> dengan index <u><?php echo $index_awal ?></u>. Demikian Berita Acara ini dibuat agar dapat segera diproses. Terimakasih
    </p>

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
  </body>
</html>
