<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Authentication</title>
    </head>
    <body>
        <div class="login">

            <div class="header">
                <h2>LOGIN HERE</h2>
            </div>

            <form action="login.php" method="post">

                <div class="formp">
                    <label for="username"><br><i class="fas fa-user"></i>Username</label><br>
                    <input type="text" name="username" id="username" required>
                </div>
                

                <div class="formp">
                    <label for="password"><br><i class="fas fa-lock"></i>Password</label><br>
                    <input type="password" name="password" id="password" required>
                </div>
        
                <div class="login-btn">
                    <button type="submit" name="login_user" class="submit" id="submit">Login</button>
                </div>

                <p> No Account With Us? <a href="signup.php">Click To Create One</a></p>

            </form>

        </div>
        
    </body>
</html>