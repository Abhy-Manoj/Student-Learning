<?php
// fetchcomments.php

include("connection.php");

if (isset($_GET['postId'])) {
    $postId = $_GET['postId'];

    // Fetch comments for the specified post from the comments table
    $query = "SELECT comments.comment, student.name FROM comments
              INNER JOIN student ON comments.user_id = student.id
              WHERE comments.blog_id = '$postId'
              ORDER BY comments.id DESC";
    $result = mysqli_query($con, $query);

    $comments = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = array(
            'name' => $row['name'],
            'comment' => $row['comment']
        );
    }

    echo json_encode($comments);
}
?>
