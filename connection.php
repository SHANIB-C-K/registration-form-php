<?php

$conn = mysqli_connect('localhost', 'root', '', 'registration');
/*This is connecting to MySQL database localhost is my server name,
root is a username of database, '' its password of database,
registration is a name of database 
*/

if (!$conn) {
    die('Server doesnot connected');
    //its check to server connect or not connect
}

?>
