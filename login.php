<?php
    session_start();
    require('functions.php');
    if(isset($_POST['login'])){
        $username= $_POST['username'];
        $password= $_POST['password'];

        $result=mysqli_query($conn,"SELECT * FROM pengguna WHERE name='$username'");

        if($username==='admin'){
            $admin=mysqli_query($conn,"SELECT*FROM pengguna WHERE name='admin'");
            $passwordAdmin=mysqli_fetch_assoc($admin);
            if(password_verify($password,$passwordAdmin['password'])){
                $_SESSION['login']=true;
                $_SESSION['name']=$username;
                header('Location:admin/admin.php');
            }else{
                echo 'Password Salah';
            }
        }

        elseif(mysqli_num_rows($result)===1){
            $row =mysqli_fetch_assoc($result);
            if(password_verify($password,$row['password'])){
                $_SESSION['login']=true;
                $_SESSION['name']=$username;
                header("Location: index.php");
            }else{
                echo 'Password Salah';
            }
        }else{
            echo 'Usename Salah';
        }

        

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Login</title>
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
<div class="container" style="margin-top:80px">
    <div class="row justify-content-md-center">
        <div class="card text-center" style="width: 24rem;padding:20px">
            <div class="card-body">
                <form action="" method="post">
                <table style="border-collapse:separate;border-spacing:8px 16px;">
                    <tr>
                        <td><label for="username">Nama </label></td>
                        <td><input type="text" name="username" id="username"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password </label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                </table>
                <button class="btn btn-primary" type="sumbit" name="login">Login</button>
                </form>
                <a href="registrasi.php">Belum mendaftar?</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>