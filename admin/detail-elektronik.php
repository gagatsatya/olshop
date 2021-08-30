<?php
    require('../functions.php');
    $slug=$_GET['slug'];
    $elektronik=query("SELECT*FROM elektroniks WHERE slug='$slug'")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="admin.php">Online Shop</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../logout.php">Logout</a>
            </li>
        </div>
    </div>
</nav>
    
    <div class="row" style="margin-top:100px">
        <div class="col-5">
            <img src="../img/<?=$elektronik['img']?>" alt="img" width="400" height=300">
        </div>
        <div class="col-4 align-self-center">
            <h4><?=$elektronik['nama']?></h4>
            <h2 class="mt-2 mb-2">Rp <?=$elektronik['harga']?></h2>
            <img src="../img/star.svg" alt="img" width="20" height="20"><p style="display:inline"><?=$elektronik['rating']?></p>
            <p class="mt-4 mb-4"><?=$elektronik['deskripsi']?></p>
        </div>
        <div class="col-3 align-self-center" style="text-align: center">
            <a href="ubah.php?tipe=elektronik&&slug=<?=$elektronik['slug']?>"><button class="btn btn-primary" style="padding:5px 20px 5px 20px">Ubah</button></a>
            <a href="hapus.php?tipe=elektronik&&slug=<?=$elektronik['slug']?>"><button class="btn btn-danger" style="padding:5px 20px 5px 20px">Hapus</button></a>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
</body>
</html>