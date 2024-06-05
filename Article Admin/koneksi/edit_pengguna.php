<?php
session_start();

// Impor database
include('koneksi.php');

if (isset($_POST['edit_btn'])) {
    // Menerima data dari formulir
    $id_user = $_POST['id_user']; // Mengedit berdasarkan sesi pengguna
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kueri untuk memperbarui data pengguna
    $query = "UPDATE user SET nama = '$username', email = '$email', password = '$password' WHERE id_user = '$id_user'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data pengguna telah berhasil diperbarui";
        header("Location: ../pengguna.php");
        exit(0);
    } else {
        echo "Gagal memperbarui data pengguna";
        header("Location: ../pengguna.php");
        exit(0);
    }
} else {
    // Gagal mengedit Profil
    echo "Error saat memperbarui data pengguna.";
    header("Location: ../pengguna.php");
    exit(0);
}

mysqli_close($conn);

?>