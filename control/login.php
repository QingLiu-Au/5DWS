<?php

include $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/dbHelper.php';


session_start();
$email=$_POST["email"];
$pwd=$_POST["password"];

if (($pwd=="") or($email=="")) {
    echo"Please fill all the requied fields";
}
else if (!strstr($email, "@") or !strstr($email,"."))
{
    echo"Invlid email";
}
else 
{
    // dbHelper GetUser method
    $customer = GetUser($email);

    if ($customer->HasValue()) {

        if($customer->ValidateCustomer($email, $pwd)) {
            $_SESSION["email"] =$email;
            $_SESSION["error"] = false;
            $_SESSION["error_message"] = "";
        }
        else {
            $_SESSION["error"] = true;
            $_SESSION["error_message"] = "Please Check Email and Password";
        }
    }
    unset($_POST);
    


    header("Location: /php/assignment/index.php");
    
}
?>