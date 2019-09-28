<?php 
require("db.php")
session_start();

$resultMessage ="";
$item_name = "";
$priority = 0;
$amount = 0;

//Define error messages
$errors = "";
$missingItem = "<span>fill in an item<span><br />";
$missingPriority = "<span>add a priority for your item<span><br />";
$missingAmount = "<span>include an amount for your budget<span><br />";

if(empty($_POST["item"])){
   $errors += $missingItem;
}else{
    //filter the item
    $item_name = filter_var($_POST["item"], FILTER_SANITIZE_STRING);
}


if(empty($_POST["priority"])){
    $errors += $missingPriority;
}else{
        //filter the priority
    $priority = filter_var($_POST["priority"], FILTER_SANITIZE_STRING);
}

if(empty($_POST["amount"])){
    $errors += $missingAmount;
}else{
    //filter the amount 
    $amount = filter_var($_POST["amount"], FILTER_SANITIZE_STRING);
}

if($errors){
    //print the error message on the scree
    $resultMessage = "<div> $errors </div>";
    echo $resultMessage;
    exit;
}else{
    
    
    
    
    //code to update an item in the list will be written here
    //get the user_id
    //get the id of the note sent through the Ajax call
    $id = $_POST['item_id'];


    //get the content of the note
    

    //get the time when the note was updated
    $time = time();

    //run a query to update the note
    $sql = "UPDATE items SET item_name = '$item_name',  priority = '$priority' WHERE item_id = '$item_id'";

    $result = mysqli_query($conn, $sql);

    if(!$result){
        echo 'error';
        exit;
    }


    
}
