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
   $isbn = $_REQUEST["isbn"]."";       
} 

$sql = "DELETE FROM book WHERE isbn='$isbn'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}else{
    header('location:books.html');
}
$stmt->close();
$conn->close();
?>