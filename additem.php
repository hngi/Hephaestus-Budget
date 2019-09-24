<?php 

session_start();

$resultMessage ="";
$item = "";
$priority = 0;
$amount = 0;


//Define error messages
$errors = "";
$missingItem = "<span>fill in an item<span><br />";
$missingPriority = "<span>add a priority for your item<span><br />";
$missingAmount = "<span>include an amount for your item<span><br />";

if(empty($_POST["item"])){
   $errors += $missingItem;
}else{
    //filter the item
    $item = filter_var($_POST["item"], FILTER_SANITIZE_STRING);
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
    
}
?>