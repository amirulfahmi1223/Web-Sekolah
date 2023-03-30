<?php include "header.php"; ?>
<div class="section" style="background-color:#FFFFFF;">
  <div class="container">
    <h2 class="text-center">Kontak</h2>
    <div class="col-4">
      <p style="margin-bottom:12px;"><b>Alamat : </b><br><?= $d->alamat; ?></p>
      <p style="margin-bottom:12px;"><b>Telepon : </b><br><?= $d->telepon; ?></p>
      <p style="margin-bottom:12px;"><b>Email : </b><br><?= $d->email; ?></p>
    </div>
    <div class="box-gmaps">
      <iframe src="<?= $d->google_maps; ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>