<?php
    include dirname(getcwd()).'\\conn\\dbHelper.php';
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf-8');

    $products = GetProducts();

    /// USE THIS METHOD TO GENERATE JSON FORMAT STRING => json_encode($object or $any array)
    echo json_encode($products);
?>