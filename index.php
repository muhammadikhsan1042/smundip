<?php require_once 'Layout/Header.php';

  $berandaNews = $Insert->news('berita_kegiatan', 'id', 3);

?>

<main id="Page_Beranda">
  <div id="MWrap">
    <h1>BERITA TERBARU</h1>
      <div>
        <?php foreach ($berandaNews as $value): ?>

          <?php
            $namaGambar = explode(', ', $value['nama_gambar']);
            $_id = $value['id'];
           ?>

          <div onclick="href('berita/detail?id=<?php echo $_id ?>')">
            <img src="Berita/Upload/<?php echo $namaGambar[0] ?>">
          </div>

        <?php endforeach; ?>

      </div>
      <div>
        <div onclick="href('berita')">
          <strong>Lihat Semua</strong>
        </div>
      </div>
  </div>
</main>
<?php require_once 'Layout/Footer.php'; ?>
