<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>ZBlog - About</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />

    <!-- Template Main CSS Files -->
    <link href="assets/css/variables.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: ZenBlog
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>
    <!-- ======= Header ======= -->
   <header id="header" class="header d-flex align-items-center fixed-top">
      <div
        class="container-fluid container-xl d-flex align-items-center justify-content-between"
      >
        <a href="index.php" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1>ZBlog</h1>
        </a>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="index.php">Blog</a></li>
            <li class="dropdown">
              <a href=""
                ><span>Categories</span>
                <i class="bi bi-chevron-down dropdown-indicator"></i
              ></a>
              <ul>
                <!-- Memanggil Kategori -->
                 <?php
                include("connect/koneksi.php");
                          $sql = "SELECT * FROM kategori";
                          $query = mysqli_query($conn, $sql);
                          while($data = mysqli_fetch_array($query)) {
                ?>
                <li><a href="category.php?id_kategori=<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></a></li>
                <?php 
                }
                ?>
              </ul>
            </li>

            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
        <!-- .navbar -->

        <div class="position-relative">
          <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
          <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
          <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

          <a href="#" class="mx-2 js-search-open"
            ><span class="bi-search"></span
          ></a>
          <i class="bi bi-list mobile-nav-toggle"></i>

          <!-- ======= Search Form ======= -->
          <div class="search-form-wrap js-search-form-wrap">
            <form action="search-result.html" class="search-form">
              <span class="icon bi-search"></span>
              <input type="text" placeholder="Search" class="form-control" />
              <button class="btn js-search-close">
                <span class="bi-x"></span>
              </button>
            </form>
          </div>
          <!-- End Search Form -->
        </div>
      </div>
    </header>
    <!-- End Header -->

    <main id="main">
      <section>
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-12 text-center mb-5">
              <h1 class="page-title">About us</h1>
            </div>
          </div>

          <div class="row mb-5">
            <div class="d-md-flex post-entry-2 half">
              <div
                class="ps-md-5 col-lg-12 text-center d-flex justify-content-center"
              >
                <p>
                  Selamat datang di ZBlog! Blog yang sangat cocok untuk generasi
                  Z. Di ZBlog, kami membahas beragam topik yang relevan bagi
                  Generasi Z, termasuk teknologi, pengembangan diri, buku, dan
                  journalling. Apakah Anda mencari berita teknologi terbaru,
                  tips pengembangan diri, rekomendasi buku, atau panduan dalam
                  membangun kebiasaan journalling, kami siap membantu Anda.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="footer-content">
        <div class="container">
          <div class="row g-5">
            <div class="col-lg-4">
              <h3 class="footer-heading">About ZBlog</h3>
              <p>
                ZBlog adalah blog untuk generasi Z yang membahas seputar self
                improvement, book, journalling, technology, dan masih banyak
                lagi.
              </p>
              <p>
                <a href="about.php" class="footer-link-more">Learn More</a>
              </p>
            </div>
            <div class="col-6 col-lg-2">
              <h3 class="footer-heading">Navigation</h3>
              <ul class="footer-links list-unstyled">
                <li>
                  <a href="index.php"
                    ><i class="bi bi-chevron-right"></i> Home</a
                  >
                </li>
                <li>
                  <a href="index.php"
                    ><i class="bi bi-chevron-right"></i> Blog</a
                  >
                </li>
                <li>
                  <a href="about.php"
                    ><i class="bi bi-chevron-right"></i> About us</a
                  >
                </li>
                <li>
                  <a href="contact.php"
                    ><i class="bi bi-chevron-right"></i> Contact</a
                  >
                </li>
              </ul>
            </div>
            <div class="col-6 col-lg-2">
              <h3 class="footer-heading">Categories</h3>
              <ul class="footer-links list-unstyled">
                <!-- Memanggil Kategori -->
                <?php
                include("connect/koneksi.php");
                          $sql = "SELECT * FROM kategori";
                          $query = mysqli_query($conn, $sql);
                          while($data = mysqli_fetch_array($query)) {
                ?>
                <li>
                  <a href="category.php?id_kategori=<?php echo $data['id_kategori']; ?>">
                    <i class="bi bi-chevron-right"></i><?php echo $data['nama_kategori']; ?></a
                  >
                </li>
                <?php 
                }
                ?>
              </ul>
            </div>

            <div class="col-lg-4">
              <h3 class="footer-heading">Recent Posts</h3>
              <ul class="footer-links footer-blog-entry list-unstyled">
              <?php
                  include("connect/koneksi.php");
                  $query = "SELECT * FROM article 
                            INNER JOIN kategori ON kategori.id_kategori = article.id_kategori 
                            ORDER BY id_article DESC
                            LIMIT 4 OFFSET 4";
                  $result = mysqli_query($conn, $query);
                  
                  while ($data = mysqli_fetch_assoc($result)) {
                        $kategori = $data['nama_kategori'];
                        $tanggal = $data['tanggal'];
                        $imageFilename = $data['gambar'];
                        $judul = $data['judul'];

                        // Tentukan path gambar
                        $imagePath = '../Article Admin/koneksi/' . $imageFilename; // Path relatif ke gambar
                ?>
                <li>
                  <a href="single-post.php?id_article=<?php echo $data['id_article']; ?>" class="d-flex align-items-center">
                    <img
                      src="<?php echo $imagePath; ?>"
                      alt=""
                      class="img-fluid me-3 footer-image"
                    />
                    <style>
                        .footer-image {
                            width: 120px; /* Ubah nilai ini sesuai kebutuhan Anda */
                            height: 60px;
                            object-fit: cover;
                        }
                    </style>
                    <div>
                      <div class="post-meta d-block">
                        <span class="category"><?php echo $kategori; ?></span>
                        <span class="mx-1">&bullet;</span>
                        <span><?php echo $tanggal; ?></span>
                      </div>
                      <span><?php echo $judul; ?></span>
                    </div>
                  </a>
                </li>
                <?php
                  }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-legal">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              <div class="copyright">
                © Copyright <strong><span>ZBlog</span></strong
                >. All Rights Reserved
              </div>
            </div>

            <div class="col-md-6">
              <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"
                  ><i class="bi bi-instagram"></i
                ></a>
                <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <a
      href="#"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
