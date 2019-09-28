<?php
session_start();
include_once("db.php");
if (!isset($_SESSION['user'])) {
    header("location: ./login.php");
} else {
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM registered_user WHERE id = {$_SESSION['user']}"));
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("location: login.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HephBudget</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/calculator.css" />
</head>

<body>

    <nav class="navbar head p-0 px-2 ">
        <p class="p-2 m-0">HephBudget</p>
        <form method="post"><b class=" text-light">Hello <?php echo $user['name'] ?> </b> 
        <button name="logout" type="submit" class="btn btn-sm bg-danger text-light"> <i class="fa fa-power-off"></i></button></form>
    </nav>

    <div class="position-absolute w-100 h-100" style="top: 0">
        <div class="d-md-flex justify-content-center pt-5 my-5">
            <div class="input col-md-4 col-sm-12">
                <div class="values pt-2">
                    <p>Enter Total Amount</p>
                    <input class="amount" type="number">
                </div>
                <div class="items-container px-3 pb-3">
                    <div class="items pt-2">
                        <div class="item id=" item">
                            <p>Item</p>
                            <!-- <input class="exp" type="text"> -->
                            <p class="pri">Priority</p>
                        </div>
                        <div class="item" id="0">
                            <!-- <p>Priority</p> -->
                            <input class="exp form-control mr-3" type="text">
                            <select class="in">
                                <option>Top</option>
                                <option>Medium</option>
                                <option>Low</option>
                            </select>
                            <ion-icon class="del" name="close-circle" id="del"></ion-icon>
                        </div>
                    </div>
                    <div class="icon">
                        <ion-icon class="add-icon" name="add-circle"></ion-icon>
                    </div>
                    <div class="calc">
                        <button id="cal" class="btn btn-sm btn-info">Calculate</button>
                    </div>
                </div>
            </div>
            <div class="display col-md-6 col-sm-12">
                <div class="graph pt-2">
                    <p>Total Budget:</p>
                    <p class="amount-showing">₦0.00</p>
                </div>
                <div class="breakdown">
                    <p>Budget allocation</p>
                    <div id="breakdown">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer w-100 font-weight-bold text-center">
            &COPY; HephBudget 2019.
        </div>
    </div>


    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script type="text/javascript" src="assets/js/calculator.js"></script>
</body>

</html>