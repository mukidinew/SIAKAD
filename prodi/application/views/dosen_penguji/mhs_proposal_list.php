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
      <table class="table table-bordered table-striped" id="mytable">
        <thead>
          <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Mahasiswa</th>
            <th>Judul</th>
            <th>Tanggal Daftar</th>
            <th>Pembimbing 1</th>
            <th>Pembimbing 2</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php foreach ($mhs_proposal as $key): ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $key->id_mhs ?></td>
            <td><?php echo $key->nm_mhs ?></td>
            <td><?php echo $key->judul ?></td>
            <td><?php echo $key->tgl_daftar ?></td>
            <td><?php echo $key->pembimbing_1 ?></td>
            <td><?php echo $key->pembimbing_2 ?></td>
            <td style="text-align:center">
              <a href="<?php echo site_url('dosen_penguji/get_penguji/'.$key->id_proposal_maju.'/'.$key->id_mhs) ?>"><i class='fa fa-gears'> Proses</i></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
