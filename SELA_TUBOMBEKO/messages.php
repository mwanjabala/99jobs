<?php
include("includes/init.php");
echo $current_user;
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

  <title>Messages</title>
</head>
<body>
<?php include('includes/header.php'); ?>
</body>
