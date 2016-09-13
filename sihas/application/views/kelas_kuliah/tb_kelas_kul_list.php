<class="container-fluid">
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
            <!-- <?php echo anchor(site_url('kelas_kuliah/create'), 'Create', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('kelas_kuliah/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('kelas_kuliah/word'), 'Word', 'class="btn btn-primary"'); ?> -->
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="kurTable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Nama Kurikulum</th>
                  <th>Periode</th>
                  <th>Kode Prodi</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
          </thead>
           <tbody>
          <?php
          $start = 0;
          foreach ($kurikulum_data as $kurikulum)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kurikulum->nm_kurikulum ?></td>
                <td><?php echo $kurikulum->ta ?></td>
                <td><?php echo $kurikulum->kd_prodi ?></td>
                <td><?php echo $kurikulum->status ?></td>
                <td style="text-align:center">
                  <a href='<?php echo site_url('kelas_kuliah/get_kelas/'.$kurikulum->id_kurikulum) ?>'><i class='fa fa-gears'></i></a>
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
