<?php
    include "../koneksi.php";

    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $penerbit = $_POST['penerbit'];
    $ringkasan = $_POST['ringkasan'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO 14_tabel_buku(judul_buku,
                                        penulis,
                                        kategori,
                                        tahun_terbit,
                                        penerbit,
                                        ringkasan,
                                        keterangan,
                                        harga)
                            VALUES ('$judul_buku',
                                    '$penulis',
                                    '$kategori',
                                    '$tahun_terbit',
                                    '$penerbit',
                                    '$ringkasan',
                                    '$keterangan',
                                    '$harga'
                            )";

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