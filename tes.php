<?php
session_start();

    if(isset($_GET['updatekera'])){
        $a = $_GET['jml'];
        $b = $_GET['id'];

        $_SESSION['keranjang'][$b]['jumlah'] = $a;

        header("Location:keranjang.php");
    }
?>