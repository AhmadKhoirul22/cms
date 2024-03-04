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
			<h1>Carousel</h1>
		</div>
    <div id="autohide">
         <?= $this->session->flashdata('alert') ?> 
    </div>
        <form class="row g-3" method="post" action="<?= base_url('admin/carousel/tambah')?>" enctype="multipart/form-data">
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
              <!-- table -->
              <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach($carousel as $car) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $car['judul']?></td>
                    <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $car['foto']?>">
                      Lihat Foto
                    </button>
                    <!-- Modal -->
                        <div class="modal fade" id="<?= $car['foto']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                                <img src="<?= base_url('assets/upload/carousel/'.$car['foto'])?>" alt="">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                    <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?=$car['foto']?>">
                        edit <i class="bi-pencil-square"></i>
                    </button>
                    <div class="modal fade" id="edit<?= $car['foto']?>" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Carousel</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" method="post" action="<?= base_url('admin/carousel/update')?>" enctype="multipart/form-data">
                    <input type="hidden" name="nama_foto" value="<?= $car['foto']?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Judul</label>
                  <input type="text" name="judul" class="form-control" id="inputNanme4" value="<?= $car['judul']?>">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Foto</label>
                  <input type="file" name="foto" accept="image/jpg, image/gif,image/png, image/jpeg" class="form-control" id="inputEmail4" value="<?= $car['foto']?>">
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
              <a onClick="return confirm('apakah yakin untuk hapus data pemasukan')" class="btn btn-danger" href="<?= base_url('admin/carousel/hapus/'.$car['foto']) ?>"><i class="ri-delete-bin-6-fill"></i> delete</a>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
              <!-- tabel -->
        <!-- <div class="card">
            <?php foreach($carousel as $car) { ?>
            <img src="<?= base_url('assets/upload/carousel/'.$car['foto']) ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $car['judul']?></h5>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?=$car['judul']?>">
                        edit <i class="bi-pencil-square"></i>
                      </button>
                      <div class="modal fade" id="edit<?= $car['judul']?>" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Carousel</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" method="post" action="<?= base_url('admin/carousel/update')?>" enctype="multipart/form-data">
                    <input type="hidden" name="nama_foto" value="<?= $car['foto']?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Judul</label>
                  <input type="text" name="judul" class="form-control" id="inputNanme4" value="<?= $car['judul']?>">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Foto</label>
                  <input type="file" name="foto" accept="image/jpg, image/gif,image/png, image/jpeg" class="form-control" id="inputEmail4" value="<?= $car['foto']?>">
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
              <a onClick="return confirm('apakah yakin untuk hapus data pemasukan')" class="btn btn-danger" href="<?= base_url('admin/carousel/hapus/'.$car['foto']) ?>"><i class="ri-delete-bin-6-fill"></i> delete</a>
            </div>
            <?php } ?>
          </div> -->
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<?php require_once('layout/_footer.php') ?>
	<!-- End Footer -->
	<!-- Vendor JS Files -->
	<?php require_once('layout/_js.php') ?>

</body>

</html>