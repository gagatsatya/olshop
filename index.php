<?php
    session_start();
    require('functions.php');
    $food=query("SELECT * FROM food WHERE popular='yes'");
    $furniturs=query("SELECT * FROM furniturs WHERE popular='yes'");
    $elektroniks=query("SELECT * FROM elektroniks WHERE popular='yes'");

    // var_dump($food);
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
            <?php if(isset($_SESSION['login'])): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$_SESSION['name']?></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <?php endif ?>
        </div>
    </div>
</nav>


<header>
    <div class="row">
        <div class="col-5 align-self-center">
            <h1>Kualitas Memuaskan <br>Harga Terjangkau</h1>
            <p class="fw-light mt-4">Pesan barang sepuasnya sesuai dengan kebutuhan dan keinginan<br>ongkos kirim murah dan cepat</p>
        </div>
        <div class="col-7">
            <div class="slider">
                <figure>
                    <img src="img/elektronik2.jpg" alt="img">
                    <img src="img/food1.jpg" alt="img">
                    <img src="img/furnitur2.jpg" alt="img">
                    <img src="img/food2.jpg" alt="img">
                    <img src="img/elektronik2.jpg" alt="img">
                </figure>
        </div>
        </div>
    </div>
</header>
<section class="isi">
        <div class="row mt-5">
            <h2>Makanan</h2>
            <?php foreach ($food as $f):?>
                <div class="col-3">
                    <a href="detail-food.php?slug=<?=$f["slug"];?>"><img width="260" height="160" src="img/<?=$f['img']?>" alt=""></a>
                    <h5><?=$f['nama']?></h5>
                    <p><?='Rp'.$f['harga']?></p>
                </div>
            <?php endforeach ?>
        </div>
        <div class="row mt-5">
            <h2>Furnitur</h2>
            <?php foreach ($furniturs as $f):?>
                <div class="col-3">
                <a href="detail-furnitur.php?slug=<?=$f["slug"];?>"><img width="260" height="160" src="img/<?=$f['img']?>" alt=""></a>
                <h5><?=$f['nama']?></h5>
                <p><?='Rp'.$f['harga']?></p>
                </div>
            <?php endforeach ?>
        </div>
        <div class="row mt-5">
            <h2>Elektronik</h2>
            <?php foreach ($elektroniks as $f):?>
                <div class="col-3">
                <a href="detail-elektronik.php?slug=<?=$f["slug"];?>"><img width="260" height="160" src="img/<?=$f['img']?>" alt=""></a>
                <h5><?=$f['nama']?></h5>
                    <p><?='Rp'.$f['harga']?></p>
                </div>
            <?php endforeach ?>
        </div>
    </section>
<section class="testimoni" style="margin-top:80px">
    <div class="row justify-content-center">
        <div class="col-8 text-center">
          <h3 style="color:grey;font-weight:400">
           Membeli barang di sini sangat memuaskan, barang yang saya pesan selalu sesuai ekspektasi, harganya murah meriah dan pengirimannya pun sangat cepat. Terima kasih Online Shop
          </h3>
          <h6 class="mt-3 mb-0">Bambang Budiman</h6>
          <p style="margin-top: 0">UI Designer</p>
        </div>
    </div>
</section>
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
    
</body>
</html>