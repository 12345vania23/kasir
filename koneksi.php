
<?php
$server = "localhost"; 
$username = "root"; 
$password = ""; 
$db = "kasir_penjualan"; 

$koneksi = new mysqli("$server", "$username", "$password", "$db");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
} else {
    
}
?>