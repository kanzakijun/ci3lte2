  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <?php foreach ($master as $m) : ?>
            <h1><?= $title ?> - <?= $m['barang_nama']; ?></h1>
          <?php endforeach; ?>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?= base_url('barang/edit/') . $m['barang_id']; ?>" method="post" enctype="multipart/form-data">
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="barang_nama" class="form-control" id="barang_nama" placeholder="Nama Barang" value="<?= set_value('barang_nama', $m['barang_nama']); ?>">
                    <?= form_error('barang_nama', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Barang" value="<?= set_value('harga', $m['barang_harga']); ?>">
                    <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="ket" class="form-control" id="" cols="30" rows="3"><?= set_value('ket', $m['barang_keterangan']); ?></textarea>
                    <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Tambah Foto</label>
                    <input type="checkbox" name="tambahFoto" id="tambahFoto">
                    <input type="file" name="fotos[]" class="form-control" id="fotos" multiple disabled required>
                    <input type="hidden" name="checkboxStatus" id="checkboxStatus" value="0">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
              <div id="preview_fotos"></div>
              <hr>
              <div class="row">
				<?php foreach ($gambar as $gm) : ?>
					<div class="col-sm-3">
						<div class="form-group">
							<img src="<?= base_url('assets/img/barang/') . $gm['barang_foto_file'] ?>" id="gambar_load" class="img-thumbnail">
						</div>
						<a href="#" data-toggle="modal" data-target="#delete<?= $gm['barang_foto_id'] ?>" class="btn btn-danger btn-xs btn-block"><i class="fas fa-trash"></i>Delete</a>
					</div>
				<?php endforeach; ?>

			</div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url('assets/') ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>


<!--modal delete -->
<?php foreach ($gambar as $gm) { ?>
	<div class="modal fade" id="delete<?= $gm['barang_foto_id'] ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">

					<div class="form-group">
						<img src="<?= base_url('assets/img/barang/' . $gm['barang_foto_file'])?>" id="gambar_load" class="img-thumbnail w-50">
					</div>
					<h5>Apakah Anda Yakin Ingin Menghapus Gambar Ini...?</h5>


				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="<?= base_url('barang/deleteGambar/' . $gm['barang_foto_file']) . '/' . $m['barang_id'] ?>" class="btn btn-primary">Delete</a>
				</div>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php } ?>



<!-- Page specific script -->

<script>
function prevGambar(input) {
    // Menghapus konten preview sebelumnya
    $('#preview_fotos').empty();

    if (input.files && input.files.length > 0) {
        // Melakukan iterasi untuk setiap file yang dipilih
        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Menambahkan tag img untuk setiap file yang diunggah
                $('#preview_fotos').append('<img src="' + e.target.result + '" width="200px" class="img-thumbnail">');
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
}

$("#fotos").change(function() {
    prevGambar(this);
});
</script>

<script>
	function bacaGambar(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#gambar_load').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#preview_gambar").change(function() {
		bacaGambar(this);
	});
</script>

<script>
    // Mendapatkan elemen checkbox
    var checkbox = document.getElementById('tambahFoto');
    // Mendapatkan elemen input file
    var inputFoto = document.getElementById('fotos');
    var hiddenInput = document.getElementById('checkboxStatus')

    // Mendengarkan perubahan pada checkbox
    checkbox.addEventListener('change', function() {
        // Jika checkbox dicek, aktifkan input file
        if (this.checked) {
            inputFoto.disabled = false;
            hiddenInput.value = '1'; // Update nilai elemen input tersembunyi saat checkbox dicentang
        } else {
            // Jika checkbox tidak dicek, nonaktifkan input file dan hapus file yang mungkin sudah dipilih
            inputFoto.disabled = true;
            inputFoto.value = ''; // Hapus nilai input file
            hiddenInput.value = '0'; // Update nilai elemen input tersembunyi saat checkbox tidak dicentang
        }
    });
</script>

</body>
</html>
