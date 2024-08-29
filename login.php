<?php
require("include/dbconn.php"); // Include your database connection file
session_start(); // Start the session

$errorMessages = ""; // Initialize the error messages variable

if(isset($_POST['login'])) {
    // Get and sanitize input values
    $emailOrMobile = trim($_POST['emailormobile']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($emailOrMobile)) {
        $errorMessages .= "Email or mobile number is required.<br>";
    }
    if (empty($password)) {
        $errorMessages .= "Password is required.<br>";
    }

    if (empty($errorMessages)) {
        // Check if the user exists in the database
        $query = "SELECT * FROM `users` WHERE (`Email` = ? OR `MobileNo` = ?) AND `Password` = ?";
        $stmt = $conn->prepare($query);
        $encPassword = md5($password);
        $stmt->bind_param("sss", $emailOrMobile, $emailOrMobile, $encPassword);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['fullname'] = $user['FullName'];

            // Check if there's a return URL and redirect accordingly
            if (isset($_SESSION['return_url'])) {
                $redirectUrl = $_SESSION['return_url'];
                unset($_SESSION['return_url']);
                header("Location: " . $redirectUrl);
            } else {
                header("Location: Dashboard"); 
            }
            exit;
        } else {
            $errorMessages = "Invalid email, mobile number, or password.<br>";
        }

        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO</title>
    <link rel="stylesheet" href="Assets/Bootstrap/Bootstrap.css">
    <link rel="stylesheet" href="Assets/Custom/Style.css">
    <script src="Assets/Bootstrap/Bootstrap.js"></script>
    <script src="Assets/JQuery/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
<?php require("include/header.php"); ?>
<div style="background-color: #E6F3FF;">
  <div class="container pt-4 pb-4">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="bg-white shadow p-4 rounded-3">
          <form method="POST" action="">
            <h2 class="text-center">LOG IN</h2>
            <?php if(!empty($errorMessages)): ?>
              <div class="alert alert-danger">
                <?php echo $errorMessages; ?>
              </div>
            <?php endif; ?>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email Address Or Mobile</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailormobile" value="<?php echo isset($emailOrMobile) ? htmlspecialchars($emailOrMobile) : ''; ?>">
              <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Log In</button>
            <a class="ms-2 text-danger" href="">Forgot Password ?</a>
            <p class="mt-3 mb-0">
              Don't have an account yet? <a class="text-danger" href="register"> Register Here</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 
<?php require("include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
</body>
</html>
