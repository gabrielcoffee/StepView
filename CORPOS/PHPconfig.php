<?php

// Em casa (Gabriel)
$server_name = 'localhost';
$username = 'admin';
$password = 'admin';
$database = 'stepview1';

/*
// Na Puc
$server_name = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'stepview';
*/

$conn = new mysqli($server_name, $username, $password, $database);

?>