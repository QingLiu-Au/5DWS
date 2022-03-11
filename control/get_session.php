<?php
header("Access-Control-Allow-Origin: http://localhost:8082");
header("Access-Control-Allow-Headers: content-type, authorization");
header("Access-Control-Allow-Credentials: true");

if (!isset($_SESSION))
  {
    session_start();
  }
$hasSession = false;

if((isset($_SESSION["email"])))
{
    $hasSession = true;
}
?>