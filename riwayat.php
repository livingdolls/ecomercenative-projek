<?php
session_start();

if(!isset($_SESSION['user'])){
    echo "<script>alert('Anda Belum Login');</script>";
    echo "<script>location='login.php';</script>";
}
include 'admin/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Riwayat Belanja</title>
</head>
<style>

    .main-riwayat{
        width: 80%;
        margin: 20px auto;
        background: #fff;
        -webkit-box-shadow: 10px 0px 15px -6px rgba(54,77,99,0.65);
        -moz-box-shadow: 10px 0px 15px -6px rgba(54,77,99,0.65);
        box-shadow: 10px 0px 15px -6px rgba(54,77,99,0.65);
        padding: 12px;
    }
    table{
        width: 100%;
        border-collapse: collapse;
    }
    th,td,tr{
        padding: 5px;
        text-align: left;
        border: 1px solid black;
    }
    .btn-rw{
        padding: 2px;
        border: 1px solid rebeccapurple;
        text-decoration: none;
        background-color: green;
        color: #fff;
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
        <div class="main-riwayat">
            <h2>Riwayat Belanja</h2>
            <table>
                <thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php
                        $id = $_SESSION['user']['id_user'];
                        
                        $sql = $konek->query("SELECT * FROM pembelian WHERE id_user = $id");
                        $no = 1;
                        while($result = $sql->fetch_assoc()) :
                    ?>
        
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $result['tanggal']; ?></td>
                            <td><?= $result['total']; ?></td>
                            <td><?= $result['status_pembelian']; ?></td>
                            <td><a class="btn-rw" href="nota.php?id=<?= $result['id_pembelian']; ?>">Nota</a>
                            
                            <?php if($result['status_pembelian'] == 'pending') : ?>
                            <a class="btn-rw" href="bayar.php?id=<?= $result['id_pembelian']; ?>">Bayar</a>
                            <?php else : ?>
                            <a class="btn-rw" href="lihat_pembayaran.php?id=<?= $result['id_pembelian']; ?>">Lihat</a>
                        <?php endif; ?>
                        </td>
                        </tr>
                        <?php endwhile; ?>
                </tbody>
            </table>
        </div>
</body>

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
</html>