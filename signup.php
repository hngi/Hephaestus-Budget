<?php include_once("./validations/auth.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Hephbudget | Sign up</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <div class="container m-0 p-0">
        <img class="position-fixed greenbg" src="assets/images/green.png" alt="" />
        <img class="position-fixed whitebg" src="assets/images/white.png" alt="" />
    </div>
    <p class="p-2 m-0"><a href="./" class="nav-link hephbrand text-light h5 font-weight-bold" style="color: inherit">HephBudget</a></p>
    <div class="d-flex position-absolute justify-content-center  align-items-center w-100 h-100">
        <div class="col-md-5">
            <form method="post" class="px-4 py-3 form" enctype="multipart/form-data">
                <h5 class="text-center pb-2" style="color: #298b92;">Create an Account</h5><br/>
                <?php if (isset($fbk)) : ?>
                    <div class="alert alert-<?php echo $fbk["color"]; ?>">
                        <small> <?php echo $fbk["msg"]; ?></small>
                    </div>
                <?php endif; ?>

                <div class="form-group mb-4">
                <label id="name-label" style="color: #298b92;">Name</label>
                    <input name="name" type="text" placeholder="Jennifer Thompson" class="form-control" value="<?php echo isset($name) ? $name : '' ?>" />
                </div>

                <div class="form-group mb-4">
                <label id="email-label" style="color: #298b92;">Email</label>
                    <input name="email" type="email" placeholder="xyz@gmail.com " class="form-control" value="<?php echo isset($email) ? $email : '' ?>" />
                </div>

                <div class="form-group mb-4">
                <label id="pass-label" style="color: #298b92;">Password</label>
                    <input name="pass" type="password" placeholder="********" class="form-control" />
                </div>

                <div class="form-group mb-4">
                <label id="cpass-label" style="color: #298b92;">Confirm Password</label>
                    <input name="rpass" type="password" placeholder="********" class="form-control" />
                </div>

                <div class="form-group mb-4">
                <label id="image-label" style="color: #298b92;">Upload Image</label>
                    <input name="user_image" type="file"  class="form-control" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="signup">Sign up</button>
                </div>
            </form>
            <section class="mt-3 text-center">
                <a href="login.php" class="btn-title">Login to your account</a>
            </section>
        </div>
    </div>
    <div class="footer">
        &COPY; HephBudget 2019.
    </div>
</body>

</html>