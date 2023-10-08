<?php
require ('configure.php');

if(isset($_REQUEST['id'])){
  $sql = "SELECT * FROM posts WHERE authorID=".$_REQUEST['id'];
  $result = mysqli_query($conn, $sql);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  $sql = "SELECT * FROM authors WHERE authorID=".$_REQUEST['id'];
  $result = mysqli_query($conn, $sql);
  $author = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  $sql = "SELECT * FROM authors";
  $result = mysqli_query($conn, $sql);
  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

}   

?>


<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <title>Young Voices of Talent | Statistics for <?php echo $author['name']." ".$author['surname']; ?></title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>


  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container text-primary">
		<h1 align="center">Statistics for <?php echo $author['name']." ".$author['surname']; ?></h1>
		 <canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var posts = []
var likes = []
var views = []

<?php
foreach($posts as $post){
?>
views.push("<?php echo $post['view_number']; ?>")
posts.push("<?php echo $post['title']; ?>")
likes.push("<?php echo $post['likes']; ?>")
<?php
}  
mysqli_close($conn);        
?>

var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: posts,
        datasets: [{
            label: '# of Views',
            data: views,
            backgroundColor: [
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)',
                'rgb(59, 15, 80)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        },
        {
            label: '# of Likes',
            data: likes,
            backgroundColor: [
               'rgb(218, 98, 133)',
                'rgb(218, 98, 133)',
                 'rgb(218, 98, 133)',
                  'rgb(218, 98, 133)',
                   'rgb(218, 98, 133)',
                    'rgb(218, 98, 133)',
                     'rgb(218, 98, 133)',
                      'rgb(218, 98, 133)',
                       'rgb(218, 98, 133)',
                        'rgb(218, 98, 133)',
                         'rgb(218, 98, 133)',
                          'rgb(218, 98, 133)',
                           'rgb(218, 98, 133)',
                            'rgb(218, 98, 133)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</div>

  <div class="post-text">
   <a href="search.php?author=<?php echo $_REQUEST['id'];?>" class="btn btn-danger m-1">Back</a>
   <hr> 
                      <h2>Other Users</h2>
                  <?php 
                  foreach($users as $person){
                    if($person['authorID']==$_REQUEST['id']){
                      continue;
                    } else{
                  ?>
                  <a href="stats.php?id=<?php echo $person['authorID'];?>" class="btn btn-primary m-1"><?php echo $person['name']. " ".$person['surname']; ?></a>
                  <?php
                  }
                }
                  ?>
                  
                </div>

</body>
<?php include 'footer.php';?>
