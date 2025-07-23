<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
  session_start();
  
  if (!isset($_SESSION["login"])) {
    $_SESSION["gagal"] = "Akses dibatasi, karena anda belum login";
    header("Location: ../login.php");
    exit();
  }

  include "../koneksi.php";

  $sql = "SELECT * FROM 14_tabel_buku";
  $result = $conn->query($sql);  
  
  include "header.php"; 
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Kelola Buku</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Master Data</a></li>
            <li class="breadcrumb-item active">Kelola Buku</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

     <!-- Kelola Buku -->
     <div class="col-12">
        <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Kelola Buku <span>| Koleksi Buku</span></h5>

            <a href="tambah_buku.php"><button class="btn btn-primary mb-3">Tambah Data</button></a>

            <table class="table table-bordered datatable">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Penulis</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Ringkasan</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Harga (Rp)</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach($result as $buku) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $buku['judul_buku'] ?></td>
                        <td><?= $buku['penulis'] ?></td>
                        <td><?= $buku['kategori'] ?></td>
                        <td><?= $buku['tahun_terbit'] ?></td>
                        <td><?= $buku['penerbit'] ?></td>
                        <td><?= $buku['ringkasan'] ?></td>
                        <td><?= $buku['keterangan'] ?></td>
                        <td><?= $buku['harga'] ?></td>
                        <td>
                            <a href="edit_buku.php?id=<?= $buku['id'] ?>" class="badge bg-primary text-white">Edit</a>
                            <a href="../aksi/hapus_buku.php?id=<?= $buku['id'] ?>" onclick="return confirm('Apakah yakin hapus data')" class="badge bg-danger text-white">Hapus</a>
                        </td>
                    </tr>
                <?php
                $no++;
                    }
                ?>
            </tbody>
            </table>

        </div>

        </div>
    </div><!-- End Kelola Buku -->
</main>

<?php include "footer.php"; ?>
