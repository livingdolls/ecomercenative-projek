<?php
    session_start();

    if($_SESSION['status'] != 'login'){
        header("Location:../index.php?pesan=belum_login");
        echo $_SESSION['nama'];
    }
    
    include 'db.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM barang WHERE id_barang = $id";
    $foto = mysqli_query($konek,"SELECT * FROM barang WHERE id_barang = $id");
    $data = mysqli_fetch_array($foto);
    unlink("../img/produk/".$data['foto']);
    $del = mysqli_query($konek,$sql);

    if($del){
        header("Location:index.php");
    }
    else{
        echo 'hapus gagal';
    }

?>