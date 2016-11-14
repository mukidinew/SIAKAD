<div class="container-fluid">
  <div style="margin-top: 70px;">
    <div class="row">
        <div class="col-md-12 laporan" >
          <p>
            <center>
              <b>KEPUTUSAN</b><br>
              <b>KETUA SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER</b><br>
              <b>STMIK ADHI GUNA</b><br>
              Nomor : .............../J.3111/AK-213/ <?php echo date("m") ?> / <?php echo date("Y"); ?>
              <br>
              <br>
              <b>TENTANG</b><br>
              <b>PENETAPAN TIM PENGUJI UJIAN PROPOSAL</b><br>
              <b>SARJANA STRATA SATU (S1) STMIK ADHI GUNA</b>
              <br>
              <br>
              <b>Ketua Sekolah Tinggi Manajemen Informatika Dan Komputer (STMIK) Adhi Guna</b>
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
            <td width="10%">Membaca </td>
            <td>:</td>
            <td width="90%">
               Surat Permohonan Saudara(i) : <b><?php echo $data_mhs->nm_mhs ?></b> <br>
            </td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>
              Tanggal: <b><?php echo $data_mhs->tgl_daftar ?></b> Mahasiswa Program Studi <?php echo $data_mhs->nm_prodi ?>, NIM : <b><?php echo $data_mhs->nim ?></b> Tentang Permohonan Ujian Skripsi
            </td>
          </tr>

          <tr>
            <td width="10%">Menimbang </td>
            <td>:</td>
            <td width="90%">
               <ol>
                 <li>Demi tertibnya dan lancarnya penyelenggaraan Ujian Skripsi dipandang perlu menetapkan tim Penguji.</li>
                 <li>Bahwa Kandidat/Calon peserta Ujian Skripsi adalah Mahasiswa yang telah disetujui oleh Pembimbing I dan Pembimbing II dan memenuhi ketentuan yang berlaku di STMIK Adhi Guna.</li>
                 <li>
                   Untuk maksud pada butir 1 dan 2, perlu ditetapkan dalam Surat Keputusan.
                 </li>
               </ol>
            </td>
          </tr>
          <tr>
            <td width="10%">Mengingat </td>
            <td>:</td>
            <td width="90%">
               <ol>
                 <li>
                   Undang-Undang RI No. 20 tahun 2003 tentang Sistem Pendidikan
                 </li>
                 <li>
                   Peraturan Pemerintah No.49 tahun 2014 tentang Standar Nasional Pendidikan Tinggi
                 </li>
                 <li>
                   SK Mendiknas No.16/D/O/2001, tentang Pendirian Sekolah Tinggi Manajemen Informatika Dan Komputer Adhi Guna.
                 </li>
                 <li>
                   Surat Keputusan Ketua YPPM Adhi Guna No. 009/YPPM-AG/KPTS/XI/2015 Tentang Pengangkatan Ketua STMIK Adhi Guna Periode 2015-2019
                 </li>
                 <?php if ($data_mhs->id_prodi='55201'): ?>
                 <li>
                   Surat Keputusan Direktur Jendral Pendidikan Tinggi No. 3316/D/T/K-IX/2010 Tentang Perpanjangan Izin Program Studi Teknik Informatika STMIK Adhi Guna
                 </li>
                 <?php else: ?>
                 <li>
                   Surat Keputusan Direktur Jendral Pendidikan Tinggi No. 3422/D/T/K-IX/2010 Tentang Perpanjangan Izin Program Studi Sistem Informasi STMIK Adhi Guna
                 </li>
                 <?php endif; ?>
               </ol>
            </td>
          </tr>
          <tr>
            <td width="10%">Memperhatikan </td>
            <td>:</td>
            <td width="90%">
               <ol>
                 <li>
                   Statuta STMIK Adhi Guna
                 </li>
                 <li>
                   Pedoman Akademik STMIK Adhi Guna
                 </li>
               </ol>
            </td>
          </tr>
          <tr>
            <td>
              Menetapkan
            </td>
          </tr>
          <tr>
            <td width="10%">Pertama </td>
            <td>:</td>
            <td width="90%">
               Menunjuk, mengangkat dan menetapkan nama Tim Penguji Ujian Proposal Sarjana Strata Satu (S1) Sebagaiamana tercantum pada Lampiran 1 Surat Keputusan ini.
            </td>
          </tr>
          <tr>
            <td width="10%">Kedua </td>
            <td>:</td>
            <td width="90%">
              Bahwa Ujian Proposal Sarjana Strata Satu (S1) ditetapkan dan dilaksanakan pada <b>Tanggal : <?php echo $data_mhs->tgl_maju ?></b>
            </td>
          </tr>
          <tr>
            <td width="10%">Ketiga </td>
            <td>:</td>
            <td width="90%">
               Keputusan ini berlaku sejak tanggal ditetapkan apabila ternyata terdapat kekeliruan dalam penetapan ini, akan disempurnakan kembali sebagai mana mestinya
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <br>
      <?php
      $t=time();
      $date_sekarang = date("d-m-Y",$t);
       ?>
      <table class="ttd_laporan">
        <tbody>
          <tr>
            <td colspan="4" width="50%"></td>
            <td>Ditetapkan di</td>
            <td>:</td>
            <td width="30%">Palu</td>
          </tr>
          <tr>
            <td colspan="4" width="50%"></td>
            <td>Pada Tanggal</td>
            <td>:</td>
            <td><?php echo $date_sekarang ?></td>
          </tr>
          <tr>
            <td colspan="4" width="50%"></td>
            <td>Ketua,</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="4" width="50%"></td>
            <td><br><br><br><br></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="4" width="50%"></td>
            <td colspan="3">
              <b><u>Mus Aidah, S.Pd,. MM</u></b>
            </td>
          </tr>
          <tr>
            <td colspan="4" width="50%"></td>
            <td colspan="3">
              NIK. 140 201 023
            </td>
          </tr>
        </tbody>
      </table>
      <div class="">
        <small><i><u>Tembusan :</u></i></small>
        <small>
          <i>
            <ol>
              <li>Wakil Ketua 1 Bid. Akademik</li>
              <li>
                Ketua Program Studi
                <?php if ($data_mhs->id_prodi='55201'): ?>
                  Teknik Informatika
                <?php else: ?>
                  Sistem Informasi
                <?php endif; ?>
              </li>
              <li>Kepala BAAK</li>
              <li>Masing-masing yang bersangkutan untuk dilaksanakan</li>
              <li>Arsip</li>
            </ol>
          </i>
        </small>
      </div>
    </div>
  </div>
</div>
