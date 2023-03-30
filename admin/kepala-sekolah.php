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
        Kepala Sekolah
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
            <input type="text" name="nama" class="input-kontrol" placeholder="Nama Kepala Sekolah" value="<?= $d->nama_kepsek; ?>" required>
          </div>
          <div class="form-group">
            <label for="">Sambutan</label>
            <textarea name="sambutan" id="mytextarea" class="input-kontrol" placeholder="Sambutan Kepala Sekolah" required><?= $d->sambutan_kepsek; ?></textarea>
          </div>
          <div class="form-group">
            <label for="">Foto</label>
            <img src="../uploads/identitas/<?= $d->foto_kepsek; ?>" class="image" width="100px" alt="">
            <input type="hidden" name="foto_lama" value="<?= $d->foto_kepsek; ?>">
            <input type="file" name="foto_baru" class="input-kontrol" style="border:1px solid #ddd; margin-top:5px;">
          </div>
          <input type="submit" name="submit" value="Simpan Perubahan" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $nama = addslashes($_POST['nama']);
          $sambutan = addslashes($_POST['sambutan']);
          $currdate = date('Y-m-d H:i:s');
          if ($_FILES['foto_baru']['name'] != '') {
            $filename_foto = $_FILES['foto_baru']['name'];
            $tmpname_foto = $_FILES['foto_baru']['tmp_name'];
            $filesize_foto = $_FILES['foto_baru']['size'];

            $formatfile_foto = pathinfo($filename_foto, PATHINFO_EXTENSION);
            $rename_foto = 'foto-kepsek' . time() . '.' . $formatfile_foto;

            //validasi file yang boleh masuk
            $allowedtype_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif', 'JPG', 'PNG', 'JPEG', 'JIFIF');
            if ($filesize_foto > 4000000) {
              echo "<div class='alert alert-error'>Ukuran Foto Kepala Sekolah Tidak Boleh Lebih dari 4 Mb</div>";
              return false;
            }
            if (!in_array($formatfile_foto, $allowedtype_foto)) {
              echo "<div class='alert alert-error'>Format Foto Kepala Sekolah Tidak diIzinkan!</div>";
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
          nama_kepsek = '" . $nama . "',
          sambutan_kepsek = '" . $sambutan . "',
          foto_kepsek = '" . $rename_foto . "',
          updated_at = '" . $currdate . "'
          WHERE id = '" . $d->id . "'
        ");
          if ($update) {
            echo "<script>window.location='kepala-sekolah.php?success=Edit Data Berhasil'</script>";
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