<?php
session_start();
// Import the connection file
include('koneksi.php');

if (isset($_POST['login_btn'])) {
    // Receive data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check username and password
    $query = "SELECT * FROM user WHERE nama = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = $result->fetch_array();
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['nama'];
        header("Location: ../index.html");
        exit(0);
    } else {
        // Login gagal
        header("Location: login.php");
        exit(0);
    }
} else if (isset($_POST['logout_btn'])) {
    unset($_SESSION['id_user']);
    unset($_SESSION['username']);
    header("Location: ../form_login.php");
    exit(0);
}

mysqli_close($conn);
?>
