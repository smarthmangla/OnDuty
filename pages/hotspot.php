<?php
include_once('../partials/db.php');
error_reporting(E_ERROR | E_PARSE);
?>
<?php
$sql = "SELECT * FROM `hotspots`";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
?>
<?php
$sql1 = "SELECT * FROM `hotspots` where Crime_City='Chandigarh'";
$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);
?>
<?php
$sql2 = "SELECT * FROM `hotspots` where Crime_City='Delhi'";
$result2 = mysqli_query($con, $sql2);
$num2 = mysqli_num_rows($result2);
?>
<?php
$sql3 = "SELECT * FROM `hotspots` where Crime_City='Jharkhand'";
$result3 = mysqli_query($con, $sql3);
$num3 = mysqli_num_rows($result3);
?>
<?php
$sql4 = "SELECT * FROM `hotspots` where Crime_City='Telangana'";
$result4 = mysqli_query($con, $sql4);
$num4 = mysqli_num_rows($result4);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="admin_logo.png" />

	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<!-- bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<!-- End import lib -->

	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body class="overlay-scrollbar">

	<!-- Navbar -->
	<?php include('../partials/navbar.php') ?>

	<!-- Main content -->
	<div class="container-fluid main_container">
		<h1 class="text-center my-3 fw-bold">Hotspot Information</h1>
		<hr class="mb-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<!-- Hotspots Table -->
					<table class="table table-striped table-hover" style="font-size: 1.25em;">
						<thead>
							<tr class="table-dark">
								<th scope="col">#</th>
								<th scope="col">CITY</th>
								<th scope="col">PLACE</th>	
							</tr>
						</thead>
						<tbody>
						<?php
							while ($row = mysqli_fetch_assoc($result)) {
								echo '
									<tr>
										<th scope="row">'. $row['Hotspot_id']. '</th>
										<td>'.$row['Crime_City']. '</td>
										<td>'.$row['Crime_Places']. '</td>
									</tr>
								';
							}
						?>
						</tbody>
					</table>
				</div>
				<div class="col-lg-4 col-md-4">
					<aside>
						<h3 class="hotspot_head py-1">Hotspot Locations City-Wise</h3>
						<div class="card hotspot_det mb-2">
							<div class="card-body">
								<h3 class="card-title">Chandigarh</h3>
								<p class="card-text"><?php echo $num1; ?></p>
							</div>
						</div>
						<div class="card hotspot_det mb-2">
							<div class="card-body">
								<h3 class="card-title">Delhi</h3>
								<p class="card-text"><?php echo $num2; ?></p>
							</div>
						</div>
						<div class="card hotspot_det mb-2">
							<div class="card-body">
								<h3 class="card-title">Jharkhand</h3>
								<p class="card-text"><?php echo $num3; ?></p>
							</div>
						</div>
						<div class="card hotspot_det mb-2">
							<div class="card-body">
								<h3 class="card-title">Telangana</h3>
								<p class="card-text"><?php echo $num4; ?></p>
							</div>
						</div>
					</aside>
					<hr>
					<h1 class="my-3">HotSpot Form</h1>
					<form class="mb-3" action="hotspot.php" method="post">
						<div class="mb-3">
							<label for="hid" class="form-label">ID</label>
							<input type="text" class="form-control" id="hid" name="hid" required>
						</div>
						<div class="mb-3">
							<label for="crimecity" class="form-label">Crime City</label>
							<input type="text" class="form-control" id="crimecity" name="crimecity" required>
						</div>
						<div class="mb-3">
							<label for="crimeplaces" class="form-label">Crime Place</label>
							<input type="text" class="form-control" id="crimeplaces" name="crimeplaces" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					<?php
						error_reporting(E_ERROR | E_PARSE);
						$Crime_City = $_POST['crimecity'];
						$Crime_Places = $_POST['crimeplaces'];
						$Hotspot_id = $_POST['hid'];
						$insertNewComplaint = "INSERT IGNORE INTO Hotspots(Crime_City, Crime_Places, Hotspot_id) values ( '$Crime_City', '$Crime_Places', '$Hotspot_id')";
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
	<?php include('../partials/footer.php') ?>
	
	<!-- import script -->
	<!-- Bootstrap js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<!-- end import script -->
</body>

</html>