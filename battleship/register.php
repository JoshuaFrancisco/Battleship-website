<?php
   include "config.php";
?>

<!-- login.php -->
<!DOCTYPE html>
<html lang= "en">
   <head> 
   <meta charset="utf 8">
   <title> Sign Up Page </title>

   <!-- CSS elements header file --> 
   <link rel="stylesheet" href="CSS/styles.css"/>
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

   <div class = "bgGradient"> <br>
      <!-- Register logo title -->
      <div class="title2" alt="Register logo"> REGISTER </div>

      <!-- left indent in margins -->
      <div class="leftMargins">

         <form class="arialChange" method="POST" action="userRegistration.php">
         USERNAME : <input type="text" name="username" class="formBox"><br>
         PASSWORD : <input type="password" name="password" class="formBox"><br>
         FIRST NAME : <input type="text" name="first_name" class="formBox"><br>
         LAST NAME : <input type="text" name="last_name" class="formBox"><br>
         AGE : <input type="number" name="age" class="formBox"><br>
         GENDER: <input type="text" name="gender" class="formBox"><br>
         LOCATION : <input type="text" name="location" class="formBox"><br><br>

         <input class= "myButton" type="submit" value="SUBMIT" >
         </form>

         <br> <br>
         <!-- Go back to homepage -->
         <a class = "myButton" href="login.php"> ← BACK </a>
         <br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
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

