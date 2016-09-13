<?php
	$data = $dt[0];
	$sisa = $data->jml_biaya - $data->jumlah_bayar;
?>
<section class="content-header">
  <h1>
	<i class='fa fa-cog'></i> Pembayaran Angsuran
	<small>SIAMI</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href='#'><i class="fa fa-book"></i> Angsuran</a></li>
	<li class="active"><i class="fa fa-cog"></i> Proses Angsuran</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Formulir Angsuran</h3>
				</div>
				<form method="post" action="<?php echo base_url("transaksi/simpanangsuran.html"); ?>" id="formupload">
					<div class="box-body">
							<h4>NIM</h4>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
								<input type="text" name="nim" id="nim" class="form-control" required="required" readonly="readonly" value="<?php echo $data->nim; ?>">
								<input type="hidden" id="kode_bayar" name="kdbyr" value="<?php echo $data->kode_bayar; ?>">
							</div>
							<br />
							<h4>Nama Jenis Bayar</h4>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
								<input type="text" name="jb" id="jb" class="form-control" required="required" readonly="readonly" value="<?php echo $data->nama_jns_bayar; ?>">
							</div>
							<br />
							<h4>Jumlah Biaya</h4>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" name="jmlbya" class="form-control" required="required" readonly="readonly" value="<?php echo $data->jml_biaya; ?>">
							</div>
							<br />
							<h4>Jumlah Bayar</h4>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" name="jmlbyr" class="form-control" required="required" readonly="readonly" value="<?php echo $data->jumlah_bayar; ?>">
							</div>
							<br />
							<h4>Sisa Angsuran</h4>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" id="sisa" class="form-control" required="required" readonly="readonly" value="<?php echo $sisa; ?>">
							</div>
							<br />
							<h4>Jumlah Angsuran</h4>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="number" id="jmlangsuran" name="jmlangsuran" class="form-control" required="required" placeholder="Masukkan jumlah angsuran pembayaran... ex: 1500000" value="">
							</div>
							<small style='color:grey' id="pesan"></small>
							<br />
							<br />
							<small style="color:red">*(Silahkan mencentang opsi dibawah inin untuk mengaktifkan tombol simpan data, pastikan anda telah mengisi semua data.)</small>
							<table class="table table-bordered table-hover">
								<tr>
									<td>
										<input type="checkbox" id="cek">
									</td>
									<td>
										Anda setuju untuk memproses angsuran pembayaran ini, harap cek kembali data pembayaran anda sebelum menyimpan data. Catatan: Jumlah angsuran akan diakumulasi dengan jumlah pembayaran sebelumnya, harap diperhatikan dengan seksama sebelum menyimpan data.
									</td>
								</tr>
							</table>
					</div>
					<div class="box-footer">
						<button type="button" class="btn btn-success pull-right" data-dismiss="modal" id='btnValidate'disabled="disabled"><i class="fa fa-cog"></i> Validate</button>
						<button type="submit" id="kirim" class="btn btn-danger pull-right" disabled="disabled" id="btnSubmit"><i class="fa fa-cog"></i> Proses</button>
						<a href="<?php echo base_url("mahasiswa/d/".base64_encode($data->nim)); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="konfirValidasi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Konfirmasi Validasi Pembayaran
				</h4>
			</div>
			<div class="modal-body">
				<p>
					Pembayaran Mahasiswa Telah Lunas, agar Mahasiswa mendapatkan akses kesiakad harap konfirmasi validasi transaksi ini.<br>
					Masukan Tahun Ajaran Contoh : (20152) bilangan (*2) pada digit terakhir menandakan semester Berjalan 2 menandakan genap 1 menandakan ganjil 4 digit awal menandakan tahun berjalan.

				</p>
				<div class="input-group">
					<span class="input-group-addon">Masukan Tahun Ajaran</span>
					<select name="id_smt" id="id_smt" class="form-control" required="required">
						<?php
						foreach ($kurikulum as $key){
							echo "<option value='".$key->id_kurikulum."'>".$key->nm_kurikulum."</option>";
						}
						?>
					</select>
					<!-- <input type="text" name="id_smt" id="id_smt" class="form-control" required="required" placeHolder="20152" value=""> -->
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal" id=''>
					Cancel
				</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#cek").on("change", function(){
		if($("#cek").is(":checked")){
			$("#kirim").prop("disabled", false);
		}
		else{
			$("#kirim").prop("disabled", true);
		}
	});

	$('#btnValidate').click(function() {
		var nim = '<?php echo base64_encode($data->nim); ?>';
		var kode_bayar = '<?php echo base64_encode($data->kode_bayar); ?>';
		var id_smt = $('#id_smt').val();
		 $.get("http://localhost/siakad/simala/index.php/auth/set_mode_kunci?id_smt="+id_smt+"&kode_bayar="+kode_bayar+"&nim="+nim+"", function(data, status){ //pengiriman data jangan lupa di enkrip pake base64_encode
        if (data==1) {
        	alert('Jangan Lupa Cetak Laporan')
        }
				else {
					alert('Data Sudah Ada Tetap Tetap Catet Yu No <?php echo $data->kode_bayar; ?>')
				}
    });
	});


	$("#formupload").on('submit',(function(e) {
		e.preventDefault();
		var urls = $("#formupload").attr("action");
		$.ajax({
			url: urls,
			type: "POST",
			data: new FormData(this),
			//mimeType:"multipart/form-data",
			contentType: false,
			cache: false,
			processData:false,
			success: function(data)
			{
				if (data==1) {
					$("#btnValidate").prop("disabled", false);
				}
				else {
					$("#btnValidate").prop("disabled", true);
				}
			}
		});
	}));

	$("#jmlangsuran").on("change", function(){
		if(parseInt($(this).val()) == parseInt($("#sisa").val()) && $("#jb").val()=="Semester"){
			$("#pesan").css("color","green").html("Angsuran lunas.");
			$("#konfirValidasi").modal('show');
		}
		else if(parseInt($(this).val()) > parseInt($("#sisa").val()) && $("#jb").val()=="Semester"){
			$("#pesan").css("color","red").html("Besar jumlah angsuran melebihi sisa angsuran. Harap periksa kembali.");
			$(this).val("").focus();
		}
		else if(parseInt($(this).val()) > parseInt($("#sisa").val())){
			$("#pesan").css("color","red").html("Besar jumlah angsuran melebihi sisa angsuran. Harap periksa kembali.");
			$(this).val("").focus();
		}
		else{
			$("#pesan").css("color","blue").html("Sisa Angsuran berikutnya : "+($("#sisa").val()-$(this).val()));
		}
	});
</script>
