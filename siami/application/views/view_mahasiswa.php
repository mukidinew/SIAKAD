<section class="content-header">
  <h1>
	<i class="fa fa-group"></i> Data Keuangan Mahasiswa
	<small>SIAMI</small>
  </h1>
  <ol class="breadcrumb">
	<li class="active"><i class="fa fa-group"></i> Data Mahasiswa</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Tabel Mahasiswa</h3> &nbsp;
					<?php if(!empty($src) && isset($src)){ ?>
					<small>Mencari data dengan kata kunci : <b><?php echo $src; ?></b></small>
					<?php } ?>
					<div class="box-tools">
						<div class="input-group" style="width:250px">
							<input type="text" id="text-search-data" class="form-control input-sm pull-right" placeholder="Cari Berdasarkan NIM/Nama... (tanpa spasi)" onkeypress="return cari(event, this)">
						</div>
					</div>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered no-padding">
						<thead>
							<tr>
								<th>NIM</th>
								<th>Nama Mahasiswa</th>
								<th>Angkatan</th>
								<th>TTL</th>
								<th>Email</th>
								<th class='text-center'>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(!empty($src) && isset($src)){
									if($jml > 0){
										foreach($datamahasiswa as $dm){
											echo "<tr>";
											echo "<td>".$dm->nim."</td>";
											echo "<td>".$dm->nama."</td>";
											echo "<td>".$dm->angkatan."</td>";
											echo "<td>".$dm->tgl_lahir."</td>";
											echo "<td>".$dm->email."</td>";
											echo "<td class='text-center'><a href='".base_url("mahasiswa/d/".base64_encode($dm->nim))."' class='btn btn-xs btn-flat btn-danger'><i class='fa fa-user'></i> Detail</a></td>";
											echo "</tr>";
										}
									}
									else{
							?>
										<tr>
											<td colspan="5" style="text-align:center;">Data dengan kata kunci "<b><?php echo $src; ?></b>" tidak ditemukan.</td>
										</tr>
							<?php
									}
								}
								else{
							?>
									<tr>
										<td colspan="5" style="text-align:center;">Gunakan fitur pencarian mahasiswa untuk mencari data transaksi mahasiswa.</td>
									</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	function cari(e, obj){
	if(e.keyCode == 32){
		return false;
	}
	if(e.keyCode == 13 && obj.value != ""){
		if(obj.value.length < 3){
			swal({
				title:"Terjadi Kesalahan",
				text:"Maaf, masukkan minimal 3 digit karakter untuk pencarian.",
				type:"error",
				html:true
				});
			return false;
		}
		var x = document.URL.split(".html");
		window.location = "<?php echo base_url("mahasiswa/c"); ?>/"+obj.value;
	}
}
</script>
