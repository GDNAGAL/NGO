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
    <link rel="stylesheet" href="contact.html">

    <style>

    </style>
</head>
<body>

<?php require("include/header.php"); ?>

  <header>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Assets/images/success-stories-bg.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="fw-bold">Success Stories</h2>
        </div>
      </div>
    </div>
  </header>
  <!-- <section class="d-flex">
    <div class="row row-cols-1 pb-4" id="assets-img">
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-1.png"class="card-img-top" id="card-img" alt="...">
          <div class="card-body" id="body">
            <h5 class="card-title">How Sanju was sentenced to death until hanging?</h5>
            <p class="card-text">In a village near Jodhpur, where tractors have replaced traditional farming methods, a heartbreaking story unfolded. Sanju, a once proud and hardworking bull, became the unluckiest of all bulls.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-2.jpg" class="card-img-top" id="card-img" alt="...">
          <div class="card-body" id="body">
            <h5 class="card-title">How a thirsty cow became an acid victim</h5>
            <p class="card-text">In the scorching heat of Rajasthan, where the sun beats down mercilessly, even the hardiest of souls seek respite. But for one gentle cow, seeking a drink of water proved to be a journey of unimaginable pain and suffering.</p>
             <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-3.png"  class="card-img-top" id="card-img" alt="...">
          <div class="card-body"  id="body">
            <h5 class="card-title">When a baby camel saw her mother leave him alone.</h5>
            <p class="card-text">While a baby camel was learning to survive with his mother in the selfish world of ours, a tragedy struck one fateful day. A car accident left the mother-son duo stranded, abandoned, and fighting for their lives.</p>
             <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mb-0 pb-0 pe-3">
        <div class="sidebar-header">
            <h4>Recent Success Stories</h4>
        </div>
        <div class="cmn-sidebar bg-white border p-3">
        <div class="media">
        <div class="thumb-img d-flex">
            <img class="me-3" src="Assets/img-1.png" alt="" width="60" height="60">
        <div class="media-body">
          <a href="#" class="stretched-link fs-6 ">How Sanju was sentenced to death until hanging?</a><br>
            <span>Thu May 2024</span><hr>
        </div>
      </div>
    </div>
    <div>
      <div class="media">
        <div class="thumb-img d-flex">
            <img class="me-3" src="Assets/img-2.jpg" alt="" width="60" height="60">
        <div class="media-body">
            <a href="#" class="stretched-link fs-6">How a thirsty cow became an acid victim.</a><br>
            <span>Fri May 2024</span><hr>
        </div>
      </div>
      <div class="media">
        <div class="thumb-img d-flex">
            <img class="me-3" class="" src="Assets/img-3.png" alt="" width="60" height="60">
        <div class="media-body">
            <a href="#" class="stretched-link fs-6">When a baby camel saw her mother leave him alone.</a><br>
            <span>Mon May 2024</span><hr>
        </div>
      </div>
    </div>
    <div class="media">
      <div class="thumb-img d-flex">
          <img class="me-3" src="Assets/img-5.jpg" alt="" width="60" height="60">
      <div class="media-body">
          <a href="#" class="stretched-link fs-6">Story of Kansa, the bull whose horns became his enemy.</a><br>
          <span>Sun Mar 2024</span>
      </div>
    </div>     
  </section>
  <section class="card-header">
    <div class="row row-cols-1 pb-4" id="assets-img">
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-5.jpg"class="card-img-top" id="card-img" alt="...">
          <div class="card-body" id="body">
            <h5 class="card-title">How Sanju was sentenced to death until hanging?</h5>
            <p class="card-text">In a village near Jodhpur, where tractors have replaced traditional farming methods, a heartbreaking story unfolded. Sanju, a once proud and hardworking bull, became the unluckiest of all bulls.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-6.png" class="card-img-top" id="card-img" alt="...">
          <div class="card-body" id="body">
            <h5 class="card-title">How a thirsty cow became an acid victim</h5>
            <p class="card-text">In the scorching heat of Rajasthan, where the sun beats down mercilessly, even the hardiest of souls seek respite. But for one gentle cow, seeking a drink of water proved to be a journey of unimaginable pain and suffering.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-7.png"  class="card-img-top" id="card-img" alt="...">
          <div class="card-body"  id="body">
            <h5 class="card-title">When a baby camel saw her mother leave him alone.</h5>
            <p class="card-text">While a baby camel was learning to survive with his mother in the selfish world of ours, a tragedy struck one fateful day. A car accident left the mother-son duo stranded, abandoned, and fighting for their lives.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
  </section>
  <section class="card-header">
    <div class="row row-cols-1 pb-4" id="assets-img">
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-8.png"class="card-img-top" id="card-img" alt="...">
          <div class="card-body" id="body">
            <h5 class="card-title">How Sanju was sentenced to death until hanging?</h5>
            <p class="card-text">In a village near Jodhpur, where tractors have replaced traditional farming methods, a heartbreaking story unfolded. Sanju, a once proud and hardworking bull, became the unluckiest of all bulls.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-9.jpg" class="card-img-top" id="card-img" alt="...">
          <div class="card-body" id="body">
            <h5 class="card-title">How a thirsty cow became an acid victim</h5>
            <p class="card-text">In the scorching heat of Rajasthan, where the sun beats down mercilessly, even the hardiest of souls seek respite. But for one gentle cow, seeking a drink of water proved to be a journey of unimaginable pain and suffering.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-10.png"  class="card-img-top" id="card-img" alt="...">
          <div class="card-body"  id="body">
            <h5 class="card-title">When a baby camel saw her mother leave him alone.</h5>
            <p class="card-text">While a baby camel was learning to survive with his mother in the selfish world of ours, a tragedy struck one fateful day. A car accident left the mother-son duo stranded, abandoned, and fighting for their lives.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
  </section>
  <section class="card-header">
    <div class="row row-cols-1 pb-4" id="assets-img">
      <div class="col-3">
        <div class="card">
          <img src="Assets/img-11.png"class="card-img-top" id="card-img" alt="...">
          <div class="card-body" id="body">
            <h5 class="card-title">How Sanju was sentenced to death until hanging?</h5>
            <p class="card-text">In a village near Jodhpur, where tractors have replaced traditional farming methods, a heartbreaking story unfolded. Sanju, a once proud and hardworking bull, became the unluckiest of all bulls.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">
              Read More 
              <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>
  </section> -->
  <?php require("include/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
    </body>
  </html>