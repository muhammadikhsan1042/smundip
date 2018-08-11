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


require_once 'Layout/Header.php';
?>

<main id="Page_Admin">
  <div>
    <div>
      <h2>Hallo Admin</h2>
    </div>
    <div onclick="href('Konten-Berita')">
      <img src="Assets/newspaper.png" alt="Konter Beranda" width="50px">
      <span><strong>Konten Beranda</strong></span>
    </div>
    <div>
      <img src="Assets/notebook.png" alt="Konter Agenda" width="50px">
      <span><strong>Konten Agenda</strong></span>
    </div>
    <div>
      <img src="Assets/rating.png" alt="Konter Transparansi" width="50px">
      <span><strong>Konten Transparansi</strong></span>
    </div>
  </div>
</main>

<?php require_once 'Layout/Footer.php'; ?>
