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
        Pengguna
      </div>
      <div class="box-body">
        <a href="tambah-pengguna.php" class="text-green"><i class="fa fa-plus"></i> Tambah</a>
        <?php
        if (isset($_GET['success'])) {
          echo "<div class='alert alert-succes'>" . $_GET['success'] . "</div>";
        }

        ?>
        <form action="" method="GET">
          <div class="input-group">
            <input type="text" name="key" placeholder="Pencarian">
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </form>

        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>level</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $where = " WHERE 1=1 ";
            if (isset($_GET['key'])) {
              $where .= "AND nama LIKE '%" . addslashes($_GET['key']) . "%'";
            }

            $pengguna = mysqli_query($conn, "SELECT * FROM pengguna $where ORDER BY id DESC");
            //query aslinya
            //SELECT * FROM pengguna WHERE 1+1(true) AND nama LIKE '%a%' ORDER BY id DESC"
            if (mysqli_num_rows($pengguna) > 0) {
              $no = 1;
              while ($p = mysqli_fetch_array($pengguna)) {
            ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $p['nama']; ?></td>
                  <td><?= $p['username']; ?></td>
                  <td><?= $p['level']; ?></td>
                  <td>
                    <a href="edit-pengguna.php?id=<?= $p['id']; ?>" class="text-orange" title="Edit Data"><i class="fa fa-edit"></i></a>
                    <a href="hapus-pengguna.php?idpengguna=<?= $p['id']; ?>" class="text-red" title="Hapus Data" onclick="return confirm('Yakin Hapus?')"><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
              <?php }
            } else { ?>
              <tr>
                <td colspan="5">Data Tidak Ada</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>