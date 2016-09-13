<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="word-table" style="margin-bottom: 10px">
          <tr>
              <th>No</th>
              <th>Id Mhs</th>
              <th>Sks Diakui</th>
              <th>Pt Asal</th>
              <th>Prodi Asal</th>
          </tr>
          <?php
          foreach ($mahasiswa_transfer_data as $mahasiswa_transfer)
          {
          ?>
          <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $mahasiswa_transfer->id_mhs ?></td>
            <td><?php echo $mahasiswa_transfer->sks_diakui ?></td>
            <td><?php echo $mahasiswa_transfer->pt_asal ?></td>
            <td><?php echo $mahasiswa_transfer->prodi_asal ?></td>
          </tr>
          <?php
          }
          ?>
      </table>
    </div>
  </div>
</div>
