<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>ADMIN</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<!-- css -->
	<?php require_once('layout/_css.php') ?>
	<!-- /css  -->
</head>

<body>
	<!-- ======= Header ======= -->
	<?php require_once('layout/_header.php') ?>
	<!-- End Header -->
	<!-- ======= Sidebar ======= -->
	<?php require_once('layout/_sidebar.php') ?>
	<!-- End Sidebar-->
	<!-- main -->
	<main id="main" class="main">
		<div class="pagetitle">
			<h1>Detail profil</h1>
			<!-- card -->
			<div class="card mt-3">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?= base_url('assets/backend/')?>assets/img/profile-img.jpg" alt="" class="rounded-circle">
              <h2><?= $username?> | <?= $nama?></h2>
              <h3><?= $level?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
			<!-- /card -->
            <!-- <form class="row g-3" method="post" action="<?= base_url('admin/user/tambah')?>"> -->
                <!-- <div class="col-12">
                  <label for="inputNanme4" class="form-label">Username</label>
                  <input type="text" name="username" value="<?= $profile->username?>" class="form-control" id="inputNanme4"  readonly>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Nama</label>
                  <input type="text" name="nama" value="<?= $profile->nama?>" class="form-control" id="inputEmail4" readonly>
                </div> -->
                <!-- <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="inputPassword4">
                </div> -->
                <!-- <div class="col-12">
                  <label for="inputAddress" class="form-label">Level</label>
                    <input type="text" name="" id="" class="form-control" value="<?= $profile->level?>" readonly>
                </div>
               -->
                    </div>
                    <!-- <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form> -->
		</div>
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<?php require_once('layout/_footer.php') ?>
	<!-- End Footer -->
	<!-- Vendor JS Files -->
	<?php require_once('layout/_js.php') ?>

</body>

</html>