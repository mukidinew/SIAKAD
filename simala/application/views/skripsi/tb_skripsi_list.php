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
        <?php echo anchor(site_url('skripsi/create'), 'Create', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('skripsi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
      <th>Id Proposal Maju</th>
      <th>Bebas Pustaka</th>
      <th>Bebas Smt</th>
      <th>Bebas Proposal</th>
      <th>Tgl Daftar</th>
      <th>Action</th>
              </tr>
          </thead>
    <tbody>
          <?php
          $start = 0;
          foreach ($skripsi_data as $skripsi)
          {
              ?>
              <tr>
      <td><?php echo ++$start ?></td>
      <td><?php echo $skripsi->id_proposal_maju ?></td>
      <td><?php echo $skripsi->bebas_pustaka ?></td>
      <td><?php echo $skripsi->bebas_smt ?></td>
      <td><?php echo $skripsi->bebas_proposal ?></td>
      <td><?php echo $skripsi->tgl_daftar ?></td>
      <td style="text-align:center" width="200px">
    <?php
    echo anchor(site_url('skripsi/read/'.$skripsi->id_skripsi),'Read');
    echo ' | ';
    echo anchor(site_url('skripsi/update/'.$skripsi->id_skripsi),'Update');
    echo ' | ';
    echo anchor(site_url('skripsi/delete/'.$skripsi->id_skripsi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
