<?php
    $conn = new mysqli("localhost","root","","umar_bakery");
    if($conn->connect_error){
        die("Connection Failed!");
    }
?>