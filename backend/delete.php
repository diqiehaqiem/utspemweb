<?php 

require '../config/db.php';

$id = $_GET['id'];
mysqli_query($db_connect,"delete from products where id_produk=$id");
header('location:../delete.php');

?>