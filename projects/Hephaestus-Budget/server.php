<?php

session_start(); 

//initialising variables

$username ="";
$email ="";

$errors = array();

//connecting to database
$db = mysqli_connect('localhost', 'root', '', 'hng') or die("could not connect to database");

//registering users

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

//validating form

if (empty($username)) {array_push($errors, "Username Is Required!"); }
if (empty($email)) {array_push($errors, "Email Is Required!"); }
if (empty($password)) {array_push($errors, "Password Is Required!"); }
if ($password != $password_2) {array_push($errors, "Passwords Do Not Match!"); }

//check database for existing user with same username

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user) {

    if($user['username'] === $username) {
        array_push($errors, "Username Already Exists");
    }

    if($user['email'] === $email) {
        array_push($errors, "Email Id Has A Registered Username");
    }

}

// registering the user if there's no error

if(count($errors) == 0) {

    $password = md5($password); //for the password encryption
    print $password;
    $query = "INSERT INTO user (username, email, password) 
            VALUES ('$username', '$email', '$password')";

    mysqli_query($db,$query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You Have Successfully Logged In";

    header('location: home.php');

}

// logging in the user

if(isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username)) {
        array_push($errors, "Username Is Required");
    }

    if(empty($password)) {
        array_push($errors, "Password Is Required");
    }

    if(count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password' ";

        $results = mysqli_query($db, $query);

        if(mysqli_num_rows(results)) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "User Logged In Successfully!";

            header('location: home.php');
        } else {
            array_push($errors, "Incorrect Username Or Password. Please Try Again!");
        }
    }
}

?>