<?php
error_reporting(E_ERROR | E_PARSE);
include_once('db.php');
?>
<?php
$sql = "SELECT * FROM `statistics_`";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="images/admin_logo.png" />

	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
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

	<!-- Main content -->
	<div class="container-fluid main_container">
		<h1 class="text-center my-3 fw-bold">Statistics Information</h1>
		<hr class="mb-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<!-- Stats Table -->
					<table class="table table-striped table-hover" style="font-size: 1.25em;">
						<thead>
							<tr class="table-dark">
								<th scope="col">#</th>
								<th scope="col">CRIME NAME</th>
								<th scope="col">CRIME STATS</th>
							</tr>
						</thead>
						<?php
						while ($row = mysqli_fetch_assoc($result)) {
							echo '
									<tr>
										<th scope="row">' . $row['Reference_ID'] . '</th>
										<td>' . $row['Crime_Name'] . '</td>
										<td>' . $row['Crime_Num'] . '</td>
									</tr>
								';
						}
						?>
						</tbody>
					</table>
				</div>
				<div class="col-lg-4 col-md-4">
					<h3 class="py-1 stats_head">New Crime Stats Form</h3>
					<form class="mb-3" action="stats.php" method="post">
						<div class="mb-3">
							<label for="refid" class="form-label">Reference Id</label>
							<input type="text" class="form-control" id="refid" name="refid" required>
						</div>
						<div class="mb-3">
							<label for="crimename" class="form-label">Crime Name</label>
							<input type="text" class="form-control" id="crimename" name="crimename" required>
						</div>
						<div class="mb-3">
							<label for="crimenum" class="form-label">Crime Number</label>
							<input type="text" class="form-control" id="crimenum" name="crimenum" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					<?php
					error_reporting(E_ERROR | E_PARSE);
					$Crime_Name = $_POST['crimename'];
					$Crime_Num = $_POST['crimenum'];
					$Reference_id = $_POST['refid'];
					$insertNewComplaint = "INSERT IGNORE INTO Statistics_ (Crime_Name, Crime_Num , Reference_id) values ( '$Crime_Name', '$Crime_Num', '$Reference_id')";
					$run = mysqli_query($con, $insertNewComplaint);
					if (!$run) {
						die('Error: ' . mysqli_error($con));
					}
					?>
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


	<!-- <div class="col-4 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Progress bar
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<div class="progress-wrapper">
							<p>
								Less than 1 hour
								<span class="float-right">50%</span>
							</p>
							<div class="progress">
								<div class="bg-success" style="width: 50%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								1 - 3 hours
								<span class="float-right">60%</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:60%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								More than 3 hours
								<span class="float-right">40%</span>
							</p>
							<div class="progress">
								<div class="bg-warning" style="width:40%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								More than 6 hours
								<span class="float-right">20%</span>
							</p>
							<div class="progress">
								<div class="bg-danger" style="width:20%"></div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
	</div>
	<!-- <div class="col-3 col-m-6 col-sm-6">
      <div class="counter bg-danger">
        <p>
          <i class="fas fa-bug"></i>
        </p>
        <h3>Project Status</h3>
        <form action="stats.php" method="post">
        <div class="contact-form">
          <div class="input-fields">
            Reference Id:
            <input name="refid"type="text" class="input">
            Crime Name:
            <input name="crimename"type="text" class="input" >
            Crime Number:
            <input name="crimenum" type="text" class="input" >
            <button href="stats.php">Submit</button>
          </form>
          </div>
        </div> -->
	</div>
	</div>
	</div>
	</div>
	<!-- end main content -->
	<!-- import script -->
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<!-- end import script -->
</body>

</html>