<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
      <div class="col-md-4">
          <h3><?php echo $title_page; ?></h3>
      </div>
      <div class="col-md-4 text-center">
          <div id="message">
              <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          </div>
      </div>
      <div class="col-md-4 text-right">
          <?php echo anchor(site_url('proposal/create'), 'Create', 'class="btn btn-primary"'); ?>
          <?php echo anchor(site_url('proposal/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Id Mhs</th>
                  <th>Judul</th>
                  <th>Nama Pembimbing 1</th>
                  <th>Nama Pembimbing 2</th>
                  <th>Tgl Daftar</th>
                  <th>Tgl Kadaluarsa</th>
                  <th>Action</th>
              </tr>
          </thead>
      <tbody>
          <?php
          $start = 0;
          foreach ($proposal_data as $proposal)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $proposal->nim ?></td>
                <td><?php echo $proposal->judul ?></td>
                <td><?php echo $proposal->pembimbing_1 ?></td>
                <td><?php echo $proposal->pembimbing_2 ?></td>
                <td><?php echo $proposal->setor_judul ?></td>
                <td><?php echo $proposal->tgl_kadaluarsa ?></td>
                <td style="text-align:center" width="200px">
                  <?php
                  echo anchor(site_url('proposal/read/'.$proposal->id_mhs_proposal),'Read');
                  echo ' | ';
                  echo anchor(site_url('proposal/update/'.$proposal->id_mhs_proposal),'Update');
                  echo ' | ';
                  echo anchor(site_url('proposal/delete/'.$proposal->id_mhs_proposal),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                  ?>
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
