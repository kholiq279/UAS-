<?php
session_start(); // Memulai sesi
session_unset(); // Menghapus semua data session
session_destroy(); // Menghancurkan session

// Mengarahkan pengguna kembali ke halaman login
header("Location: login.php");
exit();
?>
