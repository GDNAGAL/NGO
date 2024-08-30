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
  <div class="row mb-3">
      <div class="col-md-12">
        <div class="bg-white shadow p-4 rounded-3 text-center">
          <p>Your donation will help us move our cows to a permanent shelter so they can receive the love and medical attention they require.</p>
          <!-- <strong>(This donation is under 80G exempted)</strong> -->
          <p class="mb-0">Donate via Card, UPI, & Wallet (INR Only)</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-md-8">
        <div class="bg-white shadow p-4 rounded-3">
          <form method="POST" action="" autocomplete="off">
            <h5>Basic Information</h5>
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
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="mobileno" class="form-label">Mobile No</label>
                    <input type="number" class="form-control" id="mobileno" name="mobileno" value="<?php echo isset($mobileno) ? htmlspecialchars($mobileno) : ''; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($address) ? htmlspecialchars($address) : ''; ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="state" class="form-label">Select State</label>
                    <select class="form-control" name="state" id="state" required>
                      <option selected>RAJASTHAN</option>
                      <!-- Add more states as needed -->
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="city" class="form-label">Select City</label>
                    <select class="form-control" name="city" id="city" required>
                      <option value=""></option>
                      <option <?php echo (isset($city) && $city==="BIKANER") ? 'selected' : '';?>> BIKANER</option>
                      <!-- Add more cities as needed -->
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="mobileno" class="form-label">Enter Amount</label>
                    <input type="number" class="form-control" id="mobileno" name="mobileno" value="<?php echo isset($mobileno) ? htmlspecialchars($mobileno) : ''; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="address" class="form-label">Select Payment Method</label>
                    <select class="form-control" name="state" id="paymentMethod" required>
                      <option value=""></option>
                      <option value="ONLINE_PAYMENT">Online Payment</option>
                      <option value="BANK_TRANSFER">Bank Transfer</option>
                      <!-- Add more states as needed -->
                    </select>
                  </div>
                </div>
              </div>
              <div id="BANK" class="d-none">
                <h5>Account Details:</h5>
                <table>
                  <tr>
                    <th>Account Holder Name</th>
                    <th>:</th>
                    <td class="ps-2 text-danger">Our Foundation</td>
                  </tr>
                  <tr>
                    <th>Account Number</th>
                    <th>:</th>
                    <td class="ps-2 text-danger">658456548469</td>
                  </tr>
                  <tr>
                    <th>Bank Name</th>
                    <th>:</th>
                    <td class="ps-2 text-danger">State Bank of India</td>
                  </tr>
                  <tr>
                    <th>IFSCode</th>
                    <th>:</th>
                    <td class="ps-2 text-danger">SBIN0031317</td>
                  </tr>
                </table>
                <h6 class="mt-3">Note:</h6>
                <ul>
                  <li>Verify the account number and bank details before making the transfer.</li>
                  <li>Ensure the donation amount is correct before transferring.</li>
                  <li>Keep the transaction reference number or ID provided by your bank.</li>
                  <li>After payment, submit the transaction ID via below input.</li>
                </ul>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="mobileno" class="form-label">Enter Transaction Ref. No.</label>
                    <input type="text" class="form-control" id="mobileno" name="mobileno" value="<?php echo isset($mobileno) ? htmlspecialchars($mobileno) : ''; ?>" required>
                  </div>
                </div>
              </div> 
              <div id="ONLINEUPI" class="d-none">
                <h5 class="text-center">Scan Below QR Code:</h5>
                <div class="text-center">
                  <img class="border p-2" width="200px" height="200px" src="https://media.tenor.com/wpSo-8CrXqUAAAAi/loading-loading-forever.gif" alt="">
                </div>
                <h6 class="mt-3">Note:</h6>
                <ul>
                  <li class="text-danger fw-bold">Please Do Not Reload or Back This Page.</li>
                  <li>Verify the account number and bank details before making the transfer.</li>
                  <li>Ensure the donation amount is correct before transferring.</li>
                  <li>Keep the transaction reference number or ID provided by your bank.</li>
                  <li>After payment, submit the transaction ID via below input.</li>
                </ul>
              </div>  
              <button type="button" class="btn btn-primary shadow-none">Proceed to Payment</button>
              <button type="submit" name="adduser" class="btn btn-primary shadow-none d-none">Submit</button>
            </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white shadow p-4 rounded-3">

        </div>
      </div>
    </div>
  </div>
</div> 
  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
  </body>

  <script>
    $(document).ready(function(){
      $("#paymentMethod").on('change',function(){
        HideAll()
        const paymentMethod = $(this).val();
        if(paymentMethod == 'BANK_TRANSFER'){
          $("#BANK").removeClass('d-none')
          $("#BANK").addClass('d-block')
        }else if(paymentMethod == 'ONLINE_PAYMENT'){
          $("#ONLINEUPI").removeClass('d-none')
          $("#ONLINEUPI").addClass('d-block')
        }
      })
    })
    function HideAll(){
      $("#BANK").removeClass('d-block')
      $("#BANK").addClass('d-none')
      $("#ONLINEUPI").removeClass('d-block')
      $("#ONLINEUPI").addClass('d-none')
    }
  </script>
</html>