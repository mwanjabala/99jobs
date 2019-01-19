<?php
include("includes/init.php");
if(is_null($current_user)) {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <title>Find Jobs</title>
</head>
<body>
  <div class='top'>
    <img class='logo' src='images/logo.png'>
    <nav class="menu-navigation-dark">

      <a href="profile.php"><img class='prof_pics' src='images/dp.png'><span>Profile</span></a>
      <a href="find_jobs.php"><i class="fa fa-search"></i><span>Find Jobs</span></a>
      <a href="messages.php"><i class="fa fa-comment"></i><span>Messages</span></a>
    </nav>
  </div>


<button onclick="getLocation()">Try It</button>

<p id="demo"></p>
<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude +
    "<br>Longitude: " + position.coords.longitude;
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

</script>

</body>
