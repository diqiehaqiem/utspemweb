<?php

require './../config/db.php';

if(isset($_POST['submit'])) {
    global $db_connect;

    $name = $_POST['nama_produk'];
    $price = $_POST['harga'];
    $image = $_FILES['gambar_produk']['name'];
    $tempImage = $_FILES['gambar_produk']['tmp_name'];

    $randomFilename = time().'-'.md5(rand()).'-'.$image;

    $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/web-programming-p6/upload/'.$randomFilename;

    $upload = move_uploaded_file($tempImage,$uploadPath);

    if($upload) {
        mysqli_query($db_connect,"INSERT INTO products (nama_produk,harga,gambar_produk)
                    VALUES ('$name','$price','/upload/$randomFilename')");
        echo "berhasil upload";
        header("location:../show.php");
    } else {
        echo "gagal upload";
    }

}