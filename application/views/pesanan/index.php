<?php foreach($bayar as $bayar) : ?>

<div class="container">
<div class="row mt-5">
	<div class="col-sm-6">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">No Rekening Tujuan</h3>
			</div>
			<div class="card-body">

				<p>Silahkan Transfer Ke No Rekening Di Bawah Ini Sebesar : <h1 class="text-primary">Rp. <?= number_format($bayar['pembayaran_total'], 0) ?>.-</h1>
				</p><br>
				<table class="table">
					<tr>
						<th>Bank</th>
						<th>No Rekening</th>
						<th>Atas Nama</th>
					</tr>
					<?php foreach ($rekening as $rek) { ?>
						<tr>
							<td><?= $rek['bank_nama'] ?></td>
							<td><?= $rek['bank_rekening'] ?></td>
							<td><?= $rek['bank_atas_nama'] ?></td>
						</tr>
					<?php } ?>

				</table>

			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Konfirmasi Pembayaran</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<?= form_open('pesanan/konfirmasi/' . $bayar['pembayaran_id']); ?>
			<div class="card-body">
				<div class="form-group">
					<label for="atasNama">Atas Nama</label>
					<input name="atas_nama" class="form-control" placeholder="Atas Nama" required>
				</div>
				<div class="form-group">
					<label for="namaBank">Nama Bank</label>
					<input name="nama_bank" class="form-control" placeholder="Nama Bank" required>
				</div>
				<div class="form-group">
					<label for="noRek">No Rekening</label>
					<input name="no_rek" class="form-control" placeholder="No Rekening" required>
				</div>
			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Konfirmasi</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>

</div>

</div>

<?php endforeach; ?>