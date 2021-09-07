<?php
error_reporting(E_ERROR | E_PARSE);
include_once('db.php');
?>
<?php
$sql = "SELECT * FROM `newsfeed`";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
?>
<?php
$sqlbrib = "SELECT * FROM `newsfeed` where Crime_Name='Bribery'";
$resultbrib = mysqli_query($con, $sqlbrib);
$numbrib = mysqli_num_rows($resultbrib);
?>
<?php
$sqlCusto = "SELECT * FROM `newsfeed` where Crime_Name='Custodial'";
$resultCusto = mysqli_query($con, $sqlCusto);
$numcusto = mysqli_num_rows($resultCusto);
?>
<?php
$sql1 = "SELECT * FROM `newsfeed` where Crime_Name='Ignorance'";
$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);
?>
<?php
$sql2 = "SELECT * FROM `newsfeed` where Crime_Name='Manipulation'";
$result2 = mysqli_query($con, $sql2);
$num2 = mysqli_num_rows($result2);
?>
<?php
$sql3 = "SELECT * FROM `newsfeed` where Crime_Name='Detention'";
$result3 = mysqli_query($con, $sql3);
$num3 = mysqli_num_rows($result3);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin NewsFeed</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="admin_logo.png" />

	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<!-- bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<!-- End import lib -->

	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" type="text/css" href="./styles.css">
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
		<h1 class="text-center my-3 fw-bold">NewsFeed Information - News and OverAll Details</h1>
		<hr class="mb-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<!-- newsfeed -->
					<h1 class="news_head py-2">Latest News</h1>
					<?php
					while ($row = mysqli_fetch_assoc($result)) {
						echo '
						<div class="list-group">
							<div class="list-group-item list-group-item-action my-2 news_list" aria-current="true">
								<div class="row">
									<div>
										<h5 class="mb-2">' . $row['News_id'] . '. ' . $row['Crime_Desc'] . '</h5>
									</div>
									<div class="d-flex w-100">
										<p class="mb-1 flex-grow-1">' . $row['Crime_Name'] . '</p>
										<small>Likes ' . $row['likes'] . '</small>
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
						<div class="card news_det mb-2">
							<div class="card-body">
								<h3 class="card-title">Bribery News</h3>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<h6>Cases Count : <?php echo $numbrib; ?></h6>
							</div>
						</div>
						<div class="card news_det mb-2">
							<div class="card-body">
								<h3 class="card-title">Custodial Torture News</h3>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<h6>Cases Count : <?php echo $numcusto; ?></h6>
							</div>
						</div>
						<div class="card news_det mb-2">
							<div class="card-body">
								<h3 class="card-title">Ignorance of Complaint</h3>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<h6>Cases Count : <?php echo $num1; ?></h6>
							</div>
						</div>
						<div class="card news_det mb-2">
							<div class="card-body">
								<h3 class="card-title">Manipulation of Evidence</h3>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<h6>Cases Count : <?php echo $num2; ?></h6>
							</div>
						</div>
						<div class="card news_det mb-2">
							<div class="card-body">
								<h3 class="card-title">Illegal Detention</h3>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<h6>Cases Count : <?php echo $num3; ?></h6>
							</div>
						</div>
					</aside>
					<hr>
					<h1 class="my-3">NewsFeed Form</h1>
					<form class="mb-3" action="Newsfeed.php" method="post">
						<div class="mb-3">
							<label for="newsid" class="form-label">Reference ID</label>
							<input type="text" class="form-control" id="newsid" name="newsid" required>
						</div>
						<div class="mb-3">
							<label for="crimename" class="form-label">Crime Name</label>
							<input type="text" class="form-control" id="crimename" name="crimename" required>
						</div>
						<div class="mb-3">
							<label for="crimedesc" class="form-label">Crime Description</label>
							<input type="text" class="form-control" id="crimedesc" name="crimedesc" required>
						</div>
						<div class="mb-3">
							<label for="likes" class="form-label">Likes</label>
							<input type="number" class="form-control" id="likes" name="likes" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					<?php
						error_reporting(E_ERROR | E_PARSE);
						$Crime_Name = $_POST['crimename'];
						$Crime_Desc = $_POST['crimedesc'];
						$likes = $_POST['likes'];
						$News_id = $_POST['newsid'];
						$insertNewComplaint = "INSERT IGNORE INTO NewsFeed(Crime_Name, Crime_Desc, likes, News_id) values ( '$Crime_Name', '$Crime_Desc', '$likes', '$News_id')";
						$run = mysqli_query($con, $insertNewComplaint);
						if (!$run) {
							die('Error: ' . mysqli_error($con));
						}
					?>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
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

	<!-- import script -->
	<!-- Bootstrap js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<!-- end import script -->
</body>

</html>