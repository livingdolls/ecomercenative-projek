<?php
    session_start();
    if(!isset($_SESSION['user'])){
        echo "<script>alert('Anda Harus Login');</script>";
        echo "<script>location='login.php';</script>";
    }
    if(!isset($_GET['id'])){
        header("Location:index.php");
    }

    $id = $_GET['id'];

    unset($_SESSION['keranjang']);

    echo "<script>alert('Sukses Hapus');</script>";
    echo "<script>location='keranjang.php';</script>";

?>