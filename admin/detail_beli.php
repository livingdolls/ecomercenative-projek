<?php
    session_start();
    if($_SESSION['status'] != 'login'){
        header("Location:../index.php?pesan=belum_login");
        echo $_SESSION['nama'];
    }
    include 'db.php';

    $id = $_GET['id'];
    $sql = $konek->query("SELECT * FROM pembelian pl JOIN tb_users us USING(id_user) WHERE pl.id_pembelian = $id");
    $sql2 = $konek->query("SELECT * FROM detail_pembelian dp JOIN barang br USING(id_barang) WHERE dp.id_pembelian = $id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
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
            <?php while($user = $sql->fetch_assoc()) : ?>

            <h6>Nama : <?= $user['nama_user']; ?></h6>
            <h6>Email : <?= $user['email_user']; ?></h6>
            <h6>Hp : <?= $user['hp_user']; ?></h6>

    <?php endwhile; ?>
            <table class="table table-bordered">
                <thead>
                  <tr class="table-active">
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Total Bayar</th>
                  </tr>
                </thead>
                <?php $no = 1; while($result = $sql2->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $result['nama']; ?></td>
                        <td><?= $result['harga']; ?></td>
                        <td><?= $result['total']; ?></td>
                        <td><?= $result['harga'] * $result['total']; ?></td>
                    </tr>
    <?php endwhile; ?>
                <tbody>
                </tbody>
            </table>

</div>
</body>

<footer>
</footer>
</html>