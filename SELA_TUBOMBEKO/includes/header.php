<header>
  <?php //Header navigation
  //echo $current_user;
  ?>

  <nav class="menu-navigation-dark">

    <a href="profile.php"><img class='prof_pics' src='images/dp.png'><span>Profile</span></a>
    <a href="find_jobs.php"><i class="fa fa-search"></i><span>Find Jobs</span></a>
    <a href="messages.php"><i class="fa fa-comment"></i><span>Messages</span></a>
  </nav>

  <form name="logout-form" action='index.php' method='post' >
      <input id='logout' type="submit" name="logout" value="Log Out">
  </form>
</header>
