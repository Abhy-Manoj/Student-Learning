<?php
include("connection.php");

$id = mysqli_real_escape_string($con, $_REQUEST['id']);
$sel = mysqli_query($con, "SELECT project_id FROM `comment` WHERE `id`='$id'");
$row = mysqli_fetch_assoc($sel);
$projectID = $row['project_id'];

$deleteQuery = mysqli_query($con, "DELETE FROM `comment` WHERE `id`='$id'");

if ($deleteQuery) {
    echo "<script>window.location.href='project_single.php?id=$projectID';</script>";
} else {
    echo "Error deleting comment";
}
?>
