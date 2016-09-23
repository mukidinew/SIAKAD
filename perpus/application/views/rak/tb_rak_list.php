<div class="row" style="margin-bottom: 10px">
  <div class="col-md-10">
    <table class="table table-bordered table-striped" id="mytable">
      <thead>
        <tr>
          <th width="80px">No</th>
          <th>Id Kategori</th>
          <th>Nama Rak</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $start = 0;
      foreach ($rak_data as $rak)
      {
      ?>
        <tr>
          <td><?php echo ++$start ?></td>
          <td><?php echo $rak->id_kategori ?></td>
          <td><?php echo $rak->nm_rak ?></td>
          <td style="text-align:center" width="200px">
          <?php
          echo anchor(site_url('rak/update/'.$rak->id_rak),'Update');
          echo ' | ';
          echo anchor(site_url('rak/delete/'.$rak->id_rak),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
          ?>
          </td>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-2">
    <div class="col-md-12 text-center">
      <div id="message">
        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <?php echo anchor(site_url('rak/create'), 'Create', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('rak/excel'), 'Excel', 'class="btn btn-primary btn-block"'); ?>
    </div>
  </div>
</div>
