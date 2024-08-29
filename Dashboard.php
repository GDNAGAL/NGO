<?php
 require_once("include/session.php");

  $UserID = $user->UserID;
  $Role = $user->Role;
  $ShowCompaignTable = false;

  if($Role == "VISITOR" || $Role == "NGOUSER"){
      $ShowCompaignTable = true;
      $campaigns = [];
      $query = "SELECT cp.*, cs.StatusText, cs.BgClass FROM campaigns cp INNER JOIN campaignstatus cs ON cp.Status = cs.ID WHERE UserID = ? ORDER BY ID DESC";
      if ($stmt = $conn->prepare($query)) {
          $stmt->bind_param("i", $UserID);
          $stmt->execute();
          $result = $stmt->get_result();

          while ($row = $result->fetch_assoc()) {
              $campaigns[] = $row;
          }

          $stmt->close();
      }

      $conn->close();
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
    <div class="bg-white shadow p-4 rounded-3 mb-3">
      <h4>Welcome, <?php echo $user->FullName ?></h4>
    </div>
    <div class="bg-white shadow p-4 rounded-3">
    
    <?php if($ShowCompaignTable){?>
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="m-0">Your Fundraising Campaign</h4>
        <a href="createcampaign"><button class="btn btn-primary shadow-none"><i class="bi bi-plus me-2"></i>Create Fundraising Campaign</button></a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover caption-top">
          <thead>
            <tr>
              <th scope="col" class="no-wrap text-center">Campaign ID</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Goal</th>
              <th scope="col">Raised</th>
              <th scope="col" class="no-wrap text-center">Raised %</th>
              <th scope="col" class="no-wrap text-center">Status</th>
            </tr>
          </thead>
          <tbody>
          <?php if (count($campaigns) > 0): ?>
                <?php foreach ($campaigns as $campaign): ?>
                    <tr>
                      <td class="no-wrap text-center"><?php echo htmlspecialchars($campaign['ID']); ?></td>
                      <td><?php echo htmlspecialchars($campaign['Title']); ?></td>
                      <td><?php echo htmlspecialchars($campaign['Description']); ?></td>
                      <td class="no-wrap">₹ <?php echo number_format($campaign['GoalAmount'], 2); ?></td>
                      <td class="no-wrap">₹ <?php echo number_format($campaign['RaisedAmount'], 2); ?></td>
                      <td class="text-center">
                        <?php 
                          $percentage = ($campaign['GoalAmount'] > 0) ? ($campaign['RaisedAmount'] / $campaign['GoalAmount']) * 100 : 0;
                          echo '<span class="badge rounded-pill bg-success">' . round($percentage, 2) . '%</span>'; 
                        ?>
                      </td>
                      <td class="text-center">
                        <?php 
                          echo '<span class="badge rounded-pill ' . $campaign['BgClass'] . '">' . htmlspecialchars($campaign['StatusText']) . '</span>';
                        ?>
                      </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No campaigns found.</td>
                </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    <?php } ?>  
    </div>
  </div>
</div> 
  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
  </body>
</html>