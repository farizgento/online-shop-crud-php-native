<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Shopedia</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </head>
  <body class="bg">
  <nav class="navbar navbar-light pb-2 shadow bg-light fixed-top">
      <div class="container-fluid">
        <h3><i class=" fab fa-shopify"></i><a class="navbar-brand fw-bold" href="home.php">Shopedia</a></h3>
        
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
                  <li><a class="dropdown-item" href="laporan_keuangan.php">Laporan keuangan</a></li>
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
    <div class="position-relative" style="min-height: 110vh">
      <div class="container position-absolute top-50 start-50 translate-middle fw-bold my-4">
        <div class="text-center shadow-md p-5 pt-3 mt-5 mb-5 border border-success border-3 bg-light bg-gradient">
          <h1 class="mb-4">Laporan Trasaksi</h1>
          <table class="table mb-5">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Stok</th>
                <th scope="col">Terjual</th>
                <th scope="col">Pendapatan</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $datashow = $produk = mysqli_query($mysqli, "SELECT * from produk ") or die ('produk ga ada bos');
                  $nomor = 0;
                  // $total=0;
                  // $laba=0;
                  $data = mysqli_query($mysqli,"SELECT produk.nama, sum(produk.harga*transaksi.jumlah) as 'laba',produk.stok,transaksi.jumlah
                  FROM produk JOIN transaksi ON produk.id_produk=transaksi.id_produk group by produk.id_produk");
                  while ($show = mysqli_fetch_array($data)){
                      $nomor++;
                      // $total=$total+$show['jumlah'];
                      // $laba=$laba+$show['harga'];
                      // SELECT SUM(column_name) FROM table_name WHERE condition;

                      ?>
              <tr>
                <th scope="row"><?php echo $nomor;?></th>
                <td><?php echo $show['nama'];?></td>
                <td><?php echo $show['stok'];?></td>
                <td><?php echo $show['jumlah']?></td>
                <td><?php echo $show['laba']?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="mb-2">
            <a class="form-control btn btn-secondary fw-bold" href="home.php" role="button">Kembali</a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
