<?php
$file = !empty($_FILES['gambar']) ? $_FILES['gambar'] : null; // digunakan untuk mengambil data gambar
  if (!$file || !$file['size'])exit('0'); // ketika ukuran/size gambar kosong langsung exit.
  if ($file['error'])exit("0"); // ketika proses upload error langsung exit
  if (!preg_match('~/jp(e|)g$~', $file['type']))exit("0"); // ketika tipe file tidak jpg/jpeg exit
  if (!is_dir("gambar/"))exit("0"); // jika folder gambar tidak ada langsung exit.
  $nama = $_FILES['gambar']['name'];
  if (move_uploaded_file($file["tmp_name"], 'gambar/' . $nama)) {
    echo $nama;
  }
