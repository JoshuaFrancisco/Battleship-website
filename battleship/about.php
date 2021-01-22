<?php
   include "config.php";
?>

<!-- about.php -->
<!DOCTYPE html>
<html lang= "en">
   <head> 
      <meta charset="utf 8">
      <title> About Us </title>

      <!-- CSS elements header file --> 
      <link rel="stylesheet" href="CSS/styles.css" media="all" />
   </head>

 <!-- Blue to Black Gradient-->
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
         <!-- About us Logo title -->
         <div class="title2" alt="About Us Logo"> ABOUT US </div>

         <!-- Joshua's mini CV -->
         <ul style = "list-style-image: url('images/paw.png')">
            <!-- Joshua Francisco title -->
            <div class="title3" alt="Joshua Francisco Title"> JOSHUA FRANCISCO </div>
            <div class="leftMargins">
               <img src="images/joshua_francisco.jpg" style= "width:200px; height:200px;" alt="joshua francisco"> <br>
            </div>
            <div class="leftMargins arialChange">
               <strong> Web Developer </strong>
               <br> <br>
               <i> Undergraduate Software Developer looking for entry level opportunities </i> <br> <br>
               <strong> EDUCATION: </strong> 
                  <li> Fresno State senior undergrad </li> <br>
               <strong> SKILLS: </strong> 
                  <li> PHP, SQL, HTML, CSS, JS, Haskell, C++, C#, Python, LaTeX, Github, Agile Programming </li> <br>
               <strong> EXPERIENCE: </strong> 
                  <li> Undergrad programmer of 5 years </li> <br>
            </div>
         </ul>

         <!-- Ros's mini CV -->
         <ul style = "list-style-image: url('images/paw.png')">
            <!-- Rosellyn Vicente title -->
            <div class="title3" alt="Rosellyn Vicente Title"> ROSELLYN VICENTE </div>
            <div class="leftMargins">
               <img src="images/rosellyn_vicente.jpg" style= "width:200px" "height:40px" alt="rosellyn vicente"> <br>
            </div>
            <div class="leftMargins arialChange">
               <strong> Web Developer </strong>
               <br> <br>
               <i> Undergraduate Software Developer looking for entry level opportunities </i> <br> <br>
               <strong> EDUCATION: </strong> 
                  <li> Fresno State senior undergrad </li> <br>
               <strong> SKILLS: </strong> 
                  <li> PHP, SQL, HTML, CSS, JS, Haskell, C++, Python, LaTeX </li> <br>
               <strong> EXPERIENCE: </strong> 
                  <li> Undergrad programmer of 4 years </li> <br>
            </div>
         </ul>
         <br> <br>
         <!-- Go back to homepage -->
         <a class = "leftMargins myButton" href="index.php"> ← BACK </a>
         <br><br><br><br><br><br><br><br><br>
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