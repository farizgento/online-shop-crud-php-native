<?php 
	include "koneksi.php";

 session_start();

	if(isset($_POST['kirim'])){
        
        $id_produk = $_POST['id_produk'];
        $penerima   = $_POST['penerima'];
        $alamat     = $_POST['alamat'];
        $jumlah    = $_POST['jumlah'];
        $id_user = $_SESSION['id_user'];

    $data = mysqli_query($mysqli, "INSERT INTO transaksi SET id_produk='$id_produk', id_user='$id_user', penerima='$penerima', alamat='$alamat', jumlah='$jumlah'") or die ("data salah : ".mysqli_error($mysqli));
    $produk = mysqli_query($mysqli, "SELECT * from produk where id_produk='$id_produk'") or die ('produk ga ada bos');
    $product_jadi = mysqli_fetch_array($produk);
    $stok_jadi = (int)$product_jadi['stok'] - (int)$jumlah;

    $stok = mysqli_query($mysqli, "UPDATE produk SET stok='$stok_jadi' WHERE id_produk='$id_produk'") or die ("data salah : ".mysqli_error($mysqli));

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopedia</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="style.css">   -->
</head>
  <body>
    
    <nav class="navbar navbar-light pb-2 shadow bg-light fixed-top">
      <div class="container-fluid">
        <h3><i class=" fab fa-shopify"></i><a class="navbar-brand fw-bold" href="#">Shopedia</a></h3>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Shopedia</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Menu </a>
                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                  <li><a class="dropdown-item" href="elektronik.php">Elektronik</a></li>
                  <li><a class="dropdown-item" href="peralatan_rumah.php">Peralatan rumah</a></li>
                  <li><a class="dropdown-item" href="otomotif.php">Otomotif</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout_user.php">Keluar</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="row mt-5 no-gutters" style="min-height:100vh;">
      <div class="col-md-2 bg-light">
        <ul class="list-group list-group-flush p-2 pt-5">
          <li class="list-group-item bg-dark text-light fw-bold"><i class="fas fa-list me-1"></i>Kategori Produk</li>
          <li class="list-group-item"><i class="fas fa-angle-right me-1"></i><a class="text-dark" href="elektronik.php" role="button">Elektronik</a></li>
          <li class="list-group-item"><i class="fas fa-angle-right me-1"></i></i><a class="text-dark" href="peralatan_rumah.php" role="button">Peralatan rumah</a></li>
          <li class="list-group-item"><i class="fas fa-angle-right me-1"></i></i><a class="text-dark" href="otomotif.php" role="button">Otomotif</a></li>
        </ul>
      </div>

      <div class="col-md-10 bg-light">
        <div class="card mt-5 mx-5">
            <div class="card-header">
                <?php 
                if ($data) {
                    echo "Transaksi berhasil";
                    // echo "<a href='peminjaman.php'> Lihat</a>";
                    ?>
            </div>
            <div class="card-body">
                    <h5 class="card-title"><?php echo "Transaksi berhasil"; ?></h5>
                    <p class="card-text"><?php echo "Silahkan melakukan pembayaran pada Bank BNI 4230482309" ?></p>
                    <a href="home_user.php" class="btn btn-primary">Selesai</a>
            </div>
        </div>
       </div> <?php } else {
?>
    </div>
    <div class="alert alert-primary" role="alert">
    <?php 
        echo "Gagal Input Data!!!";
        echo "<a href='create.php'>Kembali</a>";
    }
} 
?>
     </div>
    </div>
  </body>
</html>