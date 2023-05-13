<?php

// Em casa (Gabriel)
$server_name = 'localhost';
$username = 'root';
$password = '';
$database = 'stepview';

/*
// Na Puc
$server_name = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'stepview';
*/

$conn = new mysqli($server_name, $username, $password, $database);

?>