<?php include 'header.php';
if ($_SESSION['ulevel'] != 'Super Admin') {
  echo "<script>alert('Hak Akses Data Pengguna Ditolak!')</script>";
  echo '<script>window.location="index.php"</script>';
}
?>

<?php
if ($_GET['id'] == '') {
  echo '<script>window.location="pengguna.php"</script>';
}
$pengguna = mysqli_query($conn, "SELECT * FROM pengguna
 WHERE id = '" . $_GET['id'] . "'");
$p = mysqli_fetch_object($pengguna);
?>
<!---Content-->
<div class="content">
  <div class="container">
    <div class="box">

      <div class="box-header">
        Edit Pengguna
      </div>
      <div class="box-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" value="<?= $p->nama; ?>" placeholder="Nama Lengkap" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" value="<?= $p->username; ?>" placeholder="Username" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Level</label>
            <select name="level" id="" class="input-kontrol" required>
              <option value="">--PILIH---</option>
              <option value="Admin" <?= ($p->level == 'Admin') ? 'selected' : ''; ?>>Admin</option>
              <option value="Super Admin" <?= ($p->level == 'Super Admin') ? 'selected' : ''; ?>>Super Admin</option>
            </select>
          </div>
          <button type="button" onclick="window.location='pengguna.php'" class="btn-secondary">Kembali</button>
          <input type="submit" name="submit" value="Simpan" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $nama = addslashes(ucwords($_POST['nama']));
          $user = addslashes($_POST['username']);
          $level = $_POST['level'];
          $currdate = date('Y-m-d H:i:s');
          $update = mysqli_query($conn, "UPDATE pengguna SET 
            nama = '" . $nama . "',
            username = '" . $user . "',
            level = '" . $level . "',
            updated_at = '" . $currdate . "'
            WHERE id = '" . $_GET['id'] . "'
          ");
          if ($update) {
            echo "<script>window.location='pengguna.php?success=Edit Data Berhasil'</script>";
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