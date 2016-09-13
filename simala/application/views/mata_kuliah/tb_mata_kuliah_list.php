<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-6">
            <h3><?php echo $title_page; ?> (Mata_kuliah salah hapus karena url terspasi)</h3>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-2 text-right">

        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>Sks</th>
                  <th>Semester</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($mata_kuliah_data as $mata_kuliah)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $mata_kuliah->kode_mk ?></td>
                <td><?php echo $mata_kuliah->nm_mk ?></td>
                <td><?php echo $mata_kuliah->sks ?></td>
                <td><?php echo $mata_kuliah->semester ?></td>
                <td style="text-align:center" width="100px">
                  <a href='<?php echo site_url('mata_kuliah/read/'.$mata_kuliah->kode_mk) ?>'><i class='fa fa-eye'></i></a> |
                  <a href='<?php echo site_url('mata_kuliah/update/'.$mata_kuliah->kode_mk) ?>'><i class='fa fa-pencil-square-o'></i></a> |
                  <a href='<?php echo site_url('mata_kuliah/delete/'.$mata_kuliah->kode_mk) ?>' onclick='javasciprt: return confirm("Are You Sure ?")'><i class='fa fa-trash-o'></i></a>
                </td>
              </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
    <div class="col-md-2">
      <?php echo anchor(site_url('mata_kuliah/create'), 'Create', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('mata_kuliah/excel'), 'Excel', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('mata_kuliah/word'), 'Word', 'class="btn btn-primary btn-block"'); ?>
    </div>
  </div>
</div>
