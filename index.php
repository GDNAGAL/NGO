<?php 
 require_once("include/dbconn.php");
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
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">


    <style>

    </style>
</head>
<body>
  <?php require("include/header.php"); ?>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Assets/images/c1.jpeg" class="d-block w-5" width="100%" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1>Your Contribution Is Important</h1>
          <button type="button" class="btn btn-info">Donete naw</button>
       </div>
      </div>
      <div class="carousel-item">
        <img src="Assets/images/c2.jpeg" class="d-block w-5" width="100%" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <span class="h6">Help Them Today</span>
          <h1>Street Animals Need Our Protection.</h1>
          <button type="button" class="btn btn-info">Donete naw</button>
        </div>
      </div>
      <!-- <div class="carousel-item">
        <img src="Assets/images/Untitled-3.jpg" class="d-block w-5" width="100%"  alt="...">
        <div class="carousel-caption d-none d-md-block">
          <span class="h6">Small Effort Make Big Change</span>
          <h1>Your Support Makes Us Save Precious Lives</h1>
          <button type="button" class="btn btn-info">Donete naw</button>
        </div>
      </div> -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
  <div class="container pt-4 mt-4">
    <div class="row">
      <div class="col-md-6">
        <div style="border-left: 5px solid black;" class="ps-2 rounded-3"> 
          <h3 class="d-flex" >About Us</h3>
          <span class="font-weight-light">Who we are?</span>
        </div>
        <p class="mt-3" style="text-align:justify">JRD Foundation is a non-profit NGO dedicated to the care and rehabilitation of injured and vulnerable animals. Founded with a mission to be a beacon of hope for animals in distress, we specialize in rescuing, treating, and providing shelter for animals that have been injured, ill, or victims of accidents. Our team of compassionate volunteers and skilled veterinarians work tirelessly to ensure that every animal receives the medical attention and care they need to recover and thrive.</p>
        <button type="button" class="btn btn-primary rounded-pill mb-3">More About Us <i class="bi bi-chevron-compact-right"></i></button>
      </div>
      <div class="col-md-6">
        <!-- <iframe width="100%" height="300" class="rounded-3" src="https://www.youtube.com/embed/Vn_iaoK6eE0?si=GphKcCc4W6EhNQjV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
        <iframe width="100%" height="300" class="rounded-3" src="https://www.youtube.com/embed/MSAVvwS9L2w?si=1qSw24dHt9u6vViq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <div class="container pt-4 mt-4 mb-4 pb-4">
    <div class="row">
      <div class="col-sm-3 col-6">
        <div class="bg-secondary rounded-3 p-2 text-center mb-3 shadow-sm">
          <h1 class="text-customp fw-bold p-3">10K +</h1>
          <h4>Made Happy Animal</h4>
        </div>
      </div>
      <div class="col-sm-3 col-6">
        <div class="bg-secondary rounded-3 p-2 text-center mb-3 shadow-sm">
          <h1 class="text-customp fw-bold p-3">500 +</h1>
          <h4>Permanent Resident</h4>
        </div>
      </div>
      <div class="col-sm-3 col-6">
        <div class="bg-secondary rounded-3 p-2 text-center mb-3 shadow-sm">
          <h1 class="text-customp fw-bold p-3">180 +</h1>
          <h4>Happy Supporters</h4>
        </div>
      </div>
      <div class="col-sm-3 col-6">
        <div class="bg-secondary rounded-3 p-2 text-center mb-3 shadow-sm">
          <h1 class="text-customp fw-bold p-3">10 +</h1>
          <h4>Volunteers Engaged</h4>
        </div>
      </div>
    </div>
  </div>
  <div style="background-color: #E6F3FF;">
    <div class="container pt-4 pb-4">
      <div style="border-left: 5px solid black;" class="ps-2 mb-4 rounded-3"> 
        <h3 class="d-flex" >Make A Donation</h3>
        <span class="font-weight-light">Featured Campaign</span>
      </div>
      <div class="row text-center">
        <div class="col-sm">
          <div class="bg-white rounded-4 shadow mb-2 p-3 border-bottom border-primary border-5">
            <img src="https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb.jpg" width="100%" class="rounded-3" alt="">
            <div class="progress mt-3">
              <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
            <div class="text-start mt-3 text-color">
              <strong>Raised : </strong><span>₹ 10,000.00</span><br>
              <strong>Goal : </strong><span>₹ 10,00,000.00</span>
            </div><hr>
            <h6 class="text-dark mt-3">Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</h6>
            <p class="text-dark">The sacred Char Dham Yatra, a revered pilgrimage undertaken by devotees across India</p>
            <button class="btn btn-outline-primary rounded-pill w-100"><i class="bi bi-heart"></i> Make A Donation</button>
          </div>
        </div>
        <div class="col-sm">
          <div class="bg-white rounded-4 shadow mb-2 p-3 border-bottom border-primary border-5">
            <img src="https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb.jpg" width="100%" class="rounded-3" alt="">
            <div class="progress mt-3">
              <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
            <div class="text-start mt-3 text-color">
              <strong>Raised : </strong><span>₹ 10,000.00</span><br>
              <strong>Goal : </strong><span>₹ 10,00,000.00</span>
            </div><hr>
            <h6 class="text-dark mt-3">Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</h6>
            <p class="text-dark">The sacred Char Dham Yatra, a revered pilgrimage undertaken by devotees across India</p>
            <button class="btn btn-outline-primary rounded-pill w-100"><i class="bi bi-heart"></i> Make A Donation</button>
          </div>
        </div>
        <div class="col-sm">
          <div class="bg-white rounded-4 shadow mb-2 p-3 border-bottom border-primary border-5">
            <img src="https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb.jpg" width="100%" class="rounded-3" alt="">
            <div class="progress mt-3">
              <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
            <div class="text-start mt-3 text-color">
              <strong>Raised : </strong><span>₹ 10,000.00</span><br>
              <strong>Goal : </strong><span>₹ 10,00,000.00</span>
            </div><hr>
            <h6 class="text-dark mt-3">Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</h6>
            <p class="text-dark">The sacred Char Dham Yatra, a revered pilgrimage undertaken by devotees across India</p>
            <button class="btn btn-outline-primary rounded-pill w-100"><i class="bi bi-heart"></i> Make A Donation</button>
          </div>
        </div>
      </div>
      <div class="text-center m-4 mb-4">
        <a href="createcampaign"><button class="btn btn-success me-3 shadow-none rounded-pill mt-4"><i class="bi bi-plus"></i> Create Fundraising Campaign</button></a>
        <button class="btn btn-primary shadow-none rounded-pill mt-4">View All Campaign <i class="bi bi-chevron-compact-right"></i></button>
      </div>
    </div>
  </div>

  <div style="background-image: url('https://www.doghomefoundation.com/wp-content/uploads/2023/06/banner2.jpg');">
    <div style="background-color: rgba(0, 0, 0, 0.7);"> 
      <div class="container pt-4 pb-4">
        <div class="row">
          <div class="col-md-4 mb-3">
            <div style="border-left: 5px solid white;" class="ps-2 mb-4 text-white rounded-3"> 
              <h3 class="d-flex" >Donations</h3>
              <span class="font-weight-light">Help, Donate & Fundraise</span>
            </div>
            <p class="mt-3 text-white fw-bold" style="text-align:justify">Your generous donation is vital to our mission of providing essential medical services, conducting rescue operations, and offering permanent shelter to those who are voiceless and vulnerable. With your support, we can ensure they receive the compassionate care and attention they urgently need to thrive and recover.</p>
            <button type="button" class="btn btn-primary rounded-pill mb-2"><i class="bi bi-heart me-2"></i> Donate Now</button>
          </div>
          <div class="col-md-8">
            <div class="rounded-3 bg-white">
              <div class="row">
                <div class="col-md-6">
                  <img width="100%" height="100%" src="Assets/Images/a2.jpeg" alt="">
                </div>
                <div class="col-md-6">
                  <div class="pt-3 pb-3 pe-2 ps-2">
                    <h4>Cows</h4>
                    <p style="text-align:justify" class="pe-2">We urgently need your support to aid a cow who has been severely injured in a car accident, suffering from a front leg injury that requires immediate medical attention. Your donation can provide the emergency treatment needed to address her injury, alleviate pain, and prevent further complications. Additionally, it will support her rehabilitation with ongoing care and therapy to ensure a full recovery, as well as nutritious food to aid in her healing and a safe shelter where she can rest and regain her strength without fear. Every contribution, no matter how small, can make a life-saving difference. With your compassion and generosity, we can offer this injured cow a chance at a dignified and healthy life. Please donate today to help us provide the urgent care she needs and alleviate her suffering. Thank you for your support.</p>
                    <button class="btn btn-outline-primary rounded-pill"><i class="bi bi-heart me-2"></i>Donate Now</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   

  <?php
  // Fetch user data from the database
  $query = "SELECT * FROM `successstories` limit 4 order by CreatedAt DESC";
  $result = $conn->query($query);
  $conn->close();
  if ($result->num_rows > 0) {
    ?>
    <div style="background-color: #E6F3FF;">
      <div class="container pt-4 pb-4">
        <div style="border-left: 5px solid black;" class="ps-2 mb-4 rounded-3"> 
          <h3 class="d-flex" >Success Stories</h3>
          <span class="font-weight-light">Our hurt to healed stories</span>
        </div>
        <div class="row text-center">
          <?php
          while($row = $result->fetch_assoc()) {
            ?>
              <div class="col-sm">
                <div class="bg-white rounded-4 shadow mb-2 p-3 border-bottom border-success border-5">
                  <img src="<?php echo $row['ImagePath']; ?>" width="100%" class="rounded-3" alt="">
                  <h5 class="text-dark mt-3"><?php echo $row['Title']; ?></h5>
                  <p class="text-dark"><?php echo $row['Story']; ?></p>
                  <button class="btn btn-outline-success rounded-pill">Read More <i class="bi bi-chevron-compact-right"></i></button>
                </div>
              </div>
            <?php
          }
          ?>
        </div>
        <div class="text-center m-4 mb-4">
          <a href="success"><button class="btn btn-success rounded-pill mt-4">View All Stories <i class="bi bi-chevron-compact-right"></i></button></a>
        </div>
      </div>
    </div>
    <?php
  }
  ?>

  <!-- <div style="background-color: #E6F3FF;">
    <div class="container pt-4 pb-4">
      <div style="border-left: 5px solid black;" class="ps-2 mb-4 rounded-3"> 
        <h3 class="d-flex" >Success Stories</h3>
        <span class="font-weight-light">Our hurt to healed stories</span>
      </div>
      <div class="row text-center">
        <div class="col-sm">
          <div class="bg-white rounded-4 shadow mb-2 p-3 border-bottom border-success border-5">
            <img src="https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb.jpg" width="100%" class="rounded-3" alt="">
            <h5 class="text-dark mt-3">Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</h5>
            <p class="text-dark">In a village near Jodhpur, where tractors have replaced traditional farming methods, a heartbreaking story unfolded. Sanju, a once proud and hardworking bull, became the unluckiest of all bulls.</p>
            <button class="btn btn-outline-success rounded-pill">Read More <i class="bi bi-chevron-compact-right"></i></button>
          </div>
        </div>
        <div class="col-sm">
          <div class="bg-white rounded-4 shadow mb-2 p-3 border-bottom border-success border-5">
            <img src="https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb.jpg" width="100%" class="rounded-3" alt="">
            <h5 class="text-dark mt-3">Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</h5>
            <p class="text-dark">In a village near Jodhpur, where tractors have replaced traditional farming methods, a heartbreaking story unfolded. Sanju, a once proud and hardworking bull, became the unluckiest of all bulls.</p>
            <button class="btn btn-outline-success rounded-pill">Read More <i class="bi bi-chevron-compact-right"></i></button>
          </div>
        </div>
        <div class="col-sm">
          <div class="bg-white rounded-4 shadow mb-2 p-3 border-bottom border-success border-5">
            <img src="https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb.jpg" width="100%" class="rounded-3" alt="">
            <h5 class="text-dark mt-3">Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</h5>
            <p class="text-dark">In a village near Jodhpur, where tractors have replaced traditional farming methods, a heartbreaking story unfolded. Sanju, a once proud and hardworking bull, became the unluckiest of all bulls.</p>
            <button class="btn btn-outline-success rounded-pill">Read More <i class="bi bi-chevron-compact-right"></i></button>
          </div>
        </div>
        <div class="col-sm">
          <div class="bg-white rounded-4 shadow mb-2 p-3 border-bottom border-success border-5">
            <img src="https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb.jpg" width="100%" class="rounded-3" alt="">
            <h5 class="text-dark mt-3">Help Us Save Horses Of Kedarnath Yastra (Animal Abuse)</h5>
            <p class="text-dark">In a village near Jodhpur, where tractors have replaced traditional farming methods, a heartbreaking story unfolded. Sanju, a once proud and hardworking bull, became the unluckiest of all bulls.</p>
            <button class="btn btn-outline-success rounded-pill">Read More <i class="bi bi-chevron-compact-right"></i></button>
          </div>
        </div>
      </div>
      <div class="text-center m-4 mb-4">
        <a href="success"><button class="btn btn-success rounded-pill mt-4">View All Stories <i class="bi bi-chevron-compact-right"></i></button></a>
      </div>
    </div>
  </div> -->

  <div style="background-image: url('https://www.doghomefoundation.com/wp-content/uploads/2023/06/banner3.jpg');">
    <div style="background-color: rgba(0, 0, 0, 0.7);">
      <div class="container pt-4 pb-4">
        <div style="border-left: 5px solid white;" class="ps-2 mb-4 text-white rounded-3"> 
          <h3 class="d-flex" >Testimonial</h3>
          <span class="font-weight-light">What do people praise about our Foundation?</span>
        </div>
        <div class="row justify-content-md-center"> <!-- justify-content-md-center -->
          <div class="col-md-12">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner bg-white rounded text-center">
                <div class="carousel-item active">
                  <div class="p-3">
                    <img width="60px" height="60px" class="rounded-pill mt-3" src="data:image/jpeg;base64,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" alt="">
                    <p class="mt-4 fst-italic">"Supporting [Organization's Name] has been a truly rewarding experience. Knowing that my contributions directly help provide crucial medical services, rescue operations, and permanent shelter to those in need fills my heart with gratitude. Every dollar donated makes a tangible difference in the lives of the voiceless, ensuring they receive the care and love they deserve."</p>
                    <h5>UserName 1</h5>
                    <span>Oksdgnlsdg</span>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="p-3">
                    <img width="60px" height="60px" class="rounded-pill mt-3" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMQEg0QEA0VFg8VFRUXEA4VFRYTFhAYFxYXFhUSExUYHSggGBolGxYVITEhJyorMjAuGB8zPTMsNygtLysBCgoKDg0OGxAQGysiHyItKy0tLS8tKy0rLS4tLS0tLS0tLS0tLS0tLS0tLS0rKy0rLS0rLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAAAQIFBgcEA//EAEMQAAIBAgIGBgYJAgQHAQAAAAABAgMEBREGITFBUWESEyJxgaEHMkJSkbEjM1NicoKSwdEUwhaisuEkQ0Rzg9LxFf/EABoBAQADAQEBAAAAAAAAAAAAAAABBAUDAgb/xAAyEQEAAgECBAIJBQADAQEAAAAAAQIDBBESITFBBVETIjJhcYGRsdFCocHh8BQzUlMj/9oADAMBAAIRAxEAPwDuIAAAAAAAAA2Bi7zSChSzXWdKXuw7Xns8yzj0mW/bb4q2TV4qd9/gwt1pfLX1VFLnN5+Sy+Zcp4fH6p+ipfxCf0x9WLr6Q3Ev+dkuEUl55Zliukw17K1tXmnu8NS/qy9avUffOT/c7RipHSsfRynLeetp+rzym3tbfie4iIeN5VUmtjJ2N31he1Y+rWmu6cl+54nHSesR9HqMl46TP1eujpDcw2XDfKSUvmszlbSYbfpda6vNX9TJ2umlRfWUYyXGLcH55p+RXv4dSfZmYWKeIWj2o3Zuy0qt6mSc3Tlwmsl+paink0OWvSN/gt49bit1nb4s1CaaTTTT2Na0+5lWYmOUrUTv0WISAAAAAAAAAAAAAAAAIby1vZxAwOJ6T06ecaS6cve9heO/w+Jew6G9ud+Ufuo5ddSvKnOf2avf4rVrZ9ZUfR9xao/Df4mljwY8fswzsmfJk9qfw8J2cUMCrCEMkVYENgQyRVgQwKskemxxKrQedKq48Y7Yvvi9TOeTDTJHrRu948t8fszs2zCdM4yyjcR6D+0jm4vvW2PmZmbw+Y54+fu7tLDr4nlk5e/s2qlUUkpRknF7JJ5p9zRnTExO0tCJiY3hchIAAAAAAAAAAAAHjxLEqdvHpTlrfqwXrS7l+51xYbZZ2q5Zc1cUb2aXiuNVLjNN9GnuprZ+Z72bGHTUxdOc+bHzam+XryjyYxllXVYEMCrCEMkVYENgQyRVgQwKskQwhDAqyR78Jxmrayzpz7PtU3rjLw3Pmjjm09MsetHzdsOe+KfVn5Og4Hj9K6XZfRqpdqk9q5xftLn8jE1GlvhnnzjzbODU0yxy6+TLFZYAAAAAAAAAADE45jUbddFdqq9kd0ecv4LWn005Z3nlCrqNTGKNo5y0i5uJVJOc5Nye1v5LgjZpStI2rHJjXva872nm+LPbyqwIYFWEIZIqwIbAhkirAhgVZIhhCGBVkiGBVgWpVZQlGUZOMk84yTyafFMTETG0kTMTvDoGi+lCuMqNZpV/ZlsVXu4S5fDgsXV6Kcfr06fZs6XWRk9W/X7tnM9eAAAAAAAAMTj+MK3jlHXVl6q91e8y1ptPOWd56Qq6nURijaOstFq1HJuUm3JvNt7WbURERtDFmZmd5UZ6QqwIYFWEIZIqwPtaWk60uhSg5S4Ldzb2LxPN8laRvadnumO152rG7YrLQyTydaso/cgs3+p6vJlDJ4jEexH1Xsfh8z7c/RlKeiNstqnLvll/pyK06/NPTaPksRoMUdd/qmpojbPZGa7pv98xGvzR5fRM6HD7/qxl7oTtdGv+Wa/uj/BYp4l/7r9HC/h3/ifq1jEcNq27yq03HhLbGXdJai/izUyRvWVDJivjna0PGzq5KskQwKsCGyRDYQjPLWnr3PhzA6HofpJ16VCs/p0uzL7VL+5b+O3iYmt0no/Xp0+39NnR6r0nqW6/f+20mevgAAAAAePFb+NvTlOWt7Ix957kdcOKctuGHLNljFXilz66uJVJSnN5yk82/wBlyN6lIpWKx0YN7ze02nq+LPbyqwIYFWEIZIqwMvgGByuX0nnGin2p75fdjz57irqdTGKNo5ytabTTlneeUN9s7SFGKhTgoxW5b+be98zFvkted7Tu2aUrSNqxs+54ewAAA+dejGpFwnFSi9sWs0z1W01neOqLVi0bS0HSfRp2+dWjm6HtR2ul/Mef/wBNnSaz0nq26/dj6rSej9avT7NaZfUVWBDZIhsIVYENgKdRxcZRk1JNOMlqaa2NCYiY2kiZid4dU0WxxXdLN5KtDJVY8eE1yf8AJ89q9POG/LpPRv6XURmrz6x1ZoqrIAAAQ3lrezewNAx7Ev6io2n9HHVTXLfLvf8ABu6bD6Km3eerC1Ob0t9+0dGMZZV1WBDAqwhDJFWB7MIw93FWNNaltnL3Yra+/d4nLPljFSbS64cU5b8MOl29CNOMYQjlGKySW4+ftabTvPVv1rFY2jo+h5egAAAAAIlFNNNZp6mnsa4MRO3MmN3MNKcH/pauUfqp5um+HGHhn8Gj6DSaj0tOfWOrB1WD0V+XSejCtltWQ2EKsCGBVkiAh7cFxSVrWhWhu1Tj78X60f45pHLPhjLSay64cs4rxaHX7W4jVhCpB5wkk4vimfNXrNbTWesPoq2i0RaOkvqeXoAAYDS7EOrpqlF9qpt5R3/HZ8S9ocPFbjnpH3Uddm4a8EdZ+zS2bDIVYEMCrCEMkVYENgbzoTZdCi6rXaqPV+GOpeeb+Bj6/JxZOHybGgx8NOLzbGUF4AAAAAAAAwul9h11tUyXbp9uH5dq8Y5+Rb0WX0eWPKeSrrMfHinzjm5dmfQMFVgQ2BVskQEIYFWSN59HOL+vaTfGdH++C/1fqMnxLB0yx8J/hqeH5uuOfjH8t7MhqgBsDnGMXvX1alT2c8ofhWz+fE+gwY/R44qwM+T0mSbPCzs4oYFWEIZIqwIbAq2SOq4bR6ulRh7sIr4JZnzeW3FeZ976PFXhpEeUPSc3sAAAAAAAAiSzTT2PagOL3NLoTqQ92Uo/pbX7H1VbcVYnzfMWjhmY8nyZKFWyRAQhgVZIhgfawvJUalKtD1oSUlz4rxWa8TzkpF6zWe73S80tFo7O1WlxGrCnUg84TipRfJrNHy16zW01ns+kraLVi0d31PL0xekt31VvUyfal2I/m2+WZZ0mPjyx7uatq8nBin38nPjdYaGBVhCGSKsCGwIZIpPYxCJdepvNRa2ZI+Ynq+mjosQkAAAAAAAAAcbxaWde6a2OrVy/XI+nw/8AXX4R9nzWX/st8Z+7xtnV4QEIYFWSIYFWSIYHS/Rxf9ZbypN9qlLJfhlnKPn0l4GF4lj4cvF5/wANrw/JxY+HybaZy+1DTe4zlRpcE5PxeS+T+Jq+H05Tb5MvxC/OK/NrDNFnKsIQyRVgQ2BDJFWBDA6hgFz1tvbzz19BJ98ey/NHz2ppwZbR730GnvxYqz7mQODsAAAAAAAAfK7rqnCpUl6sIuT7ksz1Ss2tFY7vN7RWs2ns4rObbbe1vN972n1MRtyfM7781SUIYFWSIYFWSIYFWBtHo6vOhd9DPVVhKOX3o9uL+Cl8Sh4jj4sO/lP9Lvh9+HLt5w6kYDcc90nrdO5rcFlFeCWfnmbukrw4YYWrtvmliWWVZDJFWBDYEMkVYEMCrJG36B4lk6lvJ7e3T/uj8n8TL8Rw9MkfCWl4fl645+MNzMpqAAAAAAAAGp+kHFOrpRt4vt1dcuUE/wB3kvBmj4dh4r8c9I+7P8QzcNOCOs/Zzo22MhgVZIhgVZIhgVYENhD2YJc9VcWtT3asM+5ySl5NnLPXixWj3S64bcOSs++Hbz5Z9K5fiNTpVa8uNSb/AMzPo8UbUrHuh87lne9p98vMzo5qsCGwIZIqwIYFWSIYQtRrSpyjOEspxacZcGiLVi0bT0TW01neOrp2AYzC6p9Jaqi1VKfuviuT3M+f1Gnthtt27S39PnjLXfv3ZMru4AAAAAHixfE6drTlVqPUvVjvm90YnXDhtltw1cs2WuKvFZyXE7+dxUnWqPtSezdFborkkfR4sdcdYrXs+fyZJyWm0vIzo5qskQwKskQwKsCGwhDArJ7ctu5kwT0df/xAuR83/wAaX0Xp2jTlm2+LZtxG0MKecqMlCGwIZIqwIYFWSIYQhgVZI+1leTozjUpTcZrfxXBreuR4vjrevDaOT1S9qW4qzzb7gultKtlGq1Tq832Jfhk9nc/Mxs+hvTnXnH7tjBraX5W5T+zY0yiugAABgcb0poW2cVLrKv2cXsf35bI/PkXMGiyZefSPNUz6zHj5dZ8nOcXxWpdTdSrLP3YL1YLhFfubeHDTFXhqxsua2W3FZ4WdXJVkiGBVkiGBVgQ2EIYFWSIYGR//AEpcTh6KHf0sspNZNoiHmVWwhDJFWBDAqyRDCEMD72NjUry6FKm5S35bFzbepHjJkpjje07PePHbJO1Y3ZKtoldRWfVRf3YyTfwZXrrsMztv+yxOizRG+zB1IuLcZJqS1OLWTT4NPYXImJjeFSYmJ2lRkoeyxxevQ1Uq8or3c84/peaOWTBjye1Drjz5Mfsyy1LTe5W1U5c3Fp+TRWnw7DPmsx4hljyKunNy9kaS5qMn85ER4dh9/wDvkT4hl93++bE3+PXNfNVLiXRe2EexF8mo5Z+JZx6bFT2aq+TUZb+1ZjDu4IAzlrohd1IqXUqKexTkot/l2rxyKl9dhrO2+/wW6aLNaN9tvix2KYRWtmlWpOKfqy1OMuSktWfI74s+PL7E7uOXDfF7UMezs5IYFWBDYQhgVZIhgVbA9n9C+Bz9JDr6OWwX8OjVrR4TmvhJo4Y53pE+6HrJG15j3y87OjwqwIYFWSIYQhgZHA8Hndz6MdUF9ZU3RXBcZcjhqNRXDXeevaHfBgtmttHTvLpWHWFO3gqdKOUVte+T96T3swcmW2S3FZuY8dcdeGr0nN0YrGcBo3SznHKpuqx1SXJ8VyZYwam+Hp08lfNpqZevXzaTieiFxSzcF1sOMPW8YPX8MzWxa/Ffryn/AHdl5dDlp05x/uzX61NwfRnFxl7sk4teDLkTExvHNUmJjlPJRslCrZIRTbSSze5LW34CeXOSOfKGbwzRO5r5N0+rh79Tsvwh63kipl1uLH33n3flaxaPLfttHv8Aw3fAtFaNrlP6yt9rJer+CPs+b5mTn1mTLy6R5flqYNJTFz6z5s8VFp8bu1hVhKnUgpQksnF7/wDfmeqXtSeKs7S82pF42tG8OWaV6Nys5dKOcreT7M98H7k/2e8+g0mrjNG08rf7ow9VpZwzvHsteZcVENhCGBVkiGBVgVm9TJhE9HWf8OfdR89/ym//AMdr+k9LoXVdcWpL8yT+eZoaS3FhqzdXXhzWYpllXQwKskQwhDA9GG2M7ipClDa9r3RW+T5I55ctcdJtLpixzktFYdSw2whb040qa7K2vfJ75Pmz57LltktNrN/Fjrjrw1eo5ugAAAfOtRjNZThGS4SSa8yYtNekomsT1eCpo/ay22lPwil8jtGqzR+qXGdNhn9MfRENHbVf9JT8Yp/MmdVmn9UkaXD/AOYe+hawp6qdOMVwjFR+Rxte1us7uta1r0jZ9Ty9AAAB8ru2jVhOnUipQkspRe9Hql5paLV6w82rFoms9Jce0lwaVnWdN5um9dKfvR5/eWx/HefSabURmpxd+757UYJw34e3ZiWWHBVkiGBVgQyR6sIt+tr21P3qsE+7pLPyzOea3DjtbyiXvFXiyVj3w7wfJvp2kae2+VSjU3Si4vvi8/lLyNfw6+9Jr5MnxCm1ot5tWZos9VkiGEIYFWyR0bQ3Ceoo9ZJfS1Mm+MY+zH9338jC12f0l+GOkNvRYPR04p6y2ApLgAAAAAAAAAAAAAABhtK8GV5QnBL6WPaoy4SXs58Hs89xZ0mf0OSJ7d1fVYPS49u/ZxuSazTWTWpp7nvTPpur51VgVYEMkQwNm9HNn1l7CWWqlCc335dCK/zZ+BR8Rvw4Jjz5fyuaCnFmifLn/Drp863mE0wtOstptLtU2pruWqXk2/At6HJw5Yjz5Kmtx8WKZ8ubnDN5iIYQhgVZIyWjeH/1FxSg12F2qn4Y7vF5LxK+qy+jxTPfpDvpsXpMkR26y6ofOvoAAAAAAAAAAAAAAAAAA5P6Q8L6i6dSK7FZdNcprVNfKX5mfQ+H5uPFwz1ry+XZha/FwZd46Tz/AC1Zl5SQyRDAq2Sh070WYf0KFa4a11ZZRf3aea/1OXwMLxTLvkinl/P9Nnw3HtSb+f8AH97t3MtpInFNNNZprJrinuJidp3hExvycnxWzdCrVpP2X2Xxi9cX8Mj6TDk9JSLeb53Lj9Hea+TyM6OarJEMDePR5aZQr1mtcpKEe6KzeXe5f5TI8Sv60U+bV8Op6s3+TbzMaQAAAAAAAAAAAAAAAAAap6SLHrLR1Eu1SnGXg+xJd3aT/KaHhuThzcPmo+IY+LFv5OUM+gYaGBVslC9tQlVnTpwWc5yUYrm3kjza0VrNp6Q9VrNpisdZd5wyyjQpUaMPVhFRXPJa2+bevxPk8mScl5tPd9NjpFKxWOz0nh7ANT08wzpRjcRWuHZqc4t6n4N+fI0vD820+jnv0Z3iGHePSR26tFZsMlDAqwOhej+5UreVPPtQm81ylrT+a8DF8RpMZeLzhseH3icfD5S2cz18AAAAAAAAAAAAAAAAANf08u40rK46T1zSpwXFye7uWb8C5oKTbPXbtzVNbeK4Z378nHGfSMBVslCGBvPovwbp1J3c12aecaXObXaku5PL8z4GV4nn2rGKO/X4NPw7Dvack9ujpphtgAAUq01KMoyWcZJqSe9PU0TEzE7wiYiY2lyvHcMdrWlTfq7acvei9nitj7j6PT5oy0i3fu+fz4ZxX4foxrOzihskevCcTnbVI1ab5SjunHfF/wAnLNhrlrw2dMWW2K3FV1PCsSp3NNVKb1bJR3we+MlxPns2G2K3DZvYstcteKr2HJ1AAAAAAAAAAAAAAAPPf3sKFOdWrNRpxWbk/JJb29mR7x47ZLRWsbzLxe9aVm1p5OOaUaQTvqvSecaUc1Spe6velxk/9j6TS6auCm0de8vn9RqLZrbz07R/u7CtlpXQwPTheHzuatKhTXbm8s90V7U3yS1nPLkrjpN7dIe8eO2S0Vr3dzwuwhb0qVCmsoQWS573J8282+8+Wy5LZLze3WX0uPHGOsVr0h6jm9gAABidJMHV1ScdSqx10pcHvi+T/h7izpdROG+/aeqvqcEZabd+zl1am4SlCUWpRbUovamtqPoKzExvDAmJidpfNs9IVYHswnFalrUVSlL8UH6s1wkv3OWbDXLXhs64c1sVuKrpuB45Su45weU169J+tH+VzMHPpr4Z2np5tzBqKZY5dfJlCu7gAAAAAAAAAAAAeDGcYpWlN1K08l7MVrlN+7Fb2dsOC+a3DSHLNmpirxWlyPSXSKrfTzn2aUX9HRT1R+9L3pc/hz+h02lpgrtHOe8sHUai2a289O0f7uwrZaV0MCAOu6B6Nf0lN1asf+JqLtL7KO1U+/e+ercfO6/Vemtw19mP39/4b2i03oq8Vvan9vc2ooLoAAAAAGsaX6O/1C66ivp4rtR+1S3fiW74cMr+j1fo54L9Pso6zS+kjir1+7nUtWae3euHJm4xVWwKskXoV5U5RnCbjNerKLyaItWLRtMbwmtprO8cpbvgenKeULtZP7eK1P8AHFbO9fBGTn8Onri+jUweIR0yfVuVvXjUipwmpQeyUWmn4ozLVms7TG0tKtotG8Tu+h5SAAAAAAAAVqTUU5SaUVrcm8kubZMRMztCJnbnLTNINP6VLOFqlVqfav6uPdvn4auZpafw29ueTlHl3/pn5/EK15Y+c+fb+3OcQv6lxN1K1Rzm973LhFbEuSNrHjrjrw1jaGRe9r24rTvLytnR4QwKtgdG9H+iTj0Ly5h2ttCk16vCrJceC3bduWWNr9bvvip85/j8tbRaTb/9L/KP5dCMdqgAAAAAAAGraV6LKvnWoJKv7Udiq/xLnv38TQ0mt9H6l+n2/pQ1Wj9J61Ov3c6qwcXKMotSTylFrJp8GjbiYmN4Y0xMTtKhKEMCrJHosMRq28ulRqyg9+T1S/FF6n4nPJipkja8bvePJfHO9Z2bVh3pBnHJXFBSW+dN9F/pepvxRn5PDKz7E7fFfx+I2j243+DY7PTGzqZfT9B8KicfP1fMpX0Gevbf4LlNbht32+LL299SqfV1oS/DKMvkytbHevtRMLFb1t0mJeg8PYB8a91Tp66lWMVxlJR+Z6rS1ukbvNrVr1nZh7zTCzpZ53Kk+FNOp5x1eZZpoc9v07fHkr31mGv6t/hza3iXpHetW1t3VKr/ALI/+xdxeFf/AEt9Pz/Snk8S/wDFfr+P7adiuNV7p5160pLdDZBd0Fq8dppYsGPF7Ebfdn5c2TL7c7/Zj2dnNVslCGBAHRdCtCOi4XN5DtanSt37PCdRceEd2/XqWNrdfv6mKfjP4/LW0mi29fJ8o/LoRjtUAAAAAAAAAAMLpDo5Su1m+xWS7NVLymvaRa02rvhnbrHkrajS1zR5T5ua4vhNW1l0a0Ml7M1rjP8ADL9tpu4c9Msb1n8sTLhvina0fhj2dnJDAqyRDAqwKySe4ndExErwryj6s5Luk18jzNYnrD1FpjpJO4m9tST75N/uIrWOkE2tPWZfDorge93jaEMhKGSIYFWyUIYHpw3DqtzNU6FJznvy2RXGUtkV3nPJlpjrxXnaHvHjtktw1jd1LRTQunadGrVaqXO6Xs0v+2nv+89fcYOq19s3q15V+/x/Db02iri9a3O32+DaygugAAAAAAAAAAAAfK5t4VYuFSClB7YyWaZ6ra1Z3rO0vNqxaNrRvDScb0D2ztJ/+Cb8oz/Z/E1cHiXbLHzj8MzN4f3xz8p/LS76yqUJdCtSlCXCSyz7nsfgalMlbxvWd2delqTtaNnmZ7eFWBDYQhgVZIhgVYEMkQwKtkoXt7edWShTpynN7IRTk/gjza1axvadoeq1m07VjeW64D6Oqk8p3c+rj9jBpzfKUtkfDPwMzP4nWOWKN/f2aOHw6088k7e7u6Hh2HUraCp0KShBblv5ye2T5sx8mW+S3Fed5auPHXHHDWNoeo5vYAAAAAAAAAAAAAAAA+VzbQqxcKlOM4PbGSUl8Geq3tWd6zs82rW0bWjdq+JaBW9TN0pSpS4Ltx/TLX8GX8fiWWvtc/upZPD8dvZ5NavtBLqGfV9Cqt3Rl0ZeMZZLzZep4jht13hSv4flr02n/f7uwV1g9xS+staq59CTX6lqLVc+K3S0fVWthyV61n6PA5bs9fA7bOW8IzAq2BVzXEnZG8PXbYXXq/V21WXNQk18csjnbNjr7Voj5ulcV7dKz9GbsdA7ypl0oQpR4zmm/CMM/PIq38RwV6Tv8P7WaaDNbrG3x/ps2GejijDJ3FaVV74R+jj5PpeaKOXxTJPsRt+/9LmPw2ke3O/7f3+7brDD6VCPQo0Ywjwiks+be982Z2TLfJO9p3X6Y60jasbPSeHsAAAAAAAAAAAAAAAAAAAAAAAYDSXZ4FvTdVbO5hivrM3cPRi5er4Yf6yPeTo8Y+rpei3s9xh6ptafs2ooLgAAAAAAAAAAAAAD/9k=" alt="">
                    <p class="mt-4 fst-italic">"Supporting [Organization's Name] has been a truly rewarding experience. Knowing that my contributions directly help provide crucial medical services, rescue operations, and permanent shelter to those in need fills my heart with gratitude. Every dollar donated makes a tangible difference in the lives of the voiceless, ensuring they receive the care and love they deserve."</p>
                    <h5>UserName 2</h5>
                    <span></span>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="p-3">
                    <img width="60px" height="60px" class="rounded-pill mt-3" src="data:image/jpeg;base64,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" alt="">
                    <p class="mt-4 fst-italic">"Supporting [Organization's Name] has been a truly rewarding experience. Knowing that my contributions directly help provide crucial medical services, rescue operations, and permanent shelter to those in need fills my heart with gratitude. Every dollar donated makes a tangible difference in the lives of the voiceless, ensuring they receive the care and love they deserve."</p>
                    <h5>UserName 3</h5>
                    <span>Oksdgnlsdg</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>  
  
  <?php require("include/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>                 
</body> 
</html>