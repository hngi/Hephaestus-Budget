<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <div class="signup">

            <div class="header">
                <h2>SIGN UP HERE</h2>
            </div>

            <form action="signup.php" method="post">

            <?php include('errors.php') ?>

                <div class="formp">
                    <label for="username"><br><i class="fas fa-user"></i>Username</label><br>
                    <input type="text" name="username" required>
                </div>

                <div class="formp">
                    <label for="email"><br><i class="fas fa-envelope"></i>Email</label><br>
                    <input type="email" name="email"  required>
                </div>
                

                <div class="formp">
                    <label for="password"><br><i class="fas fa-lock"></i>Password</label><br>
                    <input type="password" name="password"  required>
                </div>

                <div class="formp">
                    <label for="password"><br><i class="fas fa-lock"></i>Confirm Password</label><br>
                    <input type="password" name="password_2" required>
                </div>
        
                <div class="signup-btn">
                    <button type="submit" name="reg_user" class="submit" >Create Account</button>
                </div>

                <p> Have An Account Already? <a href="login.php">Click To Login </a></p>

            </form>

        </div>
        
    </body>
</html>