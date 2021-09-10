<?php
session_start();
if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
   $auth = true;
} else {
   $auth = false;
}

echo '
<nav class="navbar navbar-expand-lg navbar-light my_nav sticky-top">
   <div class="container-fluid">
      <a class="navbar-brand" href="/onDuty/pages/admin.php">
         <img src="/onDuty/images/logo1.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
         <strong>OnDuty</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link" aria-current="page" href="/onDuty/">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" aria-current="page" href="/onDuty/pages/complaint.php">File Report</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/onDuty/pages/Newsfeed.php">Newsfeed</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/onDuty/pages/hotspot.php">Hotspots</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/onDuty/pages/stats.php">Statistics</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/onDuty/pages/checkStatus.php">Complaint Status</a>
            </li>
         </ul>';

if (!$auth) {
   echo '        
   <div class="d-flex mx-2">
      <a class="btn btn-light mx-1 text-dark" href="/onDuty/partials/login.php" role="button">Login</a>
   </div>
   ';
}
else {
   echo '
   <div class="d-flex mx-2">
      <a class="btn btn-light mx-1 text-dark" href="/onDuty/partials/logout.php" role="button">Logout</a>
   </div>
   ';
}

echo '
      </div>
   </div>
</nav>
';

?>

