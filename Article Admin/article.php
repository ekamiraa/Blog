<!DOCTYPE html>
<html lang="en">
  <?php
session_start();
?>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin | Article</title>

    <!-- Custom fonts for this template -->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link
      href="vendor/datatables/dataTables.bootstrap4.min.css"
      rel="stylesheet"
    />
    
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
     <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="index.html"
        >
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapsePages"
            aria-expanded="true"
            aria-controls="collapsePages"
          >
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Login</span>
          </a>
          <div
            id="collapsePages"
            class="collapse"
            aria-labelledby="headingPages"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Login Screens:</h6>
              <a class="collapse-item" href="form_login.php">Login</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="pengguna.php">
            <i class="bi bi-person-fill"></i>
            <span>Pengguna</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="kategori.php">
            <i class="bi bi-card-checklist"></i>
            <span>Kategori Artikel</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="article.php">
            <i class="bi bi-pencil-fill"></i>
            <span>Artikel</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            
              <button
                id="sidebarToggleTop"
                class="btn btn-link d-md-none rounded-circle mr-3"
              >
                <i class="fa fa-bars"></i>
              </button>
            

            

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div
                  class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>
              

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <!-- Mengkoneksikan data-->
                  <?php
                      include('koneksi/koneksi.php');
                      
                      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

                      if (!isset($_SESSION['username'])) {
                          die("Anda belum login");
                      }

                      $id = 1;

                      $user = $_SESSION['id_user'];

                      // Query to retrieve user data
                      $query = "SELECT * FROM user WHERE id_user='$user'";
                      $result = mysqli_query($conn, $query);
                      $data = $result->fetch_array();

                      ?>
                      <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >
                    Login as
                    </span>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >
                    <?php echo $data['nama']; ?>
                    </span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="img/undraw_profile_1.svg"
                  />
                </a>
                <!-- Dropdown - User Information -->
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown"
                >
                 
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#logoutModal"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Selamat Datang</h1>
            <p class="mb-4">
              Silahkan kelola artikel.
            </p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <a href="koneksi/tambah_artikel.php" class="btn btn-primary" type="button" 
                        data-toggle="modal" data-target="#tambahModal" name="tambah_artikel_btn">Tulis Artikel</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <!-- Menampilkan data -->
                      <?php
                      include("koneksi/koneksi.php");
                      $id=1;
                      $sql = "SELECT * FROM article 
                              INNER JOIN user ON article.id_user = user.id_user
                              INNER JOIN kategori ON kategori.id_kategori = article.id_kategori;";
                      $query = mysqli_query($conn, $sql);
                      while($data = mysqli_fetch_array($query)) {
                      ?>
                      <tr>
                        <td><?php echo $id++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['nama_kategori']; ?></td>

                        <input type="hidden" name="idarticle" value="<?php echo $data['id_article']; ?>">
                        <td><a href="" class="btn btn-success btn-sm" type="button" 
                        data-toggle="modal" data-target="#editModal<?php echo $data['id_article']; ?>" name="update_pengguna_btn">Update</a>
                                </td>

                        <!-- Edit Modal -->
                          <div class="modal fade" id="editModal<?php echo $data['id_article']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                                <button
                                  class="close"
                                  type="button"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                >
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                                <div class="modal-body">       
                                      <form action="koneksi/edit_article.php" method="POST" class="user">
                                         <!-- Menampilkan Nama Penulis -->
                                        <div class="form-group">
                                            <input type="hidden" name="id_article" value="<?php echo $data['id_article']; ?>"/>                 
                                          </div>
                                          <div class="form-group">
                                            <label for="penulis">Nama Penulis:</label>
                                            <input type="text" class="form-control form-control-user"
                                             aria-describedby="emailHelp"
                                            placeholder="Username" name="username" value="<?php echo $data['nama']; ?>" readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for="tanggal">Tanggal:</label>
                                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data['tanggal']; ?>" readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for="judul">Judul:</label>
                                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data['judul']; ?>">
                                          </div>
                                          <div class="form-group">
                                            <label for="nama_kategori">Nama Kategori:</label>
                                            <select class="form-control" id="nama_kategori" name="nama_kategori">
                                              <?php
                                              // Mengambil semua kategori
                                              $kategoriQuery = mysqli_query($conn, "SELECT * FROM kategori");
                                              while ($kategoriData = mysqli_fetch_assoc($kategoriQuery)) {
                                                $kategori = $kategoriData['nama_kategori'];
                                              ?>
                                                <option value="<?php echo $kategori; ?>" <?php if ($kategori == $data['nama_kategori']) echo 'selected'; ?>><?php echo $kategori; ?></option>
                                              <?php
                                              }
                                              ?>
                                            </select>
                                          </div>
                                        <button type="submit" class="btn btn-primary" name="edit_btn">Update</button>
                                      </form>
                                          
                                </div>
                                <div class="modal-footer">
                                <button
                                  class="btn btn-secondary"
                                  type="button"
                                  data-dismiss="modal"
                                >
                                  Cancel
                                </button>
                                
                              </div>
                              </div>
                            </div>
                          </div>

                        <td><a href="" class="btn btn-danger btn-sm" type="button" 
                                    data-toggle="modal" data-target="#deleteModal<?php echo $data['id_article']; ?>" name="delete_pengguna_btn">Delete</a></td>
                        
                        <!-- Delete Modal -->
                          <div class="modal fade" id="deleteModal<?php echo $data['id_article']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Artikel</h5>
                                <button
                                  class="close"
                                  type="button"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                >
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                                <div class="modal-body">       
                                      <form action="koneksi/delete_article.php" method="POST" class="user">
                                        <div class="form-group">
                                          <input type="hidden" name="id_article" value="<?php echo $data['id_article']; ?>"/>                 
                                        </div>
                                        <div class="form-group">
                                            <label for="penulis">Nama Penulis:</label>
                                            <input type="text" class="form-control form-control-user"
                                             aria-describedby="emailHelp"
                                            placeholder="Username" name="username" value="<?php echo $data['nama']; ?>" readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for="tanggal">Tanggal:</label>
                                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data['tanggal']; ?>" readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for="judul">Judul:</label>
                                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data['judul']; ?>">
                                          </div>
                                          <div class="form-group">
                                            <label for="nama_kategori">Nama Kategori:</label>
                                            <select class="form-control" id="nama_kategori" name="nama_kategori">
                                              <?php
                                              // Mengambil semua kategori
                                              $kategoriQuery = mysqli_query($conn, "SELECT * FROM kategori");
                                              while ($kategoriData = mysqli_fetch_assoc($kategoriQuery)) {
                                                $kategori = $kategoriData['nama_kategori'];
                                              ?>
                                                <option value="<?php echo $kategori; ?>" <?php if ($kategori == $data['nama_kategori']) echo 'selected'; ?>><?php echo $kategori; ?></option>
                                              <?php
                                              }
                                              ?>
                                            </select>
                                          </div>
                                        <div class="form-group">
                                            Apa kamu yakin akan menghapus data artikel di atas?
                                        </div>                                     
                                        <button type="submit" class="btn btn-primary" name="delete_btn">Delete</button>
                                      </form>
                                          
                                </div>
                                <div class="modal-footer">
                                <button
                                  class="btn btn-secondary"
                                  type="button"
                                  data-dismiss="modal"
                                >
                                  Cancel
                                </button>
                                
                              </div>
                              </div>
                            </div>
                          </div>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Tambah -->
      <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" >Tulis Artikel</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
            <div class="modal-body">
              <form action="koneksi/upload.php" method="POST" enctype="multipart/form-data" class="user">

                <!-- Menampilkan Nama Penulis -->
                <?php
                      include('koneksi/koneksi.php');

                      // Query to retrieve user data
                      $query = "SELECT * FROM user WHERE id_user='$user'";
                      $result = mysqli_query($conn, $query);
                      $data = $result->fetch_array();

                ?>
                <div class="form-group">
                  <label for="penulis">Nama Penulis:</label>
                  <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $data['nama']; ?>" readonly>
                </div>
              
                <!-- Menampilkan Tanggal -->
                <?php
                // Mengatur lokasi bahasa ke bahasa Indonesia
                setlocale(LC_TIME, 'id_ID');

                // Mendapatkan tanggal saat ini dengan format "l, d F Y" (Senin, 12 Juli 2023)
                $tanggal = date("l, d F Y");

                // Mengubah hari dan bulan menjadi bahasa Indonesia
                $nama_hari = array(
                    'Sunday' => 'Minggu',
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu'
                );

                $nama_bulan = array(
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                );

                $tanggal = strtr($tanggal, $nama_hari);
                $tanggal = strtr($tanggal, $nama_bulan);
                ?>
                <div class="form-group">
                  <label for="tanggal">Tanggal:</label>
                  <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>" required readonly>
                </div>

                <div class="form-group">
                  <label for="judul">Judul:</label>
                  <input type="text" class="form-control" id="judul" name="judul" required>
                </div>

                <!-- Menampilkan Kategori -->
                <?php
                      include('koneksi/koneksi.php');

                      // Query to retrieve user data
                      $query = "SELECT * FROM kategori";
                      $result = mysqli_query($conn, $query);
                ?>
                <div class="form-group">
                  <label for="nama_kategori">Nama Kategori:</label>
                  <select class="form-control" id="nama_kategori" name="nama_kategori" required>
                    <?php
                    // Iterasi melalui setiap baris data
                    while ($data = mysqli_fetch_assoc($result)) {
                        $kategori = $data['nama_kategori'];
                        ?>
                        <option value="<?php echo $kategori; ?>"><?php echo $kategori; ?></option>
                    <?php
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                  <label for="isiArtikel">Isi Artikel:</label>
                  <textarea name="isiArtikel" class="form-control" id="isiArtikel"></textarea>
                </div>
                <div class="form-group">
                  <label for="gambar">Gambar: </label>
                 <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
                </div>
                <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="tambah_btn">Tambah</button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>           
          </div>
          </div>
        </div>
      </div>

     <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" type="submit" href="koneksi/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Script for CKEDITOR -->
    <script src="ckeditor/ckeditor.js"></script>

    <script>
    ClassicEditor
        .create(document.querySelector('#isiArtikel'), {
          height: '500px'
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);           
        });
        // Fungsi untuk mengambil isi artikel dari editor
    function getIsiArtikel() {
        const isiArtikel = window.editor.getData();
        document.getElementById('isiArtikel').value = isiArtikel;
    }
    
    // Menangani penyerahan formulir
    const form = document.querySelector('.user');
    form.addEventListener('submit', function(event) {
        // Mengambil isi artikel sebelum mengirimkan formulir
        getIsiArtikel();
    });
</script>
    
    <!-- Script for icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
  </body>
</html>
