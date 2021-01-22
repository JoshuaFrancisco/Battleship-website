<?php
    include "config.php";
    $user = $_SESSION["userid"];
    $sql = "UPDATE players SET games_played = games_played + 1,games_won = games_won + 1 WHERE username = '$user';";
    $result = $conn->query($sql);
    $conn->close();
?>