<?php 
require("include/dbconn.php");
session_start();
error_reporting(0);

$errorMessages = ""; // Initialize the error messages variable

if (isset($_POST['register'])) {
    // Get and validate input values
    $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
    $dob = isset($_POST['dob']) ? trim($_POST['dob']) : '';
    $addressline1 = isset($_POST['addressline1']) ? trim($_POST['addressline1']) : '';
    $pincode = isset($_POST['pincode']) ? trim($_POST['pincode']) : '';
    $state = isset($_POST['state']) ? strtoupper(trim($_POST['state'])) : '';
    $city = isset($_POST['city']) ? strtoupper(trim($_POST['city'])) : '';

    // Validate not empty and collect errors
    if (empty($fullname)) $errorMessages .= "Full name is required.<br>";
    if (empty($email)) $errorMessages .= "Email is required.<br>";
    if (empty($mobile)) $errorMessages .= "Mobile number is required.<br>";
    if (empty($dob)) $errorMessages .= "Date of birth is required.<br>";
    if (empty($addressline1)) $errorMessages .= "Address line 1 is required.<br>";
    if (empty($pincode)) $errorMessages .= "PIN code is required.<br>";
    if (empty($state)) $errorMessages .= "State is required.<br>";
    if (empty($city)) $errorMessages .= "City is required.<br>";

    // If no errors, proceed with insertion
    if (empty($errorMessages)) {
        // Optional: Check for existing entry by email or mobile number
        $checkQuery = "SELECT * FROM `users` WHERE `Email` = ? OR `MobileNo` = ?";
        $stmt = $conn->prepare($checkQuery);
        if (!$stmt) {
            $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
        } else {
            $stmt->bind_param("ss", $email, $mobile);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $errorMessages = "A user with this email or mobile number already exists.<br>";
            } else {
                // Generate and hash the password
                $password = mt_rand(100000, 999999);
                $encPassword = md5($password);
                
                // Insert the new user using a prepared statement
                $query = "INSERT INTO `users` (`FullName`, `Email`, `MobileNo`, `DOB`, `AddressLine1`, `PINCode`, `State`, `City`, `Password`, `isAdmin`, `CreatedAt`) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 0, NOW())";
                $stmt = $conn->prepare($query);
                if (!$stmt) {
                    $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
                } else {
                    $stmt->bind_param("sssssssss", $fullname, $email, $mobile, $dob, $addressline1, $pincode, $state, $city, $encPassword);
                    
                    if ($stmt->execute()) {
                        $lastInsertId = mysqli_insert_id($conn);
                        //Set Session Variable
                        $_SESSION['loggedin'] = true;
                        $_SESSION['user_id'] = $lastInsertId;
                        $_SESSION['fullname'] = $fullname;

                        setcookie("Password", $password, time() + (86400 * 30), "/");
                        // Reset the form after successful submission
                        echo "<script>document.getElementById('registrationForm').reset();</script>";
                        $fullname = '';
                        $email = '';
                        $mobile = '';
                        $dob = '';
                        $addressline1 = '';
                        $pincode = '';
                        $state = '';
                        $city = '';
                        //header("Location: " . $_SERVER['PHP_SELF']);
                        header("Location: Dashboard");
                        exit;
                    } else {
                        $errorMessages = "Error: " . $stmt->error . "<br>";
                    }
                }
            }
            $stmt->close();
        }
    }
}

$conn->close();

function generateRandomPassword($length = 12) {
    // Define the characters to be used in the password
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $specialChars = '!@#$%^&*()-_=+[]{}|;:,.<>?';
    
    // Combine all characters
    $allChars = $uppercase . $lowercase . $numbers . $specialChars;
    
    // Generate the password
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = random_int(0, strlen($allChars) - 1);
        $password .= $allChars[$randomIndex];
    }
    
    return $password;
}
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
    <div class="row justify-content-md-center">
      <div class="col-md-8">
        <div class="bg-white shadow p-4 rounded-3">
          <form autocomplete="off" method="POST" action="" id="registrationForm">
            <h2 class="text-center">REGISTER</h2>
            <!-- <p class="text-color pb-0">Join us today and be a part of our mission to provide essential care and shelter to those in need.</p> -->
            <p class="text-color pb-0">We'll never share your personal information with anyone else.</p>
            <!-- Display Error Messages -->
            <?php if (!empty($errorMessages)): ?>
                <div class="alert alert-danger">
                    <?php echo $errorMessages; ?>
                </div>
            <?php endif; ?>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="FullName" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="FullName" value="<?php echo htmlspecialchars($fullname); ?>" name="fullname">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="email" class="form-label">Email Address</label>
                  <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($email); ?>" name="email">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="mobile" class="form-label">Mobile No.</label>
                  <input type="text" class="form-control" id="mobile" value="<?php echo htmlspecialchars($mobile); ?>" name="mobile">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="dateofbirth" class="form-label">Date of Birth</label>
                  <input type="date" class="form-control" id="dateofbirth" value="<?php echo $dob; ?>" name="dob">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="addressline1" class="form-label">Address Line 1</label>
                  <input type="text" class="form-control" id="addressline1" value="<?php echo htmlspecialchars($addressline1); ?>" name="addressline1">
                </div>
              </div>
              <div class="col-md-6">
              <div class="mb-3">
                  <label for="pincode" class="form-label">Pin Code</label>
                  <input type="text" class="form-control" id="pincode" value="<?php echo htmlspecialchars($pincode); ?>" name="pincode">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="state" class="form-label">State</label>
                  <input type="text" class="form-control" id="state" value="<?php echo htmlspecialchars($state); ?>" name="state">
                </div>
              </div>
              <div class="col-md-6">
              <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" value="<?php echo htmlspecialchars($city); ?>" name="city">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
            <p class="mt-3 mb-0">
            Already have an account? <a class="text-danger" href="login"> Login Here</a>
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