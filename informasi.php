<?php include "header.php"; ?>
<div class="section">
  <div class="container text-center">
    <h2 class="text-center">Informasi</h2>
    <?php
    $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC");
    if (mysqli_num_rows($informasi) > 0) {
      $no = 1;
      while ($p = mysqli_fetch_array($informasi)) {
    ?>
        <div class="col-4">
          <a href="detail-informasi.php?id=<?= $p['id']; ?>" class="thumbnail-link">
            <div class="thumbnail-box">
              <div class="thumbnail-img" style="background-image:url('uploads/informasi/<?= $p['gambar']; ?>')">
                <!-- <img src="uploads/jurusan/<?= $j['gambar']; ?>" width="145px" height="145px" alt=""> -->
              </div>
              <div class="thumbnail-text" style="background-color:#fff;">
                <b> <?= substr($p['judul'], 0, 50) ?></b>
              </div>
            </div>
          </a>
        </div>
      <?php }
    } else { ?>
      Tidak Ada Data
    <?php } ?>
  </div>
</div>
<?php include "footer.php"; ?>