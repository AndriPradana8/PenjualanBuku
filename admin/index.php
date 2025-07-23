  <?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  session_start();
  
  include "../koneksi.php";

  if (!isset($_SESSION["login"])) {
    $_SESSION["error"] = "Akses dibatasi, karena anda belum login";
    header("Location: ../login.php");
    exit();
  }

  $sql = "SELECT * FROM `14_tabel_buku`";
  $koleksiBuku = $conn->query($sql); 

  $sql2 = "SELECT * FROM `14_tabel_penjualan`";
  $penjualanBuku = $conn->query($sql2); 

  $sql3 = "SELECT COUNT(*) as total FROM `14_tabel_buku`";
  $result = $conn->query($sql3);
  $data = $result->fetch_assoc();
  $totalBuku = $data['total'];
  
  $sql4 = "SELECT COUNT(*) as total FROM `14_tabel_penjualan`";
  $result = $conn->query($sql4);
  $data = $result->fetch_assoc();
  $totalPenjualan = $data['total'];

  $sql5 = "SELECT COUNT(*) as total FROM `14_tabel_user`";
  $result = $conn->query($sql5);
  $data = $result->fetch_assoc();
  $totalUser = $data['total'];

  $sql6 = "SELECT SUM(harga*jumlah_terjual) as total FROM `14_tabel_penjualan`";
  $result = $conn->query($sql6);
  $data = $result->fetch_assoc();
  $omset = $data['total'];


  include "header.php";
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Koleksi Buku -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Koleksi Buku <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h1><?= $totalBuku ?></h1>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Koleksi Buku -->

            <!-- Pinjaman Buku -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Penjualan Buku <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bag-check"></i>
                    </div>
                    <div class="ps-3">
                      <h1><?= $totalPenjualan?></h1>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Pinjaman Buku -->

            <!-- Admin -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">User <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h1><?= $totalUser ?></h1>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Admin -->

            <!-- Admin Login -->
            <div class="col-xxl-6 col-xl-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">User Aktif | <span>Sekarang</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <span class="mb-3">
                        Login sebagai <b class="text-success"><?= $_SESSION['nama_user'] ?></b><br>
                        Kelas <b class="text-success"><?= $_SESSION['kelas'] ?></b><br>
                        Jurusan <b class="text-success"><?= $_SESSION['jurusan'] ?></b>
                      </span>
                    </div>
                  </div>

                </div>
              </div>
            </div><!-- End Admin Login -->

            <!-- Omset -->
            <div class="col-xxl-6 col-xl-6">

              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Omset <span>| Total</span></h5>

                  <div class="d-flex align-items-center mb-2">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-basket"></i>
                    </div>
                    <div class="ps-3">
                      <h1>Rp. <?= number_format($omset, 0, ',', '.') ?>,-</h1>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Admin -->

            <!-- Koleksi Buku -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Koleksi Buku <span>| Total Data</span></h5>

                  <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Penerbit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    $no = 1;
                    foreach($koleksiBuku as $buku) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $buku['judul_buku'] ?></td>
                        <td><?= $buku['penulis'] ?></td>
                        <td><?= $buku['tahun_terbit'] ?></td>
                        <td><?= $buku['penerbit'] ?></td>
                    </tr>
                <?php
                $no++;
                    }
                ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Koleksi Buku -->

            <!-- Pinjaman Buku -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Penjualan Buku <span>| Total Data</span></h5>

                  <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Harga (Rp)</th>
                        <th scope="col">Jumlah Terjual</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    $no = 1;
                    foreach($penjualanBuku as $penjualan) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $penjualan['kode_transaksi'] ?></td>
                        <td><?= $penjualan['judul_buku'] ?></td>
                        <td><?= $penjualan['harga'] ?></td>
                        <td><?= $penjualan['jumlah_terjual'] ?></td>
                    </tr>
                <?php
                $no++;
                    }
                ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Pinjaman Buku -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <?php include "footer.php"; ?>