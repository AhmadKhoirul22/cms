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
			<h1>Kategori Konten</h1>
		</div>
		<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
        Tambah Kategori Konten
      </button>
	  <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Kategori Konten</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" method="post" action="<?= base_url('admin/kategori/tambah')?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kategori</label>
                  <input type="text" name="nama_kategori" class="form-control" id="inputNanme4">
                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                  </div>
                </div>
        </div>
		<table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
					<?php $no=1; foreach($kategori as $k) { ?>
                  <tr>
                    <th scope="row"><?= $no;?></th>
                    <td><?= $k['nama_kategori']?></td>
					<td>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $k['id_kategori']?>">
                        edit <i class="bi-pencil-square"></i>
                      </button>
					  <div class="modal fade" id="edit<?= $k['id_kategori']?>" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Kategori Konten</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" method="post" action="<?= base_url('admin/kategori/update')?>">
					<input type="hidden" name="id_kategori" value="<?= $k['id_kategori']?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Kategori</label>
                  <input type="text" name="nama_kategori" value="<?= $k['nama_kategori']?>" class="form-control" id="inputNanme4">
                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                  </div>
                </div>
        </div>
                      <a onClick="return confirm('apakah yakin untuk hapus data pemasukan')" class="btn btn-danger" href="<?= base_url('admin/kategori/hapus/'.$k['id_kategori']) ?>"><i class="ri-delete-bin-6-fill"></i> delete</a>
					</td>
                  </tr>
				  <?php  $no++; } ?>
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