<?php
session_start();
if (!$_SESSION['auth']) {
	header('location:login.php');
}
?>
<?php
include_once('db.php');
?>
<?php
$sql = "SELECT * FROM `complaints`";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="admin_logo.png">

	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<!-- bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<!-- End import lib -->

	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body class="overlay-scrollbar">
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

	<!-- Main Content -->
	<div class="container-fluid main_container">
		<h1 class="text-center my-3 fw-bold">Complaints Information - Bulletin Board</h1>
		<hr>
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<!-- complaints info -->
				<?php
				while ($row = mysqli_fetch_assoc($result)) {
					echo '
					<div class="list-group">
						<div href="#" class="list-group-item list-group-item-action my_list-item my-2" aria-current="true">
							<div class="row">
								<div class="col-lg-3 col-md-3 text-center">
									<img src="IndianEmblem.jpg" class="complaint_img" alt="complaint proof">
								</div>
								<div class="col-lg-9 col-md-9">
									<div class="d-flex w-100">
										<h5 class="mb-1 flex-grow-1">Ref. ID(' . $row['Reference_id'] . ') ' . $row['First_Name'] . '</h5>
										<small>Phone - ' . $row['Phone_Number'] . ' / Email - ' . $row['Email_Address'] . ' / Aadhar No - ' . $row['Aadhar_Number'] . '</small>
									</div>
									<p class="mb-1">' . $row['Complaint_Desc'] . '</p>
									<small>Complaint Location - ' . $row['Complaint_City'] . ' ' . $row['Complaint_Address'] . '</small>
								</div>
							</div>
						</div>	
					</div>
					';
				}
				?>
			</div>
			<div class="col-lg-4 col-md-4">
				<aside>
					<ul class="list-group mb-3 mt-2">
						<li class="list-group-item active">Archives</li>
						<li class="list-group-item"><a href="#">2021</a></li>
						<li class="list-group-item"><a href="#">2020</a></li>
						<li class="list-group-item"><a href="#">2019</a></li>
					</ul>
				</aside>
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

	<!-- Bootstrap js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>