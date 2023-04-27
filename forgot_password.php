<?php 
include('connection.php');
if(isset($_POST['submit']))
{
	
	$email=$_POST['email'];
	$sel="select * from student where email='$_POST[email]'";
	$result = mysqli_query($con,$sel) or die(mysql_error());
	$row=mysqli_fetch_array($result);
	
	$subject="Welcome To Student Learning";
	$title="Your Password";
	$msg="Greetings from Student Learning. \n Your Email id is: $row[email] \n Your password is: $row[password]";
	include('mail.php');
}


?>