<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <h3><?php echo $title_page; ?></h3>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <?php echo anchor(site_url('mahasiswa_transfer/create'), 'Create', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('mahasiswa_transfer/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('mahasiswa_transfer/word'), 'Word', 'class="btn btn-primary"'); ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Sks Diakui</th>
                  <th>Pt Asal</th>
                  <th>Prodi Asal</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($mahasiswa_transfer_data as $mahasiswa_transfer)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $mahasiswa_transfer->nim ?></td>
                <td><?php echo $mahasiswa_transfer->nama ?></td>
                <td><?php echo $mahasiswa_transfer->sks_diakui ?></td>
                <td><?php echo $mahasiswa_transfer->pt_asal ?></td>
                <td><?php echo $mahasiswa_transfer->prodi_asal ?></td>
                <td style="text-align:center" width="100px">
                  <a href='<?php echo site_url('mahasiswa_transfer/read/'.$mahasiswa_transfer->id_trans) ?>'><i class='fa fa-eye'></i></a> |
                  <a href='<?php echo site_url('mahasiswa_transfer/update/'.$mahasiswa_transfer->id_trans) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                  <a href='<?php echo site_url('mahasiswa_transfer/delete/'.$mahasiswa_transfer->id_trans) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a>
                </td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
