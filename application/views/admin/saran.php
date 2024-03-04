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
			<h1>Saran</h1>
            <a onClick="return confirm('apakah yakin untuk hapus semua data saran')" href="<?= base_url('admin/saran/delete_all')?>" class="btn btn-danger"><i class="ri-delete-bin-6-fill"></i> delete all</a>
		</div>
        <div id="autohide">
         <?= $this->session->flashdata('alert') ?> 
        </div>
        <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Isi Saran</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
					<?php $no=1; foreach($saran as $k) { ?>
                  <tr>
                    <th scope="row"><?= $no;?></th>
                    <td><?= $k['nama']?></td>
                    <td><?= $k['email']?></td>
                    <td><?= $k['tanggal']?></td>
                    <td><?= $k['isi_saran']?></td>
					<td>
                      <a onClick="return confirm('apakah yakin untuk hapus data saran')" class="btn btn-danger" href="<?= base_url('admin/saran/hapus/'.$k['id_saran']) ?>"><i class="ri-delete-bin-6-fill"></i> delete</a>
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