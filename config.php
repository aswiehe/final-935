<?php
// Connecting to the MySQL database
$DB_USER = "wiehea1";
$DB_PASSWORD = "ka7udrUB";

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_fall18_wiehea1', $DB_USER, $DB_PASSWORD);

// autoloader
function my_autoloader($class) {
    include('classes/class.' . $class . '.php');
}

spl_autoload_register('my_autoloader');

// start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URI']);

// if customerID is not set in the session and current URL not login.php redirect to login page
if(!isset($_SESSION['userID']) && $current_url != 'login.php') {
  header('location: login.php');
}
