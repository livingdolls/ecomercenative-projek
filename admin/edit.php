<?php
    session_start();

    if($_SESSION['status'] != 'login'){
        header("Location:../index.php?pesan=belum_login");
        echo $_SESSION['nama'];
    }

    include 'db.php';
    $id = $_GET['id'];

    if(isset($_GET['id'])){
    $sql = "SELECT * FROM barang WHERE id_barang = $id";
    $data1 = mysqli_query($konek,$sql);

    $a = mysqli_fetch_assoc($data1);
    }
    else{
        header("Location:index.php");
    }

    if(isset($_POST['klik'])){
        $nama = $_POST['nama'];
        $ket = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $foto = $_FILES['foto']['name'];
        $idd = $_POST['id_barang'];
        $cat = $_POST['cat'];
        $stok = $_POST['Uqty'];

        $nmft =  $_FILES['foto']['name'];
        $szft =  $_FILES['foto']['size'];
        $errft = $_FILES['foto']['error'];
        $pthft = $_FILES['foto']['tmp_name'];

        if($errft == 0){
            if($szft <= 1000000){
                $format = pathinfo($nmft,PATHINFO_EXTENSION);
                if(($format == "jpg") or ($format == "png") or ($format == "jpeg")){
                    $uplod = move_uploaded_file($pthft, '../img/produk/' . $nmft);
                    if($uplod == true){
                        echo 'sukses';
                        move_uploaded_file($pthft, '../img/' . $nmft);

                        $sql = "UPDATE barang SET id_barang='$idd',nama='$nama',keterangan='$ket',harga='$harga',`stok`='$stok',kategori='$cat',foto= '$foto' WHERE id_barang = $id";
                        
                
                        if(mysqli_query($konek, $sql)){
                            header("Location:index.php?halaman=barang");
                        }
                        else{
                            echo "Gagal";
                        }
                    }

                }else{
                    echo '<script language="javascript">';
                    echo 'alert("Format File Tidak Didukung")';
                    echo '</script>';
                }

            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Ukuran Terlalu Besar")';
                echo '</script>';
            }
        }
        else{
            $sql = "UPDATE barang SET id_barang='$idd',nama='$nama',keterangan='$ket',stok='$stok',harga='$harga',kategori='$cat' WHERE id_barang = $id";
                      
            if(mysqli_query($konek, $sql)){
                header("Location:index.php?halaman=barang");
            }
            else{
                echo "Gagal";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="nave">
        <div class="naves">
            
        </div>
    
    </div>

    <div class="maine">
    <div class="menus">
        <h1>Main Menu</h1>
            <ul>
                <li class="mn"><a href="?halaman=barang">Manajemen Barang</a></li>
                <li class="mn"><a href="?halaman=addbarang">Tambah Barang</a></li>
                <li class="mn"><a href="?halaman=pembelian">Manajemen Pembelian</a></li>
                <li class="mn"><a href="?halaman=user">Manajemen User</a></li>
                <li class="mn"><a href="?halaman=adminadd">Tambah Admin</a></li>
            </ul>
        </div>

        <div class="utama">
            <h1>Tambah Barang</h1>
            <div class="form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_barang" value="<?= $a['id_barang']; ?>">
                    <label for="fname">Nama Barang</label>
                    <input type="text" id="fname" name="nama" value="<?= $a['nama']; ?>">
                    <label for="lname">Harga Barang</label>
                    <input type="text" id="lname" name="harga" value="<?= $a['harga']; ?>">
                    <label for="qty">Jumlah Barang</label>
                    <input type="number" id="Uqty" min="1" value="<?= $a['stok']; ?>" name="Uqty" required>
                    <label for="cat">Kategori</label>
                    <select name="cat">
                        <option <?php if($a['kategori'] == 'kaos') echo 'selected'; ?> value="kaos">Kaos</option>
                        <option <?php if($a['kategori'] == 'kemeja') echo 'selected'; ?> value="kemeja">Kemeja</option>
                        <option <?php if($a['kategori'] == 'poloshirt') echo 'selected'; ?> value="poloshirt">Ploshirt</option>
                        <option <?php if($a['kategori'] == 'cpanjang') echo 'selected'; ?> value="cpanjang">Celana Panjang</option>
                        <option <?php if($a['kategori'] == 'cpendek') echo 'selected'; ?> value="cpendek">Celana Pendek</option>
                        <option <?php if($a['kategori'] == 'cjeans') echo 'selected'; ?> value="cjeans">Celana Jeans</option>
                        <option <?php if($a['kategori'] == 'jaket') echo 'selected'; ?> value="jaket">Jaket</option>
                        <option <?php if($a['kategori'] == 'sweater') echo 'selected'; ?> value="sweater">Sweater</option>
                    </select> </br>
                    <label for="ket">Keterangan Barang</label>
                    <textarea name="keterangan"><?= $a['keterangan']; ?></textarea>
                    <label for="foto">Upload Gambar</label>
                    <input type="file" name="foto" id="foto">
                    <button name="klik">Update Barang</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>