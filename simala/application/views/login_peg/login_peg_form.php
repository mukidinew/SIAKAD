<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-12">
            <h3><?php echo $title_page; ?></h3>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
          <label for="varchar">Username <?php echo form_error('username') ?></label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Password <?php echo form_error('password') ?></label>
          <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Level <?php echo form_error('level') ?></label>
          <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" />
        </div>
        <input type="hidden" name="uid" value="<?php echo $uid; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('login_peg') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
