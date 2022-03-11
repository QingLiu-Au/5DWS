<?php
session_start();
// remove all session variables
session_unset();

// destroy the session
if (session_status() === PHP_SESSION_ACTIVE)
    session_destroy();

// redirect to index page
header("Location: /php/angular_assessment/index.php");
?>