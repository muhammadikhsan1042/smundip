<?php require_once 'Header.php';

  //Variabel Nomor
  $_i = 1;

  //Variable Pagination
  $_anggota    = $Insert->Select_data('list_anggota');
  $_jumlahRow  = $_anggota->num_rows;
  $_page       = isset($_GET['page'])? (int)$_GET['page']:1;
  $_jumlahData = isset($_GET['q'])? (int)$_GET['q']:10;
  $_awal       = ($_page>1) ? ($_page * $_jumlahData) - $_jumlahData : 0;
  $longPage    = ceil($_jumlahRow/$_jumlahData);

  if ($_GET['page']>$longPage) {
    header('location : /keanggotaan');
  }

  //Mengambil Data pada Database
  $_anggota    = $Insert->Limit_data('list_anggota', '*', $_awal, $_jumlahData);

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

      <?php foreach ($_anggota as $value): ?>

        <?php if (!empty($value['Jabatan_2'])): ?>

          <tbody>
            <tr align="left" height="50">
              <td width='110' rowspan="5" align='center'><b><?php echo $_i; ?></b></td>
              <td width='200' rowspan="5" align='center'> <img src="Upload/<?php echo $value['Nama_Foto']; ?>" alt="Foto <?php echo $value['Nama_Lengkap']; ?>" width='80px'> </td>
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
          <tbody>
            <tr align="left" height="50">
              <td width='110' rowspan="4" align='center'><b><?php echo $_i; ?></b></td>
              <td width='200' rowspan="4" align='center'> <img src="Upload/<?php echo $value['Nama_Foto']; ?>" alt="Foto <?php echo $value['Nama_Lengkap']; ?>" width='80px'> </td>
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
    </table>
  </div>
  <div class="Pagination">
    <span><a href="?page=<?php echo Input::get('page')-1 ?>" onclick="<?php if($_page<=1)echo 'return false'; ?>" style="<?php if($_page<=1)echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>">Sebelumnya</a></span>

    <span><a href="?page=1" onclick="<?php if($_page==1)echo 'return false'; ?>" style="<?php if($_page==1)echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>">1</a></span>

    <?php if ($_page>=4): ?>
      <span><a href="#" onclick="return false">...</a></span>
    <?php endif; ?>

    <?php if ($_page==1): ?>
      <span><a href="?page=<?php echo $_page+1 ?>"><?php echo $_page+1 ?></a></span>
      <span><a href="?page=<?php echo $_page+2 ?>"><?php echo $_page+2 ?></a></span>
    <?php elseif ( $_page==2 && $_page<$longPage): ?>
      <span><a href="?page=<?php echo 2 ?> " onclick="<?php echo 'return false'; ?>" style="<?php echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo 2 ?></a></span>
      <span><a href="?page=<?php echo $_page+1 ?>"><?php echo $_page+1 ?></a></span>
    <?php elseif($_page>=3 && $_page<$longPage-1): ?>
      <span><a href="?page=<?php echo $_page-1 ?>"><?php echo $_page-1 ?></a></span>
      <span><a href="?page=<?php echo $_page ?>" onclick="<?php echo 'return false'; ?>" style="<?php echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo $_page ?></a></span>
      <span><a href="?page=<?php echo $_page+1 ?>"><?php echo $_page+1 ?></a></span>
    <?php elseif($_page==$longPage-1): ?>
      <span><a href="?page=<?php echo $_page-1 ?>"><?php echo $_page-1 ?></a></span>
      <span><a href="?page=<?php echo $_page ?>" onclick="<?php echo 'return false'; ?>" style="<?php echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo $_page ?></a></span>
    <?php elseif($_page==$longPage): ?>
      <span><a href="?page=<?php echo $_page-2 ?>"><?php echo $_page-2 ?></a></span>
      <span><a href="?page=<?php echo $_page-1 ?>"><?php echo $_page-1 ?></a></span>
    <?php endif; ?>


    <?php if ($_page<=$longPage-3): ?>
      <span><a href="#" onclick="return false">...</a></span>
    <?php endif; ?>

    <?php if ($longPage>=5): ?>
      <span><a href="?page=<?php echo $longPage ?>" onclick="<?php if($_page==$longPage)echo 'return false'; ?>" style="<?php if($_page==$longPage)echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>"><?php echo $longPage; ?></a></span>
    <?php endif; ?>

    <span><a href="?page=<?php echo $_page+1 ?>" onclick="<?php if($_page>=$longPage)echo 'return false'; ?>" style="<?php if($_page>=$longPage)echo 'background-color:rgb(135, 135, 135);color:rgb(163, 163, 163);'; ?>">Selanjutnya</a></span>
  </div>
</main>
<?php require_once 'Footer.php'; ?>
