<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['keranjang'][$id]);
header("Location:keranjang.php");
?>