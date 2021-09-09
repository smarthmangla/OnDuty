<?php
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

    $mysql = "delete from Complaints where Complaint_Verified = false";

    if (!mysqli_query($con, $mysql)) {
        die('Error: ' . mysqli_error($con));
    }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Misconduct Addressal Page</title>
	<!-- Bootstrap cs -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    
    <style>
        #emblem {
			margin-left: 2.5em;
			width: 80%;
		}
    </style>
</head>

<body>

	<!-- Navbar -->
	<?php include('../partials/navbar.php') ?>

	<!-- Login Form -->
	<div class="container">
		<div class="row mt-5 mb-5 align-items-center">
			<div class="col-lg-8 col-md-8">
				<div class="card bx">
					<div class="card-body">
						<div class="card-title">
							<h2>Welcome to the Public Misconduct Forum</h2>
							<h4 class="card-text text-muted">Please Enter Your Complaint Details</h4>
							<form action="../partials/OTP.php" method="post" enctype="multipart/form-data" id="form">
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="name" id="user" placeholder="Name" required>
									<small></small>
								</div>
								<div class="mb-3">
									<input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required>
									<small></small>
								</div>
								<div class="mb-3">
									<input type="number" class="form-control form-control-lg" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" required>
									<small></small>
								</div>
								<div class="mb-3">
									<input type="number" class="form-control form-control-lg" name="aadharNumber" id="aadharNumber" placeholder="Aadhar Number" required>
									<small></small>
								</div>
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="address" id="address" placeholder="Address" required>
									<small></small>
								</div>
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="city" id="city" placeholder="City" required>
									<small></small>
								</div>
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="crimeDesc" id="crimeDesc" placeholder="MisConduct Addressal" required>
									<small></small>
								</div>
									<label for="upload" class="mb-3">
										<input type="file" class="form-control form-control-lg" name="file">
									</label>
								<div class="col-4">
									<input type="submit" class="btn btn-success btn-block">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="container">
					<img src="../images/IndianEmblem.jpg" alt="Indian Emblem" id="emblem">
				</div>
			</div>
		</div>
    </div>

    <!-- footer -->
	 <?php include('../partials/footer.php') ?>


	 <!-- Bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>