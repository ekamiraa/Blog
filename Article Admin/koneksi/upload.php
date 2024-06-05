<?php
    session_start();

    // Include file article.php
    include('koneksi.php');

    

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["tambah_btn"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $gambar = $target_file;

        // Ambil ID user dari session
        $user = $_SESSION['id_user'];

        // Ambil ID kategori dari form
        $nama_kategori = $_POST["nama_kategori"];
        $query_kategori = "SELECT id_kategori FROM kategori WHERE nama_kategori = '$nama_kategori'";
        $result_kategori = mysqli_query($conn, $query_kategori);
        $data_kategori = mysqli_fetch_assoc($result_kategori);
        $kategori_id = $data_kategori['id_kategori'];

        $tanggal = $_POST['tanggal'];
        $judul =$_POST['judul'];
        $isiArtikel = $_POST['isiArtikel'];
        
         // Query untuk menyimpan data artikel ke dalam database
        $sql = "INSERT INTO article (id_user, id_kategori, tanggal, judul, isi, gambar) VALUES ('$user', '$kategori_id', '$tanggal', '$judul', '$isiArtikel', '$gambar')";

        if ($conn->query($sql) === true) {
            header('Location: ../article.php');
            exit(0);
        } else {
            header('Location: ../article.php');
            echo "Error: " . $conn->error;
            exit(0);
        }

        // Tutup koneksi ke database
        mysqli_close($conn);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
    ?>
?>