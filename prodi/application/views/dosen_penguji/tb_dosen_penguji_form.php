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
        <div class="col-md-6">
          <b>Ketua Penguji</b><hr>
          <div class="form-group">
              <label for="varchar">Id Dosen <?php echo form_error('id_dosen') ?></label>
              <input type="text" class="form-control" name="id_dosen_ketua" id="id_dosen_ketua" placeholder="Id Dosen" value="<?php echo $id_dosen_ketua; ?>" />
          </div>
          <div class="form-group">
              <label for="enum">Jabatan Penguji</label>
              <input type="text" class="form-control" name="jabatan_penguji_ketua" id="jabatan_penguji_ketua" placeholder="Jabatan Penguji" value="1" readonly/>
          </div>
        </div>
        <div class="col-md-6">
          <b>Sekretaris Penguji</b><hr>
          <div class="form-group">
              <label for="varchar">Id Dosen <?php echo form_error('id_dosen') ?></label>
              <input type="text" class="form-control" name="id_dosen_sek" id="id_dosen_sek" placeholder="Id Dosen" value="<?php echo $id_dosen_sek; ?>" />
          </div>
          <div class="form-group">
              <label for="enum">Jabatan Penguji </label>
              <input type="text" class="form-control" name="jabatan_penguji_sek" id="jabatan_penguji_sek" placeholder="Jabatan Penguji" value="2" readonly/>
          </div>
        </div>
        <div class="col-md-12">
          <br><hr>
        </div>
        <div class="col-md-6">
          <b>Penguji Pertama</b><hr>
          <div class="form-group">
              <label for="varchar">Id Dosen <?php echo form_error('id_dosen') ?></label>
              <input type="text" class="form-control" name="id_dosen_1" id="id_dosen_1" placeholder="Id Dosen" value="<?php echo $id_dosen_1; ?>" />
          </div>
          <div class="form-group">
              <label for="enum">Jabatan Penguji <?php echo form_error('jabatan_penguji') ?></label>
              <input type="text" class="form-control" name="jabatan_penguji_1" id="jabatan_penguji_1" placeholder="Jabatan Penguji" value="3" readonly/>
          </div>
        </div>
        <div class="col-md-6">
          <b>Penguji Kedua</b><hr>
          <div class="form-group">
              <label for="varchar">Id Dosen <?php echo form_error('id_dosen') ?></label>
              <input type="text" class="form-control" name="id_dosen_2" id="id_dosen_2" placeholder="Id Dosen" value="<?php echo $id_dosen_2; ?>" />
          </div>
          <div class="form-group">
              <label for="enum">Jabatan Penguji</label>
              <input type="text" class="form-control" name="jabatan_penguji_2" id="jabatan_penguji_2" placeholder="Jabatan Penguji" value="4" readonly/>
          </div>
        </div>
        <div class="col-md-12">
          <input type="hidden" name="id_dosen_penguji" value="<?php echo $id_dosen_penguji; ?>" />
          <input type="hidden" class="form-control" name="id_proposal_maju" id="id_proposal_maju" value="<?php echo $id_proposal_maju; ?>" />
          <input type="hidden" class="form-control" name="nim" id="nim" value="<?php echo $nim; ?>" />
          <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button>
          <a href="<?php echo site_url('dosen_penguji') ?>" class="btn btn-default">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
