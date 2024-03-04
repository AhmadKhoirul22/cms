<h1>Cari Artikel</h1>
<form method="get" action="<?= base_url('home/chatgpt') ?>">
    <input type="text" name="keyword" value="<?= $this->input->get('keyword') ?>">
    <button type="submit">Cari</button>
</form>

<?php if (!empty($konten)): ?>
    <h2>Hasil Pencarian</h2>
    <ul>
        <?php foreach ($konten as $item): ?>
            <li>
                <h3><?= $item->judul ?></h3>
                <p><?= $item->keterangan ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
