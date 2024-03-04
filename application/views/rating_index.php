<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?= $konfig->judul_website; ?> | Skandakra </title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?= base_url('assets/frontend/')?>assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
		rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?= base_url('assets/frontend/')?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/frontend/')?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= base_url('assets/frontend/')?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/frontend/')?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/frontend/')?>assets/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS Files -->
	<link href="<?= base_url('assets/frontend/')?>assets/css/variables.css" rel="stylesheet">
	<link href="<?= base_url('assets/frontend/')?>assets/css/main.css" rel="stylesheet">
	<style>
		.comment-meta {
    	margin-bottom: 10px;
		}
		.comment-body {
			margin-top: 5px;
		}

	</style>
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="header d-flex align-items-center fixed-top">
		<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

			<a href="<?= base_url('home')?>" class="logo d-flex align-items-center">
				<!-- Uncomment the line below if you also wish to use an image logo -->
				<!-- <img src="<?= base_url('assets/frontend/')?>assets/img/logo.png" alt=""> -->
				<h1><?= $konfig->judul_website; ?></h1>
			</a>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a href="<?= base_url('auth')?>">Login</a></li>
					<li><a href="<?= base_url('home/rating')?>">Ulasan</a></li>
					<li class="dropdown">

						<a href="<?= base_url('')?>"><span>Categories</span> <i
								class="bi bi-chevron-down dropdown-indicator"></i></a>

						<ul>
							<li>
								<?php foreach($kategori as $k) { ?>
								<a
									href="<?= base_url('home/kategori/'.$k['id_kategori'])?>"><?= $k['nama_kategori']?></a>
								<?php } ?>
							</li>
						</ul>
					</li>
				</ul>
			</nav><!-- .navbar -->

			<div class="position-relative">
				<a href="<?=  $konfig->facebook;?>" class="mx-2"><span class="bi-facebook"></span></a>
				<!-- <a href="#" class="mx-2"><span class="bi-twitter"></span></a> -->
				<a href="<?= $konfig->instagram; ?>" class="mx-2"><span class="bi-instagram"></span></a>

				<a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
				<i class="bi bi-list mobile-nav-toggle"></i>

				<!-- ======= Search Form ======= -->
				<div class="search-form-wrap js-search-form-wrap">
					<form action="<?= base_url('home/search')?>" class="search-form" method="GET" id="searchForm">
						<span class="icon bi-search"></span>
						<input type="text" name="keyword" placeholder="Search" id="searchInput" class="form-control">
						<button type="submit" id="searchButton" class="btn btn-succes"></button>
						<button class="btn js-search-close"><span class="bi-x"></span></button>
					</form>
				</div><!-- End Search Form -->
				<!-- sedikit js -->
				<script>
					document.addEventListener("DOMContentLoaded", function () {
						var searchInput = document.getElementById("searchInput");
						var searchButton = document.getElementById("searchButton");

						searchInput.addEventListener("keyup", function (event) {
							if (event.key === "Enter") {
								// Tombol "Enter" ditekan, kirimkan formulir
								document.getElementById("searchForm").submit();
							}
						});

						searchButton.addEventListener("click", function () {
							// Klik tombol "cari", kirimkan formulir
							document.getElementById("searchForm").submit();
						});
					});
				</script>
				<!-- sedikit js -->

			</div>

		</div>

	</header><!-- End Header -->

	<main id="main">
	<div id="autohide">
			<?= $this->session->flashdata('alert') ?>
		</div>
	<div class=" container comments">
							<h5 class="comment-title py-4">Ulasan</h5>
							<div class="comment d-flex mb-4">
								<ul class="list-unstyled">
							<?php foreach($rating as $sat) { ?>
								<div class="flex-shrink-0">
									<div class="avatar avatar-sm rounded-circle">
										<img class="avatar-img" src="<?= base_url('assets/frontend/')?>assets/img/apple-touch-icon.png" alt="" class="img-fluid">
									</div>
								</div>
								
								<div class="mb-4">
									<div class="comment-meta d-flex align-items-baseline">
										<h6 class="me-2"><?= $sat['nama']?> <?= $sat['email']?></h6>
										<span class="text-muted"><?= $sat['tanggal']?></span>
									</div>
									<div class="comment-body">
										<?= $sat['isi_rating']?>
									</div>
								</div>
							<?php } ?>
							</ul>
							</div>
						</div>
		<!-- ======= Comments Form ======= -->
		<div class="container justify-content-center mt-5 mb-5">
							<form action="<?= base_url('rating/tambah')?>" method="post">
								<!-- <input type="hidden" value="" name="id_konten"> -->
								<div class="col-lg-12">
									<h5 class="comment-title">Tinggalkan Ulasan</h5>
									<div class="row">
										<div class="col-lg-6 mb-3">
											<label for="comment-name">Name</label>
											<input type="text" class="form-control" name="nama" id="comment-name"
												placeholder="Enter your name">
										</div>
										<div class="col-lg-6 mb-3">
											<label for="comment-email">Email</label>
											<input type="text" class="form-control" name="email" id="comment-email"
												placeholder="Enter your email">
										</div>
										<div class="col-12 mb-3">
											<label for="comment-message">Message</label>

											<textarea class="form-control" name="isi_rating" id="comment-message" placeholder="Enter your name"
												cols="30" rows="10"></textarea>
										</div>
										<div class="col-12">
											<input type="submit" class="btn btn-primary" value="Post Ulasan">
										</div>
										
									</div>
								</div>
						</div>
						
						<!-- End Comments Form -->
		<!-- ======= Hero Slider Section ======= -->
		<!-- ======= Post Grid Section ======= -->

		</div>
		</section>
		<!-- End Lifestyle Category Section -->

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer" class="footer">

		<div class="footer-content">
			<div class="container">

				<div class="row g-5">
					<div class="col-lg-4">
						<h3 class="footer-heading"><?= $konfig->judul_website; ?></h3>
						<p><?= $konfig->profile_website; ?></p>
						
					</div>
					<div class="col-6 col-lg-2">
						<h3 class="footer-heading">Navigation</h3>
						<ul class="footer-links list-unstyled">
							<li><a href="<?= base_url('home/galeri')?>"><i class="bi bi-chevron-right"></i>Galeri</a>
							</li>
						</ul>
					</div>
					<div class="col-6 col-lg-2">
						<h3 class="footer-heading">Categories</h3>
						<ul class="footer-links list-unstyled">
							<?php foreach($kategori as $k) { ?>
							<li><a href="<?= base_url('home/kategori/'.$k['id_kategori'])?>"><i
										class="bi bi-chevron-right"></i><?= $k['nama_kategori']?></a></li>
							<?php } ?>
						</ul>
					</div>

					<div class="col-lg-4">
						<!-- <h3 class="footer-heading">Recent Posts</h3> -->

						

					</div>
				</div>
			</div>
		</div>

		<div class="footer-legal">
			<div class="container">

				<div class="row justify-content-between">
					<div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
						<div class="copyright">
							© Copyright <strong><span>Website CMS Ahmadz</span></strong>. All Rights Reserved
						</div>

						<div class="credits">
							Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
						</div>

					</div>

					<div class="col-md-6">
						<div class="social-links mb-3 mb-lg-0 text-center text-md-end">
							<!-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> -->
							<a href="<?= $konfig->facebook; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
							<a href="<?= $konfig->instagram?>" class="instagram"><i class="bi bi-instagram"></i></a>
							<!-- <a href="#" class="google-plus"><i class="bi bi-gmail"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> -->
						</div>

					</div>

				</div>

			</div>
		</div>

	</footer>

	<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="<?= base_url('assets/frontend/')?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/frontend/')?>assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="<?= base_url('assets/frontend/')?>assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="<?= base_url('assets/frontend/')?>assets/vendor/aos/aos.js"></script>
	<script src="<?= base_url('assets/frontend/')?>assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="<?= base_url('assets/frontend/')?>assets/js/main.js"></script>

</body>

</html>