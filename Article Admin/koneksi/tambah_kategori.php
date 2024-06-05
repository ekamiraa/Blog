<?php
session_start();
include("koneksi.php");

if(isset($_POST['tambah_btn'])) {
    $nama_kategori = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO kategori (nama_kategori, deskripsi) VALUES ('$nama_kategori', '$deskripsi')";

    if ($conn->query($sql) === true) {
        header('Location: ../kategori.php');
        exit(0);
    } else {
        echo "Error: " . $conn->error;
        header('Location: ../kategori.php');
        exit(0);
    }
}

mysqli_close($conn);
?>