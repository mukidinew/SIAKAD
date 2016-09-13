<?php
	$data = $data[0];
?>

<section class="content-header">
  <h1>
	<i class='fa fa-pencil'></i> Edit Jenis Pembayaran
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
				<form method="post" action="<?php echo base_url("pembayaran/edit/".base64_encode($data->kode_jns_bayar)); ?>">
					<div class="box-header with-border">
						<h3 class="box-title">Formulir Edit Jenis Pembayaran</h3>
					</div>
					<div class="box-body">
						<h4>Kode Jenis Pembayaran</h4>
						<div class="input-group">
							<span class="input-group-addon">JB</span>
							<input type="text" name="kodejb" class="form-control" placeholder="3 Digit Angka, ex : 001" maxlength="3" required="required" value="<?php echo substr($data->kode_jns_bayar,2,3); ?>" readonly="readonly">
						</div>
						<br>
						<h4>Nama Jenis Pembayaran</h4>
						<div class="input-group">
							<span class="input-group-addon"><i class='fa fa-money'></i></span>
							<input type="text" name="namajb" class="form-control" placeholder="Nama Jenis Bayar..." required="required" value="<?php echo $data->nama_jns_bayar; ?>">
						</div>
						<br>
						<input type="hidden" name="statusjb" value="<?php echo $data->status; ?>">
						<!-- Disable untuk sementara
						<h4>Status Jenis Pembayaran</h4>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="radio" name="statusjb" value="A" <?php echo ($data->status=="A")?"checked":""; ?>>
							</span>
							<input type="text" class="form-control" value="Angkatan" disabled="disabled">
						</div>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="radio" name="statusjb" value="P" <?php echo ($data->status=="P")?"checked":""; ?>>
							</span>
							<input type="text" class="form-control" value="Periodik" disabled="disabled">
						</div>
						-->
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-danger pull-right"><i class="fa fa-pencil"></i> Edit</button>
						<a href="<?php echo base_url("pembayaran.html"); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
