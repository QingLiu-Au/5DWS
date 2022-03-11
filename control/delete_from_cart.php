<?php
include '../model/Cart.php';
// include '../model/Product.php';

//Start the session
session_start();	
$product_no = $_POST['product_no'];
//remove product from the cart if selected - mark as deleted
//If the product is not empty
if ($product_no != "") {
    $counter = $_SESSION['counter'];
    $cart = new Cart();
    $cart = unserialize($_SESSION['cart']);
    //delete selected product from the cart
    $cart->delete_product($product_no);
    //update the counter
    //Decrement the counter by one
    $_SESSION['counter'] = $counter - 1;
	//Serialize and add back to the session
    $_SESSION['cart'] = serialize($cart);
    $_SESSION['delete_cart_item'] = true;
    print_r($cart);
    //Redirect to the view_cart.php
    header("Location: ../index.php");
    exit();
}
	
?>