<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row g-5">
    <?php foreach($konten as $kon) { ?>
    <div class="col-lg-4 border-start custom-border">

        <div class="post-entry-1">
            <a href="<?= base_url('home/berita/'.$kon['slug'])?>">
                <img src="<?= base_url('assets/upload/konten/'.$kon['foto']) ?>" class="img-fluid img-galeri">
            </a>
            <div class="post-meta">
                <span class="date"><?= $kon['nama_kategori']?></span>
                <span class="mx-1">&bullet;</span>
                <span><?= $kon['tanggal']?></span>
            </div>
            <h2><a href="<?= base_url('home/berita/'.$kon['slug'])?>"><?= $kon['judul']?></a></h2>
        </div>

    </div>
    <?php } ?>
</div>

    <div class="pagination-links">
        <?php echo $pagination; ?>
    </div>
</body>
</html>