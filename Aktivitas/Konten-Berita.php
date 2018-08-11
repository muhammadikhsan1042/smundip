<?php

require_once __DIR__.'/../Core/Init.php';

/*=============CEK USER==============*/

date_default_timezone_set('Asia/Jakarta');

if (!isset($_COOKIE['USER_ADMIN'])) {
    header("location: /Aktivitas/Login_Admin");
} else {
  $_bool = $Insert->Cek_data('set_token', $_COOKIE['USER_ADMIN'], 'longString');
  if (!$_bool){
    header("location: /Aktivitas/Login_Admin");
    setcookie('USER_ADMIN', Input::get('Token'), time() - (1800), "smundip.com/");
  }
}

if (Input::get('submit')) {

  $_nama       = array();
  $_namaGambar = null;
  $i=0;

    $_image = !empty($_FILES['image']) ? $_FILES['image'] : null;
    while ($i < count($_image['name'])) {
      if ($_image['size'][$i]==0)exit('0');
      if ($_image['error'][$i])exit("0");
      if (!is_dir("../Berita/Upload/"))exit("0");
      $_nama[] = $i.Token::set('12').'.jpg';
      if (!file_exists('../Berita/Upload/' . $_nama[$i])) {
        if (!move_uploaded_file($_image["tmp_name"][$i], '../Berita/Upload/' . $_nama[$i])) {
          echo "<script>alert('Gambar Gagal Dimasukan')</script>";
        }
        $i++;
      }
    }

  $_namaGambar = implode(", ", $_nama);

  $resault = $Insert->Post_data('berita_kegiatan', array(
                  'judul'          => Input::get('Judul'),
                  'isi'            => nl2br(Input::get('Konten')),
                  'tanggal'        => date('y/m/d'),
                  'komisi_terkait' => Input::get('Komisi-Terkait'),
                  'nama_gambar'    => $_namaGambar
              ));

  if (!$resault) {
    echo "<script>alert('Gagal Mempost Data')</script>";
  } else {
    header('location: Admin');
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
    <button type="button" name="Batal" onclick="href('Admin')">Batal</button>
    <button class="submit" type="button" name="Simpan">Simpan</button>
  </div>
</header>

<main id="Page_Berita_Konten">

  <form id="Upload_Gambar_Berita" action="Konten-Berita" method="post" enctype="multipart/form-data">

    <input type="text" name="Judul" placeholder="Judul" value="<?php echo Input::get('Judul') ?>">
    <div>
      <span>Pilih Bidang Terkait : </span>
      <select name="Komisi-Terkait">
        <option value="Berita Sidang"><a href="#">Berita Sidang</a></option>
        <option value="Pimpinan"><a href="#">Berita Pimpinan</a></option>
        <option value="Badan Legislasi"><a href="#">Berita Badan Legislasi</a></option>
        <option value="Badan Anggran"><a href="#">Berita Badan Anggran</a></option>
        <option value="Badan Kehormatan"><a href="#">Berita Badan Kehormatan</a></option>
        <option value="Komisi 1"><a href="#">Berita Komisi I</a></option>
        <option value="Komisi 2"><a href="#">Berita Komisi II</a></option>
        <option value="Komisi 3"><a href="#">Berita Komisi III</a></option>
        <option value="Komisi 4"><a href="#">Berita Komisi IV</a></option>
        <option value="Komisi 5"><a href="#">Berita Komisi V</a></option>
        <option value="Komisi 6"><a href="#">Berita Komisi VI</a></option>
        <option value="BURT"><a href="#">Berita BURT</a></option>
        <option value="BKSAP"><a href="#">Berita BKSAP</a></option>
        <option value="Panitia Khusus"><a href="#">Berita Panitia Khusus</a></option>
        <option value="Berita Lain-lain"><a href="#">Berita Lain-Lain</a></option>
      </select>
    </div>
    <br>
    <div>
      <span>Pilih Gambar : </span>
      <input type="file" accept="image/jpeg"  name="image[]" multiple>
    </div>

    <textarea name="Konten" style="resize:none;width:700px;height:400px;"><?php echo Input::get('Konten') ?></textarea>

    <input class="simpan" type="submit" name="submit" value="submit" style="display:none;">
  </form>
</main>

<?php require_once 'Layout/Footer.php'; ?>
