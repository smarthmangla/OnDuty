<!DOCTYPE html>
<html>

<head>
	<title>Admin Login Page</title>
	<!-- Bootstrap cs -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

	<style>
		body {
			background-color: #f8f8f8;
		}

		h4 {
			font-size: 2.5em;
		}

		p {
			font-size: 1.25em;
		}

		#emblem {
			margin-left: 2.5em;
			width: 80%;
		}

		a {
			text-decoration: none;
		}

		.my_nav {
			box-shadow: 0px 2px 8px rgb(0 0 0 / 30%);
			background-color: rgb(186 213 255 / 80%);
			backdrop-filter: blur(10px);
		}

		.btn {
			border: 1px solid lightgrey;
		}
	</style>
</head>

<body>
	<?php
	if ($_POST) {
		$mysqlhost = 'localhost';
		$mysqlusername = 'root';
		$mysqlpassword = '';
		$mysqldb = 'civildisobedience';
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn = mysqli_connect($mysqlhost, $mysqlusername, $mysqlpassword, $mysqldb);

		$query = "SELECT * From users where username='$username' and password='$password'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			session_start();
			$_SESSION['auth'] = 'true';
			header('location:/onDuty/pages/admin.php');
		} else {
			echo 'Wrong Credentials';
		}
	}
	?>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light my_nav">
		<div class="container-fluid">
			<a class="navbar-brand" href="../index.php">OnDuty</a>
		</div>
	</nav>

	<!-- Login Form -->
	<div class="container">
		<div class="row mt-5 align-items-center">
			<div class="col-lg-6 col-md-6">
				<div class="card bx">
					<div class="card-body">
						<div class="card-title">
							<h4>OnDuty</h4>
							<p class="card-text text-muted">Login with your Username &amp; password</p>
							<form method="POST">
								<div class="mb-3">
									<input type="text" class="form-control form-control-lg" name="username" placeholder="Username">
								</div>
								<div class="mb-3">
									<input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
								</div>
								<div class="col-4">
									<input type="submit" class="btn btn-success btn-block">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="container">
					<img src="../images/IndianEmblem.jpg" alt="Indian Emblem" id="emblem">
				</div>
			</div>
		</div>
	</div>


		<!-- Bootsrap js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>