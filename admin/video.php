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
        Galeri Video
      </div>
      <div class="box-body">
        <a href="tambah-video.php" class="text-green"><i class="fa fa-plus"></i> Tambah</a>

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
              <th>Judul</th>
              <th>Video</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $where = " WHERE 1=1 ";
            if (isset($_GET['key'])) {
              $where .= "AND judul LIKE '%" . addslashes($_GET['key']) . "%'";
            }

            $galeri = mysqli_query($conn, "SELECT * FROM video $where ORDER BY id DESC");
            //query aslinya
            //SELECT * FROM pengguna WHERE 1+1(true) AND nama LIKE '%a%' ORDER BY id DESC"
            if (mysqli_num_rows($galeri) > 0) {
              $no = 1;
              while ($p = mysqli_fetch_array($galeri)) {
            ?>

                <tr align="center">
                  <td><?= $no++; ?></td>
                  <td><?= $p['judul']; ?></td>
                  <td><iframe width="560" height="300" width="100%" src="<?= $p['link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></td>
                  <td>
                    <a href="edit-video.php?id=<?= $p['id']; ?>" class="text-orange" title="Edit Data"><i class="fa fa-edit"></i></a>
                    <a href="hapus-video.php?idvideo=<?= $p['id']; ?>" class="text-red" title="Hapus Data" onclick="return confirm('Yakin Hapus?')"><i class="fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
              <?php }
            } else { ?>
              <tr>
                <td colspan="4">Data Tidak Ada</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>