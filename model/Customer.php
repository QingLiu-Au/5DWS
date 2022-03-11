<?php
    class Customer {
        var $customerId;
        var $customerName;
        var $customerEmail;
        var $password;
        var $address;
        var $hasValue;
    
        function __construct($id, $name, $email, $pwd, $addr) {
            $this->customerId = $id;
            $this->customerName = $name;
            $this->customerEmail = $email;
            $this->password = $pwd;
            $this->address = $addr;
            $this->hasValue = true;
        }

        public static function DefaultNull() {
            $instance = new self(-1, "", "", "", "");
            $instance->hasValue = false;
            return $instance;
        }

        public function HasValue() {
            return $this->hasValue;
        }

        function ValidateCustomer($email, $password) {
            return strtolower($this->customerEmail) == strtolower($email) and $this->password == $password;
        }

        function GetName() {
            return $this->customerName;
        }

    }

?>