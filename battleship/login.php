<?php
   include "config.php";
?>


<!-- login.php -->
<!DOCTYPE html>
<html lang= "en">
   <head> 
      <meta charset="utf 8">
      <title> Login Page </title>

      <!-- CSS elements header file --> 
      <link rel="stylesheet" href="CSS/styles.css" media="all" />
   </head>

 <!-- Background Gradient-->
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
      <!-- Login logo title -->
      <div class="title2" alt="Login logo"> LOGIN </div>

      <!-- left indent in margins -->
      <div class="leftMargins arialChange">
         <h3> Welcome to Online Web Battleship Game! </h3>
         <form method="POST" action="userLogin.php" class="arialChange">

         <!--Username and Password input -->
         USERNAME: <input type="text" name="username" class="formBox"><br><br>
         PASSWORD: <input type="password" name="password" class="formBox"><br><br>

         <!--Login and Register Buttons -->
         <input type="submit" name="submit" class= "myButton" value="Login">
         <a class = "myButton" href="register.php"> Register </a> 
         </form>
      </div>
      <br> <br>
      <!-- Go back to homepage -->
      <a class = "leftMargins myButton" href="index.php"> ← BACK </a>
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