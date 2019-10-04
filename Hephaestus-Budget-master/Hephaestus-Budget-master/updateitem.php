<?php 
require("db.php")
session_start();

$resultMessage ="";
$item_name = "";
$priority = "";
$amount = 0;


if(empty($_POST["item"])){
   $errors += $missingItem;
}else{
    
    $item_name = filter_var($_POST["item"], FILTER_SANITIZE_STRING);
}


if(empty($_POST["priority"])){
    $errors += $missingPriority;
}else{
    
    $priority = filter_var($_POST["priority"], FILTER_SANITIZE_STRING);
}

if(empty($_POST["amount"])){
    $errors += $missingAmount;
}else{

    $amount = filter_var($_POST["amount"], FILTER_SANITIZE_STRING);
}

if($errors){

    $resultMessage = "<div> $errors </div>";
    echo $resultMessage;
    exit;
}else{
    
    $id = $_POST['item_id'];


    $sql = "UPDATE items SET item_name = '$item_name',  priority = '$priority' WHERE item_id = '$item_id'";

    $result = mysqli_query($conn, $sql);

    if(!$result){
        echo 'error';
        exit;
    }


    
}
