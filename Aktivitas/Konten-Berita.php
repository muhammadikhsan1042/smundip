<?php

require_once __DIR__.'/../Core/Init.php';

/*=============CEK USER==============*/


if (!isset($_COOKIE['USER_ADMIN'])) {
    header("location: /Aktivitas/Login_Admin");
} else {
  $_bool = $Insert->Cek_data('set_token', $_COOKIE['USER_ADMIN'], 'longString');
  if (!$_bool){
    header("location: /Aktivitas/Login_Admin");
    setcookie('USER_ADMIN', Input::get('Token'), time() - (1800), "smundip.com/");
  }
}

/*=============Koneksi Database==============*/


require_once 'Layout/Header.php';
?>

<header id="Page_Berita_Header">
  <div>
      <span><i class="material-icons">people</i> Admin Senat Mahasiswa Universitas diponegoro</span>
  </div>
  <div>
    <button type="button" name="Batal">Batal</button>
    <button type="button" name="Simpan">Simpan</button>
  </div>
</header>

<main id="Page_Berita_Konten">
  <form action="index.html" method="post">
    <input type="text" name="Judul" placeholder="Judul" enctype="multipart/form-data">
    <textarea name="Konten" style="resize:none;width:300px;height:100px;"></textarea>
    <select name="Komisi-Terkait">
      <option value="Berita Sidang"><a href="#">Berita Sidang</a></option>
      <option value="Berita Pimpinan"><a href="#">Berita Pimpinan</a></option>
      <option value="Berita Badan Legislasi"><a href="#">Berita Badan Legislasi</a></option>
      <option value="Berita Badan Anggran"><a href="#">Berita Badan Anggran</a></option>
      <option value="Berita Badan Kehormatan"><a href="#">Berita Badan Kehormatan</a></option>
      <option value="Berita Komisi 1"><a href="#">Berita Komisi I</a></option>
      <option value="Berita Komisi 2"><a href="#">Berita Komisi II</a></option>
      <option value="Berita Komisi 3"><a href="#">Berita Komisi III</a></option>
      <option value="Berita Komisi 4"><a href="#">Berita Komisi IV</a></option>
      <option value="Berita Komisi 5"><a href="#">Berita Komisi V</a></option>
      <option value="Berita Komisi 6"><a href="#">Berita Komisi VI</a></option>
      <option value="Berita BURT"><a href="#">Berita BURT</a></option>
      <option value="Berita BKSAP"><a href="#">Berita BKSAP</a></option>
      <option value="Berita Panitia Khusus"><a href="#">Berita Panitia Khusus</a></option>
      <option value="Berita Lain-lain"><a href="#">Berita Lain-Lain</a></option>
    </select>

    <div>
      <input type="file" name="" value="">
    </div>

    <input type="submit" name="submit" value="submit" style="display:none;">
  </form>
</main>

<?php require_once 'Layout/Footer.php'; ?>
