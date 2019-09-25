<?php include_once("./validations/auth.php") ?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <title>HephBudget | Sign up</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <!-- uikit -->
    <link rel="stylesheet" href="assets/css/uikit/css/uikit.almost-flat.min.css" />
    <!-- altair admin login page -->
    <link rel="stylesheet" href="assets/css/login_page.min.css" />
</head>

<body class="login_page">
    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <?php if (isset($fbk)) : ?>
                <div class="md-card-content small-padding uk-text-center uk-alert uk-alert-<?php echo $fbk["color"]; ?>">
                    <small> <?php echo $fbk["msg"]; ?></small>
                </div>
            <?php endif; ?>
            <div class="md-card-content large-padding" id="register_form">
                <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
                <form method="post">
                    <div class="uk-form-row">
                        <label for="register_username">Full name</label>
                        <input class="md-input" type="text" id="register_username" name="name" value="<?php echo isset($name) ? $name : '' ?>" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_email">E-mail</label>
                        <input class="md-input" type="text" id="register_email" name="email" value="<?php echo isset($email) ? $email : '' ?>" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_password">Password</label>
                        <input class="md-input" type="password" id="register_password" name="pass" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_password_repeat">Repeat Password</label>
                        <input class="md-input" type="password" id="register_password_repeat" name="rpass" />
                    </div>

                    <div class="uk-margin-medium-top">
                        <button name="signup" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="uk-margin-top uk-text-center">
            <a href="login.php">Login</a>
        </div>
    </div>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="assets/js/altair_admin_common.min.js"></script>
    <!-- altair login page functions -->
    <script src="assets/js/pages/login.min.js"></script>
</body>

</html>