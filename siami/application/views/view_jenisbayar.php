<section class="content-header">
  <h1>
	<i class='fa fa-plus'></i> Jenis Pembayaran
	<small>SIAMI</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href='<?php echo base_url('pembayaran.html'); ?>'><i class="fa fa-book"></i> Pembayaran</a></li>
	<li class="active"><i class="fa fa-plus"></i> Jenis Pembayaran</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-danger">
				<form method="post" action="<?php echo base_url("pembayaran/simpan.html"); ?>">
					<div class="box-header with-border">
						<h3 class="box-title">Formulir Tambah Jenis Pembayaran</h3>
					</div>
					<div class="box-body">
						<h4>Kode Jenis Pembayaran</h4>
						<div class="input-group">
							<span class="input-group-addon">JB</span>
							<input type="text" name="kodejb" class="form-control" placeholder="3 Digit Angka, ex : 001" maxlength="3" required="required">
						</div>
						<br>
						<h4>Nama Jenis Pembayaran</h4>
						<div class="input-group">
							<span class="input-group-addon"><i class='fa fa-money'></i></span>
							<input type="text" name="namajb" class="form-control" placeholder="Nama Jenis Bayar..." required="required">
						</div>
						<small style="color:red">* Tambahkan frase kata "Semester" pada nama jenis bayar jika data tersebut adalah pembayaran berdasarkan semester.</small>
						<br>
						<h4>Status Jenis Pembayaran</h4>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="radio" name="statusjb" value="A" checked="checked">
							</span>
							<input type="text" class="form-control" value="Angkatan" disabled="disabled">
						</div>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="radio" name="statusjb" value="P">
							</span>
							<input type="text" class="form-control" value="Periodik" disabled="disabled">
						</div>
						<small style="color:red">* Pilihlah status jenis bayar yang sesuai dengan jenis pembayaran: <br />- Untuk tarif flat berdasarkan angkatan pilih opsi "Angkatan". <br />- Untuk pembayaran dengan tarif berdasarkan tanggal aktif pembayaran pilih opsi "Periodik".</small>
						<br />
						<hr>
						<small style="color:red">*(Silahkan mencentang opsi dibawah ini untuk mengaktifkan tombol simpan data.)</small>
						<table class="table table-bordered table-hover">
							<tr>
								<td>
									<input type="checkbox" id="cek">
								</td>
								<td>
									Anda setuju untuk menambahkan data jenis bayar yang baru, pastikan anda memasukkan data yang benar. Catatan: Kode jenis bayar dan status jenis bayar tidak dapat diubah lagi pada proses-proses selanjutnya.
								</td>
							</tr>
						</table>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-danger pull-right" disabled="disabled" id="kirim"><i class="fa fa-save"></i> Simpan</button>
						<a href="<?php echo base_url("pembayaran.html"); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$("#cek").on("change", function(){
		if($("#cek").is(":checked")){
			$("#kirim").prop("disabled", false);
		}
		else{
			$("#kirim").prop("disabled", true);
		}
	});
</script>
