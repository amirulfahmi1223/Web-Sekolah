<?php
include "../koneksi.php";
session_start();
if (!isset($_SESSION["status_login"])) {
  echo '<script>window.location="../login.php?msg=Harap Login Terlebih Dahulu!"</script>';
}
date_default_timezone_set("Asia/jakarta");
$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../uploads/identitas/<?= $d->favicon; ?>">
  <title>Panel Admin - <?= $d->nama; ?></title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- link plugin tiny -->
  <script src="https://cdn.tiny.cloud/1/x4lgp68hm1obmdpg2agf4wgcrs6kx27j6mnll0oljpk69puw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    // plugins textarea
    tinymce.init({
      selector: '#mytextarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
        },
        {
          value: 'Email',
          title: 'Email'
        },
      ]
    });
  </script>
</head>

<body class="bg-light">
  <!--navbar-->
  <div class="navbar">
    <div class="container">
      <!--navbar-brand-->
      <h2 class="nav-brand float-left"><a href="index.php"><?= $d->nama; ?></a></h2>
      <!---Navbar Menu--->
      <ul class="nav-menu float-left">
        <li><a href="index.php">Dashboard</a></li>

        <?php
        if ($_SESSION['ulevel'] == 'Super Admin') { ?>
          <li><a href="pengguna.php">Pengguna</a></li>
        <?php
        } elseif ($_SESSION['ulevel'] == 'Admin') {
        ?>
          <li><a href="jurusan.php">Jurusan</a></li>
          <li><a href="informasi.php">Informasi</a></li>
          <li>
            <a href="#">Galeri <i class="fa fa-caret-down"></i></a>
            <!--sub menu-->
            <ul class="dropdown">
              <li><a href="galeri.php">Foto</a></li>
              <li><a href="video.php">Video</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>
            <!--sub menu-->
            <ul class="dropdown">
              <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
              <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
              <li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
            </ul>
          </li>
        <?php } ?>
        <li>
          <a href="#"><?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i></a>
          <!--sub menu-->
          <ul class="dropdown">
            <li><a href="ubah-password.php">Ubah Password</a></li>
            <li><a href="logout.php">Keluar</a></li>
          </ul>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
  </div>