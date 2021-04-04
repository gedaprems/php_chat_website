<?php

$server = "localhost";
$username = "root";
$password = "";
$dbName = "chatroom";

$conn = mysqli_connect($server,$username,$password,$dbName);

if(!$conn){
    die("Failed to connect". mysqli_connect_error());
}

?>