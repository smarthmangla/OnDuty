<?php

session_start();

$code = "";

if (isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["code"] == $_POST["captcha"]) {
    $con = mysqli_connect("localhost", "root", "");
    if (!$con) {
        die('Could not connect: ' . mysqli_connect_error());
    } else {
    }

    //Database Selection
    if (mysqli_select_db($con, "CivilDisobedience")) {
    } else {
        die("Error in Selecting the Database <br>" . mysqli_errno($con));
    }

    $mysql = "UPDATE Complaints SET Complaint_Verified= true WHERE Complaint_Verified=false";

    if (!mysqli_query($con, $mysql)) {
        die('Error: ' . mysqli_error($con));
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap cs -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">

        <style>
            #emblem {
                margin-left: 2.5em;
                width: 80%;
            }
        </style>
        <title>Confirmartion</title>
        <style>
            <?php include 'conformation.css' ?>
        </style>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light my_nav sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="./admin.php"><strong>OnDuty Admin</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Newsfeed.php">Newsfeed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./hotspot.php">Hotspots</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./stats.php">Statistics</a>
                        </li>
                    </ul>
                    <div class="d-flex mx-2">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Notificatons
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Notification 1</a></li>
                                    <li><a class="dropdown-item" href="#">Notification 2</a></li>
                                    <li><a class="dropdown-item" href="#">Notification 3</a></li>
                                </ul>
                            </li>
                        </ul>
                        <button class="btn btn-light mx-1" type="submit"><a class="text-dark" href="./logout.php">Logout</a></button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- content -->
        <div class="container">
            <div class="row mt-5 mb-5 align-items-center">
                <div class="col-lg-8 col-md-8">
                    <div class="card bx">
                        <div class="card-body">
                            <div class="card-title">
                                <h2 class="fw-bold">Confirmation</h2>
                                <br>
                                <h4 class="animation a2">Hey, Your complaint is successfully filed with the portal with:<br><b>Reference Id: 454454525145</b>
                                    We will take neccessary action and get back to you as soon as possible.
                                    You would be notified when a officer would be assigned to your case.</h4>
                                <div>
                                    <a href="./index.php">
                                        <button class="btn btn-lg btn-primary">Back to Home Page</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="container">
                        <img src="./IndianEmblem.jpg" alt="Indian Emblem" id="emblem">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

    include 'db.php';

    session_destroy();
} else {
    header('location: complaint.php');
}

?>