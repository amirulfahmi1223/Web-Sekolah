<?php
include '../koneksi.php';
if ($_GET['idgaleri'] == '') {
  echo '<script>window.location="galeri.php"</script>';
}

if (isset($_GET['idgaleri'])) {
  //menghapus file gambar di db sekaligus difoldernya
  //disimpanya gambar
  $galeri = mysqli_query($conn, "SELECT foto FROM galeri WHERE id ='" . $_GET['idgaleri'] . "' ");
  //mengecek data di table
  if (mysqli_num_rows($galeri) > 0) {
    $p = mysqli_fetch_object($galeri);
    //mengecek data difolder
    if (file_exists("../uploads/galeri/" . $p->foto)) {
      //jika ada difolder jurusan maka lakukan proses hapus file
      unlink("../uploads/galeri/" . $p->foto);
    }
  }
  $delete = mysqli_query($conn, "DELETE FROM galeri WHERE id = '" . $_GET['idgaleri'] . "'");
  echo "<script>window.location='galeri.php'</script>";
}
