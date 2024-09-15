<?php
// Start the session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the User class and database connection
require_once('User.php');
require_once('dbconn.php');
$cUrl = urlencode($_SERVER['REQUEST_URI']);
$allowedPages = array();
// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    $currentUrl = basename($_SERVER['REQUEST_URI'], ".php");

    // Redirect to the login page if the current page is not 'login'
    if ($currentUrl !== 'login') {
        $_SESSION['return_url'] = $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        exit;
    }
}

// Initialize the User object if not already set in session
if (!isset($_SESSION['user_object'])) {
    $loginUserID = $_SESSION['user_id'];

    // Fetch the user data from the database
    $query = "SELECT * FROM users WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $loginUserID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ///print_r($row);
        $data = new User($row);
        $_SESSION['user_object'] = serialize($data);
    } else {
        echo "No user data found.";
        exit;
    }

    $stmt->close();
}
$navfile = '';

if (isset($_SESSION['user_object'])) {
    $user = unserialize($_SESSION['user_object']); 

    switch ($user->Role) {
        case 'ADMIN':
            $navfile= 'Navigation/Admin.php';
            $allowedPages = ["Users","AddUser","ViewAllCompaign"];
            break;
    
        case 'NGOUSER':
            $navfile= 'Navigation/NGOUser.php';
            $allowedPages = ["createcampaign"];
            break;
    
        case 'VISITOR':
            $navfile= 'Navigation/VISITOR.php';
            $allowedPages = ["createcampaign"];
            break;
    
        default:
            $nav = "<li class='nav-link'>
                        <a href='Dashboard'><i class='bi bi-house me-3'></i>Dashboard</a>
                    </li>";
            $allowedPages = [];
            break;
    }
}

$query = "SELECT COUNT(*) as unreadCount FROM `contacts` WHERE isSeen = 0";
$stmt = $conn->prepare($query);
if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($unreadCount);
    $stmt->fetch();
    
    $unSeenWebsiteQuery = $unreadCount;
    $stmt->close();
}else{
    $unSeenWebsiteQuery = 0;
}


function isAllowed($page){
    global $allowedPages;
    if (in_array($page, $allowedPages)) {
        return true;
    } else {
        return false;
    }
}
?>
