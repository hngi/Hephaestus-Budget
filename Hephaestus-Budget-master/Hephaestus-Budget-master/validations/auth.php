<?php
session_start();
require("db.php");
function clean_data($data)
{
    return stripslashes(strip_tags(trim($_POST[$data])));
}

if (isset($_POST['signup'])) {
    $name = clean_data('name');
    $email = clean_data('email');
    $pass = clean_data('pass');
    $rpass = clean_data('rpass');
    $validated = true;
    if (!empty($name) && !empty($email) && !empty($pass) && !empty($rpass)) {
        $color = "danger";
        //check if username is already taken

        $user_exists = mysqli_query($conn, "SELECT  `email` FROM registered_user WHERE `email` = '{$email}'");
        $count = mysqli_num_rows($user_exists);
        if ($count == "1") {
            $validated = false;
            $msg = "This email is already registered to an account on Hephbudget";
            $color = "info";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validated = false;
            $msg = "Enter a valid email address";
            $color = "warning";
        }

        if (strlen($pass) < 4 || strlen($rpass) < 4) {
            $validated = false;
            $msg = "Password must be minimum 4 characters";
            $color = "warning";
        }

        if ($pass !== $rpass) {
            $validated = false;
            $msg = "Passwords do not match";
            $color = "warning";
        }

        if ($validated == true) {
            $pass = md5($rpass);
            $new_user_query =  mysqli_query($conn, "INSERT INTO registered_user(`name`, `email`, `password`) VALUES('$name', '$email',  '$pass')");
            if ($new_user_query == TRUE) {
                $name = $email = "";
                $msg = "Your registration was successful, you can login to your account";
                $color = "success";
            } else {
                $msg = "An error was encountered on registration";
            }
        }
    } else {
        $validated = false;
        $msg = "All fields are required";
        $color = "warning";
    }
    $fbk = ["valitated" => $validated, "msg" => $msg, "color" => $color];
}

if (isset($_POST['login'])) {
    $email = clean_data('email');
    $pass = md5(clean_data('pass'));
    if (!empty($email) && !empty($pass)) {
        $login_query = mysqli_query($conn, "SELECT `id`, `email`, `password` FROM registered_user WHERE `email` = '{$email}' AND `password` = '{$pass}' ");
        $count = mysqli_num_rows($login_query);
        if ($count == "0") {
            $validated = false;
            $color = "danger";
            $msg = "Incorrect username or password";
        } else {
            $validated = true;
            $_SESSION['user'] = mysqli_fetch_assoc($login_query)['id'];
            header("location: home.php");
        }
    } else {
        $validated = false;
        $msg = "Enter email and password to login";
        $color = "warning";
    }
    $fbk = ["valitated" => $validated, "msg" => $msg, "color" => $color];
}

if (isset($_POST['reset_password'])) {
    $email = clean_data('email');
    $pass = md5(clean_data('pass'));
    $rpass = md5(clean_data('rpass'));
    if (!empty($email) && !empty($pass) && !empty($rpass)) {
        $validated = true;
        if (strlen($pass) < 4 || strlen($rpass) < 4) {
            $validated = false;
            $msg = "Password must be minimum 4 characters";
            $color = "warning";
        }

        if ($pass !== $rpass) {
            $validated = false;
            $msg = "Passwords do not match";
            $color = "warning";
        }

        if ($validated !== false) {
            $reset_query = mysqli_query($conn, "UPDATE registered_user SET `password` =  '{$pass}'  WHERE `email` = '{$email}'");
            if ($reset_query == true) {
                $msg = "Your password reset was successful, you can login to your account";
                $color = "success";
            } else {
                $msg = "An error was encountered on registration";
            }
        }
        $fbk = ["msg" => $msg, "color" => $color];
    }
}
