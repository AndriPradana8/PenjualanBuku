<?php
include "../koneksi.php";

$kode_transaksi = $_POST['kode_transaksi'];
$id_buku = $_POST['id_buku'];
$harga = $_POST['harga'];
$jumlah_terjual = $_POST['jumlah_terjual'];
$tanggal_terjual = $_POST['tanggal_terjual'];

// Ambil judul buku berdasarkan id_buku (optional jika memang ingin disimpan juga)
$query_buku = "SELECT judul_buku FROM 14_tabel_buku WHERE id = $id_buku";
$result_buku = $conn->query($query_buku);

if ($result_buku && $result_buku->num_rows > 0) {
    $row_buku = $result_buku->fetch_assoc();
    $judul_buku = $row_buku['judul_buku'];

    // Simpan ke tabel penjualan
    $query = "INSERT INTO 14_tabel_penjualan (
                    kode_transaksi,
                    judul_buku,
                    id_buku,
                    harga,
                    jumlah_terjual,
                    tanggal_terjual
              ) VALUES (
                    '$kode_transaksi',
                    '$judul_buku',
                    '$id_buku',
                    '$harga',
                    '$jumlah_terjual',
                    '$tanggal_terjual'
              )";

    $result = $conn->query($query);

    if ($result) {
        header("Location: ../admin/penjualan_buku.php");
        exit();
    } else {
        echo "Gagal menyimpan data. Silahkan diulangi lagi.<br>";
        echo "Error SQL: " . $conn->error . "<br>";
        echo "<a href = '../admin/tambah_penjualan.php'>Input Ulang</a>";
    }
} else {
    echo "Data buku tidak ditemukan.<br>";
    echo "<a href = '../admin/tambah_penjualan.php'>Kembali</a>";
}
?>
