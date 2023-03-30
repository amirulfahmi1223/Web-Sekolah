<?php include "header.php"; ?>
<div class="section">
  <div class="container text-center">
    <h2 class="text-center">Jurusan</h2>
    <?php
    $jurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id DESC");
    if (mysqli_num_rows($jurusan) > 0) {
      while ($j = mysqli_fetch_array($jurusan)) {
    ?>
        <div class="col-4">
          <a href="detail-jurusan.php?id=<?= $j['id']; ?>" class="thumbnail-link">
            <div class="thumbnail-box">
              <div class="thumbnail-img" style="background-image:url('uploads/jurusan/<?= $j['gambar']; ?>')">
                <!-- <img src="uploads/jurusan/<?= $j['gambar']; ?>" width="145px" height="145px" alt=""> -->
              </div>
              <div class="thumbnail-text" style="background-color:#fff;">
                <b> <?= $j['nama']; ?></b>
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