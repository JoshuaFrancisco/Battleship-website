<?php
session_start();
$servername = "localhost"; //Hostname
$username = "root"; //User
$password = ""; //Password
$dbname = "accounts"; //database name located on mySQL server. 

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) //If connection has connection error php will die (equivalent to exit) with message 
    { 
    die("Connection failed: " . $conn->connect_error);
    }

?>