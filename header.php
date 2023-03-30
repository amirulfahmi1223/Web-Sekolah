<?php
include 'koneksi.php';
date_default_timezone_set("Asia/jakarta");
$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "link.php"; ?>
</head>
<style>
  ul li a {
    font-weight: bolder;
  }
</style>

<body>
  <!-- bagian header -->
  <div class="header">
    <div class="container">
      <div class="header-logo">
        <img src="uploads/identitas/<?= $d->logo; ?>" alt="" width="70px">
        <h2><a href="index.php"><b><?= $d->nama; ?></b></a></h2>
      </div>
      <ul class="header-menu">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
        <li><a href="jurusan.php">Jurusan</a></li>
        <li><a href="galeri.php">Galeri</a></li>
        <li><a href="informasi.php">Informasi</a></li>
        <li><a href="kontak.php">Kontak</a></li>
      </ul>
    </div>
  </div>