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

    $sql = "SELECT * FROM 14_tabel_buku WHERE id=$id";
    $result = $conn->query($sql);
    $buku = $result->fetch_assoc();
    
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Buku</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="kelola_buku.php">Kelola Buku</a></li>
            <li class="breadcrumb-item active">Edit Buku</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

     <!-- Kelola Buku -->
     <div class="col-12">
        <div class="card recent-sales overflow-auto">

        <div class="card-body px-5">
            <h5 class="mt-4"><strong>Edit Buku</strong></h5>
            <hr>
            <form action="../aksi/update_buku.php" method="POST" class="row">
                <input type="hidden" name="id" value="<?= $buku['id'] ?>">
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Judul Buku</label>
                    <input type="text" name="judul_buku" value="<?= $buku['judul_buku'] ?>" class="form-control">
                </div>
                <div class="col-md-3 pt-3">
                    <label class="mb-1">Penulis</label>
                    <input type="text" name="penulis" value="<?= $buku['penulis'] ?>" class="form-control">
                </div>
                <div class="col-md-3 pt-3">
                    <label class="mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" value="<?= $buku['harga'] ?>" class="form-control" step="0.01" min="0" required placeholder="Contoh: 15000">
                </div>
                <div class="col-md-4 pt-3">
                    <label class="mb-1">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="Buku Novel" <?= $buku['kategori'] =='Buku Novel' ? 'Selected' : '' ?>>Buku Novel</option>
                        <option value="Buku Sekolah" <?= $buku['kategori'] =='Buku Sekolah' ? 'Selected' : '' ?>>Buku Sekolah</option>
                        <option value="Buku Komputer" <?= $buku['kategori'] =='Buku Komputer' ? 'Selected' : '' ?>>Buku Komputer</option>
                    </select>
                </div>
                <div class="col-md-4 pt-3">
                    <label class="mb-1">Tahun Terbit</label>
                    <input type="date" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" class="form-control" min="1900" max="2099" required>
                </div>
                <div class="col-md-4 pt-3">
                    <label class="mb-1">Penerbit</label>
                    <input type="text" name="penerbit" value="<?= $buku['penerbit'] ?>" class="form-control">
                </div>
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Ringkasan</label>
                    <textarea name="ringkasan"  class="form-control"><?= $buku['ringkasan'] ?></textarea>
                </div>
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Keterangan</label>
                    <textarea name="keterangan" class="form-control"><?= $buku['keterangan'] ?></textarea>
                </div>
                <div class="col-md-12 pt-5">
                    <input type="submit" class="btn btn-outline-primary" value="Update">
                </div>
            </form>
        </div>

        </div>
    </div><!-- End Kelola Buku -->
</main>

<?php include "footer.php"; ?>