<?php
require "../config/config.php";

$member = queryReadData("SELECT * FROM kategori_buku");

if (isset($_SESSION['sebagai'])) {
  if ($_SESSION['sebagai'] == 'petugas') {
    header("Location: DashboardPetugas/index.php");
    exit;
  }
}
// Start the session first
session_start();
// Check if 'nama' is set in the session, if not, redirect to the login page
if (!isset($_SESSION['username'])) {
  header("Location: ../admin.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Perpus</title>
  <link rel="icon" href="../images/perpus.png" type="png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
  <!-- Custom fonts for this template -->
  <link href="../assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../assets2/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../assets2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="icon" type="png" href="../images/p.png">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <div class="sticky-top">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="kategori.php">
          <div class="sidebar-brand-text fas fa-book"> Perpus</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fa-solid fa-house"></i>
            <span>Home</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="#.php">
            <i class="fas fa-bars"></i>
            <span>Kategori Buku</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-user-plus"></i>
            <span>Pengguna</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded ">
              <a class="collapse-item" href="akun.php">Daftar Akun</a>
              <a class="collapse-item" href="member.php">Daftar Member</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-book-open"></i>
            <span>Buku</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="buku.php">Daftar Buku</a>
              <a class="collapse-item" href="peminjaman.php">Daftar Peminjaman</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

    </ul>
    <!-- End of Sidebar -->

    <?php
    // Mendapatkan tanggal dan waktu saat ini
    $date = date('Y-m-d H:i:s'); // Format tanggal dan waktu default (tahun-bulan-tanggal jam:menit:detik)
    // Mendapatkan hari dalam format teks (e.g., Senin, Selasa, ...)
    $day = date('l');
    // Mendapatkan tanggal dalam format 1 hingga 31
    $dayOfMonth = date('d');
    // Mendapatkan bulan dalam format teks (e.g., Januari, Februari, ...)
    $month = date('F');
    // Mendapatkan tahun dalam format 4 digit (e.g., 2023)
    $year = date('Y');
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <h5 class="mt-1 mx-3 fw-bold"><span class="fs-5 text-secondary"> <?php echo $day . ", " . $dayOfMonth . " " . " " . $month . " " . $year; ?> </span></h5>
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../assets/user.png" alt="memberLogo" width="40px">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item text-center text-secondary"><span class="text-capitalize"><?php echo $_SESSION['nama']; ?></span></a>
                <a class="dropdown-item text-center mb-2"><span class="text-capitalize"><?php echo $_SESSION['sebagai']; ?></span></a>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="signOut.php">Sign Out <i class="fa-solid fa-right-to-bracket"></i></a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->

          <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-success col-md-2"><span class="glyphicon glyphicon-plus"></span><i class="fas fa-plus mr-2"></i>Tmbh Kategori</button>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Daftar Kategori</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($member as $item) :
                    ?>
                      <tr>
                        <td align="center"><?php echo $no++ ?></td>
                        <td align="center"><?php echo $item['kategori'] ?></td>
                        <td align="center">
                          <a href="deleteKategori.php?kategori=<?= $item['kategori']; ?>" class="btn btn-danger" onclick="return confirm('Apakah <?= $item['kategori']; ?> ingin anda hapus? Jika anda hapus maka data buku dengan kategori ini juga akan terhapus!');"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>

                    <?php endforeach; ?>

                    <?php
                    if (isset($_POST['kate'])) {
                      $kategori = $_POST['kategori'];

                      // Query untuk memeriksa apakah kategori sudah ada dalam database
                      $check_query = "SELECT * FROM kategori_buku WHERE kategori = '$kategori'";
                      $check_result = mysqli_query($connection, $check_query);
                      if (mysqli_num_rows($check_result) > 0) {
                        // Kategori sudah ada, beri tahu pengguna
                        echo "<script>alert('Kategori Sudah Ada, Silakan Cari Lagi');window.location='kategori.php';</script>";
                      } else {
                        // Kategori belum ada, tambahkan ke database
                        $insert_query = "INSERT INTO kategori_buku (kategori) VALUES ('$kategori')";
                        $insert_result = mysqli_query($connection, $insert_query);
                        if (!$insert_result) {
                          die("Query gagal dijalankan: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
                        } else {
                          echo "<script>alert('Data berhasil ditambah.');window.location='kategori.php';</script>";
                        }
                      }
                    }
                    ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
          <!-- modal input -->
          <div id="myModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Kategori</h4>
                </div>
                <div class="modal-body">
                  <form method="POST">
                    <div class="form-group">
                      <label for="kategori">Kategori</label>
                      <input type="text" name="kategori" id="kategori" required="required" placeholder="Kategori" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-sm btn-success" name="kate"><i class="fa fa-plus"></i> Tambah</button>
                      <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Reset</button>
                      <a href="kategori.php" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Footer -->
          <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Bootstrap core JavaScript-->
      <script src="../assets2/vendor/jquery/jquery.min.js"></script>
      <script src="../assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="../assets2/vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="../assets2/js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="../assets2/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="../assets2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="../assets2/js/demo/datatables-demo.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>