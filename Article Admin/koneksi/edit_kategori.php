<?php
session_start();

// Impor database
include('koneksi.php');

if (isset($_POST['edit_btn'])) {
    // Menerima data dari formulir
    $id_kategori = $_POST['id_kategori']; // Mengedit berdasarkan sesi pengguna
    $nama_kategori = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];
    

    // Kueri untuk memperbarui data pengguna
    $query = "UPDATE kategori SET nama_kategori = '$nama_kategori', deskripsi = '$deskripsi' WHERE id_kategori = '$id_kategori'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data pengguna telah berhasil diperbarui";
        header("Location: ../kategori.php");
        exit(0);
    } else {
        echo "Gagal memperbarui data pengguna";
        header("Location: ../kategori.php");
        exit(0);
    }
} else {
    // Gagal mengedit Profil
    echo "Error saat memperbarui data pengguna.";
    header("Location: ../kategori.php");
    exit(0);
}

mysqli_close($conn);

?>