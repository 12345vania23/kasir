<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
  <title>Login Form with Cancel</title>
  <style>
    body {
      background-color: #DCF2F1;
    }
    .container {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<?php
session_start(); // Start the session

if(isset($_POST['submit'])) {
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kasir_penjualan"; // Ganti dengan nama database Anda

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi Gagal: " . $conn->connect_error);
    }
 
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Proses autentikasi
    $query = "SELECT * FROM kasir WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Autentikasi berhasil, store id_kasir in session
        $row = $result->fetch_assoc();
        $_SESSION['id_kasir'] = $row['id_kasir'];

        // Redirect to the halaman petugas
        header("Location: menu.php");
        exit();
    } else {
        // Autentikasi gagal, redirect to the login page with an error message
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Login failed. Please check your username and password.",
        }).then(function() {
            window.location.href = "login_admin.php";
        });
        </script>';
        exit();
    }

    $conn->close();
}
?>

<div class="container">
  <div class="login-form">
    <div class="text-center">
      <h3>Form Login</h3>
    </div>
    <form method="post" action="">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
        <button type="button" class="btn btn-secondary" onclick="cancelLogin()">Cancel</button>
      </div>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
  function cancelLogin() {
    alert('Login canceled!');
  }
</script>
</body>
</html>
