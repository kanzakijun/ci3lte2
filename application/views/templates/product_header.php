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
  <!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
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
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <?php $keranjang = $this->cart->contents();
        $jml_item = 0;
        foreach ($keranjang as $k) {
          $jml_item = $jml_item + $k['qty'];
        }
        ?>
      <li class="nav-item dropdown">
				<a class="nav-link text-white" data-toggle="dropdown" href="">
					<i class="fas fa-shopping-cart"></i>
					<span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<?php if (empty($keranjang)) : ?>
						<a href="#" class="dropdown-item">
							<p>Keranjang Belanja Kosong</p>
						</a>
					<?php else : ?>
				<?php foreach ($keranjang as $k) : ?>
							<!-- barang start -->
							<a href="<?= base_url('shop') ?>" class="dropdown-item">
								<div class="media">
									<?php $foto = $this->db->get_where('master_barang_foto', ['barang_id' => $k['id']])->row_array(); ?>
									<img src="<?= base_url('assets/img/barang/') . $foto['barang_foto_file'] ?>" alt="User Avatar" class="img-size-50 mr-3">
									<div class="media-body">
										<h3 class="dropdown-item-title">
											<?= $k['name'] ?>
										</h3>
										<p class="text-sm"><?= $k['qty'] ?> x Rp.<?= number_format($k['price'], 0) ?></p>
										<p class="text-sm text-muted">
											<i class="fa fa-calculator"></i> Rp.<?= $this->cart->format_number($k['subtotal']) ?>
										</p>
									</div>
								</div>
							</a>
							<div class="dropdown-divider"></div>
						<!-- barang End -->
						<a href="<?= base_url('shop') ?>" class="dropdown-item">
							<div class="media">
								<div class="media-body">
									<tr>
										<td colspan="2"> </td>
										<td class="right"><strong>Total:</strong></td>
										<td class="right">Rp.<?= number_format($this->cart->total(), 0) ?></td>
									</tr>
								</div>
							</div>
						</a>

						<?php endforeach; ?>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('shop') ?>" class="dropdown-item dropdown-footer">View Cart</a>
						<a href="<?= base_url('belanja/cekout')  ?>" class="dropdown-item dropdown-footer">Check Out</a>
						<?php endif; ?>
            
				</div>
			</li>
		</ul>
    </div>
  </nav>
  <!-- /.navbar -->