<?php
$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "web_blog"; 

// Buat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
    echo "Server not connected";
}
?>
