<?php
include '../koneksi.php';
if ($_GET['idvideo'] == '') {
  echo '<script>window.location="video.php"</script>';
}

if (isset($_GET['idvideo'])) {
  $delete = mysqli_query($conn, "DELETE FROM video WHERE id = '" . $_GET['idvideo'] . "'");
  echo "<script>window.location='video.php'</script>";
}
