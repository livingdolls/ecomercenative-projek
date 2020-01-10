<?php

    include 'admin/db.php';

    if(isset($_GET['inp'])){
    $idbr   = $_GET['id'];
    $warna  = $_GET['color'];
    $size   = $_GET['satu'];
    $jmlh   = $_GET['jmlh'];

    $sql = "INSERT INTO dbcart(`id_barang`, `jumlah`, `size`) VALUES ('$idbr','$jmlh','$size')";

    $data = mysqli_query($konek,$sql);
    }

    $query  = "SELECT * FROM dbcart,barang WHERE id_barang = id ";
    $nama   = mysqli_query($konek,$query);

    $view   = mysqli_fetch_assoc($nama);
    var_dump($view);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>