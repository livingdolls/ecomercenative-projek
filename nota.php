<?php

session_start();
    if(!isset($_SESSION['user'])){
        echo "<script>alert('Anda Harus Login');</script>";
        echo "<script>location='login.php';</script>";
    }

    if(!isset($_GET['id'])){
        echo "<script>location='index.php';</script>";
    }

    include 'admin/db.php';
        $id     = $_GET['id'];
        $sql    = $konek->query("SELECT * FROM pembelian pl JOIN tb_users us USING(id_user) WHERE pl.id_pembelian = $id");
        $sql2   = $konek->query("SELECT * FROM detail_pembelian WHERE id_pembelian = $id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Nota</title>
</head>
<style>

    table{
        width: 100%;
        border-collapse: collapse;
    }
    th,td,tr{
        padding: 5px;
        text-align: left;
        border: 1px solid #364d63;
    }
    .warning{
        margin: 2%;
        background: rgb(255, 100, 100,0.5);
    }
    .warn{
        padding: 5px;
        text-align: center;
        font-size: 20px;
    }
    .box-main-status{
        width: 80%;
        /* background: #fff; */
        margin: 10px auto;
        display: flex;
        justify-content: space-between;
        -webkit-box-shadow: 10px 0px 15px -6px rgba(54,77,99,0.65);
        -moz-box-shadow: 10px 0px 15px -6px rgba(54,77,99,0.65);
        box-shadow: 10px 0px 15px -6px rgba(54,77,99,0.65);
    }
    .box-status{
        height: 150px;
        width: 30%;
        padding: 5px;
        display: flex;
        flex-direction: column;
        justify-content :center;
        align-items: center;

    }
    .box-table{
        width: 80%;
        margin: 10px auto;
        background-color: #fff;
        box-sizing: border-box;
    }
</style>
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
                    <i class="ma"><a href="https://facebook.com"><img src="img/icons/Facebook.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://instagram.com"><img src="img/icons/Instagram.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://twitter.com"><img src="img/icons/Twitter.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://youtube.com"><img src="img/icons/YouTube2.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://skype.com"><img src="img/icons/Skype.svg" height="25px" width="25px"></a></i>
            </div>
            <div class="menuq">
                <ul class="at">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="https://Facebook.com">ABOUT</a></li>
                        <li><a href="lapor.html">LAPORAN</a></li>
                        <?php if(isset($_SESSION['user'])) : ?>
                            <li><a href="logout.php">LOGOUT</a></li>
                            <?php else : ?>
                            <li><a href="login.php">LOGIN</a></li>
                        <?php endif; ?>
                        <li><a href="ppolice.html">PRIVACE POLICY</a></li>    
                </ul>
            </div>
        </div>
        </header>

        <div class="utama">
            <?php while($user = $sql->fetch_assoc()) : ?>
                <?php
                    $id_login = $_SESSION['user']['id_user'];
                    $id_this = $user['id_user'];
                    if($id_login != $id_this){
                        echo "<script>alert('Tidak Ditemukan');</script>";
                        echo "<script>location='riwayat.php';</script>";
                    }
                ?>
            <div class="box-main-status">
                <div class="box-status">
                    <h6>Nama : <?= $user['nama_user']; ?></h6>
                    <h6>Email : <?= $user['email_user']; ?></h6>
                    <h6>Hp : <?= $user['hp_user']; ?></h6>
                    <h6>Tanggal : <?= $user['tanggal']; ?></h6>
                </div>
                <div class="box-status">
                    <h6>Status : <?= $user['status_pembelian']; ?></h6>
                    <?php if($user['resi'] != null) : ?>
                    <h6>Resi : <?= $user['resi']; ?></h6>
                <?php endif; ?>
                </div>
                <div class="box-status">
                    <h6>Nama Penerima : <?= $user['nama_penerima']; ?></h6>
                    <h6>Telepon Penerima : <?= $user['telepon']; ?></h6>
                    <h6>Alamat : <?= $user['alamat']; ?></h6>
                    <h6>Total : IDR <?= number_format($user['total']); ?></h6>
                </div>
            </div>

            <div class="box-table">
    <?php endwhile; ?>
            <table>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Total Bayar</th>
                  </tr>
                </thead>
                <?php $no = 1; while($result = $sql2->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $result['nama']; ?></td>
                        <td><?= $result['harga']; ?></td>
                        <td><?= $result['ukuran']; ?></td>
                        <td><?= $result['warna']; ?></td>
                        <td><?= $result['total']; ?></td>
                        <td><?= $result['total_harga']; ?></td>
                    </tr>
    <?php endwhile; ?>
                <tbody>
                </tbody>
            </table>
            <a href="riwayat.php">Riwayat Belanja</a>
            </div>

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