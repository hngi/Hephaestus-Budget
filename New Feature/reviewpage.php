<?php
    if($_POST) {
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $handle = fopen("comments.php", "a");
        fwrite($handle, "<b><i>" . $name . "</b></i> said:<br />" . $comment );
        fclose($handle);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Review And Comment Page</title>
</head>
<body>
  <script src="script.js"></script>
    
  <div class="stars" data-rating="3">
    <span class="heading">User Rating</span> <br>
    <p>Ratings And Reviews</p>
    <p>Give a Star rating and post a comment below</p>
    <span class="star">&nbsp;</span>
    <span class="star">&nbsp;</span>
    <span class="star">&nbsp;</span>
    <span class="star">&nbsp;</span>
    <span class="star">&nbsp;</span>
  </div> <hr>

  <h2>Post A Comment</h2>
  <div class="formp">
  <form action="" method="POST">
      Name: <br> <input type="text" name="name"> <br>
      Comment: <br> <textarea name="comment" id="" cols="30" rows="10"></textarea><br>
      <input type="submit" value="Post Comment">
  </form>
  </div>
  <hr>
  <h2>Other Comments</h2>
  <?php
      include "comments.php";
  ?>
</body>
</html>