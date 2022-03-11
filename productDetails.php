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
      
    ?>

    <!-- main body display products -->
    <div ng-controller="detailController" 
         data-ng-init="GetProductById(<?php echo $_GET['id'];?>)" 
         ng-model="product"
         class="container">

      <h1 class="about-header">{{product.productName}}</h1>
      
      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img src=".{{product.image}}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
          
          role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> -->
        </div>
        <div class="col-md-7">
          <p class="lead">{{product.description}}</p>
          <h4 class="featurette-heading">${{product.price}} </h4>
          <p class="text-muted">Available at shop {{shop.shopName}}. </p>
          <p class="text-muted">Location: {{shop.shopAddress}}</p> 
          <p class="text-muted">Start Business since {{shop.dateStarted}}</p>
          
        </div>
      </div>

      <div class="col-md-6">
        Google Maps Place Holder
        <div id="googleMap" style="width:100%;height:400px;"></div>
        <!-- <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/place/TAFE+SA+-+Adelaide+Campus/@-34.9266894,138.592666,15.96z/data=!3m1!5s0x6ab0b65c4dbfd591:0xbfeb7a8c2c07c6f4!4m12!1m6!3m5!1s0x6ab0b65db3256819:0x727110fb0156dced!2sSaab+Australia!8m2!3d-34.8205088!4d138.6162709!3m4!1s0x6ab0ced3f131137f:0xa7a9a2bf10ce5bbf!8m2!3d-34.9240746!4d138.5948522"></iframe> -->
      </div>

      <!-- footer -->
      <?php include './components/footer.php'; ?>

    </div>

    <script src="./src.e31bb0bc.js"></script>
    <script src="./myApp.js"> </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap"></script>
  </body>
</html>
