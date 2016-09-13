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
        <div class="form-group">
          <label for="varchar">Id Mhs <?php echo form_error('id_mhs') ?></label>
          <input type="text" class="form-control" name="id_mhs" id="id_mhs" placeholder="Id Mhs" value="<?php echo $id_mhs; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Kode Pembayaran <?php echo form_error('kode_pembayaran') ?></label>
          <input type="text" class="form-control" name="kode_pembayaran" id="kode_pembayaran" placeholder="Kode Pembayaran" value="<?php echo $kode_pembayaran; ?>" />
        </div>
        <div class="form-group">
          <label for="int">Id Kurikulum <?php echo form_error('id_kurikulum') ?></label>
          <input type="text" class="form-control" name="id_kurikulum" id="id_kurikulum" placeholder="Id Kurikulum" value="<?php echo $id_kurikulum; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Status Ambil <?php echo form_error('status_ambil') ?></label>
          <input type="text" class="form-control" name="status_ambil" id="status_ambil" placeholder="Status Ambil" value="<?php echo $status_ambil; ?>" />
        </div>
        <div class="form-group">
          <label for="enum">Status Cek <?php echo form_error('status_cek') ?></label>
          <input type="text" class="form-control" name="status_cek" id="status_cek" placeholder="Status Cek" value="<?php echo $status_cek; ?>" />
        </div>
        <input type="hidden" name="id_krs" value="<?php echo $id_krs; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('mhs_krs') ?>" class="btn btn-default">Cancel</a>
       </form>
    </div>
  </div>
</div>
