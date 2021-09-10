<?php include('../partials/db.php') ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/styles.css">

	<title>Hello, world!</title>
	<style>
		#emblem {
			margin-left: 2.5em;
			width: 90%;
		}
	</style>
</head>

<body>
	<!-- Navbar -->
	<?php include('../partials/navbar.php') ?>

	<!-- Check Status -->
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-6 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h4>OnDuty</h4>
							<p class="card-text text-muted">Enter Your Complaint Reference ID</p>
							<form action="checkStatus.php" method="POST">
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="ref_id" placeholder="Reference ID" required>
								</div>
								<div class="col-4">
									<input type="submit" class="btn btn-success btn-block">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="my-3">
					<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$Complaint_id = $_POST['ref_id'];
						$sql = "SELECT * FROM `complaints` WHERE `Reference_id` = '$Complaint_id'";
						$run = mysqli_query($con, $sql);
						$num = mysqli_num_rows($run);
						if (!$run) {
							die('Error: ' . mysqli_error($con));
						}
						if($num == 0){
							echo '
							<div class="card mb-3" >
							<div class="row g-0">
								<div class="col-md-12">
									<div class="card-body">
										<div class="d-flex w-100">
											<h5 class="mb-3 flex-grow-1">Please Enter Correct Reference ID</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
							';
						}
						while ($row = mysqli_fetch_assoc($run)) {
							echo '
							<div class="card mb-3" >
							<div class="row g-0">
								<div class="col-md-12">
									<div class="card-body">
										<div class="d-flex w-100">
											<h5 class="mb-3 flex-grow-1">Ref. ID(' . $row['Reference_id'] . ') ' . $row['First_Name'] . '</h5>
											<small>Phone - ' . $row['Phone_Number'] . ' / Email - ' . $row['Email_Address'] . ' / Aadhar No - ' . $row['Aadhar_Number'] . '</small>
										</div>
										<p class="mb-3">' . $row['Complaint_Desc'] . '</p>
										<small>Complaint Location - ' . $row['Complaint_City'] . ' ' . $row['Complaint_Address'] . '</small>
										<div class="d-flex justify-content-between">
											<div class="mt-4">
												<small>Complaint Status - ' . $row['Complaint_Status'] . '</small>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						';
						}
					}
					?>
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
	<?php include('../partials/footer.php') ?>

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>