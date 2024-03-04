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
		.img-galeri {
			width: 300px;
			/* Sesuaikan ukuran yang Anda inginkan */
			height: 200px;
			/* Sesuaikan ukuran yang Anda inginkan */
			object-fit: cover;
		}

		/* Tombol Pagination */
		.pagination-links .pagination a {
			display: inline-block;
			padding: 6px 12px;
			background-color: #007bff;
			color: #fff;
			border: 1px solid #007bff;
			border-radius: 4px;
			text-decoration: none;
			margin: 2px;
		}

		.pagination-links .pagination a:hover {
			background-color: #0056b3;
			border-color: #0056b3;
		}
	</style>
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="header d-flex align-items-center fixed-top">
		<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

			<a href="<?= base_url('home')?>" class="logo d-flex align-items-center">
				<!-- Uncomment the line below if you also wish to use an image logo -->
				<!-- <img src="assets/img/logo.png" alt=""> -->
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

		<!-- ======= Hero Slider Section ======= -->
		<section id="hero-slider" class="hero-slider">
			<div class="container-md" data-aos="fade-in">
				<div class="row">
					<div class="col-12">
						<div class="swiper sliderFeaturedPosts">
							<div class="swiper-wrapper">
								<?php foreach($carousel as $c) { ?>
								<div class="swiper-slide">

									<a href="" class="img-bg d-flex align-items-end"
										style="background-image: url('<?= base_url('assets/upload/carousel/'.$c['foto']) ?>');">
										<div class="img-bg-inner">
											<h2><?= $c['judul']?></h2>
											<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p> -->
										</div>
									</a>

								</div>
								<?php } ?>
							</div>
							<div class="custom-swiper-button-next">
								<span class="bi-chevron-right"></span>
							</div>
							<div class="custom-swiper-button-prev">
								<span class="bi-chevron-left"></span>
							</div>

							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- End Hero Slider Section -->
		<div id="autohide">
			<?= $this->session->flashdata('alert') ?>
		</div>
		<!-- ======= Post Grid Section ======= -->
		<section id="posts" class="posts">
			<div class="container" data-aos="fade-up">
				<div class="row g-5">
					<!-- bb -->
					<div class="col-lg-4">
						<div class="post-entry-1 lg">
							<a href="<?= base_url('home/berita/'.$post_1->slug) ?>"><img
									src="<?= base_url('assets/upload/konten/'.$post_1->foto)?>" alt=""
									class="img-fluid"></a>
							<div class="post-meta"><span class="date">
									<?php foreach($kategori as $kat):?>
									<?php if ($kat['id_kategori'] === $post_1->id_kategori): ?>
									<?= $kat['nama_kategori']?></span>
								<?php endif;?>
								<?php endforeach?>
								</span> <span class="mx-1">&bullet;</span> <span><?= $post_1->tanggal?></span></div>
							<h2><a href="<?= base_url('home/berita/'.$post_1->slug) ?>"><?= $post_1->judul ?></a></h2>
							<!-- <p class="mb-4 d-block"><?= $post_1->keterangan ?></p> -->

							<div class="d-flex align-items-center author">
								<!-- <div class="photo"><img src="<?= base_url('assets/upload/konten/'.$post_1->foto)?>" alt="" class="img-fluid"></div> -->
								<div class="name">
									<h3 class="m-0 p-0"><?= $post_1->username?></h3>
								</div>
							</div>
						</div>

					</div>
					<!-- bb -->
					<div class="col-lg-8">
						<div class="row g-5">
							<?php foreach($konten as $ten) { ?>
							<div class="col-lg-4 border-start custom-border">

								<div class="post-entry-1">
									<a href="<?= base_url('home/berita/'.$ten['slug'])?>"><img
											src="<?= base_url('assets/upload/konten/'.$ten['foto']) ?>"
											class="img-fluid img-galeri"></a>
									<div class="post-meta"><span class="date"><?= $ten['nama_kategori']?></span> <span
											class="mx-1">&bullet;</span> <span><?= $ten['tanggal']?></span></div>
									<h2><a href="<?= base_url('home/berita/'.$ten['slug'])?>"><?= $ten['judul']?></a>
									</h2>
								</div>
							</div>
							<?php } ?>

							<!-- Trending Section -->
							<div class="col-lg-4">
								<div class="trending">
									<h3>Recent Post</h3>
									<ul class="trending-post">
										<?php $no=1; foreach($recent_post as $post): ?>
										<li>
											<a href="<?= base_url('home/berita/'.$post->slug)?>">
												<span class="number"><?= $no;?></span>
												<!-- <span class="author"><?= $post->username?></span> -->
												<?php foreach($kategori as $kat):?>
												<?php if ($kat['id_kategori'] === $post->id_kategori): ?>
												<?= $kat['nama_kategori']?></span>
												<?php endif;?>
												<?php endforeach?>
												<span class="author"><?= $post->tanggal?></span>
												<h3><?= $post->judul?></h3>
											</a>
										</li>
										<?php $no++; endforeach?>
									</ul>
								</div>

							</div> <!-- End Trending Section -->
							<!-- pagenation -->
							<div class="pagination-links text-center">
								<?php echo $pagination; ?>
							</div>
							<!-- pagenation -->
						</div>
					</div>

				</div> <!-- End .row -->
			</div>
		</section> <!-- End Post Grid Section -->
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
						<h3 class="footer-heading">Recent Posts</h3>

						<ul class="footer-links footer-blog-entry list-unstyled">
							<?php foreach($recent_post as $re) : ?>
							<li>
								<a href="<?= base_url('home/berita/'.$re->slug)?>" class="d-flex align-items-center">
									<img src="<?= base_url('assets/upload/konten/'.$re->foto)?>" alt=""
										class="img-fluid me-3">
									<div>
										<div class="post-meta d-block">
											<spa class="date">
												<?php foreach($kategori as $kat):?>
												<?php if ($kat['id_kategori'] === $re->id_kategori): ?>
												<?= $kat['nama_kategori']?></span>
												<?php endif;?>
												<?php endforeach?>
												<span class="mx-1">&bullet;</span> <span><?= $re->tanggal?></span>
										</div>
										<span><?= $re->judul?></span>
									</div>
								</a>
							</li>
							<?php endforeach ?>
						</ul>

					</div>
				</div>
			</div>
		</div>

		<div class="footer-legal">
			<div class="container">

				<div class="row justify-content-between">
					<div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
						<div class="copyright">
							© Copyright <strong><span><?= $konfig->judul_website;?></span></strong>. All Rights Reserved
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