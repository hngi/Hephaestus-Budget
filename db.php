<?php
$url = getenv('JAWSDB_MARIA_URL');
$dbparts = parse_url($url);

// db configuuration for app hosted on heroku
$host = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

// db configuration for localhost
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "hephbudget";

$conn = mysqli_connect("$host", "$username", "$password", $database);
