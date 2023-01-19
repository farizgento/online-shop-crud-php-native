<?php
	include "koneksi.php";
	$data = mysqli_query($mysqli, "SELECT * FROM produk WHERE id_produk='$_GET[id_produk]'");
    $datashow = mysqli_fetch_array($data);
    if(isset($_POST['simpan'])){
      $id_produk =$_POST['id_produk'];
      $folder = './produk/';
      $name_p = $_FILES['gambar']['name'];
      $sumber_p = $_FILES['gambar']['tmp_name'];
      move_uploaded_file($sumber_p,$folder.$name_p);
      $nama          = $_POST['nama'];
      $keterangan      = $_POST['keterangan'];
      $harga         = $_POST['harga'];
      $stok      = $_POST['stok'];
      $kategori = $_POST['kategori'];
  $data = mysqli_query($mysqli, "UPDATE produk SET nama='$nama', keterangan='$keterangan',harga='$harga', stok='$stok' ,kategori='$kategori',gambar='$name_p' WHERE id_produk='$id_produk'") or die ("data salah : ".mysqli_error($mysqli));
  if ($data) { 
      echo "<script>alert('berhasil tambah produk')</script>";
    } else {
      "<script>alert('gagal tambah produk!')</script>";
  }
  }
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</html>
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body class="bg">
        <nav class="navbar navbar-light pb-2 bg-light fixed-top">
          <div class="container-fluid">
            <h3><i class=" fab fa-shopify"></i><a class="navbar-brand fw-bold" href="#">Shopedia</a></h3>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Shoopedia</h5>
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
                    <a class="nav-link" href="logout.php">Keluar</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <div class="mt-5 pt-5"></div>
    <div class="container border shadow-md p-5 mt-5 mb-5 bg-konten" style="background-color: white">
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_produk"  value="<?php echo $datashow['id_produk']; ?>">
        <div class="mb-3">
          <h3 class="fw-bold mt-2">Edit Produk</h3>
        </div>
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" autocomplete="off" name="nama" required placeholder="masukan nama produk . . ." value="<?php echo $datashow['nama']; ?>"  />
          </div>
        <div class= "mb-3">
          <label for="tgl" class="form-label">Keterangan</label>
          <input type="text" class="form-control" autocomplete="off" id="tgl" required name="keterangan" placeholder="masukan keterangan produk . . ." value="<?php echo $datashow['keterangan']; ?>" />
        </div>
      <div class= "mb-3">
        <label for="tl" class="form-label">Stok</label>
        <input type="number" class="form-control" id="tl" name="stok" autocomplete="off" required placeholder="masukan stok . . ." value="<?php echo $datashow['stok']; ?>"/>
      </div>
      <div class="mb-3">
        <label for="jenis kelamin" class="form-label">Kategori</label>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="elektronik" name="kategori" value="elektronik" checked="<?php echo $datashow['kategori']=="elektronik"; ?>" />
          <label for="elektronik" class="form-check-label">Elektronik</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="peralatan_rumah" name="kategori" value="peralatan_rumah" checked="<?php echo $datashow['kategori']=="peralatan_rumah"; ?>" />
          <label for="peralatan_rumah" class="form-check-label">Peralatan Rumah</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="otomotif" name="kategori" value="otomotif" checked="<?php echo $datashow['kategori']=="otomotif"; ?>"/>
          <label for="otomotif" class="form-check-label">Otomotif</label>
        </div>
      </div>
      <div class= "mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" autocomplete="off" name="harga" required placeholder="masukan harga produk . . ."  value="<?php echo $datashow['harga']; ?>" />
      </div>
      <div class= "mb-3">
          <label for="gambar" class="form-label">Gambar</label>
          <img src="produk/<?php echo $datashow['gambar']?>" alt="" style="width:197px; height: 133px; ">
      </div>
      <div class="mb-3">
      <input type="file" class="form-control" id="gambar" autocomplete="off" name="gambar" required placeholder="masukan gambar produk . . ."  />
      </div>
      <div class="mb-2 pt-3">
        <input type="submit" class="form-control btn-primary fw-bold" name="simpan" value="Simpan" />
      </div>
      <div class="mb-1">
        <a class="form-control btn btn-secondary fw-bold" href="home.php" role="button">Kembali</a>
      </div>
    </form>
  </div>
</body>
</html>