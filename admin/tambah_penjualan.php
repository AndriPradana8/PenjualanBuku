<?php
    session_start();
    
    if (!isset($_SESSION["login"])) {
        $_SESSION["gagal"] = "Akses dibatasi, karena anda belum login";
        header("Location: ../login.php");
        exit();
    }

include "header.php";
include "../koneksi.php";

$query_buku = "SELECT id, judul_buku FROM 14_tabel_buku";
$result_buku = $conn->query($query_buku);

$selected_id_buku = isset($_POST['id_buku']) ? $_POST['id_buku'] : '';
$harga_buku = '';

if ($selected_id_buku != '') {
    $query_harga = "SELECT harga FROM 14_tabel_buku WHERE id = '$selected_id_buku'";
    $result_harga = $conn->query($query_harga);
    if ($result_harga && $result_harga->num_rows > 0) {
        $row = $result_harga->fetch_assoc();
        $harga_buku = $row['harga'];
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Penjualan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="penjualan_buku.php">Kelola Penjualan</a></li>
                <li class="breadcrumb-item active">Tambah Penjualan</li>
            </ol>
        </nav>
    </div>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body px-5">
                <h5 class="mt-4"><strong>Tambah Penjualan Buku</strong></h5>
                <hr>

                <form action="" method="POST" class="row">

                    <?php
                        $ambil_kode = mysqli_query($conn, "SELECT kode_transaksi FROM `14_tabel_penjualan` ORDER BY kode_transaksi DESC LIMIT 1");
                        
                        if(mysqli_num_rows($ambil_kode) > 0) {
                            $row = mysqli_fetch_assoc($ambil_kode);
                            $kode_db = $row['kode_transaksi'];
                            $kode_db = explode("-", $kode_db);
                            $kode_baru = (int)$kode_db[1] + 1;
                            $kode_baru = "TRX-" . str_pad($kode_baru, 3, 0, STR_PAD_LEFT);
                        } else {
                            $kode_baru = "TRX-001";
                        }
                    ?>


                    <div class="col-md-3 pt-3">
                        <label class="mb-1">Kode Transaksi</label>
                        <input type="text" name="kode_transaksi" class="form-control"
                            value="<?= $kode_baru ?>" readonly>
                    </div>

                    <div class="col-md-4 pt-3">
                        <label class="mb-1">Judul Buku</label>
                        <select name="id_buku" class="form-control" onchange="this.form.submit()">
                            <option value="">-- Pilih Judul Buku --</option>
                            <?php while ($row = $result_buku->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>" <?= ($selected_id_buku == $row['id']) ? 'selected' : '' ?>>
                                    <?= $row['judul_buku'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="col-md-4 pt-3">
                        <label class="mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="<?= $harga_buku ?>" readonly>
                    </div>

                    <div class="col-md-4 pt-3">
                        <label class="mb-1">Jumlah Terjual</label>
                        <input type="text" name="jumlah_terjual" class="form-control"
                            value="<?= isset($_POST['jumlah_terjual']) ? $_POST['jumlah_terjual'] : '' ?>">
                    </div>

                    <div class="col-md-4 pt-3">
                        <label class="mb-1">Tanggal Jual</label>
                        <input type="date" name="tanggal_terjual" class="form-control"
                            value="<?= isset($_POST['tanggal_terjual']) ? $_POST['tanggal_terjual'] : '' ?>">
                    </div>

                    <div class="col-md-12 pt-5">
                        <button type="submit" formaction="../aksi/simpan_penjualan.php" class="btn btn-outline-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include "footer.php"; ?>
