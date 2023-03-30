<?php include "header.php"; ?>
<div class="section">
  <div class="container text-center">
    <h2 class="text-center">Galeri Foto</h2>
    <?php
    $galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
    if (mysqli_num_rows($galeri) > 0) {
      $no = 1;
      while ($p = mysqli_fetch_array($galeri)) {
    ?>
        <div class="col-4">
          <a href="uploads/galeri/<?= $p['foto']; ?>" target="_blank" class="thumbnail-link">
            <div class="thumbnail-box">
              <div class="thumbnail-img" style="background-image:url('uploads/galeri/<?= $p['foto']; ?>')">
                <!-- <img src="uploads/jurusan/<?= $p['gambar']; ?>" width="145px" height="145px" alt=""> -->
              </div>
              <div class="thumbnail-text" style="background-color:#fff;">
                <b> <?= $p['keterangan']; ?></b>
              </div>
            </div>
          </a>
        </div>
      <?php }
    } else { ?>
      Tidak Ada Data
    <?php } ?>
  </div>
  <div class="container text-center" style="margin-top:110px;">
    <h2 class="text-center">Galeri Video</h2>
    <?php
    $video = mysqli_query($conn, "SELECT * FROM video ORDER BY id DESC ");
    if (mysqli_num_rows($video) > 0) {
      while ($v = mysqli_fetch_array($video)) {
    ?>
        <div class="col-4">
          <a href="<?= $v['link']; ?>" target="_blank" class="thumbnail-link">
            <div class="thumbnail-box">
              <div class="thumbnail-img">
                <iframe width="100%" width="100%" src="<?= $v['link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
              <div class="thumbnail-text" style="background-color:#fff;">
                <b> <?= $v['judul']; ?></b>
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