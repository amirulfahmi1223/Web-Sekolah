<?php
include '../koneksi.php';
if ($_GET['idinformasi'] == '') {
  echo '<script>window.location="galeri.php"</script>';
}

if (isset($_GET['idinformasi'])) {
  //menghapus file gambar di db sekaligus difoldernya
  //disimpanya gambar
  $informasi = mysqli_query($conn, "SELECT gambar FROM informasi WHERE id ='" . $_GET['idinformasi'] . "' ");
  //mengecek data di table
  if (mysqli_num_rows($informasi) > 0) {
    $p = mysqli_fetch_object($informasi);
    //mengecek data difolder
    if (file_exists("../uploads/informasi/" . $p->gambar)) {
      //jika ada difolder jurusan maka lakukan proses hapus file
      unlink("../uploads/informasi/" . $p->gambar);
    }
  }
  $delete = mysqli_query($conn, "DELETE FROM informasi WHERE id = '" . $_GET['idinformasi'] . "'");
  echo "<script>window.location='informasi.php'</script>";
}
