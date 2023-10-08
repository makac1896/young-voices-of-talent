<?php
require("configure.php");
if(!is_null($_REQUEST['q'])) {

$id = $_REQUEST['q'];
$sql = "SELECT * FROM posts where postID=".$id;
$result = mysqli_query($conn, $sql);
if($result){
$post = mysqli_fetch_assoc($result);
mysqli_free_result($result);
$authorID = $post['authorID'];

$sql = "SELECT * FROM authors where authorID=".$authorID;
$result = mysqli_query($conn, $sql);
$author = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM comments where postID=".$post['postID'];
$result = mysqli_query($conn, $sql);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);


$views = $post['view_number'];
$views++;
$sql = "UPDATE posts SET view_number=$views WHERE postID=".$id;
if(mysqli_query($conn, $sql)){
  mysqli_free_result($result);

}else{
  echo "Sorry we have experienced an error. #". mysqli_error($conn);
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
  <title>YVT Post | <?php echo $post['title']; ?></title>
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
                <li><a href="pricing.php" class="nav-link">Support</a></li>
                
                <li class="has-children active">
                  <a href="blog.php" class="nav-link">Posts</a>
                  <ul class="dropdown">
                    <li><a href="blog.php" class="nav-link">Post</a></li>
                    <li><a href="blog-single.php?q=3" class="active nav-link">Trending Post</a></li>
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
                <div class="col-md-10 text-center hero-text">
                  <h1 data-aos="fade-up" data-aos-delay=""><?php echo $post['title']; ?>
                    <br> 
                    <span class="lead"><?php echo $post['view_number']; ?> views</span>
                    &nbsp;
                    <span class="lead"><?php echo $post['likes']; ?> likes</span>
                  </h1>
                  <p class="mb-5" data-aos="fade-up"  data-aos-delay="100"><?php echo $post['upload_date']; ?> &bullet; By <a href="#" onclick="show()"class="text-white"><?php echo $author['name']."&nbsp;". $author['surname']; ?> </a></p>  
                  <script type="text/javascript">
                    function show(){
                      alert("Hello thank you so much for showing interest in this article. Please continue to show us love and support as we endeavour into greatness!!!");
                    }
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>

      

      <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">

           <!--  <p class="lead mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda nihil aspernatur nemo sunt, qui, harum repudiandae quisquam eaque dolore itaque quod tenetur quo quos labore?</p> -->
            <?php 
            if($post['media'] == "text"){


            $file = $post['path'];


            if(file_exists($file)){
            $handle = fopen($file, 'r');
            $data = fread($handle, filesize($file));
            $paragraphs = explode('\r\n', $data);
            $text = str_replace('.', '.<br>', $data);
            $text = str_replace('�', ' ', $data);
            $text = str_replace('”', '"', $data);
            $text = str_replace('’', "'", $data);
            $random = range(0, count($pictures) - 1);
            shuffle($random);
            ?>            
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae expedita cumque necessitatibus ducimus debitis totam, quasi praesentium eveniet tempore possimus illo esse, facilis? Corrupti possimus quae ipsa pariatur cumque, accusantium tenetur voluptatibus incidunt reprehenderit, quidem repellat sapiente, id, earum obcaecati.</p> -->

            <div class="row mb-5">
              <div class="col-md-6">
                <figure><img src="<?php echo $pictures[$random[2]]; ?>" alt="Website design by Makatendeka Chikumbu" class="img-fluid">
                  <figcaption>Young Voices of Talent</figcaption></figure>
              </div>
              <div class="col-md-5">
                <p class="lead">Young Voices of Talent (YVOT) is an organization that fosters talent expression in various forms and encourages innovation among creative African youth. Our team mission states that we are the voice of every talented youth.</p>
              </div>
              <!-- <div class="col-md-5">
                <figure><img src="<?php echo $pictures[$random[7]]; ?>" alt="Developed by Makatendeka Chikumbu" class="img-fluid">
                  <figcaption>Your Talent our Voice</figcaption></figure>
              </div> -->
            <!--   <video poster="img/img_1.jpg" src="" class="video video-fluid video-responsive" controls autobuffer loop autoload >This video is copyrighted</video> -->
            </div>
            

            <blockquote><p><hr></p></blockquote>
            <?php 
            foreach($paragraphs as $paragraph){
?>
            <p class="lead text-dark text-bold mb-5"><?php 
            echo $paragraph; 
            ?></p> 
            <?php 
            }
            ?>
<?php
            fclose($handle);
}
 }else{
   # code...
            $random_pic = rand(0, count($pictures));
            $random_pic2 = rand(0, count($pictures));
            if ($random_pic == $random_pic2) {
              $random_pic2 = rand(0, count($pictures));
            }
?>
              <div class="row mb-5">
              <div class="col-md-6">
                <figure><img src="img/yvt.jpg" alt="Website design by Makatendeka Chikumbu" class="img-fluid">
                  <figcaption>Young Voices of Talent</figcaption></figure>
              </div>
              <div class="col-md-6">
                <figure><img src="<?php echo $pictures[$random_pic];?>" alt="Developed by Makatendeka Chikumbu" class="img-fluid">
                  <figcaption>Your Talent our Voice</figcaption></figure>
              </div>
              
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                   <!--  <iframe class="embed-responsive-item" src="<?php echo $post['path'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $post['path'];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
           <!--  <video poster="img/img_1.jpg" src="<?php echo $post['path'];?>" class="video w-100 video-responsive" controls autobuffer loop autoload >This video is copyrighted</video> -->
            <!-- <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident vero tempora aliquam excepturi labore, ad soluta voluptate necessitatibus. Nulla error beatae, quam, facilis suscipit quaerat aperiam minima eveniet quis placeat.</p></blockquote> -->
<?php
 }
            ?>
                          

            <div class="well">
              <hr>
              <div class="jumbotron">
                <p class="lead text-dark"><code>This post has <kbd><span class="p-1 text-white text-bold"><b><?php echo $post['likes']; ?></b></span></kbd> likes</code></p>
              <a href="forms/upload.php?p=<?php echo $post['postID'];?>" class="btn-success text-dark p-3 m-3"><!-- <img class="img-responsive img-fluid h-auto w-25" src="img/like_2.gif" alt="Like button"> --><strong>Like</strong></a>
              <a href="blog.php" class="btn-dark text-primary p-3 m-3 ">View more posts</a>
            </div>
              <h3>Share this post</h3>
              <i class="icon fa fa-search"></i>
              <input id="myInput" disabled class="form-control bg-dark b-primary text-primary" type="text" value="<?php echo 'http://localhost/yvot/blog/main/blog-single.php?q='.$post['postID']; ?>">

            </div>
                        <div class="pt-5">       
              <p>Categories:  <a href="#">Design</a>, <a href="#">Events</a>  Tags: <a href="#">#youth</a>, <a href="#">#EMpawa</a></p>
            </div>


            <input type="text" onkeyup="suggestion(this.value)" class="form-control text-primary p-2" placeholder="Search for a talented youth">
            <p id="output"></p>

            <style>

                    #output a {
                      color: #ea4c1d;
                      padding: 1em;
                    }

                    #output a:last-child{
                      border-bottom: 2px black solid;
                    }
                  </style>

             <script type="text/javascript">
                    function suggestion(str){
                      var xmlhttp = new XMLHttpRequest();
      
                      if(str.length !== 0){
                      xmlhttp.onreadystatechange = function(){
                        if(this.readyState === 4 && this.status == 200){
                          document.getElementById('output').innerHTML = this.responseText
                        }
                      }
                      xmlhttp.open('GET', "forms/upload.php?s="+str+"&r="+str, true)
                      xmlhttp.send()
                      }else{
                        document.getElementById('output').innerHTML = 'No search results available'
                      }
                    }
                  </script>


            <div id="comment" class="pt-5">
              <h3 class="mb-5">Comments</h3>
              <?php 
              foreach($comments as $comment){ 
              ?>
               <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="img/cmt.jpg" alt="YVT Comment">
                  </div>
                  <div class="comment-body">
                    <h3><?php echo $comment['name']; ?></h3>
                    <div class="meta"><?php echo $comment['upload_time']; ?></div>
                    <p class="text-dark"><?php echo $comment['comment_body']; ?></p>
                    <p><a onclick="alert('Thank you for reporting this comment. Our Team will review it and see if it is inline with our Community Guidelines. We are sorry for any offences caused.Please feel free to report more innapropriate content \r\nMakatendeka Chikumbu (YV0T Lead Developer)')" href="forms/upload.php?c=<?php echo $comment['commentID']; ?>&e=<?php echo $comment['email']; ?>" class="reply bg-primary">Report</a></p>
                  </div>
                </li> 
                <?php
              }
                ?>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="forms/upload.php" method="POST" class="">

                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" name="email" id="email">
                  </div>

                  <div class="form-group">
                    <label>You are commenting on: <?php echo $post['title']; ?> <br> Please enter a constructive comment.</label><br>
                    <input type="hidden" name="postID" value="<?php echo $post['postID'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="message">Comment</label>
                    <textarea name="message" id="message" cols="30" rows="10" required class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input name="submit" type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
                
              </div>
            </div>

          </div>
          <div class="col-md-4 sidebar">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <h3 class="text-primary">Related posts</h3>
                  <span class="icon fa fa-search"></span>
                  <?php
                  $sql = "SELECT AVG(likes) as likes, AVG(view_number) as view_number from posts;";
                  $result = mysqli_query($conn, $sql);
                  if($result){
                    $stats = mysqli_fetch_assoc($result);
                    mysqli_free_result($result);
                    $avg_likes = $stats['likes'];
                    $avg_views = 15;
                    // $stats['view_number'];

                    $sql = "SELECT * FROM posts WHERE view_number >=".$avg_views." ORDER BY likes DESC LIMIT 10;";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        $recommended_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        mysqli_free_result($result);
                    ?>
                       
                  <ul class="list-group">
                    <?php 
                     foreach ($recommended_posts as $r_post) {
                      if($r_post['title'] ===$post['title']){
                        continue;
                      }
                    ?>
                      <a href="blog-single.php?q=<?php echo $r_post['postID'];?>" class="text-primary text-sm"><li class="list-group-item"><?php echo $r_post['title']." <span class=\"badge bg-primary text-white\">". $r_post['view_number']; ?> views</span> &nbsp; <?php echo "<span class=\"badge bg-dark text-warning\">". $r_post['likes']; ?> likes</span></li></a>
                    <?php
                        }
                    }
                  }
                  ?>

                  <style>
                    a{
                      text-decoration: none !important;
                    }
                  </style>
                    
                  </ul>
                  <!-- <input type="text" class="form-control" placeholder="Type a keyword and hit enter"> -->
                </div>
              </form>
            </div>
            <?php 
            $sql = "SELECT * FROM categories;";
            $result = mysqli_query($conn, $sql);
            $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
?>        
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categories</h3>
                <?php
                  foreach ($categories as $category) {
                    if($post['categoryID'] == $category['categoryID']){
                      ?>
                      <li class="text-bold"><a title="<?php echo $category['description']; ?>"href="search-cat.php?category=<?php echo $category['categoryID']; ?>"><?php echo $category['title']; ?> 
                <?php 

                 $sql = "SELECT COUNT('*') AS numrecords FROM posts WHERE categoryID=".$category['categoryID'];
                 $result = mysqli_query($conn, $sql);
                 $number = mysqli_fetch_assoc($result);
                ?>
                <span style="color: #222;"><?php echo $number['numrecords']; ?></span>
                </a>
                </li>
                      <?php
                    }else{
                ?>
                <li><a title="<?php echo $category['description']; ?>"href="search-cat.php?category=<?php echo $category['categoryID']; ?>"><?php echo $category['title']; ?> 
                <?php 
                 $sql = "SELECT COUNT('*') AS numrecords FROM posts WHERE categoryID=".$category['categoryID'];
                 $result = mysqli_query($conn, $sql);
                 $number = mysqli_fetch_assoc($result);
                ?>
                <span><?php echo $number['numrecords']; ?></span>
                </a>
                </li>
                <?php
                }
                }
            ?>
              </div>
            </div>
            <div class="sidebar-box">
              <h3>About: <?php echo $author['name']; ?></h3>
              <table class="table table-hover table-striped">
                <tr>
                   <td>Full name</td>
                  <td><?php echo $author['name']; ?> <?php echo $author['surname']; ?></td>
                </tr>
                <tr>
                  <td>School</td>
                  <td><?php echo $author['school']; ?></td>
                </tr>
                <tr>
                  <td>Age</td>
                  <td><?php echo $author['age']; ?></td>
                </tr>
              </table>
              <p><?php echo $author['description'];?></p>
              <p><a href="search.php?author=<?php echo $author['authorID'];?>" class="btn btn-primary btn-sm">Read More</a></p>
            </div>

            <?php 
            $sql = "SELECT firstname,quote, quote_person FROM admin ORDER BY RAND() LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $quote = mysqli_fetch_assoc($result);
            ?>

            <div class="sidebar-box">
              <h3>A quote from <span class="text-primary"><?php echo $quote['firstname'];?></span></h3>
              <p class="blockquote"><?php echo $quote['quote'];?> <span class="badge text-primary"><?php echo $quote['quote_person'];?> </span></p>
            </div>
          </div>
        </div>
      </div>
    </section>
      

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
<?php
  mysqli_close($conn);
  }
} else{
  echo "ERROR 404: PAGE NOT FOUND \r\n We are working on solving this now. Please do not alter the URL of the page....";
}
?>