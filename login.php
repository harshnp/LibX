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
}else{
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
		session_start();
		$student_no = $_POST['id_num'];
		$password = $_POST['psw'];
		$query = "SELECT * FROM student WHERE cust_id='$student_no' AND password='$password'";
		$result = mysqli_query($conn, $query)or die(mysqli_error());
		$num_row = mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if( $num_row > 0 ) {
			$_SESSION['id']=$row['cust_id'];
			header('location:home.html');
		}else{
			echo "<alert>Incorrect ID or Password.</alert>";
		}
	}		
}
?>