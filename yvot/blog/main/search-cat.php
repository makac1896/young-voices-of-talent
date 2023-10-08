<?php
require ('configure.php');

if(isset($_REQUEST['category'])){
  $sql = "SELECT * FROM posts WHERE categoryID=".$_REQUEST['category'];
  $result = mysqli_query($conn, $sql);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  $sql = "SELECT * FROM categories WHERE categoryID=".$_REQUEST['category'];
  $result = mysqli_query($conn, $sql);
  $category = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
} 

$file = "pictures.txt";
 if(file_exists($file)){
  $handle = fopen($file, 'r');
  $data = fread($handle, filesize($file));
  $pictures = explode(',', $data);
  fclose($handle);
  }              
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Young Voices of Talent | <?php echo $category['title'];?></title>
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
                  <h1 data-aos="fade-up" data-aos-delay="">About <?php echo $category['title'];?></h1>

                  <p class="mb-5" data-aos="fade-up"  data-aos-delay="100"><?php echo $category['description'];?></p>  
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>



<!-- start -->
<!-- <div class="container">
          <div class="row mb-5">
            <div class="col-md-4">
              <div class="post-entry">
                <a href="blog-single.php" class="d-block mb-4">
                 <img src="<?php echo $category['pic1']; ?>" alt="<?php echo $category['title']?> picture" class="img-fluid">
                </a>
                <div class="post-text">
                  <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>  
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="post-entry">
                <a href="blog-single.php" class="d-block mb-4">
                 <img src="<?php echo $category['pic1']; ?>" alt="<?php echo $category['title']?> picture" class="img-fluid">
                </a>
                <div class="post-text">
                  <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>  
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="post-entry">
                <a href="blog-single.php" class="d-block mb-4">
                 <img src="<?php echo $category['pic1']; ?>" alt="<?php echo $category['title']?> picture" class="img-fluid">
                </a>
                <div class="post-text">
                  <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>  
                </div>
              </div>
            </div>


              </div>
            </div> -->


              <div class="container">
               <article>
                  
                  <p id="info-cat">We have worked hard to build what we think is an empowerment tool for the privileged and the underprivileged in our community. Our mission is to level the playing field and ensure that every talented youth in Zimbabwe is heard and recognized. We never went to fancy private schools and as a result, many opportunities were shunned from us because we had no way of proving what we were capable of. There are millions of youth around Africa with immense talent but all they lack is a voice to be heard. As a result, many young writers, poets, singers, and athletes have failed to progress in life. Our platform is that voice and we promise to change that narrative. Our acceptance will awaken a sleeping giant, which is the talent in Africa.</p>
                  <h2>Info: </h2>
                  <!-- <div class="embed-responsive embed-responsive-16by9 p-5">
                    <iframe class="embed-responsive-item p-5" src="<?php echo $category['article']; ?>"></iframe>
                  </div> -->
  
                  <aside>
                    <table class="table table-hover">
                      <thead class="bg-dark text-white">
                        <td class="p-3">Category</td>
                        <td>Number of Posts</td>
                      </thead>
                      <?php 
                       $sql = "SELECT * FROM categories";
                       $result = mysqli_query($conn, $sql);
                       $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

                       foreach ($categories as $category_c) {
                       ?>

                        <tr>
                        <th><a href="search-cat.php?category=<?php echo $category_c['categoryID']; ?>"><?php echo $category_c['title']; ?></a></th>

                        <?php
                        $sql = "SELECT COUNT('*') as count FROM posts WHERE categoryID=".$category_c['categoryID'];
                        $result = mysqli_query($conn, $sql);
                        $number = mysqli_fetch_assoc($result);
                        $number = intval($number['count']);

                        ?>
                        <td><a href="$number"><?php echo $number; ?></a></td>
                        </tr>
                        <?php
                        mysqli_free_result($result);                      
                        };
                        ?>
                    </table>
                  </aside>

                  
                </div>
               </article>
             </div>
<!-- end -->
      <div class="site-section">
        <h1>All posts in <?php echo $category['title']; ?></h1>
        <hr>
        <div class="container">
          <div class="row mb-5">

            <hr>
            <?php
            if($posts){
           foreach($posts as $post){
            $random_pic = rand(0, count($pictures));
            ?>
              <div class="col-md-4">
              <div class="post-entry">
                <a href="blog-single.php" class="d-block mb-4">
                  <img src="<?php echo $pictures[$random_pic];?>" alt="Image" class="img-fluid">
                </a>
                <div class="post-text">
                  <?php $authorID = $post['authorID'];
                  $sql = "SELECT * FROM authors where authorID=".$authorID;
                  $result = mysqli_query($conn, $sql);
                  $author = mysqli_fetch_assoc($result);
                  mysqli_free_result($result);
                   
                  ?>
                  <span class="post-meta"><?php echo $post['upload_date']; ?> &bullet; By <a href="#"><?php echo $author['name']."&nbsp;". $author['surname']; ?></a></span>  
                  <h3><a href="#"><?php echo $post['title'];?></a></h3>
                  <p><?php echo $post['description']; ?></p>
                  <p><a href="blog-single.php?q=<?php echo $post['postID']; ?>" class="readmore">Read more</a></p>
                </div>
              </div>
            </div>
            <?php
            } 
             } else{
            ?>
              <h4>There are no posts yet in this category</h4>
            <?php
             } 
            mysqli_close($conn);        
            ?>
            <!-- <div class="col-md-4">
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
   <?php include 'footer.php';?>