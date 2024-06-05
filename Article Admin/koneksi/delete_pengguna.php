<?php
session_start();

// Impor database
include('koneksi.php');

if (isset($_POST['delete_btn'])) {
    // Menerima data dari tombol delete_btn
    $id_user = $_POST['id_user']; // Mengambil ID pengguna dari sesi

    // Kueri untuk menghapus data pengguna
    $query = "DELETE FROM user WHERE id_user = '$id_user'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data pengguna telah berhasil dihapus";
        header("Location: ../pengguna.php");
        exit(0);
    } else {
        echo "Gagal menghapus data pengguna";
        header("Location: ../pengguna.php");
        exit(0);
    }
} else {
    // Tombol delete_btn tidak ditekan
    echo "Error saat menghapus data pengguna.";
    header("Location: ../pengguna.php");
    exit(0);
}

mysqli_close($conn);

?>
