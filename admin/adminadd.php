<?php

    include 'db.php';
    $ket = 0;

    if(isset($_POST['klik'])){
    $username = $_POST['nama'];
    $nama = $_POST['idnama'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $foto = $_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'], '../img/' . $foto);

    $konek->query("INSERT INTO `admins`(`nama`, `idnama`, `mail`, `pass`, `foto`) VALUES ('$username','$nama','$mail','$pass','$foto')");

    if(mysqli_affected_rows($konek) > 0){
        global $ket;
        $ket = 1;
    }
    else{
        echo "<script>alert('gagal');</script>";
    }
}
?>
        <h1>Tambah Admin</h1>
            <?php if($ket == 1) : ?>
                <i style="background:#00E676; padding:5px;">Sukses</i>
                <i style="background:#fff;"><a href="index.php">Ke Home ?</a></i>
            <?php endif; ?>
            <div class="form">
            <form action="" method="POST" enctype="multipart/form-data">
                    <label for="nama">Username </label>
                    <input type="text" id="nama" name="nama">
                    <label for="nama">Nama </label>
                    <input type="text" id="nama" name="idnama">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="mail">
                    <label for="pass">Password</label>
                    <input type="text" id="pass" name="pass">
                    <label for="foto">Upload Gambar</label>
                    <input type="file" name="foto" id="foto">
                    <button name="klik">Tambah Admin</button>
                </form>
            </div>
    </div>
    
</body>

<footer>

</footer>
</html>