<?php
include('../partials/db.php');
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

	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body class="overlay-scrollbar">
	<!-- Navbar -->
	<?php include('../partials/navbar.php') ?>
	<?php
	if (!$_SESSION['auth']) {
		header('location:../partials/login.php');
	}
	?>

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
									<img src="../images/IndianEmblem.jpg" class="complaint_img" alt="complaint proof">
								</div>
								<div class="col-lg-9 col-md-9">
									<div class="d-flex w-100">
										<h5 class="mb-1 flex-grow-1">Ref. ID(' . $row['Reference_id'] . ') ' . $row['First_Name'] . '</h5>
										<small>Phone - ' . $row['Phone_Number'] . ' / Email - ' . $row['Email_Address'] . ' / Aadhar No - ' . $row['Aadhar_Number'] . '</small>
									</div>
									<p class="mb-1">' . $row['Complaint_Desc'] . '</p>
									<small>Complaint Location - ' . $row['Complaint_City'] . ' ' . $row['Complaint_Address'] . '</small>
									<div class="d-flex justify-content-between">
										<div class="mt-2">
											<small>Complaint Status - ' . $row['Complaint_Status'] . '</small>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					';
				}
				?>
			</div>
			<div class="col-lg-4 col-md-4">
				<div>
					<h3 class="py-1 stats_head">Update Status</h3>
					<form action="admin.php" method="post">
						<div class="input-group mb-2">
							<span class="input-group-text">Reference Id</span>
							<input type="number" class="form-control" name="ref_id">
						</div>
						<select class="form-select mb-3" name="status" id="status">
							<option selected disabled>Update Status</option>
							<option value="Submitted">Submitted</option>
							<option value="Processed">Processed</option>
							<option value="Running">Running</option>
							<option value="Closed">Closed</option>
						</select>
						<button class="btn btn-primary" type="submit">Update</button>
					</form>
					<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$Complaint_id = $_POST['ref_id'];
						$Complaint_status = $_POST['status'];
						$updateStatus = "UPDATE `complaints` SET `Complaint_Status` = '$Complaint_status' WHERE `complaints`.`Reference_id` = '$Complaint_id'";
						$run = mysqli_query($con, $updateStatus);
						if (!$run) {
							die('Error: ' . mysqli_error($con));
						}
						echo '
						<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
							<strong>Success!</strong> Complaint Status has been updated in Database
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						';
					}
					?>
				</div>
				<hr>
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
	<?php include('../partials/footer.php') ?>

	<!-- Bootstrap js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>