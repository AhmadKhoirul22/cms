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
    <div id="autohide">
         <?= $this->session->flashdata('alert') ?> 
    </div>
			<h1>Data User</h1>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
        Tambah User
      </button>
      <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" method="post" action="<?= base_url('admin/user/tambah')?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" id="inputEmail4">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Level</label>
                  <select name="level" class="form-control">
                     <option value="Admin">Admin</option>
                     <option value="Kontributor">Kontributor</option>
                  </select>
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
		</div>
        <table class="table table-dark">
          
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">last login</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($user as $u) { ?>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $u['nama']?></td>
                    <td><?= $u['username']?></td>
                    <td><?= $u['nama']?></td>
                    <td><?= $u['last_login']?></td>
                    <td><?= $u['level']?></td>
                    <td>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $no;?>">
                        edit <i class="bi-pencil-square"></i>
                      </button>
                      <a onClick="return confirm('apakah yakin untuk hapus data pemasukan')" class="btn btn-danger" href="<?= base_url('admin/user/hapus/'.$u['id_user']) ?>"><i class="ri-delete-bin-6-fill"></i> delete</a>
                    </td>
                  </tr>
                </tbody>
                <div class="modal fade" id="edit<?= $no;?>" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" method="post" action="<?= base_url('admin/user/update')?>">
                    <input type="hidden" name="id_user" value="<?= $u['id_user']?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" id="inputNanme4" value="<?= $u['username']?>">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" id="inputEmail4" value="<?= $u['nama']?>">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="inputPassword4" value="<?= $u['password']?>">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Level</label>
                  <select name="level" class="form-control">
                     <option value="Admin"<?php if($u['level']=='Admin'){echo "selected";}?>>Admin</option>
                     <option value="Kontributor"<?php if($u['level']=='Kontributor'){echo "selected";}?>>Kontributor</option>
                  </select>
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
		</div>
                <?php $no++; } ?>
              </table>
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<?php require_once('layout/_footer.php') ?>
	<!-- End Footer -->
	<!-- Vendor JS Files -->
	<?php require_once('layout/_js.php') ?>

</body>

</html>