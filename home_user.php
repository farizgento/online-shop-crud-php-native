<?php 
include "koneksi.php";
 session_start();
  
 if (!isset($_SESSION['id_user'])) {
     header("Location: index.php");
 }
  
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shoped</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">  
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
          <li class="list-group-item"><i class="fas fa-angle-right me-1"></i><a class="text-dark" href="elektronik_user.php" role="button">Elektronik</a></li>
          <li class="list-group-item"><i class="fas fa-angle-right me-1"></i></i><a class="text-dark" href="peralatan_rumah_user.php" role="button">Peralatan rumah</a></li>
          <li class="list-group-item"><i class="fas fa-angle-right me-1"></i></i><a class="text-dark" href="otomotif_user.php" role="button">Otomotif</a></li>
        </ul>
      </div>
      <div class="col-md-10 bg-light">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/slide1.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="img/slide2.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="img/slide3.jpg" class="d-block w-100" alt="..." />
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <h3 class="fw-bold my-3 text-center">Produk</h3>
        <div class="row">
          <?php 
          include "koneksi.php";
          $nomor = 0;
              $data = mysqli_query($mysqli,"SELECT * FROM produk");
              while ($show = mysqli_fetch_array($data)){
                  $nomor++;
                  ?>
        <div class="card ms-2 mt-2" style="width: 14rem">
          <img src="produk/<?php echo $show['gambar']; ?>" style="width : 197px; height:133px;" class="card-img-top" alt="..." />
          <div class="card-body">
            <h4 class="card-title mb-2"><?php echo $show['nama'];?></h4>
            <p class="card-text mb-1"><?php echo $show['keterangan'];?></p>
            <p class="card-text mb-2">STOK <?php echo $show['stok'];?></p>
            <h5><p class="card-text mb-2">Rp <?php echo $show['harga'];?></p></h5>
            <a href="transaksi.php?id_produk=<?php echo $show['id_produk'];?>" class="btn btn-primary ">Beli</a>
          </div>
        </div>
    <?php
        }
        ?>
       </div>
    </div>
  </body>
</html>