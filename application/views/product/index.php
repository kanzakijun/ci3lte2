  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header container">
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
    <section class="content container">

      <h5>Result : <?= $total_rows ?></h5>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <?php if (empty($produk)) : ?>
              <tr>
                <td colspan="4">
                  <div class="alert alert-danger" role="alert">
                    Data Not Found !
                  </div>
                </td>
              </tr>
            <?php endif; ?>
            <?php foreach ($produk as $m) : ?>
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <?php echo form_open('shop/add');
                echo form_hidden('id', $m['barang_id']);
                echo form_hidden('qty', 1);
                echo form_hidden('price', $m['barang_harga']);
                echo form_hidden('name', $m['barang_nama']);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h1 class="lead text-xl"><b><?= $m['barang_nama'] ?></b></h1>
                        <h3 class="text-muted text-lg"> <?= substr($m['barang_keterangan'], 0, 50) . '...' ?> </h3>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="text-lg font-weight-bold"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Rp. <?= number_format($m['barang_harga'], 2, ',', '.') ?></li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <?php $f = $this->db->get_where('master_barang_foto', ['barang_id' => $m['barang_id']])->row_array(); ?>
                        <?php if ($m['barang_id'] == $f['barang_id']) : ?>
                          <?php $fotos = $f['barang_foto_file']; ?>
                          <img src="<?= base_url('assets/img/barang/') . $fotos ?>" alt="user-avatar" class="img-fluid">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="<?= base_url('product/detail/') . $m['barang_id'] ?>" class="btn btn-sm bg-primary">
                        <i class="fas fa-eye"></i> View more...
                      </a>
                      <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                        <i class="fas fa-cart-plus"> Add</i>
                      </button>
                    </div>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- /.card-body -->


        <div class="card-footer">
          <?= $this->pagination->create_links(); ?>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

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
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
  <script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Barang Berhasil Ditambahkan Ke Keranjang !!!'
        })
      });
    });
  </script>
  </body>

  </html>