<?php
session_start();
if (isset($_SESSION['user'])) {
  header("location: home.php");
}
?>
<!DOCTYPE html>
<html class="no-js">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>HephBudget</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <nav class="d-flex justify-content-between p-3 hephnav">
    <p class="h3 font-weight-bold text-info m-0" id="heph">HephBudget</p>
    <div>
      <a href="login.php" class="btn btn-sm btn-info">Login</a>
      <a href="signup.php" class="btn btn-sm btn-info">Sign up</a>
    </div>
  </nav>
  <div id="intro" class="px-3 py-3">
    <div class="container cl">
      <div class="text-center">
        <img src="assets/images/budgetApp.png" alt="finance illustration" id="heph_img" />
        <p class="h5 text-light heph-small">Create budgets with ease.</p>
      </div>
    </div>
  </div>
  <div>
    <p class="h3 text-center my-4">
      FEATURES
    </p>
    <div class="features-row">
      <div class="inner-feature">
        <img src="assets/images/calc.png" />
        <p>
          Easily create budgets based on priorities set on each item.
        </p>
      </div>
      <div class="inner-feature">
        <img src="assets/images/mobile.png" />
        <p>Easy access on multiple devices</p>
      </div>
    </div>
  </div>
  <section id="hephbot" class="bg-dark text-center text-light pt-3 pb-0">
    <p class="m-0 h4">Download HephBudget ChatBot for android</p>
    <img src="assets/images/playstore.png" height="70" />
  </section>

  <p class="m-0 mt-5 font-weight-bold text-center" style="color: #298b92;"> &copy; HephBudget 2019.</p>
</body>

</html>