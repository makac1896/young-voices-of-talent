<?php
require("configure.php");

$sql = 'SELECT postID from posts;';
$result = mysqli_query($conn, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
$postIDs = [];

foreach ($posts as $post) {
  $postIDs[] = $post['postID'];
}

$rID = rand(0, count($postIDs));
$sql = "SELECT * from posts WHERE postID=".$rID.";";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);

mysqli_free_result($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Young Voices of Talent | Main Page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/icon.ico" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:300,400,700&display=swap"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <!-- <link href="vendor/aos/aos.css" rel="stylesheet"> -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-lg-2">
            <h1 class="mb-0 site-logo"><a href="index.php" class="mb-0"><img src="img/logo-white.svg" alt="Young Voices of Talent" class="img-fluid"></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-lg-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="features.php" class="nav-link">About Us</a></li>
                <li><a href="pricing.php" class="nav-link">Support</a></li>

                <li class="has-children">
                  <a href="blog.php" class="nav-link">Posts</a>
                  <ul class="dropdown">
                    <li><a href="blog.php" class="nav-link">Posts</a></li>
                    <li><a href="blog-single.php?q=<?php echo $rID; ?>" class="nav-link">Trending</a></li>
                  </ul>
                </li>
                <li><a href="contact.php" class="nav-link">Contact</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

            <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse"
              data-target="#main-navbar">
              <span></span>
            </a>
          </div>

        </div>
      </div>

    </header>


    <main id="main">
      <div class="hero-section">
        <div class="wave">

          <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                <path
                  d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                  id="Path"></path>
              </g>
            </g>
          </svg>

        </div>

        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 hero-text-image">
              <div class="row">
                <div class="col-lg-7 text-center text-lg-left">
                  <h1><a href="index.php" class="mb-0"><img src="img/logo-white.svg" alt="Young Voices of Talent" class="img-fluid"></a></h1>
                  <!-- <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Welcome to the official page of YVOT. Feel free to see our recent posts.</p> -->
                  <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="blog.php"
                      class="btn btn-outline-white">See more</a></p>
                </div>
                <div class="col-lg-5 iphone-wrap">
                  
                <?php 
                if(!$post){
                  ?>
                 <!--  <img src="img/yvt.jpg" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200"> -->
                  <?php
                }else{
                ?>    
                    <div id="tp-post" class="well text-dark well jumbotron bg-white">
                    <h3><?php echo $post['title']; ?></h3>
                    <small id="tp-name"><span id="tp-date" class="text-primary">
                      <?php 
                      $sql = "SELECT * from authors WHERE authorID=".$post['authorID'].";";
                      $result = mysqli_query($conn, $sql);
                      $author = mysqli_fetch_assoc($result);
                      ?>
                      <a class="text-primary" href="search.php?author=<?php echo $author['authorID']; ?>">
                      <?php
                      echo $author['name']." ".$author['surname']; 
                      mysqli_free_result($result);
                      ?>
                      </a>
                      </span>&nbsp;<span id="tp-about" class="badge bg-dark text-white"><?php echo $post['view_number']." views"; ?></span></small>
                    <p id="tp-quote" class="text-dark"><?php echo $post['description']; ?></p>
                    <a role="button" class="btn-primary btn btn-sm" href="blog-single.php?q=<?php echo $post['postID']; ?>" onclick="load()">See Post</a>
                  </div>
                <?php
                }
                ?>
                

                  <!-- <img src="img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right">
                  <img src="img/phone_2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200"> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="site-section">
        <div class="container">

          <div class="row justify-content-center text-center mb-5" data-aos="fade-right" data-aos-delay="100">
            <div class="col-md-5" >
              <h2 class="section-heading">Discover new talent using YVOT</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
              <div class="feature-1 text-center">
                <div class="wrap-icon icon-1">
                  <span class="icon la la-users"></span>
                </div>
                <h3 class="mb-3">Explore the Nation</h3>
                <p>Thousands of talented youth at your fingertips!</p>
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-1 text-center">
                <div class="wrap-icon icon-1">
                  <span class="icon la la-toggle-off"></span>
                </div>
                <h3 class="mb-3">Get connected</h3>
                <p>Meet new friends, network and enjoy yourself through YVOT</p>
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="feature-1 text-center">
                <div class="wrap-icon icon-1">
                  <span class="icon la la-umbrella"></span>
                </div>
                <h3 class="mb-3">Get involved</h3>
                <p>Let's hear your voice, join the fun and send us your content.</p>
              </div>
            </div>
          </div>

        </div>
      </div> <!-- .site-section -->

      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-6 mb-5">
              <img src="img/undraw_svg_1.svg" alt="Image" class="img-fluid">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="step">
                <span class="number">01</span>
                <h3>Join Us</h3>
                <p>Become a member of the YVOT today, it's absolutely free!! Simply contact one of the numbers below.</p>
                <a class="text-success" href="https://docs.google.com/forms/d/e/1FAIpQLSd160Fkfi7MhdVfPxAw9M5rzmcOJIf17Vab_DigB5qCuyov-A/viewform">Register</a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step">
                <span class="number">02</span>
                <h3>Send us your content</h3>
                <p>+263779127009  <br>+263782618921 <br></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step">
                <span class="number">03</span>
                <h3>Get discovered</h3>
                <p>Let us be your voice to the world!</p>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .site-section -->



      <div class="site-section pb-0">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4 mr-auto">
              <h2 class="mb-4">Our <i class="text-info">History</i></h2>
              <p class="mb-4">YVOT was conceived by <i class="text-primary">Makatendeka Chikumbu and Constance Chivhanga</i>, the founders, with the goal of giving talented Zimbabwean youths an opportunity to blissfully express themselves. To achieve such a unique goal, Maka and Constance sought other highly passionate leaders and found in their company <b>Lyton Mhlanga, Mirirai Nyamoa, Takudzwa Nyazvivanga, Ashley Mawoyo, and Hugh Makomborero</b>.  Together they gave birth to YVOT.</p>
              <p><a class="btn btn-sm btn-primary" href="contact.php">Contact Us</a></p>
            </div>
            <div class="col-md-6" data-aos="fade-left">
              <img src="img/undraw_svg_2.svg" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div> <!-- .site-section -->

      <div class="site-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4 ml-auto order-2">
              <h2 class="mb-4">Our Promise to you</h2>
              <p class="mb-4">The mission of Young Voices of Talent (YVOT) is clear and concise: to give talented Zimbabwean youths an opportunity to express their talent to Zimbabwe and the rest of the world. The content contained herein serves to make sure that YVT’s mission is met in its entirety for the benefit of YVT and its users. </p>
              <!-- <p><a href="#">Download Now</a></p> -->
            </div>
            <div class="col-md-6" data-aos="fade-right">
              <img src="img/undraw_svg_3.svg" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div> <!-- .site-section -->


<?php include 'reviews.php';?>




      <div class="site-section cta-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 mr-auto text-center text-md-left mb-5 mb-md-0">
              <h2>See posts</h2>
            </div>
            <div class="col-md-5 text-center text-md-right">
              <p><a href="#" class="btn"><span class="icofont-brand-youtube mr-3"></span></a> <a href="#"
                  class="btn"><span class="icofont-ui-play mr-3"></span></a></p>
            </div>
          </div>
        </div>
      </div>


    </main>
    <?php include 'footer.php';?>