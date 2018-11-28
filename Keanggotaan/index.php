<?php

require_once __DIR__.'/../Layout/Header.php';

  //Variabel-Variabel
  $_i = 1;
  $_Order = 'Nama_Lengkap';
  $_like  = '%'.Input::get('search').'%';
  $_link  = null;

  //Variable Pagination
  if (isset($_GET['search'])) {
    if (!empty($Insert->fil_Count('list_anggota', 'Nama_Lengkap', $_like))) {
      $_anggota = $Insert->fil_Count('list_anggota', 'Nama_Lengkap', $_like);
    } elseif(!empty($Insert->fil_Count('list_anggota', 'NIM', $_like))) {
      $_anggota = $Insert->fil_Count('list_anggota', 'NIM', $_like);
    } else {
      $_anggota = null;
    }
    $_link = '&search='.Input::get('search');
  } else {
    $_anggota = $Insert->all_Count('list_anggota');
  }

  $_jumlahRow  = !empty($_anggota->num_rows) ? $_anggota->num_rows:0;
  $_jumlahData = isset($_GET['q'])? (int)$_GET['q']:10;
  $longPage    = ceil($_jumlahRow/$_jumlahData);
  $_page       = isset($_GET['page'])? (int)$_GET['page']:1;
  $_awal       = ($_page>1) ? ($_page * $_jumlahData) - $_jumlahData : 0;

  // Halaman Saat Ini
  if (Input::get('page')>$longPage)header("location: /keanggotaan?q=$_jumlahData&page=1");

  //Mengambil Data pada Database
  if (empty(Input::get('search'))){
    $_anggota  = $Insert->Limit_data('list_anggota', $_jumlahData, $_awal, $_Order);
  }
  else {
      if (!empty($Insert->Limit_data('list_anggota', $_jumlahData, $_awal, $_Order, 'Nama_Lengkap', $_like))) {
        $_anggota = $Insert->Limit_data('list_anggota', $_jumlahData, $_awal, $_Order, 'Nama_Lengkap', $_like);
      } elseif (!empty($Insert->Limit_data('list_anggota', $_jumlahData, $_awal, $_Order, 'NIM', $_like))) {
        $_anggota = $Insert->Limit_data('list_anggota', $_jumlahData, $_awal, $_Order, 'NIM', $_like);
      }
  }
?>
<main id="Page_anggota">
  <div id="kaWrap1">
    <h2>Anggota Senat Mahasiswa</h2>
    <h1>Universitas Diponegoro</h1>
  </div>
  <div id="kaWrap2">
    <table>
      <thead>
        <tr align="left" height="55">
          <th width='90'align='center'>No Anggota</th>
          <th width='200'></th>
          <th width='400'>Nama/Delegasi</th>
          <th width='200'>Posisi</th>
        </tr>
      </thead>
      <?php if (!empty($_anggota)): ?>

        <?php foreach ($_anggota as $value): ?>

          <?php if (!empty($value['Jabatan_2'])): ?>

            <tbody onclick="loadData('NIM',<?php echo $value['NIM'] ?>, 'profil?')">
              <tr align="left" height="50">
                <td width='110' rowspan="5" align='center'><b><?php echo $_i; ?></b></td>
                <td width='200' rowspan="5" align='center'> <img src="/Upload/<?php echo $value['Nama_Foto']; ?>" alt="Foto <?php echo $value['Nama_Lengkap']; ?>" width='80px'> </td>
                <td width='400'></td>
                <td width='200'></td>
              </tr>
              <tr align="left" height="25">
                <td width='400'><b><?php echo $value['Nama_Lengkap']; ?></b></td>
                <td width='200'><b><?php echo $value['Komisi_atau_Biro']; ?></b></td>
              </tr>
              <tr align="left" height="25">
                <td width='400'><b><?php echo $value['Fakultas']; ?></b></td>
                <td width='200'><b><?php echo $value['Jabatan_1']; ?></b></td>
              </tr>
              <tr align="left" height="25">
                <td width='400'></td>
                <td width='200'><b><?php echo $value['Jabatan_2']; ?></b></td>
              </tr>
              <tr align="left" height="50">
                <td width='400' ></td>
                <td width='200'></td>
              </tr>
            </tbody>
          <?php else : ?>
            <tbody onclick="loadData('NIM',<?php echo $value['NIM'] ?>, 'profil?')">
              <tr align="left" height="50">
                <td width='110' rowspan="4" align='center'><b><?php echo $_i; ?></b></td>
                <td width='200' rowspan="4" align='center'> <img src="/Upload/<?php echo $value['Nama_Foto']; ?>" alt="Foto <?php echo $value['Nama_Lengkap']; ?>" width='80px'> </td>
                <td width='400'></td>
                <td width='200'></td>
              </tr>
              <tr align="left" height="25">
                <td width='400'><b><?php echo $value['Nama_Lengkap']; ?></b></td>
                <td width='200'><b><?php echo $value['Komisi_atau_Biro']; ?></b></td>
              </tr>
              <tr align="left" height="25">
                <td width='400'><b><?php echo $value['Fakultas']; ?></b></td>
                <td width='200'><b><?php echo $value['Jabatan_1']; ?></b></td>
              </tr>
              <tr align="left" height="50">
                <td width='400'></td>
                <td width='200'></td>
              </tr>
            </tbody>
          <?php endif; ?>
      <?php $_i++; endforeach; ?>
    <?php else: ?>
      <tbody>
        <tr align="left" height="50">
          <td width='110' rowspan="4" align='center'></td>
          <td width='200' rowspan="4" align='center'></td>
          <td width='400'></td>
          <td width='200'></td>
        </tr>
        <tr align="left" height="25">
          <td width='400'><b>Data Tidak Ditemukan</b></td>
          <td width='200'></td>
        </tr>
        <tr align="left" height="25">
          <td width='400'></td>
          <td width='200'></td>
        </tr>
        <tr align="left" height="25">
          <td width='400'></td>
          <td width='200'></td>
        </tr>
      </tbody>
    <?php endif; ?>
    </table>
  </div>
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
</main>
<?php require_once __DIR__.'/../Layout/Footer.php'; ?>
