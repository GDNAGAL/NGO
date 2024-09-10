<?php
session_start();

if (isset($_POST['send_otp'])) {
  $mobile_number = $_POST['mobile_number'];
  $otp = rand(100000, 999999);
  $_SESSION['otp'] = $otp;
  // Send the OTP to the user's mobile number using an SMS gateway
  echo "OTP sent to your mobile number: $otp";
}

if (isset($_POST['verify_otp'])) {
  $entered_otp = $_POST['otp'];
  if ($entered_otp == $_SESSION['otp']) {
    echo "Mobile number verified successfully!";
  } else {
    echo "Invalid OTP. Please try again.";
  }
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
</head>
<body>
<?php require("include/header.php"); ?>
<div style="background-color: #E6F3FF;">
  <div class="container pt-4 pb-4">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="bg-white shadow p-4 rounded-3">
          <form method="POST" action="">
            <h2 class="text-center">Your donation verification</h2>
            <?php if(!empty($errorMessages)): ?>
              <div class="alert alert-danger">
                <?php echo $errorMessages; ?>
              </div>
            <?php endif; ?>
              <div class="mb-2">
                <label for="mobile-number" class="form-label">Mobile Number</label>
                <input type="tel" class="form-control" id="mobile-number" name="mobile_number" placeholder="Enter your mobile number">
              </div>
              <button type="submit" name="send_otp" class="btn btn-primary">Send OTP</button>
              <button type="submit" name="send_otp" class="btn btn-primary ms-2">Resend OTP</button><br>
              <div class="mb-2">
                <label for="mobile-number" class="form-label mt-2">Enter Receive OTP</label><br>
                <input type="tel" class="form" id="mobile-number" name="mobile_number" placeholder="Enter OTP">
              </div>
              <button type="submit" name="send_otp" class="btn btn-primary">Verify Your Donation</button><br>
          </form>
        </div>
      </div> n
    </div>
  </div>
</div> 
<?php require("include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
</body>
</html>
