<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $title_page ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
          <label for="varchar">ID Agama <?php echo form_error('id_agama') ?></label>
          <input type="text" class="form-control" id="id_agama" name="id_agama" value="<?php echo $id_agama; ?>" />
        </div>
  	    <div class="form-group">
          <label for="varchar">Agama <?php echo form_error('agama') ?></label>
          <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
        </div>
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('agama') ?>" class="btn btn-default">Cancel</a>
    	</form>
    </div>
  </div>
</div>
