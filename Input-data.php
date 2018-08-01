<?php
  require_once 'Header.php';

  if (Input::get('submit')) {

    $_equals = $Insert->Cek_data('list_anggota', 'NIM', Input::get('NIM'));

    //1. Pemanggilan Validasi
    $validation = new Validation();

    //2. Metode Check
    $validation->check(array(

      'Nama_Lengkap'    => array(
                              'required' => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Nama_Panggilan'  => array(
                              'required' => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Jenis_Kelamin'   => array(
                              'required' => true,
                            ),
      'Tempat_Lahir'    => array(
                              'required' => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Tanggal_Lahir'   => array(
                              'required' => true,
                            ),
      'Alamat_Rumah'    => array(
                              'required' => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Alamat_Kos'      => array(
                              'required' => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Fakultas'        => array(
                              'required' => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Jurusan'         => array(
                              'required' => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Angkatan'        => array(
                              'required' => true,
                            ),
      'NIM'             => array(
                              'required' => true,
                              'equals'   => $_equals,
                              'integer'  => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Delegasi'        => array(
                              'required' => true,
                            ),
      'Komisi'          => array(
                              'required' => true,
                            ),
      'Jabatan_1'       => array(
                              'required' => true,
                            ),
      'Upload_Foto'       => array(
                              'exist'    => true,
                              'type'     => 'image',
                              'size'     => 5000000,
                            ),
    ));

    //3. Lolos Check
    if ($validation->passed() && $Upload->setFile(Input::get('Upload_Foto')['tmp_name'], "./Upload/".Input::get('NIM').".jpg")) {

      if (Input::get('Jabatan_1') != 'Staf Ahli')$Delegasi = Input::get('Delegasi');
      else $Delegasi = null;

      if (Input::get('Komisi') != 'BKSAP' || Input::get('Komisi') != 'BURT')$Komisi = Input::get('Komisi');
      else $Komisi = 'Staf Ahli';

      if (Input::get('Jabatan_2') != 'null' && Input::get('Jabatan_1') != 'Staf Ahli' && Input::get('Komisi') != 'Pimpinan')$Jabatan_2 = Input::get('Jabatan_2');
      else $Jabatan_2 = null;

      // Input data ke database
      $Insert->Post_data('list_anggota', array(
        'Nama_Lengkap'     => Input::get('Nama_Lengkap'),
        'Nama_Panggilan'   => Input::get('Nama_Panggilan'),
        'Gender'           => Input::get('Jenis_Kelamin'),
        'Tempat_Lahir'     => Input::get('Tempat_Lahir'),
        'Tanggal_Lahir'    => Input::get('Tanggal_Lahir'),
        'Alamat_Rumah'     => Input::get('Alamat_Rumah'),
        'Alamat_Kos'       => Input::get('Alamat_Kos'),
        'Fakultas'         => strtoupper(Input::get('Fakultas')),
        'Jurusan'          => strtoupper(Input::get('Jurusan')),
        'Angkatan'         => Input::get('Angkatan'),
        'NIM'              => Input::get('NIM'),
        'Delegasi'         => strtoupper($Delegasi),
        'Komisi_atau_Biro' => $Komisi,
        'Jabatan_1'        => Input::get('Jabatan_1'),
        'Jabatan_2'        => $Jabatan_2,
        'Nama_Foto'        => Input::get('NIM').'.jpg'
      ));

      echo "<script>alert('Berhasil Memasukan Data');history.go(-1) </script>";
      header('Location: /');

    } else {
      $errors = $validation->errors();
    }
  }
?>
<main id="Input-data">
  <form action="/Input-data" method="post" enctype="multipart/form-data">
    <h1>Data Diri Anggota Senat Mahasiswa Universitas Diponegoro</h1>
    <div>
      <table>
        <tbody>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px"><b>Data Pribadi</b></td>
          </tr>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Nama Lengkap</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Nama_Lengkap" placeholder="Masukan Nama Lengkap" value="<?php echo Input::get('Nama_Lengkap') ?>"></td>
          </tr>

          <?php if (!empty($errors['Nama_Lengkap'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Nama_Lengkap']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Nama Panggilan</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Nama_Panggilan" placeholder="Masukan Nama Panggilan" value="<?php echo Input::get('Nama_Panggilan') ?>"></td>
          </tr>

          <?php if (!empty($errors['Nama_Panggilan'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Nama_Panggilan']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jenis Kelamin</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Jenis_Kelamin">
                <option value="null">-- Pilih Disini --</option>
                <option value="Pria" <?php if (Input::get('Jenis_Kelamin') == 'Pria'): ?>
                    selected
                <?php endif; ?>>Pria</option>
                <option value="Wanita" <?php if (Input::get('Jenis_Kelamin') == 'Wanita'): ?>
                    selected
                <?php endif; ?>>Wanita</option>
              </select>
            </td>
          </tr>

          <?php if (!empty($errors['Jenis_Kelamin'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Jenis_Kelamin']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Tempat Lahir</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Tempat_Lahir" placeholder="Masukan Tempat Lahir" value="<?php echo Input::get('Tempat_Lahir') ?>"></td>
          </tr>

          <?php if (!empty($errors['Tempat_Lahir'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Tempat_Lahir']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Tanggal Lahir</td>
            <td width="10">:</td>
            <td width="300"><input type="date" name="Tanggal_Lahir" value="<?php echo Input::get('Tanggal_Lahir') ?>"></td>
          </tr>

          <?php if (!empty($errors['Tanggal_Lahir'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Tanggal_Lahir']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Alamat Rumah</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Alamat_Rumah" placeholder="Masukan Alamat Rumah" value="<?php echo Input::get('Alamat_Rumah') ?>"></td>
          </tr>

          <?php if (!empty($errors['Alamat_Rumah'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Alamat_Rumah']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Alamat Kos</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Alamat_Kos" placeholder="Masukan Alamat Kos" value="<?php echo Input::get('Alamat_Kos') ?>"></td>
          </tr>

          <?php if (!empty($errors['Alamat_Kos'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Alamat_Kos']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25"></tr>
          <tr align="left" height="25"></tr>
        </tbody>
      </table>

      <table>
        <tbody>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px"><b>Data Anggota</b></td>
          </tr>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Fakultas</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Fakultas" placeholder="Contoh : Ilmu Sosial dan Budaya" value="<?php echo Input::get('Fakultas') ?>"></td>
          </tr>

          <?php if (!empty($errors['Fakultas'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Fakultas']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jurusan</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Jurusan" placeholder="Contoh : Ilmu Pemerintahan" value="<?php echo Input::get('Jurusan') ?>"></td>
          </tr>

          <?php if (!empty($errors['Jurusan'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Jurusan']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Angkatan</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Angkatan">
                <option value="null">-- Pilih Disini --</option>
                <option value="2015"<?php if (Input::get('Angkatan') == '2015'): ?>
                    selected
                <?php endif; ?>>2015</option>
                <option value="2016" <?php if (Input::get('Angkatan') == '2016'): ?>
                    selected
                <?php endif; ?>>2016</option>
                <option value="2017" <?php if (Input::get('Angkatan') == '2017'): ?>
                    selected
                <?php endif; ?>>2017</option>
              </select>
            </td>
          </tr>

          <?php if (!empty($errors['Angkatan'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Angkatan']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">NIM</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="NIM" placeholder="Masukan NIM" value="<?php echo Input::get('NIM') ?>"></td>
          </tr>

          <?php if (!empty($errors['NIM'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['NIM']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Komisi atau Biro</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Komisi">
                <option value="null">-- Pilih disini --</option>
                <option value="Pimpinan" <?php if (Input::get('Komisi') == 'Pimpinan'): ?>
                    selected
                <?php endif; ?>>Pimpinan</option>
                <option value="Komisi 1" <?php if (Input::get('Komisi') == 'Komisi 1'): ?>
                    selected
                <?php endif; ?>>Komisi 1</option>
                <option value="Komisi 2" <?php if (Input::get('Komisi') == 'Komisi 2'): ?>
                    selected
                <?php endif; ?>>Komisi 2</option>
                <option value="Komisi 3" <?php if (Input::get('Komisi') == 'Komisi 3'): ?>
                    selected
                <?php endif; ?>>Komisi 3</option>
                <option value="Komisi 4" <?php if (Input::get('Komisi') == 'Komisi 4'): ?>
                    selected
                <?php endif; ?>>Komisi 4</option>
                <option value="Komisi 5" <?php if (Input::get('Komisi') == 'Komisi 5'): ?>
                    selected
                <?php endif; ?>>Komisi 5</option>
                <option value="Komisi 6" <?php if (Input::get('Komisi') == 'Komisi 6'): ?>
                    selected
                <?php endif; ?>>Komisi 6</option>
                <option value="BURT" <?php if (Input::get('Komisi') == 'BURT'): ?>
                    selected
                <?php endif; ?>>Biro Urusan Rumah Tangga</option>
                <option value="BKSAP" <?php if (Input::get('Komisi') == 'BKSAP'): ?>
                    selected
                <?php endif; ?>>Biru Kerjasama Antar Parlemen</option>
              </select>
            </td>
          </tr>

          <?php if (!empty($errors['Komisi'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Komisi']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jabatan 1</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Jabatan_1">
                <option value="null">-- Pilih disini --</option>
                <option value="Ketua" <?php if (Input::get('Jabatan_1') == 'Ketua'): ?>
                    selected
                <?php endif; ?>>Ketua</option>
                <option value="Wakil Ketua" <?php if (Input::get('Jabatan_1') == 'Wakil Ketua'): ?>
                    selected
                <?php endif; ?>>Wakil Ketua</option>
                <option value="Senator Komisi" <?php if (Input::get('Jabatan_1') == 'Senator Komisi'): ?>
                    selected
                <?php endif; ?>>Senator Komisi</option>
                <option value="Staf Ahli" <?php if (Input::get('Jabatan_1') == 'Staf Ahli'): ?>
                    selected
                <?php endif; ?>>Staf Ahli</option>
              </select>
            </td>
          </tr>

          <?php if (!empty($errors['Jabatan_1'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Jabatan_1']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25" id="Delegasi">
            <td width="200" style="padding-left:6px">Delegasi</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Delegasi" placeholder="Contoh : " value="<?php echo Input::get('Delegasi') ?>"></td>
          </tr>

          <?php if (!empty($errors['Delegasi'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Delegasi']; ?></td>
            </tr>
          <?php endif; ?>

          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jabatan 2</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Jabatan_2">
                <option value="null">-- Pilih disini --</option>
                <option value="Sekretaris Jendral" <?php if (Input::get('Jabatan_2') == 'Sekretaris Jendral'): ?>
                    selected
                <?php endif; ?>>Sekretaris Jendral</option>
                <option value="Wakil Sekretaris Jendral" <?php if (Input::get('Jabatan_2') == 'Wakil Sekretaris Jendral'): ?>
                    selected
                <?php endif; ?>>Wakil Sekretaris Jendral</option>
                <option value="Badan Legislasi" <?php if (Input::get('Jabatan_2') == 'Badan Legislasi'): ?>
                    selected
                <?php endif; ?>>Badan Legislasi</option>
                <option value="Badan Kehormatan" <?php if (Input::get('Jabatan_2') == 'Badan Kehormatan'): ?>
                    selected
                <?php endif; ?>>Badan Kehormatan</option>
                <option value="Badan Anggaran" <?php if (Input::get('Jabatan_2') == 'Badan Anggaran'): ?>
                    selected
                <?php endif; ?>>Badan Anggaran</option>
              </select>
            </td>
          </tr>


          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Upload Foto</td>
            <td width="10">:</td>
            <td width="300"><input type="file" name="Upload_Foto"></td>
          </tr>

          <?php if (!empty($errors['Upload_Foto'])): ?>
            <tr>
              <td width="200" style="padding-left:6px; color:red"><?php echo $errors['Upload_Foto']; ?></td>
            </tr>
          <?php endif; ?>

        </tbody>
      </table>

      <input type="submit" name="submit" value="Simpan" id="inputData">
  </div>
</form>

</main>
<?php include_once 'Footer.php'; ?>
