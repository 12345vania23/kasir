<!DOCTYPE html>
<html>
<head>
    <title>kasir</title>
</body>

<div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="text-center">
                <h1>Tabel Detail Penjualan</h1>
                <form action="" method="post">
                    Cari berdasarkan
                    <select name="pilih">
                        <option value="Detail ID">Detail ID</option>
                        <option value-"penjualanID">penjualan ID</option>
                        <option value="Produk ID">Produk ID</option>
                        <option value-"JumlahProduk">Jumlah Produk</option>
                    </select>
                    <input type="text" name="tekscari" size="24">
                    <input type="submit" name="cari" value="Cari">
                    <input type="submit" name="semua" value="Tampilkan Semua">
                </form>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Detail ID</th>
                        <th>penjualan ID</th>
                        <th>Produk ID</th>
                        <th>Jumlah Produk</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                include "koneksi.php";
                $tampil = "";
                if (isset($_POST['cari'])) {
                    $pilih = $_POST['pilih'];
                    $tekscari = $_POST['tekscari'];
                    $tampil = mysqli_query($koneksi, "select * from barang where $pilih like '%$tekscari%'");
                } else {
                     $tampil = mysqli_query($koneksi, "select * from penjual");
                }
                foreach ($tampil as $row) {
                ?>
                    <tr>
                        <td><?php echo "$row[Detail ID]"; ?></td>
                        <td><?php echo "$row[penjualan ID]"; ?></td>
                        <td><?php echo "$row[Produk ID]"; ?></td>
                        <td><?php echo "$row[Jumlah Produk]"; ?></td>
                        <td><?php echo "<a href='update.php?id=$row[id_kasir]'>UPDATE</a> | <a href='delete.php?id=$row[id_kasir]'>DELETE</a>"; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <a class="btn btn-primary" href="tambahdata_penjualan.php">Tambahkan Data Barang</a>
            </div>
        </div>
    </div>
