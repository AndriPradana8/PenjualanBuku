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
        <h1>Tambah User</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="kelola_user.php">Kelola User</a></li>
            <li class="breadcrumb-item active">Tambah User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

     <!-- Kelola User -->
     <div class="col-12">
        <div class="card recent-sales overflow-auto">

        <div class="card-body px-5">
            <h5 class="mt-4"><strong>Tambah User</strong></h5>
            <hr>
            <form action="../aksi/simpan_user.php" method="POST" class="row">
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Nama User</label>
                    <input type="text" name="nama_user" class="form-control">
                </div>
                <div class="col-md-3 pt-3">
                    <label class="mb-1">Kelas</label>
                    <select name="kelas" class="form-select">
                        <option value="SI4G">SI4G</option>
                        <option value="SI4A">SI4A</option>
                        <option value="SI4B">SI4B</option>
                        <option value="SI4C">SI4C</option>
                    </select>
                </div>
                <div class="col-md-3 pt-3">
                    <label class="mb-1">Jurusan</label>
                    <select name="jurusan" class="form-select">
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Sistem Komputer">Sistem Komputer</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    </select>
                </div>
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Password</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <div class="col-md-12 pt-5">
                    <input type="submit" class="btn btn-outline-primary" value="Simpan Data">
                </div>
            </form>
        </div>

        </div>
    </div><!-- End Kelola User -->
</main>

<?php include "footer.php"; ?>