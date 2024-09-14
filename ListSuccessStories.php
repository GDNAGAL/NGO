<?php
 require_once("include/session.php");
 if(!isAllowed("Users")){
    header("Location: AccessDenied");
    exit;
 }


// Fetch user data from the database
$query = "SELECT * FROM `successstories`";
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
    <div class="bg-white shadow p-4 rounded-3">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="m-0">Success Stories</h4>
        <button class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus me-2"></i>Add New Story</button>
      </div>
      <div class="table-responsive">
        <table class="table table-hover" id="userTable">
          <thead>
            <tr>
              <th scope="col" class="no-wrap">S.No.</th>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Story Short Title</th>
              <th scope="col">Created Date</th>
              <th scope="col" class="no-wrap">Actions</th>
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
                    echo "<td>" . htmlspecialchars($row['FullName']) . "</td>";
                    echo "<td>" . (htmlspecialchars($row['Title'])) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Story']) . "</td>";
                    echo "<td class='no-wrap'>" . htmlspecialchars($row['CreatedAt']) . "</td>";
                    echo "<td><a href=''><i class='bi bi-pencil-fill'></i></a> <a href='' class='ms-3'><i class='bi bi-trash-fill'></i></a></td>";
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Story</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="" autocomplete="off">
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
                    <label class="form-label">Enter Title</label>
                    <input type="text" class="form-control" name="fullname" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Select Image</label>
                    <input type="file" class="form-control" name="fullname" required>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="fullname" class="form-label">Enter Title</label>
                <textarea type="text" rows="15" class="form-control" id="fullname" name="fullname" required></textarea>
              </div>
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2 shadow-none" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary shadow-none">Save Changes</button>
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