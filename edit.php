<?php 


require './config/db.php';

$id = $_GET['id'];

$products = mysqli_query($db_connect,"SELECT * FROM products where id_produk = $id");


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
<h1>Edit Produk</h1>
    <a href="show.php">Lihat data produk</a>
    <?php while($row = mysqli_fetch_array($products)) { ?>
    <form action="./backend/edit.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nama_produk" placeholder="input nama produk" value="<?= $row['nama_produk'] ?>">
        <input type="hidden" name="id_produk" value="<?= $id ?>">
        <input type="number" name="harga" placeholder="input harga produk"value="<?= $row['harga'] ?>">
        <input type="file" name="gambar_produk" >
        <input type="submit" value="simpan" name="submit">
    </form>
    <?php } ?>
</body>
</html>