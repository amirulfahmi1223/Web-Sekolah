<?php include 'header.php';
if ($_SESSION['ulevel'] != 'Admin') {
  echo "<script>alert('Hak Akses Data Pengguna Ditolak!')</script>";
  echo '<script>window.location="index.php"</script>';
}
?>

<?php
$galeri = mysqli_query($conn, "SELECT * FROM galeri
 WHERE id = '" . $_GET['id'] . "'");
if (mysqli_num_rows($galeri) == 0) {
  echo '<script>window.location="galeri.php"</script>';
}
$p = mysqli_fetch_object($galeri);
?>
<!---Content-->
<div class="content">
  <div class="container">
    <div class="box">

      <div class="box-header">
        Edit Galeri
      </div>
      <div class="box-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" value="<?= $p->keterangan; ?>" placeholder="keterangan" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Gambar</label>
            <img src="../uploads/galeri/<?= $p->foto; ?>" width="200px" class="image" alt="">
            <input type="hidden" name="gambar2" value="<?= $p->foto; ?>">
            <input type="file" name="gambar" class="input-kontrol" style="border:1px solid #ddd; margin-top:5px;">
          </div>
          <button type="button" onclick="window.location='galeri.php'" class="btn-secondary">Kembali</button>
          <input type="submit" name="submit" value="Simpan" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $ket = addslashes(ucwords($_POST['keterangan']));
          $currdate = date('Y-m-d H:i:s');
          if ($_FILES['gambar']['name'] != '') {
            $filename = $_FILES['gambar']['name'];
            $tmpname = $_FILES['gambar']['tmp_name'];
            $filesize = $_FILES['gambar']['size'];

            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
            $rename = 'galeri' . time() . '.' . $formatfile;

            //validasi file yang boleh masuk
            $allowedtype = array('png', 'jpg', 'jpeg', 'jfif', 'gif', 'JPG', 'PNG', 'JPEG', 'JIFIF');
            if ($filesize > 3000000) {
              echo "<div class='alert alert-error'>Ukuran File Tidak Boleh Lebih dari 3 Mb</div>";
              return false;
            }
            if (!in_array($formatfile, $allowedtype)) {
              echo "<div class='alert alert-error'>Format File Tidak diIzinkan!</div>";
              return false;
            } else {
              //menghapus gambar yang lama kemudian upload yang baru
              if (file_exists("../uploads/galeri/" . $_POST['gambar2'])) {
                unlink("../uploads/galeri/" . $_POST['gambar2']);
              }
              move_uploaded_file($tmpname, "../uploads/galeri/" . $rename);
            }
          } else {
            $rename = $_POST['gambar2'];
          }
          $update = mysqli_query($conn, "UPDATE galeri SET 
          keterangan = '" . $ket . "',
          foto = '" . $rename . "',
          updated_at = '" . $currdate . "'
          WHERE id = '" . $_GET['id'] . "'
        ");
          if ($update) {
            echo "<script>window.location='galeri.php?success=Edit Data Berhasil'</script>";
          } else {
            echo "<div class='alert alert-error'>Edit Data Gagal</div>";
          }
        }

        ?>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>