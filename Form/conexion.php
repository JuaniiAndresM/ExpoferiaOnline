<?php
//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost','root','root','proyecto');


//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

?>