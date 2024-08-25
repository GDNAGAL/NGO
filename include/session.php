<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    $currentUrl = basename($_SERVER['REQUEST_URI'], ".php");

    // Check if the current URL is not 'login'
    if ($currentUrl !== 'login') {
        $_SESSION['return_url'] = $_SERVER['REQUEST_URI'];
        header('Location: login');
        exit;
    }
}
require("dbconn.php");
$loginUserID = $_SESSION['user_id'];
$loginUserName = $_SESSION['fullname'];
// Set session timeout duration (optional)
$inactive = 600; // 10 minutes of inactivity

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['timeout'];
    if ($session_life > $inactive) {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}

$_SESSION['timeout'] = time(); // Reset the timeout counter

// Optionally, store some user data in the session
// $_SESSION['username'] = 'example_user';
// $_SESSION['user_role'] = 'admin';

?>
