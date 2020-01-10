<?php
include 'admin/db.php';
    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = $konek->query("SELECT *  FROM barang WHERE id_barang = $id");
        $r = $sql->fetch_assoc();

        if(isset($_SESSION['keranjang'][$id])){
            $_SESSION['keranjang'][$id] =[
                'id'            => $id,
                'nama_barang'   => $r['nama'],
                'harga'         => $r['harga'],
                'warna'         => "Merah",
                'ukuran'        => "l",
                'jumlah'        => $_SESSION['keranjang'][$id]['jumlah'] + 1
            ];
        }
        else{
            $_SESSION['keranjang'][$id] =[
                'id'            => $id,
                'nama_barang'   => $r['nama'],
                'harga'         => $r['harga'],
                'warna'         => "Merah",
                'ukuran'        => "l",
                'jumlah'        => 1
            ];
        }

        echo "<script>alert('Sukses Ditambah Ke Keranjang');</script>";
        echo "<script>location='keranjang.php';</script>";
    }else{
        header("Location:index.php");
    }
?>