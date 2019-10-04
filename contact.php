
<!DOCTYPE html>
<html>
<head>
 <title>Hephaestus contact page</title>
 <link rel="stylesheet" type="text/css" media="screen" href="contact.css"/>
 <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
 <link rel="stylesheet" href="assets/css/style.css" />
  
</head>
 <body>
 <script type="text/javascript">
   function validateForm() {
   var email = document.forms["regForm"]["email"];
   if (email.value == "") {
   alert("Please input your email address");
   email.focus();
   return false;
   }
   var name = document.myform.full_name;
   if (name.value == "") {
   alert("Please input your full name");
   number.focus();
   return false;
   }
   var title = document.regForm.title;
   if (title.value == "-1") {
   alert("Please select your title");
   return false;
   }
   return true;
   }
   </script>
<?php include("partials/navigation.php"); ?>
<form method="POST" name="regForm" onsubmit="return validateForm()">
    <form>
        <div class="content">
 <label for="Title">Title:</label>
 <select name="Title">
    <option value="Ms">Ms</option>
    <option value="Mr">Mr</option>
    <option value="Mrs">Mrs</option>
    </select>
 <br>
 <label for="full_name">Name:</label>
 <input type="text" name="full_name" id="full_name">
 <br>
 <label for="email">Email:</label>
 <input type="email" name="Email"id="email">
 <br>
 <label for="message">Message:</label><br>
 <textarea name="message" id="message" cols="50" rows = "5" placeholder = "message here"></textarea> 
 <br>
 <input type="submit" name="submit" value="submit" >
</div>
 </form>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
 integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
 crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
 crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
 integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
 crossorigin="anonymous"></script>

</body>
</html>
