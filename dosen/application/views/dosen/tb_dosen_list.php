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
            <!-- <?php echo anchor(site_url('dosen/create'), 'Create', 'class="btn btn-primary"'); ?> -->
            <?php echo anchor(site_url('dosen/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            <!-- <?php echo anchor(site_url('dosen/word'), 'Word', 'class="btn btn-primary"'); ?> -->
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
            <tr>
              <th width="80px">No</th>
              <th>NIDN</th>
              <th>Nama Dosen</th>
              <th>Program Studi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($dosen_data as $dosen)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $dosen->nidn ?></td>
                <td><?php echo $dosen->nm_dosen ?></td>
                <td><?php echo $dosen->program_studi ?></td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
