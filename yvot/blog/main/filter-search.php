<?php
require ('configure.php');
  $sql = "SELECT * FROM categories";
  $result = mysqli_query($conn, $sql);
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  $sql = "SELECT media FROM posts";
  $result = mysqli_query($conn, $sql);
  $types_of_articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);


  if (isset($_POST['submit'])) {
    $media = filter_var(htmlentities($_POST['media']), FILTER_SANITIZE_STRING);
    $category = filter_var(htmlentities($_POST['category']), FILTER_SANITIZE_STRING);
    $age = htmlentities($_POST['ageRange']);
    if ($age === "12 and 15") {
      $sql = "select a.name, a.surname, a.authorID, p.postID, p.title, p.upload_date, p.view_number, p.likes, c.title, c.categoryID FROM authors as a, posts as p, categories as c WHERE (a.age between 12 and 18) and (p.media = \"$media\") and (c.categoryID = $category);";

       $result = mysqli_query($conn, $sql);
    if (mysqli_fetch_all($result, MYSQLI_ASSOC)) {
      # if query is succesful
      $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
      echo var_dump($results);
    }else{
      echo mysqli_error($conn);
    }
    
    } 
  }

//   $sql = "SELECT * FROM categories WHERE categoryID=".$_REQUEST['category'];
//   $result = mysqli_query($conn, $sql);
//   $category = mysqli_fetch_assoc($result);
//   mysqli_free_result($result); 

// $file = "pictures.txt";
//  if(file_exists($file)){
//   $handle = fopen($file, 'r');
//   $data = fread($handle, filesize($file));
//   $pictures = explode(',', $data);
//   fclose($handle);
//   }              
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

  <div class="col-md-12 col-lg-3">
  <h1><a href="index.php"><img src="img/logo.png" alt="Young Voices of Talent" class="img-fluid"></a></h1>
  </div>

  <div class="container">
    
    <div class="jumbotron">
      <form method="POST" action="filter-search.php" name="search">
      <h1 class="mb-2 p-2"><u>Advanced Search</u></h1>
      
      <div class="form-group col-md-12">
      <h5>Select type of post</h5>
      <select class="form-control" name="media" required>         
      <option value="text">Article</option>
      <option value="video">Video</option>
      </select>
<hr>
      <h5>Select category</h5>
      <select class="form-control" name="category" required>   
      <?php
      foreach ($categories as $category) {
          # loop to fill in the available categories
      ?>
           <option value="<?php echo $category['categoryID'];?>"><?php echo $category['title'];?></option> 
      <?php
            }      
      ?> 
      </select>
<hr>
       <h5>Select age range</h5>
      <select class="form-control" name="ageRange" required>         
      <option value="12 and 15">12-15</option>
      <option value="16 and 19">16-19</option>  
      <option value="20 and 24">20-24</option>  
      <option value="25 and 29">25-29</option>
      <option value="30 and 35">30-35</option>
      <option value="1 and 100">None</option>
      </select>
<hr>
  <input type="submit" value="Search" name="submit" class="btn btn-success">
      </form>

    </div>
  </div>




    <?php include 'footer.php';?>
<?php
mysqli_close($conn); 
?>