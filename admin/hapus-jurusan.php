<?php
include '../koneksi.php';
if ($_GET['idjurusan'] == '') {
  echo '<script>window.location="jurusan.php"</script>';
}

if (isset($_GET['idjurusan'])) {
  //menghapus file gambar di db sekaligus difoldernya
  //disimpanya gambar
  $jurusan = mysqli_query($conn, "SELECT gambar FROM jurusan WHERE id ='" . $_GET['idjurusan'] . "' ");
  //mengecek data di table
  if (mysqli_num_rows($jurusan) > 0) {
    $p = mysqli_fetch_object($jurusan);
    //mengecek data difolder
    if (file_exists("../uploads/jurusan/" . $p->gambar)) {
      //jika ada difolder jurusan maka lakukan proses hapus file
      unlink("../uploads/jurusan/" . $p->gambar);
    }
  }
  $delete = mysqli_query($conn, "DELETE FROM jurusan WHERE id = '" . $_GET['idjurusan'] . "'");
  echo "<script>window.location='jurusan.php'</script>";
}
