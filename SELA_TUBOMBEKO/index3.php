<?php
include("includes/init.php");
if(is_null($current_user)) {
  header('Location: login.php');
}
?>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>selatubombeko|profile</title>
<link rel="stylesheet" type="text/css" href="styles/all4.css" media="all" />
</head>
<body>

  <ul class='nav'>
    <img class='logo' src='images/logo.png' alt='logo'>
    <a id='nav2' href='jobs3.php'>Find Jobs</a>
    <a id='nav3' href='contacts3.php'>My Contacts</a>
    <a id='nav4' href='help3.php'>Help</a>
    <a id='nav5' class='current' href='index3.php'><?php echo $current_user['first_name']."|" ?></a>
    <?php echo "<img id='nav6' src='profile_pics/".$current_user['picpath']."'>" ?>
  </ul>
  <main>
    <div class='basic_details'>
      <?php echo "<img class='prof_pics' src='profile_pics/".$current_user['picpath']."'>" ?>
      <?php echo "<span>".$current_user['first_name']." ".$current_user['last_name']."</span>" ?>
      <label id='contact_label'>Contact</label>
      <img class='icons' id='phone_icon' src='images/phone_icon.png'><?php echo "<label id='p_num'>".$current_user['phone_number']."</label>"?>
      <img class='icons' id='email_icon' src='images/email_icon.png'><?php echo "<label id='e_mail'>".$current_user['email']."</label>"?>
    </div>
    <div class='skills_summ'>
      <div class='summary'>
        <h3>Summary</h3>
      </div>
      <hr>
      <div class='skills'>
        <h3>Skills</h3>
      </div>
      <hr>
      <div class='endorsements'>
        <h3>Endorsements</h3>
      </div>
    </div>
    <div class='jobs-completed'>
      <h3>Jobs completed</h3>
    </div>
  </main>
  <footer>© 2019 selatubombeko.com All Rights Reserved  |  connecting job seekers and providers  |  let's work and reduce unemployment</footer>
</body>
