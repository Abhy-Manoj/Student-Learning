<?php
include("connection.php");
$sel=mysqli_query($con,"DELETE FROM `blog` WHERE `id`='$_REQUEST[id]'");
if($sel)
{
echo '<script>alert("Blog Deleted!")
			  window.location="viewtimeline.php";
			  </script>';
}

?>