<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "db_uas23220114";

    $conn = mysqli_connect($host, $user, $password, $database);

    if (!$conn) {
        echo "Koneksi ke database gagal" . mysqli_connect_error();
    }
?>