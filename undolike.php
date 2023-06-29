<?php
error_reporting(0);
include("connection.php");

// Get the user id from the session or any other source
$userId = $_SESSION['uid'];

if (isset($_POST['postId'])) {
    $postId = $_POST['postId'];

    // Check if the user has already liked the post
    $checkQuery = mysqli_query($con, "SELECT * FROM `reaction` WHERE `user_id`='$userId' AND `blog_id`='$postId'");
    $isLiked = mysqli_num_rows($checkQuery) > 0;

    if ($isLiked) {
        // User has liked the post, remove the like
        $deleteQuery = mysqli_query($con, "DELETE FROM `reaction` WHERE `user_id`='$userId' AND `blog_id`='$postId'");
        if ($deleteQuery) {
            // Like removed successfully
            $response = array('success' => true);
            echo json_encode($response);
        } else {
            // Failed to remove the like
            $response = array('success' => false);
            echo json_encode($response);
        }
    } else {
        // User has not liked the post, nothing to undo
        $response = array('success' => false);
        echo json_encode($response);
    }
} else {
    // Invalid request
    $response = array('success' => false);
    echo json_encode($response);
}
?>
