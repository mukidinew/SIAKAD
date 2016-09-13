<section class="content-header">
  <h1>
	<i class="fa fa-user"></i> Detail Data Mahasiswa
	<small>SIAMI</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo base_url('mahasiswa'); ?>"><i class="fa fa-group"></i> Data Mahasiswa</a></li>
	<li class="active"></i> Detail Mahasiswa</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12 col-lg-4">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Detail Mahasiswa</h3>
				</div>
				<div class="box-body">
					<table class="table table-hover table-responsive no-padding">
						<tbody>
							<?php
								if(!empty($nim) && isset($nim)){
									if($jml > 0){
										foreach($datamahasiswa as $dm){
											echo "<tr>";
											echo "<td><i class='fa fa-file-text'></i></td>";
											echo "<td><small>".$dm->nim."</small></td>";
											echo "</tr>";
											echo "<tr>";
											echo "<td><i class='fa fa-user'></i></td>";
											echo "<td><small>".$dm->nama."</small></td>";
											echo "</tr>";
											echo "<tr>";
											echo "<td><i class='fa fa-file'></i></td>";
											echo "<td><small>".$dm->angkatan."</small></td>";
											echo "</tr>";
											echo "<tr>";
											if($dm->jenis_kelamin == "L"){
												echo "<td><i class='fa fa-mars'></i></td>";
												echo "<td><small>Pria</small></td>";
											}
											else{
												echo "<td><i class='fa fa-venus'></i></td>";
												echo "<td><small>Wanita</small></td>";
											}
											echo "</tr>";
											echo "<tr>";
											echo "<td><i class='fa fa-envelope'></i></td>";
											echo "<td><small>".$dm->email."</small></td>";
											echo "</tr>";
											echo "<tr>";
											echo "<td><i class='fa fa-phone'></i></td>";
											echo "<td><small>".$dm->no_telp."</small></td>";
											echo "</tr>";
										}
									}
									else{
							?>
										<tr>
											<td class="text-center"><small>Tidak ada detail data</small></td>
										</tr>
							<?php
									}
								}
								else{
							?>
									<tr>
										<td colspan="5" class="text-center"><small>Tidak ada detail data</small></td>
									</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-lg-8">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">History Transaksi</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover no-padding">
						<thead>
							<tr>
								<th class="text-center">Aksi</th>
								<th class="text-center">Kode Bayar</th>
								<th class="text-center">Waktu Bayar</th>
								<th class="text-center">Jenis Pembayaran</th>
								<th class="text-center">Besar Biaya</th>
								<th class="text-center">Jml. Bayar</th>
                <th class="text-center">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if($jmltransaksi > 0){
									foreach($datatransaksi as $dtr){
										echo "<tr>";
										echo "<td class='text-center'>
                      <a class='btn btn-xs btn-flat btn-danger' href='#' onclick='hapus(\"".base_url("transaksi/hapus/".$dtr->kode_bayar)."/".$dtr->nim."\")'><i class='fa fa-trash'></i></a>
                      </td>";
										echo "<td class='text-center'><span class='label label-success'>".substr($dtr->kode_bayar,0,5)."...</span></td>";
										echo "<td class='text-center'><span class='label label-default'>".$dtr->tglbyr."</span></td>";
										echo "<td><small>".$dtr->nama_jns_bayar."</small>";
										if(preg_match('/Semester/', $dtr->nama_jns_bayar)){
											echo "<br><span class='label label-danger'>".$dtr->keterangan."</span>";
										}
										echo "</td>";
										echo "<td><span class='label label-primary'>Rp. ".number_format($dtr->jml_biaya,0,",",".")."</span></td>";
										echo "<td><span class='label label-warning'>Rp. ".number_format($dtr->jumlah_bayar,0,",",".")."</span></td>";
										echo "<td>";
										echo "<span class='label label-default'><i class='fa fa-book'></i> ".$dtr->statusbayar." | </span>";
										if($dtr->statusbayar == "Belum Lunas (Angsuran)"){
											echo "<br><br><a class='btn btn-flat btn-xs btn-warning' href='".base_url("transaksi/bayarangsuran/".$dtr->kode_bayar)."'>Bayar Angsuran</a>";
										}
                    else {
                      echo "<a class='btn btn-flat btn-xs btn-flat btn-success' href='".site_url('transaksi/cetak_transaksi/'.$dtr->kode_bayar)."'><i class='fa fa-pencil-square-o'></i> Cetak Laporan</a>";
                    }
										echo "</td>";
										echo "</tr>";
									}
								}
								else{
							?>
								<tr>
									<td colspan="6" class="text-center">Belum ada data history pembayaran.</td>
								</tr>
							<?php
								}
							?>
						</tbody>
					</table>
					<?php
						if($jmltransaksi > 0){
					?>
					<small style='color:red;'>
						Klik baris untuk melihat detail data pembayaran.
					</small>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
