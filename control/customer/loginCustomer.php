<?php

// include $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']).'/control/conn/dbHelper.php';
include dirname(getcwd()).'\\conn\\dbHelper.php';
$data = json_decode(file_get_contents("php://input")); 
// session_start();
if (($data->password=="") or($data->email=="")) {
    echo"Please fill all the requied fields";
}
else if (!strstr($data->email, "@") or !strstr($data->email,"."))
{
    echo"Invlid email";
}
else 
{
    // dbHelper GetUser method
    $customer = GetUser($data->email);
    $isLogin = false;
    if ($customer->HasValue()) {

        if($customer->ValidateCustomer($data->email, $data->password)) {
            $isLogin = true;
        }
    }   
    echo json_encode($customer);
    // echo ('{"login":"'.$isLogin.'"}');
    // echo ($isLogin ? json_encode($customer) : json_encode(Customer::DefaultNull()));
    
}
?>