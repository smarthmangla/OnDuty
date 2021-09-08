<?php
include_once('db.php');
?>
<?php
$sql = "SELECT * FROM `statistics_` WHERE Crime_Name='Detention'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $det = $row['Crime_Num'];
  }
}
global $det;
?>
<?php
$sql = "SELECT * FROM `statistics_` WHERE Crime_Name='Bribery'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $brib = $row['Crime_Num'];
  }
}
global $brib;
?>
<?php
$sql = "SELECT * FROM `statistics_` WHERE Crime_Name='Ignorance'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $ign = $row['Crime_Num'];
  }
}
global $ign;
?>
<?php
$sql = "SELECT * FROM `statistics_` WHERE Crime_Name='Custodial'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $cus = $row['Crime_Num'];
  }
}
global $cus;
?>
<?php
$sql = "SELECT * FROM `statistics_` WHERE Crime_Name='Manipulation'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $man = $row['Crime_Num'];
  }
}
global $man;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>On The Duty</title>
  <link rel="stylesheet" href="./home1.css">
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Civil Harrasment', 'Number'],
        ['Bribery', <?php echo $brib; ?>],
        ['Custodial Torture', <?php echo $cus; ?>],
        ['Ignorance in Filing complaint', <?php echo $ign; ?>],
        ['Manipulation of Evidence', <?php echo $man; ?>],
        ['Illegal Detention', <?php echo $det; ?>]
      ]);
      var options = {
        title: 'Civil Harrasment',
        width: 550,
        height: 370,
      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Crimes", "Cases", {
          role: "style"
        }],
        ["Bribery", <?php echo $brib; ?>, "blue"],
        ["Custodial Torture", <?php echo $cus; ?>, "blue"],
        ["Ignorance in Filing complaint", <?php echo $ign; ?>, "blue"],
        ["Manipulation of Evidence", <?php echo $man; ?>, "color: blue"],
        ["Illegal Detention", <?php echo $det; ?>, "color: blue"],
      ]);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
        {
          calc: "stringify",
          sourceColumn: 1,
          type: "string",
          role: "annotation"
        },
        2
      ]);
      var options = {
        title: "Civil Harrasment",
        width: 550,
        height: 370,
        bar: {
          groupWidth: "95%"
        },
        legend: {
          position: "none"
        },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
    }
  </script>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light my_nav sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="./admin.php">
        <img src="./logo1.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        <strong>OnDuty</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./complaint.php">File Report</a>
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
          <a class="btn btn-light mx-1 text-dark" href="./login.php" role="button">Login</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- header -->
  <header class="main-header">
  </header>
  <!-- header -->

  <!-- header info -->
  <div class="container-fluid header-info">
    <div class="row my-2">
      <div class="col-lg-12 col-md-12 my-3">
        <h2 class="fw-bold text-center">Team OnDuty</h2>
        <h3 class="text-center">We at TeamOTD are there for you. We firmly believe in the constitution of our country and do whatever it takes to bring justice to the victims and expose the officers misusing their power.</h3>
      </div>
    </div>
    <div class="row mb-5 text-center">
      <div class="col-lg-4 col-md-4">
        <a class="btn btn-primary" href="./stats.php" role="button">STATISTICS</a>
      </div>
      <div class="col-lg-4 col-md-4">
        <a class="btn btn-primary btn-lg" href="./complaint.php" role="button">SUBMIT REPORT</a>
      </div>
      <div class="col-lg-4 col-md-4">
        <a class="btn btn-primary btn-lg" href="./hotspot.php" role="button">VIEW HOTSPOTS</a>
      </div>
    </div>
  </div>

  <!-- Chart Area -->
  <section id="chart-area" class="mb-5">
    <div class="container1">
      <div class="left">
        <h2 class="piehead">Civil Harrasment</h2>
        <div id="piechart" class="chart"></div>
      </div>

      <div class="right">
        <h2 class="piehead">Total Crimes</h2>
        <div id="barchart_values" class="chart"></div>
      </div>
    </div>

    <div id="map"></div>
  </section>

  <!-- News Area -->
  <section class="news">
    <div class="container">
      <div class="row my-3">
        <div class="col-lg-8 col-md-8">
          <h1>Latest News</h1>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="d-flex justify-content-end">
            <form action="index.php" class="d-flex" method="GET">
              <input class="form-control me-2" name="search" type="search" placeholder="Search" list="crimes">
              <datalist id="crimes">
                <option value="Bribery">
                <option value="Custodial">
                <option value="Ignorance">
              </datalist>
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <!-- newsfeed -->
          <?php
          if (!empty($_GET) && ($_GET['search'] != "")) {
            $query = $_GET["search"];
            $sql = "SELECT * FROM `newsfeed` WHERE Crime_Name LIKE '%$query%'";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);
            echo '<h2>' . $num . ' search results for <em>"' . $_GET['search'] . '"</em></h2>';
          } else {
            $sql = "SELECT * FROM `newsfeed` ORDER BY News_id limit 5";
            $result = mysqli_query($con, $sql);
          }
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
						<div class="list-group">
							<div class="list-group-item list-group-item-action my-2 my_list-item" aria-current="true">
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
      </div>
    </div>
  </section>

  <!-- Map Area -->
  <section class="map">
    <div class="container1">
      <div class="left">
        <div class="piehead">Crime Hotspots</div>
        <div style="padding-left: 1.25em; padding-right: 1em;">
          <h3 class="text-center my-4">Chandigarh</h3>
          <table class="table table-striped table-hover ml-2" style="font-size: 1.25em;">
            <thead>
              <tr class="table-dark">
                <th scope="col">CITY</th>
                <th scope="col">PLACE</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM `hotspots` where Crime_City='Chandigarh' limit 8";
              $result = mysqli_query($con, $sql);
              $num = mysqli_num_rows($result);
              if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '
									<tr>
										<td>' . $row['Crime_City'] . '</td>
										<td>' . $row['Crime_Places'] . '</td>
									</tr>
								';
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="right">
        <h2 class="piehead mb-3">Map</h2>
        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109741.02912911311!2d76.69348873658222!3d30.73506264436677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh!5e0!3m2!1sen!2sin!4v1622499313613!5m2!1sen!2sin"></iframe>
      </div>
    </div>
  </section>

  <!-- team area -->
  <section id="team" style="margin-top: 4em;">
    <div class="container text-center mb-5">
      <h2 class="fw-bold">Project Team</h2>
      <div class="row mt-4">
        <div class="col-lg-6 col-md-6">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="./ashish.jpg" class="img-fluid rounded-start" style="height: 15rem;" alt="Ashish Garg">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Ashish Garg</h5>
                  <h6 class="card-subtitle">Full Stack Developer</h6>
                  <p class="card-text">Engineering Student</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="./smarth.jpg" class="img-fluid rounded-start" style="height: 15rem;" alt="Smarth Mangla">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Samarth Mangla</h5>
                  <h6 class="card-subtitle">Full Stack Developer</h6>
                  <p class="card-text">Engineering Student</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

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
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" 53 crossorigin="anonymous"></script>
</body>

</html>