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

        </div>
    </div>
  </div>
  <div class="row">
      <div class="col-md-4">
        <b>Duplikasi Mata Kuliah Kurikulum</b><hr>
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
            <label for="int"></label>
            <button type="submit" class="btn btn-danger btn-block" name="copy">Duplikasi Mata Kuliah</button>
          </div>
        </form>
      </div>
      <div class="col-md-4">
        <b>Cetak Mata Kuliah Berdasarkan Kurikulum</b><hr>
        <form action="<?php echo site_url('kurikulum/cetak_matkul') ?>" method="post" id="duplikasi_mk_kur">
          <div class="col-md-12">
            <div class="form-group">
              <label for="varchar">Kurikulum</label>
              <select type="text" class="form-control select2" name="id_kurikulum_cetak" id="id_kurikulum_cetak"></select>
            </div>
          </div>
          <div class="form-group">
            <label for="int"></label>
            <button type="submit" class="btn btn-success btn-block" name="btn_cetak">Cetak Mata Kuliah</button>
          </div>
        </form>
      </div>
      <div class="col-md-4">
        <b>Panduan Pengisian</b><hr>

      </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-10">
      <b>Data Kurikulum</b><hr>
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
                  <a href='<?php echo site_url('kurikulum/update/'.$kurikulum->id_kurikulum) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                  <a href='<?php echo site_url('kurikulum/delete/'.$kurikulum->id_kurikulum) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a> |
                  <a href="<?php echo site_url('kurikulum/cek_matkul/'.$kurikulum->id_kurikulum) ?>"><i class='fa fa-gears'> Proses</i></a>
                </td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
    <div class="col-md-2">
      <b>Menu</b><hr>
      <?php echo anchor(site_url('kurikulum/create'), 'Buat Kurikulum', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('kurikulum/excel'), 'Import XL', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('kurikulum/word'), 'Import Word', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('mata_kuliah'), 'Mata Kuliah', 'class="btn btn-primary btn-block"'); ?>
    </div>
  </div>
</div>
