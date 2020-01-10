<?php

    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == 'logout'){
            echo '<script language="javascript">';
            echo 'alert("Anda Berhasil Logout")';
            echo '</script>';
        }
    }
    session_start();

    include 'db.php';

    if(isset($_POST['klik'])){
    $name = $_POST['nama'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `admins` WHERE nama = '$name' and pass = '$pass' ";

    $data = mysqli_query($konek,$sql);

    $cek = mysqli_num_rows($data);

    $row = mysqli_fetch_array($data);
    
    $row['idnama'];

    if($cek > 0){
        $_SESSION['status'] = 'login';
        $_SESSION['nama'] = $name;
        $_SESSION['idnama'] = $row['idnama'];
        header("Location:index.php");
    }else{
        echo '<script language="javascript">';
        echo 'alert("Username/Password Salah")';
        echo '</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Login Admin</title>
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
          background-image: url('../img/icons/user.svg');
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
        background-image: url('../img/icons/unlock.svg') !important;
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

<!-- header -->
<header>
        <div class="nav">
            <div class="icon">
                    <i class="ma"><a href="https://facebook.com"><img src="../img/icons/Facebook.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://instagram.com"><img src="../img/icons/Instagram.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://twitter.com"><img src="../img/icons/Twitter.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://youtube.com"><img src="../img/icons/YouTube2.svg" height="25px" width="25px"></a></i>
                    <i class="ma"><a href="https://skype.com"><img src="../img/icons/Skype.svg" height="25px" width="25px"></a></i>
            </div>
            <div class="menuq">
                <ul class="at">
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="https://Facebook.com">ABOUT</a></li>
                    <li><a href="lapor.html">LAPORAN</a></li>
                    <li><a href="login.html">LOGIN</a></li>
                    <li><a href="ppolice.html">PRIVACE POLICY</a></li>  
                </ul>
            </div>
        </div>
        </header>


        <!-- login -->

    <div class="login">
        <div class="avatarlogin">
            <i><img class="avatar" src="../img/avatar1.png" alt=""></i>
        </div>

        <p class="userl">
            User Login
        </p>
        <div class="log">
        <form action="" method="post">
            <!-- <label for="name">Username</label> -->
            <input type="text" name="nama" id="name" placeholder=" Username ">

            <!-- <label for="pass">Passowrd</label> -->
            <input type="password" name="pass" id="pass" placeholder=" Password ">

            <button name="klik">Login</button>
        </form>

        <p class="df">
            Tidak punya Akun ?  Daftar <a class="clk" href="daftar.html">Klik Disini</a>
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