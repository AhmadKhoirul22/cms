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
    <div id="autohide">
         <?= $this->session->flashdata('alert') ?> 
        </div>
		<div class="pagetitle">
			<h1>Konfigurasi</h1>
		</div>
        <form class="row g-3" method="post" action="<?= base_url('admin/konfigurasi/update')?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Judul Website</label>
                  <input type="text" name="judul_website" class="form-control" value="<?= $konfig->judul_website; ?>" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" name="email" value="<?= $konfig->email; ?>" class="form-control" id="inputEmail4">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Profile Website</label>
                  <!-- <input type="text" name="profile_website" value="<?= $konfig->profile_website; ?>"class="form-control"> -->
                  <textarea name="profile_website" class="tinymce form-control"><?= $konfig->profile_website; ?></textarea>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Instagram</label>
                  <input type="text" class="form-control" value="<?= $konfig->instagram; ?>" name="instagram" >
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Facebook</label>
                  <input type="text" class="form-control" value="<?= $konfig->facebook; ?>" name="facebook">
                </div>  
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Alamat</label>
                  <input type="text" class="form-control" value="<?= $konfig->alamat; ?>" name="alamat" >
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Whatsapp</label>
                  <input type="text" class="form-control" value="<?= $konfig->no_wa; ?>" name="no_wa" >
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
              </form>
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<?php require_once('layout/_footer.php') ?>
	<!-- End Footer -->
	<!-- Vendor JS Files -->
	<?php require_once('layout/_js.php') ?>

</body>
<script>
    tinymce.init({
        selector: 'textarea.tinymce', // Pilih semua textarea yang ingin diubah menjadi editor
        plugins: 'link image code', // Daftar plugin yang ingin Anda aktifkan
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code', // Toolbar yang ingin Anda tampilkan
    });
</script>
</html>