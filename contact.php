<?php
require("include/dbconn.php");
session_start();
$errorMessages = ""; 
$successMessages = ""; 

if (isset($_POST['sendMessage'])) {
    // Get and sanitize input values
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    $mailStatus = 0;
    if(sendmail($email,$subject,$fullname,$message)){
      $mailStatus = 1;
    }else{
      $mailStatus = 0;
    }
    // Insert form details into the database
    $query = "INSERT INTO `contacts` (`Name`, `Email`, `Subject`, `Message`, `isMailSucess`, `isSeen`, `CreatedAt`) 
              VALUES (?, ?, ?, ?, ?, '0', NOW())";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
    } else {
        $stmt->bind_param("sssss", $fullname, $email, $subject, $message, $mailStatus);
        if ($stmt->execute()) {
            $successMessages = "Form Submitted Successfully.";
            $_SESSION['success'] = $successMessages;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $errorMessages = "Error: " . $stmt->error . "<br>";
        }
    }
    $stmt->close();
}
$conn->close();



function sendmail($email,$subject,$fullname,$message){
  $to = "gdnagal1536@gmail.com"; 
  $email_subject = "New Contact Form Submission: $subject";
  $email_body = "You have received a new message from $fullname.\n\n".
                "Email: $email\n".
                "Subject: $subject\n\n".
                "Message:\n$message";
  
  // Email headers
  $headers = "From: $email\n";
  $headers .= "Reply-To: $email";

  // Send the email
  if (mail($to, $email_subject, $email_body, $headers)) {
      return true;
  } else {
      return false;
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
    <style>

    </style>
</head>
<body>
<?php require("include/header.php"); ?>
<div class="w-100 text-center" style="background-image: url(Assets/images/banner3.jpg); background-repeat: no-repeat; background-size: cover;">
  <div class="p-4" style="background-color: rgba(0, 0, 0, 0.5);">
    <div>
      <h1 class="text-white p-4 m-4" style="opacity: 1;">Contact Us</h1>
    </div>
  </div>
</div>
  <section class="contact-us">
    <div class="container">
        <div class="container pt-4">
          <div class="row text-center">
      
              
              <div class="col-xl-3 col-sm-6 mb-5">
                  <div class="bg-white rounded shadow-sm py-5"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-phone mb-3" viewBox="0 0 16 16">
                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                  </svg>
                      <h5 class="mb-0">Helpline Number</h5>
                      <a href="#" class="mt-3">+91 9352727457</a><br>
                      <a href="#" class="mt-3">+91 9696967396</a>
                      <ul class="social mb-0 list-inline mt-3">
                          <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-facebook"></i></a></li>
                          <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-twitter"></i></a></li>
                          <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-instagram"></i></a></li>
                          <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-linkedin"></i></a></li>
                      </ul>
                  </div>
              </div>


              <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-phone mb-3" viewBox="0 0 16 16">
                  <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                  <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg>
                    <h5 class="mb-0">Shelter Number</h5>
                    <a href="#" class="mt-3">+91 8306082418</a><br>
                    <a href="#" class="mt-3">+91 9352490667</a>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
              </div>
              
              
              <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-envelope-open mb-3" viewBox="0 0 16 16">
                  <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.817l5.75 3.45L8 8.917l1.25.75L15 6.217V5.4a1 1 0 0 0-.53-.882zM15 7.383l-4.778 2.867L15 13.117zm-.035 6.88L8 10.082l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738ZM1 13.116l4.778-2.867L1 7.383v5.734ZM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765z"/>
                </svg>
                    <h5 class="mb-0">Email Us</h5>
                    <a href="#" class="mt-3 pb-3">contact@doghomefoundation.com</a><br>
                    <ul class="social mb-0 list-inline mt-3 pb-2 pt-3">
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
              </div>
      
              <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                </svg>
                    <h5 class="mb-0">Address</h5>
                   <p>Ganesham Farm House Plot No.11/12/13, Opp. GS Jangid School, Bujhawad, Jodhpur, Rajasthan 342802</p>
                    <ul class="social mb-0 list-inline">
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
              </div>
          </div>
      </div>
    </div>
</section>
<section class="py-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<div class="col-lg-8 mx-auto">
					<h2 class="fw-bold mb-4">Keep In Touch</h2>
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
					<form method="post" action="" autocomplete="off">
						<div class="row">
							<div class="col-md-12">
								<div class="mb-3">
									<input class="form-control bg-light" placeholder="Your name" type="text" name="fullname" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<input class="form-control bg-light" placeholder="Your email" type="email" name="email" required>
								</div>
							</div>
              <div class="col-md-12">
								<div class="mb-3">
									<input class="form-control bg-light" placeholder="Subject" type="text" name="subject" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<textarea class="form-control bg-light" placeholder="Your message" rows="4" name="message" required></textarea>
								</div>
							</div>
              <div class="col-md-5">
								<div id="sumbit">
									<button class="btn btn-primary" name="sendMessage" type="submit">sumbit</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-6">
        <div class="p-2">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1760.4882124727085!2d73.27358748489067!3d28.055744436177477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393fc3de3a94a785%3A0x2da194e27fca1286!2sThe%20Akshaya%20Patra%20Foundation%20Bikaner!5e0!3m2!1sen!2sin!4v1719579454481!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
			</div>
		</div>
	</div>
</section>
<?php require("include/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
    </body>
  </html>