<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'shop';

$konek = mysqli_connect($host,$user,$pass,$db);

if(mysqli_connect_errno()){
    echo 'Koneksi Gagal';
}
?>