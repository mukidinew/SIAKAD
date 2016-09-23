<div class="row" style="margin-bottom: 10px">
  <div class="col-md-10">
    <table class="table table-bordered table-striped" id="mytable">
      <thead>
      <tr>
        <th width="80px">No</th>
        <th>Kategori</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php
      $start = 0;
      foreach ($kategori_data as $kategori)
      {
      ?>
        <tr>
          <td><?php echo ++$start ?></td>
          <td><?php echo $kategori->nm_kategori ?></td>
          <td style="text-align:center" width="200px">
          <?php
          echo anchor(site_url('kategori/update/'.$kategori->id_kategori),'Update');
          echo ' | ';
          echo anchor(site_url('kategori/delete/'.$kategori->id_kategori),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
      <div class="well">
        <div id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <?php echo anchor(site_url('kategori/create'), 'Create', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('kategori/excel'), 'Excel', 'class="btn btn-primary btn-block"'); ?>
    </div>
  </div>
</div>
