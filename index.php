
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <title>Aplikasi Data warga</title>
</head>
<body background="gambar.jpg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Data warga</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="?hal=arsip">arsip_kk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?hal=detail">detail_kk</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="?hal=logout">logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <?php
    include "koneksi.php";
    @$hal = $_GET ['hal'];
   if ($hal == 'arsip'){
    include "arsip.php";
     } else if ($hal == 'detail'){
  include "detail.php";
  }
  ?>
  
  </div>
</body>
</html>