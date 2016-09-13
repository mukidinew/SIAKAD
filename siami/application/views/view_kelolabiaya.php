<section class="content-header">
  <h1>
	<i class='fa fa-cog'></i> Kelola Pembiayaan
	<small>SIAMI</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href='<?php echo base_url('pembayaran.html'); ?>'><i class="fa fa-book"></i> Pembayaran</a></li>
	<li class="active"><i class="fa fa-cog"></i> Kelola Pembiayaan</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Formulir Kelola Pembayaran</h3>
				</div>
				<div class="box-body">
					<form method="post" action="<?php echo base_url("pembayaran/kelola.html"); ?>">
						<h4>Kode Pembiayaan</h4>
						<div class="input-group">
							<span class="input-group-addon">BY</span>
							<input type="text" name="kodeby" class="form-control" placeholder="3 Digit Angka, ex : 001" maxlength="3" required="required">
						</div>
						<br>
						<h4>Pilih Pembiayaan</h4>
						<div class="input-group">
							<span class="input-group-addon"><i class='fa fa-cog'></i></span>
							<select id="kodeby" class="form-control" required="required">
								<option value="">-- Pilih Pembiayaan --</option>
								<option value="A">Angkatan</option>
								<option value="P">Periodik</option>
							</select>
						</div>
						<br>
						<h4>Nama Jenis Pembayaran</h4>
						<div class="input-group">
							<span class="input-group-addon"><i class='fa fa-money'></i></span>
							<select name="jnsbyr" id="jnsbyr" class="form-control" required="required">
								<option>-- Pilih Pembiayaan Terlebih Dahulu --</option>
							</select>
						</div>
						<br>
						<h4>Tahun Angkatan</h4>
						<div class="input-group">
							<span class="input-group-addon"><i class='fa fa-group'></i></span>
							<select name="angkatan" id="angkatan" class="form-control">
								<option value="">--Pilih Angkatan--</option>
							</select>
						</div>
						<br>
						<h4>Tanggal Aktif</h4>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<input type="text" name="tglaktif" id="tglaktif" class="form-control" placeholder="dd-mm-yyyy">
						</div>
						<br>
						<h4>Nominal Biaya</h4>
						<div class="input-group">
							<span class="input-group-addon">Rp.</span>
							<input type="number" name="nomby" class="form-control" placeholder="ex : 1500000" required="required">
						</div>
						<br />
						<small style="color:red">*(Silahkan mencentang opsi dibawah ini untuk mengaktifkan tombol simpan data.)</small>
						<table class="table table-bordered table-hover">
							<tr>
								<td>
									<input type="checkbox" id="cek">
								</td>
								<td>
									Anda setuju untuk menambahkan data pembiayaan yang baru, pastikan anda memasukkan data yang benar. Catatan: Anda sama sekali tidak dapat mengubah kembali data pembiayaan yang telah anda simpan termasuk nominal pembiayaan dan lain-lain.
								</td>
							</tr>
						</table>
					</div>
					<div class="box-footer">
						<button type="submit" id="kirim" class="btn btn-danger pull-right" disabled="disabled"><i class="fa fa-cog"></i> Proses</button>
						<a href="<?php echo base_url("pembayaran.html"); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">

	$("#kodeby").on("change", function(){
		switch($(this).val()){
			case "A":
				$("#tglaktif").val("");
				$("#angkatan").val("");
				$("#tglaktif").attr("disabled", "disabled");
				$("#angkatan").attr("required", "required");
				$("#angkatan").removeAttr("disabled");
				$("#tglaktif").removeAttr("required");
			break;
			case "P":
				$("#tglaktif").val("");
				$("#angkatan").val("");
				$("#tglaktif").removeAttr("disabled");
				$("#angkatan").removeAttr("required");
				$("#angkatan").attr("disabled", "disabled");
				$("#tglaktif").attr("required", "required");
			break;
			default:
				$("#tglaktif").val("");
				$("#angkatan").val("");
				$("#tglaktif").removeAttr("disabled");
				$("#angkatan").removeAttr("disabled");
				$("#tglaktif").removeAttr("required");
				$("#angkatan").removeAttr("required");
		}
		$.post("<?php echo base_url('webservice/getoptjb.html'); ?>",{id:$(this).val()}).done(function(data){
			$("#jnsbyr").html(data);
		});
	});
	$("#jnsbyr").on("change", function(){
		switch($("#kodeby").val()){
			case "A":
			case "P":
				$.post("<?php echo base_url('webservice/getangkatan.html'); ?>",{id:$(this).val()}).done(function(data){
					$("#angkatan").html(data);
				});
			break;
			default:
		}
	});
	$("#cek").on("change", function(){
		if($("#cek").is(":checked")){
			$("#kirim").prop("disabled", false);
		}
		else{
			$("#kirim").prop("disabled", true);
		}
	});
</script>
