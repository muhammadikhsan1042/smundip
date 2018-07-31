<?php
  require_once 'Header.php';

  if (Input::get('submit')) {

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
                              'integer'  => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Delegasi'        => array(
                              'required' => true,
                              'min'      => 4,
                              'max'      => 50
                            ),
      'Komisi'          => array(
                              'required' => true,
                            ),
      'Jabatan_1'       => array(
                              'required' => true,
                            ),
      'Upload_Foto'       => array(
                              'type'     => 'image',
                              'size'     => 5000000,
                              'exist'    => true,
                              'doble'    => false
                            ),
    ));

    //3. Lolos Check
    if ($validation->passed() && $Upload->setFile(Input::get('Upload_Foto')['tmp_name'], "./Upload/".Input::get('Nama_Panggilan').Input::get('Tanggal_Lahir').".jpg")) {

      // Input data ke database
      $Insert->Post_data('list_anggota', array(
        'Nama_Lengkap'     => Input::get('Nama_Lengkap'),
        'Nama_Panggilan'   => Input::get('Nama_Panggilan'),
        'Gender'           => Input::get('Jenis_Kelamin'),
        'Tempat_Lahir'     => Input::get('Tempat_Lahir'),
        'Tanggal_Lahir'    => Input::get('Tanggal_Lahir'),
        'Alamat_Rumah'     => Input::get('Alamat_Rumah'),
        'Alamat_Kos'       => Input::get('Alamat_Kos'),
        'Fakultas'         => Input::get('Fakultas'),
        'Jurusan'          => Input::get('Jurusan'),
        'Angkatan'         => Input::get('Angkatan'),
        'NIM'              => Input::get('NIM'),
        'Delegasi'         => Input::get('Delegasi'),
        'Komisi_atau_Biro' => Input::get('Komisi'),
        'Jabatan_1'        => Input::get('Jabatan_1'),
        'Jabatan_2'        => Input::get('Jabatan_2'),
        'Nama_Foto'        => Input::get('Nama_Lengkap').Input::get('Tanggal_Lahir').'.jpg'
      ));

    } else {
      $errors = $validation->errors();
    }
  }
?>
<main id="Input-data">
  <form action="/" method="post" enctype="multipart/form-data">
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
            <td width="300"><input type="text" name="Nama_Lengkap" placeholder="Masukan Nama Lengkap" ></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Nama Panggilan</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Nama_Panggilan" placeholder="Masukan Nama Panggilan" ></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jenis Kelamin</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Jenis_Kelamin">
                <option>-- Pilih Disini --</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Tempat Lahir</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Tempat_Lahir" placeholder="Masukan Tempat Lahir" ></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Tanggal Lahir</td>
            <td width="10">:</td>
            <td width="300"><input type="date" name="Tanggal_Lahir" ></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Alamat Rumah</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Alamat_Rumah" placeholder="Masukan Alamat Rumah" ></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Alamat Kos</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Alamat_Kos" placeholder="Masukan Alamat Kos" ></td>
          </tr>
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
            <td width="300"><input type="text" name="Fakultas" placeholder="Masukan Nama Fakultas" ></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jurusan</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Jurusan" placeholder="Masukan Nama Jurusan" ></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Angkatan</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Angkatan">
                <option >-- Pilih Disini --</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">NIM</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="NIM" placeholder="Masukan NIM" ></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Delegasi</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Delegasi" placeholder="Masukan Lembaga Delegasi" ></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Komisi atau Biro</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Komisi">
                <option value="null">-- Pilih disini --</option>
                <option value="Pimpinan">Pimpinan</option>
                <option value="Komisi 1">Komisi 1</option>
                <option value="Komisi 2">Komisi 2</option>
                <option value="Komisi 3">Komisi 3</option>
                <option value="Komisi 4">Komisi 4</option>
                <option value="Komisi 5">Komisi 5</option>
                <option value="Komisi 6">Komisi 6</option>
                <option value="BURT">Biro Urusan Rumah Tangga</option>
                <option value="BKSAP">Biru Kerjasama Antar Parlemen</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jabatan 1</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Jabatan_1">
                <option >-- Pilih disini --</option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Senator Komisi">Senator Komisi</option>
                <option value="Staf Ahli">Staf Ahli</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jabatan 2</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Jabatan_2">
                <option >-- Pilih disini --</option>
                <option value="Sekretaris Jendral">Sekretaris Jendral</option>
                <option value="Wakil Sekretaris Jendral">Wakil Sekretaris Jendral</option>
                <option value="Badan Legislasi">Badan Legislasi</option>
                <option value="Badan Kehormatan">Badan Kehormatan</option>
                <option value="Badan Anggaran">Badan Anggaran</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Upload Foto</td>
            <td width="10">:</td>
            <td width="300"><input type="file" name="Upload_Foto"></td>
          </tr>
        </tbody>
      </table>

      <input type="submit" name="submit" value="Simpan">
  </div>
</form>

</main>
<?php include_once 'Footer.php'; ?>
