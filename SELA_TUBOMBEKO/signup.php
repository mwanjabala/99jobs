<?php include('includes/init.php')  ?>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

</head>
<body>
  <div class='login_signup'>
    <img class='logo_login_signup' src='images/logo.png'>
  </div>

  <div id="login">

    <form name='form-login' method='post' action='index.php' >
      <input type="radio" name="user_type" value="seeker" checked><b>Job Seeker</b>
      <input type="radio" name="user_type" value="provider"><b>Job Provider</b> <br>
      <input type="text" name='username' placeholder="Username">
      <input type="text" name='first_name' placeholder="First Name">
      <input type="text" name='last_name' placeholder="Last Name">
      <input type="text" name='phone_number' placeholder="260xxxxxxxxx">
      <input type="password" name='password' placeholder="Password">

      <input type="submit" name='signup' value="Sign Up">

      </form>


    </div>
    <?php print_messages(); ?>
    <?php include('includes/footer.php')?>
  </body>
  </html>
