<?php
include "header.php";
?>
<!-- bagian banner -->
<div class="banner" style="background-image:url('uploads/identitas/<?= $d->foto_sekolah; ?>')">
  <div class="banner-text">
    <div class="container">
      <h3>Selamat Datang di <?= $d->nama; ?></h3>
      <p>Melalui Media Ini Diharapkan Informasi Dari Sekolah Dapat Diakses Dengan Mudah Oleh Siswa, Walimurid, Atau Masyarakat.</p>
    </div>
  </div>
</div>
<!-- bagian sambutan -->
<div class="section">
  <div class="container text-center">
    <h2>Sambutan Kepala Sekolah</h2>
    <img src="uploads/identitas/<?= $d->foto_kepsek; ?>" width="176px" alt="" style="border-radius: 50%;">
    <h4><?= $d->nama_kepsek; ?></h4>
    <p class="text-left" style="text-align:left;"><?= $d->sambutan_kepsek; ?></p>
  </div>
</div>
<!-- bagian jurusan -->
<div class="section" id="jurusan">
  <div class="container text-center">
    <h2>Jurusan</h2>
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
<!-- bagian informasi -->
<div class="section">
  <div class="container text-center">
    <h2>Informasi Terbaru</h2>
    <?php
    $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC LIMIT 8");
    if (mysqli_num_rows($informasi) > 0) {
      while ($p = mysqli_fetch_array($informasi)) {
    ?>
        <div class="col-4">
          <a href="detail-informasi.php?id=<?= $p['id']; ?>" class="thumbnail-link">
            <div class="thumbnail-box">
              <div class="thumbnail-img" style="background-image:url('uploads/informasi/<?= $p['gambar']; ?>')">
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
</body>

</html>