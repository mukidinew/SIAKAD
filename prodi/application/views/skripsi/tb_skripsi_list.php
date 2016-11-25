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
        <!-- <?php echo anchor(site_url('skripsi/create'), 'Create', 'class="btn btn-primary"'); ?> -->
        <?php echo anchor(site_url('skripsi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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
                  <th>Nama Mahasiswa</th>
                  <th>Judul Skripsi</th>
                  <th>Proposal</th>
                  <th>Tgl Daftar</th>
                  <th>Tgl Maju</th>
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
                  <td>
                    <?php if ($skripsi->valid_prodi=='N'): ?>
                      <?php echo $skripsi->nim ?> <span class="label label-danger"><i class="fa fa-hourglass-start" aria-hidden="true"></i></span>
                    <?php else: ?>
                      <?php echo $skripsi->nim ?> <span class="label label-success"><i class="fa fa-check-square-o" aria-hidden="true"></i></span>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $skripsi->nm_mhs ?></td>
                  <td><?php echo $skripsi->judul ?></td>
                  <td><?php echo $skripsi->bebas_proposal ?></td>
                  <td><?php echo $skripsi->tgl_daftar ?></td>
                  <td><?php echo $skripsi->tgl_maju ?></td>
                  <td style="text-align:center">
                    <a href="<?php echo site_url('skripsi/update/'.$skripsi->id_skripsi) ?>"><i class='fa fa-pencil-square-o'></i> Validasi</a>
                    <!-- <a href="<?php echo site_url('skripsi/delete/'.$skripsi->id_skripsi) ?>" onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a> | -->

                    <?php if ($skripsi->valid_prodi == 'N'): ?>
                    | <i class='fa fa-gears'> SK</i>
                    <?php else: ?>
                    | <a href="<?php echo site_url('skripsi/cetak_surat/'.$skripsi->id_skripsi) ?>" target="_blank"><i class='fa fa-gears'> SK</i></a>
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
