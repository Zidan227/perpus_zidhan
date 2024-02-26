<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Baca Buku</title>
  <link rel="icon" href="../images/p.png" type="png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <center>
    <?php
    include '../config/config.php';

    $idBuku = $_GET["id_buku"];
    $query = queryReadData("SELECT * FROM buku WHERE id_buku = '$idBuku'");
    ?>
    <?php foreach ($query as $item) : ?>
      <embed type="application/pdf" src="../isi-buku/<?php echo $item['isi_buku']; ?>#toolbar=0" width="100%" height="700"></embed>
    <?php
    endforeach;
    ?>
  </center>
</body>

</html>