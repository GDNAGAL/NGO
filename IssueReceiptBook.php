<?php
require("include/session.php");

if(!isAllowed("AddUser")){
    header("Location: AccessDenied");
    exit;
}

$errorMessages = ""; 
$successMessages = ""; 

if (isset($_POST['issueBook'])) {
    // Get and sanitize input values
    $book = trim($_POST['book']);
    $user = trim($_POST['user']);
    $firstno = trim($_POST['firstno']);
    $issuedate = trim($_POST['issuedate']);

    if (empty($errorMessages)) {
        // Check if book already issue
        $checkQuery = "SELECT * FROM `receiptbookissue` WHERE ClosingReceiptNumber = '' AND ReceiptBookID = ?";
        $checkStmt = $conn->prepare($checkQuery);
        if (!$checkStmt) {
            $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
        } else {
            $checkStmt->bind_param("s", $book);
            $checkStmt->execute();
            $result = $checkStmt->get_result();
            if ($result->num_rows > 0) {
                $errorMessages = "Book Already Issued To A User.<br>";
            } else {
                
                $query = "INSERT INTO `receiptbookissue` (`ReceiptBookID`, `UserID`, `StartReceiptNumber`, `ClosingReceiptNumber`, `IssueDate`, `CreatedAt`) 
                          VALUES (?, ?, ?, NULL, ?, NOW())";
                $stmt = $conn->prepare($query);
                if (!$stmt) {
                    $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
                } else {
                    $stmt->bind_param("ssss", $book, $user, $firstno, $issuedate);
                    if ($stmt->execute()) {
                        $uquery = "UPDATE `receiptbooks` SET `Status` = 2 WHERE `ID` = $book";
                        $stmt = $conn->prepare($uquery);
                        $stmt->execute();

                        $successMessages = "Book Issued Successfully.";
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


$bquery = "SELECT * FROM `receiptbooks` WHERE Status =1 Order by CreatedAt DESC";
$bookresult = $conn->query($bquery);

$userquery = "SELECT ID, FullName, MobileNo FROM `users` WHERE isNGOUser =1";
$userresult = $conn->query($userquery);


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
            <h4>Receipt Book Issue</h4>
            <span class="text-danger d-block mb-3" style="font-size:12px">Book Can be Issue only to our NGO users.</span>
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
                    <label for="fullname" class="form-label">Select Receipt Book</label>
                    <select class="form-select shadow-none" name="book">
                    <option selected disabled>Select Book</option>
                    <?php
                      // Fetch Book data from the database
                      if ($bookresult->num_rows > 0) {
                        while($row = $bookresult->fetch_assoc()) {
                          echo "<option value='" . htmlspecialchars($row['ID']) . "'>" . htmlspecialchars($row['Title']) . "</option>";
                        }
                      }
                    ?>
                   </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="email" class="form-label">Select User</label>
                    <select class="form-select shadow-none" name="user">
                     <option selected disabled>Select User</option>
                     <?php
                      // Fetch Book data from the database
                      if ($userresult->num_rows > 0) {
                        while($row = $userresult->fetch_assoc()) {
                          echo "<option value=".htmlspecialchars($row['ID']).">".htmlspecialchars($row['FullName']). " - " . htmlspecialchars($row['MobileNo']) ."</option>";
                        }
                      }
                    ?>
                   </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="mobileno" class="form-label">Starting Recept No.</label>
                    <input type="number" class="form-control shadow-none" id="mobileno" name="firstno" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="address" class="form-label">Issiue Date</label>
                    <input type="date" class="form-control shadow-none" name="issuedate" id="pure-date" aria-describedby="date-design-prepend" required>
                  </div>
                </div>
              </div>
              <button type="submit" name="issueBook" class="btn btn-primary shadow-none">Issue Book</button>
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
