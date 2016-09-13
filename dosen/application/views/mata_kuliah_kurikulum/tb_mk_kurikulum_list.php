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
            <!-- <?php echo anchor(site_url('mata_kuliah_kurikulum/create'), 'Create', 'class="btn btn-primary"'); ?> -->
            <?php echo anchor(site_url('mata_kuliah_kurikulum/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            <?php echo anchor(site_url('mata_kuliah_kurikulum/word'), 'Word', 'class="btn btn-primary"'); ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Kode Mk</th>
                  <th>Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Nama Kurikulum</th>
                  <th>Periode</th>
              </tr>
          </thead>
           <tbody>
          <?php
          $start = 0;
          foreach ($mata_kuliah_kurikulum_data as $mata_kuliah_kurikulum)
          {
              ?>
              <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $mata_kuliah_kurikulum->kode_mk ?></td>
                  <td><?php echo $mata_kuliah_kurikulum->nm_mk ?></td>
                  <td><?php echo $mata_kuliah_kurikulum->sks ?></td>
                  <td><?php echo $mata_kuliah_kurikulum->nm_kurikulum ?></td>
                  <td><?php echo $mata_kuliah_kurikulum->ta ?></td>
                </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
