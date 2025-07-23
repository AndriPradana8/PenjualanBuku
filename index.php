<?php
  include "koneksi.php";

  // Query untuk populer
  $sql = "SELECT 
            `14_tabel_buku`.*, 
            SUM(`14_tabel_penjualan`.jumlah_terjual) AS total_terjual
          FROM 
            `14_tabel_penjualan`
          JOIN 
            `14_tabel_buku` ON `14_tabel_penjualan`.id_buku = `14_tabel_buku`.id
          GROUP BY 
            `14_tabel_penjualan`.id_buku
          ORDER BY 
            total_terjual DESC
          LIMIT 4";

  $result = $conn->query($sql);

  $populer = [];
  while ($row = $result->fetch_assoc()) {
      $populer[] = $row;
  }

  // Query untuk purchase
  $sql2 = "SELECT * FROM 14_tabel_buku";
  $result2 = $conn->query($sql2);
  $dataBuku = [];
  while ($row = $result2->fetch_assoc()) {
      $dataBuku[] = $row;
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Landing Web Buku Royal</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BookLanding
  * Template URL: https://bootstrapmade.com/bootstrap-book-landing-page-template/
  * Updated: Mar 02 2025 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->

        <!-- Uncomment the line below if you also wish to use a text logo -->
        <!-- <h1 class="sitename">BookLanding</h1>< -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#testimonials">Penjualan</a></li>
          <li><a href="#purchase">Beli Sekarang</a></li>
          <li><a href="#contact">Pengembang</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-5">
            <div class="book-hero-content" data-aos="fade-up" data-aos-delay="200">
              <span class="book-genre">Buku Terlaris</span>
              <h1><?= $populer[0]['judul_buku'] ?></h1>
              <p class="book-subtitle"><?= $populer[0]['ringkasan'] ?></p>
              <div class="author">
                <span>By</span>
                <h3><?= $populer[0]['penulis'] ?></h3>
              </div>
              <p class="book-description">
                <?= $populer[0]['keterangan'] ?>
              </p>
              <div class="hero-cta">
                <a href="#purchase" class="btn-primary">Beli Buku</a>
                <a href="#" class="btn-outline">Rp. <?= number_format($populer[0]['harga'], 0, ',', '.') ?>,-</a>
              </div>
            </div>
          </div>
          <div class="col-lg-5 d-flex justify-content-center justify-content-lg-end" data-aos="zoom-out" data-aos-delay="300">
            <div class="book-cover">
              <img src="assets/img/book/buku1.png" alt="Book Cover" class="img-fluid">
              <div class="book-shadow"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center gy-5 gx-lg-5">
          <div class="col-lg-6">
            <div class="about-book-img" data-aos="fade-right" data-aos-delay="200">
              <img src="assets/img/book/buku2.png" alt="Book Title" class="img-fluid">
              <div class="book-details">
                <div class="detail-item">
                  <i class="bi bi-journal"></i>
                  <div>
                    <span>Pages</span>
                    <p>384</p>
                  </div>
                </div>
                <div class="detail-item">
                  <i class="bi bi-translate"></i>
                  <div>
                    <span>Language</span>
                    <p>Indonesia</p>
                  </div>
                </div>
                <div class="detail-item">
                  <i class="bi bi-calendar3"></i>
                  <div>
                    <span>Published</span>
                    <p><?= $populer[0]['tahun_terbit'] ?></p>
                  </div>
                </div>
                <div class="detail-item">
                  <i class="bi bi-star"></i>
                  <div>
                    <span>Rating</span>
                    <p>4.8/5</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="about-book-content" data-aos="fade-left" data-aos-delay="300">
              <h2>Tentang Buku</h2>
              <div class="book-category">
                <span><i class="bi bi-bookmark"></i><?= $populer[0]['kategori'] ?></span>
                <span><i class="bi bi-people"></i><?= $populer[0]['penerbit'] ?></span>
              </div>
              <p>
                <?= $populer[0]['ringkasan'] ?>
              </p>
              <p>
                <?= $populer[0]['keterangan'] ?>
              </p>

              <a href="#purchase" class="about-book-cta">
                Beli Buku <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

        <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Penjualan Buku</h2>
        <p>Buku-Buku Dengan Penjualan Terlaris dan Paling Banyak Dibeli</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-12">

            <div class="testimonials-container">
              <div class="swiper testimonials-slider init-swiper" data-aos="fade-up" data-aos-delay="400">
                <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 5000
                    },
                    "slidesPerView": 1,
                    "spaceBetween": 30,
                    "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                    },
                    "breakpoints": {
                      "768": {
                        "slidesPerView": 2
                      },
                      "992": {
                        "slidesPerView": 3
                      }
                    }
                  }
                </script>
                
                <!-- query foto penulis -->
                <?php
                  $foto_penulis = !empty($populer[0]['foto_penulis']) ? $populer[0]['foto_penulis'] : 'profile-default.png';
                ?>

                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                      <h5><?= $populer[0]['judul_buku'] ?></h5>
                      <p>
                        <?= $populer[0]['ringkasan'] ?>
                      </p>
                      <div class="testimonial-profile">
                        <img src="assets/img/person/<?= $foto_penulis ?>" alt="Reviewer" class="img-fluid rounded-circle">
                        <div>
                          <h3><?= $populer[0]['penulis'] ?></h3>
                          <h4>Terjual <?= $populer[0]['total_terjual'] ?> Buku</h4>
                        </div>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                      <h5><?= $populer[1]['judul_buku'] ?></h5>
                      <p>
                        <?= $populer[1]['ringkasan'] ?>
                      </p>
                      <div class="testimonial-profile">
                        <img src="assets/img/person/<?= $foto_penulis ?>" alt="Reviewer" class="img-fluid rounded-circle">
                        <div>
                          <h3><?= $populer[1]['penulis'] ?></h3>
                          <h4>Terjual <?= $populer[1]['total_terjual'] ?> Buku</h4>
                        </div>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                      </div>
                      <h5><?= $populer[2]['judul_buku'] ?></h5>
                      <p>
                        <?= $populer[2]['ringkasan'] ?>
                      </p>
                      <div class="testimonial-profile">
                        <img src="assets/img/person/<?= $foto_penulis ?>" alt="Reviewer" class="img-fluid rounded-circle">
                        <div>
                          <h3><?= $populer[2]['penulis'] ?></h3>
                          <h4>Terjual <?= $populer[2]['total_terjual'] ?> Buku</h4>
                        </div>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                      <h5><?= $populer[3]['judul_buku'] ?></h5>
                      <p>
                        <?= $populer[3]['ringkasan'] ?>
                      </p>
                      <div class="testimonial-profile">
                        <img src="assets/img/person/<?= $foto_penulis ?>" alt="Reviewer" class="img-fluid rounded-circle">
                        <div>
                          <h3><?= $populer[3]['penulis'] ?></h3>
                          <h4>Terjual <?= $populer[3]['total_terjual'] ?> Buku</h4>
                        </div>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Testimonials Section -->

    <!-- Purchase Section -->
    <section id="purchase" class="purchase section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Dapatkan Bukunya Hari Ini</h2>
        <p>Promo spesial untuk pembelian buku hari ini</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">
          <?php 
          $delay = 100;
          foreach ($dataBuku as $buku): ?>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
              <div class="book-format-card">
                <div class="format-icon">
                  <i class="bi bi-book"></i>
                </div>
                <h3><?= htmlspecialchars($buku['judul_buku']) ?></h3>
                <div class="format-price">Rp. <?= number_format($buku['harga'], 0, ',', '.') ?>,-</div>
                <ul class="format-features">
                  <li><i class="bi bi-check-circle"></i> Premium quality binding</li>
                  <li><i class="bi bi-check-circle"></i> Full-color illustrations</li>
                  <li><i class="bi bi-check-circle"></i> Dust jacket included</li>
                  <li><i class="bi bi-check-circle"></i> 384 pages</li>
                </ul>
                <div class="buy-options">
                  <a href="#" class="btn-purchase">Beli Sekarang</a>
                  <div class="retailers">
                    <span>Tersedia di:</span>
                    <div class="retailer-logos">
                      <a href="#"><i class="bi bi-amazon"></i></a>
                      <a href="#"><i class="bi bi-shop"></i></a>
                      <a href="#"><i class="bi bi-shop-window"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php 
            $delay += 100;
          endforeach; 
          ?>
        </div>
      </div>
    </section><!-- /Purchase Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Pengembang</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center gy-5">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
            <div class="author-image">
              <img src="assets/img/foto-profile.jpeg" alt="Author Name" class="img-fluid">
              <div class="author-signature">
                <img src="assets/img/misc/name.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
            <div class="author-info">
              <h2>Andri Pradana (23220114)</h2>
              <h3>Sistem Informasi - SI 4G</h3>

              <div class="author-bio">
                <p style="text-indent: 2em;">
                  Tidak ada kata terlambat untuk memulai sesuatu yang baik. Setiap orang punya waktunya sendiri untuk tumbuh dan bersinar. Jangan bandingkan perjalananmu dengan orang lain, yang terpenting adalah kamu terus melangkah. Selama kamu masih mau belajar dan berusaha, selalu ada harapan dan kesempatan untuk berubah. Ingat, kamu tidak tertinggal, kamu hanya sedang berjalan di jalur yang unik milikmu sendiri.
                </p>
                <p style="text-indent: 2em;">
                  Hobi saya yaitu sangat suka belajar hal-hal baru dari sesuatu yang membuat penasaran, tentang apapun itu. Namun kebiasaan dari hobi itu adalah tidak pernah sampai ke hasil yang maksimal dan sempurna, semangat saya untuk terus mencoba dan memperbaiki selalu ada. Hal yang menarik dari diriku mungkin adalah rasa ingin tahu yang tinggi dan keinginan kuat untuk berkembang, terutama dalam bidang teknologi dan desain.
                </p>
              </div>

              <div class="author-awards">
                <h4>Penghargaan &amp; Pengakuan</h4>
                <ul>
                  <li><i class="bi bi-award"></i> <span>Lulus Sertifikasi Pelatihan Junior Network Administrator - Digitalent (2023)</span></li>
                  <li><i class="bi bi-award"></i> <span>Lulus Sertifikasi Pelatihan Video Editor - Digitalent (2024)</span></li>
                </ul>
              </div>

              <div class="author-social">
                <h4>Akun Sosial Media</h4>
                <div class="social-links">
                  <a href="#"><i class="bi bi-twitter"></i></a>
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-instagram"></i></a>
                  <a href="#"><i class="bi bi-linkedin"></i></a>
                  <a href="#"><i class="bi bi-globe"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">
    <div class="container">
      <div class="container">
        <div class="copyright">
          <span>Copyright</span> <strong class="px-1 sitename">UAS WP ROYAL</strong> <span>All Rights Reserved</span>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/front.js"></script>

</body>

</html>