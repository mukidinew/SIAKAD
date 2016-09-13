<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page; ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form action="<?php echo $action; ?>" method="post">
        <input type="hidden" class="form-control" name="id_sett" value="<?php echo $id_sett; ?>" />
        <div class="form-group">
          <label for="varchar">Kode PT <?php echo form_error('kode_feed') ?></label>
          <input type="text" class="form-control" name="kode_feed" id="kode_feed" placeholder="Kode Feed" value="<?php echo $kode_feed; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Password PT <?php echo form_error('pass_feed') ?></label>
          <input type="password" class="form-control" name="pass_feed" id="pass_feed" placeholder="Pass Feed" value="<?php echo $pass_feed; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Role <?php echo form_error('role') ?></label>
          <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Url Ws <?php echo form_error('url_ws') ?></label>
          <input type="text" class="form-control" name="url_ws" id="url_ws" placeholder="Url Ws" value="<?php echo $url_ws; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Mode <?php echo form_error('mode') ?></label>
          <input type="text" class="form-control" name="mode" id="mode" placeholder="Mode" value="<?php echo $mode; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Link <?php echo form_error('link') ?></label>
          <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" />
        </div>

        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('setting') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
