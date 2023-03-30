<?php include "header.php"; ?>
<div class="section">
  <div class="container">
    <?php
    $informasi = mysqli_query($conn, "SELECT * FROM informasi
    INNER JOIN pengguna ON pengguna.id = informasi.created_by
    WHERE informasi.id = '" . $_GET['id'] . "'");
    if (mysqli_num_rows($informasi) == 0) {
      echo '<script>window.location="index.php"</script>';
    }
    $p = mysqli_fetch_object($informasi);
    ?>
    <h2 class="text-center"><?= $p->judul; ?></h2>
    <small><b>Dibuat pada <?= date('d/m/Y', strtotime($p->created_at)); ?>, oleh <?= $p->nama; ?></b></small>
    <br>
    <div class="main text-center">
      <img src="uploads/informasi/<?= $p->gambar; ?>" width="80%" class="image">
    </div>
    <br>
    <div style="margin-left:120px;">
      <?= $p->keterangan; ?>
    </div>
  </div>
</div>
<style>
  small {
    margin-left: 122px;
  }
</style>
<?php include "footer.php"; ?>