<?php include 'header.php';
if ($_SESSION['ulevel'] != 'Admin') {
  echo "<script>alert('Hak Akses Data Pengguna Ditolak!')</script>";
  echo '<script>window.location="index.php"</script>';
}
?>

<!---Content-->
<div class="content">
  <div class="container">
    <div class="box">

      <div class="box-header">
        Tambah Jurusan
      </div>
      <div class="box-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" placeholder="Nama Jurusan" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" class="input-kontrol" placeholder="Keterangan" required></textarea>
          </div>
          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="input-kontrol" style="border:1px solid #ddd; margin-top:2px;" required>
          </div>
          <button type="button" onclick="window.location='jurusan.php'" class="btn-secondary">Kembali</button>
          <input type="submit" name="submit" value="Simpan" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {


          $nama = addslashes(ucwords($_POST['nama']));
          $ket = addslashes($_POST['keterangan']);
          $filename = $_FILES['gambar']['name'];
          $tmpname = $_FILES['gambar']['tmp_name'];
          $filesize = $_FILES['gambar']['size'];

          $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
          $rename = 'jurusan' . time() . '.' . $formatfile;

          //validasi file yang boleh masuk
          $allowedtype = array('png', 'jpg', 'jpeg', 'jfif', 'gif', 'JPG', 'PNG', 'JPEG', 'JIFIF');
          //cek jika ukurannya terlalu besar
          if ($filesize > 2000000) {
            echo "<div class='alert alert-error'>Ukuran File Tidak Boleh Lebih dari 2 Mb</div>";
            return false;
          }
          if (!in_array($formatfile, $allowedtype)) {
            echo "<div class='alert alert-error'>Format File Tidak diIzinkan!</div>";
          } else {
            move_uploaded_file($tmpname, "../uploads/jurusan/" . $rename);
            $simpan = mysqli_query($conn, "INSERT INTO jurusan VALUES(
              '',
              '" . $nama . "',
              '" . $ket . "',
              '" . $rename . "',
              null,
              null
            )");
            if ($simpan) {
              echo "<div class='alert alert-succes'>Simpan Berhasil</div>";
            } else {
              echo "<div class='alert alert-error'>Simpan Gagal</div>";
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>