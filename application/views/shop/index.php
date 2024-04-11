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

      <div class="card card-solid">
        <div class="card-body ph-0-">
            <div class="row">
                <div class="col-sm-12">

                <?php if ($this->session->flashdata('pesan')) {
					echo '<div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <h5><i class="icon fas fa-check"></i>';
					echo $this->session->flashdata('pesan');
					echo '</h5> </div>';
                } ?>


            <?= form_open('shop/update'); ?>

<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th style="width: 100px">QTY</th>
            <th>Nama Barang</th>
            <th style="text-align:right">Harga</th>
            <th style="text-align:right">Sub-Total</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($this->cart->contents() as $items): ?>
            
            <tr>
                <td><?= form_input([
                    'name' => $i.'[qty]', 
                    'value' => $items['qty'], 
                    'maxlength' => '3', 
                    'min' => '1',
                    'size' => '5', 
                    'type' => 'number', 
                    'class' => 'form-control'
                    ]); ?>
                </td>
                <td><?= $items['name']; ?></td>
                <td style="text-align:right">Rp. <?= number_format($items['price'],0); ?></td>
                <td style="text-align:right">Rp. <?= number_format($items['subtotal'],0); ?></td>
                <td class="text-center">
                    <a href="<?= base_url('shop/remove/'.$items['rowid']); ?>" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
                <td class="right"><h4 class="text-bold">Total</h4></td>
                <td class="right"><h4 class="text-bold">Rp. <?= number_format($this->cart->total(),0); ?></h4></td>
            </tr>
    </tbody>
</table>

        <button type="submit" class="btn btn-primary">Update Cart</button>
        <a href="<?= base_url('shop/clear') ?>" class="btn btn-warning"><i class="fas fa-trash"> Clear Cart</i></a>
        <a href="<?= base_url('shop/checkout') ?>" class="btn btn-success"><i class="fas fa-check"> Checkout</i></a>

<?= form_close(); ?>

                </div>
            </div>
        </div>
      </div>
      
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