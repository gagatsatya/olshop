<?php
session_start();
require('functions.php');
if(isset ($_POST['register'])){
    if(registrasi($_POST)>0){
        $_SESSION['login']=true;
        $_SESSION['name']=$_POST['username'];
        // header('Location:index.php');
        // echo "<script>
        // alert('Berhasil mendaftar')
        // </script>";
        echo "<script>
            alert('Berhasil mendaftar');
            document.location.href='index.php';
            </script>";
    }else{
        echo mysqli_error($conn);
    }
};

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
        </div>
    </div>
    </nav>
</div>
<div class="container mt-5" style="margin-top:80px">
    <div class="row justify-content-md-center">
        <div class="card text-center" style="width: 24rem;padding:20px">
            <div class="card-body">
                <form action="" method="post">
                <table style="border-collapse:separate;border-spacing:8px 16px;">
                    <tr>
                        <td><label for="username">Nama </label></td>
                        <td><input type="text" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password </label></td>
                        <td><input type="password" name="password" id="password" required></td>
                    </tr>
                    <tr>
                        <td><label for="password2">Konfirmasi Password </label></td>
                        <td><input type="password" name="password2" id="password2" required></td>
                    </tr>
                </table>
                <button class="btn btn-primary" name="register" type="submit">Mendaftar</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
</body>
</html>