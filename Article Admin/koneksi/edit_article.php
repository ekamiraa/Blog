<?php
session_start();

// Impor database
include('koneksi.php');

if (isset($_POST['edit_btn'])) {
    // Menerima data dari formulir
    $id_article = $_POST['id_article']; // Mengedit berdasarkan sesi article
    $judul = $_POST['judul'];

    // Ambil ID kategori dari form
        $nama_kategori = $_POST["nama_kategori"];
        $query_kategori = "SELECT id_kategori FROM kategori WHERE nama_kategori = '$nama_kategori'";
        $result_kategori = mysqli_query($conn, $query_kategori);
        $data_kategori = mysqli_fetch_assoc($result_kategori);
        $kategori_id = $data_kategori['id_kategori'];

    // Kueri untuk memperbarui data article
    $query = "UPDATE article SET judul = '$judul', id_kategori = '$kategori_id' WHERE id_article = '$id_article'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data artikel telah berhasil diperbarui";
        header("Location: ../article.php");
        exit(0);
    } else {
        echo "Gagal memperbarui data article";
        header("Location: ../article.php");
        exit(0);
    }
} else {
    // Gagal mengedit Profil
    echo "Error saat memperbarui data article.";
    header("Location: ../article.php");
    exit(0);
}

mysqli_close($conn);

?>