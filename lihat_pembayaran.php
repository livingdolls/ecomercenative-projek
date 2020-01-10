<?php
session_start();
    if(!isset($_SESSION['user'])){
        echo "<script>alert('Anda Belum Login');</script>";
        echo "<script>location='login.php';</script>";
    }

    include 'admin/db.php';
    $id     =  $_GET['id'];
    $sql    = $konek->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id'");
    $result = $sql->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lihat Pembayaran</title>
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <style>
        .main{
            width: 100%;
            display: flex;
            box-sizing: border-box;
            padding: 20px;
        }
        .col1{
            width: 70%;
        }
        .col2{
            width: 30%;
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
    <div class="main">
        <div class="col1">
            <table>
                    <tr>
                        <td>Nama</td>
                        <td><?= $result['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Bank</td>
                        <td><?= $result['bank']; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>IDR <?= number_format($result['jumlah']); ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td><?= $result['tanggal']; ?></td>
                    </tr>
                    <tr>
                        <td>Update Bukti</td>
                        <form method="post" enctype="multipart/form-data">
                        <td><input type="file" name="bukti"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button name="up" type="submit">Update</button></td>
                        </form>
                    </tr>
            </table>
        </div>
        <div class="col2">
            <img width="100%" height="100%" src="img/bukti/<?= $result['bukti']; ?>">
        </div>
    </div>

    <?php
        if(isset($_POST['up'])){
            $nmft   = strtolower($_FILES['bukti']['name']);
            $szft   =  $_FILES['bukti']['size'];
            $errft  = $_FILES['bukti']['error'];
            $pthft  = $_FILES['bukti']['tmp_name'];

            if($errft == 0){
                if($szft <= 1000000){
                    $format = pathinfo($nmft,PATHINFO_EXTENSION);
                    if(($format == "jpg") or ($format == "png") or ($format == "jpeg")){
                        $temp = explode(".",$nmft);
                        $nmbr = "bukti-".round(microtime(true)) . '.' . end($temp);
                        $uplod = move_uploaded_file($pthft, 'img/bukti/' . $nmbr);
                        if($uplod == true){
                            $foto = $nmbr;
                            $sql = "UPDATE pembayaran SET bukti='$foto' WHERE `id_pembelian` = $id ";
                            unlink('img/bukti/'.$result['bukti']);
                            if(mysqli_query($konek, $sql)){
                                echo "<script>alert('Update Bukti Sukses');</script>";
                                header("Location:lihat_pembayaran.php?id=$id");
                            }else
                            {
                                echo $foto;
                            }
                        }else{
                            echo $foto;
                        }
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Format Foto Tidak Diketahui")';
                        echo '</script>';
                    }
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Ukuran Foto Maximal 1MB")';
                    echo '</script>';
                }
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Masukkan Gambar Untuk Update Bukti")';
                echo '</script>';
            }
        }
    ?>

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