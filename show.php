<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data produk</h1>
    <a href="create.php" type="button"> Tambah Data</a> 
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Gambar Produk</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require './config/db.php';

                $products = mysqli_query($db_connect,"SELECT * FROM products");
                $no = 1;

                while($row = mysqli_fetch_assoc($products)) {
            ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['nama_produk'];?></td>
                    <td><?=$row['harga'];?></td>
                    <!-- <td><img src="<?=$row['gambar_produk'];?>" width="100"></td> -->
                    <td><a href="./upload/<?=$row['gambar_produk'];?>" target="_blank">unduh</a></td>
                    <td>
                        <a href="edit.php?id=<?=$row['id_produk'];?>">Edit</a>
                        <a href="./backend/delete.php?id=<?=$row['id_produk'];?>">Hapus</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>