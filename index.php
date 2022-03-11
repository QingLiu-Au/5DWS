<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css">
    <link rel="stylesheet" href="./custom.18d3a4a7.css">
  <script src="./custom.18d3a4a7.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
  <body ng-app="myApp" >
    
    <?php 

      // navbar
      include './components/navbar.php'; 
      
      //shopping cart
      include './components/shoppingCart.php'; 

      // register user
      include './components/register.php';
      
      // register user
      include './components/profile.php';
      
      // Carousel
      include './components/carouselView.php'; 
    
    
    ?>



   

    

    <!-- main body display products -->
    <div class="container">
      <?php include './components/viewlist.php'; ?>
      

      <!-- footer -->
      <?php include './components/footer.php'; ?>

    </div>

    <script src="./src.e31bb0bc.js"></script>
    <script src="./myApp.js"> </script>
  </body>
</html>
