<?php

//This is a logout page

session_start(); //This is a session start

session_destroy(); //This is a session destroying section

header('location: login.php'); //After redirect in login.php file

?>
