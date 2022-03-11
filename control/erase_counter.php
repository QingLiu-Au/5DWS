<?php 
session_start();
$_SESSION['counter'] = 0; 
header("Location:../index.php");
?>