<?php
 require_once("include/session.php");
 require_once("include/ftpService.php");
 if(!isAllowed("Users")){
    header("Location: AccessDenied");
    exit;
 }



 if (isset($_POST['addMember'])) {
  $errorMessages = ""; 
  $successMessages = ""; 

  // Get and sanitize input values
  $name = trim($_POST['name']);
  $designation = trim($_POST['designation']);

  if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
      $fileTmpPath = $_FILES['photo']['tmp_name'];
      $fileName = $_FILES['photo']['name'];
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));
      $allowedExtensions = array("jpg", "jpeg", "png");

      if (in_array($fileExtension, $allowedExtensions)) {
          $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
          
          // Upload the file to FTP
          if(uploadToFtp($ftp_server, $ftp_username, $ftp_password, $fileTmpPath, $newFileName)){
              $bannerPath = $ftpPath . $newFileName;
          } else {
              $errorMessages .= "There was an error moving the uploaded file.<br>";
          }
      } else {
          $errorMessages .= "Upload failed. Allowed file types: " . implode(", ", $allowedExtensions) . ".<br>";
      }
  } else {
      $errorMessages .= "Please Select Image.<br>";
  }

  if (empty($errorMessages)) {
      // Insert story into database
      $query = "INSERT INTO `ourteam` (`Name`, `Designation`, `Photo`, `CreatedAt`) 
                VALUES (?, ?, ?, NOW())";
      $stmt = $conn->prepare($query);
      
      if ($stmt) {
          $stmt->bind_param("sss", $name, $designation, $bannerPath);
          if ($stmt->execute()) {
              $successMessages = "Member Added Successfully.";
              $_SESSION['success'] = $successMessages;
              header("Location: " . $_SERVER['PHP_SELF']);
              exit;
          } else {
              $errorMessages = "Error: " . $stmt->error . "<br>";
              // Delete the uploaded file if query fails
              deleteFromFtp($ftp_server, $ftp_username, $ftp_password, $newFileName);
          }
      } else {
          $errorMessages = "Database prepare statement failed: " . $conn->error . "<br>";
      }
      $stmt->close();
  }
}




// Fetch user data from the database
$query = "SELECT * FROM `ourteam` ORDER BY CreatedAt DESC";
$result = $conn->query($query);
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

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="Assets/Datatable/Datatable.css">
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <style>
        .no-wrap {
            white-space: nowrap;
        }
    </style>
</head>
<body>
<?php require("include/header.php"); ?>
<div style="background-color: #E6F3FF;">
  <div class="container pt-4 pb-4">
    <?php require("include/sidebar.php"); ?>

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
    <div class="bg-white shadow p-4 rounded-3">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="m-0">Our Team</h4>
        <button class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus me-2"></i>Add New Member</button>
      </div>
      <div class="table-responsive">
        <table class="table table-hover" id="userTable">
          <thead>
            <tr>
              <th scope="col" class="text-center">S.No.</th>
              <th scope="col">Photo</th>
              <th scope="col" class="text-center">Name</th>
              <th scope="col" class="text-center">Designation</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($result->num_rows > 0) {
                $n=0;
                  while($row = $result->fetch_assoc()) {
                    $n++;
                      echo "<tr>";
                      echo "<td>" . htmlspecialchars($n) . "</td>";
                      echo "<td><img src=" . (htmlspecialchars($row['Photo'])) . " width='100px'></td>";
                      echo "<td class='text-center'>".(htmlspecialchars($row['Name']))."</td>";
                      echo "<td class='no-wrap text-center'>" . htmlspecialchars($row['Designation']) . "</td>";
                      echo "<td class='text-center'><a href=''><i class='bi bi-pencil-fill me-3'></i></a> <a href='' title='Delete Book'><i class='bi bi-trash-fill'></i></a></td>";
                      echo "</tr>";
                  }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Member</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Enter Member Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Enter Designation</label>
            <input type="text" class="form-control" name="designation" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Enter Photo</label>
            <input type="file" class="form-control" name="photo" required>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2 shadow-none" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="addMember" class="btn btn-primary shadow-none">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>     
  <script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });
    });
  </script>            
  </body>
</html>