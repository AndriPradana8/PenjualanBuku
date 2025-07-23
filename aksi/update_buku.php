<?php
    include "../koneksi.php";

    $id = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $penerbit = $_POST['penerbit'];
    $ringkasan = $_POST['ringkasan'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];

    $query = "UPDATE 14_tabel_buku SET
                                        judul_buku='$judul_buku',
                                        penulis='$penulis',
                                        kategori='$kategori',
                                        tahun_terbit='$tahun_terbit',
                                        penerbit='$penerbit',
                                        ringkasan='$ringkasan',
                                        keterangan='$keterangan',
                                        harga='$harga'
                                        WHERE id=$id";

    $result = $conn->query($query);

    if ($result) {
        header("Location: ../admin/kelola_buku.php");
        exit();
    } else {
        echo "Gagal menyimpan data. Silahkan diulangi lagi.";
        echo "Error SQL: " . $conn->error . "<br>";
        echo "<a href = '../admin/tambah_buku.php'>Input Ulang</a>";
    }
?>