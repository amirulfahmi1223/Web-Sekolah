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
        Tambah Video
      </div>
      <div class="box-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" placeholder="Judul" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Link Video</label>
            <textarea name="link" class="input-kontrol" placeholder="Link Video"></textarea>
          </div>
          <button type="button" onclick="window.location='video.php'" class="btn-secondary">Kembali</button>
          <input type="submit" name="submit" value="Simpan" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {


          $judul = addslashes(ucwords($_POST['judul']));
          $link = $_POST['link'];
          $simpan = mysqli_query($conn, "INSERT INTO video VALUES(
              null,
              '" . $judul . "',
              '" . $link . "',
              null,
              null
            )");
          if ($simpan) {
            echo "<div class='alert alert-succes'>Simpan Berhasil</div>";
          } else {
            echo "<div class='alert alert-error'>Simpan Gagal</div>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>