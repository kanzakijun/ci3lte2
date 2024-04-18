  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

        <div class="col-sm-12">
			<?= $this->session->flashdata('konfirmasi'); ?>
			<?= $this->session->flashdata('kirim'); ?>
			<?= $this->session->flashdata('selesai'); ?>
	<div class="card card-primary card-outline card-outline-tabs">
		<div class="card-header p-0 border-bottom-0">
			<ul class="nav nav-tabs" id="custom-tabs-four-tab">
				<li class="nav-item">
					<a class="nav-link active" id="custom-tabs-pesanan-masuk-tab" data-toggle="pill" href="#custom-tabs-pesanan-masuk" role="tab" aria-controls="custom-tabs-pesanan-masuk" aria-selected="true">Pesanan Masuk</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-diproses-tab" data-toggle="pill" href="#custom-tabs-diproses" role="tab" aria-controls="custom-tabs-diproses" aria-selected="false">Diproses</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-dikirim-tab" data-toggle="pill" href="#custom-tabs-dikirim" role="tab" aria-controls="custom-tabs-dikirim" aria-selected="false">Dikirim</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-selesai-tab" data-toggle="pill" href="#custom-tabs-selesai" role="tab" aria-controls="custom-tabs-selesai" aria-selected="false">Selesai</a>
				</li>
			</ul>
		</div>
		<!-- Pesanan Masuk -->
		<div class="card-body">
			<div class="tab-content" id="custom-tabs-four-tabContent">
				<div class="tab-pane fade show active" id="custom-tabs-pesanan-masuk" role="tabpanel" aria-labelledby="custom-tabs-pesanan-masuk-tab">
					<?php if (empty($keranjang)) { ?>
						<h4 style="text-align: center;" class="mb-3 text-success"><i class="fab fa-creative-commons-zero"></i> Tidak ada pesanan masuk</h1>
					<?php } else { ?>
					<table class="table" id="example1"  >
						<tr>
							<th>No Order</th>
							<th>Tanggal</th>
							<th>Nama Pemesan</th>
							<th>No WA</th>
							<th>Alamat</th>
							<th>Total Bayar</th>
							
						</tr>
						<?php foreach ($keranjang as $kr) { ?>
							<tr>
								<td><?= $kr['pembayaran_id'] ?></td>
								<td><?= $kr['pembayaran_waktu'] ?></td>
								<td><?= $kr['pembayaran_nama_pemesan'] ?></td>
								<td><?= $kr['pembayaran_no_wa'] ?></td>
								<td><?= $kr['pembayaran_alamat'] ?></td>
							</td>
							<td>
								<b>Rp.<?= number_format($kr['pembayaran_total'], 0, ',', '.') ?></b><br>
										<span class="badge badge-warning">Belum Bayar /<br> Menunggu Konfirmasi</span>
										<td>
										
										<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#checkModal<?= $kr['pembayaran_id'] ?>"><i class="fas fa-vote-yea"></i> Check</a>

									</td>


							<?php } ?>

					</table>
					<?php } ?>
				</div>




				<div class="tab-pane fade" id="custom-tabs-diproses" role="tabpanel" aria-labelledby="custom-tabs-diproses-tab">
				<?php if (empty($diproses)) { ?>
						<h4 style="text-align: center;" class="mb-3 text-success"><i class="fab fa-creative-commons-zero"></i> Tidak ada pesanan yang diproses</h1>
					<?php } else { ?>
					<table class="table" id="example1">
						<tr>
							<th>No Order</th>
							<th>Tanggal</th>
							<th>Nama Pemesan</th>
							<th>No WA</th>
							<th>Alamat</th>
							<th>Total Bayar</th>
						</tr>
						<?php foreach ($diproses as $dp) : ?>
							<tr>
								<td><?= $dp['pembayaran_id'] ?></td>
								<td><?= $dp['pembayaran_waktu'] ?></td>
								<td><?= $dp['pembayaran_nama_pemesan'] ?></td>
								<td><?= $dp['pembayaran_no_wa'] ?></td>
								<td><?= $dp['pembayaran_alamat'] ?></td>
								<td>
									<b>Rp. <?= number_format($dp['pembayaran_total'], 0, ',', '.') ?></b><br>

									<span class="badge badge-primary">Diproses/Dikemas</span>

								</td>
								<td>
										<button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#kirim<?= $dp['pembayaran_id'] ?>"><i class="fa fa-paper-plane"></i> Kirim</button>

								</td>
								<?php endforeach ?>
							</tr>

					</table>
					<?php } ?>

				</div>
				<div class="tab-pane fade" id="custom-tabs-dikirim" role="tabpanel" aria-labelledby="custom-tabs-dikirim-tab">
				<?php if (empty($dikirim)) { ?>
						<h4 style="text-align: center;" class="mb-3 text-success"><i class="fab fa-creative-commons-zero"></i> Tidak ada pesanan yang dikirim</h1>
					<?php } else { ?>
					<table class="table" id="example1">
						<tr>
							<th>No Order</th>
							<th>Tanggal</th>
							<th>Nama Pemesan</th>
							<th>No WA</th>
							<th>Alamat</th>
							<th>Total Bayar</th>
							<th>Ekspedisi</th>
							<th>No Resi</th>
						</tr>
						<?php foreach ($dikirim as $dk) : ?>
							<tr>
								<td><?= $dk['pembayaran_id'] ?></td>
								<td><?= $dk['pembayaran_waktu'] ?></td>
								<td><?= $dk['pembayaran_nama_pemesan'] ?></td>
								<td><?= $dk['pembayaran_no_wa'] ?></td>
								<td><?= $dk['pembayaran_alamat'] ?></td>
								<td>
									<b>Rp. <?= number_format($dk['pembayaran_total'], 0, ',', '.') ?></b>
								</td>
								<td><?= $dk['ekspedisi_nama'] ?></td>
								<td><?= $dk['no_resi'] ?><br>
									<span class="badge badge-success">Dikirim</span></td>
								<td>
										<button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#selesai<?= $dk['pembayaran_id'] ?>"><i class="fa fa-check"></i> Selesai</button>

								</td>
								<?php endforeach ?>
							</tr>

					</table>
					<?php } ?>
				</div>
				<div class="tab-pane fade" id="custom-tabs-selesai" role="tabpanel" aria-labelledby="custom-tabs-selesai-tab">
				<?php if (empty($selesai)) { ?>
						<h4 style="text-align: center;" class="mb-3 text-success"><i class="fab fa-creative-commons-zero"></i> Tidak ada pesanan yang terkirim</h1>
					<?php } else { ?>
					<table class="table" id="example1">
					<tr>
							<th>No Order</th>
							<th>Tanggal</th>
							<th>Nama Pemesan</th>
							<th>No WA</th>
							<th>Alamat</th>
							<th>Total Bayar</th>
							<th>Ekspedisi</th>
							<th>No Resi</th>
						</tr>
						<!-- foreach -->
						<?php foreach ($selesai as $sl) : ?>
							<tr>
								<td><?= $sl['pembayaran_id'] ?></td>
								<td><?= $sl['pembayaran_waktu'] ?></td>
								<td><?= $sl['pembayaran_nama_pemesan'] ?></td>
								<td><?= $sl['pembayaran_no_wa'] ?></td>
								<td><?= $sl['pembayaran_alamat'] ?></td>
								<td>
									<b>Rp. <?= number_format($sl['pembayaran_total'], 0, ',', '.') ?></b>
								</td>
								<td><?= $sl['ekspedisi_nama'] ?></td>
								<td><?= $sl['no_resi'] ?><br>
									<span class="badge badge-success">Diterima/Sampai</span>
								</td>
							</tr>
						<!-- end foreach -->
						<?php endforeach ?>
					</table>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</div>
</div>


        
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Modal -->
<!-- foreach -->
<?php foreach ($keranjang as $kr) : ?>
<div class="modal fade" id="checkModal<?= $kr['pembayaran_id'] ?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<?= form_open('pesanan_masuk/konfirmasi/' . $kr['pembayaran_id']) ?>

                <!-- order
				Tanggal
				pembayaran_nama_pemesan
				no wa
				Alamat
				total -->
				<div class="row">
					<div class="col-6">
						<h5>Order : <?= $kr['pembayaran_id'] ?></h5>
						<h5>Tanggal : <?= $kr['pembayaran_waktu'] ?></h5>
					</div>
					<div class="col-6">
						<h5>Pemesan : <?= $kr['pembayaran_nama_pemesan'] ?></h5>
						<h5>No. WA : <?= $kr['pembayaran_no_wa'] ?></h5>
						<h5>Alamat : <?= $kr['pembayaran_alamat'] ?></h5>
					</div>
				</div>
				<table class="table table-hover table-sm">
					<thead>
						<tr>
							<th>Qty</th>
							<th>Nama Barang</th>
							<th>Harga Barang</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php $detail = $this->db->get_where('view_detail_pesanan', ['pembayaran_id' => $kr['pembayaran_id']])->result_array() ?>
						<?php foreach ($detail as $d) : ?>
						<tr>
							<td><?= $d['keranjang_jumlah'] ?></td>
							<td><?= $d['barang_nama'] ?></td>
							<td><?= $d['barang_harga'] ?></td>
							<td>Rp.<?= number_format($d['keranjang_harga'], 0) ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					
				</table>
				<div class="col-4 float-right">
		<div class="table-responsive">
			<table class="table">
				<tr>
					<th style="width:50%">Grand Total:</th>
					<th>Rp. <?= number_format($kr['pembayaran_total'], 0); ?></th>
				</tr>
			</table>
		</div>
	</div>
            </div>
            <div class="modal-footer justify-content-right">
                <button type="submit" class="btn btn-success swalDefaultSuccess">Konfirmasi Pembayaran</button>
            </div>
			<?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>
<!-- end foreach -->

<!-- foreach -->
<?php foreach ($diproses as $dp) : ?>
<div class="modal fade" id="kirim<?= $dp['pembayaran_id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kirim Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open('pesanan_masuk/kirim/' . $dp['pembayaran_id']) ?>
                <div class="form-group">
					<label for="ekspedisi">Ekspedisi</label>
					<select id="ekspedisi" name="ekspedisi" class="form-control">
						<option selected>Pilih Ekspedisi</option>
						<?php foreach ($ekspedisi as $ek) : ?>
						<option><?= $ek['ekspedisi_nama'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="resi">No Resi</label>
					<input id="resi" type="text" class="form-control" name="resi" placeholder="No Resi" required>
				</div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>
<!-- end foreach -->


<!-- foreach -->
<?php foreach ($dikirim as $dk) : ?>
<div class="modal fade" id="selesai<?= $dk['pembayaran_id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Pengiriman</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open('pesanan_masuk/selesai/' . $dk['pembayaran_id']) ?>
                <h4>Tandai Pesanan Telah Selesai?</h3>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Selesai</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>
<!-- end foreach -->


<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 2000)
</script>