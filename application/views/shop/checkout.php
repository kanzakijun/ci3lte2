<!-- Main content -->
<div class="invoice p-3 mb-3">
	<!-- title row -->
	<div class="row">
		<div class="col-12">
			<h4>
				<i class="fas fa-shopping-cart"></i> Checkout.
				<small class="float-right">Date: <?= date('d-M-Y') ?></small>
			</h4>
		</div>
		<!-- /.col -->
	</div>
	<!-- info row -->

	<!-- /.row -->

	<!-- Table row -->
	<div class="row">

		<div class="col-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Qty</th>
						<th>Nama Barang</th>
						<th width="150px" class="text-center">Harga</th>
						<th class="text-center">Total Harga</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$tot_berat = 0;
					foreach ($this->cart->contents() as $items) {
						$barang = $this->barang->detail($items['id']);
					?>
						<tr>
							<td><?php echo $items['qty']; ?></td>
							<td><?php echo $items['name']; ?></td>
							<td class="text-center">Rp. <?php echo number_format($items['price'], 0); ?></td>
							<td class="text-center">Rp. <?php echo  number_format($items['subtotal'], 0); ?></td>
						</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	<?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>'); ?>
	<?php
	echo form_open('shop/checkout');
	 $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
	?>
	<div class="row">
		<!-- accepted payments column -->
		<div class="col-sm-8 invoice-col">
			Tujuan :
			<div class="row">
				<div class="col-sm-8">
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input name="alamat" id="alamat" class="form-control" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="kode_pos">Kode POS</label>
						<input name="kode_pos" id="kode_pos" class="form-control" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="nama_penerima">Nama Penerima</label>
						<input name="nama_penerima" id="nama_penerima" class="form-control" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="no_wa">No WhatsApp</label>
						<input name="no_wa" id="no_wa" class="form-control" required>
					</div>
				</div>
			</div>
		</div>
		<!-- /.col -->
		<div class="col-4">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th style="width:50%">Grand Total:</th>
						<th>Rp. <?php echo number_format($this->cart->total(), 0); ?></th>
					</tr>
				</table>
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!-- Simpan Transaksi -->
	<?php $a = 1;
	foreach ($this->cart->contents() as $items) : ?>
		<?= form_hidden('barang_id' . $a++, $items['id']); ?>
	<input name="no_order" value="<?= $no_order ?>" hidden>
	<input name="barang_nama" value="<?= $items['name'] ?>" hidden>
	<input name="total_bayar" value="<?= $this->cart->total() ?>" hidden>
	<!-- end Simpan Transaksi -->
	<?php endforeach ?>
	<!-- Simpan Rinci Transaksi -->
	<?php
	$i = 1;
	foreach ($this->cart->contents() as $items) {
		echo form_hidden('qty' . $i++, $items['qty']);
	}

	?>
	<!-- end Simpan Rinci Transaksi -->
	<div class="row no-print">
		<div class="col-12">
			<a href="<?= base_url('shop')  ?>" class="btn btn-warning"><i class="fas fa-backward"></i> Kembali Ke Keranjang</a>
			<button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
				<i class="fas fa-shopping-cart"></i> Proses Cekout
			</button>
		</div>
	</div>
	<?php echo form_close() ?>
</div>