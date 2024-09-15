<?php 
 require_once("include/dbconn.php");



// Fetch all Product from the database
$productquery = "SELECT * FROM `products` order by CreatedAt DESC";
$productresult = $conn->query($productquery);


$donorquery = "SELECT ds.Amount, do.Name FROM `donations` ds INNER JOIN donors do on ds.DonorID = do.ID ORDER BY Amount DESC limit 5";
$donorresult = $conn->query($donorquery);





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

    </style>
</head>
<body>
<?php require("include/header.php"); ?>
<div style="background-color: #E6F3FF;">
  <div class="container pt-4 pb-4">
  <div class="row mb-3">
      <div class="col-md-12">
        <div class="bg-white shadow p-4 rounded-3">
          <h4>Terms & Conditions</h4>
          <h6>1. Eligibility to Donate</h6>
          <p>Donors must be 18 years or older and have the legal right to donate the product(s). Donated products must be in good, functional condition unless otherwise specified.</p>

          <h6>2. Accepted Products</h6>
          <p>Only products that meet the organization's specified criteria will be accepted. The organization reserves the right to refuse products deemed unsafe, unsuitable, or in poor condition.</p>

          <h6>3. Ownership Transfer</h6>
          <p>Upon donation, all ownership rights of the product(s) are transferred to the receiving organization. Donors relinquish any further claim to the donated item(s).</p>

          <h6>4. Condition of Donation</h6>
          <p>The donor acknowledges that the product(s) are being donated "as is" without any warranties, guarantees, or representations regarding their condition.</p>

          <h6>5. Use of Donated Products</h6>
          <p>The receiving organization reserves the right to use, sell, distribute, or dispose of the donated products as they see fit. Donors may not dictate the use or recipients of donated products.</p>

          <h6>6. No Financial Compensation</h6>
          <p>No financial compensation or reimbursement will be provided to donors for donated products.</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-md-8">
        <!-- <div class="bg-white shadow p-4 rounded-3 mb-3"> -->
          <h5>Products :</h5>
          <div class="row">
            <?php
            if ($productresult->num_rows > 0) {
              while($row = $productresult->fetch_assoc()) {
                ?>
                 <div class="col-md-4">
                    <div class="card p-3 mb-4 shadow">
                      <img src="<?php echo $row['Photo'] ?>" alt="">
                      <h5><?php echo $row['Title'] ?></h5>
                      <span style="font-size:12px">25 of 1000 Quantity Obtained.</span>
                      <div class="progress mt-1">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                      </div>
                      <h6 class="mt-3">Rs <?php echo $row['Rate'] ?>/<?php echo $row['UOM'] ?></h6>
                      <span style="font-size:12px">Add Items :</span>
                      <div class="d-flex justify-content-center align-items-center mt-2 mb-2">
                        <div>
                            <button id="remove-btn-<?php echo $row['ID'] ?>" onclick="removeProduct(<?php echo $row['ID'] ?>)" class="btn btn-success shadow-none rounded-pill"><i class="bi bi-dash-lg"></i></button>
                        </div>
                        <div class="ms-3 me-3" id="quantity-<?php echo $row['ID'] ?>">0</div>
                        <div>
                            <button id="add-btn-<?php echo $row['ID'] ?>" onclick="addProduct(<?php echo $row['ID'] ?>, '<?php echo $row['Title'] ?>', '<?php echo $row['Photo'] ?>', <?php echo $row['Rate'] ?>)" class="btn btn-success shadow-none rounded-pill"><i class="bi bi-plus-lg"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
              }
            }
            ?>
          </div>
        <!-- </div> -->
      </div>
      <div class="col-md-4">
        <h5>Your Added Product :</h5>
        <div class="bg-white shadow p-4 rounded-3">
          <div id="yourProduct">
            <div class='text-center mt-4 mb-4'>
              <img src='Assets/images/donation.webp' alt='No Donations' width='100px'>
              <h5 class='mt-2'>Add Product For Donation</h5>
            </div>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <span>Total Amount :</span>
            <span id="total" class="fw-bold text-success">0.00</span>
          </div>
          <a href="donateAmount?type=product" id="checkout" style="display:none" class="w-100 mt-2 btn btn-primary shadow-none"><i class="bi bi-heart-fill me-3"></i>Donate</a>
        </div>
        <div class="bg-white shadow p-4 rounded-3 mt-4">
          <h5 class="mb-3"><i class="bi bi-heart-fill text-danger me-3"></i> Top Donors </h5>
          <?php
            if ($donorresult->num_rows > 0) {
                while ($row = $donorresult->fetch_assoc()) {
                    ?>
                    <div class="d-flex rounded border p-2 mb-3">
                        <div class="me-3">
                            <img src="Assets/images/d.png" alt="Donor Image" width="50px">
                        </div>
                        <div class="flex flex-column">
                            <div style="font-size:20px"><?php echo htmlspecialchars($row['Name']); ?></div>
                            <strong>Donated <span>Rs. <?php echo htmlspecialchars($row['Amount']); ?></span></strong>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='text-center mt-4'>
                        <img src='Assets/images/donation.webp' alt='No Donations' width='100px'>
                        <h5 class='mt-2'>Make First Donation</h5>
                      </div>";
            }
            ?>
        </div>
      </div>
    </div>
  </div>
</div> 
  <?php require("include/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>      
  <script>
    $(document).ready(function() {
      // Initialize productsInCart from localStorage
      let productsInCart = {};
      if(getCookie('productsInCart')){
        productsInCart = JSON.parse(getCookie('productsInCart'));
      }
      function updateCartUI(productsInCart) {
          $("#yourProduct").html('');
          let total = 0;
          $.each(productsInCart, function(productID, product) {
              $(`#quantity-${productID}`).text(product.Quantity);
              $("#yourProduct").append(`
                  <div class="d-flex rounded border p-2 align-items-center mb-3">
                      <img class="w-25" src="${product.Photo}" height="50px" alt="">
                      <div class="ms-3 w-75">
                          <h5 class="">${product.Title}</h5>
                          <div class="d-flex justify-content-between">
                              <span>Qty : ${product.Quantity}</span>
                              <span>Amount : ${product.Rate * product.Quantity}</span>
                          </div>
                      </div>
                  </div>
              `);
              total+=product.Rate * product.Quantity;
              $("#checkout").show();
          });
          if(total==0){
            $("#checkout").hide();
            $("#yourProduct").html(`<div class='text-center mt-4'>
                <img src='Assets/images/donation.webp' alt='No Donations' width='100px'>
                <h5 class='mt-2'>Add Product For Donation</h5>
              </div>`)
          }
          $("#total").html(total.toFixed(2))
      }

      // Initial UI update
      updateCartUI(productsInCart);

      // Handle add product button click
      window.addProduct = function(productID, title, photo, rate) {
          if (!productsInCart[productID]) {
              productsInCart[productID] = { Title: title, Photo: photo, Rate: rate, Quantity: 0 };
          }
          productsInCart[productID].Quantity++;
          //localStorage.setItem('productsInCart', JSON.stringify(productsInCart));
          setCookie('productsInCart', JSON.stringify(productsInCart), 10)
          updateCartUI(productsInCart);
      }

      // Handle remove product button click
      window.removeProduct = function(productID) {
          if (productsInCart[productID] && productsInCart[productID].Quantity > 0) {
              productsInCart[productID].Quantity--;
              if (productsInCart[productID].Quantity === 0) {
                  delete productsInCart[productID];
                  $(`#quantity-${productID}`).text(0);
              }
              //localStorage.setItem('productsInCart', JSON.stringify(productsInCart));
              setCookie('productsInCart', JSON.stringify(productsInCart), 10)
              updateCartUI(productsInCart);
          }
      }
    });
    function setCookie(cname, cvalue, exdays) {
      const d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      let expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(name) {
      // Create a regular expression to match the cookie name and its value
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      
      // Check if the cookie is present
      if (parts.length === 2) {
        return parts.pop().split(';').shift();
      }
    }
  </script>           
  </body>
</html>