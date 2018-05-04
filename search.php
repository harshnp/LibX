<?php

$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    $a = array();
    
    $query=mysqli_query($conn, "select * from book");
    while($row=mysqli_fetch_assoc($query))
    {
      $a[] = $row['title'];
    }
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>