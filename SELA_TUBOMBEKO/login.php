<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>Menu</title>
<link rel="stylesheet" type="text/css" href="styles/all_login.css" media="all" />
<script type="text/javascript" src="scripts/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="scripts/login_signup.js"></script>
</head>
<body>
<main>
<div class='left'>
  <ul>
    <li>Find Jobs</li>
    <li>Find Man Power</li>
    <li>Advertise your products</li>
  </ul>
</div>
<div class='right'>
  <p>Login to find jobs or people who can get a task done for you. Sign up if you haven't already!</p>
  <span id='show_login' class='cur_form'>Login  |</span><span id='show_signup'>|  Sign Up</span>
<form id='login_form' method='post' action='index3.php'>
  <input class='radio' type="radio" name="user_type" value="seeker" checked><label>Job Seeker</label>
  <input class='radio' type="radio" name="user_type" value="provider"><label>Job Provider</label>
  <input class='input_login' type='number' name='phone_number' placeholder="phone number" required>
  <input class='input_login' type='password' name='password' placeholder="password" required>
  <input class='input_login' type='submit' name='login'>
</form>
<form id='signup_form' method='post' class='hidden'>
  <input class='radio' type="radio" name="user_type" value="seeker" checked><label>Job Seeker</label>
  <input class='radio' type="radio" name="user_type" value="provider"><label>Job Provider</label>
  <input class='input_signup' type='text' name='first_name' placeholder="First Name" required>
  <input class='input_signup' type='text' name='last_name' placeholder="Last Name" required>
  <input class='input_signup' type='number' name='phone_number' placeholder="Phone Number" required>
  <input class='input_signup' type='password' name='password' placeholder="Password" required>
  <input class='input_signup' type='submit' name='signup'>
</form>
</main>
<hr>
  <footer>© 2019 selatubombeko.com All Rights Reserved  |  connecting job seekers and providers  |  let's work and reduce unemployment</footer>
</body>
