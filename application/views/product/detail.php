  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?= $title . ' - ' . $detail['barang_nama'] ?></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <!-- Default box -->
          <div class="card card-solid">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="col-12">
                    <?php $query = "SELECT * FROM master_barang_foto WHERE master_barang_foto.barang_id = " . $detail['barang_id'] . " LIMIT 1"; ?>
                    <?php $f = $this->db->query($query)->row_array(); ?>
                    <img src="<?= base_url('assets/') ?>img/barang/<?= $f['barang_foto_file'] ?>" class="product-image">
                  </div>



                  <div class="col-12 product-image-thumbs">
                    <?php $fotos = $this->db->get_where('master_barang_foto', ['barang_id' => $detail['barang_id']])->result_array(); ?>
                    <?php foreach ($fotos as $ft) : ?>
                      <div class="product-image-thumb">
                        <img src="<?= base_url('assets/') ?>img/barang/<?= $ft['barang_foto_file'] ?>">
                      </div>
                    <?php endforeach; ?>
                  </div>

                </div>
                <div class="col-12 col-sm-6">
                  <?php echo form_open('shop/add');
                  echo form_hidden('id', $detail['barang_id']);
                  echo form_hidden('price', $detail['barang_harga']);
                  echo form_hidden('name', $detail['barang_nama']);
                  echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                  ?>
                  <h3 class="my-3"><?= $detail['barang_nama'] ?></h3>
                  <p><?= $detail['barang_keterangan'] ?></p>

                  <hr>


                  <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                      Rp. <?= number_format($detail['barang_harga'], 0, ',', '.') ?>
                    </h2>
                  </div>

                  <div class="mt-4">
                    <div class="row">
                      <div class="col-sm-2">
                        <input type="number" name="qty" class="form-control" value="1" min="1">
                      </div>
                      <div class=" col-sm-8">
                        <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                          <i class="fas fa-cart-plus fa-lg mr-2"></i>
                          Add to Cart
                        </button>
                      </div>
                    </div>
                  </div>
                <?php echo form_close(); ?>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

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
  <script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function() {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
      })
    })
  </script>
  </body>

  </html>