<?php
include("connection.php");
$sel=mysqli_query($con,"DELETE FROM `certficates` WHERE `id`='$_REQUEST[id]'");
if($sel)
{
echo '<script>alert("Certificate Deleted!")
			  window.location="certificates.php";
			  </script>';
}

?>