<?php
require("include/session.php");

if(!isAllowed("AddUser")){
    header("Location: AccessDenied");
    exit;
}

$errorMessages = ""; 
$successMessages = ""; 

if (isset($_POST['adduser'])) {
    // Get and sanitize input values
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $mobileno = trim($_POST['mobileno']);
    $address = trim($_POST['address']);
    $state = trim($_POST['state']);
    $city = trim($_POST['city']);

    // Validate inputs
    if (empty($fullname)) {
        $errorMessages .= "Full Name is required.<br>";
    }
    if (empty($mobileno)) {
        $errorMessages .= "Mobile Number is required.<br>";
    }
    if (empty($address)) {
        $errorMessages .= "Address is required.<br>";
    }
    if (empty($state)) {
        $errorMessages .= "State is required.<br>";
    }
    if (empty($city)) {
        $errorMessages .= "City is required.<br>";
    }

    if (empty($errorMessages)) {
        // Check if mobile number or email already exists
        $checkQuery = "SELECT * FROM `users` WHERE `MobileNo` = ?";
        if (!empty($email)) {
            $checkQuery .= " OR `Email` = ?";
        }
        
        $checkStmt = $conn->prepare($checkQuery);
        if (!$checkStmt) {
            $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
        } else {
            if (!empty($email)) {
                $checkStmt->bind_param("ss", $mobileno, $email);
            } else {
                $checkStmt->bind_param("s", $mobileno);
            }
            $checkStmt->execute();
            $result = $checkStmt->get_result();
            if ($result->num_rows > 0) {
                $errorMessages = "Mobile Number or Email already exists.<br>";
            } else {
                // Generate the password using MD5 hash of MobileNo
                $password = md5($mobileno);

                // Insert user details into the database
                $query = "INSERT INTO `users` (`FullName`, `Email`, `isEmailVerified`, `MobileNo`, `isMobileVerified`, `DOB`, `AddressLine1`, `State`, `City`, `isAdmin`, `isNGOUser`, `CreatedAt`, `Password`) 
                          VALUES (?, ?, '0', ?, '1', NULL, ?, ?, ?, '0', '1', NOW(), ?)";
                $stmt = $conn->prepare($query);
                if (!$stmt) {
                    $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
                } else {
                    $stmt->bind_param("sssssss", $fullname, $email, $mobileno, $address, $state, $city, $password);
                    if ($stmt->execute()) {
                        $successMessages = "User Added Successfully.";
                        $_SESSION['success'] = $successMessages;
                        header("Location: " . $_SERVER['PHP_SELF']);
                        exit;
                    } else {
                        $errorMessages = "Error: " . $stmt->error . "<br>";
                    }
                }
                $stmt->close();
            }
            $checkStmt->close();
        }
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
        /* Add custom styles here */
    </style>
</head>
<body>
<?php require("include/header.php"); ?>
<div style="background-color: #E6F3FF;">
  <div class="container pt-4 pb-4">
  <?php require("include/sidebar.php"); ?>
    <div class="row">
      <div class="col-md-8 mb-3">
        <div class="bg-white shadow p-4 rounded-3">
          <form method="POST" action="" autocomplete="off">
            <h4>Receipt Book</h4>
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
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                  <label for="state" class="form-label">Title:</label>
                  <input class="form-control" type="text" id="title" name="title">
                </div>
                <button type="submit" name="adduser" class="btn btn-primary shadow-none">Submit</button>
                </div>
              </div>
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
