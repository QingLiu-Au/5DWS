<?php
if((isset($_COOKIE["product1"])) and (isset($_COOKIE["product2"])))
{
    echo $_COOKIE["product1"]."<br />";
    echo $_COOKIE["product2"]."<br />";
    print_r($_COOKIE);
}
else
{
    echo"The cookie are not set";
}
?>