<?php
include("connection.php");
$sel1=mysqli_query($con,"SELECT * FROM `bio` WHERE `uid`='$_SESSION[uid]'");
			$row1=mysqli_fetch_array($sel1);
			//echo $row1['cover_image'];
			$filename = "admin/user_tbl/uploads/".$row1['cover_image'];
if (file_exists($filename) == true){
 die('File exists');
} else {
 die('File doesnt exist');
}
?>


<?php

// Establish a database connection
$servername = "containers-us-west-59.railway.app";
$username = "root";
$password = "g9OoC8Ti9EHcZo0Fl0mO";
$dbname = "railway";
$port = 5511;
$conn = mysqli_connect($servername, $username, $password, $dbname,$port);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SELECT query to search for the image
$sql = "SELECT * FROM images WHERE image_name='my_image.jpg'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (mysqli_num_rows($result) > 0) {
    // The image exists in the database
    echo "Image found!";
} else {
    // The image does not exist in the database
    echo "Image not found!";
}

// Close the database connection
mysqli_close($conn);
?>
