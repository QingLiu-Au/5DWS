<?php
    include dirname(getcwd()).'\\conn\\dbHelper.php';
    
    $data = json_decode(file_get_contents("php://input")); 

    if ($data != null) {
        $customer = UpdateUser($data);

        /// USE THIS METHOD TO GENERATE JSON FORMAT STRING => json_encode($object or $any array)
        echo json_encode($customer);
    }

?>