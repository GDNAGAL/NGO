<?php
require("include/session.php");
$errorMessages = ""; 
$successMessages = ""; 

if (isset($_POST['changepassword'])) {
    // Get and sanitize input values
    $currentpassword = trim($_POST['currentpassword']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);

    // Validate inputs
    if (empty($currentpassword)) {
        $errorMessages .= "Current Password Required.<br>";
    }
    if (empty($password)) {
        $errorMessages .= "New Password is required.<br>";
    }
    if (empty($confirmpassword)) {
        $errorMessages .= "Confirm Password is required.<br>";
    }
    if (!empty($password) && strlen($password) < 6) {
        $errorMessages .= "Password Must be greater than 6 digits.<br>";
    }
    if (!empty($password) && !empty($confirmpassword) && $password != $confirmpassword) {
        $errorMessages .= "Password And Confirm Password do not match.<br>";
    }

    if (empty($errorMessages)) {
        // Retrieve the current password from the database
        $query = "SELECT `Password` FROM `users` WHERE `ID` = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
        } else {
            $stmt->bind_param("s", $loginUserID);
            $stmt->execute();
            $stmt->store_result();
            
            // Check if user exists
            if ($stmt->num_rows == 0) {
                $errorMessages = "User not found.<br>";
            } else {
                $stmt->bind_result($storedPassword);
                $stmt->fetch();
                
                // Verify the current password
                if (md5($currentpassword) !== $storedPassword) {
                    $errorMessages .= "Current password is incorrect.<br>";
                } else {
                    // Encrypt the new password
                    $encPassword = md5($password);

                    // Update the password in the database
                    $query = "UPDATE `users` SET `Password` = ? WHERE `ID` = ?";
                    $stmt = $conn->prepare($query);
                    if (!$stmt) {
                        $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
                    } else {
                        $stmt->bind_param("ss", $encPassword, $loginUserID);
                        if ($stmt->execute()) {
                            $successMessages = "Password Changed Successfully.";
                            $_SESSION['success'] = $successMessages;
                            header("Location: " . $_SERVER['PHP_SELF']);
                            exit;
                        } else {
                            $errorMessages = "Error: " . $stmt->error . "<br>";
                        }
                    }
                }
            }
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

    <style>

    </style>
</head>
<body>
<?php require("include/header.php"); ?>
<div style="background-color: #E6F3FF;">
  <div class="container pt-4 pb-4">
  <?php require("include/sidebar.php"); ?>
    <div class="bg-white shadow p-4 rounded-3">
      <div class="col-md-4">
        <form method="POST" action="">
          <h2 class="text-center">Change Password</h2>
            <?php if(!empty($errorMessages)): ?>
              <div class="alert alert-danger">
                <?php echo $errorMessages; ?>
              </div>
            <?php endif; ?>
            <?php if(!empty($_SESSION['success'])): ?>
              <div class="alert alert-success">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
              </div>
            <?php endif; ?>
            <div class="mb-3">
              <label for="currentPassword" class="form-label">Enter Current Password</label>
              <input type="text" class="form-control" id="currentPassword" aria-describedby="emailHelp" name="currentpassword" value="<?php echo isset($currentpassword) ? htmlspecialchars($currentpassword) : ''; ?>">
            </div>
            <div class="mb-3">
              <label for="newPassword" class="form-label">Set New Password</label>
              <input type="password" class="form-control" id="newPassword" name="password" >
            </div>
            <div class="mb-3">
              <label for="cnewPassword" class="form-label">Confirm New Password</label>
              <input type="text" class="form-control" id="cnewPassword" name="confirmpassword" value="<?php echo isset($confirmpassword) ? htmlspecialchars($confirmpassword) : ''; ?>">
            </div>
            <button type="submit" name="changepassword" class="btn btn-primary shadow-none">Change Password</button>
          </form>
        </div>
    </div>
  </div>
</div> 
  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
  </body>
</html>