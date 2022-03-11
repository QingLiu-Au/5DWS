<?php
    include $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/dbHelper.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $products = SearchProduct($_POST["search"]);
      $_SERVER['REQUEST_METHOD'] = 'GET';
    } 
    else {
      $products = GetProducts();
    }

?>

<div class="search-box card card-body">
  <form class="d-flex" method="POST" action="">
    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

</div>

<?php
      
    echo "<div class='mt-5 row grid-display'>";
    for ($i=0; $i < count($products); $i++) { 
        
     
    
?>        
        
        <div class="col-sm">
          <div class="card">
            <form method="POST" action="./control/add_to_cart.php">
            <a href=<?php echo "./productDetails.php?id=".$products[$i]->productId; ?>>
              <img src=<?php echo ".".$products[$i]->image; ?> 
              class="card-img-top" alt="Large building">
            </a>
            <div class="card-body p-4 rounded-bottom">
              <h5 class="card-title fw-bold"><?php echo $products[$i]->productName; ?></h5>

              <div class="row row-cols-lg-auto d-flex flex-wrap justify-content-between align-items-center">
                <div class="fs-sm me-2">
                  Qty  <input type="number" name="qty" id="qty<?php echo $i; ?>" name="qty" min="0" max="20" value="0" >

                </div>
                <div class="bg-faded-accent text-accent rounded-1 px-2">$<?php echo $products[$i]->price;  ?></div>
              </div>
              <p class="card-text">
                <?php 
                 
                  echo $products[$i]->description > 50 
                      ? substr($products[$i]->description, 0, 47).'...'
                      : $products[$i]->description;
                ?>
              </p>
                <div class="add-cart-btn">
                  <input type="hidden" name="productid" value=<?php echo $products[$i]->productId?>>
                  <input type="submit" class="btn btn-secondary btn-sm" value="Add to Cart">
                </div>
              </div>
            </form>
              
          </div>
        </div>
        
<?php        
    } 
     echo "</div>";
?>
