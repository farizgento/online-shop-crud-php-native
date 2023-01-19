<?php
 include "koneksi.php";
//Akhir Koneksi---------------------------------------------------------
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
}
 
if (isset($_POST['simpan'])) {
    $nama            = $_POST['nama'];
    $username     = $_POST['username'];
    $email    = $_POST['email'];
    $jenis_kelamin   = $_POST['jenis_kelamin'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($mysqli, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user (nama, username, email, password,jenis_kelamin)
                    VALUES ('$nama', '$username', '$email', '$password','$jenis_kelamin')";
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
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
  <div class="container-sm border shadow-md p-5 mt-5 mb-5 bg-konten" style="background-color: white">
    <form action="" method="post">
      <h3 class="my-3">Daftar User</h3>
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" autocomplete="off" name="nama" required placeholder="masukan nama . . ." />
          </div>
        <div class= "mb-3">
          <label for="tgl" class="form-label">Username </label>
          <input type="text" class="form-control" autocomplete="off" id="tgl" required name="username" placeholder="masukan username . . ." />
        </div>
      <div class= "mb-3">
        <label for="tl" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="tl" name="email" autocomplete="off" required placeholder="masukan email . . ." />
      </div>
      <div class= "mb-3">
        <label for="stok" class="form-label">Password</label>
        <input type="password" class="form-control" id="stok" autocomplete="off" name="password" required placeholder="masukan password . . ." />
      </div>
      <div class= "mb-3">
        <label for="stok1" class="form-label">Konfirmasi password</label>
        <input type="password" class="form-control" id="stok1" autocomplete="off" name="cpassword" required placeholder="masukan password . . ." />
      </div>
      <div class="mb-3">
        <label for="jenis kelamin" class="form-label">Jenis kelamin</label>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="laki-laki" name="jenis_kelamin" value="L" />
          <label for="laki-laki" class="form-check-label">laki-laki</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="perempuan" name="jenis_kelamin" value="P" />
          <label for="perempuan" class="form-check-label">perempuan</label>
        </div>
      </div>
      <div class="mb-2 pt-3">
        <input type="submit" class="form-control btn-primary fw-bold" name="simpan" value="Simpan" />
      </div>
      <div class="mb-1">
        <a class="form-control btn btn-secondary fw-bold" href="index.php" role="button">Kembali</a>
      </div>
    </form>
  </div>
</body>
</html>