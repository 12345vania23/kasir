<?php
include "koneksi.php";
session_start();
if(!isset($_SESSION['id_petugas'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Tabel Penjualan</title>
  <style>
    body {
      background-color: #fff;
      color: #000;
    }

    .container {
      margin-top: 50px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #000;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #ADD8E6;
    }

    .search-box {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      position: relative;
    }

    .form-control {
      padding-left: 30px;
    }

    .toggle-btn {
      margin-left: 10px;
    }

    .search-box span {
      margin-right: 10px;
    }
  </style>
</head>
<body>

  <div class="container" style="padding:10%;">
    <h1 class="text-center">Tabel Penjualan</h1>
    <br>
    <form action="" method="post" style="display: flex; align-items: center;">
        <h4 class="text-primary" style="margin-left: 110px;">Cari:</h4>
        <select name="pilih" style="margin-right: 10px;">
            <option disabled selected>Pilih</option>
            <option value="Penjual ID">Penjual ID</option>
            <option value="tanggal penjualan">Tanggal Penjualan</option>
            <option value="Total Harga">Total Harga</option>
        </select>
        <input type="text" name="tekscari" size="10" style="margin-right: 10px;">
        <input type="submit" name="cari" value="Cari" style="background-color: danger; color: black; border-radius: 5px; width: 80px;">
        <input type="submit" name="semua" value="Tampilkan Semua" style="background-color: danger; color: black; border-radius: 5px; width: 150px;">
    </form>
    <br>
    <table>
        <tr>
            <th>Penjual ID</th>
            <th>Tgl Penjualan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $tampil="";
        if (isset ($_POST['cari'])) {
            $pilih = $_POST['pilih'];
            $tekscari = $_POST[ 'tekscari'];
            $tampil = mysqli_query($koneksi, "select * from kasir_penjualan where $pilih like '%$tekscari%'");
        } else {
            $tampil = mysqli_query ($koneksi, "select *kasir_penjualan");
        }
        foreach($tampil as $row) 
        ?>
        <tr>
            <td><?php echo "$row[Penjual ID]"; ?></td>
            <td><?php echo "$row[Tgl Penjualan]"; ?></td>
            <td><?php echo "$row[Total Harga]"; ?></td>
            <td><button type="button" class="btn btn-block btn-default btn-sm"><?php echo "<a href= 'update.php?id=$row[Penjual ID]'>Edit</a> | <a href= 'delete.php?id=$row[Penjual ID]'>Hapus</a>"; ?></td>
        </tr>  
        <?php }?>
    </table>
    <button type="button" onclick="location.href='logout.php'" class="btn btn-danger ">Logout</button>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>



