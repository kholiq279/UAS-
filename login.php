<?php
session_start();

// Misalkan login berhasil dan username sudah diverifikasi
if (isset($_POST['submit'])) {
    // Cek username dan password yang dimasukkan
    // Asumsikan login valid
    $_SESSION['username'] = $_POST['username']; // Menyimpan username di session

    // Setelah berhasil login, alihkan ke index.php
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('background3.jpg'); /* Menambahkan gambar sebagai background */
            background-size: cover; /* Gambar akan menutupi seluruh halaman */
            background-position: center center; /* Menempatkan gambar di tengah halaman */
            background-attachment: fixed; /* Membuat gambar tetap di tempat saat scroll */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Background putih semi-transparan */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-email {
            text-align: center;
        }

        .login-text {
            font-size: 2rem;
            font-weight: 800;
            color:rgb(118, 101, 9); /* Ungu */
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            margin: 10px 0;
            outline: none;
        }

        .input-group input:focus {
            border-color:rgb(118, 101, 9); /* Ungu pada saat fokus */
        }

        .btn {
            background-color:rgb(118, 101, 9); /* Pink */
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color:rgb(118, 101, 9); /* Warna pink lebih gelap saat hover */
        }

        .login-register-text {
            font-size: 1rem;
            margin-top: 15px;
        }

        .login-register-text a {
            color:rgb(118, 101, 9); /* Ungu */
            text-decoration: none;
        }

        .login-register-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST" class="login-email">
            <p class="login-text">Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Belum punya akun? <a href="register.php">Daftar</a></p>
        </form>
    </div>
</body>
</html>