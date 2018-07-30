<?php include_once 'Header.php'; ?>
<main id="Input-data">
  <form class="" action="index.php" method="post">
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
            <td width="300"><input type="text" name="namaLengkap" placeholder="Masukan Nama Lengkap" required></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Nama Panggilan</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="namaPanggilan" placeholder="Masukan Nama Panggilan" required></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jenis Kelamin</td>
            <td width="10">:</td>
            <td width="300">
              <select name="jenisKelamin">
                <option>-- Silahkan Pilih --</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Tempat Lahir</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="tempatLahir" placeholder="Masukan Tempat Lahir" required></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Tanggal Lahir</td>
            <td width="10">:</td>
            <td width="300"><input type="date" name="tanggalLahir" required></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Alamat Rumah</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="alamatRumah" placeholder="Masukan Alamat Rumah" required></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Alamat Kos</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="alamatKos" placeholder="Masukan Alamat Kos" required></td>
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
            <td width="300"><input type="text" name="Jurusan" placeholder="Masukan Nama Jurusan" required></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Angkatan</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Angkatan">
                <option >-- Silahkan Pilih --</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">NIM</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="NIM" placeholder="Masukan NIM" required></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Delegasi</td>
            <td width="10">:</td>
            <td width="300"><input type="text" name="Delegasi" placeholder="Masukan Lembaga Delegasi" required></td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Komisi atau Biro</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Komisi">
                <option >-- Pilih disini --</option>
                <option value="Komisi1">Komisi 1</option>
                <option value="Komisi2">Komisi 2</option>
                <option value="Komisi3">Komisi 3</option>
                <option value="Komisi4">Komisi 4</option>
                <option value="Komisi5">Komisi 5</option>
                <option value="Komisi6">Komisi 6</option>
                <option value="BURT">Biro Urusan Rumah Tangga</option>
                <option value="BKSAP">Biru Kerjasama Antar Parlemen</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jabatan 1</td>
            <td width="10">:</td>
            <td width="300">
              <select name="Jabatan1">
                <option >-- Pilih disini --</option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil-Ketua">Wakil Ketua</option>
                <option value="Senator">Senator Komisi</option>
                <option value="StaffAhli">Staff Ahli Komisi</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Jabatan 2</td>
            <td width="10">:</td>
            <td width="300">
              <select>
                <option >-- Pilih disini --</option>
                <option value="Sekjend">Sekretaris Jendral</option>
                <option value="Wasekjend">Wakil Sekretaris Jendral</option>
                <option value="Baleg">Badan Legislasi</option>
                <option value="BK">Badan Kehormatan</option>
                <option value="Banggar">Badan Anggaran</option>
              </select>
            </td>
          </tr>
          <tr align="left" height="25">
            <td width="200" style="padding-left:6px">Upload Foto</td>
            <td width="10">:</td>
            <td width="300"><input type="file" name="foto"></td>
          </tr>
        </tbody>
      </table>

      <input type="submit" name="submit" value="Simpan">
  </div>
</form>

</main>
<?php include_once 'Footer.php'; ?>
