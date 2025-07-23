<?php
  session_start();
  
  if (!isset($_SESSION["login"])) {
    $_SESSION["gagal"] = "Akses dibatasi, karena anda belum login";
    header("Location: ../login.php");
    exit();
  }

  include "../koneksi.php";

  $sql = "SELECT * FROM 14_tabel_user";
  $result = $conn->query($sql);  
  
  include "header.php"; 
?>

<?php include "header.php"; ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Kelola User</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Master Data</a></li>
            <li class="breadcrumb-item active">Kelola User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

     <!-- Kelola Buku -->
     <div class="col-12">
        <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Kelola User <span>| User Login</span></h5>

            <a href="tambah_user.php"><button class="btn btn-primary mb-3">Tambah Data</button></a>

            <table class="table table-bordered datatable">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama User</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach($result as $user) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $user['nama_user'] ?></td>
                        <td><?= $user['kelas'] ?></td>
                        <td><?= $user['jurusan'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td>
                            <a href="edit_user.php?id=<?= $user['id'] ?>" class="badge bg-primary text-white">Edit</a>
                            <a href="../aksi/hapus_user.php?id=<?= $user['id'] ?>" onclick="return confirm('Apakah yakin hapus data')" class="badge bg-danger text-white">Hapus</a>
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