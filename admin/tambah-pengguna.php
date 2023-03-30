<?php include 'header.php';
if ($_SESSION['ulevel'] != 'Super Admin') {
  echo "<script>alert('Hak Akses Data Pengguna Ditolak!')</script>";
  echo '<script>window.location="index.php"</script>';
}
?>

<!---Content-->
<div class="content">
  <div class="container">
    <div class="box">

      <div class="box-header">
        Tambah Pengguna
      </div>
      <div class="box-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" placeholder="Username" class="input-kontrol" required>
          </div>
          <div class="form-group">
            <label for="">Level</label>
            <select name="level" id="" class="input-kontrol" required>
              <option value="">--PILIH---</option>
              <option value="Admin">Admin</option>
              <option value="Super Admin">Super Admin</option>
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
          $pass = 123456;
          // $pass_hash =  password_hash($pass, PASSWORD_DEFAULT);
          //cek username sudah ada atau belum
          $result = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$user'");
          if (mysqli_fetch_assoc($result)) {
            echo "<div class='alert alert-error'>Username Sudah Terdaftar!</div>";
            return false; //dihentikan funcitionya
            //supaya insert nya gagal dan yang bawah tidak dijalankan
          }
          //cara lain untuk cek username/email
          // $cek= mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$user'");
          // if(mysqli_num_rows($cek)>0){
          //   echo "<div class='alert alert-error'>Username Sudah Digunakan!</div>";
          // }else{
          //   $simpan = mysqli_query($conn, "INSERT INTO pengguna VALUES(
          //     null,
          //     '" . $nama . "',
          //     '" . $user . "',
          //     '" . md5($pass) . "',
          //     '" . $level . "',
          //     null,
          //     null
          //   )");
          //   if ($simpan) {
          //     echo "<div class='alert alert-succes'>Simpan Berhasil</div>";
          //   } else {
          //     echo "<div class='alert alert-error'>Simpan Gagal</div>";
          //   }
          // }
          $simpan = mysqli_query($conn, "INSERT INTO pengguna VALUES(
            null,
            '" . $nama . "',
            '" . $user . "',
            '" . md5($pass) . "',
            '" . $level . "',
            null,
            null
          )");
          if ($simpan) {
            echo "<div class='alert alert-succes'>Simpan Berhasil</div>";
          } else {
            echo "<div class='alert alert-error'>Simpan Gagal</div>";
          }
        }

        ?>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>