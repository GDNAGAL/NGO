<?php
 require_once("include/session.php");
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
      <div class="text-end">
        <a href="createcampaign"><button class="btn btn-primary shadow-none"><i class="bi bi-patch-plus me-2"></i>Create Fundraising Campaign</button></a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover caption-top">
        <caption><b>Your Fundraising Campaign</b></caption>
          <thead>
            <tr>
              <th scope="col" class="no-wrap">Campaign ID</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Goal</th>
              <th scope="col">Raised</th>
              <th scope="col" class="no-wrap">Raised %</th>
              <th scope="col" class="no-wrap">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#176</td>
              <td>Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</td>
              <td>The sacred Char Dham Yatra, a revered pilgrimage undertaken by devotees across India</td>
              <td class="no-wrap">₹ 10,00,000.00</td>
              <td class="no-wrap">₹ 10,000.00</td>
              <td class="text-center"><span class="badge rounded-pill bg-success">25%</span></td>
              <td class="text-center"><span class="badge rounded-pill bg-warning">Pending Approval</span></td>
            </tr>
            <tr>
              <td>#176</td>
              <td>Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</td>
              <td>The sacred Char Dham Yatra, a revered pilgrimage undertaken by devotees across India</td>
              <td class="no-wrap">₹ 10,00,000.00</td>
              <td class="no-wrap">₹ 10,000.00</td>
              <td class="text-center"><span class="badge rounded-pill bg-success">25%</span></td>
              <td class="text-center"><span class="badge rounded-pill bg-success">Running</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 
  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
  </body>
</html>