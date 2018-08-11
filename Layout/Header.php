<?php
  require_once __DIR__.'/../Core/Init.php';
  $_URL  = $_SERVER['REQUEST_URI'];
  $_HOST = $_SERVER['HTTP_HOST'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title></title>
    <link rel="shortcut icon" href="/../Assets/favicon.ico">
    <link rel="stylesheet" href="/../Style/Index.css">
  </head>
  <script language='JavaScript'>
    var txt="Senat Mahasiswa Universitas Diponegoro ";
    var speed=200;
    var refresh=null;
    function action() {
      document.title=txt;
      txt=txt.substring(1,txt.length)+txt.charAt(0);
      refresh=setTimeout("action()",speed);}
    action();
  </script>
  <body>
    <header>

      <center id="HWrap1">

        <div id="HMenu1">

          <div class="aSearch" style="display:none">
            <label for="aInput_Search" style="cursor:pointer"><i class="material-icons">search</i></label>
            <input type="text" id="aInput_Search" name="aPencarian" placeholder="Ketik Pencarian">
            <input type="button" name="aCari" value="Cari" onclick="search('aInput_Search', 'berita?search=')">
          </div>

          <div class="hHidden">

            <div id="Pencarian">

              <div>
                <i class="material-icons">search</i>
              </div>

              <div>
                Pencarian
              </div>

            </div>

            <div onclick="href('Hubungan/Kontak')">

              <div>
                <i class="material-icons">phone</i>
              </div>

              <div>
                Kontak
              </div>

            </div>
          </div>

          <div class="hHidden">

            <div onclick="href('TV-Parlemen')">
              <div>
                <i class="material-icons">tv</i>
              </div>

              <div>
                TV Parlemen
              </div>

            </div>

            <div onclick="href('Hubungan/Layanan')">
              <div>
                <i class="material-icons">help</i>
              </div>

              <div>
                Layanan
              </div>
            </div>


          </div>
        </div>

        <div id="HMenu2">

          <div>
            <div>
              <a href="/"><img src="/../Assets/Asset 2.png" alt="SM Undip" width="100px;"></a>
            </div>
            <div>
              <h1>SENAT MAHASISWA</h1>
              <h2>UNIVERSITAS DIPONEGORO</h2>
            </div>
          </div>

          <div>
            <div>
              <div>
                <h4>TEMUKAN WAKIL ANDA</h4>
              </div>
              <div>
                <div>
                  <input type="text" id="search_members" placeholder="Masukan NIM/Nama Anggota">
                </div>
                <div>
                  <input type="button" value="Cari" onclick="search('search_members', 'keanggotaan?search=')">
                </div>
              </div>
            </div>
          </div>

        </div>

      </center>

      <nav id="HWrap2">
        <div <?php if ($_URL=='/' || strpos($_URL, '?')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> onclick="href()">
          Beranda
        </div>
        <div <?php if (strpos($_URL, 'berita')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> onclick="href('berita')">
          Berita
        </div>
        <div <?php if (strpos($_URL, 'agenda')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> onclick="href('agenda')">
          Agenda
        </div>
        <div <?php if (strpos($_URL, 'produk-hukum')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> onclick="href('produk-hukum')">
          Produk Hukum
        </div>
        <div <?php if (strpos($_URL, 'keanggotaan')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> onclick="href('keanggotaan')">
          Keanggotaan
        </div>
        <div <?php if (strpos($_URL, 'about')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> onclick="href('about')">
          Tentang SM Undip
        </div>

      </nav>

    </header>
