<?php $menu = $this->uri->segment(2); ?>
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item<?php if($menu=='home'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/home')?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item<?php if($menu=='carousel'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/carousel')?>">
          <i class="bi bi-menu-button-wide"></i><span>Carousel</span>
        </a>
      </li><!-- End Components Nav -->
      <li class="nav-item<?php if($menu=='kategori'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/kategori')?>">
          <i class="bi bi-journal-text"></i><span>Kategori Konten</span>
        </a>
      </li><!-- End Forms Nav -->
      <li class="nav-item<?php if($menu=='konten'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/konten')?>">
          <i class="bi bi-layout-text-window-reverse"></i><span>Konten</span>
        </a>
      </li><!-- End Tables Nav -->
      <?php if($this->session->userdata('level')=='Admin') { ?>
      <li class="nav-item<?php if($menu=='user'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/user') ?>">
          <i class="ri-map-pin-user-line"></i><span>User</span>
        </a>
      </li><!-- End Charts Nav -->
      
      <li class="nav-item<?php if($menu=='saran'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/saran')?>">
          <i class="ri-discord-fill"></i><span>Saran</span>
        </a>
      </li>

      <li class="nav-item<?php if($menu=='rating'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/saran/ulasan')?>">
          <i class="bx bxs-like"></i><span>Ulasan</span>
        </a>
      </li>
      <?php } ?>
      <li class="nav-item<?php if($menu=='galeri'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/galeri')?>">
          <i class="ri-gallery-line"></i><span>Galeri</span>
        </a>
      </li>

      <li class="nav-item<?php if($menu=='konfigurasi'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/konfigurasi')?>">
          <i class="bi bi-gem"></i><span>Konfigurasi</span>
        </a>
      </li><!-- End Icons Nav -->
    </ul>
  </aside>