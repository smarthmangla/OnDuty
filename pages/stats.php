<?php
error_reporting(E_ERROR | E_PARSE);
include_once('../partials/db.php');
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

	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body class="overlay-scrollbar">


	<!-- Navbar -->
	<?php include('../partials/navbar.php') ?>

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
	<?php include('../partials/footer.php') ?>

	
	<!-- import script -->
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<!-- end import script -->
</body>

</html>