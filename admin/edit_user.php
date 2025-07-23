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

    $sql = "SELECT * FROM 14_tabel_user WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit User</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="kelola_user.php">Kelola User</a></li>
            <li class="breadcrumb-item active">Edit User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

     <!-- Kelola User -->
     <div class="col-12">
        <div class="card recent-sales overflow-auto">

        <div class="card-body px-5">
            <h5 class="mt-4"><strong>Edit User</strong></h5>
            <hr>
            <form action="../aksi/update_user.php" method="POST" class="row">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Nama User</label>
                    <input type="text" name="nama_user" value="<?= $user['nama_user'] ?>" class="form-control">
                </div>
                <div class="col-md-3 pt-3">
                    <label class="mb-1">Kelas</label>
                    <select name="kelas" class="form-select">
                        <option value="<?= $user['kelas'] ?>"><?= $user['kelas'] ?></option>
                        <option value="SI4G">SI4G</option>
                        <option value="SI4A">SI4A</option>
                        <option value="SI4B">SI4B</option>
                        <option value="SI4C">SI4C</option>
                    </select>
                </div>
                <div class="col-md-3 pt-3">
                    <label class="mb-1">Jurusan</label>
                    <select name="jurusan" class="form-select">
                        <option value="<?= $user['jurusan'] ?>"><?= $user['jurusan'] ?></option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Sistem Komputer">Sistem Komputer</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    </select>
                </div>
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Username</label>
                    <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
                </div>
                <div class="col-md-6 pt-3">
                    <label class="mb-1">Password</label>
                    <input type="text" name="password" value="<?= $user['password'] ?>" class="form-control">
                </div>
                <div class="col-md-12 pt-5">
                    <input type="submit" class="btn btn-outline-primary" value="Update">
                </div>
            </form>
        </div>

        </div>
    </div><!-- End Kelola User -->
</main>

<?php include "footer.php"; ?>