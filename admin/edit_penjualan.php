<?php 
    session_start();
    
    if (!isset($_SESSION["login"])) {
        $_SESSION["gagal"] = "Akses dibatasi, karena anda belum login";
        header("Location: ../login.php");
        exit();
    }

include "header.php";
include "../koneksi.php";

$id = $_GET['id'];

$sql = "SELECT * FROM 14_tabel_penjualan WHERE id=$id";
$result = $conn->query($sql);
$penjualan = $result->fetch_assoc();
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Penjualan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="penjualan_buku.php">Kelola Penjualan</a></li>
                <li class="breadcrumb-item active">Edit Penjualan</li>
            </ol>
        </nav>
    </div>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body px-5">
                <h5 class="mt-4"><strong>Edit Penjualan Buku</strong></h5>
                <hr>
                <form action="../aksi/update_penjualan.php" method="POST" class="row">
                    <input type="hidden" name="id" value="<?= $penjualan['id'] ?>">

                    <div class="col-md-3 pt-3">
                        <label class="mb-1">Kode Transaksi</label>
                        <input type="text" name="kode_transaksi" value="<?= $penjualan['kode_transaksi'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-6 pt-3">
                        <label class="mb-1">Judul Buku</label>
                        <input type="text" name="judul_buku" value="<?= $penjualan['judul_buku'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-3 pt-3">
                        <label class="mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" value="<?= $penjualan['harga'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-4 pt-3">
                        <label class="mb-1">Jumlah Terjual</label>
                        <input type="text" name="jumlah_terjual" value="<?= $penjualan['jumlah_terjual'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-4 pt-3">
                        <label class="mb-1">Tanggal Jual</label>
                        <input type="date" name="tanggal_terjual" value="<?= $penjualan['tanggal_terjual'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-12 pt-5">
                        <input type="submit" class="btn btn-outline-primary" value="Simpan Data">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include "footer.php"; ?>
