<?php
    require('../functions.php');
    $tipe=$_GET['tipe'];
    if(isset($_POST['submit'])){
        if(tambah($_POST,$tipe)>0){
            echo "<script>
            alert('Berhasil menambahkan data');document.location.href='admin.php';
            </script>";
        }else{
            echo "Data gagal diubah ";
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li><label for="nama">Nama:</label><input type="text" name="nama" id="nama" required></li>
            <li><label for="slug">Slug:</label><input type="text" name="slug" id="slug" required></li>
            <li><label for="harga">Harga:</label><input type="text" name="harga" id="harga"></li>
            <li><label for="img">Gambar:</label><input type="file" name="img" id="img"></li>
            <li><label for="popular">Populer:</label><input type="text" name="popular" id="popular" required></li>
            <li><label for="lokasi">Lokasi: </label><input type="text" name="lokasi" id="lokasi" required></li>
            <li><label for="rating">Rating: </label><input type="text" name="rating" id="rating" required></li>
            <li><label for="deskripsi">Deskripsi: </label><textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required></textarea></li>
            <br><br><button type="submit" name="submit">Tambah</button>
            
        </ul>
    </form>
</body>
</html>