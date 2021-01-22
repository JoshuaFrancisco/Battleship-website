<?php
   include "config.php";
?>

<!-- home.php -->
<html lang = "en">
	<head>
  		<meta charset="UTF-8"> 
   		<title> CSCI 130 Battleship Project </title>
   		<!-- CSS elements header file --> 
    	<link rel="stylesheet" href="CSS/styles.css" media="all" />
 	</head>
 
 	<body>
		<!-- Main title -->
        <header> 
        <div class = "title"> BATTLESHIP <img src = "images/red.png" style = "width:50px; height 55px;"> 
        <a href="userAccount.php" style="text-align:right">
			<?php 
				if (!isset($_SESSION["userid"])) {
					echo "Guest";
				}
				else {
					echo "Welcome " . $_SESSION["userid"];
				}
			?> 
			</a>
			</div>
        </header>
		<!-- Main content -->
		<div class = "bgGradient">
			<!-- left indent in margins -->
			<div class="leftMargins arialChange"> <br>	
                <div class="title2">
                    <?php //Login.php

                    //Variables submitted by user
                    $loginUser = $_POST["username"];
                    $loginPass = $_POST["password"];

                    $sql = "SELECT password FROM players WHERE username = '" . $loginUser . "'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    //output data of each row
                    while($row = $result->fetch_assoc()) {
                        if($row["password"] == $loginPass)
                        {
                            $_SESSION["userid"] = $loginUser;
                            header("location: index.php");

                            //Add other functionalities here:

                            //Get user's data here.

                            //Get player info.
                            
                            //Modify player data.
                        }
                        else 
                        {
                            echo "Wrong Credentials.";
                        }
                    }
                    } else {
                    echo "Username does not exist.";
                    }

                    //Close connection
                    $conn->close();
                    ?> 
                </div>
                    <?php 
                        echo "Welcome, " . $loginUser . "!<br>";
                    ?>
                <a class = "myButton" href="game.php"> Enter Arena </a> <br><br>
                <a class = "myButton" href="userinfo.php"> Account Information </a> <br><br>
                <a class = "myButton" href="index.php"> Home </a> <br><br>
            </div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
		<!-- Footer containing copyright and email adress -->
		<footer>
			<address style = "font-family:Arial; size: 1rem; color: #c6cbcf;"> © 2020 JOSHUA FRANCISCO & ROSELLYN VICENTE SOME RIGHTS RESERVED <br><br> 
				CONTACT INFORMATION: <a class="noLink" href="mailto:joshuafrancisco@mail.fresnostate.edu?subject=CSCI 130 Project Inquiries"> joshuafrancisco@mail.fresnostate.edu  </a> 
				<a>/</a>
				<a class="noLink" href="mailto:rose_vice@mail.fresnostate.edu?subject=CSCI 130 Project Inquiries"> rose_vice@mail.fresnostate.edu <br> </a> 
			</address>
			<!-- <address class="arialChange" > 
				CONTACT INFORMATION: <a class="noLink" href=""> 
			</address> -->
		</footer>
	</body>
</html>