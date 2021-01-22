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
			<div class="leftMargins">
				<h3 class="arialChange leftMargins" style = "text-align:right;"> Created by using HTML, CSS, Javascript, and PHP  </h3> <br>	
                <div class="title2" alt="About Us Logo"> LEADERBOARD </div>
                <div class="table arialChange leftMargins">
                <form method = "post" action="">
                    <label for="sort">Sort By: </label>
                    <select name="sort" id = "sort">
                        <option name="games_won" value = "games_won">Won Games</option>
                        <option name="time_played" value = "time_played">Time Played</option>
                        <option name="games_played" value = "games_played"># of Games Played</option>
                    </select>
                    <br>
                    <input type = "submit" value = "Submit">
                </form>
                    <?php
                        if ('POST' === $_SERVER['REQUEST_METHOD']) { 
                            $sql = "SELECT * FROM players ORDER BY games_won DESC";
                            $result = $conn->query($sql);
                            $count = 1;
                            $option = $_POST["sort"];

                            echo "<table>";

                            echo "<thead> <tr> <th> Rank </th> <th>Username</th> <th>" . $option . "</th> </tr> </thead>";

                            if ($result->num_rows > 0) {
                                echo "<tbody>";
                                while ($row = $result->fetch_assoc()) {
                                    if ($row["games_won"] == NULL) {
                                        continue;
                                    }
                                    else {
                                        echo "<tr>";
                                        echo "<td>" . $count . "</td>" . "<td>" . $row["username"] . "</td>" . "<td>" . $row[$option] . "</td>";
                                        echo "</tr>";
                                        $count += 1;
                                    }
                                }
                                echo "</tbody>";
                            }
                            else {
                                echo "error";
                            }
                            
                            echo "</table> <br>";

                            $conn->close();
                        }
                    ?> 
                </div>
            </div>
            <a class = "leftMargins myButton" href="index.php"> ← BACK </a>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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