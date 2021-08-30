<?php
    session_start();
    require('../functions.php');
    if(!isset($_SESSION['login'])){
        header('Location:login.php');
    }

    $foods=query("SELECT*FROM food");
    $furniturs=query("SELECT*FROM furniturs");
    $elektroniks=query("SELECT*FROM elektroniks");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title>Admin</title>
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
    <h1>Welcome Admin</h1>
    <h3 style="display:inline;" class="mt-5">Makanan</h3>
    <a style="display:inline;" href="tambah.php?tipe=makanan">Tambahkan data</a>
    <div class="row mt-3">
        <?php foreach($foods as $food):?>
        <div class="col-3 mb-3">
            <a href="detail-food.php?slug=<?= $food['slug'] ?>"><img src="../img/<?=$food['img']?>" alt="img" width="250" height="150"></a>
            <h5><?=$food["nama"];?></h5>
            <p><?=$food["harga"];?></p>
        </div>
        <?php endforeach ?>
    </div>
    <h3 style="display:inline;" class="mt-5">Furnitur</h3>
    <a style="display:inline;" href="tambah.php?tipe=furnitur">Tambahkan data</a>
    <div class="row mt-3">
        <?php foreach($furniturs as $f):?>
        <div class="col-3 mb-3">
            <a href="detail-furnitur.php?slug=<?=$f['slug']?>"><img src="../img/<?=$f['img']?>" alt="img" width="250" height="150"></a>
            <h5><?=$f["nama"];?></h5>
            <p><?=$f["harga"];?></p>
        </div>
        <?php endforeach ?>
    </div>
    <h3 style="display:inline;" class="mt-5">Elektronik</h3>
    <a style="display:inline;" href="tambah.php?tipe=elektronik">Tambahkan data</a>
    <div class="row mt-3">
        <?php foreach($elektroniks as $f):?>
        <div class="col-3 mb-3">
            <a href="detail-elektronik.php?slug=<?=$f['slug']?>"><img src="../img/<?=$f['img']?>" alt="img" width="250" height="150"></a>
            <h5><?=$f["nama"];?></h5>
            <p><?=$f["harga"];?></p>
        </div>
        <?php endforeach ?>
    </div>
</div>
</body>
</html>