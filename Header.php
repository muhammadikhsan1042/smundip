<?php require_once 'Core/Init.php';?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Senat Mahasiswa Universitas Diponegoro</title>
    <link rel="shortcut icon" href="/Assets/favicon.ico">
    <link rel="stylesheet" href="/Style/Index.css">
  </head>

  <body>
    <header>

      <center id="HWrap1">

        <div id="HMenu1">

          <div class="aSearch" style="display:none">
            <label for="aInput_Search" style="cursor:pointer"><i class="material-icons">search</i></label>
            <input type="text" id="aInput_Search" name="aPencarian" placeholder="Ketik Pencarian">
            <input type="button" name="aCari" value="Cari">
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

            <div id="Kontak">

              <div>
                <i class="material-icons">phone</i>
              </div>

              <div>
                Kontak
              </div>

            </div>
          </div>

          <div class="hHidden">

            <div id="TVParlemen">
              <div>
                <i class="material-icons">tv</i>
              </div>

              <div>
                TV Parlemen
              </div>

            </div>

            <div id="Layanan">
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
              <a href="/"><img src="/Assets/Asset 2.png" alt="SM Undip" width="100px;"></a>
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
                  <input type="text" name="pDelegasi" placeholder="Masukan NIM/Nama Anggota">
                </div>
                <div>
                  <input type="button" name="cari" value="Cari">
                </div>
              </div>
            </div>
          </div>

        </div>

      </center>

      <div id="HWrap2">
        <div <?php if ($_SERVER['REQUEST_URI']=='/'){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> id="beranda">
          Beranda
        </div>
        <div <?php if (strpos($_SERVER['REQUEST_URI'], 'berita')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> id="berita">
          Berita
        </div>
        <div <?php if (strpos($_SERVER['REQUEST_URI'], 'agenda')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> id="agenda">
          Agenda
        </div>
        <div <?php if (strpos($_SERVER['REQUEST_URI'], 'produk-hukum')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> id="legislasi">
          Produk Hukum
        </div>
        <div <?php if (strpos($_SERVER['REQUEST_URI'], 'keanggotaan')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> id="keanggotaan">
          Keanggotaan
        </div>
        <div <?php if (strpos($_SERVER['REQUEST_URI'], 'about')==1){?>style="background-color: rgb(91, 231, 255); color : black; font-weight:900;" <?php } ?> id="about">
          Tentang SM Undip
        </div>

      </div>

    </header>
