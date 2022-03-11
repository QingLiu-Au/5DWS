<?php
include '../model/Product.php';
include '../model/Cart.php';
include '../control/conn/dbHelper.php';

//Start the session
session_start();
//get the product_id and the quantity
$product_id=$_POST['productid'];
$qty=$_POST['qty'];
//store number of products in the shopping cart
$counter=0;
$cart = new Cart();
// unserialize the cart if the cart is not empty
if ((isset($_SESSION['counter'])) && ($_SESSION['counter'] !=0)){
// Convert the text data to object
    $cart = unserialize($_SESSION['cart']); 
	$counter = $_SESSION['counter']; 	
}  
else {
	$_SESSION['cart'] = "";
	$_SESSION['counter'] = 0;	
}

if (($product_id == "")or ($qty < 1))
{
   //Redirect the user back to product page
   header("Location:../index.php");
   exit();
}
else
{

    //If there is a matching recored select product_name, unit_price
    $product = GetProductById($product_id);

	if($product->HasValue()){

		$cart->add_product($product);
		//update the counter
		$_SESSION['counter'] = $counter+1;
		$_SESSION['cart'] = serialize($cart);
	
    }

    header("Location: ../index.php");
    exit();

}
	
?>
