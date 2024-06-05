<?php
session_start();
include("koneksi.php");

if(isset($_POST['tambah_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (nama, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === true) {
    header('Location: ../pengguna.php');
    exit(0);
} else {
    header('Location: ../pengguna.php');
    echo "Error: " . $conn->error;
    exit(0);
}
    
}

mysqli_close($conn);
?>