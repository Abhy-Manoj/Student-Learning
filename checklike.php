<?php
// Include the connection file
include("connection.php");

// Check if the postId parameter is present in the request
if (isset($_GET['postId'])) {
	$postId = $_GET['postId'];

	// Get the user id from the session or any other source
	$userId = $_SESSION['uid'];

	// Check if the user has already liked the post
	$checkQuery = mysqli_query($con, "SELECT * FROM `reaction` WHERE `user_id`='$userId' AND `blog_id`='$postId'");
	if (mysqli_num_rows($checkQuery) > 0) {
		// User has already liked the post, return a success response
		$response = array('liked' => true);
		echo json_encode($response);
	} else {
		// User has not liked the post, return a success response
		$response = array('liked' => false);
		echo json_encode($response);
	}
} else {
	// Return an error response if postId is not provided
	http_response_code(400);
}
?>
