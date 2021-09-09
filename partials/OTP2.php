<?php
session_start();

$code = "";

if (isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["code"] == $_POST["captcha"]) {

    $con = mysqli_connect("localhost", "root", "Smarthyoyo9873");
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Confirmartion</title>
        <style>
            #emblem {
                margin-left: 2.5em;
                width: 80%;
            }
        </style>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light my_nav sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="../pages/admin.php"><strong>OnDuty Admin</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        </li>
                    </ul>
                    <div class="d-flex mx-2">
                        <button class="btn btn-light mx-1" type="submit"><a class="text-dark" href="./logout.php">Logout</a></button>
                    </div>
                </div>
            </div>
        </nav>


        <div class="container main_container">
            <div class="row my-5 justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <div class="card-title py-3">
                                <h1>Confirmation</h1>
                            </div>
                            <div class="card-text">
                                <h3>Hey, Your complaint is successfully filed with the portal.
                                    We will take neccessary action and get back to you as soon as possible.
                                    You would be notified when a officer would be assigned to your case.</h3>
                            </div>
                            <a href="../index.php" class="btn btn-primary">Back to Home Page</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="container">
                        <img src="../images/IndianEmblem.jpg" alt="Indian Emblem" id="emblem">
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php include('./footer.php') ?>

        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>

    </html>

<?php
    include 'db.php';
    session_destroy();
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <title>OTP</title>
        <style>
            #emblem {
                margin-left: 2.5em;
                width: 80%;
            }
        </style>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light my_nav sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="../pages/admin.php"><strong>OnDuty Admin</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        </li>
                    </ul>
                    <div class="d-flex mx-2">
                        <button class="btn btn-light mx-1" type="submit"><a class="text-dark" href="./logout.php">Logout</a></button>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container main_container">
            <div class="row my-5 justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <div class="card-title py-3">
                                <h1>OTP Confirmation</h1>
                                <p class="card-text">Incorrect OTP entered</p>
                                <form action="conformation.php" method="post" class="mt-5">
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-lg" placeholder="Enter OTP" name="captcha" required>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-block">CONFIRM</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="container">
                        <img src="../images/IndianEmblem.jpg" alt="Indian Emblem" id="emblem">
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php include('./footer.php') ?>

        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } ?>