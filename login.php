<?php include_once("./validations/auth.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="google-signin-client_id" content="1289063844-s1lerd5lrbb8n2vnr0p1bcel8t448vsu.apps.googleusercontent.com">
    <meta name="google-signin-scope" content="profile email">
    <title>Hephbudget | Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <div class="container m-0 p-0">
        <img class="position-fixed greenbg" src="assets/images/green.png" alt="" />
        <img class="position-fixed whitebg" src="assets/images/white.png" alt="" />
    </div>
    <p class="p-2 m-0"><a href="index.php"class="nav-link hephbrand text-light h5 font-weight-bold" style="color: inherit">HephBudget</a></p>
    <div class="d-flex position-absolute justify-content-center  align-items-center w-100 h-100">
        <div class="col-md-5">
            <form method="post" class="px-4 py-3 form">
                <h5 class="text-center pb-2" style="color: #298b92;">Login to Hephbudget</h5>
                <?php if (isset($fbk)) : ?>
                    <div class="alert alert-<?php echo $fbk["color"]; ?>">
                        <small> <?php echo $fbk["msg"]; ?></small>
                    </div>
                <?php endif; ?>
                <div class="form-group mb-4">
                    <input name="email" type="email" placeholder="Email address " class="form-control" />
                </div>

                <div class="form-group mb-4">
                    <input name="pass" type="password" placeholder="Password" class="form-control" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="login" style="position: relative; top: -13px">Login</button>
                    <a href="password_reset.php" class="float-right text-info" style="font-size: 15px;">I forgot my password</a>
                    <div id="my-signin2" data-onsuccess="onSignIn" style="display: inline-block; position: relative; left: 40px;"></div>
                    <script>
                        function onSuccess(googleUser) {
                        console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
                        }
                        function onFailure(error) {
                        console.log(error);
                        }
                        function renderButton() {
                        gapi.signin2.render('my-signin2', {
                            'scope': 'profile email',
                            'width': 260,
                            'height': 35,
                            'longtitle': true,
                            'theme': 'light',
                            'onsuccess': onSuccess,
                            'onfailure': onFailure
                        });
                        var id_token = googleUser.getAuthResponse().id_token;
                        console.log("ID Token: " + id_token);
                        }
                    </script>
                    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
                    <div id="name"></div>
                    <script>startApp();</script>
                </div>
            </form>
            <section class="mt-3 text-center">
                <a href="signup.php" class="btn-title">Create an account</a>
            </section>
        </div>
    </div>
    <div class="footer">
        &COPY; HephBudget 2019.
    </div>
</body>

</html>
