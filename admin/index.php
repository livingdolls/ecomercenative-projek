<?php
session_start();

    if($_SESSION['status'] != 'login'){
        header("Location:../index.php?pesan=belum_login");
        echo $_SESSION['nama'];
    }

    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Dashboard Admin</title>
</head>
<body>
    <div class="nave">
        <div class="naves">
            <div class="owner">
                <img src="../img/avatar1.png" width="25px" height="25px" alt="">
                <i><?= $_SESSION['idnama']; ?> </i>
            </div>

            <div class="icons">
                <i><img src="../img/notification.svg" width="25px" height="25px" alt=""></i>
                <a href="logout.php" title="Logout"><i><img src="../img/icons/unlock.svg" width="25px" height="25px" alt=""></i></a>
            </div>
        </div>
    
    </div>

    <div class="maine">
        <div class="menus">
        <h1>Main Menu</h1>
            <ul>
                <li class="mn"><a href="?halaman=barang">Manajemen Barang</a></li>
                <li class="mn"><a href="?halaman=addbarang">Tambah Barang</a></li>
                <li class="mn"><a href="?halaman=pembelian">Manajemen Pembelian</a></li>
                <li class="mn"><a href="?halaman=user">Manajemen User</a></li>
                <li class="mn"><a href="?halaman=adminadd">Tambah Admin</a></li>
            </ul>
        </div>
        <div class="utama">
            <?php
                if(isset($_GET['halaman'])){
                    if($_GET['halaman'] == 'barang'){
                        include 'barang.php';
                    }
                    elseif($_GET['halaman'] == 'pembelian'){
                        include 'pembelian.php';
                    }
                    elseif($_GET['halaman'] == 'user'){
                        include 'user.php';
                    }

                    elseif($_GET['halaman'] == 'adminadd'){
                        include 'adminadd.php';
                    }
                    elseif($_GET['halaman'] == 'addbarang'){
                        include 'add.php';
                    }
                }

            ?>
        </div>
    </div>
</body>

<footer>
</footer>