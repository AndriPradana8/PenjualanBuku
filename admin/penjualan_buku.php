<?php
  session_start();
  
  if (!isset($_SESSION["login"])) {
    $_SESSION["gagal"] = "Akses dibatasi, karena anda belum login";
    header("Location: ../login.php");
    exit();
  }

  include "../koneksi.php";

  $sql = "SELECT * FROM 14_tabel_penjualan";
  $result = $conn->query($sql);  
  
  include "header.php"; 
?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Penjualan Buku</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Master Data</a></li>
            <li class="breadcrumb-item active">Penjualan Buku</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

     <!-- Peminjaman Buku -->
     <div class="col-12">
        <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Penjualan Buku <span>| Kelola Penjualan</span></h5>

            <a href="tambah_penjualan.php"><button class="btn btn-primary mb-3">Tambah Data</button></a>

            <table class="table table-bordered datatable">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Harga (Rp)</th>
                <th scope="col">Jumlah Terjual</th>
                <th scope="col">Tanggal Jual</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach($result as $penjualan) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $penjualan['kode_transaksi'] ?></td>
                        <td><?= $penjualan['judul_buku'] ?></td>
                        <td><?= $penjualan['harga'] ?></td>
                        <td><?= $penjualan['jumlah_terjual'] ?></td>
                        <td><?= $penjualan['tanggal_terjual'] ?></td>
                        <td>
                            <a href="edit_penjualan.php?id=<?= $penjualan['id'] ?>" class="badge bg-primary text-white">Edit</a>
                            <a href="../aksi/hapus_penjualan.php?id=<?= $penjualan['id'] ?>" onclick="return confirm('Apakah yakin hapus data')" class="badge bg-danger text-white">Hapus</a>
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
    </div><!-- End Peminjaman Buku -->
</main>

<?php include "footer.php"; ?>