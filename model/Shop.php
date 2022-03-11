<?php
    class Shop {
        var $shopId;
        var $shopName;
        var $shopAddress;
        var $latitude;
        var $longitude;
        var $description;
        var $dateStarted;
        var $hasValue;

        function __construct($id, $name, $shopAddress, $lat, $lngt, $desc, $startDate) {
            $this->shopId = $id;
            $this->shopName = $name;
            $this->shopAddress = $shopAddress;
            $this->latitude = $lat;
            $this->longitude = $lngt;
            $this->description = $desc;
            $this->dateStarted = $startDate;
            $this->hasValue = true;
        }

        public static function DefaultNull() {
            $instance = new self(-1, "", "", "", "", "", "");
            $instance->hasValue = false;
            return $instance;
        }

        function HasValue() {
            return $this->hasValue;
        }
    }

?>