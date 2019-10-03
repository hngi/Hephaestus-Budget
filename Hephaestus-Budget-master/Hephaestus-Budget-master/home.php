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

<nav class="navbar navbar-expand-lg head">
        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <p class="m-0"><a href="./" class="nav-link hephbrand text-light h5 font-weight-bold"
                style="color: inherit">HephBudget</a></p>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-light font-weight-bold" href="index.php">Home </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        About</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">About Us</a>
                        <a class="dropdown-item" href="#">FAQ</a>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled text-light font-weight-bold contact" href="#">Contact</a>
                </li>
            </ul>
            <form method="post"><small class=" text-light font-weight-bold position-relative mr-1"
                    style="font-size: 14px; top: 1px">Hello <?php echo $user['name'] ?> </small>
                <button name="logout" type="submit" class="btn badge badge-danger p-2"> <i
                        class="fa fa-power-off"></i></button></form>
        </div>
    </nav>

    <div class="position-absolute w-100 h-100" style="top: 0">
        <div class="d-md-flex justify-content-center pt-5 my-5">
            <div class="input col-md-5 col-sm-12">
                <div class="values pt-3">
                    <p class="mb-0 pb-2">Enter Total Amount</p>
                    <input class="amount" type="number">
                </div>
                <div class="items-container px-3 pb-3">
                    <div>
                        <p class="py-3">Allocate percentages for each priority</p>
                        <div class="all">
                            <div class="alloc">
                                <p>High</p>
                                <input class="first form-control" type="number">
                            </div>
                            <div class="alloc px-5">
                                <p>Medium</p>
                                <input class="first form-control" type="number">
                            </div>
                            <div class="alloc">
                                <p>Low</p>
                                <input class="first form-control" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="items pt-2">
                        <div class="item" id="item">
                            <p>Item</p>
                            <p class="pri mr-5">Priority</p>
                        </div>
                    </div>
                    <div class="icon">
                        <ion-icon class="add-icon" name="add-circle"></ion-icon>
                    </div>
                    <div class="recover">
                        <button id="recover" class="btn btn-info mx-2">Recover item</button>
                    </div>
                    <div class="calc d-flex justify-content-center mt-5">
                        <button id="clear" class="btn btn-dark mx-2">Clear items</button>
                        <button id="cal" class="btn btn-info mx-2">Calculate</button>
                    </div>
                </div>
            </div>
            <div class="display col-md-6">
                <div class="graph pt-2">
                    <p>Total Budget:</p>
                    <p class="amount-showing">₦0.00</p>
                </div>
                <div class="breakdown">
                    <p>Budget Breakdown</p>
                    <div id="breakdown">
                    </div>
                    <div class="remaining"><span class="span"></span></div>
                </div>
            </div>
        </div>
        <div class="footer w-100 font-weight-bold text-center">
            &COPY; HephBudget 2019.
        </div>
    </div>


    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script type="text/javascript" src="assets/js/calculator.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>