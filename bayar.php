<?php
session_start();
    if(!isset($_SESSION['user'])){
        echo "<script>alert('Anda Belum Login');</script>";
        echo "<script>location='login.php';</script>";
    }

    include 'admin/db.php';
    $id     =  $_GET['id'];
    $sql    = $konek->query("SELECT * FROM pembelian WHERE id_pembelian = '$id'");
    $result = $sql->fetch_assoc();

    //validasi login
    $id_bayar = $result['id_user'];
    $id_login = $_SESSION['user']['id_user'];

    if($id_bayar != $id_login){
        echo "<script>alert('Tidak ditemukan pembayaran');</script>";
        echo "<script>location='riwayat.php';</script>";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css"> 
    <link rel="stylesheet" href="css/footer.css">
    <style>
        .main-bayar{
            margin: 10px auto;
            width: 80%;
        }
        label{
            display: block;
            font-size: 14px;
        }
        input{
            width: 100%;
            border: 1px solid black;
            padding: 5px;
        }
        input[type="file"]{
            border: none;
        }
        .kirim{
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
                <i class="ma"><a href="riwayat.php"><img src="img/icons/Skype.svg" height="25px" width="25px"></a></i>
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
    
    <div class="main-bayar">
        <h2>Konfirmasi Pembayaran</h2>

        <form method="post" enctype="multipart/form-data">
            <label for="nama">Nama </label>
            <input type="text" name="nama" id="" placeholder="nama">
            <label for="nama">Nama Bank</label>
            <input type="text" name="bank" id="" placeholder="bank">
            <label for="nama">Jumlah Bayar</label>
            <input type="text" name="jumlah" id="" placeholder="Jumlah" readonly value="<?= $result['total']; ?>">
            <label for="nama">Foto Bukti</label>
            <input type="file" name="bukti">
            <button class="kirim" name="kirim">Kirim Bukti</button>

        </form>
    </div>
</body>
<?php

    if(isset($_POST['kirim'])){
        $id         = $result['id_pembelian'];
        $nama       = $_POST['nama'];
        $bank       = $_POST['bank'];
        $jumlah     = $_POST['jumlah'];
        $tanggal    = date("Y-m-d");

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
                        $sql ="INSERT INTO `pembayaran`(`id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES ('$id','$nama','$bank','$jumlah','$tanggal','$foto')";
                        if(mysqli_query($konek, $sql)){
                            $konek->query("UPDATE `pembelian` SET status_pembelian = 'Bukti Dikirim' WHERE id_pembelian = '$id'");
                            echo "<script>alert('Update Bukti Sukses');</script>";
                            header("Location:dasbord/?halaman=riwayat");
                        }else
                        {
                            echo 'gagal';
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
                echo 'alert("Ukuran Foto Terlalu Besar")';
                echo '</script>';
            }
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Masukkan Gambar Untuk Update Bukti")';
            echo '</script>';
        }




        // if($sql){
        // }
        // else{
        //     echo 'gagal';
        // }
    }

?>
</html>