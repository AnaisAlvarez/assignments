<?php # Script 9.2 - mysqli_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL, 
// selects the database to use, and sets the encoding.
// This file will be required in many other php files that need db connection.

// Set the database access information as constants:
DEFINE ('DB_USER', 'alvarea');  //  you should put your username here
DEFINE ('DB_PASSWORD', '1798979'); //  you should put your password (studentID) here. 1798979
DEFINE ('DB_HOST', 'alvarea.simmons.edu'); //alvarea.simmons.edu
DEFINE ('DB_NAME', '458olsp18_alvarea'); //  you should put the database name here. 458olsp18_alvarea

// Make the connection.@ will make sure the error won't be returned if there is one.
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
?>