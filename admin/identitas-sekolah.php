<?php include 'header.php';
if ($_SESSION['ulevel'] != 'Admin') {
  echo "<script>alert('Hak Akses Data Pengguna Ditolak!')</script>";
  echo '<script>window.location="index.php"</script>';
}
?>

<!---Content-->
<div class="content">
  <div class="container">
    <div class="box">
      <div class="box-header">
        Identitas Sekolah
      </div>
      <div class="box-body">
        <?php
        if (isset($_GET['success'])) {
          echo "<div class='alert alert-succes'>" . $_GET['success'] . "</div>";
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" value="<?= $d->nama; ?>" placeholder="Nama Sekolah" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value="<?= $d->email; ?>" placeholder="Email Sekolah" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Telepon</label>
            <input type="text" name="telp" value="<?= $d->telepon; ?>" placeholder="Telepon Sekolah" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" class="input-kontrol" placeholder="alamat" required><?= $d->alamat; ?></textarea>
          </div>
          <div class="form-group">
            <label for="">Google Maps</label>
            <textarea name="gmaps" class="input-kontrol" placeholder="Google Maps" required><?= $d->google_maps; ?></textarea>
          </div>
          <div class="form-group">
            <label for="">Logo</label>
            <img src="../uploads/identitas/<?= $d->logo; ?>" class="image" width="100px" alt="">
            <input type="hidden" name="logo_lama" value="<?= $d->logo; ?>">
            <input type="file" name="logo_baru" class="input-kontrol" style="border:1px solid #ddd; margin-top:5px;">
          </div>
          <div class="form-group">
            <label for="">Favicon</label>
            <img src="../uploads/identitas/<?= $d->favicon; ?>" class="image" alt="" width="100px">
            <input type="hidden" name="favicon_lama" value="<?= $d->favicon; ?>">
            <input type="file" name="favicon_baru" class="input-kontrol" style="border:1px solid #ddd; margin-top:5px;">
          </div>
          <input type="submit" name="submit" value="Simpan Perubahan" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $nama = addslashes(ucwords($_POST['nama']));
          $email = addslashes($_POST['email']);
          $telp = addslashes($_POST['telp']);
          $alamat = addslashes($_POST['alamat']);
          $gmaps = addslashes($_POST['gmaps']);
          $currdate = date('Y-m-d H:i:s');
          if ($_FILES['logo_baru']['name'] != '') {
            $filename_logo = $_FILES['logo_baru']['name'];
            $tmpname_logo = $_FILES['logo_baru']['tmp_name'];
            $filesize_logo = $_FILES['logo_baru']['size'];

            $formatfile_logo = pathinfo($filename_logo, PATHINFO_EXTENSION);
            $rename_logo = 'logo' . time() . '.' . $formatfile_logo;

            //validasi file yang boleh masuk
            $allowedtype_logo = array('png', 'jpg', 'jpeg', 'jfif', 'gif', 'JPG', 'PNG', 'JPEG', 'JIFIF');
            if ($filesize_logo > 4000000) {
              echo "<div class='alert alert-error'>Ukuran File Tidak Boleh Lebih dari 4 Mb</div>";
              return false;
            }
            if (!in_array($formatfile_logo, $allowedtype_logo)) {
              echo "<div class='alert alert-error'>Format File Tidak diIzinkan!</div>";
              return false;
            } else {
              //menghapus gambar yang lama kemudian upload yang baru
              if (file_exists("../uploads/identitas/" . $_POST['logo_lama'])) {
                unlink("../uploads/identitas/" . $_POST['logo_lama']);
              }
              move_uploaded_file($tmpname_logo, "../uploads/identitas/" . $rename_logo);
            }
          } else {
            $rename_logo = $_POST['logo_lama'];
          }
          //favicon
          if ($_FILES['favicon_baru']['name'] != '') {
            $filename_favicon = $_FILES['favicon_baru']['name'];
            $tmpname_favicon = $_FILES['favicon_baru']['tmp_name'];
            $filesize_favicon = $_FILES['favicon_baru']['size'];

            $formatfile_favicon = pathinfo($filename_favicon, PATHINFO_EXTENSION);
            $rename_favicon = 'favicon' . time() . '.' . $formatfile_favicon;

            //validasi file yang boleh masuk
            $allowedtype_favicon = array('png', 'jpg', 'jpeg', 'jfif', 'gif', 'JPG', 'PNG', 'JPEG', 'JIFIF');
            if ($filesize_favicon > 4000000) {
              echo "<div class='alert alert-error'>Ukuran File Tidak Boleh Lebih dari 4 Mb</div>";
              return false;
            }
            if (!in_array($formatfile_favicon, $allowedtype_favicon)) {
              echo "<div class='alert alert-error'>Format File Tidak diIzinkan!</div>";
              return false;
            } else {
              //menghapus gambar yang lama kemudian upload yang baru
              if (file_exists("../uploads/identitas/" . $_POST['favicon_lama'])) {
                unlink("../uploads/identitas/" . $_POST['favicon_lama']);
              }
              move_uploaded_file(
                $tmpname_favicon,
                "../uploads/identitas/" . $rename_favicon
              );
            }
          } else {
            $rename_favicon = $_POST['favicon_lama'];
          }
          $update = mysqli_query($conn, "UPDATE pengaturan SET 
          nama = '" . $nama . "',
          email = '" . $email . "',
          telepon = '" . $telp . "',
          alamat = '" . $alamat . "',
          google_maps = '" . $gmaps . "',
          logo = '" . $rename_logo . "',
          favicon = '" . $rename_favicon . "',
          updated_at = '" . $currdate . "'
          WHERE id = '" . $d->id . "'
        ");
          if ($update) {
            echo "<script>window.location='identitas-sekolah.php?success=Edit Data Berhasil'</script>";
          } else {
            echo "<div class='alert alert-error'>Edit Data Gagal</div>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>