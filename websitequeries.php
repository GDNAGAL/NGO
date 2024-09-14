<?php
 require_once("include/session.php");
 if(!isAllowed("Users")){
    header("Location: AccessDenied");
    exit;
 }


// Fetch user data from the database
$query = "SELECT * FROM contacts Order By CreatedAt DESC";
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
        <h4 class="m-0">Website Contact Form Data</h4>
      </div>
      <div class="table-responsive">
        <table class="table table-hover" id="userTable">
          <thead>
            <tr>
              <th scope="col" class="no-wrap">S.No.</th>
              <th scope="col" class="no-wrap">Query ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Subject</th>
              <th scope="col" class="no-wrap">Message</th>
              <th scope="col" class="no-wrap">Status</th>
              <th scope="col" class="no-wrap">Date Submitted</th>
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
                    echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Subject']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Message']) . "</td>";
                    echo "<td class='text-center'>" . ($row['isMailSucess'] ? "<i style='font-size:25px' class='bi bi-envelope-check text-success'></i>" : "<i style='font-size:25px' class='bi bi-envelope-exclamation text-warning'></i>") . "</td>";
                    echo "<td>" . htmlspecialchars($row['CreatedAt']). "</td>";
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