<section class="content-header">
  <h1>
	<i class='fa fa-book'></i> Jenis Pembayaran
	<small>SIAMI</small>
  </h1>
  <ol class="breadcrumb">
	<li class="active"><i class="fa fa-book"></i> Pembayaran</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12 col-lg-7">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Menu Jenis Pembayaran</h3> &nbsp;
					<?php if(!empty($src) && isset($src)){ ?>
					<small>Mencari data dengan kata kunci : <b><?php echo $src; ?></b></small>
					<?php } ?>
					<div class="box-tools">
						<div class="input-group">
							<a class='btn btn-flat btn-default btn-sm pull-right' href='<?php echo base_url("pembayaran/kelolabiaya.html"); ?>'><i class='fa fa-cog'></i> Kelola Pembiayaan</a>
							<a class='btn btn-flat btn-default btn-sm pull-right' href='<?php echo base_url("pembayaran/jenisbayar.html"); ?>'><i class='fa fa-plus'></i> Jenis Pembayaran</a>
						</div>
					</div>
				</div>
				<div class="box-body" style="overflow-x:auto;">
					<br />
					<?php
						if($akses){
							if(is_numeric($status)){
					?>
								<h6>
									<b>Catatan</b> : <i>Segala pembiayaan dibawah ini berlaku untuk angkatan <b><?php echo $status; ?></b>.</i>
								</h6>
					<?php
							}
							else{
					?>
								<h6>
									<b>Catatan</b> : <i>Segala pembiayaan dibawah ini berlaku untuk pembayaran yang bersifat periodik (dalam kurun waktu tertentu).</i>
								</h6>
					<?php
							}
					?>
					<table class="table table-condensed table-bordered table-responsive no-padding">
						<thead>
							<tr>
								<th class='text-center'>Kode Biaya</th>
								<th class='text-center'>Jenis Pembiayaan</th>
								<th class='text-center'>Nominal Pembayaran</th>
								<?php if($status == "periodik"){ ?>
								<th class='text-center'>Tanggal Aktif Pembayaran</th>
								<?php } ?>
								<th class='text-center'>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
								if($jmlvb > 0){
									foreach($datavb as $djb){
										echo "<tr>";
										echo "<td class='text-center'>".$djb->kode_biaya."</td>";
										echo "<td class='text-center'>".$djb->nama_jns_bayar."</td>";
										echo "<td class='text-center'>".number_format($djb->jml_biaya,0,",",".")."</td>";
										if($status == "periodik"){
											echo "<td class='text-center'>".$djb->tgl_aktif."</td>";
										}
										echo "<td class='text-center'>";
										echo "<a class='btn btn-xs btn-flat btn-danger' href='#' onclick='hapus(\"".base_url("pembayaran/hapusbiaya/".base64_encode($djb->kode_biaya))."\")'><i class='fa fa-trash'></i></a>";
										echo "</td>";
										echo "</tr>";
									}
								}
								else{
						?>
									<tr>
										<td colspan="6" style="text-align:center;">Data tersebut tidak ditemukan.</td>
									</tr>
						<?php
								}
						?>
						</tbody>
					</table>
					<?php
						}
						else{
					?>
							<h6>
								Silahkan pilih opsi status pembayaran (Angkatan/Periodik) pada menu yang tersedia.
							</h6>
					<?php
						}
					?>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-lg-5">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Jenis Pembayaran (Terdaftar)</h3>
						</div>
						<div class="box-body" style="height:200px;overflow-y:auto;">
							<table class="table table-condensed table-bordered table-hover table-responsive no-padding">
								<tbody>
							<?php
								if($jmljb > 0){
									foreach($datajb as $jb){
										echo "<tr>";
										echo "<td>".$jb->kode_jns_bayar."</td>";
										echo "<td>".$jb->nama_jns_bayar."</td>";
										echo "<td><span class='label ";
										if($jb->status == "A"){
											echo "label-primary'>Angkatan";
										}
										else if($jb->status == "P"){
											echo "label-success'>Periodik";
										}
										else{
											echo "label-default'>-";
										}
										echo "</span></td>";
										echo "<td class='text-center'>";
										echo "<a class='btn btn-flat btn-xs btn-warning' href='".base_url("pembayaran/e/".base64_encode($jb->kode_jns_bayar))."'><i class='fa fa-edit'></i></a>";
										echo "<a class='btn btn-flat btn-xs btn-danger' href='#' onclick='hapus(\"".base_url("pembayaran/h/".base64_encode($jb->kode_jns_bayar))."\")'><i class='fa fa-trash'></i></a>";
										echo "</td>";
										echo "</tr>";
									}
								}
								else{
									echo "<tr><td>Tidak ada data pembayaran.</td></tr>";
								}
							?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Status Pembayaran</h3>
						</div>
						<div class="box-body" style="height:170px;overflow-y:auto;">
							<table class="table table-condensed table-bordered table-hover table-responsive no-padding">
								<tbody>
									<?php
										echo "<tr><td>Jenis Pembayaran Periodik</td><td class='text-center'><a class='btn btn-flat btn-xs btn-danger' href='".base_url("pembayaran/d/periodik.html")."'><i class='fa fa-file-text'></i> Detail</a></td></tr>";
										for($i=date("Y"); $i>=2009; $i--){
											echo "<tr><td>Jenis Pembayaran Angkatan ".$i."</td><td class='text-center'><a class='btn btn-flat btn-xs btn-danger' href='".base_url("pembayaran/d/".$i.".html")."'><i class='fa fa-file-text'></i> Detail</a></td></tr>";
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
