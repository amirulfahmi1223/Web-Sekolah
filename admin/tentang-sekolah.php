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
        Tentang Sekolah
      </div>
      <div class="box-body">

        <?php
        if (isset($_GET['success'])) {
          echo "<div class='alert alert-succes'>" . $_GET['success'] . "</div>";
        }

        ?>
        <form action="" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="">Tentang Sekolah</label>
            <textarea name="tentang_sekolah" class="input-kontrol" placeholder="Tentang Sekolah" id="mytextarea" required><?= $d->tentang_sekolah; ?></textarea>
          </div>
          <div class="form-group">
            <label for="">Foto Sekolah</label>
            <img src="../uploads/identitas/<?= $d->foto_sekolah; ?>" class="image" width="100px" alt="">
            <input type="hidden" name="foto_lama" value="<?= $d->foto_sekolah; ?>">
            <input type="file" name="foto_baru" class="input-kontrol" style="border:1px solid #ddd; margin-top:5px;">
          </div>
          <input type="submit" name="submit" value="Simpan Perubahan" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $tentang = addslashes($_POST['tentang_sekolah']);
          $currdate = date('Y-m-d H:i:s');
          if ($_FILES['foto_baru']['name'] != '') {
            $filename_foto = $_FILES['foto_baru']['name'];
            $tmpname_foto = $_FILES['foto_baru']['tmp_name'];
            $filesize_foto = $_FILES['foto_baru']['size'];

            $formatfile_foto = pathinfo($filename_foto, PATHINFO_EXTENSION);
            $rename_foto = 'foto-sekolah' . time() . '.' . $formatfile_foto;

            //validasi file yang boleh masuk
            $allowedtype_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif', 'JPG', 'PNG', 'JPEG', 'JIFIF');
            if ($filesize_foto > 4000000) {
              echo "<div class='alert alert-error'>Ukuran Foto Sekolah Tidak Boleh Lebih dari 4 Mb</div>";
              return false;
            }
            if (!in_array($formatfile_foto, $allowedtype_foto)) {
              echo "<div class='alert alert-error'>Format Foto Sekolah Tidak diIzinkan!</div>";
              return false;
            } else {
              //menghapus gambar yang lama kemudian upload yang baru
              if (file_exists("../uploads/identitas/" . $_POST['foto_lama'])) {
                unlink("../uploads/identitas/" . $_POST['foto_lama']);
              }
              move_uploaded_file($tmpname_foto, "../uploads/identitas/" . $rename_foto);
            }
          } else {
            $rename_foto = $_POST['foto_lama'];
          }

          $update = mysqli_query($conn, "UPDATE pengaturan SET 
          tentang_sekolah = '" . $tentang . "',
          foto_sekolah = '" . $rename_foto . "',
          updated_at = '" . $currdate . "'
          WHERE id = '" . $d->id . "'
        ");
          if ($update) {
            echo "<script>window.location='tentang-sekolah.php?success=Edit Data Berhasil'</script>";
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