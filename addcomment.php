<?php
// addcomment.php

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['postId'];
    $comment = $_POST['comment'];

    // Get the user id from the session or any other source
    $userId = $_SESSION['uid'];

    // Insert the new comment into the comments table
    $query = "INSERT INTO comments (user_id, blog_id, comment, date)
              VALUES ('$userId', '$postId', '$comment', NOW())";
    mysqli_query($con, $query);

    // You can return a success message if needed
    echo 'Comment added successfully!';
}
?>
