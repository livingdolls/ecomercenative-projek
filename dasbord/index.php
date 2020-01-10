<?php
session_start();

if(!isset($_SESSION['user'])){
    echo "<script>alert('Anda Belum Login');</script>";
    echo "<script>location='login.php';</script>";
}
include '../admin/db.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/dasbord.css">
    <title>Dashboard <?= $_SESSION['user']['nama_user']; ?></title>
</head>
<body>
        <div class="jdlweb">
                <p class="jdlwebs">
                    Web Fashion Laki-Laki
                </p>
            </div>
<!-- header -->
<header>
        <div class="nav">
            <div class="icon">
                <i class="ma"><a href="https://instagram.com"><img src="../img/icons/Instagram.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://facebook.com"><img src="../img/icons/Facebook.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://twitter.com"><img src="../img/icons/Twitter.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://youtube.com"><img src="../img/icons/YouTube2.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://skype.com"><img src="../img/icons/Skype.svg" height="25px" width="25px"></a></i>
            </div>
            <div class="menuq">
                <ul class="at">
                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="https://Facebook.com">ABOUT</a></li>
                    <li><a href="lapor.html">LAPORAN</a></li>
                <?php if(isset($_SESSION['user'])) : ?>
                    <li><a href="../logout.php">LOGOUT</a></li>
                <?php else : ?>
                    <li><a href="../login.php">LOGIN</a></li>
                <?php endif; ?>
                    <li><a href="../ppolice.html">PRIVACE POLICY</a></li>  
                </ul>
            </div>
            </div>
        </header>

        <div class="das-body">
            <div class="das-section">
                        <div class="menus">
                        <h1>Main Menu</h1>
                            <ul>
                                <li class="mn"><a href="?halaman=riwayat">Riwayat Belanja</a></li>
                                <li class="mn"><a href="?halaman=data">Update Data Diri</a></li>
                            </ul>
                </div>
            </div>

            <div class="das-container">
            <?php
                if(isset($_GET['halaman'])){
                    if($_GET['halaman'] == 'barang'){
                        include 'barang.php';
                    }
                    elseif($_GET['halaman'] == 'riwayat'){
                        include 'riwayatbelanja.php';
                    }
                    elseif($_GET['halaman'] == 'user'){
                        include 'user.php';
                    }

                    elseif($_GET['halaman'] == 'data'){
                        include 'update.php';
                    }
                    elseif($_GET['halaman'] == 'addbarang'){
                        include 'add.php';
                    }else{
                        include 'not.php';
                    }
                    
                }else{
                    include 'welcome.php';
                }

            ?>
            </div>
        </div>

    <!-- footer -->

    <div class="footer">
            <div class="pembungkus">
            <div class="box1">
                <p class="penulis">
                ABOUT WEB
                </p>
                
                <p class="tntng">
                        Website ecommerce mencakup berbagai fungsi seperti etalase produk, pemesanan online dan inventarisasi stok, untuk menjalankan fungsi utama sebagai e-commerce.
                </p>
            </div>
            <div class="box2">
                <p class="kntk">
                    Kontak
                </p>
                <div class="sosmed">
                    <i class="scm"><img height="40px" width="40px" src="../img/icons/Facebook.svg" alt=""></i>
                    <i class="scm"><img height="40px" width="40px" src="../img/icons/Instagram.svg" alt=""></i>
                    <i class="scm"><img height="40px" width="40px" src="../img/icons/Twitter.svg" alt=""></i>
                    <i class="scm"><img height="40px" width="40px" src="../img/icons/YouTube2.svg" alt=""></i>
                    <i class="scm"><img height="40px" width="40px" src="../img/icons/Skype.svg" alt=""></i>
                </div>
    
            </div>
            <div class="box3">
                <p class="penulis">
                    Owner Web
                </p>
    
                <img class="owner" src="../img/owner2.JPG" alt="Nanang Setiawan">
    
                <p class="nama">
                    Nanang Setiawan
                </p>
            </div>
            </div>
            <div class="box4">
                <p class="cpy">
                    Copyright © 2019 Web Shop | Powered by Unisbank
                </p>
            </div>
        </div>

</body>
</html>