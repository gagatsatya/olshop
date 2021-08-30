<?php
    $conn=mysqli_connect("localhost","root","","olshop");

    function query($query){
        global $conn;
        $result=mysqli_query($conn,$query);
        $rows=[];
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }

    function registrasi($data){
        global $conn;

        $username= strtolower($data['username']);
        $password= mysqli_real_escape_string($conn,$data['password']);
        $password2= mysqli_real_escape_string($conn,$data['password2']);

        //username sudah ada
        $result=mysqli_query($conn,"SELECT name FROM pengguna WHERE name='$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>alert('Username sudah ada')</script>";
            return false;
        }

        if($password !== $password2){
            // echo "<script>alert('Password tidak sama')</script>";
            echo 'Password tidak sama';
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        //masukkan ke db
        mysqli_query($conn,"INSERT INTO pengguna (name,password) VALUES('$username','$password')");

        return  mysqli_affected_rows($conn);
    }

    function tambah($data,$tipe){
        global $conn;
        $nama=htmlspecialchars($data['nama']);
        $slug=htmlspecialchars($data['slug']);
        $popular=htmlspecialchars($data['popular']);
        $harga=htmlspecialchars($data['harga']);
        $rating=htmlspecialchars($data['rating']);
        $lokasi=htmlspecialchars($data['lokasi']);
        $deskripsi=htmlspecialchars($data['deskripsi']);
        $img=upload();
        if($img===false){
            return false;
        }

        if($tipe==='furnitur'){
        mysqli_query($conn,"INSERT INTO furniturs VALUE('','$nama','$slug','$popular','$harga','$img','$rating','$lokasi','$deskripsi','','')");
        }
        if($tipe==='makanan'){
            mysqli_query($conn,"INSERT INTO food VALUE('','$nama','$slug','$popular','$harga','$img','$rating','$lokasi','$deskripsi','','')");
        }
        if($tipe==='elektronik'){
            mysqli_query($conn,"INSERT INTO elektroniks VALUE('','$nama','$slug','$popular','$harga','$img','$rating','$lokasi','$deskripsi','','')");
        }
        return mysqli_affected_rows($conn);
    }

    function upload(){
        $namafile=$_FILES["img"]["name"];
        $ukuranfile=$_FILES["img"]["size"];
        $error=$_FILES["img"]["error"];
        $tmpfile=$_FILES["img"]["tmp_name"];

        //cek jika tidak ada gambar diupload
        if($error===4){
            echo "
            <script>
                alert('Upload gambar dahulu');
            </script>";
        return false;
        }
        //cek apakah yg diupload adalah gambar
        $jenisfile=['jpg','jpeg','png'];
        $ekstensigambar=explode('.',$namafile);
        $ekstensigambar=strtolower(end($ekstensigambar));
        if( !in_array($ekstensigambar,$jenisfile)){
            echo "
            <script>
                alert('Bukan gambar');
            </script>";
        return false;
        }
        if($ukuranfile>5000000){
            echo "
            <script>
                alert('Terlalu besar');
            </script>";
        return false;
        }
        
        //generate nama file random
        $namarandom = uniqid();
        $namarandom .= '.';
        $namarandom .= $ekstensigambar;

        move_uploaded_file($tmpfile,'../img/'. $namarandom);
        return $namarandom;

    }


    function ubah($data,$tipe){
        global $conn;
        $id=htmlspecialchars($data['id']);
        $nama=htmlspecialchars($data['nama']);
        $slug=htmlspecialchars($data['slug']);
        $imglama=htmlspecialchars($data['imglama']);
        $popular=htmlspecialchars($data['popular']);
        $harga=htmlspecialchars($data['harga']);
        $rating=htmlspecialchars($data['rating']);
        $lokasi=htmlspecialchars($data['lokasi']);
        $deskripsi=htmlspecialchars($data['deskripsi']);

        if($_FILES['img']['error']===4){
            $img=$imglama;
        }else{
            $img=upload();
        }

        if($tipe==='furnitur'){
            mysqli_query($conn,"UPDATE furniturs SET nama='$nama',slug='$slug',img='$img',popular='$popular',harga='$harga',rating='$rating',lokasi='$lokasi',deskripsi='$deskripsi' WHERE id=$id");
        }
        if($tipe==='makanan'){
            mysqli_query($conn,"UPDATE food SET nama='$nama',slug='$slug',img='$img',popular='$popular',harga='$harga',rating='$rating',lokasi='$lokasi',deskripsi='$deskripsi' WHERE id=$id");
        }
        if($tipe==='elektronik'){
            mysqli_query($conn,"UPDATE elektroniks SET nama='$nama',slug='$slug',img='$img',popular='$popular',harga='$harga',rating='$rating',lokasi='$lokasi',deskripsi='$deskripsi' WHERE id=$id");
        }

        return mysqli_affected_rows($conn);
    }

    
?>