<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['id_user'])) {
    header("Location: home_user.php");
}

 
if (isset($_POST['kirim'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($mysqli, $sql);
    
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_user'] = $row['id_user'];
        header("Location: home_user.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }

  } 
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>Toko shopedia</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/" />
    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bootstrap.min.css" />
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet" />
  </head>
  <body class="text-center">
    <main class="form-signin p-5 pb-3 border rounded-3 border-2 shadow-lg bg-light">
      <form method="post" action="index.php">
        <h1 class="h3 mb-4 fw-normal fw-bolder">Login</h1>
        <div class="form-floating">
          <input type="e-mail" class="form-control" id="floatingInput" placeholder="name@example.com" autocomplete="off" name="email" value="<?php echo $_POST['email']; ?>" required />
          <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" autocomplete="off" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required/>
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          <label> <input type="checkbox" value="remember-me" /> Ingat saya </label>
        </div>
        <div class="checkbox mb-3">
          <p>Tidak punya akun? <a href="daftar_user.php" class="btn btn-sm btn-outline-secondary" >Daftar</a></p>
        </div>
        <button class="w-100 btn btn-lg btn-primary" name="kirim" >Masuk</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
      </form>
    </main>
  </body>
</html>
