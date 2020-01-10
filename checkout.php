<?php

    session_start();
    include 'admin/db.php';

    if(!isset($_SESSION['user'])){
        echo "<script>alert('Anda Harus Login');</script>";
        echo "<script>location='login.php';</script>";
    }

    if(empty($_SESSION['keranjang'])){
        echo "<script>alert('Keranjang Kosong');</script>";
        echo "<script>location='index.php';</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <style>
    
    table{
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    th{
        background-color: #2c3e50;
        color: #fff;
        border: 1px solid #fff !important;
    }
    th,tr,td{
        padding: 8px;
        border: 1px solid #2c3e50;
    }

    label{
        display: block;
        margin: 5px 15px 5px 10px;
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

    textarea{
        width: 100%;
        border-bottom: 2px solid #2c3e50 !important;
        height: 100px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: none;
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
        background: red;
        border: none;
    }

    input[type=text]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid #2c3e50;
    }
    .k-head{
        font-size: 25px;
        text-align: center;
        text-transform: uppercase;
        font-family: Arial, Helvetica, sans-serif;
    }
    .btn-kr{
        border: none;
        margin-top: 12px;
        padding: 10px;
        background: #2c3e50;
        color: #fff;
    }
    
    </style>
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
        <p class="k-head">Keranjang</p>
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
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; $sum = 0; if(isset($_SESSION['keranjang'])) : ?>
            <?php foreach($_SESSION['keranjang'] as $result) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $result['nama_barang']; ?></td>
                    <td><?= number_format($result['harga']); ?></td>
                    <td><?= $result['warna']; ?></td>
                    <td><?= $result['ukuran']; ?></td>
                    <td><?= $result['jumlah'] ?></td>
                    <td><?= number_format($result['harga'] * $result['jumlah']) ?></td>
                </tr>
                <?php $sum += $result['harga'] * $result['jumlah'] ?>
            <?php endforeach ?>
        <?php endif ?>
                </tbody>
                <tfoot>
                    <th colspan="2">Total Belanja</th>
                    <th colspan="5" style="text-align:right;">IDR <?= number_format($sum); ?> </th>
                </tfoot>
            </table>
            <div class="warning">
                    <?php if(empty($_SESSION['keranjang'])) : ?>
                        <p class="warn">Keranjang Kosong</p>
                    <?php endif;?>
            </div>

            <div class="form">
            <form method="post">
                <label>Nama Penerima</label>
                <input type="text" name="nama" placeholder="Nama Penerima">
                <label>Telepon Penerima</label>
                <input type="text" name="telepon" placeholder="Telepon Penerima">
                <label>Alamat Lengkap Penerima</label>
                <textarea name="alamat">Alamat Penerima</textarea>
                <br>
                <button class="btn-kr" name="beli">Checkout</button>
            </form>

            <?php

                if(isset($_POST['beli'])){
                    $id_user    = $_SESSION['user']['id_user'];
                    $tgl_beli   = date("Y-m-d");
                    $bayar      = $sum;
                    $alamat     = $_POST['alamat'];
                    $nama       = $_POST['nama'];
                    $telepon    = $_POST['telepon'];

                    $konek->query("INSERT INTO `pembelian`(`id_user`, `tanggal`, `total`,`nama_penerima`,`telepon`,`alamat`) VALUES ('$id_user','$tgl_beli','$bayar','$nama','$telepon','$alamat')");
                    $new_id = $konek->insert_id;

                    foreach ($_SESSION['keranjang'] as $key){
                        $id_produk  = $key['id'];
                        $jumlah     = $key['jumlah'];
                        $barang     = $konek->query("SELECT * FROM barang WHERE id_barang = '$id_produk'");
                        $result     = $barang->fetch_assoc();
                        $nama       = $result['nama'];
                        $harga      = $result['harga'];
                        $ukuran     = $key['ukuran'];
                        $warna      = $key['warna'];

                        $total_bayar = $harga * $jumlah;

                        $sql = $konek->query("INSERT INTO `detail_pembelian`(`id_pembelian`, `id_barang`, `total`,`nama`,`harga`,`ukuran`,`warna`,`total_harga`) VALUES ('$new_id','$id_produk','$jumlah','$nama','$harga','$ukuran','$warna','$total_bayar')");

                        $konek->query("UPDATE `barang` SET `stok` =  `stok` - '$jumlah' WHERE id_barang = '$id_produk' ");
                    }                    // Kosongkan Keranjang
                    unset($_SESSION['keranjang']);

                    //redirec
                    echo "<script>alert('Sukses');</script>";
                    echo "<script>location='nota.php?id=$new_id';</script>";
                }

            ?>
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