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
    <link rel="stylesheet" href="contact.html">

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
          <form autocomplete="off">
            <h2 class="text-center">REGISTER</h2>
            <!-- <p class="text-color pb-0">Join us today and be a part of our mission to provide essential care and shelter to those in need.</p> -->
            <p class="text-color pb-0">We'll never share your personal information with anyone else.</p>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="FullName" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="FullName">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="email" class="form-label">Email Address</label>
                  <input type="email" class="form-control" id="email">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="mobile" class="form-label">Mobile No.</label>
                  <input type="text" class="form-control" id="mobile">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="dateofbirth" class="form-label">Date of Birth</label>
                  <input type="date" class="form-control" id="dateofbirth">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="addressline1" class="form-label">Address Line 1</label>
                  <input type="text" class="form-control" id="addressline1">
                </div>
              </div>
              <div class="col-md-6">
              <div class="mb-3">
                  <label for="pincode" class="form-label">Pin Code</label>
                  <input type="text" class="form-control" id="pincode">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="state" class="form-label">State</label>
                  <input type="text" class="form-control" id="state">
                </div>
              </div>
              <div class="col-md-6">
              <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
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