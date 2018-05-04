<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
   $user = $_REQUEST['name']."";
   $cust_id = $_REQUEST["card_id"]."";
   $mobile = $_REQUEST['mobile']."";
   $address = $_REQUEST["addr"]."";
   $dob = $_REQUEST['year'] . $_REQUEST['month'] . $_REQUEST['day'] . "" ;
   $pass = $_REQUEST["psw"]."";

   $_SESSION["id"] = $user;
       
} 
$stmt = $conn->prepare("INSERT INTO student VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $cust_id, $user, $pass, $mobile, $address, $dob);
$stmt->execute();

if(mb_substr ($cust_id , 0, 1) === 0){
  $stmt = $conn->prepare("INSERT INTO admin VALUES (?)");
  $stmt->bind_param("s", $cust_id);
  $stmt->execute();
}
$sql = "SELECT cust_id FROM student WHERE cust_id='$cust_id'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}else{
    header('location:home.html');
}
$stmt->close();
$conn->close();
?>