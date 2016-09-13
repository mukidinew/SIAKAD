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
            <!-- <?php echo anchor(site_url('kurikulum/create'), 'Create', 'class="btn btn-primary"'); ?> -->
            <?php echo anchor(site_url('kurikulum/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            <!-- <?php echo anchor(site_url('kurikulum/word'), 'Word', 'class="btn btn-primary"'); ?> -->
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Nm Kurikulum</th>
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
                <td style="text-align:center" width="200px">
                  <a href='<?php echo site_url('kurikulum/read/'.$kurikulum->id_kurikulum) ?>'><i class='fa fa-eye'></i></a> |
                  <!-- <a href='<?php echo site_url('kurikulum/update/'.$kurikulum->id_kurikulum) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                  <a href='<?php echo site_url('kurikulum/delete/'.$kurikulum->id_kurikulum) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a> | -->
                  <a href="<?php echo site_url('kurikulum/cek_matkul/'.$kurikulum->id_kurikulum) ?>"><i class='fa fa-gears'> Proses</i></a>
                </td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <h3>Duplikasi Mata Kuliah Kurikulum</h3><hr>
      <form action="<?php echo site_url('kurikulum/duplikasi_matkul') ?>" method="post" id="duplikasi_mk_kur">
        <div class="col-md-6">
          <div class="form-group">
            <label for="varchar">Kurikulum Asal</label>
            <select type="text" class="form-control select2" name="id_kurikulum" id="id_kurikulum"></select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="int">Kurikulum Tujuan</label>
            <select type="text" class="form-control select2" name="id_kurikulum_t" id="id_kurikulum_t"></select>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-block" name="copy">Copy Mata Kuliah</button>
        </div>
       </form>
    </div>
    <div class="col-md-6">
      <h3>Panduan Pengisian</h3><hr>

    </div>
  </div>
</div>
