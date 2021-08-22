<?php 

                            require_once("includes/connection.php");
                      
                            $id = $_GET['user_id'];

                            $sqlQuery = "SELECT * FROM photographer_table WHERE user_ID = $id";
                            $statement = $conn->prepare($sqlQuery);
                            $statement->execute();
                            $result = $statement->fetchAll();

                            if($result == true) {
                              
                              
                              foreach ($result as $photo) {
                                  $image = $photo["image"];
                                  $name = $photo["Full_Name"];

                              }
                             }
                                  
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Pixie - Product Detail</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">
<!--
Tooplate 2114 Pixie
https://www.tooplate.com/view/2114-pixie
-->
  </head>

  <body>
    
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>Suspendisse laoreet magna vel diam lobortis imperdiet</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/header-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="photographer.php">Photographers
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Booking Form Details</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                <?php 
                            require_once("includes/connection.php");
                           
                            $id = $_GET['user_id'];

                            $sqlQuery = "SELECT * FROM photographer_table WHERE user_ID = $id";
                            $statement = $conn->prepare($sqlQuery);
                            $statement->execute();
                            $result = $statement->fetchAll();

                            if($result == true) {
                              
                              
                              foreach ($result as $photo) {
                                $profilePicture = $photo[5];
                                $fullname = $photo["Full_Name"];
                          }} 
                                  

                             
                                  
?>

                  <li>
                  <img src="uploads/profile/<?php echo $profilePicture; ?>" alt="Item 1">
     
                  
                  </li>
                  
                 
                  
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
              
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
            <div class="card">
                <div class="card-body">
                <form action="includes/book.php" method="POST">
                <div class="form-group">
                <div class="form-group">
                        <input id="date" value="<?php echo $id; ?>" class="form-control" type="text" name="id" hidden>
                    </div>

                        <label for="date">Fullname</label>
                        <input id="date" class="form-control" type="text" name="fullname" required>
                    </div>

                    <div class="form-group">
                        <label for="date">Email Address</label>
                        <input id="date" class="form-control" type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Phone Number</label>
                        <input id="date" class="form-control" type="number" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="date"> Event Date</label>
                        <input id="date" class="form-control" type="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Event Time</label>
                        <input id="date" class="form-control" type="time" name="time" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Event Address</label>
                        <input id="date" class="form-control" type="text" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="services">Choose Type of Services</label>
                        <select id="services" class="custom-select" name="services" required>
                            <option></option>
                            <option>Birthday</option>
                            <option>Wedding</option>
                            <option>Maulidi</option>
                            <option>Graduation</option>
                        </select>
                    </div>
      
              <div class="down-content">
                <div class="categories">
                <button type="submit" name="book_btn" class="btn btn-primary">Submit</button>
                   </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->


    <!-- Similar Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h4><?php echo $fullname ?></h4>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Similar Ends Here -->


  


    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="assets/images/header-logo.png" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">How It Works ?</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; 2019 Company Name 
                
                - Design: <a rel="nofollow" href="https://www.facebook.com/tooplate">Tooplate</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/flex-slider.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
