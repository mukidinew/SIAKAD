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
            <?php echo anchor(site_url('login_mhs/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Kode Bayar</th>
                  <th>Level</th>
                  <th>Validasi</th>
                  <th>NIM</th>
                  <th>Periode</th>
                  <th>Action</th>
              </tr>
          </thead>
           <tbody>
          <?php
          $start = 0;
          foreach ($login_mhs_data as $login_mhs)
          {
              ?>
              <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $login_mhs->username ?></td>
                <td><?php echo $login_mhs->password ?></td>
                <td><?php echo $login_mhs->kode_bayar ?></td>
                <td><?php echo $login_mhs->level ?></td>
                <td><?php echo $login_mhs->val_periode ?></td>
                <td><?php echo $login_mhs->nim ?></td>
                <td><span class="label label-success"><?php echo  $login_mhs->ta ?></span></td>
                <td style="text-align:center" width="200px">
                  <a href="<?php echo site_url('login_mhs/delete/'.$login_mhs->id_user) ?>"><i class='fa fa-trash'> </i></a>
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
