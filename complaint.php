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
    <link rel="stylesheet" href="styles.css">
    
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

	<!-- Login Form -->
	<div class="container">
		<div class="row mt-5 mb-5 align-items-center">
			<div class="col-lg-8 col-md-8">
				<div class="card bx">
					<div class="card-body">
						<div class="card-title">
                            <h2>Welcome to the Public Misconduct Forum</h2>
                            <h4 class="card-text text-muted">Please Enter You're Complaint Details</h4>
							<form action="OTP.php" method="post" enctype="multipart/form-data">
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="name" placeholder="Name" required>
								</div>
								<div class="mb-3">
									<input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required>
								</div>
								<div class="mb-3">
									<input type="number" class="form-control form-control-lg" name="phoneNumber" placeholder="Phone Number" required>
								</div>
								<div class="mb-3">
									<input type="number" class="form-control form-control-lg" name="aadharNumber" placeholder="Aadhar Number" required>
								</div>
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="address" placeholder="Address" required>
								</div>
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="city" placeholder="City" required>
								</div>
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="crimeDesc" placeholder="MisConduct Addressal" required>
								</div>
                                <label for="upload" class="mb-3">
                                    <input type="file" class="form-control form-control-lg" name="file" required>
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
					<img src="./IndianEmblem.jpg" alt="Indian Emblem" id="emblem">
				</div>
			</div>
		</div>
    </div>

    <!-- footer -->
	<footer class="mt-3 my_footer">
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


    <!-- Bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>