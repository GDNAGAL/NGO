<?php
 require_once("include/session.php");
 if(!isAllowed("Users")){
    header("Location: AccessDenied");
    exit;
 }


// Fetch user data from the database
$query = "SELECT * FROM users";
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
        <h4 class="m-0">Admin</h4>
        <a href="AddUser"><button class="btn btn-primary shadow-none"><i class="bi bi-plus me-2"></i>Add New User</button></a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover" id="userTable">
          <thead>
            <tr>
              <th scope="col" class="no-wrap">Sno</th>
              <th scope="col" class="no-wrap">Date</th>
              <th scope="col">Donor Name</th>
              <th scope="col" class="no-wrap">Address</th>
              <th scope="col" class="no-wrap">Amount</th>
              <th scope="col">IsAnonymous</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
          <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $rolename = "";
                  if($row['isAdmin']){
                    $rolename = "E.G";
                  }elseif($row['isNGOUser']){
                    $rolename = "Panding";
                  }else{
                    $rolename = "Completed";
                  }

                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                  echo "<td class='no-wrap'>" . htmlspecialchars($row['DOB']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['FullName']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['AddressLine1'].','.$row['City']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Amount']). ($row['isAmountVerified']?"<i class='bi bi-check-circle-fill ms-2 text-success'></i>":"<i class='bi bi-exclamation-circle-fill ms-2 text-warning'></i>") . "</td>";
                  echo "<td>" . (!empty($row['Email']) ? htmlspecialchars($row['IsAnonymous']) . ($row['isAnonymous'] ? "<i class='bi bi-check-circle-fill ms-2 text-success'></i>" : "<i class='bi bi-exclamation-circle-fill ms-2 text-warning'></i>") : "") . "</td>";
                  echo "<td>" . htmlspecialchars($rolename) . "</td>";
                  echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>No users found</td></tr>";
            }
            ?>
          </tbody>
        </table>
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