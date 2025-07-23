<?php
    include "../koneksi.php";
    $id = $_GET['id'];

    $sql = "DELETE FROM 14_tabel_user WHERE id=$id";
    $result = $conn->query($sql);

    if ($result) {
        header("Location:  ../admin/kelola_user.php");
        exit();
    } else {
        echo "Gagal hapus data. Silahkan diulangi lagi.". $conn->error ;
        echo "<a href = '../admin/kelola_user.php'>Kembali</a>";
    }
?>