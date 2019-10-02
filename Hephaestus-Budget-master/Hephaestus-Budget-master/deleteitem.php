<?php
session_start();
require('db.php');


$id = $_POST['item_id'];

$user_id = $_SESSION['user_id'];

//Run a query to delete the note from the notes table
$sql = "DELETE FROM items WHERE id = '$id' AND user_id = '$user_id' ";

$result = mysqli_query($conn, $sql);
if(!$result){
    echo "error";
    exit;
}


?>
