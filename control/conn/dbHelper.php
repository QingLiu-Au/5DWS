<?php
    // include $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/conn.php';
    include dirname(dirname(dirname(__FILE__))).'/model/Customer.php';
    // include dirname(dirname(dirname(__FILE__))).'/model/Product.php';
    include dirname(dirname(dirname(__FILE__))).'/model/Shop.php';

    function GetUser($email) {
        require_once(dirname(__FILE__).'/conn.php');
        $query = "SELECT * FROM customer WHERE customerEmail = '".$email."'";
        // echo $query;
        $ctms = array(); //for use later on
        if ($result = mysqli_query($conn, $query)) {

            while ($obj = mysqli_fetch_object($result)) {

                array_push($ctms, new Customer($obj->customerId, $obj->customerName, $obj->customerEmail, $obj->password, $obj->address));

            }
            mysqli_free_result($result);
        }

        mysqli_close($conn);
        return (count($ctms) > 0) ? $ctms[0] : Customer::DefaultNull() ;
    }

    function UpdateUser($data) {
        // require_once($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/conn.php');
        require_once(dirname(__FILE__).'/conn.php');

        $name = $data->customerName;
        $email = $data->customerEmail;
        $password = $data->password;
        $add = $data->address;

        $sql = "UPDATE customer SET customerName = '$name', password = '$password', address = '$add' WHERE customerEmail = '$email'";

        $update = false;
        $data->hasValue = false;
        if (mysqli_query($conn, $sql)) {
            $update = true;
            $data->hasValue = true;
        }
        mysqli_close($conn);
        return $data;
        // return $update ? $data : Customer::DefaultNull();
    }

    function RegisterUser($data) {
        // require_once($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/conn.php');
        require_once(dirname(__FILE__).'/conn.php');

        $name = $data->customerName;
        $email = $data->customerEmail;
        $password = $data->password;
        $add = $data->address;
        // $sql = "INSERT INTO customer VALUES ('$name','$email','$password','$add')";
        $sql = 'INSERT INTO customer (customerName, customerEmail, password, address)
                VALUES ("'.$name.'", "'.$email.'", "'.$password.'", "'.$add.'")';

        $inserted = false;
        if (mysqli_query($conn, $sql)) {
            $inserted = true;
            $data->hasValue = true;
        } 

        mysqli_close($conn);
 
        return $inserted ? $data:Customer::DefaultNull();
        // return GetUser($email);
    }

    function GetProducts() {
        // return dirname(__FILE__);
        require_once(dirname(__FILE__).'/conn.php');
        $query = "SELECT * FROM product";
        $products = array();
        if ($result = mysqli_query($conn, $query)) {
            
            while ($obj = mysqli_fetch_object($result)) {

                array_push($products, 
                            new Product($obj->productId,
                                        $obj->productName,
                                        $obj->price,
                                        $obj->description,
                                        $obj->image,
                                        $obj->shopId));
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        return $products;
    }

    function GetProductById($productId) {
        require_once(dirname(dirname(dirname(__FILE__))).'/model/Product.php');
        require_once(dirname(__FILE__).'/conn.php');
        // require_once($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/conn.php');
        $query = "SELECT * FROM product WHERE productId = ".$productId;
        $products = array();
        if ($result = mysqli_query($conn, $query)) {
            
            while ($obj = mysqli_fetch_object($result)) {
          
                array_push($products, 
                new Product($obj->productId,
                            $obj->productName,
                            $obj->price,
                            $obj->description,
                            $obj->image,
                            $obj->shopId));

            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);

        return (count($products) > 0) ? $products[0] : Product::DefaultNull();
    }

    function SearchProduct($Search){
        require_once(dirname(__FILE__).'/conn.php');
        // require_once($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/conn.php');
        // 
        $sql_search = "select * from product 
        where productName like '%".$Search."%' or 
        cast(price as char) like '%". $Search."%'or 
        description like '%".$Search."%'";

        $products = array();
        if ($result = mysqli_query($conn, $sql_search)) {
            
            while ($obj = mysqli_fetch_object($result)) {

                array_push($products, 
                            new Product($obj->productId,
                                        $obj->productName,
                                        $obj->price,
                                        $obj->description,
                                        $obj->image,
                                        $obj->shopId));
            }
            mysqli_free_result($result);
        }

        mysqli_close($conn);
        return $products;
    }


    function GetShopById($shopId) {
        require_once(dirname(__FILE__).'/conn.php');
        // require_once($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/conn.php');
        $query = "SELECT * FROM shop WHERE shopId = ".$shopId;
        $shops = array();
        if ($result = mysqli_query($conn, $query)) {
            
            while ($obj = mysqli_fetch_object($result)) {

                array_push($shops, 
                            new Shop($obj->shopId,
                                        $obj->shopName,
                                        $obj->shopAddress,
                                        $obj->latitude,
                                        $obj->longitude,
                                        $obj->description,
                                        $obj->dateStarted));
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);

        return (count($shops) > 0) ? $shops[0] : Shop::DefaultNull();
    }

    function Test($data) {
        return $data;
    }

?>