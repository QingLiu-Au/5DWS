<?php 
  // echo "<h1>".dirname($_SERVER['PHP_SELF']);."</h1>";
  include $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/get_session.php'; 
  include $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/get_counter.php'; 

?>

<nav ng-controller="profileController" class="navbar navbar-expand-lg sticky-navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="./index.php">Fine Deluxry</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="./shop.php">Shops</a>
            </li>
            
            
          </ul>

          <?php
            include 'login_form.php'; 
          ?>
         
         <button type="button" 
                 id="cartbtn"
                  class="btn btn-primary position-relative" 
                  data-bs-toggle="modal" 
                  data-bs-target="#cartModal">
            <span>Cart</span> 
            <?php
              $counter = GetCounter();
              if($counter > 0)
              echo "<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>"
                  .$counter. " ";
              echo "<span class='visually-hidden'>unread messages</span></span>";
            ?>
          </button>
        </div>
      </div>
    </nav>