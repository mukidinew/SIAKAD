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
    <div class="col-md-10">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jen Kel</th>
                  <th>Tmp Lahir</th>
                  <th>Tgl Lahir</th>
                  <th>Agama</th>
                  <th>Jabatan</th>
                  <th>Alamat</th>
                  <th>No Hp</th>
                  <th>Email</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($kariawan_data as $kariawan)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kariawan->nik ?></td>
                <td><?php echo $kariawan->nama ?></td>
                <td><?php echo $kariawan->jen_kel ?></td>
                <td><?php echo $kariawan->tmp_lahir ?></td>
                <td><?php echo $kariawan->tgl_lahir ?></td>
                <td><?php echo $kariawan->agama ?></td>
                <td><?php echo $kariawan->jabatan ?></td>
                <td><?php echo $kariawan->alamat ?></td>
                <td><?php echo $kariawan->no_hp ?></td>
                <td><?php echo $kariawan->email ?></td>
                <td style="text-align:center" width="100px">
                  <a href='<?php echo site_url('kariawan/read/'.$kariawan->nik) ?>'><i class='fa fa-eye'></i></a> |
                  <a href='<?php echo site_url('kariawan/update/'.$kariawan->nik) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                  <a href='<?php echo site_url('kariawan/delete/'.$kariawan->nik) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a>
                </td>
               </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
    <div class="col-md-2">
      <?php echo anchor(site_url('kariawan/create'), 'Create', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('kariawan/excel'), 'Excel', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('kariawan/word'), 'Word', 'class="btn btn-primary btn-block"'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

    </div>
  </div>
</div>
