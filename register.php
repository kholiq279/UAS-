<?php
session_start();
include 'db.php'; // Pastikan file ini menginisialisasi koneksi database sebagai $conn atau $mysqli

// Inisialisasi variabel untuk menghindari error "undefined variable"
$username = $email = "";

// Jika pengguna sudah login, arahkan ke halaman login
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Cek apakah form telah disubmit
if (isset($_POST['submit'])) {
    // Gunakan variabel koneksi sesuai nama yang didefinisikan di db.php (ganti $conn/$mysqli sesuai nama yang digunakan)
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256', $_POST['password']); // Hash password dengan SHA-256
    $cpassword = hash('sha256', $_POST['cpassword']); // Hash konfirmasi password dengan SHA-256

    // Cek apakah password dan konfirmasi password sesuai
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        // Jika email belum terdaftar
        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan saat registrasi.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email sudah terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password tidak sesuai')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register</title>
    <style>
        /* Tambahkan style untuk tampilan */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('background.jpg'); 
            background-size: cover;
            background-position: center center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-text {
            text-align: center;
            font-size: 2rem;
            font-weight: 800;
            color:rgb(118, 101, 9);
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            width: 100%;
            background-color:rgb(118, 101, 9);
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color:rgb(118, 101, 9);
        }
        .login-register-text {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?= htmlspecialchars($username); ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?= htmlspecialchars($email); ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login</a></p>
        </form>
    </div>
</body>
</html>
