<?php
  session_start();
  
  if (!isset($_SESSION["login"])) {
    $_SESSION["gagal"] = "Akses dibatasi, karena anda belum login";
    header("Location: ../login.php");
    exit();
  }

  include "../koneksi.php";
  include "header.php"; 
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Buku</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="kelola_buku.php">Kelola Buku</a></li>
            <li class="breadcrumb-item active">Tambah Buku</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

     <!-- Kelola Buku -->
     <div class="col-12">
        <div class="card recent-sales overflow-auto">

        <div class="card-body px-5">
            <h5 class="mt-4"><strong>Tambah Buku Baru</strong></h5>
            <hr>
            <form action="../aksi/simpan_buku.php" method="POST" class="row">
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control">
                </div>
                <div class="col-md-3 pt-3">
                    <label class="mb-1">Penulis</label>
                    <input type="text" name="penulis" class="form-control">
                </div>
                <div class="col-md-3 pt-3">
                    <label class="mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" step="0.01" min="0" required>
                </div>
                <div class="col-md-4 pt-3">
                    <label class="mb-1">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="Buku Novel">Buku Novel</option>
                        <option value="Buku Sekolah">Buku Sekolah</option>
                        <option value="Buku Komputer">Buku Komputer</option>
                    </select>
                </div>
                <div class="col-md-4 pt-3">
                    <label class="mb-1">Tahun Terbit</label>
                    <input type="date" name="tahun_terbit" class="form-control" required>
                </div>
                <div class="col-md-4 pt-3">
                    <label class="mb-1">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control">
                </div>
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Ringkasan</label>
                    <textarea type="text" name="ringkasan" class="form-control"></textarea>
                </div>
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Keterangan</label>
                    <textarea type="text" name="keterangan" class="form-control"></textarea>
                </div>
                <div class="col-md-12 pt-5">
                    <input type="submit" class="btn btn-outline-primary" value="Simpan Data">
                </div>
            </form>
        </div>

        </div>
    </div><!-- End Kelola Buku -->
</main>

<?php include "footer.php"; ?>