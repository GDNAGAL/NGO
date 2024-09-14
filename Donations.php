<?php
 require_once("include/session.php");
 if(!isAllowed("Users")){
    header("Location: AccessDenied");
    exit;
 }


// Fetch user data from the database
$query = "SELECT dn.*, ds.*, dn.CreatedAt as DCreatedAt FROM `donations` dn INNER JOIN donors ds on dn.DonorID = ds.ID;";
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
        <h4 class="m-0">Donations </h4>
        <a href="AddUser"><button class="btn btn-primary shadow-none"><i class="bi bi-plus me-2"></i>Add New</button></a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover" id="donationTable">
          <thead>
            <tr>
              <th scope="col" class="no-wrap">Sno</th>
              <th scope="col" class="no-wrap">Donation Date</th>
              <th scope="col">Donor Name</th>
              <th scope="col" class="no-wrap">Email</th>
              <th scope="col">Address</th>
              <th scope="col" class="no-wrap">Amount</th>
              <th scope="col">Donation Type</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
          <?php
            if ($result->num_rows > 0) {
                $n = 0;
                while ($row = $result->fetch_assoc()) {
                    $n++;
            
                    // Ensure DonationType and Status are handled properly, even if they're missing
                    $donationType = isset($row['DonationType']) ? $row['DonationType'] : 'N/A';
                    $status = isset($row['Status']) ? $row['Status'] : 'N/A';
            
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($n) . "</td>";
                    echo "<td class='no-wrap'>" . htmlspecialchars($row['DCreatedAt']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address'] . ', ' . $row['City']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Amount']) . "</td>";
                    echo "<td>" . htmlspecialchars($donationType) . "</td>";  // DonationType
                    echo "<td>" . htmlspecialchars($status) . "</td>";  // Status
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
  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>     
  <script>
    $(document).ready(function() {
        $('#donationTable').DataTable({
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