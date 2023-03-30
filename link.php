<?php
include 'koneksi.php';
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
  <link rel="icon" href="uploads/identitas/<?= $d->favicon; ?>">
  <title><?= $d->nama; ?></title>
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Source+Code+Pro:ital,wght@1,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
</body>

</html>