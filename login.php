<?php

    include 'admin/db.php';
    session_start();

    if(isset($_SESSION['user'])){
        echo "<script>alert('Anda Sudah Login');</script>";
        echo "<script>location='index.php';</script>";
    }

    if(isset($_POST['login'])){

        $nama   = $_POST['nama'];
        $pass   = $_POST['pass'];
        $sql    = $konek->query("SELECT * FROM tb_users WHERE email_user = '$nama' AND pass_user = '$pass' ");

        $result = $sql->num_rows;

        if($result == 1){
            $user = $sql->fetch_assoc();
            $_SESSION["user"] = $user;

            echo "<script>alert('Login Sukses');</script>";
            echo "<script>location='dasbord/index.php';</script>";
        }   
        else{
            echo "<script>alert('Email / Pass Salah');</script>";
            echo "<script>location='login.php';</script>";
        }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Login Pengguna</title>
    <style>
    *{
        padding: 0;
        margin: 0;
        font-family: sans-serif;
    }

    .login{
        width: 30%;
        /* background-color: #aeaeae; */
        /* padding: 20px; */
        margin: 0 auto;
        box-shadow: 10px 10px 10px 10px;
        margin-top: 50px;
    }

    input[type=text], input[type=password]{
        width: 100%;
          box-sizing: border-box;
          border: 2px solid #ccc;
          border-radius: 100px;
          font-size: 16px;
          background-color: white;
          background-image: url('img/icons/user.svg');
        background-size: 25px 25px;
          background-position: 5px 5px; 
          background-repeat: no-repeat;
          padding: 5px;
          padding-left: 40px;
          margin-top: 7px;
          font-size: 15px;
          box-sizing: border-box;
    }

    input[type=password]{
        background-image: url('img/icons/unlock.svg') !important;
    }
    label{
        display: block;
        text-align: center;
    }
    button{
        display: block;
        padding: 10px;
        margin: 0 auto;
        margin-top: 25px;
        background-color: #2c3e50;
        border: none;
        border-radius: 100px;
        width: 100%;
        cursor: pointer;
        color: white;
        font-size: 15px;
    }

    .avatarlogin{
        background-color: #2c3e50;
        padding: 30px;
    }

    img.avatar{
        margin:0 auto;
        display: block;
        width: 200px;
        height: 200px;
    }

    .userl{
        font-size: 25px;
        font-family: sans-serif;
        text-align: center;
        margin-top: 15px;
    }

    .log{

        margin: 10%;
        /* border: 1px solid red; */
        height: 200px;
        margin-top: 20px;
    }

    .df{
        font-size: 12px;
        margin-top: 10px;
        padding: 5px;
        text-align: center;
    }
    a.clk{
        text-decoration: none;
    }
    </style>
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


        <!-- login -->

    <div class="login">
        <div class="avatarlogin">
            <i><img class="avatar" src="img/avatar1.png" alt=""></i>
        </div>

        <p class="userl">
            User Login
        </p>
        <div class="log">
        <form action="" method="post">
            <input type="text" name="nama" id="name" placeholder=" Email ">

            <input type="password" name="pass" id="pass" placeholder=" Password ">

            <button name="login">Login</button>
        </form>

        <p class="df">
            Tidak punya Akun ?  Daftar <a class="clk" href="daftar.php">Klik Disini</a>
        </p>
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