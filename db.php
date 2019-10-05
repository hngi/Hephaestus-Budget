<?php 
/*$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

# db config for heroku
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);
*/
/* errors handling */
error_reporting(E_ALL);
ini_set("display_errors",1);
ini_set('log_errors',0);
ini_set('error_log','path/to/log/file');

# db config for locahost
 $host = "localhost";
 $username = "root";
 $password = "";
 $database = "hephbudget";

$conn = mysqli_connect("$host", "$username", "$password", $database);

// if($conn){
//     echo "connected";
// }