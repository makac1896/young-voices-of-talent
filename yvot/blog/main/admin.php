<?php
require ('configure.php');

if(isset($_REQUEST['id'])){
  $id = $_REQUEST['id'];
  $sql = "SELECT * FROM admin WHERE id=".$_REQUEST['id'];
  $result = mysqli_query($conn, $sql);
  $admin = mysqli_fetch_assoc($result);

  $sql = "SELECT id,firstname FROM admin";
  $result = mysqli_query($conn, $sql);
  $people = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $sql = "SELECT * FROM admin";
  $result = mysqli_query($conn, $sql);
  $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
}              
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Young Voices of Talent | <?php echo $admin['firstname']. " ". $admin['surname'];?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/icon.ico" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:300,400,700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
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

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner" >

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-lg-2">
            <h1 class="mb-0 site-logo"><a href="index.php" class="mb-0">Young Voices of Talent</a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-lg-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="features.php" class="nav-link">About Us</a></li>
                <li class="active"><a href="pricing.php" class="nav-link">Support</a></li>
                
                <li class="has-children active">
                  <a href="blog.php" class="nav-link">Posts</a>
                  <ul class="dropdown">
                    <li><a href="blog.php" class="nav-link active">Posts</a></li>
                    <li><a href="blog-single.php?q=1" class="nav-link">Trending Posts</a></li>
                  </ul>
                </li>
                <li><a href="contact.php" class="nav-link">Contact</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

            <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
          </div>

        </div>
      </div>
      
    </header>


    <main id="main">
      <div class="hero-section inner-page">
        <div class="wave">
          
          <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                      <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
                  </g>
              </g>
          </svg>

        </div>

        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">

              <div class="row justify-content-center">
                <div class="col-md-7 text-center hero-text">
                  <h1 data-aos="fade-up" data-aos-delay="">About <?php echo $admin['firstname']. " ". $admin['surname'];?></h1>
                    <p><?php echo $admin['email']; ?></p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>



<!-- start -->
               <article>
                <div class="container">
                  <h2>About: <?php echo $admin['role'];?></h2>
                  <img src="img/cmt.jpg" alt="Image" width="400px" height="400px"align="right" class="img-fluid mb-1">
                  <p class="mb-5" data-aos="fade-up"  data-aos-delay="100"><?php echo $admin['description'];?></p>  
                  <hr>   
                   <p class="mb-5" data-aos="fade-up"  data-aos-delay="100"><i><?php echo $admin['quote'];?></i> ~ <b><?php echo $admin['quote_person'];?></b> </p> 
                  


                </div>

               </article>
<!-- end -->
            <div class="col-md-6">  
              <div class="post-entry">
                <a href="blog-single.php" class="d-block mb-4">
                  <img src="<?php echo $admin['picture'];?>" alt="Image" class="img-responsive" height="300px" width="300px">
                </a>
                <div class="post-text">
                  <span class="post-meta">Picture of &bullet; <a href="#"><?php echo $admin['firstname']; ?></a></span>  
                  <h3><a href="#">Other admin members</a></h3>
                  <?php 
                  foreach($people as $person){
                    if($person['id']==$id){
                      continue;
                    } else{
                  ?>
                  <a href="admin.php?id=<?php echo $person['id'];?>" class="readmore btn btn-dark text-success m-1"><?php echo $person['firstname']; ?></a>
                  <?php
                  }
                }
                  ?>
                  
                </div>
              </div>
            </div>

           <!--  <div class="col-md-4">
              <div class="post-entry">
                <a href="blog-single.php" class="d-block mb-4">
                  <img src="img/img_4.jpg" alt="Image" class="img-fluid">
                </a>
                <div class="post-text">
                  <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>  
                  <h3><a href="#">Chrome now alerts you when someone steals your password</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                  <p><a href="#" class="readmore">Read more</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="post-entry">
                <a href="blog-single.php" class="d-block mb-4">
                  <img src="img/img_3.jpg" alt="Image" class="img-fluid">
                </a>
                <div class="post-text">
                  <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>  
                  <h3><a href="#">Chrome now alerts you when someone steals your password</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                  <p><a href="#" class="readmore">Read more</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="post-entry">
                <a href="blog-single.php" class="d-block mb-4">
                  <img src="img/img_2.jpg" alt="Image" class="img-fluid">
                </a>
                <div class="post-text">
                  <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>  
                  <h3><a href="#">Chrome now alerts you when someone steals your password</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                  <p><a href="#" class="readmore">Read more</a></p>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="row">
            <div class="col-12 text-center">
              <span class="p-3 active text-primary">1</span>
              <a href="#" class="p-3">2</a>
              <a href="#" class="p-3">3</a>
              <a href="#" class="p-3">4</a>
            </div>
          </div> -->
        </div>
      </div>
      

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
<?php include 'footer.php';?>.