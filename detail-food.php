<?php
    require('functions.php');
    $slug=$_GET['slug'];
    $food=query("SELECT*FROM food WHERE slug='$slug'")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="index.php">Online Shop</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="makanan.php">Makanan</a></li>
                    <li><a class="dropdown-item" href="elektronik.php">Elektronik </a></li>
                    <li><a class="dropdown-item" href="furnitur.php">Furnitur</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </div>
    </div>
</nav>
    
    <div class="row" style="margin-top:100px">
        <div class="col-5">
            <img src="img/<?=$food['img']?>" alt="img" width="400" height=300">
        </div>
        <div class="col-4 align-self-center">
            <h4><?=$food['nama']?></h4>
            <h2 class="mt-2 mb-2">Rp <?=$food['harga']?></h2>
            <img src="img/star.svg" alt="img" width="20" height="20"><p style="display:inline"><?=$food['rating']?></p>
            <p class="mt-4 mb-4"><?=$food['deskripsi']?></p>
        </div>
        <div class="col-3 align-self-center" style="text-align: center">
            <div class="wrapper">
                <h6 style="margin-bottom:-10px;">Jumlah:</h6>
                <button id="plus">+</button>
                <div id="price">0</div>
                <button id="min">-</button>
            </div>
            <button style="background-color: lightblue;color:black;padding:5px 20px 5px 20px">Pesan Sekarang</button>
        </div>
    </div>

    <footer style="margin-top: 100px">
    <div class="container">
      <div class="row mt-5">
        <div class="col-3 align-self-center">
          <a href="/" style="font-size: 20px; color:black;text-decoration:none">Online Shop</a>
        </div>
        <div class="col-3">
          <p>New account</p>
          <p>Book a room</p>
          <p>Payment</p>
        </div>
        <div class="col-3">
          <p>About</p>
          <p>Privacy and policy</p>
          <p>Terms and conditions</p>
        </div>
        <div class="col-3">
          <p>support@onlineshop.id</p>
          <p>021-2208-1996</p>
          <p>OnlineShop Oy. Jakarta</p>
        </div>
      </div>
      <div class="row">
        <div class="col text-center pb-3 mt-2">
        <p>
          Copyright 2019 • All rights reserved • Online Shop
        </p>
      </div>
      </div>
    </div>
  </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
</body>
</html>