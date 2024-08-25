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
    <div class="row">
      <div class="col-md-8">
        <div class="bg-white shadow p-4 rounded-3">
          <form method="POST" action="">
            <h4>Create Campaign</h4>
            <ul>
              <li>Only registered and verified users can create a campaign.</li>
              <li>The campaign must align with the NGO's mission and values, focusing on causes like animal rescue, shelter maintenance, or related activities.</li>
              <li>All campaigns must go through an approval process by the NGO's team to ensure they meet the guidelines and objectives of the organization.</li>
              <li>The NGO reserves the right to reject or remove campaigns that do not comply with the rules.</li>
              <li>Donors should receive receipts for their donations and have access to information on how their contributions are being used.</li>
              <li>Campaign creators must respond promptly to any inquiries or concerns from donors.</li>
              <li>The NGO will provide a mechanism for donors to report suspicious or fraudulent campaigns.</li>
            </ul>
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
                    <label for="currentPassword" class="form-label">Enter Title</label>
                    <input type="text" class="form-control" id="currentPassword" aria-describedby="emailHelp" name="currentpassword" value="<?php echo isset($currentpassword) ? htmlspecialchars($currentpassword) : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="currentPassword" class="form-label">Enter Description</label>
                    <input type="text" class="form-control" id="currentPassword" aria-describedby="emailHelp" name="currentpassword" value="<?php echo isset($currentpassword) ? htmlspecialchars($currentpassword) : ''; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="currentPassword" class="form-label">Enter Goal Amount</label>
                    <input type="text" class="form-control" id="currentPassword" aria-describedby="emailHelp" name="currentpassword" value="<?php echo isset($currentpassword) ? htmlspecialchars($currentpassword) : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="currentPassword" class="form-label">Upload Banner</label>
                    <input type="file" class="form-control" id="currentPassword" aria-describedby="emailHelp" name="currentpassword" value="<?php echo isset($currentpassword) ? htmlspecialchars($currentpassword) : ''; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="currentPassword" class="form-label">Select Start Date</label>
                    <input type="date" class="form-control" id="currentPassword" aria-describedby="emailHelp" name="currentpassword" value="<?php echo isset($currentpassword) ? htmlspecialchars($currentpassword) : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="currentPassword" class="form-label">Select End Date</label>
                    <input type="date" class="form-control" id="currentPassword" aria-describedby="emailHelp" name="currentpassword" value="<?php echo isset($currentpassword) ? htmlspecialchars($currentpassword) : ''; ?>">
                  </div>
                </div>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  I Agree <a href="">Terms and Conditions.</a>
                </label>
              </div>
              <button type="submit" name="changepassword" class="btn btn-primary shadow-none">Submit</button>
            </form>
          </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white rounded-4 shadow mb-2 p-3 border-bottom border-primary border-5">
          <h4>Campaign Preview</h4>
          <img src="https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb.jpg" width="100%" class="rounded-3" alt="">
          <div class="progress mt-3">
            <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
          </div>
          <div class="text-start mt-3 text-color">
            <strong>Raised : </strong><span>₹ 10,000.00</span><br>
            <strong>Goal : </strong><span>₹ 10,00,000.00</span>
          </div><hr>
          <h6 class="text-dark mt-3">Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</h6>
          <p class="text-dark">The sacred Char Dham Yatra, a revered pilgrimage undertaken by devotees across India</p>
          <button class="btn btn-outline-primary rounded-pill w-100"><i class="bi bi-heart"></i> Make A Donation</button>
        </div>
      </div>
    </div>
  </div>
</div> 
  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
  </body>
</html>