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
  <!-- <link rel="stylesheet" href="<?= base_url('assets/')?>tinymce/js/skin/default/content.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/')?>tinymce/js/skin/ui/oxide/skin.min.css"> -->
  <!-- <script type="text/javascript" src="ckeditor/ckeditor.js"></script> -->
  <!-- <script src="<?= base_url('ckeditor/ckeditor.js')?>"></script> -->
  <!-- <script src="<?= base_url('assets/')?>tinymce/js/tinymce.min.js"></script> -->
<!-- 
<link rel="stylesheet" href="<?= base_url('ckeditor/ckeditor.css')?>"> -->

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
			<h1>Konten</h1>
		</div>
        <div id="autohide">
         <?= $this->session->flashdata('alert') ?> 
        </div>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
        Tambah Konten
      </button>
      <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Konten</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" method="post" action="<?= base_url('admin/konten/tambah')?>" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Judul Konten</label>
                  <input type="text" name="judul" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Keterangan</label>
                  <textarea name="keterangan" class="tinymce form-control " id="editor1"></textarea>
                </div>
                <div class="col-12">
                  <label class="form-label">Kategori</label>
                  <select name="id_kategori" class="form-control">
						<?php foreach($kategori as $k) { ?>
                            <option value="<?= $k['id_kategori']?>">
                            <?= $k['nama_kategori']?>
                            </option>
                        <?php } ?>    
				</select>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Foto</label>
                  <input type="file" name="foto" class="form-control">
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
                    <th scope="col">Kategori Konten</th>
                    <th scope="1">Keterangan</th>
                    <th scope="1">Foto</th>
                    <th scope="1">Judul</th>
                    <th scope="1">Tanggal</th>
                    <th scope="1">Nama</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
					<?php $no = 1; foreach($konten as $k) { ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $k['nama_kategori']?></td>
                    <!-- <td><?= $k['keterangan']?></td> -->
                    <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $k['foto']?>">
                      Baca Keterangan
                    </button>
                    <!-- Modal -->
                        <div class="modal fade" id="<?= $k['foto']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Keterangan Konten</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                              <?= $k['keterangan']?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                    <td>
                    <a href="<?= base_url('assets/upload/konten/'.$k['foto']);?>" target="_blank">
                    <i class="bi bi-search"></i> Lihat Foto
                    </a>  
                    </td>
                    <td><?= $k['judul']?></td>
                    <td><?= $k['tanggal']?></td>
                    <td><?= $k['nama']?></td>
					<td>
					<button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#edit<?= $k['foto'];?>">
                        edit <i class="bi-pencil-square"></i>
                      </button>
					  <div class="modal fade" id="edit<?= $k['foto'];?>" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Konten</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" method="post" action="<?= base_url('admin/konten/update')?>">
					<input type="hidden" name="nama_foto" value="<?= $k['foto']?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Judul</label>
                  <input type="text" name="judul" value="<?= $k['judul']?>" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Keterangan</label>
                  <textarea name="keterangan" class="tinymce form-control"><?= $k['keterangan']?></textarea>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Kategori</label>
                  <select name="id_kategori" class="form-control">
											<?php $no=1; foreach($kategori as $ai) { ?>
												<option 
													<?php if($ai['id_kategori']==$k['id_kategori']){ echo "selected"; }?>
												value="<?= $ai['id_kategori']?>">
													<?= $ai['nama_kategori']?></option>
											<?php } ?>
										</select>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Foto</label>
                  <input type="file" name="foto" class="form-control" value="<?= $k['foto']?>">
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
                      <a onClick="return confirm('apakah yakin untuk hapus data pemasukan')" class="btn btn-danger" href="<?= base_url('admin/konten/hapus/'.$k['foto']) ?>"><i class="ri-delete-bin-6-fill"></i> delete</a>
					</td>
                  </tr>
				  <?php $no++; } ?>
                </tbody>
              </table>
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