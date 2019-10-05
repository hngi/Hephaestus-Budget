<?php
session_start();
require("db.php");
function clean_data($data)
{
    return stripslashes(strip_tags(trim($_POST[$data])));
}

if (isset($_POST['signup']) && !empty($_FILES["user_image"]["name"])) {

    $name = clean_data('name');
    $email = clean_data('email');
    $pass = clean_data('pass');
    $rpass = clean_data('rpass');

    $validated = true;
    $uploadOk = 1;


    if (!empty($name) && !empty($email) && !empty($pass) && !empty($rpass) && !empty($_FILES["user_image"]["name"])) {
        $color = "danger";

        //check if email is already taken
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

        $imgName = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        // upload directory
        $target_dir = 'user_uploads/';

        $target_file = $target_dir . basename($_FILES["user_image"]["name"]);

        // get image extension
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            $msg = "Sorry, file already exists";
            $color = "warning";
            $uploadOk = 0;
        }

        // Check file size -- Set for 1MB
        if ($_FILES["user_image"]["size"] > 1000000 || $_FILES["user_image"]["size"] == 0) {
            $msg = "Only files smaller than 1MB can be uploaded";
            $color = "danger";
            $uploadOk = 0;
        }


        // valid image extensions
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $msg = "Only JPEG, JPG, PNG & GIF files are allowed";
            $color = "warning";
            $uploadOk = 0;
        }

        if ($validated == true && $uploadOk != 0 && !isset($msg)) {
            $pass = md5($rpass);

            if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {
                $new_user_query =  mysqli_query($conn, "INSERT INTO registered_user(`name`, `email`, `password`, `image`) VALUES('$name', '$email',  '$pass', '$imgName')");

                if ($new_user_query == TRUE) {
                    $name = $email = "";
                    $msg = "Your registration was successful, you can login to your account";
                    $color = "success";
                } else {
                    $msg = "An error was encountered during registration";
                }
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
