<div class="row">
  <div class="col-md-10">
    <table class="table table-bordered table-striped" id="mytable">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Rak</th>
          <th>Nama Penerbit</th>
          <th>Nama Buku</th>
          <th>Tahun Terbit</th>
          <th>Penulis</th>
          <th>Kategori</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $start = 0;
      foreach ($buku_data as $buku)
      {
      ?>
      <tr>
        <td><?php echo ++$start ?></td>
        <td><?php echo $buku->nm_rak ?></td>
        <td><?php echo $buku->nm_penerbit ?></td>
        <td><?php echo $buku->nm_buku ?></td>
        <td><?php echo $buku->thn_terbit ?></td>
        <td><?php echo $buku->nm_penulis ?></td>
        <td><?php echo $buku->nm_kategori ?></td>
        <td style="text-align:center" width="200px">
        <?php
          echo anchor(site_url('buku/read/'.$buku->id_buku),'Read');
          echo ' | ';
          echo anchor(site_url('buku/update/'.$buku->id_buku),'Update');
          echo ' | ';
          echo anchor(site_url('buku/delete/'.$buku->id_buku),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
    <br>
    <div class="col-md-12">
      <?php echo anchor(site_url('buku/create'), 'Create', 'class="btn btn-primary btn-block"'); ?>
      <?php echo anchor(site_url('buku/excel'), 'Excel', 'class="btn btn-primary btn-block"'); ?>
    </div>
  </div>
</div>
