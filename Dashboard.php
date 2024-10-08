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

  if($Role == "ADMIN"){
      $campaigns = [];
      $query = "SELECT cp.*, cs.StatusText, cs.BgClass, us.FullName, us.MobileNo, us.Email FROM campaigns cp INNER JOIN campaignstatus cs ON cp.Status = cs.ID INNER JOIN users us ON cp.UserID = us.ID WHERE Status IN (1,3) ORDER BY ID DESC";
      if ($stmt = $conn->prepare($query)) {
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
    <?php if(!empty($_SESSION['success'])): ?>
      <div class="alert alert-danger">
        <?php echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
      </div>
    <?php endif; ?>
    <?php if(!empty($_SESSION['error'])): ?>
      <div class="alert alert-danger">
        <?php echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
      </div>
    <?php endif; ?>
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

    <?php   if($Role == "ADMIN"){ ?>
    <h4 class="">Fundraising Campaign</h4>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
      <?php if (count($campaigns) > 0): ?>
              <?php foreach ($campaigns as $campaign): ?>
                <div class="col">
                  <div class="border rounded-4 mb-3">
                    <img class="w-100 rounded-4" style="height:200px" src="<?php echo htmlspecialchars($campaign['BannerPath']); ?>" alt="" srcset="">
                    <div class="p-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="badge rounded-pill <?php echo htmlspecialchars($campaign['BgClass']); ?>"><?php echo htmlspecialchars($campaign['StatusText']); ?></div>
                        <span><?php 
                          $percentage = ($campaign['GoalAmount'] > 0) ? ($campaign['RaisedAmount'] / $campaign['GoalAmount']) * 100 : 0;
                          echo '<span class="badge rounded-pill bg-success">' . round($percentage, 2) . '%</span>'; 
                        ?></span>
                      </div>
                      <div class="mb-2 mt-2" style="height:150px; overflow-y:scroll">
                        <h6 class="text-dark mt-3"><?php echo htmlspecialchars($campaign['Title']); ?></h6>
                        <p class="text-dark"><?php echo htmlspecialchars($campaign['Description']); ?></p>
                      </div>
                      <p class="m-0" style="font-size:12px"><strong>Created By :</strong> <a href=""><?php echo htmlspecialchars($campaign['FullName']) ?></a></p>
                      <p class="m-0" style="font-size:12px"><strong>Contact :</strong> <?php echo htmlspecialchars($campaign['MobileNo']). "/". htmlspecialchars($campaign['Email'])."" ?></p>
                      <p class="m-0" style="font-size:12px"><strong>Created Date Time :</strong> <?php echo htmlspecialchars($campaign['CreatedAt']); ?></p>
                      <div class="d-flex justify-content-between">
                        <?php if($campaign['Status'] == 1){ ?>
                          <a onclick="return confirm('Are Your Sure?')" href="actionFiles/campaignAction?ACTION=2&campaignID=<?php echo htmlspecialchars($campaign['ID']);?>&returnURL=<?php echo $cUrl;?>" class="btn btn-danger w-50 m-2 ms-0 shadow-none">Reject</a>
                          <a onclick="return confirm('Are Your Sure?')" href="actionFiles/campaignAction?ACTION=3&campaignID=<?php echo htmlspecialchars($campaign['ID']);?>&returnURL=<?php echo $cUrl;?>" class="btn btn-success w-50 m-2 me-0 shadow-none">Approve</a>
                        <?php }elseif($campaign['Status'] == 3){ ?>
                          <a onclick="return confirm('Are Your Sure?')" href="actionFiles/campaignAction?ACTION=5&campaignID=<?php echo htmlspecialchars($campaign['ID']);?>&returnURL=<?php echo $cUrl;?>" class="btn btn-primary w-100 m-2 ms-0 me-0 shadow-none">Close This Compaign</a>
                        <?php } ?>
                      </div>
                    </div>
                </div>
              </div>
              <?php endforeach; ?>
          <?php else: ?>
              <p class="text-center w-100">No campaigns found.</p>
          <?php endif; ?>
          <div class="text-end w-100">
            <a href="ViewAllCompaign" class="btn btn-primary shadow-none">View All Compaign</a>
          </div>
      </div>
    </div>
    <?php } ?>

  </div>
</div> 
  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
  </body>
</html>