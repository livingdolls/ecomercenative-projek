<?php
session_start();

    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == 'belum_login'){
            echo '<script language="javascript">';
            echo 'alert("Anda Belum login")';
            echo '</script>';
        }
    }

    include 'admin/db.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashion Laki Laki</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css"> 
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<div class="jdlweb">
                <p class="jdlwebs">
                    Web Fashion Laki-Laki
                </p>
            </div>
    <header>
    <div class="nav">
        <div class="icon">
                <i class="ma"><a href="https://facebook.com"><img src="img/icons/Facebook.svg" height="25px" width="25px"></a></i>
                <i class="ma"><a href="https://instagram.com"><img src="img/icons/Instagram.svg" height="25px" width="25px"></a></i>
                <i class="ma"><a href="https://twitter.com"><img src="img/icons/Twitter.svg" height="25px" width="25px"></a></i>
                <i class="ma"><a href="https://youtube.com"><img src="img/icons/YouTube2.svg" height="25px" width="25px"></a></i>
                <i class="ma"><a href="riwayat.php"><img src="img/icons/Skype.svg" height="25px" width="25px"></a></i>
        </div>
        <div class="menuq">
        <ul class="at">
            <li><a href="index.php">HOME</a></li>
            <li><a href="https://Facebook.com">ABOUT</a></li>
            <li><a href="lapor.html">LAPORAN</a></li>
            <?php if(isset($_SESSION['user'])) : ?>
                <li><a href="logout.php">LOGOUT</a></li>
                <li><a href="dasbord/index.php">DASHBOARD</a></li>
                <?php else : ?>
                <li><a href="login.php">LOGIN</a></li>
            <?php endif; ?>
            <li><a href="ppolice.html">PRIVACE POLICY</a></li>    
        </ul>
        </div>
    </div>
    </header>

    <div class="menu">
        <div class="drop2">

                <a class="aax" href="keranjang.php"><i class="a"><img src="store.svg" alt="" height="25px" width="25px"></i></a>
                <ul class="ac">
                        
                        <li class="drops"><a href="">ATASAN</a>
                            <ul class="sss">
                                <li><a href="?halaman=kaos">Kaos</a></li>
                                <li><a href="?halaman=kemeja">Kemeja</a></li>
                                <li><a href="?halaman=poloshirt">Polo Shirt</a></li>
                            </ul>
                        </li>
                        <li class="drops"><a href="">BAWAHAN</a>
                            <ul class="sss">
                                <li><a href="?halaman=cpanjang">Celana Panjang</a></li>
                                <li><a href="?halaman=cpendek">Celana Pendek</a></li>
                                <li><a href="?halaman=cjeans">Celana Jeans</a></li>
                            </ul>
                        </li>
                        <li class="drops"><a href="">JAKET</a>
                            <ul class="sss">
                                <li><a href="?halaman=jaket">Jaket</a></li>
                                <li><a href="?halaman=sweater">Sweater</a></li>
                            </ul>
                        </li>
                    </ul>
        </div>
        <div class="wrap">
                <div class="search">
                    <form action="" method="get" class="cari">
                        <input type="text" name="cari" class="searchTerm" placeholder="Apa Yang Sedang Kamu Cari ........ ?">
                        <button type="submit" class="searchButton">
                           <img src="img/icons/search.svg" height="100%" width="60%" alt="">
                        </button>
                    </form>
                </div>
        </div>
    </div>
    <p class="pmain">LIST PRODUK</p>
    <div class="main">
        <?php
        $data = mysqli_query($konek,"SELECT kategori from barang group by kategori");
        
            if(isset($_GET['halaman'])){
                while($cat = mysqli_fetch_array($data)){
                    if($_GET['halaman'] == $cat['kategori']){
                        include 'cat.php';
                    }
                }
            }
            elseif(isset($_GET['cari'])){
                include 'cari.php';
            }
            else{
                include 'main.php';
            }
        ?>
    </div>

    <!-- footer -->

    <div class="footer">
            <div class="pembungkus">
            <div class="box1">
                <p class="penulis">
                    About Web
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
                    <i class="scm"><img height="40px" width="40px" src="img/icons/Facebook.svg" alt=""></i>
                    <i class="scm"><img height="40px" width="40px" src="img/icons/Instagram.svg" alt=""></i>
                    <i class="scm"><img height="40px" width="40px" src="img/icons/Twitter.svg" alt=""></i>
                    <i class="scm"><img height="40px" width="40px" src="img/icons/YouTube2.svg" alt=""></i>
                    <i class="scm"><img height="40px" width="40px" src="img/icons/Skype.svg" alt=""></i>
                </div>
    
            </div>
            <div class="box3">
                <p class="penulis">
                    Owner Web
                </p>
    
                <img class="owner" src="img/owner2.JPG" alt="Nanang Setiawan">
    
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