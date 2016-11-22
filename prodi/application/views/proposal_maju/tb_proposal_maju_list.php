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
        <!-- <?php echo anchor(site_url('proposal_maju/create'), 'Create', 'class="btn btn-primary"'); ?> -->
        <?php echo anchor(site_url('proposal_maju/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Judul</th>
                  <!-- <th>Kode Bayar</th> -->
                  <!-- <th>Pustaka</th>
                  <th>Semester</th> -->
                  <th>Tgl Daftar</th>
                  <th>Tgl Maju</th>
                  <th>Penguji</th>
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
                <td>
                  <?php if ($proposal_maju->valid_prodi=='N'): ?>
                    <?php echo $proposal_maju->nim ?> <span class="label label-danger"><i class="fa fa-hourglass-start" aria-hidden="true"></i></span>
                  <?php else: ?>
                    <?php echo $proposal_maju->nim ?> <span class="label label-success"><i class="fa fa-check-square-o" aria-hidden="true"></i></span>
                  <?php endif; ?>

                </td>
                <td><?php echo $proposal_maju->judul ?></td>
                <!-- <td><?php echo $proposal_maju->kode_bayar ?></td> -->
                <!-- <td><?php echo $proposal_maju->bebas_pustaka ?></td>
                <td><?php echo $proposal_maju->bebas_smt ?></td> -->
                <td><?php echo $proposal_maju->tgl_daftar ?></td>
                <td><?php echo $proposal_maju->tgl_maju ?></td>
                <td align="center">
                  <?php if ($proposal_maju->valid_prodi=='N'): ?>
                    <i class='fa fa-gears'> Penguji</i>
                  <?php else: ?>
                    <a href="<?php echo site_url('dosen_penguji/get_penguji/'.$proposal_maju->id_proposal_maju.'/'.$proposal_maju->nim.'/'.$proposal_maju->nidn_pembimbing_1.'/'.$proposal_maju->nidn_pembimbing_2) ?>" target="_blank"><i class='fa fa-gears'> Penguji</i></a>
                  <?php endif; ?>
                </td>
                <td style="text-align:center" width="200px">
                  <a href='<?php echo site_url('proposal_maju/read/'.$proposal_maju->id_proposal_maju) ?>'><i class='fa fa-eye'></i></a> |
                  <a href='<?php echo site_url('proposal_maju/update/'.$proposal_maju->id_proposal_maju) ?>'><i class='fa fa-pencil-square-o'></i> Validasi</a>
                  <!-- <a href='<?php echo site_url('proposal_maju/delete/'.$proposal_maju->id_proposal_maju) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a> | -->
                  <?php if ($proposal_maju->valid_prodi == 'N'): ?>
                  | <i class='fa fa-gears'> SK</i>
                  <?php else: ?>
                  | <a href="<?php echo site_url('proposal_maju/cetak_surat/'.$proposal_maju->id_proposal_maju) ?>" target="_blank"><i class='fa fa-gears'> SK</i></a>
                  <?php endif; ?>
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
