<?php

    if(isset($_POST['update'])){
        
        $id         = $_SESSION['user']['id_user'];
        $nama       = $_POST['nama'];
        $telepon    = $_POST['hp'];
        $mail       = $_POST['mail'];
        $pass       = $_POST['pass'];

        $data = mysqli_query($konek,"UPDATE `tb_users` SET id_user = '$id', email_user='$mail',pass_user='$pass',nama_user='$nama',hp_user='$telepon' WHERE id_user = $id");
        if($data){
            echo '<script language="javascript">';
            echo 'alert("Update Sukses")';
            echo '</script>'; 
        }else{
            echo '<script language="javascript">';
            echo 'alert("Update Gagal")';
            echo '</script>';
        }
    }
?>
<p class="das-p-update">Update Data</p>
</br>
<table class="das-update">
    <?php
        $id         = $_SESSION['user']['id_user'];
        $data       = $konek->query("SELECT * FROM `tb_users` WHERE id_user = '$id' ");
        $result     = $data->fetch_assoc();
    
    ?>
    <form method="post" enctype="multipart/form-data">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?= $result['nama_user']; ?>"></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td><input type="text" name="hp" value="<?= $result['hp_user'] ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="mail" value="<?= $result['email_user'] ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass" value="<?= $result['pass_user'] ?>"> <small>Biarkan Jika tidak diganti</small></td>
        </tr>
        <tr>
            <td><button type="submit" name="update">Update</button></td>
        </tr>
    </form>
</table>