<?php

  require_once __DIR__.'/../Layout/Header.php';

  //Variabel-Variabel
  $_i = 1;
  $_Order  = 'id';
  $_like   = '%'.Input::get('search').'%';
  $_see    = '%'.Input::get('see').'%';
  $_data   = null;
  $_link   = null;
  $_filter = null;


  //Variable Pagination
  if (isset($_GET['search']) && !isset($_GET['see'])) {
    if(!empty($Insert->fil_Count('berita_kegiatan', 'isi', $_like, 'judul'))) {
      $_data = $Insert->fil_Count('berita_kegiatan', 'isi', $_like, 'judul');
      $_filter = 'isi';
    }
    $_link = '&search='.Input::get('search');
  } elseif (!isset($_GET['search']) && isset($_GET['see'])) {
      if(!empty($Insert->fil_Count('berita_kegiatan', 'komisi_terkait', $_like))) {
        $_data = $Insert->fil_Count('berita_kegiatan', 'komisi_terkait', $_like);
      }
      $_filter = 'komisi';
      $_link = '&see='.Input::get('see');
  } elseif (!isset($_GET['search']) && !isset($_GET['see'])) {
    $_data = $Insert->all_Count('berita_kegiatan');
    $_filter = 'all';
  }

  $_jumlahRow  = !empty($_data->num_rows) ? $_data->num_rows:0;
  $_jumlahData = isset($_GET['q'])? (int)$_GET['q']:10;
  $longPage    = ceil($_jumlahRow/$_jumlahData);
  $_page       = isset($_GET['page'])? (int)$_GET['page']:1;
  $_awal       = ($_page>1) ? ($_page * $_jumlahData) - $_jumlahData : 0;

  // Halaman Saat Ini
  if (Input::get('page')>$longPage)header("location: /berita?q=$_jumlahData&page=1");

  //Mengambil Data pada Database
  if ($_filter=='all') $_data  = $Insert->news('berita_kegiatan', 'id', $_jumlahData, $_awal);
  elseif ($_filter == 'komisi') $_data = $Insert->news('berita_kegiatan', $_Order, $_jumlahData, $_awal, $_see, 'komisi_terkait');
  elseif ($_filter == 'isi') $_data = $Insert->news('berita_kegiatan', $_Order, $_jumlahData, $_awal, $_like, 'isi', 'judul');

?>
<main id="Page_Berita">

  <div>

    <?php if (!empty($_data)): ?>

      <?php foreach ($_data as $key => $value): ?>

      <?php
        $_linkGambar = explode(', ', $value['nama_gambar']);
        $_id         = $value['id'];
      ?>

      <div onclick="href('berita/detail?id=<?php echo $_id ?>')">

        <div class="News-Image">
          <img src="Upload/<?php echo $_linkGambar[0]; ?>" width="150">
        </div>

        <div class="News-Content">
          <h2><?php echo $value['judul']; ?></h2>
          <div><b> <?php echo date('d F Y', strtotime($value['tanggal'])); ?> </b> / <span style="color:rgb(0, 129, 86);font-weight:600;"><?php echo $value['komisi_terkait']; ?></span> </div>
          <div>
            <p><?php echo $value['isi']; ?></p>
          </div>
        </div>

      </div>

    <?php endforeach; ?>


    <div class="Pagination">
      <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo Input::get('page')-1 ?><?php echo $_link; ?>" onclick="<?php if($_page<=1)echo 'return false'; ?>" style="<?php if($_page<=1)echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>">Sebelumnya</a></span>

      <span><a href="?q=<?php echo $_jumlahData;?>&page=1<?php echo $_link; ?>" onclick="<?php if($_page==1)echo 'return false'; ?>" style="<?php if($_page==1)echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>">1</a></span>

      <?php if ($_page>=4 && $longPage>=5): ?>
        <span><a href="#" onclick="return false">...</a></span>
      <?php endif; ?>

      <?php if ($_page==1 && $longPage==2): ?>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page+1 ?><?php echo $_link; ?>"><?php echo $_page+1 ?></a></span>
      <?php elseif($_page==$longPage && $longPage==2): ?>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo 2 ?> " onclick="<?php echo 'return false'; ?>" style="<?php echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo 2 ?></a></span>
      <?php elseif($_page==$longPage && $longPage==3): ?>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page+1 ?><?php echo $_link; ?>"><?php echo $_page-1 ?></a></span>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page ?><?php echo $_link; ?>" onclick="<?php echo 'return false'; ?>" style="<?php echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo $_page ?></a></span>
      <?php elseif ($_page==1 && $longPage>=3): ?>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page+1 ?><?php echo $_link; ?>"><?php echo $_page+1 ?></a></span>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page+2 ?><?php echo $_link; ?>"><?php echo $_page+2 ?></a></span>
      <?php elseif ( $_page==2 && $_page<$longPage): ?>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo 2 ?><?php echo $_link; ?> " onclick="<?php echo 'return false'; ?>" style="<?php echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo 2 ?></a></span>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page+1 ?><?php echo $_link; ?>"><?php echo $_page+1 ?></a></span>
      <?php elseif($_page>=3 && $_page<$longPage-1): ?>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page-1 ?><?php echo $_link; ?>"><?php echo $_page-1 ?></a></span>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page ?><?php echo $_link; ?>" onclick="<?php echo 'return false'; ?>" style="<?php echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo $_page ?></a></span>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page+1 ?><?php echo $_link; ?>"><?php echo $_page+1 ?></a></span>
      <?php elseif($_page==$longPage-1): ?>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page-1 ?><?php echo $_link; ?>"><?php echo $_page-1 ?></a></span>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page ?><?php echo $_link; ?>" onclick="<?php echo 'return false'; ?>" style="<?php echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo $_page ?></a></span>
      <?php elseif($_page==$longPage && $longPage>=3): ?>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page-2 ?><?php echo $_link; ?>"><?php echo $_page-2 ?></a></span>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page-1 ?><?php echo $_link; ?>"><?php echo $_page-1 ?></a></span>
      <?php endif; ?>


      <?php if ($_page<=$longPage-3 && $longPage>=5): ?>
        <span><a href="#" onclick="return false">...</a></span>
      <?php endif; ?>

      <?php if ($longPage>=4): ?>
        <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $longPage ?><?php echo $_link; ?>" onclick="<?php if($_page==$longPage)echo 'return false'; ?>" style="<?php if($_page==$longPage)echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo $longPage; ?></a></span>
      <?php endif; ?>

      <span><a href="?q=<?php echo $_jumlahData;?>&page=<?php echo $_page+1 ?><?php echo $_link; ?>" onclick="<?php if($_page>=$longPage)echo 'return false'; ?>" style="<?php if($_page>=$longPage)echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>">Selanjutnya</a></span>
    </div>

  <?php else: ?>
    <h2 style="text-align:center">Pencarian Tidak Ditemukan</h2>
  <?php endif; ?>


  </div>

  <div>
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
