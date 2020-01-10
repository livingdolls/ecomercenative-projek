<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
    <style>
    *{
        padding: 0;
        margin: 0;
        font-family: sans-serif;
    }

    .login{
        width: 30%;
        margin: 0 auto;
        box-shadow: 10px 10px 10px 10px;
        margin-top: 50px;
        height: 900px;
        clear: both;
        margin-bottom: 100px;
    }

    input[type=text], input[type=password]{
          width: 100%;
          border: 2px solid #ccc;
          font-size: 16px;
          padding: 5px;
          margin-top: 12px;
          font-size: 15px;
          box-sizing: border-box;
    }

    textarea{
        margin-top: 12px;
        /* padding: 12px; */
        font-size: 16px;
        width: 99%;
        border: 2px solid #ccc;
    }

    button{
        /* display: block; */
        padding: 10px;
        margin: 0 auto;
        margin-top: 10px;
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
        margin-left: auto;
        margin-right: auto;
        width: 80%;
        /* height: 700px; */
        margin-top: 20px;
        display: block;
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

    .ckc {
          display: block;
          margin-top: 12px;
          position: relative;
          padding-left: 35px;
          margin-bottom: 12px;
          cursor: pointer;
          font-size: 15px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
}

.ckc input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #2c3e50;
  border-radius: 50%;
}

.ckc:hover input ~ .checkmark {
  background-color: #ccc;
}

.ckc input:checked ~ .checkmark {
  background-color: #2c3e50;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.ckc input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.ckc .checkmark:after {
 	top: 8px;
	left: 8px;
	width: 6px;
	height: 6px;
	border-radius: 50%;
	background: white;
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
            <i><img class="avatar" src="img/avatar2.svg" alt=""></i>
        </div>

        <p class="userl">
            User Register
        </p>
        <div class="log">
        <form method="POST">
            <input type="text" name="nama" id="name" placeholder=" Nama Lengkap ">

            <input type="text" name="mail" id="name" placeholder=" Email ">
            <input type="text" name="hp"  placeholder=" Telepon ">
            
            <input type="password" name="pass" id="pass" placeholder=" Password ">

            <button type="submit" name="daftar">Daftar</button>
        </form>
        </div>
        <p class="df">
            Sudah punya Akun ?  Login <a class="clk" href="login.html">Klik Disini</a>
        </p>
    </div>
<?php
    include 'admin/db.php';

    if(isset($_POST['daftar'])){
        $nama = $_POST['nama'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        $telp = $_POST['hp'];

        $daf = $konek->query("INSERT INTO `tb_users`(`email_user`, `pass_user`, `nama_user`, `hp_user`) VALUES ('$mail','$pass','$nama','$telp')");

        if($daf){
            echo "<script>alert('Daftar Sukses');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
?>

    <!-- footer -->

    <div class="footer">
            <div class="pembungkus">
            <div class="box1">
                <p class="penulis">
                ABOUT WEB
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