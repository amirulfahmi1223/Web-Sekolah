<?php
session_start();
include 'koneksi.php';
if (isset($_SESSION["status_login"])) {
    echo '<script>window.location="admin/index.php"</script>';
}
$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="uploads/identitas/<?= $d->favicon; ?>">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <!---Page Login --->
    <div class="page-login">

        <!---Box-->
        <div class="box box-login">
            <!--box header--->
            <div class="box-header text-center">
                L O G I N
            </div>
            <!---Box body--->
            <div class="box-body">
                <?php if (isset($_GET['mgs'])) {
                    echo "<div class='alert alert-error'>" . $_GET['msg'] . "</div>";
                }

                ?>
                <!---form login-->
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class="input-kontrol">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="Password" name="pass" placeholder="Password" class="input-kontrol">
                    </div>

                    <input type="submit" name="submit" value="Login" class="btn">
                </form>

                <?php
                if (isset($_POST['submit'])) {

                    $user = mysqli_real_escape_string($conn, $_POST['user']);
                    $pass =  md5($_POST['pass']);

                    $cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '" . $user . "' ");
                    if (mysqli_num_rows($cek) > 0) {
                        $d = mysqli_fetch_object($cek);
                        $password_sekarang = $d->password;
                        $admin = "admin";
                        if ($pass == $d->password) {
                            $_SESSION['status_login'] = true;
                            $_SESSION['uid']          = $d->id;
                            $_SESSION['uname']          = $d->nama;
                            $_SESSION['ulevel']          = $d->level;
                            echo "<script>window.location = 'admin/index.php'</script>";
                            exit;
                        } else {
                            echo '<div class="alert alert-error">Password salah</div>';
                        }
                    } else {
                        echo '<div class="alert alert-error">Username tidak ditemukan</div>';
                    }
                }
                ?>

            </div>
            <!----box footer--->
            <div class="box-footer text-center">
                <a href="index.php">halaman utama</a>
            </div>
        </div>
    </div>
</body>

</html>