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
        <?php echo anchor(site_url('proposal_maju/create'), 'Create', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('proposal_maju/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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
                  <th>Judul</th>
                  <th>Kode Bayar</th>
                  <th>Bebas Pustaka</th>
                  <th>Bebas Smt</th>
                  <th>Tgl Daftar</th>
                  <th>Tgl Maju</th>
                  <th>Action</th>
              </tr>
          </thead>
      <tbody>
          <?php
          $start = 0;
          foreach ($proposal_maju_data as $proposal_maju)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $proposal_maju->nim ?></td>
                <td><?php echo $proposal_maju->judul ?></td>
                <td><?php echo $proposal_maju->kode_bayar ?></td>
                <td><?php echo $proposal_maju->bebas_pustaka ?></td>
                <td><?php echo $proposal_maju->bebas_smt ?></td>
                <td><?php echo $proposal_maju->tgl_daftar ?></td>
                <td><?php echo $proposal_maju->tgl_maju ?></td>
                <td style="text-align:center" width="200px">
                  <a href='<?php echo site_url('proposal_maju/read/'.$proposal_maju->id_proposal_maju) ?>'><i class='fa fa-eye'></i></a> |
                  <a href='<?php echo site_url('proposal_maju/update/'.$proposal_maju->id_proposal_maju) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                  <a href='<?php echo site_url('proposal_maju/delete/'.$proposal_maju->id_proposal_maju) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a> |
                  <a href="<?php echo site_url('proposal_maju/cetak_surat/'.$proposal_maju->id_proposal_maju) ?>" target="_blank"><i class='fa fa-gears'> Surat</i></a>
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
