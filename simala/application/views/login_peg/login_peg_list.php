<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
      <div class="col-md-4">
        <h3><?php echo $title_page ?></h3>
      </div>
      <div class="col-md-4">
          <div style=""  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          </div>
      </div>
      <div class="col-md-4 text-right">
        <?php echo anchor(site_url('login_peg/create'), 'Create', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <table class="table table-bordered table-striped" id="mytable">
      <thead>
        <tr>
          <th width="80px">No</th>
          <th>Username</th>
          <th>Password</th>
          <th>Level</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $start = 0;
        foreach ($login_peg_data as $login_peg)
        {
        ?>
        <tr>
          <td><?php echo ++$start ?></td>
          <td><?php echo $login_peg->username ?></td>
          <td><?php echo $login_peg->password ?></td>
          <td><?php echo $login_peg->level ?></td>
          <td style="text-align:center" width="200px">
          <?php
          echo anchor(site_url('login_peg/read/'.$login_peg->uid),'Read');
          echo ' | ';
          echo anchor(site_url('login_peg/update/'.$login_peg->uid),'Update');
          echo ' | ';
          echo anchor(site_url('login_peg/delete/'.$login_peg->uid),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
