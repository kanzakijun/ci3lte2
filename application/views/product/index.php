<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?= base_url('product') ?>" class="nav-link">Home</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form action="<?= base_url('product'); ?>" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Search Keyword..." name="keyword" autocomplete="off">
					<div class="input-group-append">
						<input class="btn btn-info" type="submit" name="submit">
					</div>
				</div>
			</form>
      </div>

      <!-- Right navbar links -->
      
    </div>
  </nav>
  <!-- /.navbar -->




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
                  </div>
                </div>
              </div>
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
</body>
</html>
