<?php
   include "config.php";
?>

<!-- howtoplay.php -->
<!DOCTYPE html>
<html lang= "en">
  <head>
    <meta charset="utf 8">
    <title> How to Play </title>

    <!-- CSS elements header file --> 
    <link rel="stylesheet" href="CSS/styles.css" media="all" />
  </head>

  <!-- Green to black gradient background  CHANGE LATER-->
  <body>

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
    <div class = "bgGradient">
      <!-- How to Play PNG logo title -->
      <br>
      <div class="title2" alt="How to Play"> HOW TO PLAY </div>

      <!-- left indent in margins and font change-->
      <div class="leftMargins">
        <span class="arialChange">

          <!-- "Meat" of the page -->
          <h3> INTRODUCTION </h3>

          <p> Hello! and Welcome to the How-to-Play page. This page includes the history of Battleshiop and provides a description of the game with the purpose of teaching newcomers how to play the game. </p>

          <h3> ORIGIN </h3>

          <p> Battleship is known worldwide as a pencil and paper game which dates from World War I. It was
          published by various companies as a pad-and-pencil game in the 1930s, and was released as a
          plastic board game by Milton Bradley in 1967. The game has spawned various electronic versions, video
          games, smart device apps and a film. </p>
          <img src = "images/old_battleship.jpg" alt = "old battleship game" style="display:block;margin-left:auto;margin-right:auto;">

          <h3> DESCRIPTION </h3>

          <p> Battleship is a strategy type guessing game for two players. It is played on ruled grids (paper or board)
          on which each player's fleet of ships (including battleships) are marked. The locations of the fleets are
          concealed from the other player. Players alternate turns calling "shots" at the other player's ships, and
          the objective of the game is to destroy the opposing player's fleet. </p>
          <img src="images/grid.gif" alt="battleship grid" style="display:block;margin-left:auto;margin-right:auto">

          <h3> RULES </h3>

          <ul style = "list-style-image: url('images/paw.png')">
            <li>Both players must discreetly place ships on their board. </li>
              <ul>
                <li> Ships consist of Carriers (5 spaces), Battleships (4 spaces), Cruisers (3 spaces), Submarine (3 spaces), and Destroyer (2 spaces) </li>
                <li> Ships must be arranged either vertically or horizontally. </li>
                <li> Ships cannot overlap. </li>
              </ul>
            <li>Players each take turns guessing where their opponents' ships are located. The game will respond with a red "hit" or a white "miss" accordingly. </li>
            <li>Players are allowed the following 2 super powers </li>
              <ul>
                <li> Send 3 hits in one turn </li>
                <li> Send a big hit (hits surrounding area) </li>
              </ul>
            <li>Once a player has successfully sunken all of the other players' ships, the game will end.</li>
          </ul>

        </span>

        <br> <br>
        <!-- Go back to homepage -->
        <a class="myButton" href="index.php"> ← BACK </a>

      </div>
      <br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
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