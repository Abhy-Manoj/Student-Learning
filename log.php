<?php
session_start();
include('connection.php');

if (isset($_POST['submit']))
{	
$username=$_POST['email']; 
$password=$_POST['password']; 

	if($username=="admin@gmail.com" && $password=="admin")
	{
		$_SESSION['user']='admin';
		header("location:admin/dashboard/dashboard.php");
	}
	else
	{

		$sel="SELECT * FROM login WHERE username='$username' and password='$password'";
		$result = mysqli_query($con,$sel) or die(mysql_error());
		$row=mysqli_fetch_array($result);
		
		if($row['type']=="student")
		{	
			$query = "SELECT * FROM student WHERE BINARY username='$username' and BINARY password='$password'";	 
			$data=mysqli_query($con,$query);
			$count=mysqli_num_rows($data);
			if($count==1)
			{
				$query1 = "SELECT * FROM student WHERE BINARY username='$username' and BINARY password='$password'";	 
				$datas=mysqli_query($con,$query1);
				$cc=mysqli_fetch_array($datas);
				
				$_SESSION['user']='student';
				$_SESSION['uid']=$cc['id'];
				header("location:index.php");
			}
			else
			{
				echo "Error : ".mysqli_error($con);
				header("location:login.php?st=fail");
			}
		}
		else{
			header("location:login.php?st=fail");
		}
	}
}
	
?>
