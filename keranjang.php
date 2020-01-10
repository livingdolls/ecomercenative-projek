<?php
session_start();
if(!isset($_SESSION['user'])){
    echo "<script>alert('Anda Harus Login');</script>";
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
    <title>Keranjang Belanja</title>
</head>
<style>

    table{
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    th,tr,td{
        padding: 8px;
        border: 2px solid #2c3e50;
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
    .keranjang{
        width: 80%;
        margin: 25px auto;
        background: white;
        padding: 5px;
        box-sizing: border-box;
        box-shadow: 5px 5px 5px 5px ;
    }

    .cck{
        padding: 7px;
        box-sizing: border-box;
        margin: 2px;
        border: 1px solid rebeccapurple;
        text-decoration: none;
        color: white;
        background: rebeccapurple;
        font-size: 15px;
    }
    .cckc{
        padding: 3px;
        background: #2c3e50;
        border: none;
    }

    #xsz{
        border: none;
        background-color: #2c3e50;
        color: white;
        padding: 5px;
        cursor: pointer;
        font-size: 12px;
    }

    #cole{
        text-decoration: none;
        background-color: red;
        padding: 5px;
        color: white;
        font-size: 12px;
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


        <div class="keranjang">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Prouduk</th>
                        <th>Harga</th>
                        <th>Warna</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; $total = 0; if(isset($_SESSION['keranjang'])) : ?>
            <?php foreach($_SESSION['keranjang'] as $result) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $result['nama_barang']; ?></td>
                    <td><?= number_format($result['harga']); ?></td>
                    <form method="get" action="tes.php">
                    <td><select name="warnn">
                        <option <?php if($result['warna'] == "Merah") echo 'selected'; ?> value="merah">Merah</option>
                        <option <?php if($result['warna'] == "biru") echo 'selected'; ?> value="biru">Biru</option>
                        <option <?php if($result['warna'] == "kuning") echo 'selected'; ?> value="kuning">Kuning</option>
                        <option <?php if($result['warna'] == "hijau") echo 'selected'; ?> value="hiaju">Hijau</option>
                    </select></td>
                    <td><?= $result['ukuran']; ?></td>
                        <input type="hidden" name="id" value="<?= $result['id']; ?>">
                    <td><input type="number" name="jml" value="<?= $result['jumlah']; ?>"></td>
                    <td><?= number_format($result['harga'] * $result['jumlah']) ?></td>
                    <td><a id="cole" href="uKeranjang.php?id=<?= $result['id']; ?>">hapus</a> | <button id="xsz" name="updatekera" type="submit">Simpan</button></td>
                </tr>
                </form>
            <?php endforeach ?>
        <?php endif ?>
                </tbody>
            </table>
            <a class="cck" href="index.php">Lanjutkan Belanja</a>
            <a class="cck cckb" href="checkout.php">Checkout</a>


            <div class="warning">
                    <?php if(empty($_SESSION['keranjang'])) : ?>
                        <p class="warn">Keranjang Kosong</p>
                    <?php endif;?>
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