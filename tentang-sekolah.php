<?php include "header.php"; ?>
<div class="section">
  <div class=" container text-center">
    <h2 class="text-center">Tentang Sekolah</h2>
    <img src="uploads/identitas/<?= $d->foto_sekolah; ?>" width="82%" class="image">
    <br><br>
    <?= $d->tentang_sekolah; ?>
  </div>
</div>
<?php include "footer.php"; ?>