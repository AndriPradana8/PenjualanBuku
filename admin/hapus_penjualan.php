<?php
    include "../koneksi.php";
    $id = $_GET['id'];

    $sql = "DELETE FROM 14_tabel_penjualan WHERE id=$id";
    $result = $conn->query($sql);

    if ($result) {
        header("Location:  ../admin/penjualan_buku.php");
        exit();
    } else {
        echo "Gagal hapus data. Silahkan diulangi lagi.". $conn->error ;
        echo "<a href = '../admin/penjualan_buku.php'>Kembali</a>";
    }
?>