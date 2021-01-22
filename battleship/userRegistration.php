<?php //RegisterUser.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accounts"; //database name located on mySQL server. 

//Variables submitted by user
$loginUser = $_POST["username"];
$loginPass = $_POST["password"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$location = $_POST["location"];

//Create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) { //If connection has connection error php will die (equivalent to exit) with message 
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username FROM players WHERE username = '" . $loginUser . "'";

//Open Connection 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //Tells the user that name is already taken
    echo "Username is already taken.";
    
} else {
    echo "Creating user...";
    //Query to insert the user, password, first_name, last_name, age, gender, and location into the players database
    $sql2 = "INSERT INTO players  (username, password, first_name, last_name, age, gender, location) VALUES ('" . $loginUser . "', '" . $loginPass . "' , '" . $first_name . "' , '" . $last_name . "' , '" . $age . "' ,  '" . $gender . "' , '" . $location . "')";
    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";

        //Once user registers redirects to register.php
        //header("Location: register.php");
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
}

//Close connection
$conn->close();
?>

<html lang = "en">
 <head>
  <meta charset="UTF-8"> 
   <title> Registration Complete </title>

   	<!-- CSS elements header file --> 
    <link rel="stylesheet" href="CSS/styles.css" media="all" />
    
 </head>
 
 <!-- Gradient background -->
 <body class = "bgGradient">

    <!-- Go back to homepage -->
    <br> <br> <a class = "leftMargins myButton" href="login.php"> ← BACK </a>

</body>
</html>