<?php
include("connection.php");
$sel=mysqli_query($con,"DELETE FROM `project` WHERE `id`='$_REQUEST[id]'");
if($sel)
{
echo '<script>alert("Project Deleted!")
			  window.location="viewtimeline.php";
			  </script>';
}

?>