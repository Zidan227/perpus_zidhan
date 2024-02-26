<?php
// Start the session
session_start();

// Check if 'nama' is set in the session, if not, redirect to the login page
if (!isset($_SESSION['nama'])) {
  header("Location: ../login.php");
  exit();
}

if (!isset($_SESSION['nisn'])) {
  header("Location: ../login.php");
  exit();
}

// Access the NIS from the session
$nisn = $_SESSION['nisn'];

// Now you can use $nis wherever you need it

require "../config/config.php";
pengembalian();
// Assuming $id is the specific value you want to match
$statusArray = [0, 1, 2];
$statusString = implode(',', $statusArray);
$peminjaman = queryReadData("SELECT peminjaman.id AS peminjaman_id,
buku.cover AS cover,
buku.id_buku AS id_buku, 
buku.judul AS judul,
member.nisn AS nisn, 
member.nama AS nama, 
user.username AS username,
user.no_telp AS no_telp,
peminjaman.harga AS harga,
peminjaman.tgl_pinjam AS tgl_pinjam,
peminjaman.tgl_kembali AS tgl_kembali,
peminjaman.status AS status
FROM peminjaman
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
INNER JOIN member ON peminjaman.nisn = member.nisn
INNER JOIN user ON peminjaman.id_user = user.id
WHERE peminjaman.nisn = '$nisn' AND peminjaman.status IN ($statusString)");
// Replace $id with the actual condition you want to use in the WHERE clause
?>

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Perpus</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap css -->
  <link rel="stylesheet" type="text/css" href="../css2/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" type="text/css" href="../css2/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="../css2/responsive.css">
  <!-- fevicon -->
  <link rel="icon" href="../images/fevicon.png" type="image/gif" />
  <!-- font css -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,800;1,400&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css2/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="website icon" type="png" href="../images/p.png">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <div class="header_section">
          <div class="container-fluid">
            <n class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#page"><img src="../images/logof.png"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Daftar Buku</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#.php">Peminjaman</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="history.php">History</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Kembali</a>
                  </li>
                </ul>
              </div>
              </nav>
          </div>
        </div>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="mt-3 alert alert-success" role="alert">Riwayat Peminjaman Buku Anda - <strong><span class="fw-bold text-capitalize"><strong></strong><?php echo htmlentities($_SESSION["nama"]); ?></strong></span></div>

          <div class="card shadow">
            <div class="card-header" align="center">
              <h4 class="font-weight-bold text-success">Daftar Peminjaman Buku</h4>
            </div>

            <?php
            $alertDisplayed = false;

            foreach ($peminjaman as $item) :
              if ($item['status'] == 0 && !$alertDisplayed) {
            ?>
                <div class="alert alert-danger" align="center">
                  <strong>Peringatan!</strong> Jika sudah bayar, Silahkan kirim bukti transaksi ke nomor yang tertera jika ingin membaca buku.
                </div>
            <?php
                $alertDisplayed = true; // Set variabel ini menjadi true agar alert hanya ditampilkan sekali.
              }
            endforeach;
            ?>

            <?php
            $alertDisplayed = false;

            foreach ($peminjaman as $item) :
              if ($item['status'] == 1 && !$alertDisplayed) {
            ?>
                <div class="alert alert-warning" align="center">
                  Klik <strong>"Kembalikan"</strong> Jika Sudah Tenggat Pada Waktunya.
                </div>
            <?php
                $alertDisplayed = true; // Set variabel ini menjadi true agar alert hanya ditampilkan sekali.
              }
            endforeach;
            ?>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Cover</th>
                      <th>Judul Buku</th>
                      <th>Nama Petugas</th>
                      <th>Nomor Petugas</th>
                      <th>Harga</th>
                      <th>Tgl. Pinjam</th>
                      <th>Tgl. Selesai</th>
                      <th width="100">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; // Nomor urut dimulai dari 1
                    $totalHarga = 0; // Inisialisasi total harga

                    if (isset($peminjaman) && is_array($peminjaman) && count($peminjaman) > 0) {
                      foreach ($peminjaman as $item) :
                        // Menghapus karakter non-angka seperti "Rp." dan "."
                        $hargaBuku = floatval(preg_replace("/[^0-9]/", "", $item['harga']));
                        $totalHarga += $hargaBuku; // Menambahkan harga buku ke total
                    ?>

                        <tr>
                          <td align="center"><?php echo $no++ ?></td>
                          <td align="center">
                            <img src="../imgDB/<?= $item['cover']; ?>" alt="" width="70px" height="100px" style="border-radius: 5px;">
                          </td>
                          <td><?= $item["judul"]; ?></td>
                          <td><?= $item["username"]; ?></td>
                          <td><?= $item["no_telp"]; ?></td>
                          <td><?= $item["harga"]; ?></td>
                          <td><?= $item["tgl_pinjam"]; ?></td>
                          <td><?= $item["tgl_kembali"]; ?></td>
                          <td>
                            <?php
                            if ($item['status'] == '0') {
                              echo '<b class="badge bg-warning">Menunggu Persetujuan</b>';
                            ?>
                              <a href="batalPinjam.php?id=<?= $item['peminjaman_id']; ?>" class="btn btn-danger mt-2" style="width:80%;" onclick="return confirm('Anda Yakin Ingin Membatalkannya?');">Batal Pinjam?</a>
                            <?php
                            } elseif ($item['status'] == '1') {
                            ?>
                              <div>
                                <a href="bacabuku.php?id_buku=<?= $item['id_buku']; ?>" target="blank" class="btn btn-success mt-1"><i class="fas fa-book-open"></i>Baca Buku</a>
                              </div>
                              <div>
                                <a href="kembali.php?id=<?= $item['peminjaman_id']; ?>" class="btn btn-warning mt-1" onclick="return confirm('Anda Yakin Ingin Mengembalikannya?');"> Kembalikan</a>
                              </div>
                            <?php
                            }
                            if ($item['status'] == '2') {
                              echo '<b class="badge bg-danger">Tidak Disetujui</b>';
                            }
                            ?>
                          </td>
                        </tr>
                    <?php endforeach;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <strong>Total Harga: </strong>
                Rp. <?= number_format($totalHarga, 0, ',', '.'); ?>
              </div>
            </div>
          </div>
        </div>
        <!-- End of Main Content -->

      </div>
      <!-- End of Main Content -->

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

</body>

</html>