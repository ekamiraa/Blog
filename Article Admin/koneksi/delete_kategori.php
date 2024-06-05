<?php
session_start();

// Impor database
include('koneksi.php');

if (isset($_POST['delete_btn'])) {
    // Menerima data dari tombol delete_btn
    $id_kategori = $_POST['id_kategori']; // Mengambil ID kategori dari sesi

    // Kueri untuk menghapus data kategori
    $query = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data kategori telah berhasil dihapus";
        header("Location: ../kategori.php");
        exit(0);
    } else {
        echo "Gagal menghapus data kategori";
        header("Location: ../kategori.php");
        exit(0);
    }
} else {
    // Tombol delete_btn tidak ditekan
    echo "Error saat menghapus data kategori.";
    header("Location: ../kategori.php");
    exit(0);
}

mysqli_close($conn);

?>
