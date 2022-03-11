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
      include './components/navbar_shop.php'; 
      
      //shopping cart
      include './components/shoppingCart.php'; 

      // register user
      include './components/register.php';
      
      // register user
      include './components/profile.php';
      

      include $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/dbHelper.php';

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $shop = GetShopById($_POST["shop"]);
        
        $_SERVER['REQUEST_METHOD'] = 'GET';
      } 
    
    ?>
    

    <!-- main body display products -->
    <div class="container">
      <h1 class="about-header">Shops Location</h1>
      <form method = "post">
        <select name="shop">
          <option value="1">Adelaide CBD</option>
          <option value="2">Sydney CBD</option>
        </select>
        <input type="submit" name="Submit" value="Submit" />
      </form>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') echo $shop; ?>
      <div id="googleMap" style="width:100%;height:400px;"></div>

      
      <!-- footer -->
      <?php include './components/footer.php'; ?>
      
    </div>
   
    <script>
      function myMap() {
      var mapProp= {
        center:new google.maps.LatLng(<?php echo $shop->latitude; ?>, <?php echo $shop->longitude ?>),
        zoom:18,
      };
      var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap"></script>

  </body>
</html>
