<?php

session_start();
    if(isset($_GET['id'])){

    include 'admin/db.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM barang WHERE id_barang = $id";

    $data = mysqli_query($konek,$sql);

    $view = mysqli_fetch_array($data);
    }
    else{
        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $view['nama']; ?></title>
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/rekom.css">
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
            
    <div class="detail">
        <div class="box">
            <img class="pr" src="img/produk/<?= $view['foto']; ?>" alt="" width="100%">
        </div>
        <div class="detailbox">
            <div class="atas">
                <h2><?= $view['nama']; ?></h2>
                <p class="harga">IDR <?= number_format($view['harga']); ?></p>
            </div>

        <div class="cart">
            <form method="post">
            <input type="hidden" name="id" value="<?= $view['id_id'];?>">
                <input type="hidden" name="harga" value="<?= $view['harga']; ?>">
            <table>
                <tr>
                    <td>UKURAN</td>
                    <td>
                            <input type="radio" value="x" name="satu" id="satu" checked>
                            <label for="satu" class="satu">
                                <span class="a">X</span>
                            </label>
            
                            <input type="radio" value="xl" name="satu" id="dua">
                            <label for="dua" class="satu">
                                <span class="a">XL</span>
                            </label>
            
                            <input type="radio" value="l" name="satu" id="tiga">
                            <label for="tiga" class="satu">
                                <span class="a">L</span>
                            </label>
            
                            <input type="radio" value="xxl" name="satu" id="empat">
                            <label for="empat" class="satu">
                                <span class="a">XXL</span>
                            </label>
                    </td>
                </tr>
                <tr>
                    <td>WARNA</td>
                    <td>
                            <input class="red" value="merah" type="radio" name="color" id="red" checked>
                            <label for="red" class="dua red">
                                <span class="a"></span>
                            </label>

                            <input class="blue" value="biru" type="radio" name="color" id="blue">
                            <label for="blue" class="dua blue">
                                    <span class="a"></span>
                            </label>

                            <input value="kuning" type="radio" name="color" id="yellow">
                            <label for="yellow" class="dua yellow">
                                <span class="a"></span>
                            </label>
                            
                            <input value="hijau" type="radio" name="color" id="green">
                            <label for="green" class="dua green">
                                <span class="a"></span>
                            </label>
                    </td>
                </tr>
                <tr>
                    <td><label for="jumlah">JUMLAH</label></td>
                    <td><input type="number" placeholder="1" value="1" min="1" max="<?= $view['stok'];?>" name="jmlh" id="jumlah"></td>
                </tr>
                <tr>
                    <td>BAHAN</td>
                    <td>KATUN</td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><?= $view['stok']; ?></td>
                </tr>
            </table>
            <button name="klik" class="inp">ADD TO CART</button>
            </form>
        </div>
            <h2 class="ct">Catatan Penjual</h2>
            <p class="catatan">
            <?= $view['keterangan']; ?>
            </p>
        </div>
    </div>

    <!-- From Rekomendasi -->
    <?php
        $ca = $view['kategori'];

        $data = $konek->query("SELECT * FROM barang WHERE kategori = '$ca' LIMIT 5");
    ?>
    <br>
    <hr class="garis">
    <p class="rela">Rekomendasi Lainnya</p>
    <div class="detail">
        <?php foreach($data as $a) : ?>
        <div class="dsatu">
            <div class="dfoto">
                <img src="img/produk/<?= $a['foto']; ?>" alt="" height="230px" width="100%">
            </div>
        
            <div class="dharg">
                <p class="drekom"><?= $a['nama']; ?></p>
                <p class="drekom" style="color:blueviolet; font-weight:500;">IDR <?= number_format($a['harga']); ?></p>
            </div>
        
            <div class="dbutton">
                    <a href="detail.php?id=<?= $a['id_barang']; ?> "><p class="aw">Detail</p></a>
                    <a href="beli.php?id=<?= $a['id_barang']; ?> "><p class="aw" style="background-color:green">Beli</p></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

<?php

    if(isset($_POST['klik'])){
        //Cek Sesi User
        if(!isset($_SESSION['user'])){
            echo "<script>alert('Anda Harus Login');</script>";
            echo "<script>location='login.php';</script>";
        }

        $jumlah = $_POST['jmlh'];
        $id     = $_GET['id'];
        $ukuran = $_POST['satu'];
        $warna  = $_POST['color'];
        
        $sql = $konek->query("SELECT *  FROM barang WHERE id_barang = $id");
        $r = $sql->fetch_assoc();
        if(isset($_SESSION['keranjang'][$id])){
            $_SESSION['keranjang'][$id] =[
                'id'            => $id,
                'nama_barang'   => $r['nama'],
                'harga'         => $r['harga'],
                'warna'         => $warna,
                'ukuran'        => $ukuran,
                'jumlah'        => $_SESSION['keranjang'][$id]['jumlah'] + $jumlah
            ];
        }
        else{
            $_SESSION['keranjang'][$id] = [
                'id'            => $id,
                'nama_barang'   => $r['nama'],
                'harga'         => $r['harga'],
                'warna'         => $warna,
                'ukuran'        => $ukuran,
                'jumlah'        => $jumlah
            ];
        }
        echo "<script>alert('Sukses Ditambah Ke Keranjang');</script>";
        echo "<script>location='keranjang.php';</script>";
    }

?>
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