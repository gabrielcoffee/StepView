<?php

/* Em casa (Gabriel)
$server_name = 'localhost';
$username = 'admin';
$password = 'admin';
$database = 'stepview';
*/


/*
// Na Puc
$server_name = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'stepview';
*/

// Em casa (Nicolas)
$server_name = 'localhost';
$username = 'root';
$password = '';
$database = 'stepview';



$conn = new mysqli($server_name, $username, $password, $database);

?>