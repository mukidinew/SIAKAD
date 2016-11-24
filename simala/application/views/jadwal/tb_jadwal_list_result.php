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
          
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h3>Raw Data Jadwal</h3><hr>
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
                  <th>Hari</th>
                  <th>Jam</th>
                  <th>Kode MK</th>
                  <th>Nama MK</th>
                  <th>SKS</th>
                  <th>KELAS</th>
                  <th>Dosen Penanggung Jawab</th>
                  <th>Ruangan</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php
          $start = 0;
          foreach ($jadwal_data as $jadwal)
          {
              ?>
              <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo $jadwal->nm_hari ?></td>
                  <td><?php echo $jadwal->nm_jam ?></td>
                  <td><?php echo $jadwal->kode_mk ?></td>
                  <td><?php echo $jadwal->nm_mk ?></td>
                  <td><?php echo $jadwal->sks ?></td>
                  <td><?php echo $jadwal->nm_kelas ?></td>
                  <td><?php echo $jadwal->nm_dosen ?></td>
                  <td><?php echo $jadwal->nm_ruangan ?></td>
                  <td style="text-align:center" width="200px">
                    <?php
                    echo anchor(site_url('jadwal/read/'.$jadwal->id_jadwal),'Read');
                    echo ' | ';
                    echo anchor(site_url('jadwal/update/'.$jadwal->id_jadwal),'Update');
                    echo ' | ';
                    echo anchor(site_url('jadwal/delete/'.$jadwal->id_jadwal),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
