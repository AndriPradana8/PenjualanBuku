<?php
include "../koneksi.php";

// Ambil data dari form
$id = $_POST['id'];
$kode_transaksi = $_POST['kode_transaksi'];
$judul_buku = $_POST['judul_buku'];
$harga = $_POST['harga'];
$jumlah_terjual = $_POST['jumlah_terjual'];
$tanggal_terjual = $_POST['tanggal_terjual'];

$query = "UPDATE 14_tabel_penjualan SET
            kode_transaksi = '$kode_transaksi',
            judul_buku = '$judul_buku',
            harga = '$harga',
            jumlah_terjual = '$jumlah_terjual',
            tanggal_terjual = '$tanggal_terjual'
          WHERE id = $id";

$result = $conn->query($query);

if ($result) {
    header("Location: ../admin/penjualan_buku.php");
    exit();
} else {
    echo "Gagal menyimpan data. Silahkan diulangi lagi.<br>";
    echo "Error SQL: " . $conn->error . "<br>";
    echo "<a href = '../admin/edit_penjualan.php?id=$id'>Kembali</a>";
}
?>
