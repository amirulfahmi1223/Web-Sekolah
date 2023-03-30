<?php include 'header.php';
if ($_SESSION['ulevel'] != 'Admin') {
  echo "<script>alert('Hak Akses Data Pengguna Ditolak!')</script>";
  echo '<script>window.location="index.php"</script>';
}
?>

<?php
$video = mysqli_query($conn, "SELECT * FROM video
 WHERE id = '" . $_GET['id'] . "'");
if (mysqli_num_rows($video) == 0) {
  echo '<script>window.location="video.php"</script>';
}
$p = mysqli_fetch_object($video);
?>
<!---Content-->
<div class="content">
  <div class="container">
    <div class="box">

      <div class="box-header">
        Edit Video
      </div>
      <div class="box-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" value="<?= $p->judul; ?>" placeholder="Judul" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Link Video</label>
            <textarea name="link" class="input-kontrol" placeholder="Link Video"><?= $p->link; ?></textarea>
          </div>
          <button type="button" onclick="window.location='video.php'" class="btn-secondary">Kembali</button>
          <input type="submit" name="submit" value="Simpan" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $judul = addslashes(ucwords($_POST['judul']));
          $link = $_POST['link'];
          $currdate = date('Y-m-d H:i:s');
          $update = mysqli_query($conn, "UPDATE video SET 
           judul = '" . $judul . "',
            link = '" . $link . "',
            updated_at = '" . $currdate . "'
            WHERE id = '" . $_GET['id'] . "'
          ");
          if ($update) {
            echo "<script>window.location='video.php?success=Edit Data Berhasil'</script>";
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