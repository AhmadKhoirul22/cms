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
			<h1>Galeri</h1>
	</div>
    <form class="row g-3" method="post" action="<?= base_url('admin/galeri/tambah')?>" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Judul</label>
                  <input type="text" name="judul" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Foto 1948 x 843</label>
                  <input type="file" name="foto" class="form-control" id="inputEmail4">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </div>
    </form>
    <table class="table table-bordered border-primary">
      <thead>
        <tr>
          <th>NO</th>
          <th>Judul</th>
          <th>Foto</th>
          <th>Actions </th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach($galeri as $ga) {  ?>
        <tr>
          <td><?= $no++;?></td>
          <td><?= $ga['judul']?></td>
          <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $ga['foto']?>">
           Lihat Foto <i class="bi bi-search"></i> 
          </button>
            <!-- Modal -->
            <div class="modal fade" id="<?= $ga['foto']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hasil Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-center">
                    <img src="<?= base_url('assets/upload/galeri/'.$ga['foto'])?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td><a class="btn btn-danger" onClick="return confirm('apakah yakin untuk hapus data galeri')" href="<?= base_url('admin/galeri/hapus/'.$ga['foto'])?>"><i class="ri-delete-bin-6-fill"></i> delete</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
   
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<?php require_once('layout/_footer.php') ?>
	<!-- End Footer -->
	<!-- Vendor JS Files -->
	<?php require_once('layout/_js.php') ?>

</body>

</html>