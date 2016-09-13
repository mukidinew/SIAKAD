<?php
	$data = $datam[0];
?>
<section class="content-header">
  <h1>
	<i class='fa fa-cog'></i> Proses Transaksi
	<small>SIAMI</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href='#'><i class="fa fa-book"></i> Transaksi</a></li>
	<li><a href='<?php echo base_url('transaksi/layanan.html'); ?>'><i class="fa fa-cog"></i> Layanan</a></li>
	<li class="active"><i class="fa fa-cog"></i> Proses Transaksi</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Data Mahasiswa</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
							<td style='padding:10px;width:15px;'><i class='fa fa-file'></i></td>
							<td><?php echo $data->nim; ?></td>
						</tr>
						<tr>
							<td style='padding:10px;width:15px;'><i class='fa fa-user'></i></td>
							<td><?php echo $data->nama; ?></td>
						</tr>
						<tr>
							<td style='padding:10px;width:15px;'><i class='fa fa-group'></i></td>
							<td><?php echo $data->angkatan; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Formulir Proses Transaksi</h3>
				</div>
				<form method="post" action="<?php echo base_url("transaksi/simpantransaksi.html"); ?>" id="formupload">
					<div class="box-body">
						<h4>Tanggal Bayar</h4>
						<input type="hidden" name="nim" value="<?php echo $data->nim; ?>">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<input type="text" name="tglbayar" id="tglbayar" class="form-control" placeholder="dd-mm-yyyy" required="required" value="<?php echo date('d-m-Y'); ?>">
						</div>
						<small style="color:red">*(Silahkan mengganti tanggal bayar di atas jika tidak sesuai.)</small>
						<br>
						<h4>Jenis Pembiayaan</h4>
						<div class="input-group">
							<span class="input-group-addon"><i class='fa fa-group'></i></span>
							<select id="jb" name="jb" class="form-control" required="required">
								<option value="">--Pilih Jenis Biaya--</option>
								<?php
									//echo json_encode($datajb);
									foreach($datajb as $jb){
										echo "<option value='".$jb->kode_biaya."'>".$jb->nama_jns_bayar."</option>";
									}
								?>
							</select>
							<input type="hidden" name="kkb" id="kkb" value="">
						</div>
						<div style="display:none" id="tb">
							<br>
							<h4>Total Bayar</h4>
							<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<input type="text" name="tbayar" id="tbayar" class="form-control" placeholder="Total bayar..." required="required" readonly="readonly">
							</div>
						</div>
						<br>
						<h4>Jumlah Bayar</h4>
						<div class="input-group">
							<span class="input-group-addon">Rp.</span>
							<input type="number" name="jby" class="form-control" placeholder="ex : 1500000" required="required" disabled="disabled" id="jby">
						</div>
						<small id="sisa" style="color:grey">Tekan enter setelah memasukkan Jumlah Bayar</small>
						<br>
						<h4>No. Referensi Bank</h4>
						<div class="input-group">
							<span class="input-group-addon"><i class='fa fa-file-text'></i></span>
							<input type="text" name="norefbank" class="form-control" placeholder="Masukkan no. referensi yang terdapat pada slip sebagai bukti bayar.." required="required" id="kodeBank">
						</div>
						<h4>Keterangan Pembayaran</h4>
						<div class="input-group">
							<span class="input-group-addon"><i class='fa fa-file-text'></i></span>
							<div id="atur">
							<input type="text" name="ket" class="form-control" placeholder="Ketik keterangan bayar disini.. ex : SPP Semester 1">
							</div>
						</div>
						<br />
						<small style="color:red">*(Silahkan mencentang opsi dibawah ini untuk mengaktifkan tombol simpan data.)</small>
						<table class="table table-bordered table-hover">
							<tr>
								<td>
									<input type="checkbox" id="cek">
								</td>
								<td>
									Anda setuju untuk memproses pembayaran ini, harap cek kembali data pembayaran anda sebelum menyimpan data. Catatan: anda hanya dapat mengubah jumlah bayar dan no referensi untuk proses di kemudian hari.
								</td>
							</tr>
						</table>
					</div>
					<div class="box-footer">
						<button type="submit" id="kirim" class="btn btn-danger pull-right" disabled="disabled"><i class="fa fa-cog"></i> Proses</button>
						<a href="<?php echo base_url("transaksi/layanan.html"); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
						<button type="button" class="btn btn-success pull-right" id="btnKonfirm" disabled="disabled">Konfirmasi</button>
					</div>
				</form>
				<input type="text" id="kode_bayar" class="hide">
				<input type="text" id="id_smt_t" class="hide">
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
				<button type="button" class="btn btn-danger" data-dismiss="modal" id='btnInKurikulum'>
					Masukan
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
				var obj = JSON.parse(data);
				if (obj.hasil == true) {
					$("#btnKonfirm").prop("disabled", false);
					$('#kode_bayar').val(obj.data);
				}
				else {
					$("#btnKonfirm").prop("disabled", true);
				}
			}
		});
	}));

	$("#btnKonfirm").click(function(){
		var nim = '<?php echo base64_encode($data->nim); ?>';
		var kode_bayar= $('#kode_bayar').val();
		var id_smt = $('#id_smt').val();
		$.get("http://localhost/siakad/simala/index.php/auth/set_mode_kunci2?id_smt="+id_smt+"&kode_bayar="+kode_bayar+"&nim="+nim+"", function(data, status){ //pengiriman data jangan lupa di enkrip pake base64_encode
		   if (data==1) {
		     alert('Jangan Lupa Cetak Laporan');
				 window.location ='<?php echo site_url("/mahasiswa/d/".base64_encode($data->nim)) ?>';
		   }
		   else {
		     alert('Data Sudah Ada Tetap Tetap Catet Yu No <?php echo $data->kode_bayar; ?>')
		   }
		});
	});

	$("#jb").on("change", function(){
		if($(this).val().length > 0){
			var teks = $("#jb option:selected").text();
			if(teks.match(/(Semester)/gi) != null){
				thtml = '<select name="ket" class="form-control">';
					for(var i=1; i<=12; i++){
						thtml+='<option value="Pembayaran Semester '+i+'">Pembayaran Semester '+i+'</option>';
					}
				thtml += '</select>'
			}
			else{
				thtml = '<input type="text" name="ket" class="form-control" placeholder="Ketik keterangan bayar disini.. ex : SPP Semester 1">';
			}
			$("#atur").html(thtml);
			$.post("<?php echo base_url("transaksi/getbiaya.html"); ?>", {kb:$(this).val(),tglbayar:$("#tglbayar").val()}).done(function(data){
				data = data.split(" : ");
				$("#tb").slideUp(function(){
					$("#tbayar").val(data[1]);
					$("#kkb").val(data[0].trim());
				}).val("").slideDown();
				$("#jby").prop("disabled", false).focus();
			});
		}
		else{
			$("#tb").slideUp();
			$("#tbayar").val("");
			$("#jby").prop("disabled", true);
		}
	});
	$("#tglbayar").on("change", function(){
		if($("#tglbayar").val() == ""){
			$("#jb").prop("disabled", true);
		}
		else{
			$.post("<?php echo base_url("transaksi/getjenisbiaya.html"); ?>", {angk:<?php echo $data->angkatan; ?>,tglbayar:$(this).val()}).done(function(data){
				$("#jb").html(data);
				$("#jb").prop("disabled", false).focus();
			});
		}
		$("#tb").slideUp();
		$("#tbayar").val("");
	});
	$("#jby").change(function(){
		var sisa = $("#tbayar").val()-$(this).val();
		var jb = $("#jb option:selected").text();
		if (sisa == 0 && jb.match(/(Semester)/gi) =="Semester") {
			var status = "Pembayaran Semester Lunas";
			$("#konfirValidasi").modal('show');
		}
		else if(sisa == 0){
			var status = "Pembayaran Lainnya Lunas";
		}
		else if(sisa>0){
			var status = "Sisa Angsuran = "+sisa;
		}
		else{
			var status = "Terjadi kesalahan : Jumlah Bayar melebihi Total Bayar. Harap isi kembali.";
			$("#jby").val("").focus();
		}
		$("#sisa").html(status);
	});
</script>
