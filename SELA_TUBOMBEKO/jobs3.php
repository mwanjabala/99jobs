<?php
include("includes/init.php");
if(is_null($current_user)) {
  header('Location: login.php');
}
?>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>selatubombeko|jobs</title>
<link rel="stylesheet" type="text/css" href="styles/all4.css" media="all" />
</head>
<body>
  <ul>
    <img class='logo' src='images/logo.png' alt='logo'>
    <li id='nav2'><a class='current' href='jobs3.php'>Find Jobs</a></li>
    <li id='nav3'><a href='contacts3.php'>My Contacts</a></li>
    <li id='nav4'><a href='help3.php'>Help</a></li>
    <li id='nav5'><a href='index3.php'><?php echo $current_user['first_name']."|" ?></a></li>
    <?php echo "<img id='nav6' src='profile_pics/".$current_user['picpath']."'>" ?>
  </ul>
  <hr class='headline'>
</body>
