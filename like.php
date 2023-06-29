<?php
// Include the connection file
include("connection.php");

// Check if the postId parameter is present in the request
if (isset($_POST['postId'])) {
	$postId = $_POST['postId'];
	
	// Get the user id from the session or any other source
	$userId = $_SESSION['uid'];

	// Check if the user has already liked the post
	$checkQuery = mysqli_query($con, "SELECT * FROM `reaction` WHERE `user_id`='$userId' AND `blog_id`='$postId'");
	if (mysqli_num_rows($checkQuery) == 0) {
		// User has not liked the post, insert the like data into the "reaction" table
		$insertQuery = mysqli_query($con, "INSERT INTO `reaction` (`user_id`, `blog_id`) VALUES ('$userId', '$postId')");

		if ($insertQuery) {
			// Return a success response
			http_response_code(200);
		} else {
			// Return an error response
			http_response_code(500);
		}
	} else {
		// User has already liked the post, return a success response
		http_response_code(200);
	}
} else {
	// Return an error response if postId is not provided
	http_response_code(400);
}
?>
