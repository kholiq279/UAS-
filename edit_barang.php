<?php  
// Sertakan file koneksi database
include 'db.php';

// Ambil ID dari parameter GET
$id = $_GET['id'];

// Ambil data barang berdasarkan ID
$result = $conn->query("SELECT * FROM barang WHERE id=$id");
$barang = $result->fetch_assoc();

// Proses form ketika data dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $stock = $_POST['stock'];
    $tipe = $_POST['tipe'];

    // Update data barang
    $sql = "UPDATE barang SET nama_barang='$nama_barang', stock='$stock', tipe='$tipe' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: daftar_barang.php"); // Redirect ke daftar barang setelah update
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Barang</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: rgb(118, 101, 9);
        }

        label {
            font-size: 1.1rem;
            margin: 10px 0;
            display: inline-block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        input[type="text"]:focus {
            border-color: rgb(118, 101, 9);
        }

        button {
            background-color: rgb(118, 101, 9);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: rgb(98, 81, 7);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
        }

        .back-link a {
            color: rgb(118, 101, 9);
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Data Barang</h1>
    <form action="" method="POST">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" name="nama_barang" id="nama_barang" value="<?= htmlspecialchars($barang['nama_barang']) ?>" required><br>

        <label for="stock">Stock:</label>
        <input type="text" name="stock" id="stock" value="<?= htmlspecialchars($barang['stock']) ?>" required><br>

        <label for="tipe">Tipe:</label>
        <input type="text" name="tipe" id="tipe" value="<?= htmlspecialchars($barang['tipe']) ?>" required><br>

        <button type="submit">Simpan</button>
    </form>

    <!-- Link Kembali ke Daftar Barang -->
    <div class="back-link">
        <a href="daftar_barang.php">Kembali ke Daftar Barang</a>
    </div>
</div>

</body>
</html>
