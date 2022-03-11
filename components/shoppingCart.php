<?php
include './model/Cart.php';
include './model/Product.php';

$cart = new Cart();
if(!isset($_SESSION['counter']))
{
  $_SESSION['counter'] = 0;
}
$counter= $_SESSION['counter'];
$depth = 0;

if ($counter > 0) {
  $cart = unserialize($_SESSION['cart']);
  //Get the depth of the cart
  $depth = $cart->get_depth();
}
    
?>

<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
              <a class="btn-close" href="./index.php"></a>
              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                  <?php
                    if ($depth > 0) {
                  ?>
                      <div class="row">
                        <div class="col-md-5">
                          <?php echo "Name"; ?>
                        </div>
                        <div class="col-md-3">
                          <?php echo "Qty"; ?>
                        </div>
                        <div class="col-md-3">
                          <?php echo "Unit Price"; ?>
                        </div>
                      
                      </div>
                  <?php    
                    }
                    $total = 0;
                    for ($i=0; $i < $depth; $i++) { 
                      $product = $cart->get_product($i);
                      $product_id = $product->get_product_id();
                      $product_name = $product->get_product_name();
                      $qty = $product->hasValue;
                      $unit_price = $product->get_unit_price();
                      $total += $qty * $unit_price;
                  ?>
                  <div class="row">
                    <div class="col-md-5">
                      <?php echo "$product_name"; ?>
                    </div>
                    <div class="col-md-3">
                      <?php echo "$qty"; ?>
                    </div>
                    <div class="col-md-3">
                      <?php echo "$$unit_price"; ?>
                    </div>
                    <div class="col-md-1">
                      <form method="POST" action="./control/delete_from_cart.php">
                        <button type="submit" class="no-style-button" 
                          name="product_no" value=<?php echo "'$i'"; ?> >
                          <i class="far fa-trash-alt"></i>
                        </button>
                      </form>
                      
                    </div>
                   
                  </div>
                  
                  <?php } ?>
                  <div class="row">
                    <div class="col-md-3 ms-auto"> </div>
                    <div class="col-md-4 ms-auto">Total: $<?php echo $total; ?></div>
                  </div>
                </div>
              </div>
              
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Clear Cart</button> -->
              <a class="btn btn-secondary" href="./control/erase_counter.php">Clear Cart</a>
              <a class="btn btn-primary" href="./checkout.php">Check Out</a>
            </div>
          </div>
        </div>
      </div>