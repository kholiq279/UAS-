<?php
// Sertakan file koneksi database
include 'db.php';

// Validasi parameter 'id' yang dikirim melalui GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Amankan parameter 'id' dengan intval()
    $id = intval($_GET['id']);

    // Gunakan prepared statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("DELETE FROM barang WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Eksekusi query
    if ($stmt->execute()) {
        // Redirect ke halaman utama setelah data berhasil dihapus
        header("Location: daftar_barang.php"); // Pastikan diarahkan ke halaman daftar barang
        exit;
    } else {
        // Tampilkan pesan error jika terjadi kesalahan query
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
} else {
    // Jika parameter 'id' tidak valid, tampilkan pesan error
    echo "Invalid ID parameter.";
}

// Tutup koneksi database
$conn->close();
?>
