<?php
include '../koneksi.php';
if ($_GET['idpengguna'] == '') {
  echo '<script>window.location="pengguna.php"</script>';
}
if ($_GET['idjurusan'] == '') {
  echo '<script>window.location="jurusan.php"</script>';
}
if (isset($_GET['idpengguna'])) {
  $delete = mysqli_query($conn, "DELETE FROM pengguna WHERE id = '" . $_GET['idpengguna'] . "'");
  echo "<script>window.location='pengguna.php'</script>";
}
