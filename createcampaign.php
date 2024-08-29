<?php
require("include/session.php");
$errorMessages = ""; 
$successMessages = ""; 

if(!isAllowed("createcampaign")){
  header("Location: AccessDenied");
  exit;
} 

if (isset($_POST['createcampaign'])) {
    // Get and sanitize input values
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $goalamount = trim($_POST['goalamount']);
    $startdate = trim($_POST['startdate']);
    $enddate = trim($_POST['enddate']);
    $acceptterms = isset($_POST['acceptterms']) ? 1 : 0;

    // Validate inputs
    if (empty($title)) {
        $errorMessages .= "Title is required.<br>";
    }
    if (empty($description)) {
        $errorMessages .= "Description is required.<br>";
    }
    if (empty($goalamount)) {
        $errorMessages .= "Goal Amount is required.<br>";
    }
    if (empty($startdate)) {
        $errorMessages .= "Start Date is required.<br>";
    }
    if (empty($enddate)) {
        $errorMessages .= "End Date is required.<br>";
    }

    // Handle file upload
    $bannerPath = '';
    $uploadFileDir = './CampaignBanners/';
    if (!is_dir($uploadFileDir)) {
        if (!mkdir($uploadFileDir, 0755, true)) {
            $errorMessages .= "Failed to create upload directory.<br>";
        }
    }
    

    if (empty($errorMessages) && isset($_FILES['banner']) && $_FILES['banner']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['banner']['tmp_name'];
        $fileName = $_FILES['banner']['name'];
        $fileSize = $_FILES['banner']['size'];
        $fileType = $_FILES['banner']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");

        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $bannerPath = $dest_path;
            } else {
                $errorMessages .= "There was an error moving the uploaded file.<br>";
            }
        } else {
            $errorMessages .= "Upload failed. Allowed file types: " . implode(", ", $allowedExtensions) . ".<br>";
        }
    } else {
      $errorMessages .= "Please Select Banner.<br>";
    }
    
    if ($acceptterms == 0) {
      $errorMessages .= "You must accept the terms and conditions.<br>";
    }

    if(empty($errorMessages)){
      $queryCheck = "SELECT COUNT(*) as count FROM `campaigns` WHERE `UserID` = ? AND (`Status` = 1 OR `Status` = 3)";
      $stmtCheck = $conn->prepare($queryCheck);
      if ($stmtCheck) {
          $stmtCheck->bind_param("s", $user->UserID);
          $stmtCheck->execute();
          $resultCheck = $stmtCheck->get_result();
          $rowCheck = $resultCheck->fetch_assoc();

          if ($rowCheck['count'] > 0) {
              $errorMessages .= "You already have a running campaign.<br>";
              if (!empty($bannerPath) && file_exists($bannerPath)) {
                unlink($bannerPath);
              }
          }
          $stmtCheck->close();
      } else {
          $errorMessages .= "Database query failed: " . $conn->error . "<br>";
          if (!empty($bannerPath) && file_exists($bannerPath)) {
            unlink($bannerPath);
          }
      }
    }

    if (empty($errorMessages)) {
        // Insert campaign into the database
        $query = "INSERT INTO `campaigns` (`UserID`, `CompaignGUID`, `Title`, `Description`, `GoalAmount`, `StartDate`, `EndDate`, `isAcceptTerms`, `Status`, `BannerPath`, `CreatedAt`) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
        } else {
            $UserID = $user->UserID;
            $status = 1; // Pending By Default
            $CompaignGUID = md5(time());
            $stmt->bind_param("ssssssssss",$UserID , $CompaignGUID, $title, $description, $goalamount, $startdate, $enddate, $acceptterms, $status, $bannerPath);
            if ($stmt->execute()) {
                $successMessages = "Campaign Created Successfully.";
                $_SESSION['success'] = $successMessages;
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                $errorMessages = "Error: " . $stmt->error . "<br>";
                // Delete the uploaded file if query fails
                if (!empty($bannerPath) && file_exists($bannerPath)) {
                  unlink($bannerPath);
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
</head>
<body>
<?php require("include/header.php"); ?>
<div style="background-color: #E6F3FF;">
  <div class="container pt-4 pb-4">
  <?php require("include/sidebar.php"); ?>
    <div class="row">
      <div class="col-md-8 mb-3">
        <div class="bg-white shadow p-4 rounded-3">
          <form method="POST" action="" enctype="multipart/form-data">
            <h4>Create Campaign</h4>
            <ul style="font-size:13px">
              <!-- List items as before -->
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
                    <label for="title" class="form-label">Enter Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="desc" class="form-label">Enter Description</label>
                    <input type="text" class="form-control" id="desc" name="description" value="<?php echo isset($description) ? htmlspecialchars($description) : ''; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="amount" class="form-label">Enter Goal Amount</label>
                    <input type="number" class="form-control" id="amount" name="goalamount" value="<?php echo isset($goalamount) ? htmlspecialchars($goalamount) : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="banner" class="form-label">Upload Banner</label>
                    <input type="file" class="form-control" id="banner" name="banner">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="startdate" class="form-label">Select Start Date</label>
                    <input type="date" class="form-control" id="startdate" name="startdate" value="<?php echo isset($startdate) ? htmlspecialchars($startdate) : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="enddate" class="form-label">Select End Date</label>
                    <input type="date" class="form-control" id="enddate" name="enddate" value="<?php echo isset($enddate) ? htmlspecialchars($enddate) : ''; ?>">
                  </div>
                </div>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="acceptterms" <?php echo isset($acceptterms) && $acceptterms ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flexCheckDefault">
                  I Agree <a href="">Terms and Conditions.</a>
                </label>
              </div>
              <button type="submit" name="createcampaign" class="btn btn-primary shadow-none">Submit</button>
            </form>
          </div>
      </div>
      <div class="col-md-4">
        <!-- Campaign Preview as before -->
      </div>
    </div>
  </div>
</div> 
  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
  </body>
</html>
