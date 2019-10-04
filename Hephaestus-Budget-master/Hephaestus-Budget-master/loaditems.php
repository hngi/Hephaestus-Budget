<?php
session_start();
include('db.php');

//get the user_id using the session variables
$user_id = $_SESSION['user_id'];

//Delete empty notes in the users database
$sql = "DELETE FROM items WHERE item=''";
$result = mysqli_query($conn, $sql);

if(!$result){
    echo "<div>An error occured</div>";
    
    exit;
}



//run a query to look for notes corresponding to user_id
$sql = "SELECT * FROM notes WHERE user_id='$user_id' ORDER BY TIME DESC";



//show notes or alert message

if($result = mysqli_query($conn, $sql)){
    
    if($row = mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $item_name = $row['item'];
            $priority = $row['priority'];
            $item_id = $row['item_id'];
        
          
        }
        
    }else{
            echo "<div>You have not created any notes yet</div>";
    }
    
}else{
        echo "<div>An error occured</div>";
//    echo "ERROR unable to execute $sql. ". mysqli_error($conn);
    exit;
}




?>