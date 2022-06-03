<?php
$conn = new mysqli("localhost" , "root" , "" , "c19vs");

if($conn->connect_error){
    die ("connnection: " . $conn->connect_error);
}
?>