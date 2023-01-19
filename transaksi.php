<?php 
	include "koneksi.php";
	$data = mysqli_query($mysqli, "SELECT * FROM produk WHERE id_produk='$_GET[id_produk]'");
    $datashow = mysqli_fetch_array($data);

  
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
                <a class="nav-link active" aria-current="page" href="home_user.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Menu </a>
                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                  <li><a class="dropdown-item" href="elektronik_user.php">Elektronik</a></li>
                  <li><a class="dropdown-item" href="peralatan_rumah_user.php">Peralatan rumah</a></li>
                  <li><a class="dropdown-item" href="otomotif_user.php">Otomotif</a></li>
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
                Transaksi
            </div>
            <div class="card-body">
                <div class="row m-5">
                    <div class="col-md-6">
                    <img src="produk/<?php echo $datashow['gambar']?>" alt="" style="width: 297px; height: 233px; ">
                    </div>
                    <div class="col-md-6">
                    <form action="action_transaksi.php" method="post">
                    <input type="hidden" name="id_produk"  value="<?php echo $datashow['id_produk']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama penerima</label>
                            <input type="text" autocomplete="off" class="form-control" id="exampleInputEmail1" name="penerima">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                            <input type="text" autocomplete="off" class="form-control" name="alamat" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jumlah</label>
                            <input type="number" autocomplete="off" class="form-control" name="jumlah" id="exampleInputPassword1">
                        </div>
                        <button type="kirim" name="kirim" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>