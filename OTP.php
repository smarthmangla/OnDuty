<?php
error_reporting(E_ERROR | E_PARSE);

$con = mysqli_connect("localhost", "root", "", "CivilDisobedience");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $img_name = $_FILES['file']['name'];
    $img_size = $_FILES['file']['size'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            header("Location: index.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "INSERT INTO images(image_url) 
                                        VALUES('$new_img_name')";
                mysqli_query($con, $sql);
            } else {
                $em = "You can't upload files of this type";
                header("Location: index.php?error=$em");
            }
        }
    }
    $First_Name = $_POST['name'];
    $Email_Address = $_POST['email'];
    $Phone_Number = $_POST['phoneNumber'];
    $Aadhar_Number = $_POST['aadharNumber'];
    $Complaint_Address = $_POST['address'];
    $Complaint_City = $_POST['city'];
    $Complaint_Desc = $_POST['crimeDesc'];
    $Complaint_Proof = $_POST['complaintProof'];
    $Complaint_Verified = false;


    $insertNewComplaint = "insert into Complaints (First_Name , Email_Address, Phone_Number, Aadhar_Number, Complaint_Address, Complaint_City, Complaint_Desc, Complaint_Proof, Complaint_Verified) values
( '$First_Name', '$Email_Address', '$Phone_Number', '$Aadhar_Number', '$Complaint_Address', '$Complaint_City', '$Complaint_Desc', '$new_img_name', '$Complaint_Verified'); ";

    $run = mysqli_query($con, $insertNewComplaint);

    if (!$run) {
        die('Error: ' . mysqli_error($con));
    }

    session_start();

    $code = rand(100000, 999999);
    $_SESSION["code"] = $code;

    require 'PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->SMTPAuth = TRUE;

    $mail->Username = "thecivilmisconductforum@gmail.com";
    $mail->Password = "19BITUSKY";

    $mail->SMTPSecure = "false";
    $mail->Port = 587;


    $mail->From = "thecivilmisconductforum@gmail.com";
    $mail->FromName = "OSP Project";

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = "OTD Complaint Form OTP";
    $mail->Body = "<i>Your One Time Password is: </i>" . $code;
    $mail->AltBody = "OTP: ";
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {

        $Complaint_Verified = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
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
			<a class="navbar-brand" href="./admin.php"><strong>OnDuty Admin</strong></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="./index.php">Home</a>
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
                            <p class="card-text text-muted">Please, Enter the OTP send to the registered email<?php echo $Email_Address ?></p>
                            <form action="OTP2.php" method="post" class="mt-5">
                                <div class="mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="Enter OTP" name="captcha">
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
					<img src="./IndianEmblem.jpg" alt="Indian Emblem" id="emblem">
				</div>
			</div>
        </div>
    </div>

    <!-- footer -->
	<footer class="mt-5 my_footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<h3>OnDuty</h3>
					<p>Your Safety, Our Priority.</p>
				</div>
				<div class="col-lg-4 col-md-4">
					<h4>Contact Us </h4>
					<p><Strong>Email : </Strong> otd@gmail.com</p>
					<p><strong>Call us : </strong> +91 123456</p>
					<h4>About Us </h4>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus veritatis, sunt rerum velit eaque earum ex</p>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="copy text-center">
					<p><small>Copyright &copy; 2020. All Rights Reserved</small></p>
				</div>
			</div>
		</div>
	</footer>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>