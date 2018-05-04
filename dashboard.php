<!DOCTYPE html>
<html lang="en">
<head>
  <title>Library Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
     
    header {
    
      position: relative;
    
      width: 100%;
   
      min-height: auto;
    
      text-align: center;
    
      color: #fff;
    
      background-image: url("http://watchersonthewall.com/wp-content/uploads/2016/06/library.jpg");
    
      background-position: center;
    
      -webkit-background-size: cover;
    
      -moz-background-size: cover;
    
      background-size: cover;
    
      -o-background-size: cover;

    }
 



   header .header-content {
    
      position: relative;
    
      width: 100%;
    
      padding: 200px 15px 70px;
    
      text-align: center;

    }



    header .header-content .header-content-inner h1 {
    
      margin-top: 0;
    
      margin-bottom: 20px;
    
      font-size: 54px;
    
      font-weight: 300;

    }


    
header .header-content .header-content-inner p {
    
      margin-bottom: 50px;
    
      font-size: 24px;
    
      font-weight: 300;
    
      color: rgba(255,255,255,.7);
    }

    .navbar {
      border-radius: 0px;
    }
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="padding-top:15px;padding-bottom:10px;padding-right:20px;background-color:rgba(0,0,0,0.75);">
  <div class="container-fluid">
    <div class="navbar-header">
      
      <img src="https://www.somaiya.edu/extra-images/logo_2.png" style="height:50px;margin-right:15px;margin-bottom:5px;" alt="Image">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.html">Home</a></li>
        <li><a href="books.html">Books</a></li>
        <li><a href="deals.html">Deals</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	<li class="active"><a href="dashboard.html"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
        <li><a href="cart.html"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php

session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    
    $student_no = $_SESSION['id'];
    $query = "SELECT * FROM student WHERE cust_id='$student_no'";
    $result = mysqli_query($conn, $query)or die(mysqli_error());
    $row=mysqli_fetch_array($result);
}
?>
<div class="container-fluid p-0" style="margin-top:100px;">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0"> <?php echo $row['cust_id']."<br>";?> </h1>
          <h3> <?php echo $row['name']."<br>";?> </h3>
	  <div class="subheading mb-5"><?php echo $row['phone']."<br>";?></div>
          <div class="subheading mb-5"><?php echo $row['address']."<br>";?></div>
        </div>
      </section>
</div>


<footer class="container-fluid text-center">
  <p>Vatsal Aniket Harsh Copyright 2017</p>  
</footer>

</body>
</html>