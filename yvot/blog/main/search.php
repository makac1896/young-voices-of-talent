<?php
require ('configure.php');

if(isset($_REQUEST['author'])){
  $sql = "SELECT * FROM posts WHERE authorID=".$_REQUEST['author'];
  $result = mysqli_query($conn, $sql);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  $sql = "SELECT * FROM authors WHERE authorID=".$_REQUEST['author'];
  $result = mysqli_query($conn, $sql);
  $author = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  $sql = "SELECT * FROM authors";
  $result = mysqli_query($conn, $sql);
  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  $file = "pictures.txt";
 if(file_exists($file)){
  $handle = fopen($file, 'r');
  $data = fread($handle, filesize($file));
  $pictures = explode(',', $data);
  fclose($handle);
  $random_pic = rand(0, count($pictures));
  $random_pic2 = rand(0, count($pictures));
  } 
}            
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Young Voices of Talent | <?php echo $author['name'].' '.$author['surname'];?></title>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>


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
            <h1 class="mb-0 site-logo"><a href="index.php" class="mb-0"><img src="img/logo-white.svg" alt="Young Voices of Talent" class="img-fluid"></a></h1>
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
                  <h1 data-aos="fade-up" data-aos-delay="">About <?php echo $author['name']." ".$author['surname']; ?></h1>
                <p class="mb-5" data-aos="fade-up"  data-aos-delay="100"><input type="text" disabled value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" class="form-control form-control-lg"><a href="#" class="text-white">Copy Profile URL</a></p> 

                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>


<!-- start -->
               <article>
                <div class="container">

                  <h2>Who is <?php echo $author['name'].' '.$author['surname'];?></h2>

                  <!-- <img src="https://www.hararenews.co.zw/wp-content/uploads/2015/06/St-Georges-Head-Boy-659x439.jpg" alt="<?php echo $author['surname'].' '.$author['name']?> picture" class="img-responsive img w-50 p-5"> -->

               <!--    <div class="image">
                  <div class="group">
                   <img src="<?php echo $pictures[$random_pic]; ?>" alt="Developed by Makatendeka Chikumbu" class="img-responsive img w-50 p-5">

                  <img src="<?php echo $pictures[$random_pic2]; ?>" alt="Developed by Makatendeka Chikumbu" class="img-responsive img w-50 p-5">
                  <p><?php echo $author['description'];?></p>
                </div>
              </div> -->

              <div class="images2">
                    <style>
                      .images2 .group {
                        display: inline;
                        display: flex;
                        height: 500px;
                      }
                    </style>

                    <div class="row mb-5">
              <div class="col-md-5">
                <figure><img src="<?php echo $pictures[$random_pic] ?>" alt="Website design by Makatendeka Chikumbu" class="img-fluid">
                  <figcaption>Young Voices of Talent</figcaption></figure>
              </div>
              <div class="col-md-5">
                <figure><img src="img/cmt.jpg" alt="Developed by Makatendeka Chikumbu" class="img-fluid">
                  <figcaption>Your Talent our Voice</figcaption></figure>
              </div>
            <!--   <video poster="img/img_1.jpg" src="" class="video video-fluid video-responsive" controls autobuffer loop autoload >This video is copyrighted</video> -->
            </div>

                    <!-- <div class="group">
                      <img src="<?php echo $pictures[$random_pic]; ?>" alt="<?php echo $author['surname'].' '.$author['name']?> picture" class="img-responsive img w-50 p-5">
                    <img src="<?php echo $pictures[$random_pic2]; ?>" alt="<?php echo $author['surname'].' '.$author['name']?> picture" class="img-responsive img w-50 p-5">
                    </div>   -->               
                  </div>

                  <aside>
                    <table class="table table-striped table-hover">
                      <tr>
                        <th class="p-3">Name: </th>
                        <td><?php echo $author['name'].' '.$author['surname'];?></td>
                      </tr>
                      <tr>
                        <th>School: </th>
                        <td><?php echo $author['school'];?></td>
                      </tr>
                      <tr>
                        <th>Age: </th>
                        <td><?php echo $author['age'];?></td>
                      </tr>
                      <tr>
                        <th>Instagram : </th>
                        <td><a href="<?php echo $author['instagram'];?>">Instagram Page</a></td>
                      </tr>
                      <tr>
                        <th>Facebook : </th>
                        <td><a href="<?php echo $author['facebook'];?>">Facebook Profile</a></td>
                      </tr>
                      <tr>
                        <th>Cell : </th>
                        <td><a href="<?php echo $author['other'];?>"><b>Request Contact Details</b></a></td>
                      </tr>
                    </table>
                  </aside>


                    <div class="container">
                     <a href="stats.php?id=<?php echo $_REQUEST['author']; ?>" class="btn btn-primary">Author Statistics</a>
                     <p class=" -1 lead">CLick this button to see the overall post statistics of our member.</p>
                    </div>
                    <hr>
                     <div class="post-text">
                      <h2>Other Users</h2>
                  <?php 
                  foreach($users as $person){
                    if($person['authorID']==$_REQUEST['author']){
                      continue;
                    } else{
                  ?>
                  <a href="search.php?author=<?php echo $person['authorID'];?>" class="btn btn-primary m-1"><?php echo $person['name']. " ".$person['surname']; ?></a>
                  <?php
                  }
                }
                  ?>
                  
                </div>



              <!-- <div class="row mb-5">
              <div class="col-md-5">
                <figure><img src="<?php echo $pictures[$random_pic] ?>" alt="Website design by Makatendeka Chikumbu" class="img-fluid">
                  <figcaption>Young Voices of Talent</figcaption></figure>
              </div>
              <div class="col-md-5">
                <figure><img src="<?php echo $pictures[$random_pic2] ?>" alt="Developed by Makatendeka Chikumbu" class="img-fluid">
                  <figcaption>Your Talent our Voice</figcaption></figure>
              </div>
             <video poster="img/img_1.jpg" src="" class="video video-fluid video-responsive" controls autobuffer loop autoload >This video is copyrighted</video> -->
          <!--   </div>

 -->
                  <!-- <div class="images">
                    <style>
                      .images .group {
                        display: inline;
                        display: flex;
                      }
                    </style>

                    <div class="group">
                      <img src="https://www.peterhouse.co.zw/images/phocagallery/2019/2019_Gallery/thumbs/phoca_thumb_l_peterhouse%20in%20action%202019%2014.jpg" alt="<?php echo $author['surname'].' '.$author['name']?> picture" class="img-responsive img w-50 p-5">
                    <img src="https://www.peterhouse.co.zw/images/phocagallery/2018/2018_Gallery/thumbs/phoca_thumb_l_a%20block%20far%20%20wide%202018%203.jpg" alt="<?php echo $author['surname'].' '.$author['name']?> picture" class="img-responsive img w-50 p-5">
                    </div>


                    <div class="group">
                      <img src="https://www.hararenews.co.zw/wp-content/uploads/2015/06/St-Georges-Head-Boy-659x439.jpg" alt="<?php echo $author['surname'].' '.$author['name']?> picture" class="img-responsive img w-50 p-5">
                    </div>                    
                  </div> -->
                </div>
               </article>
<!-- end -->
      <div class="site-section">
        <h1>All posts by <?php echo $author['name']." ".$author['surname']; ?></h1>
        <div class="container">
          <div class="row mb-5">

            <hr>

             <div class="col-md-4">
              <div class="post-entry">
               
              </div>
            </div>


            <?php
            foreach($posts as $post){
            ?>
              <div class="col-md-4">
              <div class="post-entry">
                <a href="blog-single.php" class="d-block mb-4">
                  <img src="img/yvt.jpg" alt="Image" class="img-fluid">
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
