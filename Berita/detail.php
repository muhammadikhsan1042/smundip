<?php
  require_once __DIR__.'/../Layout/Header.php';

  /*=============KONTEN============*/
  $_data = (!empty($Insert->all_Count('berita_kegiatan', 'id', Input::get('id')))) ? $Insert->all_Count('berita_kegiatan', 'id', Input::get('id')) : header('location: /berita') ;

  $_data  = $_data->fetch_assoc();
  $_namaGambar = explode(', ', $_data['nama_gambar']);

  /*============SLIDE==============*/
  $_slide = $Insert->news('berita_kegiatan', 'id', 10);

?>
<main id="Page_Berita_Detail">

  <div>
    <h2><?php echo $_data['judul'] ?></h2>
    <div>
      <?php foreach ($_namaGambar as $value): ?>
        <img src="Upload/<?php echo $value ?>">
      <?php endforeach; ?>
    </div>
    <span><i class="material-icons">date_range</i> <?php echo date('d F Y', strtotime($_data['tanggal'])); ?> / <i class="material-icons">people</i> <?php echo $_data['komisi_terkait'] ?></span>
    <div>
      <p><?php echo nl2br($_data['isi']); ?></p>
    </div>
  </div>

  <div>
    <h4>LIHAT BERITA LAINNYA</h4>
    <ul>
      <?php foreach ($_slide as $value): ?>
        <li><a href="/berita/detail?id=<?php echo $value['id'] ?>"><?php echo $value['judul'] ?></a></li>
      <?php endforeach; ?>
    </ul>
    <h4>BERITA</h4>
    <ul>
      <li><a href="/berita?see=Sidang">Berita Sidang</a></li>
      <li><a href="/berita?see=Pimpinan">Berita Pimpinan</a></li>
      <li><a href="/berita?see=Legislasi">Berita Badan Legislasi</a></li>
      <li><a href="/berita?see=Anggran">Berita Badan Anggran</a></li>
      <li><a href="/berita?see=Kehormatan">Berita Badan Kehormatan</a></li>
      <li><a href="/berita?see=Komisi 1">Berita Komisi I</a></li>
      <li><a href="/berita?see=Komisi 2">Berita Komisi II</a></li>
      <li><a href="/berita?see=Komisi 3">Berita Komisi III</a></li>
      <li><a href="/berita?see=Komisi 4">Berita Komisi IV</a></li>
      <li><a href="/berita?see=Komisi 5">Berita Komisi V</a></li>
      <li><a href="/berita?see=Komisi 6">Berita Komisi VI</a></li>
      <li><a href="/berita?see=BURT">Berita BURT</a></li>
      <li><a href="/berita?see=BKSAP">Berita BKSAP</a></li>
      <li><a href="/berita?see=Khusus">Berita Panitia Khusus</a></li>
      <li><a href="/berita?see=Lain-Lain">Berita Lain-Lain</a></li>
    </ul>
  </div>

</main>
<?php require_once __DIR__.'/../Layout/Footer.php';?>
