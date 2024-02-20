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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Tabel produk</title>
    <style>
        /* Tambahkan gaya CSS di sini */
        .table-first-row {
            background-color: #007bff; /* Warna biru, dapat diubah sesuai keinginan */
            color: #fff; /* Warna teks putih */
        }

        .btn-tanggapi {
            background-color: #007bff; /* Warna biru untuk tombol Tanggapi */
            color: #fff; /* Warna teks putih untuk tombol Tanggapi */
        }

        .btn-logout {
            background-color: #dc3545; /* Warna merah untuk tombol Logout */
            color: #fff; /* Warna teks putih untuk tombol Logout */
            border-radius: 5px; /* Border radius untuk tombol Logout */
            width: 80px; /* Lebar tombol Logout */
            margin-top: 10px; /* Margin atas tombol Logout */
        }

        .btn-logout:hover {
            background-color: #c82333; /* Warna merah yang sedikit lebih gelap saat hover */
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <br><br>
                    <h1 class="text-center font-weight-bold">Tabel produk</h1>
                    <div class="text-center">
                        <div class="container" style="margin-top: 50px">
                        <form action="" method="post" style="display: flex; align-items: center;">
                    <h4 class="text-primary" style="margin-left: 190px;">Cari Berdasarkan:</h4>
                    <select name="pilih" style="margin-right: 10px;">
                        <option disabled selected>Pilih</option>
                        <option value="Produk ID">Produk ID</option>
                        <option value="nama produk">Nama Produk</option>
                        <option value="harga">Harga</option>
                        <option value="stok">Stok</option>
                    </select>
                        <input type="text" name="tekscari" size="10" style="margin-right: 13px;">
                        <input type="submit" name="cari" value="Cari" style="background-color: danger; color: black; border-radius: 5px; width: 80px;">
                        <input type="submit" name="semua" value="Tampilkan Semua" style="background-color: danger; color: black; border-radius: 5px; width: 150px;">
                            </form>
                            <br>
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr class="table-first-row">
                                        <th scope="col">Produk ID</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                  include "koneksi.php";
                                  $tampil="";
                                  if (isset ($_POST['cari'])) {
                                      $pilih = $_POST['pilih'];
                                      $tekscari = $_POST[ 'tekscari'];
                                      $tampil = mysqli_query($koneksi, "select * from kasir_penjualan where $pilih like '%$tekscari%'");
                                  } else {
                                      $tampil = mysqli_query ($koneksi, "select * from kasir_penjualan");
                                  }
                                  foreach($tampil as $row) 
                                  ?>
                              <tr>
                                  <td><?php echo "$row[Produk ID]"; ?></td>
                                  <td><?php echo "$row[Nama Produk]"; ?></td>
                                  <td><?php echo "$row[Harga]"; ?></td>
                                  <td><?php echo "$row[Stok]"; ?></td>
                                  <td><button type="button" class="btn btn-block btn-default btn-sm"><?php echo "<a href= 'kasir_penjualan.php?id=$row[Produk ID]'>Tanggapi</a>"; ?></td>
                              </tr>  
                              <?php ?>
                                  </table>
                                  <button type="button" onclick="location.href='logout.php'" class="btn btn-logout btn-block">Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script> -->
</body>
</html>


