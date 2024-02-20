
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel penjualan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            background-color: #DCF2F1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 50px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #176B87;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Form Kasir</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group">
                    <label for="Detail ID">Detail ID:</label>
                    <input type="text" class="form-control" id="Detail ID" name="Detail ID" required>
                </div>

                <div class="form-group">
                    <label for="Penjualan ID">Penjualan ID:</label>
                    <input type="text" class="form-control" id="Penjualan ID" name="Penjualan ID" required>
                </div>

                <div class="form-group">
                    <label for="Produk ID">Produk ID:</label>
                    <input type="text" class="form-control" id="Produk ID" name="Produk ID" required>
                </div>


                <div class="form-group">
                    <label for="Jumlah Produk">Jumlah Produk:</label>
                    <textarea class="form-control" id="Jumlah Produk" name="Jumlah Produk" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Kirim </button>
                <div class="text-center forget">
                    <p><a href="tabelpenjualan.php"></a></p>
                </div>
            </form>
        </div>
    </div>


    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'koneksi.php';

        $Detail_ID = $_POST["Detail ID"];
        $Penjualan_ID = $_POST["Penjualan ID"];
        $Produk_ID = $_POST["Produk ID"];
        $Jumlah_Produk = $_POST["Jumlah Produk"];

        // Insert data into penjualan table
        $sqlMasyarakat = "INSERT INTO kasir (Detail ID, Penjualan ID, Produk ID, Jumlah Produk) VALUES ('$DetailID', '$PenjualanID', '$ProdukID', '$JumlahProduk')";
        $koneksi->query($sqlKasir);

        // Get the last inserted ID
        $lastID = $koneksi->insert_id;

        // Close the database connection
        $koneksi->close();

        // Redirect to a success page or do something else
        header("Location: tabelpenjualan.php");
        exit();
    }
    ?>
</body>
</html>


