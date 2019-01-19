
<?php
include('includes/init.php');

//check signup was okay;
if ($sign_up_success == false && $action == 'signup') {
  header('Location: signup.php');
}
?>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

</head>
<body>
  <div class='login_signup'>
    <img class='logo_login_signup' src='images/logo.png'>
  </div>

  <div id="login">

    <form name='form-login' method='post' action='find_jobs.php' >
      <input type="radio" name="user_type" value="seeker" checked><b>Job Seeker</b>
      <input type="radio" name="user_type" value="provider"><b>Job Provider</b> <br>
      <span class="fontawesome-user"></span>
      <input type="text" name='username' id="user" placeholder="Username">

      <span class="fontawesome-lock"></span>
      <input type="password" name='password' id="pass" placeholder="Password">

      <input type="submit" name='login' value="Login">
      <div>
      <strong>Don't have an account?</strong>
      <strong><a class='dark_links' href='signup.php'>sign up</a><strong>
      </div>

    </form>

  </div>
  <?php include('includes/footer.php')?>
</body>
</html>
