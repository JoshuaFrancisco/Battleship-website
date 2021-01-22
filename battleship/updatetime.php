<?php
    include "config.php";
    $user = $_SESSION["userid"];
    $minute = $_POST["minute"];
    $second = $_POST["second"];
    $sql = "UPDATE players SET time_played = '$minute' WHERE username = '$user';";
    $result = $conn->query($sql);
    $conn->close();
?>