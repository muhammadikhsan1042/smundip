<?php
  require_once __DIR__.'/../Layout/Header.php';
  $_anggota = (!empty($Insert->all_Count('list_anggota', 'NIM', Input::get('NIM')))) ? $Insert->all_Count('list_anggota', 'NIM', Input::get('NIM')) : header('location: /keanggotaan') ;
  if(empty($_anggota->num_rows))header("location: /keanggotaan");
  $_sqlArray   = $_anggota->fetch_assoc();
  $_i          = 0;
  $_l          = 15;
  if (empty($_sqlArray['Delegasi']))$_l -= 1;
  if (empty($_sqlArray['Jabatan_2']))$_l -= 1;
?>
<main id="Page_Profil">
  <table>
    <thead>
      <tr align="left" height="55">
        <th align='center'><b>PROFIL ANGGOTA</b></th>
        <th align='left' colspan="3"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ( $_sqlArray as $index => $values): $index = str_replace("_", " ", $index);?>
        <?php if ($_i==1): ?>
          <tr align="left" height="25">
            <td width="200" valign="top" rowspan="<?php echo $_l ?>" align='center'><img src="/Upload/<?php echo $_sqlArray['Nama_Foto']; ?>" alt="Foto Profil" width='120px'></td>
            <td width="200" style="padding-left:6px"><?php echo $index; ?></td>
            <td width="10">:</td>
            <td width="400" align='left'><?php echo $values ?></td>
          </tr>
        <?php elseif ($_i > 1 && $_i < 16 && !empty($values)): ?>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px"><?php echo $index; ?></td>
            <td width="10">:</td>
            <td width="400" align='left'><?php if ($index == 'Tanggal Lahir') echo date('d F Y', strtotime($values));else echo $values;?></td>
          </tr>
        <?php endif; ?>
      <?php $_i++; endforeach; ?>
    </tbody>
  </table>
</main>
<?php require_once __DIR__.'/../Layout/Footer.php'; ?>
