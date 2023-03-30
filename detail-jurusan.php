<?php include "header.php"; ?>
<div class="section">
  <div class="container text-center">
    <?php
    $jurusan = mysqli_query($conn, "SELECT * FROM jurusan
    WHERE id = '" . $_GET['id'] . "'");
    if (mysqli_num_rows($jurusan) == 0) {
      echo '<script>window.location="index.php"</script>';
    }
    $p = mysqli_fetch_object($jurusan);
    ?>
    <h2 class="text-center"><?= $p->nama; ?></h2>
    <img src="uploads/jurusan/<?= $p->gambar; ?>" width="25%" class="image">
    <br>
    <?= $p->keterangan; ?>
  </div>
</div>
<?php include "footer.php"; ?>