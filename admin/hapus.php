<?php
require('../functions.php');
    $slug=$_GET['slug'];
    $tipe=$_GET['tipe'];
    if($tipe==='furnitur'){
        mysqli_query($conn,"DELETE FROM furniturs WHERE slug='$slug' ");
    }
    if($tipe==='makanan'){
        mysqli_query($conn,"DELETE FROM food WHERE slug='$slug' ");
    }
    if($tipe==='elektronik'){
        mysqli_query($conn,"DELETE FROM elektroniks WHERE slug='$slug' ");
    }
    header('Location:admin.php')
?>