<?php

    include 'db.php';
    $ket = 0;
    if(isset($_POST['klik'])){
        $nama = $_POST['nama'];
        $ket = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $cat    = $_POST['cat'];
        $stok = $_POST['qty'];
        $nmft =  $_FILES['foto']['name'];
        $szft =  $_FILES['foto']['size'];
        $errft = $_FILES['foto']['error'];
        $pthft = $_FILES['foto']['tmp_name'];



        if($errft == 0){
            if($szft <= 1000000){
                $format = pathinfo($nmft,PATHINFO_EXTENSION);
                if(($format == "jpg") or ($format == "png") or ($format == "jpeg")){
                    $temp = explode(".",$nmft);
                    $nmbr = round(microtime(true)) . '.' . end($temp);
                    $uplod = move_uploaded_file($pthft, '../img/produk/' . $nmbr);
                    if($uplod == true){
                        $foto = $nmbr;

                        $sql = "INSERT INTO barang(`nama`, `keterangan`, `harga`,`stok`,`kategori`, `foto`) VALUES ('$nama','$ket','$harga','$stok','$cat','$foto')";
        

                        if(mysqli_query($konek, $sql)){
                            global $ket;    
                            $ket = 1;
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
            echo '<script language="javascript">';
            echo 'alert("Gagal")';
            echo '</script>';
        }
    }
?>

            <h1>Tambah Barang</h1>
            <?php if($ket == 1) : ?>
                <i style="background:#00E676; padding:5px;">Sukses</i>
                <i style="background:#fff;"><a href="index.php">Ke Home ?</a></i>
            <?php endif; ?>
            <div class="form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="nama">Nama Barang</label>
                    <input type="text" id="nama" name="nama" required>
                    <label for="harga">Harga Barang</label>
                    <input type="text" id="harga" name="harga" required>
                    <label for="qty">Jumlah Barang</label>
                    <input type="number" id="qty" min="1" value="1" name="qty" required>
                    <label for="ket">Keterangan Barang</label>
                    <textarea name="keterangan" id="ket" required></textarea>
                    <label for="cat">Kategori</label>
                    <select name="cat">
                        <option value="kaos">Kaos</option>
                        <option value="kemeja">Kemeja</option>
                        <option value="poloshirt">Ploshirt</option>
                        <option value="cpanjang">Celana Panjang</option>
                        <option value="cpendek">Celana Pendek</option>
                        <option value="cjeans">Celana Jeans</option>
                        <option value="jaket">Jaket</option>
                        <option value="sweater">Sweater</option>
                    </select> </br>
                    <label for="foto">Upload Gambar</label>
                    <input type="file" name="foto" id="foto">
                    <button name="klik">Tambah Barang</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>