<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-6">
        <h3><?php echo $title_page; ?></h3>
      </div>
      <div class="col-md-6 text-center">
          <div style="margin-top: 4px"  id="message">
              <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          </div>
      </div>
      <!-- <div class="col-md-4 text-right">
          <?php echo anchor(site_url('dosen_penguji/create'), 'Create', 'class="btn btn-primary"'); ?>
          <?php echo anchor(site_url('dosen_penguji/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div> -->
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
        <thead>
          <tr>
            <th width="80px">No</th>
            <th>Nama Dosen</th>
            <th>Jabatan Penguji</th>
            <th>Action</th>
          </tr>
        </thead>
      <tbody>
        <?php
        $start = 0;
        foreach ($dosen_penguji_data as $dosen_penguji)
        {
        ?>
        <tr>
          <td><?php echo ++$start ?></td>
          <td><?php echo $dosen_penguji->penguji ?></td>
          <td><?php echo $dosen_penguji->jabatan_penguji ?></td>
          <td style="text-align:center" width="200px">
          <?php
          echo anchor(site_url('dosen_penguji/read/'.$dosen_penguji->id_dosen_penguji),'Read');
          echo ' | ';
          echo anchor(site_url('dosen_penguji/update/'.$dosen_penguji->id_dosen_penguji),'Update');
          echo ' | ';
          echo anchor(site_url('dosen_penguji/delete/'.$dosen_penguji->id_dosen_penguji),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
          ?>
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
