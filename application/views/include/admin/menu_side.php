<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('') ?>public/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">GJ Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('') ?>public/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('dataAdmin')->name; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if ($this->session->userdata('dataAdmin')->role == 1): ?>
            <li class="nav-header">Product</li>
          <li class="nav-item">
            <a href="<?php echo site_url($this->uri->segment(1).'/category') ?>" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url($this->uri->segment(1).'/sub_category') ?>" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>Sub Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url($this->uri->segment(1).'/product') ?>" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url($this->uri->segment(1).'/currency') ?>" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>Currency</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url($this->uri->segment(1).'/contact') ?>" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>Contact</p>
            </a>
          </li>
          <li class="nav-header">Transaction</li>
          <li class="nav-item">
            <a href="<?php echo site_url($this->uri->segment(1).'/list-transaction') ?>" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>List Transaction</p>
            </a>
          </li>
          <?php elseif($this->session->userdata('dataAdmin')->role == 2): ?>
            <li class="nav-header">Pendapatan</li>
            <li class="nav-item">
              <a href="<?php echo site_url($this->uri->segment(1).'/list-affiliate') ?>" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>List Pendapatan</p>
              </a>
            </li>
            <li class="nav-header">Affiliasi</li>
            <li class="nav-item">
              <a href="<?php echo site_url($this->uri->segment(1).'/list-affiliate') ?>" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>List Affiliasi</p>
              </a>
            </li>
          <?php endif ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <?php $this->load->view('include/admin/breadcumb'); ?>
    <section class="content">
      <div class="container-fluid">