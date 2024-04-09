  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $username ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
					<a href="<?= base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard' and $this->uri->segment(2) == "") {
						echo "active";
						} ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p> Dashboard </p>
					</a>
				</li>
          <li class="nav-item <?php if($this->uri->segment(1) != 'dashboard') { echo "menu-open";} ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'user') { echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('bank') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'bank') { echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Bank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('ekspedisi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'ekspedisi') { echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Ekspedisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('barang') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'barang') { echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('keranjang') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'keranjang') { echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keranjang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="<?= base_url('product') ?>" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal"
                      data-target="#logoutModal">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>