<?php
    include dirname(getcwd()).'\\conn\\dbHelper.php';
    
    $data = json_decode(file_get_contents("php://input")); 

    // echo json_encode(Test($data));

    if ($data != null) {
        $customer = RegisterUser($data);

        /// USE THIS METHOD TO GENERATE JSON FORMAT STRING => json_encode($object or $any array)
        echo json_encode($customer);
    }
    else {
        echo json_encode(Customer::DefaultNull());
    }
    

?>