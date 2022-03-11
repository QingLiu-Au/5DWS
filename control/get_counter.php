<?php
    function GetCounter() {
        // session_start();
        if (!isset($_SESSION['counter'])) {
            $_SESSION['counter'] = 0;
        }
        return $_SESSION['counter'] > 0 ? $_SESSION['counter'] : 0;
    }
?>