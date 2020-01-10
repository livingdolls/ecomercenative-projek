<?php

session_start();
include 'db.php';
if($_SESSION['status'] != 'login'){
    header("Location:../index.php?pesan=belum_login");
    echo $_SESSION['nama'];
}

if(!isset($_GET['id'])){
    header("Location:index.php");
}

    $id = $_GET['id'];

    $sql = $konek->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id'");
    $result = $sql->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <script src="css/js/package/dist/sweetalert2.all.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="nave">
        <div class="naves">
            <div class="owner">
                <img src="../img/avatar1.png" width="25px" height="25px" alt="">
                <i><?= $_SESSION['idnama']; ?> </i>
            </div>

            <div class="icons">
                <i><img src="../img/notification.svg" width="25px" height="25px" alt=""></i>
                <a href="logout.php" title="Logout"><i><img src="../img/icons/unlock.svg" width="25px" height="25px" alt=""></i></a>
            </div>
        </div>
    
    </div>

    <div class="maine">
        <div class="menus">
        <h1>Main Menu</h1>
            <ul>
                <li class="mn"><a href="index.php?halaman=barang">Manajemen Barang</a></li>
                <li class="mn"><a href="index.php?halaman=addbarang">Tambah Barang</a></li>
                <li class="mn"><a href="index.php?halaman=pembelian">Manajemen Pembelian</a></li>
                <li class="mn"><a href="index.php?halaman=user">Manajemen User</a></li>
                <li class="mn"><a href="index.php?halaman=adminadd">Tambah Admin</a></li>
            </ul>
        </div>
        <div class="utama">
        <div class="row">
          <div class="col-sm">
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
            </table>
          </div>
          <div class="col-sm"> <img src="../img/bukti/<?= $result['bukti']; ?>" width="300px" height="300px" alt="">
            </div>
        </div>


            <form method="post">
                <input type="text" name="resi" placeholder="resi">
                <select name="status">
                    <option value="lunas">Lunas</option>
                    <option value="Dikirim">Di Kirim</option>
                    <option value="batal">Batal</option>
                </select>
                <button name="kirim">Kirim</button>
            </form>

    <?php

    if(isset($_POST['kirim'])){
        $resi = $_POST['resi'];
        $status = $_POST['status'];

        $konek->query("UPDATE `pembelian` SET `resi` = '$resi', `status_pembelian` = '$status' WHERE `id_pembelian` = '$id' ");
    }


?>
</body>
</html>