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
			<div class="leftMargins arialChange">
				<h3 class="arialChange leftMargins" style = "text-align:right;"> Created by using HTML, CSS, Javascript, and PHP  </h3> <br>	
                    <?php //Login.php
                        $userid = $_SESSION["userid"];
                        $sql = "SELECT * FROM players WHERE username = '$userid'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "Username: " . $row["username"] . "<br>";
                                echo "Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
                                echo "Age: " . $row['age'] . "<br>";
                                echo "Gender: " . $row['gender'] . "<br>";
                                echo "Location: " . $row['location'] . "<br>";
								echo "Games Won: " . $row['games_won'] . "<br>";
								echo "Games Played: " . $row['games_played'] . "<br>";
								echo "Time Played: " . $row['time_played'] . "<br><br><br>";
                            }
                        }
                        else {
                            echo "error";
                        }
                        
                        $conn->close();

                    ?> 
                <a class = "myButton" href="game.php"> Enter Arena </a> <br><br>
                <a class = "myButton" href="userinfo.php"> Account Information </a> <br><br>
                <a class = "myButton" href="logout.php"> Logout </a> <br><br>
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