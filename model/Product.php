<?php
    class Product {
        var $productId;
        var $productName;
        var $price;
        var $description;
        var $image;
        var $shopId;
        var $hasValue;

        function __construct($id, $name, $price, $desc, $img, $shopId) {
            $this->productId = $id;
            $this->productName = $name;
            $this->price = $price;
            $this->description = $desc;
            $this->image = $img;
            $this->shopId = $shopId;
            $this->hasValue = true;
        }

        public static function DefaultNull() {
            $instance = new self(-1, "", "", "", "", -1);
            $instance->hasValue = false;
            return $instance;
        }

        function HasValue() {
            return $this->hasValue;
        }

        function get_product_id() {
            return $this->productId;
        }
    
        function get_product_name() {
            return $this->productName;
        }
    
        function get_unit_price() {
            return $this->price;
        }
    }

?>