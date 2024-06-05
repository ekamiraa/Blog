<?php
session_start();

// Impor database
include('koneksi.php');

if (isset($_POST['delete_btn'])) {
    // Menerima data dari tombol delete_btn
    $id_article = $_POST['id_article']; // Mengambil ID article dari sesi

    // Kueri untuk menghapus data article
    $query = "DELETE FROM article WHERE id_article = '$id_article'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data article telah berhasil dihapus";
        header("Location: ../article.php");
        exit(0);
    } else {
        echo "Gagal menghapus data article";
        header("Location: ../article.php");
        exit(0);
    }
} else {
    // Tombol delete_btn tidak ditekan
    echo "Error saat menghapus data article.";
    header("Location: ../article.php");
    exit(0);
}

mysqli_close($conn);

?>
