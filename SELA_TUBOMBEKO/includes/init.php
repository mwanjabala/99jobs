<?php
$action = '';
$sign_up_success ='';
$messages = array();
function record_message($message) {
  global $messages;
  array_push($messages, $message);
}
function print_messages() {
  global $messages;
  foreach ($messages as $message) {
    echo "<p><strong>" . htmlspecialchars($message) . "</strong></p>\n";
  }
}

// show database errors during development.
function handle_db_error($exception) {
  echo '<p><strong>' . htmlspecialchars('Exception : ' . $exception->getMessage()) . '</strong></p>';
}

// execute an SQL query and return the results.
function exec_sql_query($db, $sql, $params = array()) {
  try {
    $query = $db->prepare($sql);
    if ($query and $query->execute($params)) {
      return $query;
    }
  } catch (PDOException $exception) {
    handle_db_error($exception);
  }
  return NULL;
}

// open connection to database
function open_or_init_sqlite_db($db_filename, $init_sql_filename) {
  if (!file_exists($db_filename)) {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db_init_sql = file_get_contents($init_sql_filename);
    if ($db_init_sql) {
      try {
        $result = $db->exec($db_init_sql);
        if ($result) {
          return $db;
        }
      } catch (PDOException $exception) {
        // If we had an error, then the DB did not initialize properly,
        // so delete it!
        unlink($db_filename);
        throw $exception;
      }
    }
  } else {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  }
  return NULL;
}

function check_login() {
  if (isset($_SESSION['current_user'])) {
    return $_SESSION['current_user'];
  }
  return NULL;
}

function log_in($phone_number, $password, $user_type) {
  global $db;
  //$go_to = 'index.php';
    if ($phone_number && $password) {
      if($user_type =='seeker'){
      $sql = "SELECT * FROM seekers WHERE phone_number = :phone_number;";
      $params = array(
        ':phone_number' => $phone_number
      );
    }else if($user_type =='provider' ){
      $sql = "SELECT * FROM providers WHERE phone_number = :phone_number;";
      $params = array(
        ':phone_number' => $phone_number
      );
    }
      $records = exec_sql_query($db, $sql, $params)->fetchAll();
      if ($records) {
        // Username is UNIQUE, so there should only be 1 record.
        $account = $records[0];
        // Check password against hash in DB
        if (password_verify($password, $account['password'])) {
          // generate new session
          session_regenerate_id();
          $_SESSION['current_user'] = $account;
          $cur_user = $account['first_name'];
          record_message("Logged in as $cur_user.");
          return $account;
        } else {
          record_message("Invalid phone number or password.");
        }
      } else {
        record_message("Invalid username or password.");
      }
    } else {
      record_message("No username or password given.");
    }
    return NULL;


}
function signup($username, $password,$first_name, $last_name, $phone_number){
    global $db;
    global $action;

    //check that fields are not empty
    if(!$username){
      record_message('Enter Username');
      return false;
    }
    if(!$password){
      record_message('Enter password');
      return false;
    }
    if(!$first_name){
      record_message('Enter first name');
      return false;
    }
    if(!$last_name){
      record_message('Enter last name');
      return false;
    }
    if(!$phone_number){
      record_message('Enter phone number');
      return false;
    }

    //add data to database
    $sql = 'INSERT INTO seekers(username, password, first_name, last_name, phone_number,picpath) VALUES
    (:username, :password, :first_name, :last_name, :phone_number, "dl/lol")';
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $params = array(
      ':username' => $username,
      ':password' => $hashed_password,
      ':first_name' => $first_name,
      ':last_name' => $last_name,
      ':phone_number' => $phone_number
    );
    $records = exec_sql_query($db, $sql, $params);
    $action = '';
}

function log_out() {

  global $current_user;
  global $user_type;
  $current_user = NULL;
  $user_type = NULL;
  // destroy PHP session
  unset($_SESSION['current_user']);
  session_destroy();


}


// open connection to database
$db = open_or_init_sqlite_db("website.sqlite", "init/init.sql");

// Check if we should login the user
session_start();
if (isset($_POST['login'])) {

  $phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING);
  $phone_number = trim($phone_number);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $user_type = filter_input(INPUT_POST, 'user_type', FILTER_SANITIZE_STRING);

  $current_user = log_in($phone_number, $password,$user_type);
}

// check if logged in
$current_user = check_login();
$current_user_id = NULL;
if ($current_user) {

  $sql = "SELECT id FROM seekers WHERE phone_number = :phone_number";
  $params = array(
    ':phone_number' => $current_user['phone_number']
  );
  $records = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_COLUMN);
  if ($records) {
    // Username is UNIQUE, so there should only be 1 record.
      $current_user_id = $records[0];
  }
}


if(isset($_POST['logout'])){
  log_out();
}
if(isset($_POST['signup'])){
  $action = 'signup';
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  $username = trim($username);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
  $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
  $phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING);

  $sign_up_success = signup($username, $password, $first_name, $last_name, $phone_number);

}



?>
